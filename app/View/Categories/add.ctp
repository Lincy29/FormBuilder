
<?php
echo $this->Form->create('Category');
//echo $this->Form->input('test_id',array('options' => $names));
echo $this->Form->input('category_name');//,array('label'=>'Enter Category name:','required' => true));
echo $this->Form->end('Submit');
//echo $this->Form->end('View');

?>