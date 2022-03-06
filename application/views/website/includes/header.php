
        <header>
            <nav class="navbar navbar-default navbar-fixed-top font-tnr">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>                        
                        </button>
                        <a class="navbar-brand" href="<?= base_url(); ?>">
                            <img class="brand" src="<?= file_url('assets/images/logo.png'); ?>">
                        </a>
                    </div>
                    <div class="collapse navbar-collapse mainmenu" id="myNavbar">
                        <ul id="menu-header-menu" class="menu">   
                            <a href="tel:"><li><i class="fa fa-phone" aria-hidden="true"></i> 1800 XXX XXXX</li></a> 
                            <a href="#"><li><i class="fa fa-facebook-official" aria-hidden="true"></i></li></a>
                            <a href="#"><li><i class="fa fa-twitter" aria-hidden="true"></i></li></a>
                            <a href="#"><li><i class="fa fa-instagram" aria-hidden="true"></i></li></a>
                            <a href="#"><li><i class="fa fa-linkedin" aria-hidden="true"></i></li></a>
                            <a href="#"><li><i class="fa fa-youtube-play" aria-hidden="true"></i></li></a>
                            <?php
                                if($this->session->user===NULL || ($this->session->role!='member' && $this->session->role!='hca')){
                            ?>
                            <a href="<?= base_url('signup/'); ?>"><li class="btn btn-round clr1">Sign Up</li></a>   
                            <a href="<?= base_url('login/'); ?>"><li class="btn btn-round clr1">Login</li></a>   
                            <?php
                                }
                                else{
                            ?>
                            <a href="<?= base_url('profile/'); ?>"><li class="btn btn-round clr1">Profile</li></a>  
                            <a href="<?= base_url('logout/'); ?>"><li class="btn btn-round clr1">Logout</li></a>   
                            <?php
                                }
                            ?>
                        </ul>
                    </div>
                </div>
                <div class="container-fluid whiteTXT btcats">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 menucont">
                                <ul class="menu m_on cusmmenu">
                                    <li class="showallcat"><a><i class="fa fa-th-large" aria-hidden="true"></i> Menu</a></li>
                                </ul>
                                <ul id="header-categoris" class="menu">
                                    <li class="menu-item"><a href="<?= base_url(); ?>">Home</a></li>
                                    <li class="menu-item"><a href="<?= base_url('aboutus/'); ?>">About Us</a></li>
                                    <li class="menu-item"><a href="<?= base_url('listings/'); ?>">Listings</a></li>
                                    <li class="menu-item"><a href="<?= base_url('gallery/'); ?>">Gallery</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
        <!-- Header end -->