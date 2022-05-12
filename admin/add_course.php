<?php session_start(); ?>
<?php include "../core/db.php"; 
  include "includes/functions.php"; ?>
<?php
    if(!isset($_SESSION['user_id'])){
        header('location: login.php');
    }
?>
<?php
    if(isset($_POST['create_course'])) {
   
        $course_title        = sanitize($_POST['title']);
        $instructor        = sanitize($_POST['instructor']);
        $course_image        = sanitize($_FILES['image']['name']);
        $course_image_temp   = $_FILES['image']['tmp_name'];


        $course_desc         = sanitize($_POST['course_desc']);
        $instructor_details     = sanitize($_POST['instructor_details']);
        $short_desc     = sanitize($_POST['short_desc']);
        $price     = sanitize($_POST['price']);
        $duration     = sanitize($_POST['duration']);
        // $post_date         = sanitize(date('d-m-y'));

   
    move_uploaded_file($course_image_temp, "../images/$course_image" );
   
   
  $query = "INSERT INTO posts(course_title, course_description, course_image, date_created,course_instructor, instructor_content, short_desc, price, duration) ";
         
  $query .= "VALUES('$course_title','$course_desc','$course_image',now(),'$instructor','$instructor_details', '$short_desc',$price,'$duration') "; 
         
  $create_post_query = mysqli_query($db_connect, $query);  
  $_SESSION['success'] = "<p class='btn-success'>Course Added Successfully<p>";
    header('location: view_all_courses.php');
   


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
                    <div class="col-md-8">
                        <?php
                            print_error();
                            print_success();
                        ?>
                            <form action="" method="post" enctype="multipart/form-data">    
            
            
                                <div class="form-group">
                                    <label for="title">Course Title</label>
                                    <input type="text" class="form-control" required name="title" >
                                </div>
                                <div class="form-group">
                                    <label for="instructor">Course Instructor</label>
                                    <input type="text" class="form-control" required name="instructor">
                                </div>
                                    
                                <div class="form-group">
                                    <label for="course_image">course Image</label>
                                    <input type="file"  required name="image">
                                </div>
                                <div class="form-group">
                                    <label for="post_content">Course Description</label>
                                    <textarea class="form-control"  required name="course_desc" id="" cols="30" rows="10">
                                    </textarea>
                                </div>

                                <div class="form-group">
                                    <label for="instructor_details">Instructor details</label>
                                    <input type="text" class="form-control" required name="instructor_details">
                                </div>
                                <div class="form-group">
                                    <label for="short_desc">Short description</label>
                                    <input type="text" class="form-control" required name="short_desc">
                                </div>
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="text" class="form-control" required name="price">
                                </div>
                                <div class="form-group">
                                    <label for="Duration">Duration details</label>
                                    <input type="text" class="form-control" required name="duration">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="create_course" value="Publish Course">
                                </div>


                            </form>
                     
                    </div>
                </div>
            </div>
        </div>
<?php include "includes/footer.php";