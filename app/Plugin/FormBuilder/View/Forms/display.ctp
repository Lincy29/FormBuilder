<script type="text/javascript">
var inputs = new Array(); 
$(document).ready(function(){

    $("#singlebutton").on('click',function(){

          $(".form-horizontal .form-group :input").each(function() {
          
           inputs.push($(this).val());
           console.log(inputs);
     }); 
         

    });
    $("#response").val(inputs.join("-"));
  });

</script>

<div class="row">
          <div class="col-lg-6">
<div class="tickets form">	

<?php 

echo html_entity_decode($code);

echo $this->Form->input('response',array('id' => 'response','type'=> 'hidden'));


?>

</div>
</div>
</div>