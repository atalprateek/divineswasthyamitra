<!DOCTYPE html>
<html lang="en">
<head>
  <title>Website Title</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- Bootstrap 3.4.1 -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <!-- fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;1,700&display=swap" rel="stylesheet">

  <!-- Fontawsome icon -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- image and video gallery -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
  <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
  <!-- Swiper Slider -->
  <link rel="stylesheet" type="text/css" href="<?= file_url('assets/css/swiper-bundle.min.css'); ?>">
  <script type="text/javascript" src="<?= file_url('assets/js/swiper-bundle.min.js'); ?>"></script>

  <script type="text/javascript" src="<?= file_url('assets/js/main.js'); ?>"></script>
  <script type="text/javascript" src="<?= file_url('assets/js/script.js'); ?>"></script>
  <link rel="stylesheet" type="text/css" href="<?= file_url('assets/css/style.css'); ?>">
  <link rel="stylesheet" type="text/css" href="<?= file_url('assets/css/custom.css'); ?>">
</head>

<body id="top">
<header>
  <nav class="navbar navbar-default navbar-fixed-top font-tnr">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
        </button>
        <a class="navbar-brand" href="#"><img class="brand" src="<?= file_url('assets/images/logo.png'); ?>"></a>
      </div>
      <div class="collapse navbar-collapse mainmenu" id="myNavbar">
        <ul id="menu-header-menu" class="menu">   
          <a href="tel:"><li><i class="fa fa-phone" aria-hidden="true"></i> 1800 XXX XXXX</li></a> 
          <a href="#"><li class="btn btn-round clr1">Request a Call Back</li></a> 
          <a href="#"><li class="btn btn-round clr2">Schedule a Home Visit</li></a>    
          <a href="#"><li class="btn btn-round clr2">Feedback</li></a>      
          <a href="#"><li><i class="fa fa-facebook-official" aria-hidden="true"></i></li></a>
          <a href="#"><li><i class="fa fa-twitter" aria-hidden="true"></i></li></a>
          <a href="#"><li><i class="fa fa-instagram" aria-hidden="true"></i></li></a>
          <a href="#"><li><i class="fa fa-linkedin" aria-hidden="true"></i></li></a>
          <a href="#"><li><i class="fa fa-youtube-play" aria-hidden="true"></i></li></a>
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
              <li class="menu-item"><a href="#">Home</a></li>
              <li class="menu-item"><a href="#">About</a></li>
              <li class="menu-item menu-item-has-children has-sub"><a href="#" data-toggle="modal" data-target="#servicemodal">Services</a>
                <ul class="sub-menu">
                  <li class="menu-item"><a href="#">Sub Category</a></li>
                  <li class="menu-item"><a href="#">Sub Category</a></li>
                  <li class="menu-item"><a href="#">Sub Category</a></li>
                  <li class="menu-item"><a href="#">Sub Category</a></li>
                  <li class="menu-item"><a href="#">Sub Category</a></li>
                </ul>
              </li>
              <li class="menu-item menu-item-has-children has-sub col2"><a href="#">Elder Care</a>
                <ul class="sub-menu">
                  <li class="menu-item"><a href="#">Sub Category</a></li>
                  <li class="menu-item"><a href="#">Sub Category</a></li>
                  <li class="menu-item"><a href="#">Sub Category</a></li>
                  <li class="menu-item"><a href="#">Sub Category</a></li>
                  <li class="menu-item"><a href="#">Sub Category</a></li>
                  <li class="menu-item"><a href="#">Sub Category</a></li>
                  <li class="menu-item"><a href="#">Sub Category</a></li>
                  <li class="menu-item"><a href="#">Sub Category</a></li>
                  <li class="menu-item"><a href="#">Sub Category</a></li>
                </ul>
              </li>
              <li class="menu-item menu-item-has-children has-sub col2"><a href="#">Why Home Care?</a>
                <ul class="sub-menu">
                  <li class="menu-item"><a href="#">Sub Category</a></li>
                  <li class="menu-item"><a href="#">Sub Category</a></li>
                  <li class="menu-item"><a href="#">Sub Category</a></li>
                  <li class="menu-item"><a href="#">Sub Category</a></li>
                  <li class="menu-item"><a href="#">Sub Category</a></li>
                  <li class="menu-item"><a href="#">Sub Category</a></li>
                  <li class="menu-item"><a href="#">Sub Category</a></li>
                  <li class="menu-item"><a href="#">Sub Category</a></li>
                  <li class="menu-item"><a href="#">Sub Category</a></li>
                  <li class="menu-item"><a href="#">Sub Category</a></li>
                  <li class="menu-item"><a href="#">Sub Category</a></li>
                  <li class="menu-item"><a href="#">Sub Category</a></li>
                </ul>
              </li>
              <li class="menu-item menu-item-has-children has-sub"><a href="#">Family Speaks</a>
                <ul class="sub-menu">
                  <li class="menu-item"><a href="#">Sub Category</a></li>
                  <li class="menu-item"><a href="#">Sub Category</a></li>
                  <li class="menu-item"><a href="#">Sub Category</a></li>
                  <li class="menu-item"><a href="#">Sub Category</a></li>
                  <li class="menu-item"><a href="#">Sub Category</a></li>
                  <li class="menu-item"><a href="#">Sub Category</a></li>
                </ul>
              </li>
              <li class="menu-item menu-item-has-children has-sub"><a href="#">Careers</a>
                <ul class="sub-menu">
                  <li class="menu-item"><a href="#">Sub Category</a></li>
                  <li class="menu-item"><a href="#">Sub Category</a></li>
                  <li class="menu-item"><a href="#">Sub Category</a></li>
                  <li class="menu-item"><a href="#">Sub Category</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </nav>
