<?php
App::uses('AppModel', 'Model');
/**
 * Role Model
 *
 */
class FormElement extends AppModel {

 

	//public $displayField = 'name';
  public $belongsTo = ['Form'];



}
