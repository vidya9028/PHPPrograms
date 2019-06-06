<!DOCTYPE html>
<html>
<head>
 <title>Reset Password</title>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
</head>

<body style = "background-color:LightGray">
 <div class="container">
  <br />
  <h3 align="center">Reset Password</h3>
  <br />
  <div class="panel panel-default">
   <div class="panel-heading" style = "color:red">Reset Password</div>
   <div class="panel-body">
   <?php
        if($this->session->flashdata('message'))
        {
            echo '
             <div class="alert alert-success">
             '.$this->session->flashdata("message").'
             </div>';
        }
    ?>
    <form method="post" action="<?php echo base_url(); ?>login/reset_password">
     <div class="form-group">
      <label>Enter New Password</label>
      <input type="password" name="user_password" class="form-control" value="<?php echo set_value('user_password'); ?>" />
      <span class="text-danger"><?php echo form_error('user_password'); ?></span>
     </div>
     <div class="form-group">
      <label>Confirm Password</label>
      <input type="password" name="confirm_password" class="form-control" value="<?php echo set_value('confirm_password'); ?>" />
      <span class="text-danger"><?php echo form_error('confirm_password'); ?></span>
     </div>
     <div class="form-group">
      <input type="submit" name="submit" value="Submit" class="btn btn-info" />
     </div>
    </form>
   </div>
  </div>
 </div>
</body>
</html>
