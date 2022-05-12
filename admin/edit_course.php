<?php session_start(); ?>
<?php include "../core/db.php"; 
  include "includes/functions.php"; ?>
<?php
    if(!isset($_SESSION['user_id'])){
        header('location: login.php');
    }
?>
<?php

if(isset($_GET['p_id'])){  
    $the_course_id =  sanitize($_GET['p_id']);
}

$sql = "SELECT * FROM posts WHERE id= $the_course_id";
$select_course_by_id = mysqli_query($db_connect, $sql);

while($row = mysqli_fetch_assoc($select_course_by_id)){
   
    $course_title = $row['course_title'];
    $course_description = $row['course_description'];
    $course_image         = $row['course_image'];
    $course_instructor   = $row['course_instructor'];
    $instructor_content   = $row['instructor_content'];
    $short_desc   = $row['short_desc'];
    $price   = $row['price'];
    $duration   = $row['duration'];

}
    if(isset($_POST['update_course'])) {
            
            
        $course_title  = sanitize($_POST['title']);
        $instructor  = sanitize($_POST['instructor']);
        $course_image = sanitize($_FILES['image']['name']);
        $course_image_temp = $_FILES['image']['tmp_name'];
        $course_desc = sanitize($_POST['course_desc']);
        $instructor_details = sanitize($_POST['instructor_details']);
        $short_desc     = sanitize($_POST['short_desc']);
        $price     = sanitize($_POST['price']);
        $duration    = sanitize($_POST['duration']);
        
        move_uploaded_file($course_image_temp, "../images/$course_image" );
        
        if(empty($course_image)) {
        
        $query = "SELECT * FROM posts WHERE id = $the_course_id ";
        $select_image = mysqli_query($db_connect,$query);
            
        while($row = mysqli_fetch_array($select_image)) {
            
        $course_image = $row['course_image'];
        
        }
    }
          $query = "UPDATE posts SET ";
          $query .="course_title  = '{$course_title}', ";
          $query .="course_description = '{$course_desc}', ";
          $query .="course_image   =  '{$course_image}', ";
          $query .="date_created = now(), ";
          $query .="course_instructor = '{$instructor}', ";
          $query .="instructor_content   = '{$instructor_details}', ";
          $query .="short_desc   = '{$short_desc}', ";
          $query .="price   = '{$price}', ";
          $query .="duration   = '{$duration}' ";
          $query .= "WHERE id= $the_course_id";
        
          $update_course = mysqli_query($db_connect,$query);
          if(!$update_course ) {
          
            die("QUERY FAILED ." . mysqli_error($db_connect));            
            }
            $_SESSION['success'] = "<p class='btn-success'>Course Updated Successfully<p>";
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
                                    <input type="text" class="form-control" required name="title" value="<?= $course_title ?>">
                                </div>
                                <div class="form-group">
                                    <label for="instructor">Course Instructor</label>
                                    <input type="text" class="form-control" required name="instructor" value="<?= $course_instructor; ?>">
                                </div>
                                    
                                <div class="form-group">
                                <img width="100" src="assets/img/<?php echo $course_image; ?>" alt="">
                                    <label for="course_image">course Image</label>
                                    <input type="file"  required name="image">
                                </div>
                                <div class="form-group">
                                    <label for="post_content">Course Description</label>
                                    <textarea class="form-control"  required name="course_desc" id="" cols="30" rows="10"> <?= $course_description; ?>
                                    </textarea>
                                </div>

                                <div class="form-group">
                                    <label for="instructor_details">Instructor details</label>
                                    <input type="text" class="form-control" required name="instructor_details" value="<?= $instructor_content; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="instructor_details">Short Description</label>
                                    <input type="text" class="form-control" required name="short_desc" value="<?= $short_desc; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="instructor_details">Price</label>
                                    <input type="text" class="form-control" required name="price" value="<?= $price; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="instructor_details">Duration</label>
                                    <input type="text" class="form-control" required name="duration" value="<?= $duration; ?>">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="update_course" value="Update Course">
                                </div>


                            </form>
                     
                    </div>
                </div>
            </div>
        </div>
<?php include "includes/footer.php";