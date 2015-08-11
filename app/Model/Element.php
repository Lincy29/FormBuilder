<?php
App::uses('AppModel', 'Model');
/**
 * Role Model
 *
 */
class Element extends AppModel {

 

	public $displayField = 'name';
  public $belongsTo = ['Form'];



}
