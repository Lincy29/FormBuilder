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
	

<?php echo $this->Form->create('Form', array(
	'inputDefaults' => array(
		'div' => 'form-group',
		'wrapInput' => false,
		'class' => 'form-control'
	),
	'class' => 'well form-horizontal'
)); ?>

<?php
		
		
echo $this->Form->input('category_id');
echo $this->Form->input('name',array('label'=>'Enter Form name:'));
echo $this->Form->input('close_date', array('class' => 'form-control datepicker','data-date-format' => 'yyyy/mm/dd'	, 'type' => 'text',	'div' => 'form-group'));
echo $this->Form->end('Submit');


?>