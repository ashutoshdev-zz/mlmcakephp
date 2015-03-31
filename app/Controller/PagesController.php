<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('AppController', 'Controller');


/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {
    public function beforeFilter() {
        parent::beforeFilter();
       $this->Auth->allow(array('display'));
         $this->loadModel("Basicplan");
        $this->loadModel("Businessplan");
        $qry=$this->Basicplan->find("all");
        $rst=$this->Businessplan->find("all");
        $this->set('basicp',$qry);
        $this->set('businessp',$rst);
        
        Configure::write('debug',2);
        $this->loadModel("Staticpage");
        $banner=$this->Staticpage->find('all',array('conditions'=>array('AND'=>array('Staticpage.position'=>'banner','Staticpage.status'=>1))));
        //print_r($banner);
        $this->set('staticbanner',$banner);
        
        $COW=$this->Staticpage->find('all',array('conditions'=>array('AND'=>array('Staticpage.position'=>'COW','Staticpage.status'=>1))));
        $this->set('staticCOW',$COW);
                
        $CYOL=$this->Staticpage->find('all',array('conditions'=>array('AND'=>array('Staticpage.position'=>'CYOL','Staticpage.status'=>1))));
        $this->set('staticCYOL',$CYOL);
                
        $BUSINESS=$this->Staticpage->find('all',array('conditions'=>array('AND'=>array('Staticpage.position'=>'BUSINESS','Staticpage.status'=>1))));
        $this->set('staticbs',$BUSINESS);
        
        $BASIC=$this->Staticpage->find('all',array('conditions'=>array('AND'=>array('Staticpage.position'=>'BASIC','Staticpage.status'=>1))));
        $this->set('staticBASIC',$BASIC);
        
        $BASIC_HOME=$this->Staticpage->find('all',array('conditions'=>array('AND'=>array('Staticpage.position'=>'BASIC_HOME','Staticpage.status'=>1))));
        $this->set('staticBASIC_HOME',$BASIC_HOME);
        
        $BUSINESS_HOME=$this->Staticpage->find('all',array('conditions'=>array('AND'=>array('Staticpage.position'=>'BUSINESS_HOME','Staticpage.status'=>1))));
        $this->set('staticbs_HOME',$BUSINESS_HOME);
        
      
        
        $hiw=$this->Staticpage->find('all',array('conditions'=>array('AND'=>array('Staticpage.position'=>'How it Work','Staticpage.status'=>1))));
        $this->set('staticHIW',$hiw);
        
        $hcp=$this->Staticpage->find('all',array('conditions'=>array('AND'=>array('Staticpage.position'=>'Who can play','Staticpage.status'=>1))));
        $this->set('staticHCP',$hcp);
        
        $Currency=$this->Staticpage->find('all',array('conditions'=>array('AND'=>array('Staticpage.position'=>'Currency','Staticpage.status'=>1))));
        
        $this->set('staticCurrency',$Currency);
        
        $Lotteries=$this->Staticpage->find('all',array('conditions'=>array('AND'=>array('Staticpage.position'=>'Lotteries','Staticpage.status'=>1))));
        $this->set('staticLo',$Lotteries);
        
        $slider=$this->Staticpage->find('all',array('conditions'=>array('AND'=>array('Staticpage.position'=>'recent News','Staticpage.status'=>1))));
        $this->set('staticSlider',$slider);
        
        $this->loadModel("Memberpage");
        $sil=$this->Memberpage->find('all',array('conditions'=>array('Memberpage.type'=>'Basic Silver')));
        $this->set('silver',$sil);
        
        $gld=$this->Memberpage->find('all',array('conditions'=>array('Memberpage.type'=>'Basic Gold')));
        $this->set('gold',$gld);
        
        $pltm=$this->Memberpage->find('all',array('conditions'=>array('Memberpage.type'=>'Basic Platinum')));
        $this->set('platinum',$pltm);
        
        $busi_sil=$this->Memberpage->find('all',array('conditions'=>array('Memberpage.type'=>'Business Silver')));
        $this->set('business_silver',$busi_sil);
        
        $busi_gold=$this->Memberpage->find('all',array('conditions'=>array('Memberpage.type'=>'Business Gold')));
        $this->set('business_gold',$busi_gold);
        
        $busi_pltm=$this->Memberpage->find('all',array('conditions'=>array('Memberpage.type'=>'Business Platinum')));
        $this->set('business_platinum',$busi_pltm);
        
        $cancel=$this->Staticpage->find('all',array('conditions'=>array('AND'=>array('Staticpage.position'=>'cancel','Staticpage.status'=>1))));
        $this->set('cancel',$cancel);
        
        $this->loadModel('Contact');
        $Contact=$this->Contact->find('all',array('conditions'=>array('Contact.status'=>1)));
        //print_r($Contact);
        $this->set('contacts',$Contact);
        
        
       
    }
   
    /**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array();

/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
	public function display() {
		$path = func_get_args();

		$count = count($path);
		if (!$count) {
			return $this->redirect('/');
		}
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}
		$this->set(compact('page', 'subpage', 'title_for_layout'));

		try {
			$this->render(implode('/', $path));
		} catch (MissingViewException $e) {
			if (Configure::read('debug')) {
				throw $e;
			}
			throw new NotFoundException();
		}
	}
        
       
         
        
}
