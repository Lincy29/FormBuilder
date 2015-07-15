<div>
<?php print "Welcome {$fullname}"; ?>
</div>

<div>
<?php print  "Your last login was at ".$this->Time->nice($modified); ?>
</div>
<br>
<p>
<?php
    if (Auth::hasRoles(array('company'))) {
        echo $this->Html->link('Change Password',array('controller' => 'users' ,'action'=>'change_password_company')); 
    }
?>
</p>

<div class="row">
<?php
 if (!Auth::hasRoles(array('company'))) {
  echo "<div class='col-md-3'>";
  echo $this->Html->link(
    $this->Html->image('FormLogo.png', ['alt' => 'FormLogo','height'=>'179 px','width'=>'215 px']),
    [
        'plugin' => 'create_form',
        'controller' => 'pages',
        'action' => 'dashboard',
    ],['escape' => false]
); 
  echo "<br>"."<h3>"."CREATE FORM"."</h3>";

  echo "</div>";
}?>


 <?php
 if (!Auth::hasRoles(array('company'))) {
    echo "<div class='col-md-3'>";
    
    echo $this->Html->link(
    $this->Html->image('viewresponse.png', ['alt' => 'viewresponse','height'=>'179 px','width'=>'215 px']),
    [
        'plugin' => 'view_response',
        'controller' => 'pages',
        'action' => 'dashboard',
    ],['escape' => false]
);
    echo "<br>"."<h3>"."VIEW RESPONSES"."</h3>";
    echo "</div>";
}?>



</div>
</p>