</header>
<!-- Header end -->

<!-- Content body -->
<section class="sec-slider relative">
  <div class="showcase">
    <div class="swiper-container-banner">
      <div class="swiper-wrapper">
        <!-- each slide -->
        <div class="swiper-slide">
          <div class="col-xs-12 sliderimg paddZero">
            <a href="#"><img src="<?= file_url('assets/images/sliderimg_1.jpg'); ?>"></a>
          </div>
        </div>
        <!-- each slide -->
        <div class="swiper-slide">
          <div class="col-xs-12 sliderimg paddZero">
            <a href="#"><img src="<?= file_url('assets/images/sliderimg_2.jpg'); ?>"></a>
          </div>
        </div>
        <!-- each slide -->
        <div class="swiper-slide">
          <div class="col-xs-12 sliderimg paddZero">
            <a href="#"><img src="<?= file_url('assets/images/sliderimg_3.jpg'); ?>"></a>
          </div>
        </div>
      </div>            
      <!-- Add Pagination -->
      <div class="swiperbanner-pagination"></div>
      <!-- If we need navigation buttons -->
      <div class="swiper-button-prev m_off swiperbanner-button-prev"></div>
      <div class="swiper-button-next m_off swiperbanner-button-next"></div>
    </div>
  </div>
</section>

