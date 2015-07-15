<div class="academicYears form">
<?php echo $this->Form->create('AcademicYear'); ?>
	<fieldset>
		<legend><?php echo __('Add Academic Year'); ?></legend>
	<?php
	    echo $this->Form->input('institution_id', array(
	'id' => 'institutions',
	'empty' => 'Please Select First'	
));
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>