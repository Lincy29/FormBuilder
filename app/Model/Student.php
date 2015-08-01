<?php
App::uses('AppModel', 'Model');

class Student extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */

public $validate = [];

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */

   public $belongsTo = ['Institution','Degree','Department'];
   public $hasMany = ['User','UserRole'];
   //public $hasMany = ['TrainingAndPlacement.ResultBoard','TrainingAndPlacement.ExamMaster','User'];
}
