<?php

App::uses('AppController', 'Controller');

/**
 * Newsletters Controller
 *
 * @property Newsletter $Newsletter
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class NewslettersController extends AppController {
    public function beforeFilter() {
        parent::beforeFilter();
    
        $this->Auth->allow('verify','reconfirm');
    }

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
    public function index($id = NULL) {
      $data= $this->Newsletter->find('first',array('conditions'=>array('Newsletter.uid'=>$this->Auth->user('id'))));
      $this->set('data',$data);
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Newsletter->exists($id)) {
            throw new NotFoundException(__('Invalid newsletter'));
        }
        $options = array('conditions' => array('Newsletter.' . $this->Newsletter->primaryKey => $id));
        $this->set('newsletter', $this->Newsletter->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Newsletter->create();
            if ($this->Newsletter->save($this->request->data)) {

                $this->Session->setFlash(__('The newsletter has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The newsletter could not be saved. Please, try again.'));
            }
        }
    }

    public function verify($id = null) {
        if($id)
        {
        $id = base64_decode($id);
        $arr1 = $this->Newsletter->query("update `newsletters` set `confirm`='1' where `uid`=$id");
        $this->Session->setFlash(__('Congratulations!! your E-mail has been verified!!! '));
        return $this->redirect('/newsletters/index');
        }
        else
        {
           return $this->redirect('/users/login'); 
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
        if (!$this->Newsletter->exists($id)) {
            throw new NotFoundException(__('Invalid newsletter'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Newsletter->save($this->request->data)) {
                $this->Session->setFlash(__('The newsletter has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The newsletter could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Newsletter.' . $this->Newsletter->primaryKey => $id));
            $this->request->data = $this->Newsletter->find('first', $options);
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
        $this->Newsletter->id= $id;
         if (!$this->Newsletter->exists()) {
            throw new NotFoundException(__('Invalid Newsletter'));
        }
          if ($this->Newsletter->delete()) {
            $this->Session->setFlash(__('The Newsletter E-mail has been deleted'));
        } else {
            $this->Session->setFlash(__('The Newsletter could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {

        if ($this->request->is("post")) {
            if ($this->request->data["keyword"]) {
                $keyword = trim($this->request->data["keyword"]);
                $this->paginate = array("limit" => 20, "conditions" => array('AND' => array(
                            'Newsletter.confirm' => '1',
                            "Newsletter.email LIKE" => "%" . $keyword . "%"
                )));
                $this->set("keyword", $keyword);
            }
        }
        $this->paginate = array("limit" => 20, "conditions" => array('Newsletter.confirm' => '1'));
        $this->set('newsletters', $this->Paginator->paginate());
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->Newsletter->exists($id)) {
            throw new NotFoundException(__('Invalid newsletter'));
        }
        $options = array('conditions' => array('Newsletter.' . $this->Newsletter->primaryKey => $id));
        $this->set('newsletter', $this->Newsletter->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Newsletter->create();
            if ($this->Newsletter->save($this->request->data)) {
                $this->Session->setFlash(__('The newsletter has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The newsletter could not be saved. Please, try again.'));
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
        if (!$this->Newsletter->exists($id)) {
            throw new NotFoundException(__('Invalid newsletter'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Newsletter->save($this->request->data)) {
                $this->Session->setFlash(__('The newsletter has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The newsletter could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Newsletter.' . $this->Newsletter->primaryKey => $id));
            $this->request->data = $this->Newsletter->find('first', $options);
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
        $this->Newsletter->id = $id;
        if (!$this->Newsletter->exists()) {
            throw new NotFoundException(__('Invalid newsletter'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Newsletter->delete()) {
            $this->Session->setFlash(__('The newsletter has been deleted.'));
        } else {
            $this->Session->setFlash(__('The newsletter could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function admin_reply($id = NULL) {
        if ($this->request->is(array('post'))) {

            $ms = $this->request->data['Newsletter']['description'];
            $email = $this->request->data['Newsletter']['email'];


            $l = new CakeEmail('smtp');

            $l->emailFormat('html')->template('default', 'default')->subject('NewsLetter')
                    ->to($email)->send($ms);
            $this->Session->setFlash(__("You have sent Newsletter!"));
            $data = $this->Newsletter->find('first', array('conditions' => array('Newsletter.id' => $id)));
            $this->set('email', $data);
        } else {
            $data = $this->Newsletter->find('first', array('conditions' => array('Newsletter.id' => $id)));
            $this->set('email', $data);
        }
    }

    public function admin_replyall() {
        if ($this->request->is('post')) {
            $ms = $this->request->data['Newsletter']['description'];
            $datas = $this->Newsletter->find('all', array('fields' => 'email'));
            foreach ($datas as $data) {
                $l = new CakeEmail('smtp');
                $l->emailFormat('html')->template('default', 'default')->subject('NewsLetter')
                        ->to($data['Newsletter']['email'])->send($ms);
                $this->Session->setFlash(__("You have sent Newsletter!"));
            }
        }
    }

    public function news() {

        if ($this->request->is('post')) {
            $this->Newsletter->create();
            $uid=$this->Auth->user('id');
            $email = $this->request->data['Newsletter']['email'];
            $data = $this->Newsletter->find("first", array("conditions" => array('AND'=>array("Newsletter.uid" => $uid))));
            
            $this->request->data['Newsletter']['uid']=$uid;
            if (empty($data)) {
                if ($this->Newsletter->save($this->request->data)) {
                    $url = Router::url(array('controller' => 'Newsletters', 'action' => 'verify'), true) . '/' . base64_encode($uid);
                    $ms = "<p>Click the Link below to confirm  your E-mail for newsletter.</p><br /> " . $url;
                    $l = new CakeEmail('smtp');
                    $l->emailFormat('html')->template('default', 'default')->subject('Verify Your Newsletter E-mail')
                            ->to($this->request->data['Newsletter']['email'])->send($ms);
                    $this->set('smtp_errors', "none");
                    $this->Session->setFlash(__("Please varify your E-mail for newsletter"));
                    return $this->redirect(array('controller' => 'newsletters', 'action' => 'index'));
                } else {
                    $this->Session->setFlash(__("Thanks You have not been subscribed the News Letter"));
                    return $this->redirect(array('controller' => 'newsletters', 'action' => 'index'));
                }
            } else {
                $this->Session->setFlash(__("You have been already subscribe!"));
                return $this->redirect(array('controller' => 'newsletters', 'action' => 'index'));
            }
        }
    }
    public function reconfirm($id=NULL)
    {
        if($id)
        {
                    
                    $uid=$this->Auth->user('id');
                   $data= $this->Newsletter->find('first',array('conditions'=>array('Newsletter.uid'=>$uid)));
                    $url = Router::url(array('controller' => 'Newsletters', 'action' => 'verify'), true) . '/' . base64_encode($uid);
                    $ms = "<p>Click the Link below to confirm  your E-mail for newsletter.</p><br /> " . $url;
                    $l = new CakeEmail('smtp');
                    $l->emailFormat('html')->template('default', 'default')->subject('Verify Your Newsletter E-mail')
                            ->to($data['Newsletter']['email'])->send($ms);
                    $this->set('smtp_errors', "none");
                    $this->Session->setFlash(__("Please varify your E-mail for newsletter"));
                    return $this->redirect(array('controller' => 'newsletters', 'action' => 'index'));
        }
        else {
            
                    return $this->redirect(array('controller' => 'users', 'action' => 'login'));
        }
    }

}
