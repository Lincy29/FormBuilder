<?php echo $this->Html->css('navigation'); ?>
<br>
<div class="navbar navbar-default navbar-static-top" style="background-color:#fff;">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        <p style="padding-left: 20px;"><?php echo $this->Html->image('gnulogo.png', array('alt' => 'GNU', 'border' => '0' )); ?></p>
        </div>
        <h1 style="padding-left:200px;">Dynamic Form Generator</h1>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav" style="padding-left: 20px;">
        <li>
          <?php echo $this->Html->link(__("Home"),array('plugin'=>false,
                                                        'controller' => 'users',
                                                        'action' => 'dashboard'));
           ?>
        </li>

        <li class="dropdown menu-large">
          <?php if(Auth::hasRoles(['developer','superadmin'])) {?>
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Manage Roles<b class="caret"></b></a>
          <?php } ?>
        <ul class="dropdown-menu megamenu row">
          <li class="col-sm-3">
            <ul>
              <?php if(Auth::hasRoles(['developer'])) {?>
              <li class="dropdown-header">Manage Roles</li>
                  <li>
                    <?php echo $this->Html->link(__("New Role",true),[
                      'plugin'=>false,
                      'controller' => 'roles', 
                      'action' => 'add']); ?>
                </li>
                  <li>
                    <?php echo $this->Html->link(__("View Roles",true),[
                      'plugin'=>false,
                      'controller' => 'roles',
                      'action' => 'index']);  ?>
                 </li>
                  <li class="divider"></li>
              <?php } ?>



              <?php /*if(Auth::hasRoles(['developer'])) {?>
              <li class="dropdown-header">Manage Super Admins</li>
                  <li>
                    <?php echo $this->Html->link(__("New Super Admin",true),[
                    'plugin'=>false,
                    'controller' => 'user_roles', 
                    'action' => 'add_superadmin']); ?>
                  </li>
                  <li>
                    <?php echo $this->Html->link(__("View Super Admins",true),[
                    'plugin'=>false,
                    'controller' => 'user_roles', 
                    'action' => 'index_superadmin']);?>
                  </li>
                  <li class="divider"></li>
              <?php } */?>

             <?php  if(Auth::hasRoles(['developer','superadmin'])) {?>
              <li class="dropdown-header">Manage College Admin</li>
                  <li>
                    <?php echo $this->Html->link(__("New Admin",true),[
                    'plugin'=>false,
                    'controller' => 'user_roles', 
                    'action' => 'add_admin']); ?>
                  </li>
              <?php } ?>

              <?php if(Auth::hasRoles(['developer','superadmin'])) {?>
              <li>
                <?php echo $this->Html->link(__("View Admins",true),[
                'plugin'=>false,
                'controller' => 'user_roles', 
                'action' => 'index_admin']);?>
              </li>
              <?php } ?>

              
              </li>
            </ul>
          </li>
        </ul>
      </li>
      <?php  if(Auth::hasRoles(['developer','superadmin','admin'])) {?>
          <li class="dropdown menu-large">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Cartegories<b class="caret"></b></a>
               <ul class="dropdown-menu megamenu row"> 
               <?php  if(Auth::hasRoles(['developer','superadmin','admin'])) {?>
               <li class="col-sm-3">  
             
                <?php echo $this->Html->link(__("Add Category"),[
                      'plugin'=>false,
                      'controller' => 'categories', 
                      'action' => 'add_category']); ?>
                
               
                <?php echo $this->Html->link(__("View Category"),[
                      'plugin'=>false,
                      'controller' => 'categories', 
                      'action' => 'index_category']); ?>
                </li>      
                  <?php } ?>
    
               
                
                </ul>
          </li>
          <?php } ?>
           <li class="dropdown menu-large">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Form<b class="caret"></b></a>
               <ul class="dropdown-menu megamenu row"> 
              
               <li class="col-sm-3">  
             
                <?php echo $this->Html->link(__("New Form"),[
                      'plugin'=>false,
                      'controller' => 'forms', 
                      'action' => 'add']); ?>
                </li>      
               
                
                </ul>
          </li>

           <?php  if(Auth::hasRoles('developer')) {?>
          <li class="dropdown menu-large">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Institution<b class="caret"></b></a>
               <ul class="dropdown-menu megamenu row"> 

               <li class="col-sm-3">  
             
                <?php echo $this->Html->link(__("Add Institution"),[
                      'plugin'=>false,
                      'controller' => 'institutions', 
                      'action' => 'add']); ?>
                
               
                <?php echo $this->Html->link(__("View Institution"),[
                      'plugin'=>false,
                      'controller' => 'institutions', 
                      'action' => 'index']); ?>
                </li>      
                  
               
                  
                </ul>
          </li>
          <?php } ?>

          <?php  if(Auth::hasRoles('developer')) {?>
          <li class="dropdown menu-large">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Department<b class="caret"></b></a>
               <ul class="dropdown-menu megamenu row"> 

               <li class="col-sm-3">  
             
                <?php echo $this->Html->link(__("Add Department"),[
                      'plugin'=>false,
                      'controller' => 'departments', 
                      'action' => 'add']); ?>
                
               
                <?php echo $this->Html->link(__("View Department"),[
                      'plugin'=>false,
                      'controller' => 'departments', 
                      'action' => 'index']); ?>
                </li>      
                  
               
                  
                </ul>
          </li>
          <?php } ?>

           <?php  if(Auth::hasRoles('developer')) {?>
          <li class="dropdown menu-large">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Degree<b class="caret"></b></a>
               <ul class="dropdown-menu megamenu row"> 

               <li class="col-sm-3">  
             
                <?php echo $this->Html->link(__("Add Degree"),[
                      'plugin'=>false,
                      'controller' => 'degrees', 
                      'action' => 'add']); ?>
                
               
                <?php echo $this->Html->link(__("View Degree"),[
                      'plugin'=>false,
                      'controller' => 'degrees', 
                      'action' => 'index']); ?>
                </li>      
                  
               
                  
                </ul>
          </li>
          <?php } ?>

                  <?php  if(Auth::hasRoles('developer')) {?>
          <li class="dropdown menu-large">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Staff<b class="caret"></b></a>
               <ul class="dropdown-menu megamenu row"> 

               <li class="col-sm-3">  
             
                <?php echo $this->Html->link(__("Add Staff"),[
                      'plugin'=>false,
                      'controller' => 'staffs', 
                      'action' => 'add']); ?>
                
               
                <?php echo $this->Html->link(__("View Staff"),[
                      'plugin'=>false,
                      'controller' => 'staffs', 
                      'action' => 'index']); ?>
                </li>      
                  
               
                  
                </ul>
          </li>
          <?php } ?>

          <?php  if(Auth::hasRoles('developer')) {?>
          <li class="dropdown menu-large">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Student<b class="caret"></b></a>
               <ul class="dropdown-menu megamenu row"> 

               <li class="col-sm-3">  
             
                <?php echo $this->Html->link(__("Add Student"),[
                      'plugin'=>false,
                      'controller' => 'students', 
                      'action' => 'add']); ?>
                
               
                <?php echo $this->Html->link(__("View Student"),[
                      'plugin'=>false,
                      'controller' => 'students', 
                      'action' => 'index']); ?>
                </li>      
                  
               
                  
                </ul>
          </li>
          <?php } ?>


                <li>

                    <?php echo $this->Html->link(__("Logout",true),[
                      'controller' => 'users' ,
                      'action'=>'logout' ,
                      'plugin'=>false]); ?>
                     
                  
                </li>
            
          </li> 
      </div>
    </div>
</div>