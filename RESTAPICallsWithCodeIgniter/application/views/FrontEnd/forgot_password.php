<!DOCTYPE html>
<html>
<head>
<title>Forgot Password</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
</head>
<body>
<div class="container">
  <br />
  <h3 align="center">Forgot Password</h3>
  <br />
  <div class="panel panel-default">
  <div class="panel-body">
  
  <form method="post" action="<?php echo base_url(); ?>login/forgot_password">
  <div class="form-group">
      <label>Enter Registered Email Address</label>
      <input type="text" name="user_email" class="form-control" value="<?php echo set_value('user_email'); ?>" />
      <span class="text-danger"><?php echo form_error('user_email'); ?></span>
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