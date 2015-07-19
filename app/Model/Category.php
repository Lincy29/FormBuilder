<?php
App::uses('AppModel', 'Model');
/**
 * Role Model
 *
 */
class Category extends AppModel {
	 public $validate = [
        
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
        
        'category_name' => [
            'required' => [
                'rule' => ['notEmpty'],
                'message' => 'You must enter a category Name.'
            ],
            'unique' => [
                'rule'    => 'isUnique',
                'message' => 'This category Name has already been taken.'
            ],
        ]
    ];

 public $displayField = 'category_name';
 public $belongsTo = ['Institution','Department'];
 public $hasMany= ['Form'];

 public function getListByDepartment($catid = null) {
		if (empty($catid)) {
			return array();
		}
		return $this->find('list', array(
			'conditions' => array($this->alias . '.department_id' => $catid)
		));
	}
}