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
    $this->Html->image('FormLogo.png', ['alt' => 'CREATE_FORM','height'=>'179 px','width'=>'215 px']),
    [
       // 'plugin' => 'support_ticket_system',
        'controller' => 'forms',
        'action' => 'add',
    ],['escape' => false]
); 
  echo "<br>"."<h3>"."CREATE FORM"."</h3>";
  echo "</div>";
}?>


 <?php
 if (!Auth::hasRoles(array('company'))) {
    echo "<div class='col-md-3'>";
    
    echo $this->Html->link(
    $this->Html->image('viewresponse.png', ['alt' => 'feedback_system','height'=>'179 px','width'=>'215 px']),
    [
        'plugin' => 'feedback_system',
        'controller' => 'pages',
        'action' => 'dashboard',
    ],['escape' => false]
);
    echo "<br>"."<h3>"."VIEW RESPONSES"."</h3>";
    echo "</div>";
}?>



</div>
</p>