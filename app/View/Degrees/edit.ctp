<div class="tickets form">
	<?php echo $this->Html->script('manage_role');?>


<div class="degrees form">
<?php echo $this->Form->create('Degree'); 
$url = $this->Html->url(array(
										'controller' => 'departments',
										'plugin' => false,
										'action' => 'list_departments',
										'ext' => 'json'));

    $emptyDepartment = count($departments) > 0 ? Configure::read('Select.defaultAfter') : array(
	'0' => Configure::read('Select.naBefore') . __('Select Institution First') . Configure::read('Select.naAfter')
); ?>

?>
	<fieldset>
		<legend><?php echo __('Edit Degree'); ?></legend>
	<?php
		echo $this->Form->input('id');
		
		echo $this->Form->input('institution_id', array(
	'id' => 'institutions',
	'empty' => 'Please Select First',
	'rel' => $url	
));
echo $this->Form->input('department_id', array(
	'id' => 'departments',
	'empty' => $emptyDepartment));

		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>