<section class="section-2 pddt_70 pddb_70 relative">
  <div class="container">
    <div class="row">
      <div class="flx">
        <div class="flxcol-5">
          <a href="#"><div class="initem">
            <img src="<?= file_url('assets/images/4.png'); ?>">
            <h3>Doctor at Home</h3>
            <p>Apollo's team of expert, specialized doctors</p>
            <button class="btn btn-gray btn-round">Know More</button>
          </div></a>
        </div>
        <div class="flxcol-5">
          <a href="#"><div class="initem">
            <img src="<?= file_url('assets/images/3.png'); ?>">
            <h3>Nurse at Home</h3>
            <p>Compassionate and skilled nursing staff.</p>
            <button class="btn btn-gray btn-round">Know More</button>
          </div></a>
        </div>
        <div class="flxcol-5">
          <a href="#"><div class="initem">
            <img src="<?= file_url('assets/images/5.png'); ?>">
            <h3>Physio at Home</h3>
            <p>Professionally trained physiotherapists</p>
            <button class="btn btn-gray btn-round">Know More</button>
          </div></a>
        </div>
        <div class="flxcol-5">
          <a href="#"><div class="initem">
            <img src="<?= file_url('assets/images/2.png'); ?>">
            <h3>Investigations At Home</h3>
            <p>Sample collection and Vaccination Administration</p>
            <button class="btn btn-gray btn-round">Know More</button>
          </div></a>
        </div>
        <div class="flxcol-5">
          <a href="#"><div class="initem">
            <img src="<?= file_url('assets/images/1.png'); ?>">
            <h3>Medical Equipment at Home</h3>
            <p>Rent & Purchase equipment</p>
            <button class="btn btn-gray btn-round">Know More</button>
          </div></a>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section-3 pddb_70 relative">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-md-12 col-sm-12 pddt_70 pddb_70 plr_0 slideanim">
        <div class="col-xs-12 col-md-6 col-sm-6">
          <h1 class="heading">About<br>Apollo HomeCare</h1>
          <p>The transforming healthcare scenario in India has led to the advent of Homecare – Healthcare services that conveniently come Home for the comfort of patients and their families.</p>

          <p>Apollo’s transformative journey has redefined the healthcare landscape in India over the last few decades with its mission of delivering quality healthcare to millions of Indians. In keeping with this mission, Apollo HomeCare, with its unique treatment options, delivers clinical excellence with compassion and care to the comfort of your home.</p>
        </div>
        <div class="bggirl joy col-xs-12 col-md-6 col-sm-6">
          <div class="vidcont">
            <div class="videoply">
              <iframe src="https://www.youtube.com/embed/wBXtetDu6Co" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section-4 pddb_70 relative">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-md-12 col-sm-12 plr_0 slideanim">
        <div class="col-xs-12 col-md-12 col-sm-12 pddt_70 pddb_70">
          <h1 class="heading">Long Term Care Plans</h1>
          <p>Our Partnership Programs nurture lasting relationships by upholding the dignity of those receiving care as well as supporting those who give care. We provide expert medical supervision with compassionate care over an extended period of time at home and our plans encompass personalised healthcare services, including nurse and physician visits.</p>
        </div>
        <div class="flx col-xs-12">
          <div class="col-xs-6 col-sm-2 col-md-2">
            <a href="#"><div class="initem">
              <img src="<?= file_url('assets/images/sc41.png'); ?>">
              <h3>Ortho Rehab</h3>
              <p>Total Knee Replacement, Total Hip Replacement & Spine Surgery</p>
              <button class="btn btn-gray btn-round">Know More</button>
            </div></a>
          </div>
          <div class="col-xs-6 col-sm-2 col-md-2">
            <a href="#"><div class="initem">
              <img src="<?= file_url('assets/images/sc42.png'); ?>">
              <h3>Heart Rehab</h3>
              <p>Congestive Heart Failure & Post Cardiac Surgery</p>
              <button class="btn btn-gray btn-round">Know More</button>
            </div></a>
          </div>
          <div class="col-xs-6 col-sm-2 col-md-2">
            <a href="#"><div class="initem">
              <img src="<?= file_url('assets/images/sc43.png'); ?>">
              <h3>Neuro Rehab</h3>
              <p>Stroke, Parkinson’s, Post Brain and Spinal Surgery</p>
              <button class="btn btn-gray btn-round">Know More</button>
            </div></a>
          </div>
          <div class="col-xs-6 col-sm-2 col-md-2">
            <a href="#"><div class="initem">
              <img src="<?= file_url('assets/images/sc44.png'); ?>">
              <h3>Lung Rehab</h3>
              <p>Asthma and Chronic Obstructive Pulmonary Disease</p>
              <button class="btn btn-gray btn-round">Know More</button>
            </div></a>
          </div>
          <div class="col-xs-6 col-sm-2 col-md-2">
            <a href="#"><div class="initem">
              <img src="<?= file_url('assets/images/sc45.png'); ?>">
              <h3>Mother & Baby Care</h3>
              <p>Post natal care & support for Mother & Baby</p>
              <button class="btn btn-gray btn-round">Know More</button>
            </div></a>
          </div>
          <div class="col-xs-6 col-sm-2 col-md-2">
            <a href="#"><div class="initem">
              <img src="<?= file_url('assets/images/sc46.png'); ?>">
              <h3>Elder Care</h3>
              <p>Long term partnership plans for geriatric care.</p>
              <button class="btn btn-gray btn-round">Know More</button>
            </div></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section-5 pddb_70 relative">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-md-12 col-sm-12 pddt_70">
        <h1 class="heading">Testimonials</h1>
        <p>Our Partnership Programs nurture lasting relationships by upholding the dignity of those receiving care as well as supporting those who give care. We provide expert medical supervision with compassionate care over an extended period.</p>
      </div>
    </div>
  </div>
