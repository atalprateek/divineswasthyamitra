  
        <section class="affordable-homes" style="background:#ffffff;">
            <div class="container"> 
                <div class="row">
                    <div class="col-md-12">
                        <h2 style="padding-bottom:10px;">Syllabus</h2>
                        <hr style="border: 1px solid #e42121">
                        <?php
                            if(is_array($syllabus) && !empty($syllabus)){
                                echo '<ul>';                             
                                foreach($syllabus as $single){ 
                        ?>
                        <li><a href="<?= base_url('syllabus/'.$single['slug']); ?>"><?= $single['title']; ?></a></li>
                        <?php
                                }
                                echo '</ul>';    
                            }
                        ?>
                    </div>

                </div>
            </div>
        </section>