<div class="row">
          <div class="col-lg-6">
<div class="institutions form">
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


echo $this->Form->input('department_id', array(
	'id' => 'departments',
	'empty' => 'Please Select First'));

echo $this->Form->input('category_name');?>
<div class="col col-md-9 col-md-offset-3">
			<?php echo $this->Form->submit('Submit', array(
				'div' => false,
				'class' => 'btn btn-primary'
			)); ?>
			<button type="reset" class="btn btn-default">Cancel</button>
		</div>
		<fieldset>
</div>