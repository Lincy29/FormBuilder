<?php
App::uses('AppModel', 'Model');
/**
 * Role Model
 *
 */
class Category extends AppModel {

 public $displayField = 'name';
 public $belongsTo = ['Institution','Department'];
 public $hasMany= ['Form'];

 public function getListByDepartment($catid = null) {
 	if (empty($catid)) {
 		return array();
 	}
 	return $this->find('list', array(
 		'conditions'=> array($this->alias. '.dapartment_id'=>$catid
 	)));
 }

}

