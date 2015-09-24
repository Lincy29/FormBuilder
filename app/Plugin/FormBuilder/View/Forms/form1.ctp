<?php 
echo $this->Html->css('FormBuilder.ui-grid.css'); 
echo $this->Html->script('FormBuilder.angular.js'); 
echo $this->Html->script('FormBuilder.ui.js'); 

?> 
<script type="text/javascript"> 
  angular 
      .module('createform',[]) 

      
      .controller('addController',function($http,$scope){ 
        $scope.fields = [{
          "":"Textfield",
          "1":"E-mail",
          "2":"Password",
          "3":"Radio Button",
          "4":"Dropdown List",
          "5":"Date",
          "6":"Text Area",
          "7":"Checkbox",
          "8":"Hidden",

        }]; 
       
     
      }); 
      
      
</script> 

<div ng-app="createform" ng-controller="addController"> 
<div class="row"> 
<div class="col-lg-8"> 

  <form name="createForm" class="well form-horizontal" > 
    <fieldset> 
      <legend>Create Form</legend> 
        <div class="form-group"> 
          <h3><label for="FormProperties">Form Properties</label></h3> <br>

            <label for="FormName">Form Name</label> 
                <input type = "text" value = "" class="form-control"><br>

          <h3><label for="FormFields">Form Fields</label></h3> <br>

            <label for="Fields">Fields</label> 

               <select id="Fields" class="form-control" ng-options="key as value for (key, value) in fields" >
               
              </select>

        </div> 

    </fieldset> 
  </form> 
</div> 
</div> 
</div> 
</div> 

