  
        <section class="affordable-homes"  style="background:#f0f0f0;">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <ul class="nav flex-column">
                            <li class="nav-item"><a class="nav-link" href="<?= base_url('profile/');?>">Profile</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?= base_url('bookmarks/');?>">Bookmarks</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-10">
                        <h3><?= $title; ?></h3><hr style="border: 1px solid #e42121">
                        <div class="row questionlist">

                            <?php
                                $bookmarkqids=getbookmarkqids();
                                foreach($bookmarks as $question){ 
                                    $heart="";
                                    if(in_array($question['id'],$bookmarkqids)){ $heart="liked"; }
                                    $offset++;
                                    $name='question-'.$question['subject_id'].'-'.$question['chapter_id'].'-'.$question['id'];
                            ?> 
                            <div class="col-md-12 single-question">
                                <?php if($this->session->user!==NULL && $this->session->role=='student'){ ?>
                                <span class="bookmark-btn <?= $heart; ?>"><i class="far fa-bookmark"></i><i class="fas fa-bookmark"></i></span>
                                <?php } ?>
                                <div class="question">
                                    <?= '<span class="qno">'.$offset.')</span> '.$question['question']; ?>
                                </div>
                                <div class="options">
                                    <div class="row">
                                        <?php
                                            for($i='a';$i<'g';$i++){
                                                if($question['option_'.$i]===NULL){ break; }
                                        ?>
                                        <div class="col-md-6">
                                            <label class="container">
                                                <input type="radio" name="<?= $name; ?>" value="<?= $i; ?>">&nbsp;<?= $question['option_'.$i]; ?>
                                            </label>
                                        </div>
                                        <?php
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script>
            $(document).ready(function(){
                $('.options').on('click','input',function(){
                    if($(this).is(':checked')){
                        var answer=$(this).val();
                        var question=$(this).attr('name');
                        $this=$(this);
                        $.ajax({
                            type:"post",
                            url:"<?= base_url('quiz/checkanswer/'); ?>",
                            data:{answer:answer,question:question,donotreset:'donotreset'},
                            success:function(data){
                                data=JSON.parse(data);
                                if(data['status']==true){
                                    $this.parent().addClass('text-success');
                                }
                                else{
                                    $this.parent().addClass('text-danger');
                                    $this.closest('.options').find('input[name="'+question+'"][value="'+data['answer']+'"]').parent().addClass('text-success');
                                }
                                $this.closest('.options').find('input[name="'+question+'"]').attr('disabled',true);
                            }
                        });
                    }
                });
            });
        </script>
        