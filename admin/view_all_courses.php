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
                    <div class="col-md-12">
                    
                        <div class="card">
                        <?php
                            print_error();
                            print_success();
                        ?>
                            <div class="header">
                                <h4 class="title">All Courses</h4>
                                <a href="add_course.php">
                                  <button class="btn btn-success">Add Course</button>  
                                </a>
                                
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>ID</th>
                                    	<th>Course Title</th>
                                    	<th>Course Description</th>
                                    	<th>Course Image</th>
                                    	<th>Course Instructor</th>
                                    	<th>Instructor details</th>
                                    	<th>short desc</th>
                                    	<th>Price</th>
                                    	<th>Duration</th>
                                    	<th>Date Created</th>
                                    	<th>Action</th>

                                    </thead>
                                    <tbody>
                                        <?php
                                            $i = 0;
                                            $query = "SELECT * FROM posts";
                                            $select_courses = mysqli_query($db_connect, $query);
                                            while($row = mysqli_fetch_assoc($select_courses)){
                                                $i++;
                                                $course_id = $row['id'];
                                                $course_title = $row['course_title'];
                                                $course_description = $row['course_description'];
                                                $course_image         = $row['course_image'];
                                                $course_instructor   = $row['course_instructor'];
                                                $instructor_content   = $row['instructor_content'];
                                                $short_desc   = $row['short_desc'];
                                                $price   = $row['price'];
                                                $duration   = $row['duration'];
                                                $date_created  = $row['date_created'];
                                              ?>  
        
                                        <tr>
                                        	<td><?= $i; ?></td>
                                        	<td><?= $course_title; ?></td>
                                        	<td><?= $course_description; ?></td>
                                        	<td>
                                           <img width="100" src="../images/<?= $course_image; ?>"></td>
                                                
                                        	<td><?= $course_instructor; ?></td>
                                        	<td><?= $instructor_content; ?></td>
                                        	<td><?= $short_desc; ?></td>
                                        	<td>&#8358;<?= $price; ?></td>
                                        	<td><?= $duration; ?></td>
                                        	<td><?= $date_created; ?></td>
                                        	<td><a class="btn btn-info" href="edit_course.php?p_id=<?=$course_id; ?>">Edit</a> </td>
                                                <form method="post">

                                                    <input type="hidden" name="course_id" value="<?= $course_id ?>">                                 
                                                    <td><input class="btn btn-danger" type="submit" name="delete" value="Delete"></td>;
                                                 </form>
                                            
                                        </tr>
                                       <?php } ?>
                                    </tbody>
                                </table>
                                <?php
                                    if(isset($_POST['delete'])){
    
                                        $the_course_id = sanitize($_POST['course_id']);
                                        
                                        $query = "DELETE FROM posts WHERE id = {$the_course_id} ";
                                        $delete_query = mysqli_query($db_connect, $query);
                                        $_SESSION['success'] = "<p class='btn-success'>Course Deleted Successfully<p>";
                                        
                                        
                                        
                                    }
                                ?>

                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php include "includes/footer.php";