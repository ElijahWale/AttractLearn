<?php session_start(); ?>
<?php include "../core/db.php"; 
  include "includes/functions.php"; ?>
<?php
    if(!isset($_SESSION['user_id'])){
        header('location: login.php');
    }else{
        $username = $_SESSION['username'];

        $query = "SELECT * FROM users WHERE username = '$username'";
        $user_profile = mysqli_query($db_connect, $query);
        while($row = mysqli_fetch_array($user_profile)) {
            $username = $row['username'];
            $first_name= $row['first_name'];
            $last_name = $row['last_name'];
            $email = $row['email'];
            $user_image = $row['user_image'];
            $password = $row['password'];

        }
        if(isset($_POST['update_profile'])) {
            
            
            $username_profile  = sanitize($_POST['username']);
            $first_name  = sanitize($_POST['first_name']);
            $user_image = sanitize($_FILES['image']['name']);
            $user_image_temp = $_FILES['image']['tmp_name'];
            $email = sanitize($_POST['email']);
            $last_name = sanitize($_POST['last_name']);
            $password = sanitize($_POST['password']);
            
            move_uploaded_file($user_image_temp, "assets/img/$user_image" );
            
              $query = "UPDATE users SET ";
              $query .="first_name  = '{$first_name}', ";
              $query .="last_name = '{$last_name}', ";
              $query .="username   =  '{$username_profile}', ";
              $query .="email = '{$email}', ";
              $query .="user_image   = '{$user_image}', ";
              $query .="password = '{$password}' ";
              $query .= "WHERE username = '$username'";
            
              $update_user = mysqli_query($db_connect,$query);
              if(!$update_user ) {
              
                die("QUERY FAILED ." . mysqli_error($db_connect));            
                }
                $_SESSION['success'] = "<p class='text-success'>User Updated Successfully<p>";
              
    }
    }
?>
<?php
include "includes/header.php";
?>
<body>

<div class="wrapper">
   <?php include "includes/sidebar.php"; ?>

    <div class="main-panel">
        <?php include "includes/navbar.php"; ?>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <?php
                                print_error();
                                print_success();
                            ?>
                            <div class="header">
                                <h4 class="title">Edit Profile</h4>
                            </div>
                            <div class="content">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                       
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" class="form-control" name="username"  placeholder="Username" value="<?= $username; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" class="form-control" name="email" placeholder="Email" value="<?= $email; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input type="text" class="form-control" name="first_name" placeholder="Company" value="<?= $first_name; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="text" class="form-control" name="last_name" placeholder="Last Name" value="<?= $last_name; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Upload User Image</label>
                                                <input type="file" required name="image">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" required name="password" value="<?= $password; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-info btn-fill pull-right" name="update_profile" >Update Profile</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-user">
                            <div class="image">
                                <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="..."/>
                            </div>
                            <div class="content">
                                <div class="author">
                                     <a href="#">
                                    <img class="avatar border-gray" src="assets/img/<?=$user_image; ?>" alt="..."/>

                                      <h4 class="title"><?= $first_name . ' ' . $last_name ?><br />
                                         <small>@<?= $username; ?></small>
                                      </h4>
                                    </a>
                                </div>
                            </div>
                            <hr>
                            <div class="text-center">
                                <button href="#" class="btn btn-simple"><i class="fa fa-facebook-square"></i></button>
                                <button href="#" class="btn btn-simple"><i class="fa fa-twitter"></i></button>
                                <button href="#" class="btn btn-simple"><i class="fa fa-google-plus-square"></i></button>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
<?php include "includes/footer.php";