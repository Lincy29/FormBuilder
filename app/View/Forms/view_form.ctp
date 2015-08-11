<div class="row">
          <div class="col-lg-6">
<div class="tickets form">
	<?php echo $this->Html->script('manage_category');?>


<?php echo $this->Form->create('Form', array(
	'inputDefaults' => array(
		'div' => 'form-group',
		'wrapInput' => false,
		'class' => 'form-control'
	),
	'class' => 'well form-horizontal'
)); ?>

<?php
/*		$url = $this->Html->url(array(
										'controller' => 'departments',
										'plugin' => false,
										'action' => 'list_departments',
										'ext' => 'json'));
		$urla= $this->Html->url(array(
										'controller' => 'categories', 
									    'plugin'=>false,
								        'action' => 'list_categories',		
								        'ext' => 'json'));
		$urlb= $this->Html->url(array(
										'controller' => 'forms', 
									    'plugin'=>false,
								        'action' => 'list_forms',		
								        'ext' => 'json'));
				

$emptyDepartment = count($departments) > 0 ? Configure::read('Select.defaultAfter') : array(
	'0' => Configure::read('Select.naBefore') . __('Select Institution First') . Configure::read('Select.naAfter')
);

$emptyCategory     = count($categories) > 0 ? Configure::read('Select.defaultAfter') : array('0' => Configure::read('Select.naBefore') . __('Select Department First') . Configure::read('Select.naAfter')
);

$emptyForm     = count($forms) > 0 ? Configure::read('Select.defaultAfter') : array('0' => Configure::read('Select.naBefore') . __('Select Category First') . Configure::read('Select.naAfter')
);


echo $this->Form->input('institution_id', array(
	'id' => 'institutions',
	'empty' => 'Please Select First',
	'rel' => $url	
));
echo $this->Form->input('department_id', array(
	'id' => 'departments',
	'empty' => $emptyDepartment,
	'rel' => $urla));

echo $this->Form->input('category_id', array(
	'id' => 'categories',
	'empty' => $emptyCategory,
	'rel' => $urlb));
echo $this->Form->input('form_id', array(
	'id' => 'forms',));


*/

echo $this->Form->input('form_id');
echo $this->Form->end('Submit');


?>