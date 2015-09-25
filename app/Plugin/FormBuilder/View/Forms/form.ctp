<?php
echo $this->Html->css('FormBuilder.ui-grid.css');
echo $this->Html->script('FormBuilder.angular.js');
echo $this->Html->script('FormBuilder.ui-grid.js');
?>
<script type="text/javascript">
  angular
      .module('myform',[])

      .controller('addController',function($http,$scope){
            
        $http.get('/institutions/list_institutions.json')
          .success(function(data){
              $scope.institutions = data.institutions;
          }); 
     

     $scope.getDepartment = function(){
        $http.get('/departments/list_departments_angular.json?id='+$scope.angular_forms.institution_id)
        .success(function(data){
            $scope.departments = data.departments;
          }); 
      }

     $scope.getCategory = function(){
        $http.get('/form_builder/categories/list_categories_angular.json?id='+$scope.angular_forms.department_id)
          .success(function(data){
              $scope.categories = data.categories;
     
            }); 
      }

      });
      
      
</script>

<div ng-app="myform" ng-controller="addController">
<div class="row">
<div class="col-lg-8">
<div class="tickets form">
   

  <form name="form" class="well form-horizontal" >
    <fieldset>
      <legend>Form</legend> 
        <div class="form-group">
          <label for="institution">Institution</label>
              <select id="institution" class="form-control" ng-options="key as value for (key,value) in institutions" ng-change="getDepartment()" ng-model="angular_forms.institution_id" required>
                <option value = "">Please Select First</option>
              </select>
        </div> 
  
        <div class="form-group">
          <label for="department">Department</label>
              <select id="department" class="form-control" ng-options="key as value for (key,value) in departments" ng-change="getCategory()" ng-model="angular_forms.department_id" required>
              <option value = "">Select Institution First</option>
              </select>
        </div>

        <div class="form-group">
          <label for="category">Category</label>
              <select id="category" class="form-control" ng-options="key as value for (key,value) in categories" ng-model="angular_forms.category_id" required>    
              <option value = "">Select Department First</option>         
              </select>
        </div>
        

    </fieldset>
  </form>
</div>
</div>
</div>
</div>


