<?php 
echo $this->Html->css('FormBuilder.ui-grid.css'); 
echo $this->Html->script('FormBuilder.angular.js'); 
echo $this->Html->script('FormBuilder.ui.js'); 

?> 
<html>
<body>
    
    <script type="text/javascript">
        var app = angular.module('MyApp', [])
        app.controller('MyController', function ($scope) {
            $scope.Fields = [{
                Id: 1,
                Name: 'TextBox'
            }, {
                Id: 2,
                Name: 'Checkbox'
            }, {
                Id: 3,
                Name: 'Radio'
            }, {
                Id: 4,
                Name: 'E-mail'
            }, {
                Id: 5,
                Name: 'Date'
            }, {
                Id: 6,
                Name: 'TextArea'
            }, {
                Id: 7,
                Name: 'Password'
            }];

     $scope.newField = function(){ 
       
      } 
           
        });
    </script>
<div ng-app="MyApp" ng-controller="MyController"> 
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
   
        <select id="fields" class="form-control" ng-model="Fields" ng-options="field.Id as field.Name for field in Fields" ng-change="newField()">
        </select>
        <button class="btn btn-primary" id="department" type="button" >ADD</button>
      </fieldset> 
  </form> 
</div> 
</div> 
</div> 
</div> 
</body>
</html>