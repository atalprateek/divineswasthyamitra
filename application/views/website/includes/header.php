
        <section class="nav-up">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-12">
                        <span><strong style="color:#fff;"><i class="far fa-envelope"></i> : </strong><a href="mailto:mybpscexam@gmail.com">mybpscexam@gmail.com</a></span>
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
                        <span>
                            <strong style="color:#fff;"><i class="fas fa-user-alt"></i> : </strong>
                            <?php if($this->session->user===NULL || $this->session->role!=='student'){ ?>
                            <a href="#" type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#staticBackdrop">Login</a>
                            <?php }else{
                            ?>
                            <a href="<?= base_url('profile/'); ?>" type="button" class="btn btn-sm btn-success">Profile</a>
                            <a href="<?= base_url('logout/') ?>" onClick="googleSignOut();"><i class="fas fa-sign-out-alt"></i></a>
                            <?php
                                } 
                            ?>
                        </span>
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
                            <a class="nav-link" href="<?= base_url('home/syllabus'); ?>">Syllabus</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('subjects/'); ?>">BPSC-Prelims</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">BPSC-Mains</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Bihar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Our Store</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('blogs/'); ?>">Blogs</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                            More
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="<?= base_url('aboutus/'); ?>">About Us</a>
                                <a class="dropdown-item" href="<?= base_url('contactus/'); ?>">Contact Us</a>
                                <a class="dropdown-item" href="<?= base_url('joinus/'); ?>">Join Us</a>
                                <a class="dropdown-item" href="<?= base_url('privacypolicy/'); ?>">Privacy Policy</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <?php 
            if($this->session->user===NULL || $this->session->role!=='student'){
                $this->load->view('website/modal/login'); 
            }
            else{
                echo '
                    <div class="google-div d-none">
                        <div class="g-signin2" id="my-signin2" data-onsuccess="onGoogleSignIn"></div>
                    </div>';
            }
        ?>