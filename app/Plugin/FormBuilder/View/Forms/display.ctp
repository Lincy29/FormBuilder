<script type="text/javascript">
$(document).ready(function(){
    $("#singlebutton").on('click',function(){
  
          var r = new Array();
          $(".form-horizontal :input").each(function() {          
           r.push($(this).val());           
     }); 
         console.log(r);
         exit;
        $("#response").val(r.join("-"));           

    });
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