  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>  
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script>
  $(function() {

$( ".datepicker" ).datepicker({

    			dateFormat: 'yy/mm/dd'
    });

  });
  </script>

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
		$url = $this->Html->url(array(
										'controller' => 'departments',
										'plugin' => false,
										'action' => 'list_departments',
										'ext' => 'json'));
		$urla= $this->Html->url(array(
										'controller' => 'categories', 
									    'plugin'=>false,
								        'action' => 'list_categories',		
								        'ext' => 'json'));
				

$emptyDepartment = count($departments) > 0 ? Configure::read('Select.defaultAfter') : array(
	'0' => Configure::read('Select.naBefore') . __('Select Institution First') . Configure::read('Select.naAfter')
);

$emptyCategory     = count($categories) > 0 ? Configure::read('Select.defaultAfter') : array('0' => Configure::read('Select.naBefore') . __('Select Department First') . Configure::read('Select.naAfter')
);

echo $this->Form->input('name',array('label'=>'Enter  name:'));

echo $this->Form->input('institution_id', array(
	'id' => 'institutions',
	'empty' => 'Please Select First',
	'rel' => $url	
));
echo $this->Form->input('department_id', array(
	'id' => 'departments',
	'empty' => $emptyDepartment,
	'rel' => $urla));

echo $this->Form->input('category_id', array(
	'id' => 'categories',
	'empty' => $emptyCategory));

echo $this->Form->input('close', array('class' => 'form-control datepicker','data-date-format' => 'yyyy/mm/dd'	, 'type' => 'text',	'div' => 'form-group'));
echo $this->Form->end('Submit');


?>