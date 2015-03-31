<?php

/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Controller', 'Controller');
App::uses('CakeEmail', 'Network/Email');
$mailComp = new CakeEmail();

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    public $helpers = array('Html', 'Utilitymethods');
    public $components = array('Auth', 'Session');

    public function beforeFilter() {

        $this->Auth->authenticate = array(
            AuthComponent::ALL => array(
                'userModel' => 'User',
                'fields' => array('username' => 'username')
            ),
            'Form' => array(
                'fields' => array('username' => 'username'),
                'scope' => array('User.status' => 1)
            )
        );

        if (isset($this->params['prefix']) && $this->params['prefix'] == 'admin') {
            $this->layout = 'admin';
            $this->Auth->loginAction = array('controller' => 'users', 'action' => 'admin_login');
            if ($this->Auth->User('role') != "Admin" && $this->Auth->User('id')) {
                $this->isAuthorized2();
            }
        }
        $this->set("fbLoginUrl", $this->loginUrl);



        $this->loadModel('User');
        $userid = $this->Auth->User("id");

        $this->set("loggeduser", $ds = $this->User->find("first", array("conditions" => array("User.id" => $userid))));


        $this->loadModel("Staticpage");
        $sliderm = $this->Staticpage->find('all', array('conditions' => array('AND' => array('Staticpage.position' => 'AboutUs', 'Staticpage.status' => 1))));
        $this->set('staticabout', $sliderm);

        $location = $this->Staticpage->find('all', array('conditions' => array('AND' => array('Staticpage.position' => 'location', 'Staticpage.status' => 1))));
        $this->set('locat', $location);

        $this->loadModel("Follow");
        $fllow = $this->Follow->find('all');
        $this->set('media', $fllow);
    }

    public function isAuthorized2() {
        $this->Session->setFlash(__('Sorry you are not authorized for this section.'));
        return $this->redirect(array('controller' => '../users', 'action' => 'myaccount'));
    }

}
