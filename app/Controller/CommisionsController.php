<?php
App::uses('AppController', 'Controller');
/**
 * Commisions Controller
 *
 * @property Commision $Commision
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class CommisionsController extends AppController {

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
	public function index($id=NULL) {
	 $data= $this->Commision->find('all',array('conditions'=>array('Commision.user_id'=>$this->Auth->user('id'))));
         $this->set('commisions',$data);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Commision->exists($id)) {
			throw new NotFoundException(__('Invalid commision'));
		}
		$options = array('conditions' => array('Commision.' . $this->Commision->primaryKey => $id));
		$this->set('commision', $this->Commision->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Commision->create();
			if ($this->Commision->save($this->request->data)) {
				$this->Session->setFlash(__('The commision has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The commision could not be saved. Please, try again.'));
			}
		}
		$users = $this->Commision->User->find('list');
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Commision->exists($id)) {
			throw new NotFoundException(__('Invalid commision'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Commision->save($this->request->data)) {
				$this->Session->setFlash(__('The commision has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The commision could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Commision.' . $this->Commision->primaryKey => $id));
			$this->request->data = $this->Commision->find('first', $options);
		}
		$users = $this->Commision->User->find('list');
		$this->set(compact('users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Commision->id = $id;
		if (!$this->Commision->exists()) {
			throw new NotFoundException(__('Invalid commision'));
		}
		if ($this->Commision->delete()) {
			$this->Session->setFlash(__('The data has been deleted.'));
		} else {
			$this->Session->setFlash(__('The data could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Commision->recursive = 0;
		$this->set('commisions', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Commision->exists($id)) {
			throw new NotFoundException(__('Invalid commision'));
		}
		$options = array('conditions' => array('Commision.' . $this->Commision->primaryKey => $id));
		$this->set('commision', $this->Commision->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Commision->create();
			if ($this->Commision->save($this->request->data)) {
				$this->Session->setFlash(__('The commision has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The commision could not be saved. Please, try again.'));
			}
		}
		$users = $this->Commision->User->find('list');
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
		if (!$this->Commision->exists($id)) {
			throw new NotFoundException(__('Invalid commision'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Commision->save($this->request->data)) {
				$this->Session->setFlash(__('The commision has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The commision could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Commision.' . $this->Commision->primaryKey => $id));
			$this->request->data = $this->Commision->find('first', $options);
		}
		$users = $this->Commision->User->find('list');
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
		$this->Commision->id = $id;
		if (!$this->Commision->exists()) {
			throw new NotFoundException(__('Invalid commision'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Commision->delete()) {
			$this->Session->setFlash(__('The commision has been deleted.'));
		} else {
			$this->Session->setFlash(__('The commision could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
