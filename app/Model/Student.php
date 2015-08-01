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
<<<<<<< HEAD
   public $hasMany = ['User','UserRole'];
=======
   public $hasMany = ['User'];
>>>>>>> 8a319f27450e1ffea3c0e639534e228fa5336719
   //public $hasMany = ['TrainingAndPlacement.ResultBoard','TrainingAndPlacement.ExamMaster','User'];
}
