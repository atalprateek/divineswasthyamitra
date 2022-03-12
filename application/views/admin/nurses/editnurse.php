

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
                                <?php echo form_open_multipart('admin/listings/updatehospital/','id="myform"'); ?>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Institute Name</label>
                                                <div class="col-sm-10">
                                                    <?php 
                                                        $data = array('name' => 'name', 'id'=> 'name', 'placeholder'=>'Institute Name', 'class'=>'form-control', 'required'=>'true','value'=>$hospital['name']);
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
                                                       $data = array('name'=>'address','id'=> 'address','rows'=>'3','placeholder'=>'Address', 'class'=>'form-control','value'=>$hospital['address']);
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
                                                        $data = array('name' => 'district', 'id'=> 'district', 'placeholder'=>'District', 'class'=>'form-control', 'required'=>'true','value'=>$hospital['district']);
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
                                                        echo form_dropdown('state', $states, $hospital['state'],array('id'=>'state','class'=>'form-control'));
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
                                                        $data = array('name' => 'pincode', 'id'=> 'pincode', 'placeholder'=>'Pincode', 'class'=>'form-control','value'=>$hospital['pincode']);
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
                                                        echo form_dropdown('category_id', $categories, $hospital['category_id'],array('id'=>'category_id','class'=>'form-control'));
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
                                                       $data = array('name'=>'keywords','id'=> 'keywords','rows'=>'3','placeholder'=>'Keywords', 'class'=>'form-control','value'=>$hospital['keywords']);
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
                                                        $data = array('name' => 'phone', 'id'=> 'phone', 'placeholder'=>'Phone', 'class'=>'form-control', 'required'=>'true','value'=>$hospital['phone']);
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
                                                        $data = array('type'=>'email','name' => 'email', 'id'=> 'email', 'placeholder'=>'info@yourname.com', 'class'=>'form-control','value'=>$hospital['email']);
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
                                                        $data = array('name' => 'website', 'id'=> 'website', 'placeholder'=>'www.your-site.com', 'class'=>'form-control','value'=>$hospital['website']);
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
                                                         $data = array('name'=>'description','id'=>'description','rows'=>'3', 'class'=>'form-control', 'placeholder'=>'Description','value'=>$hospital['description']);
                                                         echo form_textarea($data);
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div><hr>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h3>Discount Slab</h3>
                        	                <div class="table-reponsive" id="discount-div">
                                                <table class="table">
                                                    <?php
                                                        if(!empty($discounts) && is_array($discounts)){ $i=0;
                                                            foreach($discounts as $discount){
                                                                $placeholder="";
                                                                if($discount['type']=='percent'){
                                                                    $placeholder="Enter Discount Percent(%)";
                                                                }
                                                                elseif($discount['type']=='amount'){
                                                                    $placeholder="Enter Discount Amount";
                                                                }
                                                                $value='';
                                                                if(isset($hospital['discounts'][$i])){$value=$hospital['discounts'][$i]['discount'];}
                                                                $i++;
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $discount['name']; ?></td>
                                                        <td>
                                                            <?php 
                                                                echo form_hidden('discount_id[]', $discount['id']);
                                                                $data = array('name' => 'discount[]', 'class'=>'form-control form-control-sm', 'placeholder'=>$placeholder,'value'=>$value);
                                                                echo form_input($data); 
                                                            ?>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                            }
                                                        }
                                                        else{
                                                            echo "<tr><td>No Discount Available!</td></tr>";
                                                        }
                                                    ?>
                                                </table>
                                            </div>
                                        </div>
                                    </div><hr>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h3>Working Hour</h3>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label"><h4>Schedule</h4></label>
                                                <div class="col-sm-10">
                                                    <?php
                                                        $days=array("Monday","Tuesday","Wednesday","Thursday","Friday",
                                                                    "Saturday","Sunday");
                                                        $sch="";
                                                        foreach($days as $day){
                                                            $times=$hospital['working_hours'][$day];
                                                            if($times=="24 Hours"){
                                                                $sch="24";
                                                                break;
                                                            }else{
                                                                $sch="daily";
                                                                break;
                                                            }
                                                        }
                                                        $schedule=array(""=>"Select Schedule","24"=>"24x7","daily"=>"Daily Schedule");
                                                        echo form_dropdown('schedule', $schedule, $sch,array('id'=>'schedule','class'=>'form-control form-control-sm',"required"=>"true"));
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="daily <?php if($sch!='daily'){ echo "d-none"; } ?>">
                                            <?php
                                                $date=date('Y-m-d');
                                                foreach($days as $day){
                                                    $times=$hospital['working_hours'][$day];
                                                    if($times!='Closed' && $times!='24 Hours' && $times!='-'){
                                                        $times=explode('-',$times);
                                                        $open_time=date('H:i:s',strtotime($date.' '.$times[0]));
                                                        $close_time=date('H:i:s',strtotime($date.' '.$times[1]));
                                                    }
                                                    else{
                                                        $open_time=$close_time='';
                                                    }
                                            ?>
                                                <div class="row">
                                                    <div class="col-md-2"><?php echo $day; ?></div>   
                                                    <div class="col-md-5">
                                                        <label>Open Time</label>
                                                        <?php 
                                                            $data = array('type'=>'time', 'name' => 'open_time[]', 'class'=>'form-control','value'=>$open_time);
                                                            echo form_input($data); 
                                                        ?>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <label>Close Time</label>
                                                    <?php 
                                                        $data = array('type'=>'time', 'name' => 'close_time[]', 'class'=>'form-control','value'=>$close_time);
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
                                            <input type="hidden" name="id" value="<?= $hospital['id']; ?>">
                                            <input type="submit" name="updatehospital" value="Update Hospital" class="btn btn-success">
                                            <a href="<?= admin_url('listings/') ?>" class="btn btn-danger">Cancel</a>
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
            else{
                $(this).parent().removeClass('d-none');
                $('.daily').addClass('d-none');
            }
        });
    });
		
</script>