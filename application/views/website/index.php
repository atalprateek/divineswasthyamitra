<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="shortcut icon" href="<?= file_url("assets/images/logo.png"); ?>">
        <title><?= $title; ?> | Mybpscexam.com</title>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <!-- Google fonts -->
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700" rel="stylesheet">
        <!-- <link rel="stylesheet" type="text/css" href="css/animate.css"> -->
        <link rel="stylesheet" type="text/css" href="<?= file_url("assets/css/style.css"); ?>">
        <?php
			if(!empty($styles)){
				foreach($styles as $key=>$style){
					if($key=="link"){
						if(is_array($style)){
							foreach($style as $single_style){
								echo "<link rel='stylesheet' href='$single_style'>\n\t";
							}
						}
						else{
							echo "<link rel='stylesheet' href='$style'>\n\t";
						}
					}
					elseif($key=="file"){
						if(is_array($style)){
							foreach($style as $single_style){
								echo "<link rel='stylesheet' href='".file_url("$single_style")."'>\n\t";
							}
						}
						else{
							echo "<link rel='stylesheet' href='".file_url("$style")."'>\n\t";
						}
					}
				}
			}
		?>   
        <link rel="stylesheet" type="text/css" href="<?= file_url("assets/css/custom.css"); ?>">

        <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
        <?php
            if(!empty($top_script)){
                foreach($top_script as $key=>$script){
                    if($key=="link"){
                        if(is_array($script)){
                            foreach($script as $single_script){
                                echo "<script src='$single_script'></script>\n\t";
                            }
                        }
                        else{
                            echo "<script src='$script'></script>\n\t";
                        }
                    }
                    elseif($key=="file"){
                        if(is_array($script)){
                            foreach($script as $single_script){
                                echo "<script src='".file_url("$single_script")."'></script>\n\t";
                            }
                        }
                        else{
                            echo "<script src='".file_url("$script")."'></script>\n\t";
                        }
                    }
                }
            }
        ?>

    </head>
    <body>
        <section class="nav-up">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-12">
                        <span><strong style="color:#fff;"><i class="far fa-envelope"></i> : </strong><a href="mailto:info@Sidhiksha.com">info@mybpscexam.com</a></span>
                    </div>
                    <div class="col-md-3 col-12">
                        <span><strong style="color:#fff;"><i class="fas fa-mobile-alt"></i> : </strong><a href="tel:01234567890"> 01234567890</a></span>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="social-icon">
                            <span><a href="https://www.facebook.com" target="_blank"><i class="fab fa-facebook-square"></i></a>&nbsp;&nbsp;<a href="https://www.whatsapp.com" target="_blank"><i class="fab fa-whatsapp-square"></i></a>&nbsp;&nbsp;<a href="https://www.twitter.com" target="_blank"><i class="fab fa-twitter-square"></i></a>&nbsp;&nbsp;<a href="https://www.instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>&nbsp;&nbsp;<a href="https://www.youtube.com" target="_blank"><i class="fab fa-youtube"></i></a></span>
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <span><strong style="color:#fff;"><i class="fas fa-user-alt"></i> : </strong><a href="#" type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#staticBackdrop">Login</a></span>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </section>
        
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="<?= base_url('/'); ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="<?= file_url('assets/images/logo.png'); ?>" alt="logo0" class="img-fluid" max-width="200" max-height="30">
                        </div>
                    </div>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('/'); ?>">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="quiz.php?page=quiz">BPSC-Prelims</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="quiz.php?page=quiz">BPSC-Mains</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="quiz.php?page=quiz">Bihar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="quiz.php?page=quiz">Our Store</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="blogs.php?page=blogs">Blogs</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                            More
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="contact.php">Contact Us</a>
                                <a class="dropdown-item" href="about.php">About Us</a>
                                <a class="dropdown-item" href="#">Join Us</a>
                                <a class="dropdown-item" href="privacypolicy.php">Privacy Policy</a>
                                <a class="dropdown-item" href="quiz.php">Quiz</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>



        <!-- Modal For Login -->
        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="tab">
                            <button class="tablinks" onclick="openCity(event, 'Sin')"id="defaultOpen">Sign In</button>
                            <button class="tablinks" onclick="openCity(event, 'Sup')">Sign Up</button>
                        </div>
                        <div id="Sin" class="tabcontent">
                            <form action="#">
                                <div class="input-container">
                                    <i class="fa fa-envelope icon"></i>
                                    <input class="input-field" type="text" placeholder="Email" name="email">
                                </div>
                                <div class="input-container">
                                    <i class="fa fa-key icon"></i>
                                    <input class="input-field" type="password" placeholder="Password" name="psw">
                                </div>
                                <button type="submit" class="btn btn-block btn-success">Sign In</button>
                                <div class="social-divider"><span>or</span></div>
                                <i class="fab fa-facebook-square"></i>
                                <i class="fab fa-google"></i>
                                <i class="fab fa-linkedin"></i>
                            </form>
                        </div>

                        <div id="Sup" class="tabcontent">
                            <form action="#">
                                <div class="input-container">
                                    <i class="fa fa-envelope icon"></i>
                                    <input class="input-field" type="text" placeholder="Email" name="email">
                                </div>
                                <div class="input-container">
                                    <i class="fa fa-key icon"></i>
                                    <input class="input-field" type="password" placeholder="Password" name="psw">
                                </div>
                                <div class="input-container">
                                    <i class="fa fa-key icon"></i>
                                    <input class="input-field" type="password" placeholder="Repeat Password" name="psw">
                                </div>
                                <button type="submit" class="btn btn-block btn-success">Sign Up</button>
                                <div class="social-divider"><span>or</span></div>
                                <i class="fab fa-facebook-square"></i>
                                <i class="fab fa-google"></i>
                                <i class="fab fa-linkedin"></i>
                            </form> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <script>
            function openCity(evt, cityName) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
                document.getElementById(cityName).style.display = "block";
                evt.currentTarget.className += " active";

            }
            // Get the element with id="defaultOpen" and click on it
            document.getElementById("defaultOpen").click();
        </script>
        <section class="banner">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-pause="false">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="<?= file_url('assets/images/ban11.jpg'); ?>" class="d-block w-100" alt="ban2">
                    </div>
                    <div class="carousel-item">
                        <img src="<?= file_url('assets/images/ban22.jpg'); ?>" class="d-block w-100" alt="ban2">
                    </div>
                    <div class="carousel-item">
                        <img src="<?= file_url('assets/images/ban33.jpg'); ?>" class="d-block w-100" alt="ban3">
                    </div>
                    <div class="carousel-item">
                        <img src="<?= file_url('assets/images/ban44.jpg'); ?>" class="d-block w-100" alt="ban3">
                    </div>
                    <div class="carousel-item">
                        <img src="<?= file_url('assets/images/ban55.jpg'); ?>" class="d-block w-100" alt="ban3">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </section>
        
        <section class="affordable-homes" style="background:#ffffff;">
            <div class="container"> 
                <div class="row">
                    <div class="col-md-12">
                        <h1 style="padding-bottom:10px;">About Us</h1>
                        <hr style="border: 1px solid #e42121">
                        <p>Hello BPSC Aspirants. Wish you all a Very Good Day!!</p>
                        <p>When I (Siddharth Roy Choudhury) started preparing for BPSC in 2019, I was clueless and had no idea about any website which can help me in preparing for BPSC exam only, wherein I can pursue my on-going job as well as prepare for BPSC exam at my own pace.</p>
                        <p>Keeping this in mind, I always wished if there could had been some website dedicated only to BPSC exam Aspirants, and thus I started www.mybpscexam.com</p>
                        <p>Our team is based in Ranchi, Jharkhand. </p>
                    </div>
                </div>
            </div>
        </section>
        <section class="affordable-homes">
            <div class="container">
                <h1>Blogs</h1> 
                <div class="row">
                    <div class="col-md-3">
                        <div class="card border-danger mb-3" style="max-width: 18rem;">
                            <div class="card-header">Blog 1</div>
                            <div class="card-body text-danger">
                                <img src="<?= file_url('assets/images/ban11.jpg'); ?>" width="100%">
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card border-danger mb-3" style="max-width: 18rem;">
                            <div class="card-header">Blog 2</div>
                            <div class="card-body text-danger">
                                <img src="<?= file_url('assets/images/ban11.jpg'); ?>" width="100%">
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card border-danger mb-3" style="max-width: 18rem;">
                            <div class="card-header">Blog 3</div>
                            <div class="card-body text-danger">
                                <img src="<?= file_url('assets/images/ban11.jpg'); ?>" width="100%">
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card border-danger mb-3" style="max-width: 18rem;">
                            <div class="card-header">Blog 4</div>
                            <div class="card-body text-danger">
                                <img src="<?= file_url('assets/images/ban11.jpg'); ?>" width="100%">
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="videobanner">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <img src="<?= file_url('assets/images/vidbannerpic.jpeg'); ?>" width="100%">
                    </div>
                </div>
            </div>
        </section>

        <section class="affordable-homes"  style="background:#f0f0f0;">
            <div class="container">
                <h1>Quiz</h1><hr style="border: 1px solid #e42121"> 
                <div class="row">
                    <div class="col-md-3">
                        <a href="quiz.php"><p class="btn-danger" width="100%">General Science</p></a>
                    </div>
                    <div class="col-md-3">
                        <a href="quiz.php"><p class="btn-danger" width="100%">Geography of Bihar</p></a>
                    </div>
                    <div class="col-md-3">
                        <a href="quiz.php"><p class="btn-danger" width="100%">Indian Polity</p></a>
                    </div>
                    <div class="col-md-3">
                        <a href="quiz.php"><p class="btn-danger" width="100%">Economy</p></a>
                    </div>
                    <div class="col-md-3">
                        <a href="quiz.php"><p class="btn-danger" width="100%">History of Bihar</p></a>
                    </div>
                    <div class="col-md-3">
                        <a href="quiz.php"><p class="btn-danger" width="100%">Indian History</p></a>
                    </div>
                    <div class="col-md-3">
                        <a href="quiz.php"><p class="btn-danger" width="100%">Events of National</p></a>
                    </div>
                    <div class="col-md-3">
                        <a href="quiz.php"><p class="btn-danger" width="100%">Events of International<p></a>
                    </div>          
                </div>
            </div>
        </section>


        <section class="testimonial">
            <div class="testimonial-overlay">
                <div class="container">
                    <h2>Our Clients Says</h2><hr style="border: 1px solid #e42121">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="carouselExampleControls1" class="carousel slide" data-ride="carousel" data-pause="false">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img class="text-center" src="<?= file_url('assets/images/testimonialpic.jpeg'); ?>" class="d-block" alt="ban5">
                                        <p>We take great pride in our commitment to business excellence, our caring for people and their communities, Main Vision, we work each and every day to help people live better lives.</p>
                                    </div>
                                    <div class="carousel-item">
                                        <img class="text-center" src="<?= file_url('assets/images/testimonialpic.jpeg'); ?>" class="d-block" alt="ban2">
                                        <p>We take great pride in our commitment to business excellence, our caring for people and their communities, Main Vision, we work each and every day to help people live better lives.</p>
                                    </div>
                                    <div class="carousel-item">
                                        <img class="text-center" src="<?= file_url('assets/images/testimonialpic.jpeg'); ?>" class="d-block" alt="ban3">
                                        <p>We take great pride in our commitment to business excellence, our caring for people and their communities, Main Vision, we work each and every day to help people live better lives.</p>
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleControls1" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleControls1" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <h4>About Us</h4><hr class="footer-hr">
                        <p class="footer-about">A Group of idealistic people joined hands to create a dream that has evolved into a brand that is synonymous with quality, innovation and process.</p>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4>Quick Link</h4><hr class="footer-hr">
                        <ul>
                            <li><a href="<?= base_url('/'); ?>">Home</a></li>
                            <li><a href="about.php?page=about">About Us</a></li>
                            <li><a href="service.php?page=service">Services</a></li>
                            <li><a href="gallery.php?page=gallery">Gallery</a></li>
                            <!-- <li><a href="career.php?page=carerr">Career</a></li> -->
                            <li><a href="contact.php?page=contact">Contact Us</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4>Address</h4><hr class="footer-hr">
                        <p>MYBPSC</p>
                        <p><i class="fas fa-map-marked-alt"></i>&nbsp;&nbsp;Ranchi,Jharkhand,Pin-834001</p>
                        <p><i class="fas fa-mobile-alt"></i>&nbsp;&nbsp;<a href="tel:01234567890">+91-1234567890</a></p>
                        <p><a href="mailto:info@mybpsc.com"><i class="fa fa-envelope" id="icon-color"></i> &nbsp; : info@mybpsc.com</a></p>


                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4>News Letter</h4><hr class="footer-hr">
                        <form action="mailaction.php" method="post">
                            <input type="text" name="name" class="form-control my-2 py-2" placeholder="Enter Name: " required="">
                            <input type="email" name="email" class="form-control my-2 py-2" placeholder="Enter Email: " required="">
                            <input type="text" name="mob" class="form-control my-2 py-2" placeholder="Enter Contact No.: " required="" maxlength="10" minlength="10">
                            <button class="btn btn-primary btn-block mt-2" type="submit" name="subscribe">Subscribe</button>
                        </form>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </section>
        <section class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <span>Copyrights &copy; 2021.MYBPSC.All Rights Reserved.</span>
                    </div>
                    <div class="col-md-5 designed-by">
                        <span>Designed By :- <a href="https://brightcodess.com/"><img src="https://www.brightcodess.com/images/Brightcode-Software-Services-Pvt-Ltd.webp" class="img-fluid" alt="Brightcode Software Services Pvt Ltd"></a></span>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </section>
        
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <?php
            if(!empty($bottom_script)){
              foreach($bottom_script as $key=>$script){
                  if($key=="link"){
                        if(is_array($script)){
                            foreach($script as $single_script){
                                echo "<script src='$single_script'></script>\n\t\t";
                            }
                        }
                        else{
                            echo "<script src='$script'></script>\n\t\t";
                        }
                  }
                  elseif($key=="file"){
                    if(is_array($script)){
                        foreach($script as $single_script){
                            echo "<script src='".file_url("$single_script")."'></script>\n\t\t";
                        }
                    }
                    else{
                        echo "<script src='".file_url("$script")."'></script>\n\t\t";
                    }
                  }
              }
            }
		?>
        <script src="<?= file_url('assets/js/script.js'); ?>"></script>
    </body>
</html>