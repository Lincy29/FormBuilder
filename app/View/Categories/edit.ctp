<?php
echo $this->Form->create('Category');
echo __('Edit Category');
//echo $this->Form->input('test_id',array('options' => $names));
echo $this->Form->input('id');
echo $this->Form->input('category_name',array('label'=>'Enter new Category:'));
echo $this->Form->end('Submit');
//echo $this->Form->end('View');

?>


