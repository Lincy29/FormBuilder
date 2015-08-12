
<?php echo $this->Html->css('custom'); ?>

 <script type="text/javascript">
     
 $(document).ready(function(){
    $("#submit").on('click',function(){
       var code = $("#render").val();
       console.log(code);
       $("#codetext").val(code);
     
      var attr_val= new Array();
      var labels = new Array();
      $("#target .component .form-group :input").each(function() {
          attr_val.push($(this).attr('name'));
          var val_of_label = $(this).attr('name');
          labels.push($('#target .component .form-group label[for='+val_of_label+']').text());
     });
          $("#labeltext").val(labels.join("-"));
          $("#attribute").val(attr_val.join("-"));

     $("#target .component .form-group :select").each(function() {
          attr_val.push($(this).attr('name'));
          $("#attribute").val(attr_val.join("-"));
     }); 
       
    });
  });

 </script>


<div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        
      </div>
    </div>
    <div class="container">
      <div class="row">
        <!-- Building Form. -->
        <div class="col-md-6">
          <div class="clearfix">
            <h2>Your Form</h2>
            <hr>
            <div id="build">
              <form id="target" class="form-horizontal">
              </form>
            </div>
          </div>
        </div>
        <!-- / Building Form. -->

        <!-- Components -->
        <div class="col-md-6">

          <h2>Drag & Drop components</h2>
          <a href="#" id="toggle_bs_style" class="btn btn-info btn-xs pull-right">Toggle bootstrap theme</a>
          <div class="clearfix"></div>
          <hr>
          <div class="tabbable">
            <ul class="nav nav-tabs" id="formtabs">
              <!-- Tab nav -->
            </ul>
            <form id="components" class="form-horizontal">
              <fieldset>
                <div class="tab-content">
                  <!-- Tabs of snippets go here -->
                </div>
              </fieldset>
            </form>
          </div>
        </div>
        <!-- / Components -->
<div>
 <?php
echo $this->Form->create('Form');
echo $this->Form->input('code',array('id' => 'codetext','type'=>'hidden'));
echo $this->Form->input('attribute',array('id' => 'attribute','type'=>'hidden'));
echo $this->Form->input('label',array('id' => 'labeltext','type'=>'hidden'));
echo $this->Form->submit('Submit', array(
              'id' => 'submit',
        'div' => false,
        'class' => 'btn btn-primary'
      ));
?>

</div>
 
      </div>
      

 </div>     
<?php echo $this->Html->script('lib/require.js',['data-main'=>'/js/main.js']); ?>
</p>