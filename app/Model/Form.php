<?php
App::uses('AppModel','Model');
class Form Extends AppModel {
 
 public $belongsTo = ['Institution','Department','Category'];

}


?>