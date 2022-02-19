

<div class="pcoded-inner-content">
    <div class="main-body">
        <div class="page-wrapper">
            <div class="page-body">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h5><?= $title; ?></h5>
                            </div>
                            <div class="card-block">
                                <?php echo form_open_multipart('admin/listings/addhospital/','id="myform"'); ?>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Institute Name</label>
                                                <div class="col-sm-10">
                                                    <?php 
                                                        $data = array('name' => 'name', 'id'=> 'name', 'placeholder'=>'Institute Name', 'class'=>'form-control', 'required'=>'true');
                                                        echo form_input($data); 
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Address</label>
                                                <div class="col-sm-10">
                                                    <?php 
                                                       $data = array('name'=>'address','id'=> 'address','rows'=>'3','placeholder'=>'Address', 'class'=>'form-control');
                                                       echo form_textarea($data); 
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">District</label>
                                                <div class="col-sm-10">
                                                    <?php
                                                        $data = array('name' => 'district', 'id'=> 'district', 'placeholder'=>'District', 'class'=>'form-control', 'required'=>'true');
                                                        echo form_input($data); 
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">State</label>
                                                <div class="col-sm-10">
                                                    <?php
                                                        echo form_dropdown('state', $states, '',array('id'=>'state','class'=>'form-control'));
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Pincode</label>
                                                <div class="col-sm-10">
                                                    <?php
                                                        $data = array('name' => 'pincode', 'id'=> 'pincode', 'placeholder'=>'Pincode', 'class'=>'form-control');
                                                        echo form_input($data)
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Category</label>
                                                <div class="col-sm-10">
                                                    <?php
                                                        echo form_dropdown('category_id', $categories, '',array('id'=>'category_id','class'=>'form-control'));
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Keywords</label>
                                                <div class="col-sm-10">
                                                    <?php 
                                                       $data = array('name'=>'keywords','id'=> 'keywords','rows'=>'3','placeholder'=>'Keywords', 'class'=>'form-control');
                                                       echo form_textarea($data); 
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Phone</label>
                                                <div class="col-sm-10">
                                                    <?php 
                                                        $data = array('name' => 'phone', 'id'=> 'phone', 'placeholder'=>'Phone', 'class'=>'form-control', 'required'=>'true');
                                                        echo form_input($data); 
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-10">
                                                    <?php 
                                                        $data = array('type'=>'email','name' => 'email', 'id'=> 'email', 'placeholder'=>'info@yourname.com', 'class'=>'form-control');
                                                        echo form_input($data); 
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Website</label>
                                                <div class="col-sm-10">
                                                    <?php 
                                                        $data = array('name' => 'website', 'id'=> 'website', 'placeholder'=>'www.your-site.com', 'class'=>'form-control');
                                                        echo form_input($data); 
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Banner Image</label>
                                                <div class="col-sm-10">
                                                    <?php 
                                                        $data = array('type'=>'file','name' => 'image', 'id'=> 'image');
                                                        echo form_input($data); 
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Thumbnail Image</label>
                                                <div class="col-sm-10">
                                                    <?php 
                                                        $data = array('type'=>'file','name' => 'thumb_image', 'id'=> 'thumb_image');
                                                        echo form_input($data); 
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-md-1 col-form-label">Description</label>
                                                <div class="col-sm-10 col-md-11">
                                                    <?php
                                                         $data = array('name'=>'description','id'=>'description','rows'=>'3', 'class'=>'form-control', 'placeholder'=>'Description');
                                                         echo form_textarea($data);
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div><hr>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h3>Discount Slab</h3>
                        	                <div class="table-reponsive" id="discount-div"></div>
                                        </div>
                                    </div><hr>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h3>Working Hour</h3>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label"><h4>Schedule</h4></label>
                                                <div class="col-sm-10">
                                                    <?php
                                                        $schedule=array(""=>"Select Schedule","24"=>"24x7","daily"=>"Daily Schedule");
                                                        echo form_dropdown('schedule', $schedule, '',array('id'=>'schedule','class'=>'form-control',"required"=>"true"));
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="daily d-none">
                                            <?php
                                                $days=array("Monday","Tuesday","Wednesday","Thursday","Friday","Saturday",
                                                            "Sunday");
                                                foreach($days as $day){
                                            ?>
                                                <div class="row">
                                                    <div class="col-md-2"><?php echo $day; ?></div>   
                                                    <div class="col-md-5">
                                                        <label>Open Time</label>
                                                        <?php 
                                                            $data = array('type'=>'time', 'name' => 'open_time[]', 'class'=>'form-control');
                                                            echo form_input($data); 
                                                        ?>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <label>Close Time</label>
                                                    <?php 
                                                        $data = array('type'=>'time', 'name' => 'close_time[]', 'class'=>'form-control');
                                                        echo form_input($data);
                                                        $data = array('type'=>'hidden', 'name' => 'day[]','value'=>$day);
                                                        echo form_input($data); 

                                                    ?>
                                                    </div>
                                                </div>
                                                <hr class="mx-0 my-1">
                                            <?php
                                                }
                                            ?>
                                            </div>
                                        </div>
                                    </div><br>
                                    <div class="row">
                                        <div class="col-sm-12 text-center">
                                            <input type="submit" name="addhospital" value="Add Hospital" class="btn btn-success">
                                        </div>
                                    </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<script>
	$(document).ready(function(e) {
        CKEDITOR.replace('description');
        $('#category_id').change(function(){
            var category_id=$(this).val();
            $.ajax({
                type:"POST",
                url:"<?php echo admin_url("listings/getdiscount"); ?>",
                data:{category_id:category_id},
                success: function(data){
                    $('#discount-div').html(data);
                }
            });
        });
        $('#schedule').change(function(){
            var schedule=$(this).val();
            if(schedule=='daily'){
                $(this).parent().addClass('d-none');
                $('.daily').removeClass('d-none');
            }
        });
    });
		
</script>