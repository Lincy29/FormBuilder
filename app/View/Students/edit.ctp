<div class="student form">
<?php echo $this->Form->create('Student'); ?>
	<fieldset>
		<legend><?php echo __('Edit Student'); ?></legend>
	<?php
		echo $this->Form->input('id');		
		echo $this->Form->input('firstname');
		echo $this->Form->input('lastname');
		echo $this->Form->input('User.username');
		echo $this->Form->input('User.email');
		echo $this->Form->input('institution_id');
		echo $this->Form->input('department_id');
		echo $this->Form->input('degree_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

