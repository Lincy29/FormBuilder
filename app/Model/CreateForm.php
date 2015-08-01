<?php
App::uses('AppModel', 'Model');
/**
 * Role Model
 *
 */
class CreateForm extends AppModel {

 /* public $validate = [

        'name' => [
            
           'unique' => [
                'name'    => 'isUnique',
                'message' => 'Enter a unique name.'
            ],
        ],
      ];*/

/**
 * Display field
 *
 * @var string
 */
	//public $displayField = 'name';
  public $belongsTo = ['Institution','Department'];

//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 * @var array
 */ 
/*  public $hasMany = [
    'UserRole' => [
      'className' => 'UserRole',
      'foreignKey' => 'role_id',
      'conditions' => '',
      'fields' => '',
      'order' => ''
    ],'ManageRole'
  ];*/

}
