<?php

App::uses('AppController', 'Controller');

/**
 * Contacts Controller
 *
 * @property Contact $Contact
 * @property PaginatorComponent $Paginator
 */
class ContactsController extends AppController {
    
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow(array('index','ideal'));
    }

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->Contact->recursive = 1;
        if ($this->request->is("post")) {
            if ($this->request->data["keyword"]) {
                $keyword = trim($this->request->data["keyword"]);
                $this->paginate = array("limit" => 20, "conditions" => array("OR" => array(
                            "Contact.address LIKE" => "%" . $keyword . "%",
                            "Contact.email LIKE" => "%" . $keyword . "%",
                            "Contact.skype LIKE" => "%" . $keyword . "%"
                )));
                $this->set("keyword", $keyword);
            }
        }
        $Contact = $this->paginate('Contact');
        $this->set('contacts', $Contact);
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->Contact->exists($id)) {
            throw new NotFoundException(__('Invalid contact'));
        }
        $options = array('conditions' => array('Contact.' . $this->Contact->primaryKey => $id));
        $this->set('contact', $this->Contact->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Contact->create();
            if ($this->Contact->save($this->request->data)) {
                $this->Session->setFlash(__('The contact has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The contact could not be saved. Please, try again.'));
            }
        }
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        $this->Contact->id=$id;
        if (!$this->Contact->exists($id)) {
            throw new NotFoundException(__('Invalid contact'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Contact->save($this->request->data)) {
                $this->Session->setFlash(__('The contact has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The contact could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Contact.' . $this->Contact->primaryKey => $id));
            $this->request->data = $this->Contact->find('first', $options);
        }
    }

    /**
     * admin_delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null) {
        $this->Contact->id = $id;
        if (!$this->Contact->exists()) {
            throw new NotFoundException(__('Invalid contact'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Contact->delete()) {
            $this->Session->setFlash(__('The contact has been deleted.'));
        } else {
            $this->Session->setFlash(__('The contact could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }
    
     public function admin_deleteall($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        foreach ($this->request['data']['Contact'] as $k) {
            $this->Contact->id = (int) $k;
            if ($this->Contact->exists()) {
                $this->Contact->delete();
            }
        }
        $this->Session->setFlash(__('Admin deleted....'));
        $this->redirect(array('action' => 'index'));
    }
    

    public function index() {
        if ($this->request->is('post')) {
            $this->Contact->create();
            if ($this->Contact->save($this->request->data)) {
                $this->Session->setFlash(__('The contact has been saved.'));
                return $this->redirect('/contacts/index/');
            } else {
                $this->Session->setFlash(__('The contact could not be saved. Please, try again.'));
            }
        }
    }

     public function admin_activate($id = null) {
        $this->Contact->id = $id;
        if ($this->Contact->exists()) {
            $x = $this->Contact->save(array(
                'Contact' => array(
                    'status' => '1'
                )
            ));
            $this->Session->setFlash(__("Activated successfully."));
            $this->redirect($this->referer());
        } else {
            $this->Session->setFlash(__("Unable to activate."));
            $this->redirect($this->referer());
        }
    }

    public function admin_deactivate($id = null) {
        $this->Contact->id = $id;
        if ($this->Contact->exists()) {
            $x = $this->Contact->save(array(
                'Contact' => array(
                    'status' => '0'
                )
            ));
            $this->Session->setFlash(__("Activated successfully."));
            $this->redirect($this->referer());
        } else {
            $this->Session->setFlash(__("Unable to activate."));
            $this->redirect($this->referer());
        }
    }
}
