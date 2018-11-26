<?php

class UsersController extends AppController {
    public function beforeFilter() {
        parent::beforeFilter();
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
                $this->setFlashMessage('error', 'Invalid User ID or Password!');
            }
        }
    }

    public function logout() {
        return $this->redirect($this->Auth->logout());
    }
}