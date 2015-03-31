<?php

App::uses('AppController', 'Controller');

/**
 * Memberships Controller
 *
 * @property Membership $Membership
 * @property PaginatorComponent $Paginator
 */
class MembersController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow(array('index', 'member_price', 'choose_membership_level'));
    }

    public function index() {


        if ($this->request->is('post')) {
            $data = $this->request->data;

            $this->loadModel('User');
            $datas = $this->User->find('first', array('conditions' => array('AND' => array(
                        'User.username' => $data['Memeber']['username'],
                        'User.email' => $data['Memeber']['email']))
            ));
            if ($datas) {
                $this->redirect("/members/choose_membership_level/" . base64_encode($datas['User']['id']));
            } else {
                $this->Session->setFlash(__("Username & password is not valid .Try Again!"));
                $this->redirect("/members");
            }
        }
    }

    public function member_price() {

        $this->loadModel("Basicplan");

        $this->loadModel("Businessplan");

        $qry = $this->Basicplan->find("all");

        $rst = $this->Businessplan->find("all");

        $this->set('basicp', $qry);

        $this->set('businessp', $rst);
    }

    public function choose_membership_level($id = NULL) {
        $id = base64_decode($id);
        if ($id) {
            $this->loadModel("User");
            $data = $this->User->find("first", array('conditions' => array('User.id' => $id)));
            if($data)
            {
            $this->member_price();
            $this->set('data', $data);
            }
            else {
            $this->Session->setFlash(__("You are not able to see this page!"));
            $this->redirect("/users/login");
            }
        } else {
            $this->Session->setFlash(__("You are not able to see this page!"));
            $this->redirect("/users/login");
        }
    }

    public function chkemail() {
        $this->layout = 'ajax';
        $uemail = $this->request->data['Member']['email'];
        $data = $this->Member->find('all', array('conditions' => array('Member.email' => $uemail)));
        if ($data) {
            echo "false";
            exit;
        } else {
            echo "true";
            exit;
        }
        $this->set('response', $data);
        $this->render('ajax');
    }

    public function chkuser() {
        $this->layout = 'ajax';
        $uname = $this->request->data['Member']['username'];
        $data = $this->Member->find('all', array('conditions' => array('Member.username' => $uname)));
        if (!$data) {
            echo "false";
            exit;
        } else {
            echo "true";
            exit;
        }
        $this->set('response', $data);
        $this->render('ajax');
    }

    public function admin_add() {



        if ($this->request->is('post')) {



            $this->Member->create();

            if ($this->Member->save($this->request->data)) {
                echo "ok";

                exit;
            } else {

                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
                exit;
            }
        }
        $this->set("users_list", $this->Member->find('list'));
    }

}
