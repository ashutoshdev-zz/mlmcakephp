<?php

App::uses('AppController', 'Controller');

/**
 * PaymentAccounts Controller
 *
 * @property PaymentAccount $PaymentAccount
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class LotteriesController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->set('uid', $this->Auth->user('id'));
        $this->lotteryno();
        $this->Auth->allow('blocklottery');
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
        $cml = $this->Auth->user('cml');
        $uid = $this->Auth->user('id');
        $quantity = 5;
        $numbers = range(1, 75);
        shuffle($numbers);
        $mega_million = array_slice($numbers, 1, $quantity);

        //print_r($mega_million);
        //echo "mega_million<br/>";
        $quantity_powerball = 1;
        $numbers_mega_power = range(1, 15);
        shuffle($numbers_mega_power);
        $mega_power_ball = array_slice($numbers_mega_power, 1, $quantity_powerball);
        // print_r($mega_power_ball);
        // echo "mega_million_ball<br/>";
        $numbers_euro = range(1, 50);
        shuffle($numbers_euro);
        $euromillion = array_slice($numbers_euro, 1, $quantity);

        //print_r($euromillion);
        //echo "euro_million<br/>";

        $quantity_epb = 2;
        $numbers_euro_pb = range(1, 11);
        shuffle($numbers_euro_pb);
        $euromillion_pb = array_slice($numbers_euro_pb, 1, $quantity_epb);
        // print_r($euromillion_pb);
        //echo "mega_million_pb<br/>";
        $uspb_pb = range(1, 59);
        shuffle($uspb_pb);
        $us_pb = array_slice($uspb_pb, 1, $quantity);
        //print_r($us_pb);
        //echo "uspb<br/>";
        $uspb_pb_pb = range(1, 35);
        shuffle($uspb_pb_pb);
        $us_pb_pb = array_slice($uspb_pb_pb, 1, $quantity_powerball);
        //print_r($us_pb_pb);
        //echo "pb<br/>";
        $this->Lottery->data['Lottery']['user_id'] = $uid;
        $this->Lottery->data['Lottery']['status'] = 0;
        if ($cml == 'silver') {
            $this->Lottery->data['Lottery']['usmegamellion'] = serialize($mega_million);
            $this->Lottery->data['Lottery']['usmegapowerball'] = serialize($mega_power_ball);
        } else if ($cml == 'gold') {
            $this->Lottery->data['Lottery']['usmegamellion'] = serialize($mega_million);
            $this->Lottery->data['Lottery']['usmegapowerball'] = serialize($mega_power_ball);
            $this->Lottery->data['Lottery']['euromillion'] = serialize($euromillion);
            $this->Lottery->data['Lottery']['europb'] = serialize($euromillion_pb);
        } else if ($cml == 'platinum') {
            $this->Lottery->data['Lottery']['usmegamellion'] = serialize($mega_million);
            $this->Lottery->data['Lottery']['usmegapowerball'] = serialize($mega_power_ball);
            $this->Lottery->data['Lottery']['euromillion'] = serialize($euromillion);
            $this->Lottery->data['Lottery']['europb'] = serialize($euromillion_pb);
            $this->Lottery->data['Lottery']['uspb'] = serialize($us_pb);
            $this->Lottery->data['Lottery']['pb'] = serialize($us_pb_pb);
        }

        $udata = $this->Lottery->find('count', array('conditions' => array('Lottery.user_id' => $uid)));

        if ($udata == 0) {
            if ($this->Lottery->save($this->Lottery->data)) {
                $this->Session->setFlash(__('If you do not have a saved set of numbers that fits the rules of your lottery subscription, the system will use your default numbers.'));
                 $this->redirect("/Lotteries");
                } else {
                $this->Session->setFlash(__('Your Lottery no. has been given below!'));
            }
        } else {
            $this->Session->setFlash(__('Your Lottery no. has been given below!'));
        }
    }

    public function upgrade_memeber_lottery() {
        $cml = $this->Auth->user('cml');

        $uid = $this->Auth->user('id');
        $quantity = 5;
        $numbers = range(1, 75);
        shuffle($numbers);
        $mega_million = array_slice($numbers, 1, $quantity);

        //print_r($mega_million);
        //echo "mega_million<br/>";
        $quantity_powerball = 1;
        $numbers_mega_power = range(1, 15);
        shuffle($numbers_mega_power);
        $mega_power_ball = array_slice($numbers_mega_power, 1, $quantity_powerball);
        // print_r($mega_power_ball);
        // echo "mega_million_ball<br/>";
        $numbers_euro = range(1, 50);
        shuffle($numbers_euro);
        $euromillion = array_slice($numbers_euro, 1, $quantity);

        //print_r($euromillion);
        //echo "euro_million<br/>";

        $quantity_epb = 2;
        $numbers_euro_pb = range(1, 11);
        shuffle($numbers_euro_pb);
        $euromillion_pb = array_slice($numbers_euro_pb, 1, $quantity_epb);
        // print_r($euromillion_pb);
        //echo "mega_million_pb<br/>";
        $uspb_pb = range(1, 59);
        shuffle($uspb_pb);
        $us_pb = array_slice($uspb_pb, 1, $quantity);
        //print_r($us_pb);
        //echo "uspb<br/>";
        $uspb_pb_pb = range(1, 35);
        shuffle($uspb_pb_pb);
        $us_pb_pb = array_slice($uspb_pb_pb, 1, $quantity_powerball);
        //print_r($us_pb_pb);
        //echo "pb<br/>";
        $this->Lottery->data['Lottery']['user_id'] = $uid;
        $this->Lottery->data['Lottery']['status'] = 0;
        $udata = $this->Lottery->find('first', array('conditions' => array('AND' => array('Lottery.user_id' => $uid, 'Lottery.status' => 0))));

        if ($cml == 'silver') {
            $this->Lottery->data['Lottery']['usmegamellion'] = serialize($mega_million);
            $this->Lottery->data['Lottery']['usmegapowerball'] = serialize($mega_power_ball);
        } else if ($cml == 'gold') {

            $this->Lottery->data['Lottery']['euromillion'] = serialize($euromillion);
            $this->Lottery->data['Lottery']['europb'] = serialize($euromillion_pb);
        } else if ($cml == 'platinum') {

            $this->Lottery->data['Lottery']['uspb'] = serialize($us_pb);
            $this->Lottery->data['Lottery']['pb'] = serialize($us_pb_pb);
        }



        if ($udata) {

            $this->Lottery->id = $udata['Lottery']['id'];

            if ($this->Lottery->save($this->Lottery->data)) {
                $this->Session->setFlash(__('If you do not have a saved set of numbers that fits the rules of your lottery subscription, the system will use your default numbers.'));
                $this->redirect("/Lotteries");
            } else {
                $this->Session->setFlash(__('Your Lottery no. has been generated!'));
                $this->redirect("/Lotteries");
            }
        } else {
            $this->Session->setFlash(__('Your Lottery no. has been generated!'));
            $this->redirect("/Lotteries");
        }
    }

    public function blocklottery() {
        Configure::write('debug', 2);
             $this->loadModel('Playlott');
           $pdata=$this->Playlott->find('all');
           foreach ($pdata as $data){
               $uid=$data['Playlott']['uid'];
                $sdate=$data['Playlott']['startdate'];
                $cdate=date("Y-m-d");
                $dif=  strtotime($sdate)-strtotime($cdate);
                $days= floor($dif/86400); 
               if($days<=3){
                $this->Lottery->updateAll(array('Lottery.status'=>1),array('Lottery.user_id'=>$uid));
                 
               }
               }
               
           
         exit;
            
           
      
    }

    /**
     * 
     */
    public function lotteryno() {
        $id = $this->Auth->user('id');
        if ($id) {
            $lottery_data = $this->Lottery->find('first', array('conditions' => array('Lottery.user_id' => $id)));
            $this->set('lotterydata', $lottery_data);
        } else {
            $this->redirect("/users/login");
        }
    }

   

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->PaymentAccount->exists($id)) {
            throw new NotFoundException(__('Invalid payment account'));
        }
        $options = array('conditions' => array('PaymentAccount.' . $this->PaymentAccount->primaryKey => $id));
        $this->set('paymentAccount', $this->PaymentAccount->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->PaymentAccount->create();
            if ($this->PaymentAccount->save($this->request->data)) {
                $this->Session->setFlash(__('The payment account has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The payment account could not be saved. Please, try again.'));
            }
        }
        $users = $this->PaymentAccount->User->find('list');
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
        if (!$this->PaymentAccount->exists($id)) {
            throw new NotFoundException(__('Invalid payment account'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->PaymentAccount->save($this->request->data)) {
                $this->Session->setFlash(__('The payment account has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The payment account could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('PaymentAccount.' . $this->PaymentAccount->primaryKey => $id));
            $this->request->data = $this->PaymentAccount->find('first', $options);
        }
        $users = $this->PaymentAccount->User->find('list');
        $this->set(compact('users'));
    }

    /**
     * 
     */
    public function usmegamillion() {
        $id = $this->Auth->user('id');
        $lottery_status = $this->Lottery->find('first', array('conditions' => array('Lottery.user_id' => $id)));

        if ($lottery_status['Lottery']['status'] != 0) {
            $this->Session->setFlash(__("you are not authorized to view this page!"));
            $this->redirect("/lotteries/index");
        } else {
            if($this->request->is('post'))
            {
                if($this->request->data['Lottery']['usmegamellion']=="")
                {
                
                 $this->Lottery->data['Lottery']['usmegamellion'] = $lottery_status['Lottery']['usmegamellion'];
                }
                else
                {
             $usm[]=$this->request->data['Lottery']['usmegamellion'];
             $this->Lottery->data['Lottery']['usmegamellion'] = serialize($usm);
                }
                if($this->request->data['Lottery']['usmegapowerball']=="")
                {
               $this->Lottery->data['Lottery']['usmegapowerball'] = $lottery_status['Lottery']['usmegapowerball'];
                }
                else
                {
                  $uspb[]=$this->request->data['Lottery']['usmegapowerball']; 
                   $this->Lottery->data['Lottery']['usmegapowerball'] = serialize($uspb);
                }
             
           
             $this->Lottery->id = $lottery_status['Lottery']['id'];
           
             if($this->Lottery->save($this->Lottery->data))
             {
                  $this->Session->setFlash(__("Your lottery no has been changed!"));
                  $this->redirect("/lotteries/index");
             }
             else
             {
                  $this->Session->setFlash(__("Your lottery no has not been changed!"));
                  $this->redirect("/lotteries/index"); 
             }
            }
            
        }
    }

    public function euromillion() {

        $cml = $this->Auth->user('cml');
        if ($cml == 'silver') {
            $this->Session->setFlash(__("you are not authorized to view this page!"));
            $this->redirect("/lotteries/index");
        }
        $id = $this->Auth->user('id');
        $lottery_status = $this->Lottery->find('first', array('conditions' => array('Lottery.user_id' => $id)));

        if ($lottery_status['Lottery']['status'] != 0) {
            $this->Session->setFlash(__("you are not authorized to view this page!"));
            $this->redirect("/lotteries/index");
        }
        else
        {
            
            if($this->request->is('post'))
            {
                if($this->request->data['Lottery']['euromillion']=="")
                {
                
                 $this->Lottery->data['Lottery']['euromillion'] = $lottery_status['Lottery']['euromillion'];
                }
                else
                {
             $usm[]=$this->request->data['Lottery']['euromillion'];
             $this->Lottery->data['Lottery']['euromillion'] = serialize($usm);
                }
                if($this->request->data['Lottery']['europb']=="")
                {
               $this->Lottery->data['Lottery']['europb'] = $lottery_status['Lottery']['europb'];
                }
                else
                {
                  $uspb[]=$this->request->data['Lottery']['europb']; 
                   $this->Lottery->data['Lottery']['europb'] = serialize($uspb);
                }
             
           
             $this->Lottery->id = $lottery_status['Lottery']['id'];
           
             if($this->Lottery->save($this->Lottery->data))
             {
                  $this->Session->setFlash(__("Your lottery no has been changed!"));
                  $this->redirect("/lotteries/index");
             }
             else
             {
                  $this->Session->setFlash(__("Your lottery no has not been changed!"));
                  $this->redirect("/lotteries/index"); 
             }
            }
            
        }
    }

    public function powerball() {
        $cml = $this->Auth->user('cml');
        if ($cml == 'silver' || $cml == 'gold') {
            $this->Session->setFlash(__("you are not authorized to view this page!"));
            $this->redirect("/lotteries/index");
        }
        $id = $this->Auth->user('id');
        $lottery_status = $this->Lottery->find('first', array('conditions' => array('Lottery.user_id' => $id)));

        if ($lottery_status['Lottery']['status'] != 0) {
            $this->Session->setFlash(__("you are not authorized to view this page!"));
            $this->redirect("/lotteries/index");
        }
 else {
      if($this->request->is('post'))
            {
                if($this->request->data['Lottery']['uspb']=="")
                {
                
                 $this->Lottery->data['Lottery']['uspb'] = $lottery_status['Lottery']['uspb'];
                }
                else
                {
             $usm[]=$this->request->data['Lottery']['uspb'];
             $this->Lottery->data['Lottery']['uspb'] = serialize($usm);
                }
                if($this->request->data['Lottery']['pb']=="")
                {
               $this->Lottery->data['Lottery']['pb'] = $lottery_status['Lottery']['pb'];
                }
                else
                {
                  $uspb[]=$this->request->data['Lottery']['pb']; 
                   $this->Lottery->data['Lottery']['pb'] = serialize($uspb);
                }
             
           
             $this->Lottery->id = $lottery_status['Lottery']['id'];
           
             if($this->Lottery->save($this->Lottery->data))
             {
                  $this->Session->setFlash(__("Your lottery no has been changed!"));
                  $this->redirect("/lotteries/index");
             }
             else
             {
                  $this->Session->setFlash(__("Your lottery no has not been changed!"));
                  $this->redirect("/lotteries/index"); 
             }
            }
            
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
        $this->PaymentAccount->id = $id;
        if (!$this->PaymentAccount->exists()) {
            throw new NotFoundException(__('Invalid payment account'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->PaymentAccount->delete()) {
            $this->Session->setFlash(__('The payment account has been deleted.'));
        } else {
            $this->Session->setFlash(__('The payment account could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->PaymentAccount->recursive = 0;
        $this->set('paymentAccounts', $this->Paginator->paginate());
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->PaymentAccount->exists($id)) {
            throw new NotFoundException(__('Invalid payment account'));
        }
        $options = array('conditions' => array('PaymentAccount.' . $this->PaymentAccount->primaryKey => $id));
        $this->set('paymentAccount', $this->PaymentAccount->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->PaymentAccount->create();
            if ($this->PaymentAccount->save($this->request->data)) {
                $this->Session->setFlash(__('The payment account has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The payment account could not be saved. Please, try again.'));
            }
        }
        $users = $this->PaymentAccount->User->find('list');
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
        if (!$this->PaymentAccount->exists($id)) {
            throw new NotFoundException(__('Invalid payment account'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->PaymentAccount->save($this->request->data)) {
                $this->Session->setFlash(__('The payment account has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The payment account could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('PaymentAccount.' . $this->PaymentAccount->primaryKey => $id));
            $this->request->data = $this->PaymentAccount->find('first', $options);
        }
        $users = $this->PaymentAccount->User->find('list');
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
        $this->PaymentAccount->id = $id;
        if (!$this->PaymentAccount->exists()) {
            throw new NotFoundException(__('Invalid payment account'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->PaymentAccount->delete()) {
            $this->Session->setFlash(__('The payment account has been deleted.'));
        } else {
            $this->Session->setFlash(__('The payment account could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
