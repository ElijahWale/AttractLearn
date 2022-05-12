<?php session_start(); ?>
<?php
    if(!isset($_SESSION['user_id'])){
        header('location: login.php');
    }
?>
<?php
include "includes/header.php"
?>
<body>

<div class="wrapper">
   <?php include "includes/sidebar.php"; ?>

    <div class="main-panel">
        <?php include "includes/navbar.php"; ?>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <!-- <div class="card">

                            
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
<?php include "includes/footer.php";