  
        <section class="affordable-homes" style="background:#ffffff;">
            <div class="container"> 
                <div class="row">
                    <div class="col-md-12">
                        <h2>Gallery</h2>
                        <hr style="border: 1px solid #e42121">
                        <br><br><br>
                        <div class="row">
                            <?php
                                for($i=1;$i<=9;$i++){
                            ?>
                            <div class="col-md-3">
                                <img src="<?= file_url('assets/images/gallery/image-'.$i.'.jpg'); ?>" alt="">
                            </div>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>