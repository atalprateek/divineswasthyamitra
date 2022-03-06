
	
    <div class="my-15">
        <div class="container my-10 py-5">
            <div class="row my-10">
            	<div class="col-lg-12">
                    <!-- Listing Search -->
                    <div class="listing-search">
                        <form action="<?php echo base_url("listings/"); ?>" class="row no-gutters">
                            <?php
                                $slug=$query='';
                                if(isset($_GET['query'])){ $query=$_GET['query']; }
                                if(isset($_GET['category'])){ $slug=$_GET['category']; }
                            ?>
                            <div class="col-md-4 col-6">
                                <div class="keywords">
                                    <input class="form-control" name="query" type="text" placeholder="Keywords..." value="<?php echo $query; ?>">
                                </div>
                            </div>
                            <div class="col-md-4 col-6">
                                <div class="categories dropdown">
                                    <?php
                                        echo form_dropdown("category",$category,$slug,array("class"=>"form-control"));
                                    ?>
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <button type="submit" class="btn btn-sm btn-primary">Search Now</button>
                            </div>
                        </form>
                    </div>
                    <!-- // Listing Search -->
                    <hr>
                </div>
            </div>
            <div class="row">
            	<div class="col-md-3 listing-sidebar">
                	<ul>
                    	<?php
                        	foreach($category as $key=>$single){
						?>
                    	<li class="<?php if($key==$slug){echo "active";} ?>">
                        	<a href="<?php echo base_url("listings/?category=". $key); ?>"><?php echo $single; ?></a>
                        </li>
                        <?php
							}
						?>
                    </ul>
                </div>
                <div class="col-md-9">
                        <div class="float-left"><?php echo $rowcount; ?> Results Found</div>
                        <div class="float-right hidden">
                            <a href="map-list-layout.html" class="d-inline-block mr-15 text-main-color"><i class="fas fa-list-ul"></i></a>
                            <a href="map-grid-layout.html"><i class="fas fa-th-large"></i></a>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="my-15">
                            
							<?php
                                if(is_array($hospitals)){
                                    foreach($hospitals as $hospital){
										$url=base_url("listings/".$hospital['slug']);
                            ?>
                            <!-- clinic -->
                            <div class="background-white thum-hover box-shadow hvr-float full-width mb-15 listing-div">
                                <div class="col-md-3 sm-mr-0px text-center sm-mt-35px">
                                    <img src="<?php echo $hospital['thumb_image'] ?>" alt="">
                                </div>
                                <div class="py-5 col-md-9">
                                    <h2>
                                        <a href="<?php echo $url; ?>" class="d-block text-success text-capitalize text-medium margin-tb-15px"><?php echo $hospital['name']; ?></a>
                                    </h2>
                                    <span class="text-danger">
                                        <i class="fa fa-map"></i>  <?php echo $hospital['district'].', '.$hospital['state']; ?>
                                    </span>
                                    <div class="row no-gutters py-15">
                                        <div class="col-xs-4"><a href="#" class="text-lime"><i class="fa fa-bookmark"></i> Open Now!</a></div>
                                        <div class="col-xs-4 text-center"><a href="#" class="text-red"><i class="fa fa-heart"></i> Save</a></div>
                                        <div class="col-xs-4 text-right"><a href="<?php echo base_url("listings/?category=".$hospital['category-slug']); ?>" class="text-blue"><i class="fa fa-hospital"></i> <?php echo $hospital['category']; ?></a></div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <!-- // clinic -->
                            <?php
									}
								}
								echo $pagination;
							?>
                            
                            
                        </div>
                </div>
            </div>
        </div>
    </div>

