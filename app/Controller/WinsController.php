<?php
App::uses('AppController', 'Controller');
/**
 * Wins Controller
 *
 * @property Win $Win
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class WinsController extends AppController {

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
	 $data= $this->Win->find('all',array('conditions'=>array('Win.user_id'=>$this->Auth->user('id'))));
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
		if (!$this->Win->exists($id)) {
			throw new NotFoundException(__('Invalid win'));
		}
		$options = array('conditions' => array('Win.' . $this->Win->primaryKey => $id));
		$this->set('win', $this->Win->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Win->create();
			if ($this->Win->save($this->request->data)) {
				$this->Session->setFlash(__('The win has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The win could not be saved. Please, try again.'));
			}
		}
		$users = $this->Win->User->find('list');
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
		if (!$this->Win->exists($id)) {
			throw new NotFoundException(__('Invalid win'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Win->save($this->request->data)) {
				$this->Session->setFlash(__('The win has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The win could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Win.' . $this->Win->primaryKey => $id));
			$this->request->data = $this->Win->find('first', $options);
		}
		$users = $this->Win->User->find('list');
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
		$this->Win->id = $id;
		if (!$this->Win->exists()) {
			throw new NotFoundException(__('Invalid win'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Win->delete()) {
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
		$this->Win->recursive = 0;
		$this->set('wins', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Win->exists($id)) {
			throw new NotFoundException(__('Invalid win'));
		}
		$options = array('conditions' => array('Win.' . $this->Win->primaryKey => $id));
		$this->set('win', $this->Win->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Win->create();
			if ($this->Win->save($this->request->data)) {
				$this->Session->setFlash(__('The win has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The win could not be saved. Please, try again.'));
			}
		}
		$users = $this->Win->User->find('list');
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
		if (!$this->Win->exists($id)) {
			throw new NotFoundException(__('Invalid win'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Win->save($this->request->data)) {
				$this->Session->setFlash(__('The win has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The win could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Win.' . $this->Win->primaryKey => $id));
			$this->request->data = $this->Win->find('first', $options);
		}
		$users = $this->Win->User->find('list');
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
		$this->Win->id = $id;
		if (!$this->Win->exists()) {
			throw new NotFoundException(__('Invalid win'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Win->delete()) {
			$this->Session->setFlash(__('The win has been deleted.'));
		} else {
			$this->Session->setFlash(__('The win could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
