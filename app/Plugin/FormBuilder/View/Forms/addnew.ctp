<div class="row">
          <div class="col-lg-6">
<div class="tickets form">
	<?php echo $this->Html->script('manage_role');?>

<?php echo $this->Form->create('Asset', array(
	'inputDefaults' => array(
		'div' => 'form-group',
		'wrapInput' => false,
		'class' => 'form-control'
	),
	'class' => 'well form-horizontal'
)); ?>


<fieldset>
		<legend><?php echo __('Add '); ?></legend>
		<?php
		$url             = $this->Html->url(array('controller' => 'departments','plugin'=>false,
'action' => 'list_departments',
'ext' => 'json'
));
/*$urla            = $this->Html->url(array('controller' => 'categories', 'plugin'=>false,
'action' => 'list_categories',
'ext' => 'json'
));*/

		$emptyDepartment = count($departments) > 0 ? Configure::read('Select.defaultAfter') : array('0' => Configure::read('Select.naBefore') . __('Select Institution First') . Configure::read('Select.naAfter')
);
		/*
$emptyCategory     = count($categories) > 0 ? Configure::read('Select.defaultAfter') : array('0' => Configure::read('Select.naBefore') . __('Select Department First') . Configure::read('Select.naAfter')
);
*/
echo $this->Form->input('name',array('label'=>'Enter new name:'));
echo $this->Form->input('institution_id', array('id' => 'institutions','empty' => 'Please Select First','rel' => $url));
echo $this->Form->input('department_id', array('id' => 'departments','empty' => $emptyDepartment));
//echo $this->Form->input('category_id', array('id' => 'categories','empty' => $emptyCategory));
//echo $this->Form->input('no_of_assets',array('type' => 'text'));
echo $this->Form->input('close');
		?>

<?php echo $this->Form->submit('Submit', array(
				'div' => false,
				'class' => 'btn btn-primary'
			)); ?>




	</fieldset>
<?php echo $this->Form->end(); ?>
</div>
</div>
</div>