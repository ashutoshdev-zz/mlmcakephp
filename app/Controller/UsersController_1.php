<?php

App::uses('AppController', 'Controller');

/**

 * Users Controller

 *

 * @property User $User

 * @property PaginatorComponent $Paginator

 */
class UsersController extends AppController {

//     var $name = 'Users';



    public function beforeFilter() {

        parent::beforeFilter();

        $this->Auth->allow(array('admin_login', 'admin_forgetpwd', 'forgetpwd',
            'login', 'admin_reset', 'reset', 'join', 'contact', 'chkuser', 'schkuser', 'logout', 'chkemail', 'verify', 'curl', 'test', 'member_price'));
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
    public function index() {

        $this->User->recursive = 0;

        $this->set('users', $this->Paginator->paginate());
    }

    /**

     * view method

     *

     * @throws NotFoundException

     * @param string $id

     * @return void

     */
    public function view($id = null) {

        if (!$this->User->exists($id)) {

            throw new NotFoundException(__('Invalid user'));
        }

        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));

        $this->set('user', $this->User->find('first', $options));
    }

    /**

     * add method

     *

     * @return void

     */
    public function add() {

        if ($this->request->is('post')) {

            $this->User->create();

            if ($this->User->save($this->request->data)) {

                $this->Session->setFlash(__('The user has been saved.'));

                return $this->redirect(array('action' => 'index'));
            } else {

                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        }
    }

    /**

     * 

     */
    public function login() {



        if ($this->request->is('post')) {

            if ($this->Auth->login()) {

                $this->redirect("/users/myaccount");

                $this->Session->setFlash(__('Successfully LoggedIn!!!'));
            } else {

                $this->Session->setFlash(__('Invalid Username or Password, Please Try Again!!!'));

                $this->redirect("/users/login");
            }
        } else {
            $this->member_price();
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

    public function logout() {

        $this->Auth->logout();

        $this->redirect("/users/login");
    }

    /**

     * 

     */
    public function myaccount() {

        $uid = $this->Auth->user('id');

        $data = $this->User->find('first', array('conditions' => array('User.id' => $uid)));

        $this->set('data', $data);
    }

    /**

     * Set Cookies method

     * @throws NotFoundException

     * @param string $id

     * @return void

     */
    protected function _setCookie($id) {

        if (!$this->request->data('User.remember_me')) {

            return false;
        }

        $data = array(
            'username' => $this->request->data('User.username'),
            'password' => $this->request->data('User.password')
        );

        $this->Cookie->write('User', $data, true, '+2 week');

        return true;
    }

    public function join() {

        if ($this->request->is('post')) {
            $this->loadModel('Basicplan');
            $this->loadModel('Businessplan');
            $bap = $this->Basicplan->find('all', array('conditions' => array('Basicplan.id' => 1)));
            $bup = $this->Businessplan->find('all', array('conditions' => array('Businessplan.id' => 1)));

            if ($this->request->data['User']['cmt'] == "basic") {
                if (!empty($this->request->data['User']['susername'])) {
                    $this->Session->setFlash(__('Hmmm !You are unable to register Now! ', true));
                    return $this->redirect(array('controller' => 'Users', 'action' => 'join'));
                } else {

                    if ($this->request->data['User']['cml'] == "silver") {
                        $plan = $bap[0]['Basicplan']['silver'];
                    } else if ($this->request->data['User']['cml'] == "gold") {
                        $plan = $bap[0]['Basicplan']['gold'];
                    } else if ($this->request->data['User']['cml'] == "platinum") {
                        $plan = $bap[0]['Basicplan']['platinum'];
                    }


                    $this->User->create();
                    $this->User->data['User']['role'] = 'User';
                    $this->User->data['User']['parent_id'] = 0;
                    $this->User->data['User']['basic'] = 1;
                    if ($this->User->save($this->request->data)) {
                        $id = $this->User->getLastInsertId();
                        $url = Router::url(array('controller' => 'Users', 'action' => 'verify'), true) . '/' . base64_encode($this->User->getLastInsertId());
                        $ms = "<p>Click the Link below to verify your E-mail.</p><br /> " . $url;
                        $l = new CakeEmail('smtp');
                        $l->emailFormat('html')->template('default', 'default')->subject('Verify Your E-mail')
                                ->to($this->request->data['User']['email'])->send($ms);
                        $this->set('smtp_errors', "none");
                        echo "hello";
                        exit;
//                    $this->Session->setFlash(__('Check Your Email To verify your E-mail', true));
//                    return $this->redirect(array('controller' => 'Users', 'action' => 'login'));
                    } else {
                        $this->Session->setFlash(__('Registration does not sucessfull!', true));
                    }
                }
            } else if ($this->request->data['User']['cmt'] == "business") {
                if (empty($this->request->data['User']['susername'])) {
                    $this->Session->setFlash(__('Hmmm !You are unable to register Now! ', true));
                    return $this->redirect(array('controller' => 'Users', 'action' => 'join'));
                } else {
                    if ($this->request->data['User']['cml'] == "silver") {
                        $plan = $bup[0]['Businessplan']['silver'];
                    } else if ($this->request->data['User']['cml'] == "gold") {
                        $plan = $bup[0]['Businessplan']['gold'];
                    } else if ($this->request->data['User']['cml'] == "platinum") {
                        $plan = $bup[0]['Businessplan']['platinum'];
                    }

                    $this->User->data['User']['basic'] = 0;

                    $this->User->create();

                    $userdata = $this->User->find("first", array('conditions' => array('And' => array('User.role' => 'Admin', 'User.id' => 1))));

                    $parrentuname = $userdata['User']['username'];

                    $this->User->data['User']['parrentuid'] = $parrentuname;

                    $parent_id = $userdata['User']['id'];

                    $this->User->data['User']['parent_id'] = $parent_id;

                    $this->User->data['User']['puid'] = 1;

                    $this->User->data['User']['role'] = 'User';

                    if ($this->User->save($this->request->data)) {

                        $id = $this->User->getLastInsertId();

                        $url = Router::url(array('controller' => 'Users', 'action' => 'verify'), true) . '/' . base64_encode($this->User->getLastInsertId());

                        $ms = "<p>Click the Link below to verify your E-mail.</p><br /> " . $url;

                        $l = new CakeEmail('smtp');

                        $l->emailFormat('html')->template('default', 'default')->subject('Verify Your E-mail')
                                ->to($this->request->data['User']['email'])->send($ms);

                        $this->set('smtp_errors', "none");



                        $this->Session->setFlash(__('Check Your Email To verify your E-mail', true));



                        return $this->redirect(array('controller' => 'Users', 'action' => 'login'));
                    } else {

                        $this->Session->setFlash(__('Registration does not sucessfull!', true));
                        return $this->redirect(array('controller' => 'Users', 'action' => 'join'));
                    }
                }
            } else {
                $this->Session->setFlash(__('Registration does not sucessful!', true));
                return $this->redirect(array('controller' => 'Users', 'action' => 'join'));
            }
        } else {


            $this->member_price();
        }
    }

    /**
     * @param type $id
     * @return type
     */
    public function verify($id = null) {

        Configure::write('debug', 2);

        $id = base64_decode($id);

        $this->User->id = $id;

        $arr1 = $this->User->query("update `users` set `confirm`='1' where `id`=$id");

        $this->Session->setFlash(__('Congratulations!! your E-mail has been verified!!! '));

        return $this->redirect('/users/login');
    }

    /**

     * 

     */
    public function chkuser() {

        $this->layout = 'ajax';

        $uname = $this->request->data['User']['username'];

        $data = $this->User->find('count', array('conditions' => array('User.username' => $uname)));



        if ($data) {

            echo "false";

            exit;
        } else {

            echo "true";

            exit;
        }

        $this->set('reponse', $reponse);

        $this->render('ajax');
    }

    /**

     * 

     */
    public function chkemail() {

        $this->layout = 'ajax';

        $uname = $this->request->data['User']['email'];

        $data = $this->User->find('count', array('conditions' => array('User.email' => $uname)));



        if ($data) {

            echo "false";

            exit;
        } else {

            echo "true";

            exit;
        }

        $this->set('reponse', $reponse);

        $this->render('ajax');
    }

    /**

     * 

     */
    public function checkeditemail() {

        debug();

        $this->layout = 'ajax';

        $uname = $this->request->data['User']['email'];

        $data = $this->User->find('count', array('conditions' => array('User.email' => $uname)));



        if ($data) {

            echo "false";

            exit;
        } else {

            echo "true";

            exit;
        }

        $this->set('reponse', $reponse);

        $this->render('ajax');
    }

    /**

     * 

     */
    public function schkuser() {

        $this->layout = 'ajax';

        $uname = $this->request->data['User']['susername'];

        $data = $this->User->find('count', array('conditions' => array('User.username' => $uname, 'User.status' => 1, 'User.basic' => 0)));



        if (!$data) {

            echo "false";

            exit;
        } else {

            echo "true";

            exit;
        }

        $this->set('reponse', $reponse);

        $this->render('ajax');
    }

    /**

     * edit method

     *

     * @throws NotFoundException

     * @param string $id

     * @return void

     */
    public function edit($id = null) {

        $id = explode('ASH', $id);



        $id = base64_decode($id[0]);

        $this->User->id = $id;

        if (!$this->User->exists($id)) {



            return $this->redirect(array('action' => 'personal_details'));
        }

        if ($this->request->is('post') || $this->request->is('put')) {

            if ($this->User->save($this->request->data)) {

                $this->Session->setFlash(__('The user has been saved.'));

                return $this->redirect(array('action' => 'personal_details'));
            } else {

                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        } else {

            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));

            $data = $this->request->data = $this->User->find('first', $options);

            $this->set('data', $data);

            $qry = $this->User->query("SELECT * FROM `basicplans`");

            $this->set('basicp', $qry);

            $rst = $this->User->query("SELECT * FROM `businessplans`");

            $this->set('businessp', $rst);
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

        $this->User->id = $id;

        if (!$this->User->exists()) {

            throw new NotFoundException(__('Invalid user'));
        }

        $this->request->allowMethod('post', 'delete');

        if ($this->User->delete()) {

            $this->Session->setFlash(__('The user has been deleted.'));
        } else {

            $this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(array('action' => 'index'));
    }

    /**

     * 

     */
    public function contact() {



        if ($this->request->is('post')) {

            $datas = $this->User->find('first', array('conditions' => array('User.role' => 'Admin')));







            $ms = "<b>Name:" . $this->request->data['User']['name'] . "</b><br/>";

            $ms.="<b>E-mail:" . $this->request->data['User']['email'] . "</b><br/>";

            $ms.="<b>Subject:" . $this->request->data['User']['subject'] . "</b><br/>";

            $ms.="<b>Message:" . $this->request->data['User']['msg'] . "</b><br/>";

            $l = new CakeEmail('smtp');

            $l->emailFormat('html')->template('default', 'default')->subject('Contact Us')
                    ->to($datas['User']['email'])->send($ms);

            $this->set('smtp_errors', "none");

            $this->Session->setFlash(__('You message has been sent!', true));

            $this->redirect(array('controller' => 'pages', 'action' => 'contact'));
        }
    }

    /**

     * 

     */
    public function personal_details() {

        $uid = $this->Auth->user('id');

        $data = $this->User->find('first', array('conditions' => array('User.id' => $uid)));

        $this->set('data', $data);
    }

    public function mln() {
        
    }

    public function wc() {
        
    }

    public function admin_user_tree($userId = 1) {
        $this->loadModel('User');

        $user = $this->User->find('first', array(
            "conditions" => array(
                "User.id" => $userId
            )
        ));

        $comments = $this->User->children($userId, false);

        $comments[] = $user;

        $this->set('tree', Hash::nest($comments));
        $this->render("admin_user_tree", "admin");
    }

    public function user_tree() {
        $this->loadModel('User');
        $userId = $this->Auth->user('id');

        $user = $this->User->find('first', array(
            "conditions" => array(
                "User.id" => $userId
            )
        ));

        $comments = $this->User->children($userId, false);

        $comments[] = $user;

        $this->set('tree', Hash::nest($comments));
    }

    public function admin_tree_search() {

        $uname = $this->request->data['User']['search'];

        $data = $this->User->find('first', array('conditions' => array('User.username' => $uname)));

        if ($data) {

            print_r($data);
        } else {

            $this->Session->setFlash(__("Sorry unvalid keyword! Try Again!", TRUE));
        }

        exit;
    }

    public function user_parent() {

        $userId = $this->Auth->user('id');

        $this->set('tree', Hash::nest($this->User->getPath($userId)));

        $this->render("user_tree", "default");
    }

    public function admin_reply($id = NULL) {
        if ($this->request->is(array('post'))) {

            $sub = $this->request->data['User']['subject'];
            $ms = $this->request->data['User']['description'];
            $email = $this->request->data['User']['email'];


            $l = new CakeEmail('smtp');

            $l->emailFormat('html')->template('default', 'default')->subject($sub)
                    ->to($email)->send($ms);
            $this->Session->setFlash(__("You have sent Newsletter!"));
            $data = $this->User->find('first', array('conditions' => array('User.id' => $id)));
            $this->set('email', $data);
        } else {
            $data = $this->User->find('first', array('conditions' => array('User.id' => $id)));
            $this->set('email', $data);
        }
    }

    public function admin_index() {

        $this->layout = "admin";

        $this->User->recursive = 0;

        if ($this->request->is("post")) {

            if ($this->request->data["keyword"]) {

                $keyword = trim($this->request->data["keyword"]);

                $this->paginate = array("limit" => 20, "conditions" => array("OR" => array(
                            "User.username LIKE" => "%" . $keyword . "%",
                            "User.email LIKE" => "%" . $keyword . "%",
                            "User.phone_no LIKE" => "%" . $keyword . "%"
                )));

                $this->set("keyword", $keyword);
            }
        }

        $this->set('users', $x = $this->Paginator->paginate());

//        debug($x);exit;
    }

    /**

     * admin_view method

     *

     * @throws NotFoundException

     * @param string $id

     * @return void

     */
    public function admin_view($id = null) {

        $this->layout = "admin";

        if (!$this->User->exists($id)) {

            throw new NotFoundException(__('Invalid user'));
        }

        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));

        $this->set('user', $this->User->find('first', $options));
    }

    /**

     * admin_add method

     *

     * @return void

     */
    public function admin_add() {

        $this->layout = "admin";

        if ($this->request->is('post')) {


            if ($this->User->hasAny(array('User.username' => $this->request->data['User']['username']))) {

                $this->Session->setFlash(__('Username already exist!!!'));

                return $this->redirect(array('action' => 'admin_add'));
            } else {

                if ($this->User->hasAny(array('User.email' => $this->request->data['User']['email']))) {

                    $this->Session->setFlash(__('Email already exist!!!'));

                    return $this->redirect(array('action' => 'admin_add'));
                } else {

                    $this->User->create();

                    if ($this->User->save($this->request->data)) {



//                        $id=$this->User->getLastInsertID();
//                        $data=$this->User->find('first',array('conditions'=>array('User.id'=>$id)));
//                        $fname=$data['User']['fname'];
//                        $lname=$data['User']['lname'];
//                        $cor=$data['User']['cor'];
//                        $cmt=$data['User']['cmt'];
//                        $cml=$data['User']['cml'];
//                        $email=$data['User']['email'];
//                        $currency=$data['User']['currency'];
//                        $uid=$data['User']['id'];
//                     
//                        $this->loadModel('Member');
//                        $qry=$this->Member->query("INSERT INTO members (fname,lname,cor,cmt,cml,email,currency,uid,parent_id)
//VALUES ('$fname','$lname','$cor','$cmt','$cml','$email','$currency','$uid','$uid')");

                        $this->Session->setFlash(__('The user has been saved.'));

                        return $this->redirect(array('action' => 'index'));
                    } else {

                        $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
                    }
                }
            }
        }

        $this->set("users_list", $this->User->find('list'));
    }

    /**

     * admin_edit method

     *

     * @throws NotFoundException

     * @param string $id

     * @return void

     */
    public function admin_edit($id = null) {

        $this->layout = "admin";

        $this->User->id = $id;

        if (!$this->User->exists()) {

            throw new NotFoundException(__('Invalid User'));
        }

        if ($this->request->is('post') || $this->request->is('put')) {

            if ($this->User->save($this->request->data)) {

                $this->Session->setFlash(__('The User has been saved'));

                $this->redirect(array('action' => 'admin_index'));
            } else {

                $this->Session->setFlash(__('The User could not be saved. Please, try again.'));
            }
        } else {

            $this->request->data = $this->User->read(null, $id);
        }

        $this->set('admin_edit', $this->User->find('first', array('conditions' => array('User.id' => $id))));
    }

    /**

     * admin_delete method

     *

     * @throws NotFoundException

     * @param string $id

     * @return void

     */
    public function admin_delete($id = null) {

        $this->User->id = $id;

        if (!$this->User->exists()) {

            throw new NotFoundException(__('Invalid user'));
        }

        $this->request->allowMethod('post', 'delete');

        if ($this->User->delete()) {

            $this->Session->setFlash(__('The user has been deleted.'));
        } else {

            $this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(array('action' => 'index'));
    }

    public function admin_deleteall($id = null) {

        if (!$this->request->is('post')) {

            throw new MethodNotAllowedException();
        }

        foreach ($this->request['data']['User'] as $k) {

            $this->User->id = (int) $k;

            if ($this->User->exists()) {

                $this->User->delete();
            }
        }

        $this->Session->setFlash(__('Admin deleted....'));

        $this->redirect(array('action' => 'index'));
    }

    public function admin_profiles() {

        $this->layout = "admin";

        $profile = $this->User->find('first', array('conditions' => array(
                'User.id' => $this->Auth->user('id')
            ))
        );

        $this->set('admin_profiles', $profile);
    }

    public function admin_profilesedit($id = NULL) {

        $this->layout = "admin";

        $this->User->id = $id;

        $x = $this->User->find('first', array('conditions' => array('User.id' => $id)));

        if ($this->request->is('post') || $this->request->is('put')) {

            if ($this->User->save($this->request->data)) {

                $this->Session->setFlash(__('The Admin Profile has been saved'));

                $this->redirect(array('action' => 'admin_profiles'));
            } else {

                $this->Session->setFlash(__('The Admin Profile could not be saved. Please, try again.'));
            }
        } else {

            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));

            $this->request->data = $this->User->find('first', $options);

            $this->set("user_edit", $this->request->data);
        }
    }

    public function admin_changepassword() {

        $this->layout = "admin";

        if ($this->request->is('post')) {

            $password = AuthComponent::password($this->data['User']['old_password']);

            $em = $this->Auth->user('username');

            $pass = $this->User->find('first', array('conditions' => array('AND' => array('User.password' => $password, 'User.username' => $em))));

            if ($pass) {

                if ($this->data['User']['new_password'] != $this->data['User']['cpassword']) {

                    $this->Session->setFlash(__("New password and Confirm password field do not match"));
                } else {

                    $this->User->data['User']['password'] = $this->data['User']['new_password'];

                    $this->User->id = $pass['User']['id'];

                    if ($this->User->exists()) {

                        $pass['User']['password'] = $this->data['User']['new_password'];

                        if ($this->User->save()) {

                            $this->Session->setFlash(__("Password Updated"));

                            $this->redirect(array('controller' => 'Users', 'action' => 'admin_profiles'));
                        }
                    }
                }
            } else {

                $this->Session->setFlash(__("Your old password did not match."));
            }
        }
    }

    public function admin_login() {

        if ($this->request->is('post')) {

            if ($this->Auth->login()) {

                $this->redirect("/admin/users");

                $this->Session->setFlash(__('Successfully LoggedIn!!!'));
            } else {

                $this->Session->setFlash(__('Invalid Username or Password, Please Try Again!!!'));

                $this->redirect("/admin/users/login");
            }
        }
    }

    /**

     * 

     */
    public function admin_logout() {

        if ($this->Auth->logout()) {

            $this->redirect("/admin/users/login");
        }
    }

    /**

     * admin_forgetpwd method

     *

     * @throws NotFoundException

     * @param string $id

     * @return void

     */
    public function admin_forgetpwd() {

        $this->User->recursive = -1;

        if (!empty($this->data)) {

            if (empty($this->data['User']['email'])) {

                $this->Session->setFlash('Please Provide Your Email Address that You used to Register with Us');
            } else {

                $email = $this->data['User']['email'];

                $fu = $this->User->find('first', array('conditions' => array('User.email' => $email)));

                if ($fu) {

                    if ($fu['User']['status'] == "1") {

                        $key = Security::hash(String::uuid(), 'sha512', true);

                        $hash = sha1($fu['User']['email'] . rand(0, 100));

                        $url = Router::url(array('controller' => 'Users', 'action' => 'reset'), true) . '/' . $key . '#' . $hash;

                        $ms = "<p>Click the Link below to reset your password.</p><br /> " . $url;

                        $fu['User']['tokenhash'] = $key;

                        $this->User->id = $fu['User']['id'];

                        if ($this->User->saveField('tokenhash', $fu['User']['tokenhash'])) {

                            $l = new CakeEmail('smtp');

                            $l->emailFormat('html')->template('default', 'default')->subject('Reset Your Password')
                                    ->to($fu['User']['email'])->send($ms);

                            $this->set('smtp_errors', "none");

                            $this->Session->setFlash(__('Check Your Email To Reset your password', true));

                            $this->redirect(array('controller' => 'Users', 'action' => 'login'));
                        } else {

                            $this->Session->setFlash("Error Generating Reset link");
                        }
                    } else {

                        $this->Session->setFlash('This Account is not Active yet.Check Your mail to activate it');
                    }
                } else {

                    $this->Session->setFlash('Email does Not Exist');
                }
            }
        }
    }

    /**

     * forgetpwd method

     *

     * @throws NotFoundException

     * @param string $id

     * @return void

     */
    public function forgetpwd() {

        $this->User->recursive = -1;

        if (!empty($this->data)) {

            if (empty($this->data['User']['email'])) {

                $this->Session->setFlash('Please Provide Your Email Address that You used to Register with Us');
            } else {

                $email = $this->data['User']['email'];

                $fu = $this->User->find('first', array('conditions' => array('User.email' => $email)));

                if ($fu) {

                    if ($fu['User']['status'] == "1") {

                        $key = Security::hash(String::uuid(), 'sha512', true);

                        $hash = sha1($fu['User']['email'] . rand(0, 100));

                        $url = Router::url(array('controller' => 'Users', 'action' => 'reset'), true) . '/' . $key . '#' . $hash;

                        $ms = "<p>Click the Link below to reset your password.</p><br /> " . $url;

                        $fu['User']['tokenhash'] = $key;

                        $this->User->id = $fu['User']['id'];

                        if ($this->User->saveField('tokenhash', $fu['User']['tokenhash'])) {

                            $l = new CakeEmail('smtp');

                            $l->emailFormat('html')->template('default', 'default')->subject('Reset Your Password')
                                    ->to($fu['User']['email'])->send($ms);

                            $this->set('smtp_errors', "none");

                            $this->Session->setFlash(__('Check Your Email To Reset your password', true));

                            $this->redirect(array('controller' => 'Users', 'action' => 'login'));
                        } else {

                            $this->Session->setFlash("Error Generating Reset link");
                        }
                    } else {

                        $this->Session->setFlash('This Account is not Active yet.Check Your mail to activate it');
                    }
                } else {

                    $this->Session->setFlash('Email does Not Exist');
                }
            }
        }
    }

    /**

     * admin_resetpwd method

     *

     * @throws NotFoundException

     * @param string $id

     * @return void

     */
    public function admin_reset($token = null) {

        configure::write('debug', 2);

        $this->User->recursive = -1;

        if (!empty($token)) {

            $u = $this->User->findBytokenhash($token);

            if ($u) {

                $this->User->id = $u['User']['id'];

                if (!empty($this->data)) {

                    if ($this->data['User']['password'] != $this->data['User']['password_confirm']) {

                        $this->Session->setFlash("Both the passwords are not matching...");

                        return;
                    }

                    $this->User->data = $this->data;

                    $this->User->data['User']['email'] = $u['User']['email'];

                    $new_hash = sha1($u['User']['email'] . rand(0, 100)); //created token

                    $this->User->data['User']['tokenhash'] = $new_hash;

                    if ($this->User->validates(array('fieldList' => array('password', 'password_confirm')))) {

                        if ($this->User->save($this->User->data)) {

                            $this->Session->setFlash('Password Has been Updated');

                            $this->redirect(array('controller' => 'Users', 'action' => 'login'));
                        }
                    } else {

                        $this->set('errors', $this->User->invalidFields());
                    }
                }
            } else {

                $this->Session->setFlash('Token Corrupted, Please Retry.the reset link 

                        <a style="cursor: pointer; color: rgb(0, 102, 0); text-decoration: none;

                        background: url("http://files.adbrite.com/mb/images/green-double-underline-006600.gif") 

                        repeat-x scroll center bottom transparent; margin-bottom: -2px; padding-bottom: 2px;"

                        name="AdBriteInlineAd_work" id="AdBriteInlineAd_work" target="_top">work</a> only for once.');
            }
        } else {

            $this->Session->setFlash('Pls try again...');

            $this->redirect(array('controller' => 'pages', 'action' => 'login'));
        }
    }

    /**

     * reset method

     *

     * @throws NotFoundException

     * @param string $id

     * @return void

     */
    public function reset($token = null) {

        configure::write('debug', 2);

        $this->User->recursive = -1;

        if (!empty($token)) {

            $u = $this->User->findBytokenhash($token);

            if ($u) {

                $this->User->id = $u['User']['id'];

                if (!empty($this->data)) {

                    if ($this->data['User']['password'] != $this->data['User']['password_confirm']) {

                        $this->Session->setFlash("Both the passwords are not matching...");

                        return;
                    }

                    $this->User->data = $this->data;

                    $this->User->data['User']['email'] = $u['User']['email'];

                    $new_hash = sha1($u['User']['email'] . rand(0, 100)); //created token

                    $this->User->data['User']['tokenhash'] = $new_hash;

                    if ($this->User->validates(array('fieldList' => array('password', 'password_confirm')))) {

                        if ($this->User->save($this->User->data)) {

                            $this->Session->setFlash('Password Has been Updated');

                            $this->redirect(array('controller' => 'Users', 'action' => 'login'));
                        }
                    } else {

                        $this->set('errors', $this->User->invalidFields());
                    }
                }
            } else {

                $this->Session->setFlash('Token Corrupted, Please Retry.the reset link 

                        <a style="cursor: pointer; color: rgb(0, 102, 0); text-decoration: none;

                        background: url("http://files.adbrite.com/mb/images/green-double-underline-006600.gif") 

                        repeat-x scroll center bottom transparent; margin-bottom: -2px; padding-bottom: 2px;"

                        name="AdBriteInlineAd_work" id="AdBriteInlineAd_work" target="_top">work</a> only for once.');
            }
        } else {

            $this->Session->setFlash('Pls try again...');

            $this->redirect(array('controller' => 'pages', 'action' => 'login'));
        }
    }

    public function curl() {



        $login_email = 'tp12gshock.com';



        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'http://whois.domaintools.com/' . $login_email);

        curl_setopt($ch, CURLOPT_POSTFIELDS, 'q=' . urlencode($login_email));

        curl_setopt($ch, CURLOPT_POST, 1);

        curl_setopt($ch, CURLOPT_HEADER, 0);

        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

        curl_setopt($ch, CURLOPT_COOKIEJAR, "cookies.txt");

        curl_setopt($ch, CURLOPT_COOKIEFILE, "cookies.txt");

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.3) Gecko/20070309 Firefox/2.0.0.3");

        curl_setopt($ch, CURLOPT_REFERER, "http://whois.domaintools.com/");

        $page = curl_exec($ch) or die(curl_error($ch));

        echo $page;

        exit;
    }

    public function test() {

        $input = array("red", "green", "blue", "yellow");

        $a = array_splice($input, 2);

        //echo $_SERVER['REMOTE_ADDR'];
        //$qry = $this->User->find('all');

        debug($a);

        exit();
    }

    public function admin_activate($id = null) {
        $this->User->id = $id;
        if ($this->User->exists()) {
            $x = $this->User->save(array(
                'User' => array(
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
        $this->User->id = $id;
        if ($this->User->exists()) {
            $x = $this->User->save(array(
                'User' => array(
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

    public function admin_activateall($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        foreach ($this->request['data']['User'] as $k => $v) {
            if ($k == $v) {
                $this->User->id = $v;
                if ($this->User->exists()) {
                    $x = $this->User->save(array(
                        'User' => array(
                            'status' => 1
                        )
                    ));

                    $this->Session->setFlash(__('Selected Users Activated.', true));
                } else {
                    $this->Session->setFlash(__("Unable to Activate Users."));
                }
            }
        }
        $this->redirect($this->referer());
    }

    public function admin_inactivateall($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        foreach ($this->request['data']['User'] as $k => $v) {
            if ($k == $v) {
                $this->User->id = $v;
                if ($this->User->exists()) {
                    $x = $this->User->save(array(
                        'User' => array(
                            'status' => 0
                        )
                    ));
                    $this->Session->setFlash(__('Selected Users Deactivated.', true));
                } else {
                    $this->Session->setFlash(__("Unable to Deactivate Users."));
                }
            }
        }
        $this->redirect($this->referer());
    }

}
