<?php session_start(); ?>
<?php include "../core/db.php" ?> 
<?php  include "includes/header.php" ?>
<?php  include "includes/functions.php" ?>

<?php
    $errors= "";
    if(isset($_POST['login'])){
         // validation for email
        if(empty($_POST['email'])){
            $errors.= "your email is empty";
        }else{
            $email = sanitize($_POST['email']);
        }

        // validation for password
        if(empty($_POST['password'])){
            $errors.= "<br>your password is empty";
        }else{
            $password = sanitize($_POST['password']);
        }
        if($errors){
            //print error message
            $_SESSION['error'] = '<div class="alert alert-danger">' . $errors .'</div>' . "<br>";
              
        }else{
            $email = mysqli_real_escape_string($db_connect, $email);
            $password = mysqli_real_escape_string($db_connect, $password);
    
                    //Run query: Check combinaton of email & password exists
            $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
            $result = mysqli_query($db_connect, $sql);
            if(!$result){
                $_SESSION['error'] = '<div class="alert alert-danger">Error running the query!</div>';
               
            }
    
            //If email & password don't match print error
            $count = mysqli_num_rows($result);
            if($count !== 1){
                $_SESSION['error'] = '<div class="alert alert-danger">Wrong Username or Password</div>';
            }
            else {
                //log the user in: Set session variables
                $row = mysqli_fetch_assoc($result);
                $_SESSION['user_id']=$row['user_id'];
                $_SESSION['username']=$row['username'];
                $_SESSION['email']=$row['email'];
                $_SESSION['first_name'] = $row['first_name'];
    
                
                header('location: index.php');
    
                
            }
    
        }
    }

?>
<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="text-center">

                            <?php 
                            print_error();
                            print_success();
                            ?>
							<h3><i class="fa fa-user fa-4x"></i></h3>
							<h2 class="text-center">Login</h2>
							<div class="panel-body">


								<form id="login-form" action="" role="form"" class="form" method="post">

									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon"><i class="glyphicon glyphicon-user color-blue"></i></span>

											<input name="email" type="text" class="form-control" placeholder="Enter Email Address">
										</div>
									</div>

									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon"><i class="glyphicon glyphicon-lock color-blue"></i></span>
											<input name="password" type="password" class="form-control" placeholder="Enter Password">
										</div>
									</div>

									<div class="form-group">

										<input name="login" class="btn btn-lg btn-primary btn-block" value="Login" type="submit">
									</div>


								</form>

							</div><!-- Body-->

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>