</section>

<section class="section-6 pddt_70 pddb_70 relative">
  <div class="container-fluid">
    <div class="row">
      <div class="flx text-center">
        <div class="col-xs-12 col-md-4 col-sm-4">
          <div class="states">
            <div class="bgtxt">800+</div>
            <h2>800+</h2>
            <p>Employees</p>
          </div>
        </div>
        <div class="col-xs-12 col-md-4 col-sm-4">
          <div class="states">
            <div class="bgtxt">2Lakh</div>
            <h2>2Lakh</h2>
            <p>Patient Care Episodes</p>
          </div>
        </div>
        <div class="col-xs-12 col-md-4 col-sm-4">
          <div class="states">
            <div class="bgtxt">5</div>
            <h2>5</h2>
            <p>Cities</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


  <!-- Modal -->
  <div class="modal fade" id="servicemodal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Our Services</h4>
        </div>
        <div class="modal-body">          
          <div class="flx">
            <div class="flxcol-5">
              <a href="#"><div class="initem">
                <img src="<?= file_url('assets/images/4.png'); ?>">
                <h3>Doctor at Home</h3>
                <p>Apollo's team of expert, specialized doctors</p>
                <button class="btn btn-gray btn-round">Know More</button>
              </div></a>
            </div>
            <div class="flxcol-5">
              <a href="#"><div class="initem">
                <img src="<?= file_url('assets/images/3.png'); ?>">
                <h3>Nurse at Home</h3>
                <p>Compassionate and skilled nursing staff.</p>
                <button class="btn btn-gray btn-round">Know More</button>
              </div></a>
            </div>
            <div class="flxcol-5">
              <a href="#"><div class="initem">
                <img src="<?= file_url('assets/images/5.png'); ?>">
                <h3>Physio at Home</h3>
                <p>Professionally trained physiotherapists</p>
                <button class="btn btn-gray btn-round">Know More</button>
              </div></a>
            </div>
            <div class="flxcol-5">
              <a href="#"><div class="initem">
                <img src="<?= file_url('assets/images/2.png'); ?>">
                <h3>Investigations At Home</h3>
                <p>Sample collection and Vaccination Administration</p>
                <button class="btn btn-gray btn-round">Know More</button>
              </div></a>
            </div>
            <div class="flxcol-5">
              <a href="#"><div class="initem">
                <img src="<?= file_url('assets/images/1.png'); ?>">
                <h3>Medical Equipment at Home</h3>
                <p>Rent & Purchase equipment</p>
                <button class="btn btn-gray btn-round">Know More</button>
              </div></a>
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </div>

