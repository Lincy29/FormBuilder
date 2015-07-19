<?php
App::uses('FormBuilderAppModel','FormBuilder.Model');

class Form extends FormBuilderAppModel {
 
 public $belongsTo = ['Institution','Department','Category'];

public $displayField='id';

 public function getListByCategories($aid = null) {
    if (empty($aid)) {
      return array();
    }
    return $this->find('list', array(
      'conditions' => array($this->alias . '.category_id' => $aid),
    ));
  }

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


}

?>