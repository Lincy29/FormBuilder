
<?php
echo $this->Form->create('Test');
//echo $this->Form->input('test_id',array('options' => $names));
echo $this->Form->input('name',array('label'=>'Enter your name:','required' => true));
echo $this->Form->end('Submit');
//echo $this->Form->end('View');

?>