<footer>
  <section class="footer-sec1 container pddt_50">
    <div class="row">     
      <div class="flx">
        <div class="col-xs-12 col-md-9 col-sm-9 mt_30 mb_50">
          <div class="col-xs-12 col-md-2 col-sm-2 fpoints">
            <h3>Services</h3>
            <ul>
              <a href="#"><li>Menu 1</li></a>
              <a href="#"><li>Menu 2</li></a>
              <a href="#"><li>Menu 3</li></a>
              <a href="#"><li>Menu 4</li></a>
              <a href="#"><li>Menu 5</li></a>
              <a href="#"><li>Menu 6</li></a>
              <a href="#"><li>Menu 7</li></a>
            </ul>
          </div>  
          <div class="col-xs-12 col-md-2 col-sm-2 fpoints">
            <h3>Why Home Care?</h3>
            <ul>
              <a href="#"><li>Menu 1</li></a>
              <a href="#"><li>Menu 2</li></a>
              <a href="#"><li>Menu 3</li></a>
              <a href="#"><li>Menu 4</li></a>
              <a href="#"><li>Menu 5</li></a>
              <a href="#"><li>Menu 6</li></a>
              <a href="#"><li>Menu 7</li></a>
            </ul>
          </div>
          <div class="col-xs-12 col-md-2 col-sm-2 fpoints">
            <h3>About Apollo</h3>
            <ul>
              <a href="#"><li>Menu 1</li></a>
              <a href="#"><li>Menu 2</li></a>
              <a href="#"><li>Menu 3</li></a>
              <a href="#"><li>Menu 4</li></a>
              <a href="#"><li>Menu 5</li></a>
            </ul>
          </div>
          <div class="col-xs-12 col-md-2 col-sm-2 fpoints">
            <h3>Careers</h3>
            <ul>
              <a href="#"><li>Menu 1</li></a>
              <a href="#"><li>Menu 2</li></a>
              <a href="#"><li>Menu 3</li></a>
              <a href="#"><li>Menu 4</li></a>
              <a href="#"><li>Menu 5</li></a>
              <a href="#"><li>Menu 6</li></a>
            </ul>
          </div>
          <div class="col-xs-12 col-md-2 col-sm-2 fpoints">
            <h3>Contact us</h3>
            <ul>
              <a href="#"><li>Menu 1</li></a>
              <a href="#"><li>Menu 2</li></a>
              <a href="#"><li>Menu 3</li></a>
              <a href="#"><li>Menu 4</li></a>
              <a href="#"><li>Menu 5</li></a>
              <a href="#"><li>Menu 6</li></a>
              <a href="#"><li>Menu 7</li></a>
            </ul>
          </div>
          <div class="col-xs-12 col-md-2 col-sm-2 fpoints">
            <h3>News & Media</h3>
            <ul>
              <a href="#"><li>Menu 1</li></a>
              <a href="#"><li>Menu 2</li></a>
              <a href="#"><li>Menu 3</li></a>
              <a href="#"><li>Menu 4</li></a>
              <a href="#"><li>Menu 5</li></a>
              <a href="#"><li>Menu 6</li></a>
              <a href="#"><li>Menu 7</li></a>
            </ul>
          </div>
        </div>
        <div class="col-xs-12 col-md-3 col-sm-3 text-center mt_50 mb_30">
          <div class="leftprt pddb_30">
            <a href="#"><button class="btn btn-round btn-solid">Pay Online</button></a>
            <a href="#"><button class="btn btn-round btn-bdr">Feedback</button></a>
            <a href="#"><button class="btn btn-round btn-bdr">Download Booklet</button></a>

            <div class="fsocial">
              <ul>
                <a href="#"><li><i class="fa fa-facebook-official" aria-hidden="true"></i></li></a>
                <a href="#"><li><i class="fa fa-twitter" aria-hidden="true"></i></li></a>
                <a href="#"><li><i class="fa fa-youtube-play" aria-hidden="true"></i></li></a>
              </ul>
            </div>
            <div class="ct_dtls">
              <a class="mb_30" href="mailto:">company@company.com</a>
              <a class="mb_30" href="tel::">1800 XXX XXXX</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="footer-sec2 container-fluid">
    <div class="row">
      <div class="col-xs-12 text-center">
        <p>© 2022 Company name All rights reserved.</p>  
      </div>  
    </div>
  </section>
</footer>

</body>
</html>
