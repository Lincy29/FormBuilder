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

        <p style="padding-left: 20px;"><?php echo $this->Html->image('gnulogo.png', array('alt' => 'GNU', 'border' => '0')); ?></p>
        </div>
        <h1 style="padding-left:200px;">Dynamic Form Generator</h1>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav" style="padding-left:30px;">
        <li>
          <?php echo $this->Html->link(__("Home"),array('plugin'=>false,
                                                        'controller' => 'users',
                                                        'action' => 'dashboard'));
           ?>
        </li>


        <li class="dropdown menu-large">
          <?php if(Auth::hasRoles(['developer','superadmin','admin'])) {?>
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



              <?php if(Auth::hasRoles(['developer'])) {?>

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

              <?php } ?>

             <?php  if(Auth::hasRoles(['developer','superadmin'])) {?>
              <li class="dropdown-header">Manage Admin</li>
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
              <li class="divider"></li>
              <?php } ?>
               
               
              <?php  if(Auth::hasRoles(['developer','superadmin','admin'])) {?>
              <li class="dropdown-header">Manage FormAdmin</li>
                  <li>
                    <?php echo $this->Html->link(__("New FormAdmin",true),[
                    'plugin'=>false,
                    'controller' => 'user_roles', 
                    'action' => 'add_formadmin']); ?>
                  </li>
              <?php } ?>

              <?php if(Auth::hasRoles(['developer','superadmin','admin'])) {?>
              <li>
                <?php echo $this->Html->link(__("View FormAdmins",true),[
                'plugin'=>false,
                'controller' => 'user_roles', 
                'action' => 'index_formadmin']);?>
              </li>
              <li class="divider"></li>
              <?php } ?>
              


              <?php  if(Auth::hasRoles(['developer','superadmin','admin'])) {?>
              <li class="dropdown-header">Manage FormCoordinator</li>
                  <li>
                    <?php echo $this->Html->link(__("New FormCoordinator",true),[
                    'plugin'=>false,
                    'controller' => 'user_roles', 
                    'action' => 'add_formcoord']); ?>
                  </li>
              <?php } ?>

              <?php if(Auth::hasRoles(['developer','superadmin','admin'])) {?>
              <li>
                <?php echo $this->Html->link(__("View FormCoordinators",true),[
                'plugin'=>false,
                'controller' => 'user_roles', 
                'action' => 'index_formcoord']);?>
              </li>
              
              <?php } ?>
            </ul>
          </li>
        </ul>
      </li>
      <li class="dropdown menu-large">
          <?php if(Auth::hasRoles(['developer','superadmin','admin','user'])) {?>
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Category<b class="caret"></b></a>
          <?php } ?> 
        <ul class="dropdown-menu megamenu row">
          <li class="col-sm-3">
            <ul>
              <?php if(Auth::hasRoles(['developer','superadmin','admin'])) {?>
             <!-- <li class="dropdown-header">Manage Roles</li>-->
             <li class="dropdown-header">Manage Category</li>
                  <li>
                    <?php echo $this->Html->link(__("New Category",true),[
                      'plugin'=>false,
                      'controller' => 'categories', 
                      'action' => 'add_category']); ?>
                </li>
                <li>
                    <?php echo $this->Html->link(__("View Category",true),[
                      'plugin'=>false,
                      'controller' => 'categories', 
                      'action' => 'index_category']); ?>
                </li>
                <?php } ?>
                <?php if(Auth::hasRoles(['formadmin'])) {?>
             <!-- <li class="dropdown-header">Manage Roles</li>-->
             <li class="dropdown-header">Manage Category</li>
                  <li>
                    <?php echo $this->Html->link(__("New Category",true),[
                      'plugin'=>false,
                      'controller' => 'categories', 
                      'action' => 'add_category_formadmin']); ?>
                </li>
                <li>
                    <?php echo $this->Html->link(__("View Category",true),[
                      'plugin'=>false,
                      'controller' => 'categories', 
                      'action' => 'index_category_formadmin']); ?>
                </li>
                <?php } ?>

                <?php if(Auth::hasRoles(['formcoordinator'])) {?>
             <!-- <li class="dropdown-header">Manage Roles</li>-->
                  <li>
                    <?php echo $this->Html->link(__("New Category",true),[
                      'plugin'=>false,
                      'controller' => 'categories', 
                      'action' => 'add']); ?>
                </li>
                <li>
                    <?php echo $this->Html->link(__("View Category",true),[
                      'plugin'=>false,
                      'controller' => 'categories', 
                      'action' => 'index']); ?>
                </li>
                <?php } ?>
              </ul>
            </li>
          </ul>
        </li>
        <li>
          
           <?php if(Auth::hasRoles(['formadmin'])) {?>
             <!-- <li class="dropdown-header">Manage Roles</li>-->
            <?php echo $this->Html->link(__("Form"),array('plugin'=>'form_builder',
                                                        'controller' => 'forms',
                                                        'action' => 'add_fadmin'));
            ?>
           <?php } ?>
           <?php if(Auth::hasRoles(['developer','superadmin','admin'])) {?>

             <!-- <li class="dropdown-header">Manage Roles</li>-->
            <?php echo $this->Html->link(__("Form"),array('plugin'=>'form_builder',

                                                        'controller' => 'forms',
                                                        'action' => 'add'));
            ?>
            <li>
           <?php } ?>
           <?php if(Auth::hasRoles(['formcoordinator'])) {?>
             <!-- <li class="dropdown-header">Manage Roles</li>-->
            <?php echo $this->Html->link(__("Form"),array('plugin'=>'form_builder',
                                                        'controller' => 'forms',
                                                        'action' => 'add_fcoord'));
            ?>
           <?php } ?>
        </li>
         <li class="dropdown menu-large">
          <?php if(Auth::hasRoles(['developer','superadmin'])) {?>
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Institution<b class="caret"></b></a>
          <?php } ?> 
        <ul class="dropdown-menu megamenu row">
          <li class="col-sm-3">
            <ul>
              
                  <li>
                    <?php echo $this->Html->link(__("New Institution",true),[
                      'plugin'=>false,
                      'controller' => 'institutions', 
                      'action' => 'add']); ?>
                </li>
                <li>
                    <?php echo $this->Html->link(__("View Institution",true),[
                      'plugin'=>false,
                      'controller' => 'institutions', 
                      'action' => 'index']); ?>
                </li>               
                
              </ul>
            </li>
          </ul>
        </li>
        <li class="dropdown menu-large">
          <?php if(Auth::hasRoles(['developer','superadmin'])) {?>
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Department<b class="caret"></b></a>
          <?php } ?> 
        <ul class="dropdown-menu megamenu row">
          <li class="col-sm-3">
            <ul>
              
                  <li>
                    <?php echo $this->Html->link(__("New Department",true),[
                      'plugin'=>false,
                      'controller' => 'departments', 
                      'action' => 'add']); ?>
                </li>
                <li>
                    <?php echo $this->Html->link(__("View Department",true),[
                      'plugin'=>false,
                      'controller' => 'departments', 
                      'action' => 'index']); ?>
                </li>               
                
              </ul>
            </li>
          </ul>
        </li>
        <li class="dropdown menu-large">
          <?php if(Auth::hasRoles(['developer'])) {?>
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Degree<b class="caret"></b></a>
          <?php } ?> 
        <ul class="dropdown-menu megamenu row">
          <li class="col-sm-3">
            <ul>
              
                  <li>
                    <?php echo $this->Html->link(__("New Degree",true),[
                      'plugin'=>false,
                      'controller' => 'degrees', 
                      'action' => 'add']); ?>
                </li>
                <li>
                    <?php echo $this->Html->link(__("View Degree",true),[
                      'plugin'=>false,
                      'controller' => 'degrees', 
                      'action' => 'index']); ?>
                </li>               
                
              </ul>
            </li>
          </ul>
        </li>
        <li class="dropdown menu-large">
          <?php if(Auth::hasRoles(['developer'])) {?>
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Staff<b class="caret"></b></a>
          <?php } ?> 
        <ul class="dropdown-menu megamenu row">
          <li class="col-sm-3">
            <ul>
              
                  <li>
                    <?php echo $this->Html->link(__("New Staff",true),[
                      'plugin'=>false,
                      'controller' => 'staffs', 
                      'action' => 'add']); ?>
                </li>
                <li>
                    <?php echo $this->Html->link(__("View Staff",true),[
                      'plugin'=>false,
                      'controller' => 'staffs', 
                      'action' => 'index']); ?>
                </li>               
                
              </ul>
            </li>
          </ul>
        </li>
         
          <li>
              <?php echo $this->Html->link(__("Logout",true),[
              'controller' => 'users' ,
              'action'=>'logout' ,
              'plugin'=>false]); ?>
          </li> 
                  
      </div>
    </div>
</div>