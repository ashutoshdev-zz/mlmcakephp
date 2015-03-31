<?php
App::uses('AppController', 'Controller');
/**
 * Basicplans Controller
 *
 * @property Basicplan $Basicplan
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class BasicplansController extends AppController {

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
		$this->Basicplan->recursive = 0;
		$this->set('basicplans', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Basicplan->exists($id)) {
			throw new NotFoundException(__('Invalid basicplan'));
		}
		$options = array('conditions' => array('Basicplan.' . $this->Basicplan->primaryKey => $id));
		$this->set('basicplan', $this->Basicplan->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Basicplan->create();
			if ($this->Basicplan->save($this->request->data)) {
				$this->Session->setFlash(__('The basicplan has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The basicplan could not be saved. Please, try again.'));
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
		if (!$this->Basicplan->exists($id)) {
			throw new NotFoundException(__('Invalid basicplan'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Basicplan->save($this->request->data)) {
				$this->Session->setFlash(__('The basicplan has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The basicplan could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Basicplan.' . $this->Basicplan->primaryKey => $id));
			$this->request->data = $this->Basicplan->find('first', $options);
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
		$this->Basicplan->id = $id;
		if (!$this->Basicplan->exists()) {
			throw new NotFoundException(__('Invalid basicplan'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Basicplan->delete()) {
			$this->Session->setFlash(__('The basicplan has been deleted.'));
		} else {
			$this->Session->setFlash(__('The basicplan could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Basicplan->recursive = 0;
		 if($this->request->is("post")){
            if($this->request->data["keyword"]){
                    $keyword = trim($this->request->data["keyword"]);
                $this->paginate = array("limit"=>20,"conditions"=>array("OR"=>array(
                    "Basicplan.silver LIKE"=>"%".$keyword."%",
                    "Basicplan.gold LIKE"=>"%".$keyword."%",
                    "Basicplan.platinum LIKE"=>"%".$keyword."%"

                )));
            $this->set("keyword",$keyword);
              }
            }
            $this->set('basicplans', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Basicplan->exists($id)) {
			throw new NotFoundException(__('Invalid basicplan'));
		}
		$options = array('conditions' => array('Basicplan.' . $this->Basicplan->primaryKey => $id));
		$this->set('basicplan', $this->Basicplan->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Basicplan->create();
			if ($this->Basicplan->save($this->request->data)) {
				$this->Session->setFlash(__('The basicplan has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The basicplan could not be saved. Please, try again.'));
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
		$this->Basicplan->id = $id;
		if (!$this->Basicplan->exists($id)) {
			throw new NotFoundException(__('Invalid basicplan'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Basicplan->save($this->request->data)) {
				$this->Session->setFlash(__('The basicplan has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The basicplan could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Basicplan.' . $this->Basicplan->primaryKey => $id));
			$this->request->data = $this->Basicplan->find('first', $options);
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
		$this->Basicplan->id = $id;
		if (!$this->Basicplan->exists()) {
			throw new NotFoundException(__('Invalid basicplan'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Basicplan->delete()) {
			$this->Session->setFlash(__('The basicplan has been deleted.'));
		} else {
			$this->Session->setFlash(__('The basicplan could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
