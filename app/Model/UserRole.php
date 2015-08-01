<?php
App::uses('AppModel', 'Model');
/**
 * UserRole Model
 *
 * @property User $User
 * @property Role $Role
 */
class UserRole extends AppModel {

	


	public $validate = [

    'user_id' => [

        'unique' => ['rule' => ['checkUnique',['user_id','role_id','recstatus']],
                                           'message' => 'For this User , Role exists!'
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
        'staff_id' => [
            'required' => [
                'rule' => ['notEmpty'],
                'message' => 'please select department.'
            ],
        ]      
				];


/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'role_id';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = ['Institution','Department','Staff','Role','User','Student'];

}
