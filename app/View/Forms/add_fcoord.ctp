<div class="row">
          <div class="col-lg-6">
<div class="tickets form">
	

<?php echo $this->Form->create('Form', array(
	'inputDefaults' => array(
		'div' => 'form-group',
		'wrapInput' => false,
		'class' => 'form-control'
	),
	'class' => 'well form-horizontal'
)); ?>

<?php
		
		
echo $this->Form->input('category_id');
echo $this->Form->input('name',array('label'=>'Enter Form name:'));
echo $this->Form->input('close');
echo $this->Form->end('Submit');


?>