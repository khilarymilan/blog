<?php

class PostsController extends AppController {
    public $helpers = ['Html', 'Form'];
    public $components = ['Paginator', 'Session'];
    public $paginate = [
        'limit' => 5,
        'order' => [
            'Post.id' => 'asc'
        ],
    ];

    public function index() {
        $posts = $this->_paginatePosts();
        $this->set(compact('posts'));
    }

    /**
     * View individual article
     * @return array of posts
     */
    public function view($id = null) {
        if (!$id) {
            $this->setFlashMessage('error', 'Sorry, the page you are trying to access does not exist.');
            return $this->redirect(['action' => 'index']);
        }

        $post = $this->Post->findById($id);
        if (!$post) {
            return $this->redirect(['action' => 'index']);
        }

        $this->set(compact('post'));
    }

    public function archive() {
        $posts = $this->_paginatePosts('archive');
        $this->set(compact('posts'));
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->Post->set($this->request->data);
            if ($this->Post->validates()) {
                $image_data = $this->request->data['Post']['image'];
                $image_data['name'] = $this->_setImageName($image_data['name']);
                $this->request->data['Post']['image'] = $image_data['name'];

                if ($this->Post->save($this->request->data)) {
                    $this->_saveImage([
                        'tmp_name' => $image_data['tmp_name'],
                        'filename' => $image_data['name']
                    ]);
                    $this->setFlashMessage('success', 'Article has been added');
                    return $this->redirect(['action' => 'edit', $this->Post->id]);
                } 
                $this->setFlashMessage('error', 'Ooops! Something went wrong, please try again.');
            }
            $this->setFlashMessage('error', 'Please fill in the required details');
        }
    }

    public function edit($id = null) {
        $post = $this->Post->findById($id);
        if (!$post) {
            $this->setFlashMessage('error', 'Sorry, the page you are trying to access does not exist.');
            return $this->redirect(['action' => 'list']);
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            $image_data = $this->request->data['Post']['image_new'];
            if (!empty($image_data['name'])) {
                $image_data['name'] = $this->_setImageName($image_data['name']);
                $this->request->data['Post']['image'] = $image_data['name'];
            }

            $this->Post->id = $this->request->data['Post']['id'];
            $this->Post->set($this->request->data);
            if ($this->Post->validates()) {
                if ($this->Post->save($this->request->data)) {
                    if (!empty($image_data['name'])) {
                        $this->_saveImage([
                            'tmp_name' => $image_data['tmp_name'],
                            'filename' => $image_data['name']
                        ]);
                    }
                    $this->setFlashMessage('success', 'Article has been edited');
                    $this->redirect(['action' => 'edit', $this->Post->id]);
                }
            }
        }
        $this->request->data = $post;
    }

    /**
     * Admin List Page
     * @return array of posts
     */
    public function list() {
        $posts = $this->_paginatePosts('list');
        $this->set(compact('posts'));
    }

    private function _paginatePosts($redirect_page = 'index') {
        try {
            $this->Paginator->settings = $this->paginate;
            return $this->Paginator->paginate('Post');
        } catch (NotFoundException $e) {
            return $this->redirect(['action' => $redirect_page]);
        }
    }

    /**
     * Change filename if filename already exists for image
     * @param  string $image_name image_name filename of image
     * @return string new image filename
     */
    private function _setImageName($image_name) {
        $filename = pathinfo($image_name,PATHINFO_FILENAME);
        $extension = pathinfo($image_name, PATHINFO_EXTENSION);
        $original_filename = $filename;

        $i = 1;
        while(file_exists(WWW_ROOT . 'img' . DS . $filename . "." . $extension))
        {
            $filename = (string)$original_filename . '-' . $i;
            $image_name = $filename . "." . $extension;
            $i++;
        }

        return $image_name;
    }

    private function _saveImage($data = []) {
        move_uploaded_file(
            $data['tmp_name'],
            WWW_ROOT . 'img' . DS . $data['filename']
        );
    }
}