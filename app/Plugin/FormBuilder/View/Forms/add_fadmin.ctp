<div class="row">
          <div class="col-lg-6">
<div class="tickets form">
	<?php echo $this->Html->script('manage_category');?>

<?php echo $this->Form->create('Form', array(
	'inputDefaults' => array(
		'div' => 'form-group',
		'wrapInput' => false,
		'class' => 'form-control'
	),
	'class' => 'well form-horizontal'
)); ?>

<?php		
		$urla= $this->Html->url(array(
										'controller' => 'categories', 
									    'plugin'=>false,
								        'action' => 'list_categories',		
								        'ext' => 'json'));

  $emptyCategory= count($categories) > 0 ? Configure::read('Select.defaultAfter') : array('0' => Configure::read('Select.naBefore') . __('Select department First') . Configure::read('Select.naAfter')
);

echo $this->Form->input('name',array('label'=>'Enter Form name:'));

echo $this->Form->input('department_id', array(
	'id' => 'departments',
	'empty' => 'Please Select First',
	'rel' => $urla));
echo $this->Form->input('category_id', array(
	'id' => 'categories',
	'empty' => $emptyCategory));

echo $this->Form->input('close');
?>
<?php echo $this->Form->submit('Submit', array(
				'div' => false,
				'class' => 'btn btn-primary'
			)); ?>

