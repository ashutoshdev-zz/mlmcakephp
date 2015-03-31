<?php
App::uses('AppController', 'Controller');
/**
 * Businessplans Controller
 *
 * @property Businessplan $Businessplan
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class BusinessplansController extends AppController {

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
		$this->Businessplan->recursive = 0;
		$this->set('businessplans', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Businessplan->exists($id)) {
			throw new NotFoundException(__('Invalid businessplan'));
		}
		$options = array('conditions' => array('Businessplan.' . $this->Businessplan->primaryKey => $id));
		$this->set('businessplan', $this->Businessplan->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Businessplan->create();
			if ($this->Businessplan->save($this->request->data)) {
				$this->Session->setFlash(__('The businessplan has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The businessplan could not be saved. Please, try again.'));
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
		if (!$this->Businessplan->exists($id)) {
			throw new NotFoundException(__('Invalid businessplan'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Businessplan->save($this->request->data)) {
				$this->Session->setFlash(__('The businessplan has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The businessplan could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Businessplan.' . $this->Businessplan->primaryKey => $id));
			$this->request->data = $this->Businessplan->find('first', $options);
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
		$this->Businessplan->id = $id;
		if (!$this->Businessplan->exists()) {
			throw new NotFoundException(__('Invalid businessplan'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Businessplan->delete()) {
			$this->Session->setFlash(__('The businessplan has been deleted.'));
		} else {
			$this->Session->setFlash(__('The businessplan could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Businessplan->recursive = 0;
		if($this->request->is("post")){
            if($this->request->data["keyword"]){
                    $keyword = trim($this->request->data["keyword"]);
                $this->paginate = array("limit"=>20,"conditions"=>array("OR"=>array(
                    "Businessplan.silver LIKE"=>"%".$keyword."%",
                    "Businessplan.gold LIKE"=>"%".$keyword."%",
                    "Businessplan.platinum LIKE"=>"%".$keyword."%"

                )));
            $this->set("keyword",$keyword);
              }
            }
            $this->set('businessplans', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Businessplan->exists($id)) {
			throw new NotFoundException(__('Invalid businessplan'));
		}
		$options = array('conditions' => array('Businessplan.' . $this->Businessplan->primaryKey => $id));
		$this->set('businessplan', $this->Businessplan->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Businessplan->create();
			if ($this->Businessplan->save($this->request->data)) {
				$this->Session->setFlash(__('The businessplan has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The businessplan could not be saved. Please, try again.'));
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
		$this->Businessplan->id = $id;
		if (!$this->Businessplan->exists($id)) {
			throw new NotFoundException(__('Invalid businessplan'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Businessplan->save($this->request->data)) {
				$this->Session->setFlash(__('The businessplan has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The businessplan could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Businessplan.' . $this->Businessplan->primaryKey => $id));
			$this->request->data = $this->Businessplan->find('first', $options);
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
		$this->Businessplan->id = $id;
		if (!$this->Businessplan->exists()) {
			throw new NotFoundException(__('Invalid businessplan'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Businessplan->delete()) {
			$this->Session->setFlash(__('The businessplan has been deleted.'));
		} else {
			$this->Session->setFlash(__('The businessplan could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
