<?php

class PostsController extends AppController {
    public $helpers = ['Html', 'Form'];
    public $components = ['Paginator'];

    public $paginate = [
        'limit' => 5,
        'order' => [
            'Post.id' => 'asc'
        ],
    ];

    public function index() {
        $this->_paginatePosts();
    }

    public function view($id = null) {
        if (!$id) {
            $this->setFlashMessage('error', 'Sorry, the page you are trying to access does not exist.');
            return $this->redirect(['action' => 'index']);
        }

        $post = $this->Post->findById($id);
        if (!$post) {
            $this->setFlashMessage('error', 'Sorry, the page you are trying to access does not exist.');
            return $this->redirect(['action' => 'index']);
        }
        $this->set('post', $post);
    }

    public function archive() {
        $this->_paginatePosts();
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->Post->set($this->request->data);
            if ($this->Post->validates()) {
                $image_data = $this->request->data['Post']['image'];
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
                $this->request->data['Post']['image'] = $image_data['name'];
            }

            $this->Post->id = $this->request->data['Post']['id'];
            $this->Post->set($this->request->data);
            if ($this->Post->validates()) {
                if ($this->Post->save($this->request->data)) {
                    if (!empty($this->request->data['Post']['image_new']['name'])) {
                        $this->_saveImage([
                            'tmp_name' => $this->request->data['Post']['image_new']['tmp_name'], 
                            'filename' => $this->request->data['Post']['image_new']['name']
                        ]);
                    }
                    $this->setFlashMessage('success', 'Article has been edited');
                    $this->redirect(['action' => 'edit', $this->Post->id]);
                }
            }
        }
        $this->request->data = $post;
    }

    public function list() {
        $this->_paginatePosts();
    }

    private function _paginatePosts() {
        $this->Paginator->settings = $this->paginate;

        $posts = $this->Paginator->paginate('Post');
        $this->set(compact('posts'));
    }

    private function _saveImage($data = []) {
        move_uploaded_file(
            $data['tmp_name'],
            WWW_ROOT . 'img' . DS . $data['filename']
        );
    }
}