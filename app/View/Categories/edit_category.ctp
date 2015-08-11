<div class="row">
          <div class="col-lg-6">
<div class="institutions form">
	<?php echo $this->Html->script('manage_role');?>
<?php echo $this->Form->create('Category', array(
	'inputDefaults' => array(
		'div' => 'form-group',
		'wrapInput' => false,
		'class' => 'form-control'
	),
	'class' => 'well form-horizontal'
)); ?>
<fieldset>
<?php
//echo $this->Form->create('Category');
echo $this->Form->input('institution_id', array(
	'id' => 'institutions',
	'empty' => 'Please Select First'));
echo $this->Form->input('department_id', array(
	'id' => 'departments',
	'empty' => 'Please Select First'));
echo $this->Form->input('id');
echo $this->Form->input('category_name',array('label'=>'Enter new Category:'));
//echo $this->Form->end('Submit');
//echo $this->Form->end('View');

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