<?php
echo $this->Form->create('Category');
echo $this->Form->input('institution_id', array(
	'id' => 'institutions',
	'empty' => 'Please Select First'));

echo $this->Form->input('department_id', array(
	'id' => 'departments',
	'empty' => 'Please Select First'));

echo $this->Form->input('category_name');
echo $this->Form->end('Submit'); ?>
