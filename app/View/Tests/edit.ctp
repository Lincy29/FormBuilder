<?php
echo $this->Form->create('Test');
echo __('Edit Name');
//echo $this->Form->input('test_id',array('options' => $names));
echo $this->Form->input('id');
echo $this->Form->input('name',array('label'=>'Enter new name:'));
echo $this->Form->end('Submit');
//echo $this->Form->end('View');

?>


