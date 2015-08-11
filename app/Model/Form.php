<?php
App::uses('AppModel','Model');
class Form Extends AppModel {
	
  public $validate = [

        'name' => [
            'required' => [
                'rule' => ['notEmpty'],
                'message' => 'You must enter a Form Name.'
            ],
            'unique' => [
                'rule'    => 'isUnique',
                'message' => 'This Form Name has already been taken.'
            ],
        ],
        'institution_id' => [
            'required' => [
                'rule' => ['notEmpty'],
                'message' => 'Please select institution.'
            ],
        ],
        'department_id' => [
            'required' => [
                'rule' => ['notEmpty'],
                'message' => 'please select department.'
            ],
        ],
        'department_id' => [
            'required' => [
                'rule' => ['notEmpty'],
                'message' => 'please select category.'
            ],
        ]
        
    ];
 
 public $belongsTo = ['Institution','Department','Category'];

 public $hasMany = ['Element','FormElement'];


public $displayField='name';

 public function getListByCategories($aid = null) {
    if (empty($aid)) {
      return array();
    }
    return $this->find('list', array(
      'conditions' => array($this->alias . '.category_id' => $aid),
    ));
  }

  

}

?>