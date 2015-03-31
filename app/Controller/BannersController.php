<?php

App::uses('AppController', 'Controller');

/**
 * Banners Controller
 *
 * @property Banner $Banner
 */
class BannersController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
    }

    public function admin_index() {
        $this->Banner->recursive = 0;
        $this->paginate = array('limit' => 20);
        $this->set('banners', $this->Banner->find('all'));
    }

    public function admin_view($id = null) {
        if (!$this->Banner->exists($id)) {
            throw new NotFoundException(__('Invalid banner'));
        }
        $options = array('conditions' => array('Banner.' . $this->Banner->primaryKey => $id));
        $this->set('banner', $this->Banner->find('first', $options));
    }

    public function admin_add() {
        if ($this->request->is('post')) {
            $this->request->data['Banner']['user_id'] = $this->Auth->User('id');
            $one = $this->request->data['Banner']['image'];
            $image_name = $this->request->data['Banner']['image'] = date('dmHis') . $one['name'];
            $this->Banner->create();
            if ($this->Banner->save($this->request->data)) {
                if ($one['error'] == 0) {
                    $pth = 'files' . DS . 'bannerimage' . DS . $image_name;
                    move_uploaded_file($one['tmp_name'], $pth);
                }
                $this->Session->setFlash(__('The banner has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The banner could not be saved. Please, try again.'));
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
        $this->Banner->id = $id;
        if (!$this->Banner->exists()) {
            throw new NotFoundException(__('Invalid banner'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            $this->request->data['Banner']['user_id'] = $this->Auth->User('id');
            $one = $this->request->data['Banner']['image'];
            $image_name = $this->request->data['Banner']['image'] = date('dmHis') . $one['name'];
            if ($one['name'] != "") {
                $x = $this->Banner->read('image', $id);
                $x = 'files' . DS . 'bannerimage' . DS . $x['Banner']['image'];
                unlink($x);
                $pth = 'files' . DS . 'bannerimage' . DS . $image_name;
                move_uploaded_file($one['tmp_name'], $pth);
            }
            if ($one['name'] == "") {
                $xc = $this->Banner->read('image', $id);
                $this->request->data['Banner']['image'] = $xc['Banner']['image'];
            }
            if ($this->Banner->save($this->request->data)) {
                $this->Session->setFlash(__('The Banner has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The Banner could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->Banner->read(null, $id);
        }
        $this->set('description', $this->Banner->find('first', array('conditions' => array('Banner.id' => $id))));
    }

    public function admin_delete($id = null) {
        $this->loadModel('User');
        $array1['Url']['url'] = "banners";
        $array2 = $this->User->findById($this->Auth->user('id'));
        $array3 = array_merge($array2, $array1);
        $this->isAuthorized($array3);
        $this->Banner->id = $id;
        if (!$this->Banner->exists()) {
            throw new NotFoundException(__('Invalid banner'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Banner->delete()) {
            $this->Session->setFlash(__('Banner deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Banner was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

    public function admin_activate($id = null) {
        $this->Banner->id = $id;
        if ($this->Banner->exists()) {
            $x = $this->Banner->save(array('Banner' => array('status' => 1)));
            $this->Session->setFlash("Banner activated successfully.");
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash("Unable to activate user.");
            $this->redirect(array('action' => 'index'));
        }
    }

    public function admin_block($id = null) {
        $this->Banner->id = $id;
        if ($this->Banner->exists()) {
            $x = $this->Banner->save(array('Banner' => array('status' => 0)));
            $this->Session->setFlash("Banner blocked successfully.");
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash("Unable to block user.");
            $this->redirect(array('action' => 'index'));
        }
    }

    public function admin_activateall($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        foreach ($this->request['data']['Banner'] as $k) {
            $this->Banner->id = (int) $k;
            if ($this->Banner->exists()) {
                $this->Banner->save(array('Banner' => array('status' => 1)));
            }
        }
        $this->Session->setFlash(__('Active Successfully.'));
        $this->redirect(array('action' => 'index'));
    }

    public function admin_inactivateall($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        foreach ($this->request['data']['Banner'] as $k) {
            $this->Banner->id = (int) $k;
            if ($this->Banner->exists()) {
                $this->Banner->save(array('Banner' => array('status' => 0)));
            }
        }
        $this->Session->setFlash(__('Deactive Successfully..'));
        $this->redirect(array('action' => 'index'));
    }

    public function admin_deleteall($id = null) {
        $this->loadModel('User');
        $array1['Url']['url'] = "banners";
        $array2 = $this->User->findById($this->Auth->user('id'));
        $array3 = array_merge($array2, $array1);
        $this->isAuthorized($array3);
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        foreach ($this->request['data']['Banner'] as $k) {
            $this->Banner->id = (int) $k;
            if ($this->Banner->exists()) {
                $this->Banner->delete();
            }
        }
        $this->Session->setFlash(__('Banner deleted....'));
        $this->redirect(array('action' => 'index'));
    }

}
