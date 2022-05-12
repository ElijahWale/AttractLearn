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
                        <?php
                            print_error();
                            print_success();
                        ?>
                            <div class="header">
                                <h4 class="title">All Comments</h4>
                                <a href="add_course.php">
                                  <button class="btn btn-info">Add Comments</button>  
                                </a>
                                
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>ID</th>
                                    	<th>Comment Author</th>
                                    	<th>Comment Email</th>
                                    	<th>Comment Message</th>
                                    	<th>Comment status </th>
                                        <th>Date Created</th>
                                        <th>Approve</th>
                                        <th>Unapprove</th>
                                        <th>Delete</th>
                                    	

                                    </thead>
                                    <tbody>
                                        <?php
                                            $i = 0;
                                            $query = "SELECT * FROM comments";
                                            $select_comments = mysqli_query($db_connect, $query);
                                            while($row = mysqli_fetch_assoc($select_comments)){
                                                $i++;
                                                $comment_id = $row['comment_id'];
                                                $comment_author = $row['comment_author'];
                                                $comment_email = $row['comment_email'];
                                                $comment_content  = $row['comment_content'];
                                                $comment_status   = $row['comment_status'];
                                                $date_created  = $row['comment_date'];
                                              ?>  
        
                                        <tr>
                                        	<td><?= $i; ?></td>
                                        	<td><?= $comment_author; ?></td>
                                        	<td><?= $comment_email; ?></td>        
                                        	<td><?= $comment_content; ?></td>
                                        	<td><?= $comment_status ; ?></td>
                                        	<td><?= $date_created; ?></td>
                                            <td><a href='view_all_comments.php?approve=<?=$comment_id; ?>'>Approve</a></td>
                                            <td><a href='view_all_comments.php?unapprove=<?=$comment_id; ?>'>Unapprove</a></td>
                                            <td><a href='view_all_comments.php?delete= <?= $comment_id; ?>'>Delete</a></td>
                                            
                                        </tr>
                                       <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                            
                        </div>
                    </div>
                    <?php
                            if(isset($_GET['approve'])){
    
                                $the_comment_id = sanitize($_GET['approve']);
                                
                                $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = $the_comment_id";
                                $approve_comment_query = mysqli_query($db_connect, $query);
                                header("Location: view_all_comments.php");
                                
                                
                            }
                   
                    
                            if(isset($_GET['unapprove'])){
    
                                $the_comment_id = sanitize($_GET['unapprove']);
                                
                                $query = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = $the_comment_id";
                                $unapprove_comment_query = mysqli_query($db_connect, $query);
                                //  header('Location: view_all_comments.php');
                                
                                
                            }

                            if(isset($_GET['delete'])){
    
                                $the_comment_id = sanitize($_GET['delete']);
                                
                                $query = "DELETE FROM comments WHERE comment_id = $the_comment_id";
                                $delete_query = mysqli_query($db_connect, $query);
                                // header('Location: view_all_comments.php');
                                
                                
                            }
                    ?>
                </div>
            </div>
        </div>
<?php include "includes/footer.php";