
                            <div class="page-header card">
                                <div class="row align-items-end">
                                    <div class="col-lg-8">
                                        <div class="page-header-title">
                                            <i class="feather icon-watch bg-c-blue"></i>
                                            <div class="d-inline">
                                                <h5><?= $title ?></h5>
                                                <span><?= !empty($subtitle)?$subtitle:''; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <?php 
                                        if(isset($breadcrumb) && is_array($breadcrumb)){ 
                                        ?>
                                        <div class="page-header-breadcrumb">
                                            <ul class=" breadcrumb breadcrumb-title">
                                            <?php
                                                if(is_array($breadcrumb)){
                                                    $breadcrumb=$breadcrumb;
                                                    if(!isset($breadcrumb['active']) && $this->uri->segment(1)!=''){ $breadcrumb['active']=$title; }
                                                    foreach($breadcrumb as $link=>$crumb){
                                                        if($link=='active'){
                                                            echo '<li class="breadcrumb-item active" aria-current="page">'.$crumb.'</li>';
                                                        }
                                                        else{
                                                            echo '<li class="breadcrumb-item"><a href="'.admin_url($link).'">'.$crumb.'</a></li>';
                                                        }
                                                    }	
                                                }
                                            ?>
                                            </ul>
                                        </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                                $notify=$nDataType=$nicon=$ntitle=$msg='';
                                if($this->session->flashdata('msg')!==NULL){
                                    $msg=$this->session->flashdata('msg');
                                    $nDataType="success";
                                    $nicon='fas fa-check';
                                    //$ntitle=$notify_options[$ntype]['stitle'];
                                    $notify='notify';
                                }
                                if($this->session->flashdata('err_msg')!==NULL){
                                    $msg=$this->session->flashdata('err_msg');
                                    $nDataType="danger";
                                    $nicon='fas fa-exclamation-triangle';
                                    //$ntitle=$notify_options[$ntype]['etitle'];
                                    $notify='notify';
                                }
                            ?>
                            <div class="notifications d-none">
                                <button class="btn btn-primary waves-effect" data-type="<?php echo $nDataType; ?>" data-title="<?= $ntitle; ?>" data-from="<?= NFROM ?>" data-align="<?= NALIGN ?>" data-icon="<?= $nicon; ?>" data-animation-in="animated <?= NANIMATEIN ?>" data-animation-out="animated <?= NANIMATEOUT ?>"><?= $msg; ?></button>
                            </div>
