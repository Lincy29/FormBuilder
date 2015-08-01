<?php
App::uses('AppModel','Model');
class Demo Extends AppModel {
 
 public $belongsTo = ['Institution','Department','Category','Form'];

}


?>