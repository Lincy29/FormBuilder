<div class="row">
          <div class="col-lg-6">
<div class="institutions form">
	
<?php echo $this->Form->create('Staff', array(
	'inputDefaults' => array(
		'div' => 'form-group',
		'wrapInput' => false,
		'class' => 'form-control'
	),
	'class' => 'well form-horizontal'
)); ?>
	<fieldset>
		<legend><?php echo __('Edit Staff'); ?></legend>
	<?php
		echo $this->Form->input('id');		
		echo $this->Form->input('firstname');
		echo $this->Form->input('lastname');
		echo $this->Form->input('User.username');
		echo $this->Form->input('User.email');
		echo $this->Form->input('institution_id');
		echo $this->Form->input('department_id');
	?>
	
<div class="col col-md-9 col-md-offset-3">
			<?php echo $this->Form->submit('Submit', array(
				'div' => false,
				'class' => 'btn btn-primary'
			)); ?>
</fieldset>
</div>

