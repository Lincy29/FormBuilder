<script type="text/javascript">
$(document).ready(function(){
    $("#singlebutton").on('click',function(){
          // var value= $("#textinput").val();
          // console.log(value); 
          var inputs = new Array(); 
          $(".form-horizontal :input").each(function() {
          // var value = $(this).val();
           inputs.push($(this).val();
           console.log(inputs);
     }); 
        $("#response").val(inputs.join("-")); 
    });
  });

</script>

<div class="row">
          <div class="col-lg-6">
<div class="tickets form">
	<?php echo $this->Html->script('manage_category');?>

<?php 

echo html_entity_decode($code);
echo $this->Form->input('response',array('id' => 'response'));


?>
</div>
</div>
</div>