<div class="row">
          <div class="col-lg-6">
<<<<<<< HEAD
<div class="tickets form">
	<?php echo $this->Html->script('manage_role');?>


<div class="degrees form">
=======
<div class="institutions form">
	<?php echo $this->Html->script('manage_role');?>
>>>>>>> 8a319f27450e1ffea3c0e639534e228fa5336719
<?php echo $this->Form->create('Degree', array(
	'inputDefaults' => array(
		'div' => 'form-group',
		'wrapInput' => false,
		'class' => 'form-control'
	),
	'class' => 'well form-horizontal'
<<<<<<< HEAD
));

	$url = $this->Html->url(array(
=======
)); ?>
<fieldset>
		<legend><?php echo __('Add Degree'); ?></legend>
<?php
		$url = $this->Html->url(array(
>>>>>>> 8a319f27450e1ffea3c0e639534e228fa5336719
										'controller' => 'departments',
										'plugin' => false,
										'action' => 'list_departments',
										'ext' => 'json'));

<<<<<<< HEAD
    $emptyDepartment = count($departments) > 0 ? Configure::read('Select.defaultAfter') : array(
	'0' => Configure::read('Select.naBefore') . __('Select Institution First') . Configure::read('Select.naAfter')
); ?>
	<fieldset>
		<legend><?php echo __('Add Degree'); ?></legend>
	<?php
		echo $this->Form->input('institution_id', array(
=======
	$emptyDepartment = count($departments) > 0 ? Configure::read('Select.defaultAfter') : array(
	'0' => Configure::read('Select.naBefore') . __('Select Institution First') . Configure::read('Select.naAfter')
);

	   echo $this->Form->input('institution_id', array(
>>>>>>> 8a319f27450e1ffea3c0e639534e228fa5336719
	'id' => 'institutions',
	'empty' => 'Please Select First',
	'rel' => $url	
));
echo $this->Form->input('department_id', array(
	'id' => 'departments',
<<<<<<< HEAD
	'empty' => $emptyDepartment));

=======
	'empty' => $emptyDepartment
	));
>>>>>>> 8a319f27450e1ffea3c0e639534e228fa5336719
		echo $this->Form->input('name');
	?>
	<div class="col col-md-9 col-md-offset-3">
			<?php echo $this->Form->submit('Submit', array(
				'div' => false,
				'class' => 'btn btn-primary'
			)); ?>
			<button type="reset" class="btn btn-default">Cancel</button>
		</div>
<<<<<<< HEAD
	</fieldset>

</div>
=======
		</fieldset>
</div>

>>>>>>> 8a319f27450e1ffea3c0e639534e228fa5336719
