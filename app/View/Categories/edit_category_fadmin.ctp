<?php
echo $this->Form->create('Category');
echo $this->Form->input('department_id', array(
	'id' => 'departments',
	'empty' => 'Please Select First'));
echo $this->Form->input('id');
echo $this->Form->input('category_name',array('label'=>'Enter new Category:'));
echo $this->Form->end('Submit');
//echo $this->Form->end('View');

?>