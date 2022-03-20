

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
                                <?php echo form_open_multipart('admin/members/savehca/','id="myform" onSubmit="return validate();"'); ?>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Name</label>
                                                <div class="col-sm-10">
                                                    <?php 
                                                        $data = array('name' => 'name', 'id'=> 'name', 'placeholder'=>'Name', 'class'=>'form-control', 'required'=>'true');
                                                        echo form_input($data); 
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Gender</label>
                                                <div class="col-sm-10">
                                                    <?php
                                                        $gender=array(""=>"Select Gender","Male"=>"Male","Female"=>"Female");
                                                        echo form_dropdown('gender', $gender, '',array('id'=>'gender','class'=>'form-control'));
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Age</label>
                                                <div class="col-sm-10">
                                                    <?php 
                                                        $data = array('name' => 'age', 'id'=> 'age', 'placeholder'=>'Age', 'class'=>'form-control', 'required'=>'true');
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
                                                <label class="col-sm-2 col-form-label">Aadhar No</label>
                                                <div class="col-sm-10">
                                                    <?php
                                                        $data = array('name' => 'aadhar', 'id'=> 'aadhar', 'placeholder'=>'Aadhar No', 'class'=>'form-control');
                                                        echo form_input($data)
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Contact No</label>
                                                <div class="col-sm-10">
                                                    <?php 
                                                        $data = array('name' => 'mobile', 'id'=> 'mobile', 'placeholder'=>'Contact No', 'class'=>'form-control', 'required'=>'true');
                                                        echo form_input($data); 
                                                    ?>
                    			                    <div class="mobile-status"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Alternate Contact No</label>
                                                <div class="col-sm-10">
                                                    <?php 
                                                        $data = array('name' => 'amobile', 'id'=> 'amobile', 'placeholder'=>'Alternate Contact No', 'class'=>'form-control', 'required'=>'true');
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
                    			                    <div class="email-status"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Ward</label>
                                                <div class="col-sm-10">
                                                    <table width="100%">
                                                        <tr>
                                                            <td width="93%">
                                                                <?php 
                                                                    $data = array('name' => 'ward[]', 'placeholder'=>'Ward', 'class'=>'form-control form-control-sm','required'=>'true');
                                                                    echo form_input($data); 
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <button type="button" class="btn btn-xs btn-primary add-btn"><i class="fa fa-plus"></i></button>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 text-center">
                                            <input type="hidden" id="status" value="false">
                                            <input type="submit" name="savehca" value="Save HCA" class="btn btn-success">
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
        
        $('#mobile').keyup(function(){
            var mobile=$(this).val();
            $('.mobile-status').text('').removeClass('text-success').removeClass('text-danger');
            var re = /^[0-9]{10}$/;
            if(mobile!=''){
                if(re.test(mobile)){
                    $.ajax({
                        type:"POST",
                        url:"<?php echo base_url("account/checkmobile"); ?>",
                        data:{mobile:mobile},
                        success: function(data){
                            if(data==0){
                                $('.mobile-status').text('Mobile Number not available!').addClass('text-danger');
                            }
                            else{
                                $('.mobile-status').text('Mobile Number available!').addClass('text-success');
                            }
                        }
                    });
                }
                else{
                    $('.mobile-status').text('Enter Valid Mobile No!').addClass('text-danger');
                }
            }
        });
        
        $('#email').keyup(function(){
            var email=$(this).val();
            $('.email-status').text('').removeClass('text-success').removeClass('text-danger');
            var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            if(email!=''){
                if(re.test(email)){
                    $.ajax({
                        type:"POST",
                        url:"<?php echo base_url("account/checkemail"); ?>",
                        data:{email:email},
                        success: function(data){
                            if(data==0){
                                $('.email-status').text('Email Id not available!').addClass('text-danger');
                            }
                            else{
                                $('.email-status').text('Email Id available!').addClass('text-success');
                            }
                        }
                    });
                }
                else{
                    $('.email-status').text('Enter Valid Email Id!').addClass('text-danger');
                }
            }
        });
        
        $('body').on('click','.add-btn',function(){
            var row="<tr id='new-row'>"+$(this).closest('tr').html()+"</tr>";
            $(row).insertAfter($(this).closest('tbody').children().last());
            var button='<button type="button" class="btn btn-xs btn-danger remove-btn"><i class="fa fa-times"></i></button>';
            $('#new-row').find('.add-btn').replaceWith(button);
            $('#new-row').removeAttr('id');
        });
        $('body').on('click','.remove-btn',function(){
            $(this).closest('tr').remove();
        });
    });
		
    function validate(){
        if($('.email-status').hasClass('text-danger')){
            $('#email').focus();
            return false;
        }
        if($('.mobile-status').hasClass('text-danger')){
            $('#mobile').focus();
            return false;
        }
    }
</script>