<?php 
echo $this->Html->css('FormBuilder.ui-grid.css'); 
echo $this->Html->css('FormBuilder.form.css'); 
echo $this->Html->script('FormBuilder.angular.js'); 

echo $this->Html->script('FormBuilder.ui-bootstrap-tpls-0.13.4.js'); 

?> 
<html>
<body>
    
    <script type="text/javascript">
        var app = angular.module('MyApp', ['ui.bootstrap'])
        app.controller('MyController', function ($scope) {
            
            $scope.form = {};
            $scope.form.form_id = 1;
            $scope.form.form_name = 'My Form';
            $scope.form.form_fields = [];
            
            $scope.fields = [{
                Id: 1,
                Name: 'TextBox'
            }, {
                Id: 2,
                Name: 'CheckBox'
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

    $scope.accordion = {}
    $scope.accordion.oneAtATime = true;

    $scope.addField = {};
   // $scope.addField.types = fields;
   // $scope.addField.new = $scope.addField.types[0].name; 
    $scope.addField.new = "TextBox";
    $scope.addField.lastAddedID = 0;


    $scope.addNewField = function(){

        $scope.addField.lastAddedID++;

        var newField = {
            "field_id" : $scope.addField.lastAddedID,
            "field_title" : "New field - " + ($scope.addField.lastAddedID),
            "field_type" : $scope.addField.new,
            "field_value" : "",
            "field_required" : false,
            "field_disabled" : false
        };

        $scope.form.form_fields.push(newField);
    }

    $scope.showAddOptions = function (field){
        if(field.field_type == "Radio" || field.field_type == "CheckBox")
            return true;
        else
            return false;
    }

    $scope.addOption = function (field){
        if(!field.field_options)    // field_options array hai jo if null(i.e 0) hai toh create new array????
            field.field_options = new Array();

        var lastOptionID = 0;

        if(field.field_options[field.field_options.length-1])
            lastOptionID = field.field_options[field.field_options.length-1].option_id;

        var option_id = lastOptionID + 1;

        var newOption = {
            "option_id" : option_id,
            "option_title" : "Option " + option_id,
            "option_value" : option_id
        };

        field.field_options.push(newOption);
    }

    $scope.deleteOption = function (field, option){
        for(var i = 0; i < field.field_options.length; i++){
            if(field.field_options[i].option_id == option.option_id){
                field.field_options.splice(i, 1);// 1st parameter i is starting index, 2nd parameter denotes upto howmany elements you want to remove
                break;
            }
        }
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

          <h4><label for="FormProperties">Form Properties</label></h4> <br>
            <label for="FormName">Form Name</label> 
                <input type = "text" class="form-control"><br>
          <h4><label for="FormFields">Form Fields</label></h4> <br>
            
          <div class="add-field">
             <select class="form-control" ng-model="addField.new" ng-options="field.Name as field.Name for field in fields"></select>
             <!--{{addField.new}}-->
             <br>
             <button type="submit" class="btn btn-primary" ng-click="addNewField()">Add Field</button>
          </div>
            <br>
        <p ng-show="form.form_fields.length == 0">No fields added yet.</p>
        <accordion close-others="accordion.oneAtATime">
            <accordion-group heading="{{field.field_title}}" ng-repeat="field in form.form_fields">
              <div class="clear"></div> <hr>
                <div class="accordion-edit">
                    
                    <div class="row">
                        <div class="span2" id="field"><h4>Field ID: </h4></div>
                        <div class="span4" id="field">{{field.field_id}}</div>
                    </div>
                    <div class="row">
                        <div class="span2" id="field"><h4>Field Type:</h4></div>
                        <div class="span4" id="field">{{field.field_type}}</div>
                    </div>

                    <div class="clear"></div> <hr>

                    <div class="row">
                        <div class="span2" id="field"><h4>Field Title:</h4></div>
                        <div class="span4" id="field"><input type="text" ng-model="field.field_title" value="{{field.field_title}}" class="form-control"></div>
                    </div>
                    <div class="row">
                        <div class="span2" id="field"><h4>Field Default Value:</h4></div>
                        <div class="span4" id="field"><input type="text" ng-model="field.field_value" value="{{field.field_value}}" class="form-control"></div>
                    </div>
                    <div class="row" ng-show="showAddOptions(field)">
                        <div class="span2" id="field"><h4>Field Options:</h4></div>
                        <div class="span6" id="field">
                            <div ng-repeat="option in field.field_options">
                                <input type="text" ng-model="option.option_title" value="{{option.option_title}}">
                                <a class="btn btn-danger btn-mini right" type="button" ng-click="deleteOption(field, option)"><i class="glyphicon glyphicon-remove"></i></a>
                                <span class="label label-inverse">Value: {{ option.option_value }}</span>
                            </div>
                            <button class="btn btn-primary btn-small" type="button" ng-click="addOption(field)"><i class="icon-plus icon-white"></i> Add Option</button>
                        </div>
                    </div> 
                    <div class="clear"></div> <hr>

                    <div class="row">
                        <div class="span2" id="field"><h4>Required:</h4></div>
                        <div class="span4" id="field">
                            <label>
                                <input type="radio" ng-value="true" ng-model="field.field_required" id="field"/>
                                &nbsp; Yes
                            </label>
                            <label>
                                <input type="radio" ng-value="false" ng-model="field.field_required" id="field"/>
                                &nbsp; No
                            </label>
                        </div>
                    </div>
                    
                    <div class="clear"></div> <hr>

                    <div class="row">
                        <div class="span2" id="field"><h4>Disabled:</h4></div>
                        <div class="span4" id="field">
                            <label>
                                <input type="radio" ng-value="true" ng-selected ng-model="field.field_disabled" id="field"/>
                                &nbsp; Yes
                            </label>
                            <label>
                                <input type="radio" ng-value="false" ng-model="field.field_disabled" id="field" id="field"/>
                                &nbsp; No
                            </label>
                        </div>
                    </div>
                </div>
            </accordion-group>
        </accordion>

 </fieldset> 

  </form> 
</div> 
</div> 
</div> 

</div> 

