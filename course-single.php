<?php session_start(); ?>
<?php
include "core/db.php";
include "includes/functions.php";
?>

<?php

if(isset($_GET['p_id'])){  
  $the_course_id =  sanitize($_GET['p_id']);
  
  $query = "SELECT * FROM posts WHERE id=$the_course_id";
  $select_courses = mysqli_query($db_connect, $query);
  while($row = mysqli_fetch_assoc($select_courses)){
      $course_id = $row['id'];
      $course_title = $row['course_title'];
      $course_description = $row['course_description'];
      $course_image         = $row['course_image'];
      $course_instructor   = $row['course_instructor'];
      $instructor_content   = $row['instructor_content'];
      $course_duration   = $row['duration'];
      $date_created  = $row['date_created'];
  }  
        
  
}else{
  header('location: index.php');
}


if(isset($_POST['submit'])){
        $the_comment_id = $_GET['p_id'];
        $comment_author = $_POST['author'];
        $comment_email = $_POST['email'];
        $comment_content = $_POST['comment_content'];


        if (!empty($comment_author) && !empty($comment_email) && !empty($comment_content)) {


            $query = "INSERT INTO comments (comment_course_id, comment_author, comment_email, comment_content, comment_status,comment_date)";

            $query .= "VALUES ($the_comment_id ,'{$comment_author}', '{$comment_email}', '{$comment_content }', 'unapproved',now())";

            $create_comment_query = mysqli_query($db_connect, $query);

            if (!$create_comment_query) {
                die('QUERY FAILED' . mysqli_error($db_connect));


            }
            $_SESSION['success'] = "<p class='btn-success'>Your comment has been successfully sent <p>";


        }
}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <title>OneSchool &mdash; Website by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    
    <!-- <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet"> -->
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <link rel="stylesheet" href="css/jquery.fancybox.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">
    
  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  
  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
   
    
    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">
      
      <div class="container-fluid">
        <div class="d-flex align-items-center">
          <div class="site-logo mr-auto w-25"><a href="index.html">OneSchool</a></div>

          <div class="mx-auto text-center">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu js-clone-nav mx-auto d-none d-lg-block  m-0 p-0">
                <li><a href="#home-section" class="nav-link">Home</a></li>
                <li><a href="#courses-section" class="nav-link">Courses</a></li>
                <li><a href="#programs-section" class="nav-link">Programs</a></li>
                <li><a href="#teachers-section" class="nav-link">Teachers</a></li>
              </ul>
            </nav>
          </div>

          <div class="ml-auto w-25">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu site-menu-dark js-clone-nav mr-auto d-none d-lg-block m-0 p-0">
                <li class="cta"><a href="#contact-section" class="nav-link"><span>Contact Us</span></a></li>
              </ul>
            </nav>
            <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black float-right"><span class="icon-menu h3"></span></a>
          </div>
        </div>
      </div>
      
    </header>

    <div class="intro-section single-cover" id="home-section">
      
      <div class="slide-1 " style="background-image: url('images/img_2.jpg');" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-12">
              <div class="row justify-content-center align-items-center text-center">
                <div class="col-lg-6">
                  <h1 data-aos="fade-up" data-aos-delay="0"><?= $course_title; ?></h1>
                  <!-- number of comments -->

                  <?php
                  //   $query = "SELECT * FROM comments WHERE comment_course_id=$the_course_id AND comment_status='approved'";
                  //   $number_of_comments = mysqli_query($db_connect, $query);
                  //   if(!$number_of_comments) {

                  //     die('Query Failed' . mysqli_error($db_connect));
                  //  }
                  //   if($rows = mysqli_num_rows($number_of_comments)){
                  //       echo $rows;
                  //   }else{
                  //     $rows = '';
                  //   }
                  ?>
                  <p data-aos="fade-up" data-aos-delay="100"><?= $course_duration; ?> &bullet; 2,193 students &bullet; <a href="#" class="text-white">comments</a></p>
                </div>

                
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
    
    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mb-5">

            <div class="mb-5">
              <h3 class="text-black">Course Description</h3>
              
              <p><?= $course_description; ?></p>

              <p class="mt-4"><a href="#" class="btn btn-primary">Admission</a></p>
            </div>

            <div class="pt-5">
              <h3 class="mb-5">6 Comments</h3>
              <ul class="comment-list">
                <?php
                      
                      $query = "SELECT * FROM comments WHERE comment_course_id=$the_course_id AND comment_status='approved' ORDER BY comment_id DESC";
                      $select_comments = mysqli_query($db_connect, $query);
                      if(!$select_comments) {

                        die('Query Failed' . mysqli_error($db_connect));
                     }
                      while($row = mysqli_fetch_assoc($select_comments)){
                        $comment_author = $row['comment_author'];
                        $comment_email = $row['comment_email'];
                        $comment_content  = $row['comment_content'];
                        $date_created  = $row['comment_date'];
                      ?>
                <li class="comment">
                  <div class="vcard bio">
                    <img src="images/person_1.jpg" alt="Image placeholder">
                  </div>
                  <div class="comment-body">
                    <h3><?= $comment_author; ?></h3>
                    <div class="meta"><?= $date_created; ?></div>
                    <p><?= $comment_content; ?></p>
                    <p><a href="#comment-form" class="reply">Reply</a></p>
                  </div>
                </li>
                <?php } ?>
              </ul>
              <!-- END comment-list -->
              
              <div class="comment-form-wrap pt-5" id="comment-form">
                <h3 class="mb-5">Leave a comment</h3>
                <form action="" class="p-5 bg-light" method="POST">
                <?php
                    print_error();
                    print_success();
                ?>
                  <div class="form-group">
                    <label for="author">author *</label>
                    <input type="text" class="form-control" name="author" id="author">
                  </div>
                  <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" class="form-control" name="email" id="email">
                  </div>

                  <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" cols="30" rows="10" name="comment_content" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <input type="submit" value="Post Comment" name="submit" class="btn btn-primary">
                  </div>

                </form>
              </div>
            </div>



          </div>
          <div class="col-lg-4 pl-lg-5">

            <div class="mb-5 text-center border rounded course-instructor">
              <h3 class="mb-5 text-black text-uppercase h6 border-bottom pb-3">Course Instructor</h3>
              <div class="mb-4 text-center">
                <img src="images/person_2.jpg" alt="Image" class="w-25 rounded-circle mb-4">  
                <h3 class="h5 text-black mb-4"><?= $course_instructor; ?></h3>
                <p><?= $instructor_content; ?></p>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

    <div class="site-section courses-title bg-dark" id="courses-section">
      <div class="container">
        <div class="row mb-5 justify-content-center">
          <div class="col-lg-7 text-center" data-aos="fade-up" data-aos-delay="">
            <h2 class="section-title">More Courses</h2>
          </div>
        </div>
      </div>
    </div>
    <div class="site-section courses-entry-wrap"  data-aos="fade" data-aos-delay="100">
      <div class="container">
        <div class="row">

          <div class="owl-carousel col-12 nonloop-block-14">

          <?php
            $query = "SELECT * FROM posts";
            $select_courses = mysqli_query($db_connect, $query);
            while($row = mysqli_fetch_assoc($select_courses)){
                $course_id = $row['id'];
                $course_title = $row['course_title'];
                $course_duration = $row['duration'];
                $course_image         = $row['course_image'];
                $short_desc   = $row['short_desc'];
                $price   = $row['price'];
                $date_created  = $row['date_created'];
              ?>  
            <div class="course bg-white h-100 align-self-stretch">
              <figure class="m-0">
                <a href="course-single.php?p_id=<?= $course_id ?>"><img src="images/<?= $course_image; ?>" alt="Image" class="img-fluid"></a>
              </figure>
              <div class="course-inner-text py-4 px-4">
                <span class="course-price"><?= $price; ?></span>
                <div class="meta"><span class="icon-clock-o"></span><?= $course_duration; ?></div>
                <h3><a href="course-single.php?p_id=<?= $course_id ?>"><?= $course_title; ?></a></h3>
                <p><?= $short_desc; ?></p>
                <br>
                <br>
              </div>
              <div class="d-flex border-top stats">
                <div class="py-3 px-4"><span class="icon-users"></span> Beginner Level</div>
                <div class="py-3 px-4 w-25 ml-auto border-left"><span class="icon-chat"></span> 2</div>
              </div>
            </div>
              <?php } ?>


          </div>

         

        </div>
        <div class="row justify-content-center">
          <div class="col-7 text-center">
            <button class="customPrevBtn btn btn-primary m-1">Prev</button>
            <button class="customNextBtn btn btn-primary m-1">Next</button>
          </div>
        </div>
      </div>
    </div>
     
    <footer class="footer-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <h3>About OneSchool</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro consectetur ut hic ipsum et veritatis corrupti. Itaque eius soluta optio dolorum temporibus in, atque, quos fugit sunt sit quaerat dicta.</p>
          </div>

          <div class="col-md-3 ml-auto">
            <h3>Links</h3>
            <ul class="list-unstyled footer-links">
              <li><a href="#">Home</a></li>
              <li><a href="#">Courses</a></li>
              <li><a href="#">Programs</a></li>
              <li><a href="#">Teachers</a></li>
            </ul>
          </div>

          <div class="col-md-4">
            <h3>Subscribe</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt incidunt iure iusto architecto? Numquam, natus?</p>
            <form action="#" class="footer-subscribe">
              <div class="d-flex mb-5">
                <input type="text" class="form-control rounded-0" placeholder="Email">
                <input type="submit" class="btn btn-primary rounded-0" value="Subscribe">
              </div>
            </form>
          </div>

        </div>

        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <div class="border-top pt-5">
            <p>
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by Elijahwale</a>
       
      </p>
            </div>
          </div>
          
        </div>
      </div>
    </footer>

  
    
  </div> <!-- .site-wrap -->

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.fancybox.min.js"></script>
  <script src="js/jquery.sticky.js"></script>

  
  <script src="js/main.js"></script>
    
  </body>
</html>