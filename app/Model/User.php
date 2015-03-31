<?php

App::uses('AppModel', 'Model');

/**
 * User Model
 *
 */
class User extends AppModel {

    public $actsAs = array('Tree');
    var $displayField = "username";

    public function beforeSave($options = array()) {



        if (isset($this->data[$this->alias]['password'])) {
            $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
        }
              return true;
    }
    
//    public function afterSave($created, $options = array()) {
//
//        if ($this->data[$this->alias]['cmt'] == "business") {
//
//
//            App::uses("Member", "Model");
//            $member = new Member();
//            $x = array(
//                'Member' => $this->data[$this->alias]
//            );
//            $member->save($x);
//        }
//    }
//    public $belongsTo = array(
//        'ParentUser' => array(
//            'className' => 'User',
//            'foreignKey' => 'parent_id',
//            'conditions' => '',
//            'fields' => '',
//            'order' => ''
//            )
//        );
   public $hasMany = array(
		'PaymentAccount' => array(
			'className' => 'PaymentAccount',
			'foreignKey' => 'user_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
       );
}
