<!-- <link href="css/custom.css?v=2" rel="stylesheet"> -->
<?php echo $this->Html->css('custom'); ?>

<script type="text/javascript">

$(document).ready(function(){
	$("fieldset").css({"color":"red" , "border":" 2px solid red"});;
});
	.</script>

<div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">Bootstrap Form Builder</a>
        </div>
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

      </div>
      

 </div>     
<?php echo $this->Html->script('lib/require.js',['data-main'=>'/js/main.js']); ?>
</p>