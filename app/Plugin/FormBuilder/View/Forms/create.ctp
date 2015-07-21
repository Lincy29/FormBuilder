<link href="/gnu/app/webroot/css/custom.css?v=2" rel="stylesheet">
    <div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <!--<div class="navbar-header">
          <a class="navbar-brand" href="#">Bootstrap Form Builder</a>
        </div>-->

      </div>
    </div>

    <script type="text/javascript">
     $(document).ready(function(){
          $("#fetchcode").click(function(){

          	$("#render :input").each(function(){
          		var input = $(this);
          	});
          	console.log(input.length);
           
   /* things we tried*/
          /*  var code=$("#render").val();                
            $("#codetext").val(code);
           
   /* Array.prototype.slice.call(document.getElementById("textinput").attributes).forEach(function(item) {
    var type= item.name ;
    var value1= item.value;
    document.write(type+": "+value1+"  ");
   
});*/
    // $("#type1").val(attrs);
    /*var counter=-24;
       
 $("input").each(function() {
   var title = $("input").attr( "type" );
   console.log( "type: " + title );
   //alert(title);
   counter++;
});
$("#type1").val(counter);
*/
       });
     });

  
        
    </script>

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
         <!-- <a href="#" id="toggle_bs_style" class="btn btn-info btn-xs pull-right">Toggle bootstrap theme</a>-->
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
   <textarea id="codetext"> </textarea><br>
   <input type="text" id="type1"><br>
<button id="fetchcode">OK</button>
     </div>
 
     </div>
     
    
 
   <script data-main="/gnu/app/webroot/js/main-built.js" src="/gnu/app/webroot/js/lib/require.js?v=3" ></script>