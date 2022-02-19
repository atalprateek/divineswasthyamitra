
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
        <?php
            if(!empty($blogs) && is_array($blogs) ){
        ?>
        <section class="affordable-homes">
            <div class="container">
                <h1>Blogs</h1> 
                <div class="row">
                    <?php
                        foreach($blogs as $blog){
                            $content=strip_tags($blog['content']);
                            $content=substr($content,0,80).'...';
                    ?>
                    <div class="col-md-3">
                        <div class="card border-danger mb-3" style="max-width: 18rem;">
                            <div class="card-header"><?= $blog['title']; ?></div>
                            <div class="card-body text-danger">
                                <img src="<?= $blog['thumb_img']; ?>" width="100%" alt="<?= $blog['title']; ?>">
                                <p class="card-text"><?= $content; ?></p>
                                <a href="<?= base_url("blogs/".$blog['slug']); ?>">Read More</a>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </section>
        <?php } ?>
        <section class="videobanner">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 py-2">
                        <a href="#"><img src="<?= file_url('assets/images/vidbannerpic.jpeg'); ?>" width="100%"></a>
                    </div>
                </div>
            </div>
        </section>

        <section class="affordable-homes"  style="background:#f0f0f0;">
            <div class="container">
                <h1>Quiz</h1><hr style="border: 1px solid #e42121"> 
                <div class="row">
                    <?php
                        if(!empty($subjects) && is_array($subjects)){$s=0;
                            foreach($subjects as $subject){$s++;
                                if($s==11){ break; }
                    ?>
                    <div class="col-md-3">
                        <a href="<?= base_url('chapters/'.$subject['slug']); ?>"><p class="btn-danger" width="100%"><?= $subject['name']; ?></p></a>
                    </div> 
                    <?php
                            }
                    ?>
                    <div class="col-md-3">
                        <a href="<?= base_url('subjects/'); ?>"><p class="btn-danger" width="100%">View All</p></a>
                    </div> 
                    <?php
                        }
                        else{
                            echo '<div class="col-12 text-center text-danger">No Quiz Available!</div>';
                        }
                    ?> 
                </div>
            </div>
        </section>
        
        <?php
            if(!empty($testimonials) && is_array($testimonials)){
        ?>
        <section class="testimonial py-2">
            <div class="testimonial-overlay">
                <div class="container">
                    <h2>Our Clients Says</h2><hr style="border: 1px solid #e42121">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="carouselExampleControls1" class="carousel slide" data-ride="carousel" data-pause="false">
                                <div class="carousel-inner">
                                    <?php
                                        $i=0;
                                        foreach($testimonials as $testimonial){
                                            $i++;
                                    ?>
                                    <div class="carousel-item <?= ($i==1)?'active':'' ?>">
                                        <img class="text-center" src="<?= file_url($testimonial['image']); ?>" class="d-block" alt="<?= $testimonial['name']; ?>">
                                        <h4><?= $testimonial['name']; ?></h4>
                                        <p><?= $testimonial['content']; ?></p>
                                    </div>
                                    <?php
                                        }
                                    ?>
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
        <?php } ?>
