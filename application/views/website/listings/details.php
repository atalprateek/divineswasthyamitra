
	
    <div class="my-15">
        <div class="container details">
            <div class="row">
                <div class="col-md-12 my-10 py-5">

                    <div class="mb-15 box-shadow">
                        <h2 class="text-center py-5 text-success"><?php echo $hospital['name']; ?></h2>
                        <img src="<?php echo $hospital['banner']; ?>" alt="" class="mb-10">
                        <div class="p-15 background-white my-10">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="rating clearfix">
                                        <span class="float-left text-grey-2 text-danger"><i class="fa fa-map"></i>  <?php echo $hospital['district'].', '.$hospital['state']; ?></span>
                                        <ul class="float-right hidden">
											<?php
                                                for($i=1;$i<=5;$i++){
                                                    $class='';
                                                    if($i<=$hospital['rating']){$class='active';}
                                                    echo "<li class='$class'></li>";
                                                }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="row no-gutters pb-15">
                                        <div class="col-xs-4"><a href="#" class="text-lime"><i class="fa fa-bookmark"></i> Open Now!</a></div>
                                        <div class="col-xs-4 text-center"><a href="#" class="text-red"><i class="fa fa-heart"></i> Save</a></div>
                                        <div class="col-xs-4 text-right"><a href="<?php echo base_url("listings/?category=".$hospital['category-slug']); ?>" class="text-blue"><i class="fa fa-hospital"></i> <?php echo $hospital['category']; ?></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-8 mt-5">

                    <div class="mb-15 px-15 box-shadow background-white">
                    	<div class="row background-main-color">
                        	<div class="col-12 p-15">
                            	<h3 class="text-white px-15"><i class="fa fa-hospital margin-right-10px text-white"></i> About <?php echo $hospital['name']; ?></h3>
                            </div>
                        </div>
                        <div class="p-15 background-white">
                            <p class="text-grey-2"><?php echo $hospital['description']; ?></p>
                        </div>
                        <div class="p-15 background-white">
                            <p class="hospital-details">Phone : <span><?php echo $hospital['phone']; ?></span></p>
                            <p class="hospital-details">Email : <span><?php echo $hospital['email']; ?></span></p>
                            <p class="hospital-details">Website : 
                            	<span>
                                    <a href="<?php if(strpos($hospital['website'],'http')===false){ echo 'http://';}echo $hospital['website']; ?>" target="_blank">
                                    <?php echo $hospital['website']; ?>
                                    </a>
                                </span>
                            </p>
                        </div>
                    </div>
                    <?php
					if($display_status===true){
					?>
                    <div class="mb-15 px-15 box-shadow background-white">
                    	<div class="row background-main-color">
                        	<div class="col-12 p-15">
                            	<h3 class="text-white px-15"><i class="fa fa-percent margin-right-10px text-white"></i> Discount Slab</h3>
                            </div>
                        	<div class="p-15 background-white full-width">
                        		<ul>
									<?php
                                        $discounts=$hospital['discounts'];
                                        if(!empty($discounts) && is_array($discounts)){
                                            foreach($discounts as $discount){
                                                $discountvalue="";
                                                if($discount['type']=='percent'){
                                                    $discountvalue=$discount['discount']. "%";
                                                }
                                                elseif($discount['type']=='amount'){
                                                    $discountvalue="Rs. ".$discount['discount'];
                                                }
                                    ?>
                                    <li><?php echo $discount['name']." - ".$discountvalue; ?></li>
                                    <?php
                                            }
                                        }
                                        else{
                                            echo "<tr><td>No Discount Available!</td></tr>";
                                        }
                                    ?>
                                </ul>
                            </div>
                        </div>
                   	</div>
                    <?php }
                        $reviews=$hospital['reviews'];
						if(is_array($reviews) && !empty($reviews)){ 
					?>
                    <div class="mb-15 px-15 box-shadow background-white">
                    	<div class="row background-main-color">
                        	<div class="col-12 py-15">
                            	<h3 class="text-white px-15"><i class="fa fa-star margin-right-10px text-white"></i> Review &amp; Rating</h3>
                            </div>
                        </div>
                       	<div class="p-15 background-white full-width">
                            <ul class="commentlist p-0 m-0 list-unstyled text-grey-3">
                            	<?php
									foreach($reviews as $review){
								?>
                                <li class="border-bottom-1 border-grey-1 margin-bottom-20px">
                                    <img src="<?php echo file_url("assets/img/user-icon.png"); ?>" class="float-left margin-right-20px border-radius-60 margin-bottom-20px" alt="">
                                    <div class="margin-left-85px">
                                        <a class="d-inline-block text-dark text-medium margin-right-20px" href="#"><?php echo $review['name']; ?></a>
                                        <span class="text-extra-small">Date :  <a href="#" class="text-main-color"><?php echo date('d-F-Y',strtotime($review['added_on'])); ?></a></span>
                                        <div class="rating">
                                            <ul>
                                            	<?php
													for($i=1;$i<=5;$i++){
														$class='';
														if($i<=$review['rating']){$class='active';}
														echo "<li class='$class'></li>";
													}
												?>
                                            </ul>
                                        </div>
                                        <p class="mt-15 text-grey-2"><?php echo $review['comment']; ?></p>
                                    </div>
                                </li>
                                <?php
									}
								?>
                            </ul>
                        </div>
                   	</div>
					<?php
						}
					?>
                    <div class="mb-15 px-15 box-shadow background-white hidden">
                    	<div class="row background-main-color">
                        	<div class="col-12 py-15">
                            	<h3 class="text-white px-15"><i class="fa fa-star margin-right-10px text-white"></i> Add Review</h3>
                            </div>
                        </div>
                       	<div class="p-15 background-white full-width">
                            <form method="post" action="<?php echo base_url('home/addreview'); ?>" onSubmit="return validateReview()">
                            	<div class="form-row">
                                	<div class="add-rating">
                                        <ul>
                                            <li></li>
                                            <li></li>
                                            <li></li>
                                            <li></li>
                                            <li></li>
                                        </ul>
                                        <div id="validate" style="display:none;position:absolute;background-color:#ffd400;z-index:1;padding:3px;">Please give star rating!</div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Full Name</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Email</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Comment :</label>
                                    <textarea class="form-control" name="comment" rows="3" placeholder="Comment"></textarea>
                                </div>
                                <input type="hidden" id="rating" name="rating">
                                <input type="hidden" name="hospital_id" value="<?php echo $hospital['id']; ?>">
                                <button type="submit" class="btn-sm btn-lg btn-block background-main-color text-white text-center font-weight-bold text-uppercase border-radius-10 padding-10px border-0">Add Now !</button>
                            </form>
                        </div>
                   	</div>
                </div>
                <div class="col-lg-4">
                    <div class="background-second-color border-radius-10 mb-15 text-white box-shadow work-time">
                        <h3 class="p-15"><i class="fa fa-clock-o mr-5"></i> Work Time</h3>
                        <div class="pb-15">
                            <ul class="padding-0px margin-0px">
                            	<?php
                       			 	$working_hours=$hospital['working_hours'];
									$x=0;
									foreach($working_hours as $day=>$working_hour){
										$x++;
										$bgclass='';
										if($x%2==0){ $bgclass='ba-2'; }
								?>
                                <li class="p-15 <?php echo $bgclass; ?>">
                                	<?php echo $day ?> <span class="float-right"><?php echo $working_hour ?></span>
                                </li>
                                <?php
									}
								?>
                            </ul>
                        </div>
                    </div>

                    <div class="background-white border-radius-10 mb-15 hidden">
                        <div class="padding-25px">
                            <h3 class="mx-15"><i class="fas fa-search margin-right-10px text-main-color"></i> Search Filter</h3>
                            <!-- Listing Search -->
                            <div class="listing-search">
                                <form action="<?php echo base_url("listing/"); ?>">
                                    <div class="keywords margin-bottom-20px">
                                        <input class="listing-form first border-radius-10" name="query" type="text" placeholder="Keywords..." value="">
                                    </div>
                                    <div class="regions margin-bottom-20px">
                                        <input class="listing-form border-radius-10" type="text" placeholder="All Regions" value="">
                                    </div>

                                    <div class="categories dropdown margin-bottom-20px">
                                    	<?php
											echo form_dropdown("category",$category,'',array("class"=>"custom-select border-radius-10"));
										?>
                                    </div>
                                    <button class="listing-bottom background-dark box-shadow border-radius-10 custom-search">Search Now</button>

                                </form>
                            </div>
                            <!-- // Listing Search -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    	$(document).ready(function(e) {
            $('.add-rating').on('click','li',function(){
				$('#validate').hide();
				var index=$(this).index();
				$(this).siblings().removeClass('active');
				$(this).addClass('active');
				$(this).siblings(':lt('+index+')').addClass('active');
				index++;
				$('#rating').val(index);
			});
        });
		
		function validateReview(){
			var rating=$('#rating').val();	
			if(rating==''){
				$('#validate').show();
				return false;
			}
		}
    </script>

