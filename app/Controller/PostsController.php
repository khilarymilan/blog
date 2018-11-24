<?php

class PostsController extends AppController {
    public $helpers = ['Html', 'Form'];
    public $components = ['Paginator'];

    public $paginate = [
        'limit' => 5,
        'order' => [
            'Post.id' => 'asc'
        ]
    ];

    public function index() {
        $this->Paginator->settings = $this->paginate;

        $posts = $this->Paginator->paginate('Post');
        $this->set('posts', $posts);
    }

    public function list() {
        $this->Paginator->settings = $this->paginate;

        $posts = $this->Paginator->paginate('Post');
        $this->set('posts', $posts);
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->Post->set($this->request->data);
            if ($this->Post->validates()) {
                $this->request->data['Post']['image'] = $this->request->data['Post']['image']['name'];
                if ($this->Post->save($this->request->data)) {
                    $this->saveImage([
                        'tmp_name' => $this->request->data['Post']['image']['tmp_name'], 
                        'filename' => $this->request->data['Post']['image']['name']
                    ]);
                    $this->Flash->success('Article has been added', ['key' => 'success']);
                    return $this->redirect(['action' => 'edit', $this->Post->id]);
                }
            }
        }
    }

    public function edit($id = null) {
        $post = $this->Post->findById($id);
        if (!$post) {
            throw new NotFoundException(__('Invalid post'));
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            if (!empty($this->request->data['Post']['image_new']['name'])) {
                $this->request->data['Post']['image'] = $this->request->data['Post']['image_new']['name'];
            }

            $this->Post->id = $this->request->data['Post']['id'];
            $this->Post->set($this->request->data);
            // var_dump($this->Post->validates());die;
            if ($this->Post->validates()) {
                if ($this->Post->save($this->request->data)) {
                    if (!empty($this->request->data['Post']['image_new']['name'])) {
                        $this->saveImage([
                            'tmp_name' => $this->request->data['Post']['image_new']['tmp_name'], 
                            'filename' => $this->request->data['Post']['image_new']['name']
                        ]);
                    }
                    $this->Flash->success('Article has been edited', ['key' => 'success']);
                    $this->redirect(['action' => 'edit', $this->Post->id]);
                }
            }
        }
        $this->request->data = $post;
    }

    public function view($id) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $post = $this->Post->findById($id);
        if (!$post) {
            throw new NotFoundException(__('Invalid post'));
        }
        $this->set('post', $post);
    }

    public function archive() {
        $this->Paginator->settings = $this->paginate;

        $posts = $this->Paginator->paginate('Post');
        $this->set('posts', $posts);

    }

    public function saveImage($data = []) {
        move_uploaded_file(
            $data['tmp_name'],
            WWW_ROOT . 'img' . DS . $data['filename']
        );
    }
}