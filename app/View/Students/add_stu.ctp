<div class="row">
          <div class="col-lg-6">
<div class="tickets form">
	<?php echo $this->Html->script('manage_degree');?>

<?php echo $this->Form->create('Student', array(
	'inputDefaults' => array(
		'div' => 'form-group',
		'wrapInput' => false,
		'class' => 'form-control'
	),
	'class' => 'well form-horizontal'
)); ?>

<?php
		$url = $this->Html->url(array(
										'controller' => 'departments',
										'plugin' => false,
										'action' => 'list_departments',
										'ext' => 'json'));
		$urla = $this->Html->url(array(
										'controller' => 'degrees',
										'plugin' => false,
										'action' => 'list_degrees',
										'ext' => 'json'));

$emptyDepartment = count($departments) > 0 ? Configure::read('Select.defaultAfter') : array(
	'0' => Configure::read('Select.naBefore') . __('Select Institution First') . Configure::read('Select.naAfter')
);

$emptyDegree = count($degrees) > 0 ? Configure::read('Select.defaultAfter') : array(
	'0' => Configure::read('Select.naBefore') . __('Select Institution First') . Configure::read('Select.naAfter')
);
?>
	<fieldset>
		<legend><?php echo __('Add Student'); ?></legend>
	<?php
	
	echo $this->Form->input('institution_id', array(
	'id' => 'institutions',
	'empty' => 'Please Select First',
	'rel' => $url	
));

	echo $this->Form->input('department_id', array(
	'id' => 'departments',
	'empty' => $emptyDepartment,
	'rel' => $urla));
echo $this->Form->input('degree_id', array(
	'id' => 'degrees',
	'empty' => $emptyDegree,

	));	

echo $this->Form->input('User.username');
echo $this->Form->input('firstname');
echo $this->Form->input('lastname');
echo $this->Form->input('User.email');
echo $this->Form->input('User.password');

	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
