<?php
session_start();
?>
<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Technology BookStore:Contact</title>
<?php include"_head.php";?>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
 <?php include "_header.php";

 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     $message = ($db->contact($_POST['name'], $_POST['email'], $_POST['message'])) ? "Message successfully sent." : "Unknown error occurred while sending message.";
     echo "<script>alert(\"$message\")</script>";
 }

 ?>

 <div class="container">
     <div class="row">
         <div class="col-md-6 col-md-offset-3" style="margin: 40px auto;">
             <div class="well well-sm">
                 <form class="form-horizontal" method="post">
                     <fieldset>
                         <legend class="text-center">Contact us</legend>

                         <!-- Name input-->
                         <div class="form-group">
                             <label class="col-md-3 control-label" for="name">Name</label>
                             <div class="col-md-12">
                                 <input id="name" name="name" type="text" placeholder="Your name" class="form-control" required>
                             </div>
                         </div>

                         <!-- Email input-->
                         <div class="form-group">
                             <label class="col-md-3 control-label" for="email">Your E-mail</label>
                             <div class="col-md-12">
                                 <input id="email" name="email" type="email" placeholder="Your email" class="form-control" required>
                             </div>
                         </div>

                         <!-- Message body -->
                         <div class="form-group">
                             <label class="col-md-3 control-label" for="message">Your message</label>
                             <div class="col-md-12">
                                 <textarea class="form-control" id="message" name="message" placeholder="Please enter your message here..." rows="5" required></textarea>
                             </div>
                         </div>

                         <!-- Form actions -->
                         <div class="form-group">
                             <div class="col-md-12 text-right">
                                 <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                             </div>
                         </div>
                     </fieldset>
                 </form>
             </div>
         </div>
     </div>
 </div>
       <?php include "_footer.php"?>
</body>
</html>