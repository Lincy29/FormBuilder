<?php
App::uses('FormBuilderAppModel','FormBuilder.Model');
/**
 * Role Model
 *
 */
class FormElement extends FormBuilderAppModel {

 

	//public $displayField = 'name';
  public $belongsTo = ['Form'];



}
