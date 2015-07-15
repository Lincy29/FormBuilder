<div class="degrees form">
	<div class="tickets form">
	<?php echo $this->Html->script('manage_role');?>
<?php echo $this->Form->create('Degree'); ?>
	<fieldset>
		<legend><?php echo __('Add Degree'); ?></legend>
<?php
		$url = $this->Html->url(array(
										'controller' => 'departments',
										'plugin' => false,
										'action' => 'list_departments',
										'ext' => 'json'));

	$emptyDepartment = count($departments) > 0 ? Configure::read('Select.defaultAfter') : array(
	'0' => Configure::read('Select.naBefore') . __('Select Institution First') . Configure::read('Select.naAfter')
);

	   echo $this->Form->input('institution_id', array(
	'id' => 'institutions',
	'empty' => 'Please Select First',
	'rel' => $url	
));
echo $this->Form->input('department_id', array(
	'id' => 'departments',
	'empty' => $emptyDepartment
	));
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
