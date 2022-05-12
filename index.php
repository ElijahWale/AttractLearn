<?php session_start(); ?>
<?php
include "core/db.php";
include "includes/functions.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title> Attract Learn</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
          <div class="site-logo mr-auto w-25"><img src="images/Attract Logo.png" alt=""></div>

          <div class="mx-auto text-center">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu js-clone-nav mx-auto d-none d-lg-block  m-0 p-0">
                <li><a href="#home-section" class="nav-link">Home</a></li>
                <li><a href="#courses-section" class="nav-link">Orientation</a></li>
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

    <div class="intro-section" id="home-section">
      
      <div class="slide-1" style="background-image: url('images/hero_1.jpg');" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-12">
              <div class="row align-items-center">
                <div class="col-lg-6 mb-4">
                  <h1  data-aos="fade-right" data-aos-delay="100">Do you know you can acquire your desired IT skill by learning online?</h1>
                  <p class="mb-4"  data-aos="fade-up" data-aos-delay="200">Become a PRO in the skill of your choice by taking an online course.</p>
                  <p data-aos="fade-up" data-aos-delay="300"><a href="https://api.whatsapp.com/send/?phone=9137091665&text&app_absent=0" class="btn btn-primary py-3 px-5 btn-pill">Enrol Now</a></p>

                </div>

                <div class="col-lg-5 ml-auto" data-aos="fade-left" data-aos-delay="500">
                  <a href="course-single.php"><img src="images/ict.png" alt="Image" class="img-fluid"></a>
                  <!-- <form action="" method="post" class="form-box">
                    <h3 class="h4 text-black mb-4">Sign Up</h3>
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Email Addresss">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="form-group mb-4">
                      <input type="password" class="form-control" placeholder="Re-type Password">
                    </div>
                    <div class="form-group">
                      <input type="submit" class="btn btn-primary btn-pill" value="Sign up">
                    </div>
                  </form> -->

                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>

    
    <div class="site-section courses-title" id="courses-section">
      <div class="container">
        <div class="row mb-5 justify-content-center">
          <div class="col-lg-7 text-center" data-aos="fade-up" data-aos-delay="">
            <h2 class="section-title">Courses</h2>
          </div>
        </div>
      </div>
    </div>
    <div class="site-section courses-entry-wrap"  data-aos="fade-up" data-aos-delay="100">
      <div class="container">
        <div class="row">
         
          <div class="owl-carousel col-12 nonloop-block-14 d-flex justify-content-stretch">
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
            <div class="course bg-white align-self-stretch">
              <figure class="m-0">
                <a href="course-single.php?p_id=<?= $course_id ?>"><img src="images/<?= $course_image; ?>" alt="Image" class="img-fluid"></a>
              </figure>
              <div class="course-inner-text py-4 px-4">
                <span class="course-price">	&#8358;<?= $price; ?></span>
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


    <div class="site-section" id="programs-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-7 text-center"  data-aos="fade-up" data-aos-delay="">
            <h2 class="section-title">About Programs</h2>
            <p>Choose from our list of programs which is scheduled to ensure you're grounded in the skill of your choice in no time</p>
          </div>
        </div>
        <div class="row mb-5 align-items-center">
          <div class="col-lg-7 mb-5" data-aos="fade-up" data-aos-delay="100">
            <video width="620" height="540" controls>
            <source src="video/movie.mp4" type="video/mp4">
            <source src="video/movie.mp4" type="video/ogg">
            Your browser does not support the video tag. 
           </video>
            <!-- <img src="images/undraw_youtube_tutorial.svg" alt="Image" class="img-fluid"> -->
          </div>
          <div class="col-lg-4 ml-auto" data-aos="fade-up" data-aos-delay="200">
            <h2 class="text-black mb-4">Best programs for you</h2>
            <p class="mb-4">Grapics design, Web development, 3D Modelling and animation, Architectural Designs and Rendering, Artificial Intelligence, Data Science and Analytics and lots more.</p>

            <div class="d-flex align-items-center custom-icon-wrap mb-3">
              <span class="custom-icon-inner mr-3"><span class="icon icon-graduation-cap"></span></span>
              <div><h3 class="m-0">20 Students and growing.</h3></div>
            </div>

          </div>
        </div>

        <!-- <div class="row mb-5 align-items-center">
          <div class="col-lg-7 mb-5 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="100">
            <img src="images/Attract 1.jpg" alt="Image" class="img-fluid">
          </div>
          <div class="col-lg-4 mr-auto order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
            <h2 class="text-black mb-4">Latest offers</h2>
            <p class="mb-4">Free Graphics design bootcamp coming up soon. Get exposed to the vast world of graphics designing using several tools e.g Photoshop, Adobe Illustrator, Corel draw, Adobe Indesign and so on</p>

            <div class="d-flex align-items-center custom-icon-wrap mb-3">
              <span class="custom-icon-inner mr-3"><span class="icon icon-graduation-cap"></span></span>
              <div><h3 class="m-0">50 students and counting</h3></div>
            </div>

            <div class="d-flex align-items-center custom-icon-wrap">
              <span class="custom-icon-inner mr-3"><span class="icon icon-university"></span></span>
              <div><h3 class="m-0">#GrapicsDesign</h3></div>
            </div>

          </div>
        </div> -->

        <!-- <div class="row mb-5 align-items-center">
          <div class="col-lg-7 mb-5" data-aos="fade-up" data-aos-delay="100">
            <img src="images/undraw_teacher.svg" alt="Image" class="img-fluid">
          </div>
          <div class="col-lg-4 ml-auto" data-aos="fade-up" data-aos-delay="200">
            <h2 class="text-black mb-4">Latest News</h2>
            <p class="mb-4"> Mechatronics Engineering a pathway to worldwide artificial intelligence take over</p>

            <div class="d-flex align-items-center custom-icon-wrap mb-3">
              <span class="custom-icon-inner mr-3"><span class="icon icon-graduation-cap"></span></span>
              <div><h3 class="m-0">50 students and counting</h3></div>
            </div>

            <div class="d-flex align-items-center custom-icon-wrap">
              <span class="custom-icon-inner mr-3"><span class="icon icon-university"></span></span>
              <div><h3 class="m-0">#mechatronics</h3></div>
            </div>

          </div>
        </div> -->

      </div>
    </div>

    <div class="site-section" id="teachers-section">
      <div class="container">

        <div class="row mb-5 justify-content-center">
          <div class="col-lg-7 mb-5 text-center"  data-aos="fade-up" data-aos-delay="">
            <h2 class="section-title">Meet Our Instructors</h2>
            <p class="mb-5">Get in touch with professionals, entrepreneur and philanthropists in several skills. We are going to help you develop any skill of your choice from a Beginner to becoming a professional.
            </p>
          </div>
        </div>

        <div class="row">

          <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="100">
            <div class="teacher text-center">
              <img src="images/AI92.jpg" alt="Image" class="img-fluid w-50 rounded-circle mx-auto mb-4">
              <div class="py-2">
                <h3 class="text-black">Adebayo David</h3>
                <p class="position">CEO Attract Enterprise</p>
                <p>CAD design expert, Automation Engineer, Online course tutor.</p>
                <div class="d-flex justify-content-center">
                  <a href=""><i class="fab fa-facebook-square"></i></a>
                  <a href=""><i class="fab fa-linkedin px-3"></i></a>
                  <a href=""><i class="fab fa-twitter-square"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="200">
            <div class="teacher text-center">
              <img src="images/person_2.jpg" alt="Image" class="img-fluid w-50 rounded-circle mx-auto mb-4">
              <div class="py-2">
                <h3 class="text-black">Esan Olawale Elijah</h3>
                <p class="position">CEO WSA Design</p>
                <p>Web developer.</p>
                <br> 
                <div class="d-flex justify-content-center">
                  <a href=""><i class="fab fa-facebook-square"></i></a>
                  <a href=""><i class="fab fa-linkedin px-3"></i></a>
                  <a href=""><i class="fab fa-twitter-square"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="300">
            <div class="teacher text-center">
              <img src="images/person_3.jpg" alt="Image" class="img-fluid w-50 rounded-circle mx-auto mb-4">
              <div class="py-2">
                <h3 class="text-black">Ibukun Oluwasegun</h3>
                <p class="position">CEO Dabest Conceptz</p>
                <p>Graphics design expert, Audio and Video Editor.</p>
                <div class="d-flex justify-content-center">
                  <a href=""><i class="fab fa-facebook-square"></i></a>
                  <a href=""><i class="fab fa-linkedin px-3"></i></a>
                  <a href=""><i class="fab fa-twitter-square"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section bg-image overlay" style="background-image: url('images/hero_1.jpg');">
      <div class="container">
        <div class="row justify-content-center align-items-center">
          <div class="col-md-8 text-center testimony">
            <img src="images/person_4.jpg" alt="Image" class="img-fluid w-25 mb-4 rounded-circle">
            <h3 class="mb-4">Adebayo Olamide</h3>
            <blockquote>
              <p>&ldquo; Finding a training platform is not much of a big deal but finding one that perfecly suit your desire and aspiration to acquire a skill is quite a work. But I'm happy to say "Attract Learn" courses are the best for anyone anywhere. &rdquo;</p>
            </blockquote>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section pb-0">

      <div class="future-blobs">
        <div class="blob_2">
          <img src="images/blob_2.svg" alt="Image">
        </div>
        <div class="blob_1">
          <img src="images/blob_1.svg" alt="Image">
        </div>
      </div>
      <div class="container">
        <div class="row mb-5 justify-content-center" data-aos="fade-up" data-aos-delay="">
          <div class="col-lg-7 text-center">
            <h2 class="section-title">Why Choose Us</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 ml-auto align-self-start"  data-aos="fade-up" data-aos-delay="100">

            <div class="p-4 rounded bg-white why-choose-us-box">

              <div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">
                <div class="mr-3"><span class="custom-icon-inner"><span class="icon icon-graduation-cap"></span></span></div>
                <div><h3 class="m-0">Top Professionals in The Nigeria</h3></div>
              </div>

              <div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">
                <div class="mr-3"><span class="custom-icon-inner"><span class="icon icon-university"></span></span></div>
                <div><h3 class="m-0">Expand Your Knowledge</h3></div>
              </div>

              <div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">
                <div class="mr-3"><span class="custom-icon-inner"><span class="icon icon-graduation-cap"></span></span></div>
                <div><h3 class="m-0">One on One Teaching Assistant Courses</h3></div>
              </div>

              <div class="d-flex align-items-center custom-icon-wrap custom-icon-light">
                <div class="mr-3"><span class="custom-icon-inner"><span class="icon icon-university"></span></span></div>
                <div><h3 class="m-0">Best Teachers in Respective Field of your choice</h3></div>
              </div>

            </div>


          </div>
          <div class="col-lg-7 align-self-end"  data-aos="fade-left" data-aos-delay="200">
            <img src="images/person_transparent.png" alt="Image" class="img-fluid">
          </div>
        </div>
      </div>
    </div>

    



    <div class="site-section bg-light" id="contact-section">
      <div class="container">

        <div class="row justify-content-center">
          <div class="col-md-7">
            <?php
              if(isset($_POST['submit'])){
                $first_name        = sanitize($_POST['first_name']);
                $last_name        = sanitize($_POST['last_name']);
                $subject = sanitize($_POST['subject']);
                $email     = sanitize($_POST['email']);
                $message     = sanitize($_POST['message']);

                $query = "INSERT INTO contacts(first_name, last_name, subject, email, message, date_created) ";
         
                $query .= "VALUES('$first_name','$last_name','$subject','$email','$message', now())"; 
                       
                $contact_query = mysqli_query($db_connect, $query);  
                if(!$contact_query) {
              
                  die("QUERY FAILED ." . mysqli_error($db_connect));            
                  }
                $_SESSION['success'] = "<p class='btn-success'>Your Message has been successfully sent <p>";
               
              }


            ?>


                <?php
                    print_error();
                    print_success();
                ?>
            <h2 class="section-title mb-3">Message Us</h2>
            <p class="mb-5">We are ready to listen and give you feedback on any question you might need answer to.</p>
          
            <form method="POST" action="" data-aos="fade">
              <div class="form-group row">
                <div class="col-md-6 mb-3 mb-lg-0">
                  <input type="text" class="form-control" placeholder="First name" required name="first_name">
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control" placeholder="Last name" required name="last_name">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <input type="text" class="form-control" placeholder="Subject" required name="subject">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <input type="email" class="form-control" placeholder="Email" required name="email">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-12">
                  <textarea class="form-control" id="" cols="30" rows="10" required name="message" placeholder="Write your message here."></textarea>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-6">
                  
                  <input type="submit" class="btn btn-primary py-3 px-5 btn-block btn-pill" name="submit" value="Send Message">
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
    
     
    <footer class="footer-section bg-white">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <h3>About Attract Learn</h3>
            <p>Started as a collaborative platform of experts in different skill sets, seeking to pass on their knowledge to others, and wanting to break the barrier of distance between the trainer and the student. This online training platform seeks to equip students with the necessary resources, to become a self employed entrepreneur with very little cost and great dividend.</p>
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
            <p>Get in touch with our company for hands on information.</p>
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
        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
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