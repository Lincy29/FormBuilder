<div class="row">
  <div class="col-md-6">
    <!-- Replace the above code with following responsive form layout -->
    <?php echo $this->Form->create('Staff', array(
	'inputDefaults' => array(
		'div' => 'form-group',
		'wrapInput' => false,
		'class' => 'form-control'
	),
	'class' => 'well form-horizontal'
    )); ?>

<?php echo $this->Html->script('manage_category');?>
<?php
		$url = $this->Html->url(array(
		'controller' => 'departments',
		'plugin' => false,
		'action' => 'list_departments',
		'ext' => 'json')); 

?>
<!-- Add html fieldset to display form content properly -->
<fieldset>
		<legend><h3><?php echo __('Add Staff'); ?></h3></legend>
<?php 	$emptyDepartment = count($departments) > 0 ? Configure::read('Select.defaultAfter') : array(
	'0' => Configure::read('Select.naBefore') . __('Select Institution First') . Configure::read('Select.naAfter')
);
//echo $this->Form->input('id');
echo $this->Form->input('institution_id', array(
	'id' => 'institutions',
	'empty' => 'Please Select First',
	'rel' => $url,	
));
echo $this->Form->input('department_id', array(
	'id' => 'departments',
	'empty' => $emptyDepartment
	));

echo $this->Form->input('firstname');
echo $this->Form->input('lastname');
echo $this->Form->input('User.username');
echo $this->Form->input('User.pwd', ['type' => 'password','label'=>'Password','autocomplete'=>'off']);
echo $this->Form->input('User.pwd_repeat', ['type' => 'password','label'=>'Password repeat','autocomplete'=>'off']);
//echo $this->Form->input('User.password');
echo $this->Form->input('User.email');
?>
	<div class="col col-md-9 col-md-offset-3">
			<?php echo $this->Form->submit('Submit', array(
				'div' => false,
				'class' => 'btn btn-primary'
			)); ?>
			<button type="reset" class="btn btn-default">Cancel</button>
		</div>
	</fieldset>
</div>
</div>
