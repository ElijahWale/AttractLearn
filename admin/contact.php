<?php session_start(); ?>
<?php
include "../core/db.php";
include "includes/functions.php";
?>
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
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                    <h4 class="title">Contact Page</h4>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>ID</th>
                                    	<th>First Name</th>
                                    	<th>Last Name</th>
                                    	<th>Subject</th>
                                    	<th>Email</th>
                                    	<th>Message</th>
                                    	<th>Date Created</th>
                                    </thead>
                                    <tbody>
                                    <?php
                                            $i = 0;
                                            $query = "SELECT * FROM contacts";
                                            $select_all_contacts = mysqli_query($db_connect, $query);
                                            while($row = mysqli_fetch_assoc($select_all_contacts)){
                                                $i++;
                                                // $course_id = $row['id'];
                                                $first_name = $row['first_name'];
                                                $last_name = $row['last_name'];
                                                $subject         = $row['subject'];
                                                $email   = $row['email'];
                                                $subject   = $row['subject'];
                                                $date_created  = $row['date_created'];
                                              ?> 
                                        <tr>
                                        	<td><?= $i; ?></td>
                                        	<td><?= $first_name; ?></td>
                                        	<td><?= $last_name; ?></td>
                                        	<td><?= $subject; ?></td>
                                        	<td><?= $email; ?></td>
                                        	<td><?= $subject; ?></td>
                                        	<td><?= $date_created; ?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php include "includes/footer.php";