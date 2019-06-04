<!DOCTYPE html>
<html>
<head>
 <title>Email Verification</title>

</head>

<body>
 <div class="container">
  <br />
  <h3 align="center">Email Verification</h3>
  <br />
  
  <?php

  echo $this->session->flashdata('message');
  echo $message;
  
  ?>
  
 </div>
</body>
</html>
