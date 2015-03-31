<?php

App::uses('AppController', 'Controller');

/**
 * PaymentAccounts Controller
 *
 * @property PaymentAccount $PaymentAccount
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class PaymentAccountsController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Session');

    /**
     * index method
     *
     * @return void
     */
    public function index($username = NULL) {
        $username = base64_decode($username);
        if ($username) {
            $data = $this->PaymentAccount->find('first', array('conditions' => array('User.username' => $username)));
            $this->set('usersetting', $data);
        } else {
            
        }
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->PaymentAccount->exists($id)) {
            throw new NotFoundException(__('Invalid payment account'));
        }
        $options = array('conditions' => array('PaymentAccount.' . $this->PaymentAccount->primaryKey => $id));
        $this->set('paymentAccount', $this->PaymentAccount->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->request->data['PaymentAccount']['user_id'] = $this->Auth->User('id');
            $this->PaymentAccount->create();
            if ($this->PaymentAccount->save($this->request->data)) {
                $this->Session->setFlash(__('The payment account has been saved.'));
                return $this->redirect(array('action' => 'index/' . base64_encode($this->Auth->User('username'))));
            } else {
                $this->Session->setFlash(__('The payment account could not be saved. Please, try again.'));
            }
        }
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {

        if ($this->request->is(array('post'))) {

            $this->PaymentAccount->id = $this->request->data['PaymentAccount']['id'];
            $accountid = $this->request->data['PaymentAccount']['accountid'];
            $secureid = $this->request->data['PaymentAccount']['secureid'];

            if ($this->PaymentAccount->save($this->request->data)) {
                $this->Session->setFlash(__('The payment account has been saved.'));
                return $this->redirect(array('action' => 'index/' . base64_encode($this->Auth->User('username'))));
            } else {
                $this->Session->setFlash(__('The payment account could not be saved. Please, try again.'));
                return $this->redirect(array('action' => 'edit', $id));
            }
        }
        $id = base64_decode($id);
        $data = $this->PaymentAccount->find('first', array('conditions' => array('PaymentAccount.user_id' => $id)));
        $this->set('settingpayment', $data);
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id=NULL) {
        $this->PaymentAccount->id= base64_decode($id);
         if (!$this->PaymentAccount->exists()) {
            throw new NotFoundException(__('Invalid payment account'));
        }
          if ($this->PaymentAccount->delete()) {
            $this->Session->setFlash(__('The payment account has been deleted.'));
        } else {
            $this->Session->setFlash(__('The payment account could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index/' . base64_encode($this->Auth->User('username'))));
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->PaymentAccount->recursive = 0;
        $this->set('paymentAccounts', $this->Paginator->paginate());
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->PaymentAccount->exists($id)) {
            throw new NotFoundException(__('Invalid payment account'));
        }
        $options = array('conditions' => array('PaymentAccount.' . $this->PaymentAccount->primaryKey => $id));
        $this->set('paymentAccount', $this->PaymentAccount->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->PaymentAccount->create();
            if ($this->PaymentAccount->save($this->request->data)) {
                $this->Session->setFlash(__('The payment account has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The payment account could not be saved. Please, try again.'));
            }
        }
        $users = $this->PaymentAccount->User->find('list');
        $this->set(compact('users'));
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        if (!$this->PaymentAccount->exists($id)) {
            throw new NotFoundException(__('Invalid payment account'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->PaymentAccount->save($this->request->data)) {
                $this->Session->setFlash(__('The payment account has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The payment account could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('PaymentAccount.' . $this->PaymentAccount->primaryKey => $id));
            $this->request->data = $this->PaymentAccount->find('first', $options);
        }
        $users = $this->PaymentAccount->User->find('list');
        $this->set(compact('users'));
    }

    /**
     * admin_delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null) {
        $this->PaymentAccount->id = $id;
        if (!$this->PaymentAccount->exists()) {
            throw new NotFoundException(__('Invalid payment account'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->PaymentAccount->delete()) {
            $this->Session->setFlash(__('The payment account has been deleted.'));
        } else {
            $this->Session->setFlash(__('The payment account could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
