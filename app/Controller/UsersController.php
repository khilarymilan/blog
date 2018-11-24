<?php
App::uses('AppController', 'Controller');

class UsersController extends AppController {
    public function beforeFilter() {
        parent::beforeFilter();
        // Allow users to register and logout.
        $this->Auth->allow('logout');
    }

    public function login() {
        if ($this->Auth->user()) {
            return $this->redirect('/users/');
        }
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                return $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Flash->error('Invalid User ID or Password!', array('key' => 'danger'));
            }
        }
    }

    public function logout() {
        return $this->redirect($this->Auth->logout());
    }
}