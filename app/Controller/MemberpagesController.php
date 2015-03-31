<?php
App::uses('AppController', 'Controller');
/**
 * Memberpages Controller
 *
 * @property Memberpage $Memberpage
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class MemberpagesController extends AppController {

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
	public function index() {
		$this->Memberpage->recursive = 0;
		$this->set('memberpages', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Memberpage->exists($id)) {
			throw new NotFoundException(__('Invalid memberpage'));
		}
		$options = array('conditions' => array('Memberpage.' . $this->Memberpage->primaryKey => $id));
		$this->set('memberpage', $this->Memberpage->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Memberpage->create();
			if ($this->Memberpage->save($this->request->data)) {
				$this->Session->setFlash(__('The memberpage has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The memberpage could not be saved. Please, try again.'));
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
		if (!$this->Memberpage->exists($id)) {
			throw new NotFoundException(__('Invalid memberpage'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Memberpage->save($this->request->data)) {
				$this->Session->setFlash(__('The memberpage has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The memberpage could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Memberpage.' . $this->Memberpage->primaryKey => $id));
			$this->request->data = $this->Memberpage->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Memberpage->id = $id;
		if (!$this->Memberpage->exists()) {
			throw new NotFoundException(__('Invalid memberpage'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Memberpage->delete()) {
			$this->Session->setFlash(__('The memberpage has been deleted.'));
		} else {
			$this->Session->setFlash(__('The memberpage could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Memberpage->recursive = 0;
                if($this->request->is("post")){

            if($this->request->data["keyword"]){

                    $keyword = trim($this->request->data["keyword"]);

                $this->paginate = array("limit"=>20,"conditions"=>array("OR"=>array(

                    "Memberpage.type LIKE"=>"%".$keyword."%",
                    "Memberpage.position LIKE"=>"%".$keyword."%",
                    "Memberpage.text LIKE"=>"%".$keyword."%"

                )));

            $this->set("keyword",$keyword);

            }

        }

		$this->set('memberpages', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Memberpage->exists($id)) {
			throw new NotFoundException(__('Invalid memberpage'));
		}
		$options = array('conditions' => array('Memberpage.' . $this->Memberpage->primaryKey => $id));
		$this->set('memberpage', $this->Memberpage->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Memberpage->create();
			if ($this->Memberpage->save($this->request->data)) {
				$this->Session->setFlash(__('The memberpage has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The memberpage could not be saved. Please, try again.'));
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
            $this->Memberpage->id = $id;
		if (!$this->Memberpage->exists($id)) {
			throw new NotFoundException(__('Invalid memberpage'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Memberpage->save($this->request->data)) {
				$this->Session->setFlash(__('The memberpage has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The memberpage could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Memberpage.' . $this->Memberpage->primaryKey => $id));
			$this->request->data = $this->Memberpage->find('first', $options);
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
		$this->Memberpage->id = $id;
		if (!$this->Memberpage->exists()) {
			throw new NotFoundException(__('Invalid memberpage'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Memberpage->delete()) {
			$this->Session->setFlash(__('The memberpage has been deleted.'));
		} else {
			$this->Session->setFlash(__('The memberpage could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
