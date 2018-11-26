<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package     app.Controller
 * @link        https://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    public $components = [
        'Flash',
        'Auth' => [
            'loginRedirect' => [
                'controller' => 'posts',
                'action' => 'list'
            ],
            'logoutRedirect' => [
                'controller' => 'users',
                'action' => 'login',
            ],
        ],
    ];

    public function beforeFilter() {
        $admin_pages = ['list', 'add', 'edit', 'login'];
        $guest_pages = ['index', 'archive', 'view'];
        $this->Auth->allow($guest_pages);

        $this->set(compact('admin_pages', 'guest_pages'));
        $this->set('auth_user', $this->Auth->user());
    }

    public function setFlashMessage($type, $message) {
        switch ($type) {
            case 'success':
                $this->Flash->success($message, ['key' => $type]);
                break;
            case 'error':
                $this->Flash->error($message, ['key' => $type]);
                break;
        }
    }
}
