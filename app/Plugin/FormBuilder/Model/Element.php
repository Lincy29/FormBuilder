<?php
App::uses('FormBuilderAppModel','FormBuilder.Model');
/**
 * Role Model
 *
 */
class Element extends FormBuilderAppModel {

 

  public $displayField = 'name';
  public $belongsTo = ['Form'];



}
