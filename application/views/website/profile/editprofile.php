

    <div class="margin-tb-30px">
        <div class="container">
            <div class="row">
            	<div class="col-12">
                	<?php echo form_open_multipart('profile/updateprofile'); ?>
                        <div class="py-15 background-white">
                        	<div class="lead my-15">My Profile</div>
                            <div class="form-group my-15">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="control-label">Name</label>
                                        <?php 
                                            $data = array('name' => 'name', 'id'=> 'name', 'placeholder'=>'Name', 'class'=>'form-control', 'required'=>'true','value'=>$member['name']);
                                            if($data['value']!=''){$data['readonly']="true";}
                                            echo form_input($data); 
                                        ?>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="control-label">Mobile</label>
                                        <?php 
                                            $data = array('name' => 'mobile', 'id'=> 'mobile', 'placeholder'=>'Mobile', 'class'=>'form-control', 'required'=>'true','value'=>$member['mobile']);
                                            if($data['value']!=''){$data['readonly']="true";}
                                            echo form_input($data); 
                                        ?>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="control-label">Email</label>
                                        <?php 
                                            $data = array('type' => 'email', 'name' => 'email', 'id'=> 'email', 'placeholder'=>'Email', 'class'=>'form-control', 'required'=>'true','value'=>$member['email']);
                                            if($data['value']!=''){$data['readonly']="true";}
                                            echo form_input($data); 
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group my-15">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="control-label">Alternate Mobile</label>
                                        <?php 
                                            $data = array('name' => 'amobile', 'id'=> 'amobile', 'placeholder'=>'Alternate Mobile', 'class'=>'form-control', 'required'=>'true','value'=>$member['amobile']);
                                            if($data['value']!=''){$data['readonly']="true";}
                                            echo form_input($data); 
                                        ?>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="control-label">Aadhar No</label>
                                        <?php 
                                            $data = array('name' => 'aadhar', 'id'=> 'aadhar', 'placeholder'=>'Aadhar No', 'class'=>'form-control', 'required'=>'true','value'=>$member['aadhar']);
                                            if($data['value']!=''){$data['readonly']="true";}
                                            echo form_input($data); 
                                        ?>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="control-label">Gender</label>
                                        <?php
                                            $gender=array(""=>"Select Gender","Male"=>"Male","Female"=>"Female");
                                            $attr=array("class"=>"form-control","id"=>"gender");
                                            if($member['gender']!=''){$attr['disabled']="true";}
                                            echo form_dropdown('gender',$gender,$member['gender'],$attr);
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group my-15">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="control-label">Age</label>
                                        <?php 
                                            $data = array('name' => 'age', 'id'=> 'age', 'placeholder'=>'Age', 'class'=>'form-control', 'required'=>'true','value'=>$member['age']);
                                            if($data['value']!=''){$data['readonly']="true";}
                                            echo form_input($data); 
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group my-15">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="control-label">Address</label>
                                        <?php 
                                             $data = array('name'=>'address','id'=>'address','rows'=>'3', 'class'=>'form-control', 'placeholder'=>'Address', 'value'=>$member['address']);
                                            if($data['value']!=''){$data['readonly']="true";}
                                             echo form_textarea($data);
                                        ?>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="control-label">District</label>
                                        <?php 
                                            $data = array('name' => 'district', 'id'=> 'district', 'placeholder'=>'District', 'class'=>'form-control', 'required'=>'true','value'=>$member['district']);
                                            if($data['value']!=''){$data['readonly']="true";}
                                            echo form_input($data); 
                                        ?>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="control-label">State</label>
                                        <?php
                                            $attr=array("class"=>"form-control","id"=>"state");
                                            if($member['state']!=''){$attr['disabled']="true";}
                                            echo form_dropdown('state',$states,$member['state'],$attr);
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group my-15">
                                <div class="row">
                                	<?php
										if($this->session->role=='member'){
									?>
                                    <div class="col-md-4">
                                        <label class="control-label">Ward/Panchayat</label>
                                        <?php
                                            $attr=array("class"=>"form-control","id"=>"ward");
                                            if($member['ward']!=''){$attr['disabled']="true";}
                                            echo form_dropdown('ward',$wards,$member['ward'],$attr);
                                        ?>
                                    </div>
                                    <?php
										}
                                    ?>
                                    <div class="col-md-4">
                                        <label class="control-label">Pincode</label>
                                        <?php 
                                            $data = array('name' => 'pincode', 'id'=> 'pincode', 'placeholder'=>'Pincode', 'class'=>'form-control', 'required'=>'true','value'=>$member['pincode']);
                                            if($data['value']!=''){$data['readonly']="true";}
                                            echo form_input($data); 
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group my-15">

                                <button type="submit" name="updateprofile" class="btn btn-sm btn-success">Update Profile</button>
                            </div>
                        </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>

    <div class="margin-tb-30px">
        <div class="container">
            <div class="row">
            	<div class="col-12">
                	<?php echo form_open_multipart('profile/updatepassword/','onsubmit="return validatepassword()"'); ?>
                        <div class="py-15 background-white">
                        	<div class="lead my-15">Update Password</div>
                            <div class="form-group my-15">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="control-label">New Password</label>
                                        <?php 
                                            $data = array('type'=>'password', 'name' => 'password', 'id'=> 'password', 'placeholder'=>'Password', 'class'=>'form-control', 'required'=>'true');
                                            echo form_input($data); 
                                        ?>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="control-label">Retype Password</label>
                                        <?php 
                                            $data = array('type'=>'password', 'name' => 'retype', 'id'=> 'retype', 'placeholder'=>'Retype Password', 'class'=>'form-control', 'required'=>'true');
                                            echo form_input($data); 
                                        ?>
                                    </div>
                                    <div class="col-md-4">
                                    	<br>
                                    	<input type="submit" value="Change Password" name="updatepassword" class="btn btn-success btn-sm">
                                    </div>
                             	</div>
               				</div>
                 		</div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
   	
	<?php
    	if($this->session->paid==1 && $this->session->role=='member'){
	?>
    <div class="margin-tb-30px">
        <div class="container">
            <div class="row">
            	<div class="col-12">
                	<?php echo form_open_multipart('profile/addfamily','onsubmit="return validate()"'); ?>
                        <div class="py-15 background-white">
                        	<div class="lead my-15">Family Members</div>
                            <?php
								$count=4;
								for($i=0;$i<$count;$i++){
									$name=$relation=$age=$genderval=$id='';
									if(isset($familymembers[$i])){
										$id=$familymembers[$i]['id'];
										$name=$familymembers[$i]['name'];
										$relation=$familymembers[$i]['relation'];
										$age=$familymembers[$i]['age'];
										$genderval=$familymembers[$i]['gender'];
									}
							?>
                            <div class="form-group my-15">
                                <div class="row">
                                	<div class="col-md-1 text-center padding-30px"><font size="+1"><?php echo $i+1; ?> .</font></div>
                                    <div class="col-md-4">
                                        <label class="control-label">Name</label>
                                        <?php 
                                            $data=array('name'=>'name[]','placeholder'=>'Name','class'=>'form-control','value'=>$name);
                                            if($data['value']!=''){$data['readonly']="true";}
                                            echo form_input($data); 
                                        ?>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="control-label">Relation</label>
                                        <?php 
                                            $relations=array(""=>"Select Relation","Father"=>"Father","Mother"=>"Mother","Brother"=>"Brother",
																"Sister"=>"Sister","Husband"=>"Husband","Wife"=>"Wife","Son"=>"Son",
																"Daughter"=>"Daughter");
                                    
                                            $attr=array("class"=>"form-control");
                                            if($relation!=''){$attr['disabled']="true";}
                                    
                                            echo form_dropdown('relation[]',$relations,$relation,$attr);
											
                                        ?>
                                    </div>
                                    <div class="col-md-2">
                                        <label class="control-label">Age</label>
                                        <?php 
                                            $data=array('name'=>'age[]','placeholder'=>'Age','class'=>'form-control','value'=>$age);
                                            if($data['value']!=''){$data['readonly']="true";}
                                            echo form_input($data); 
                                        ?>
                                    </div>
                                    <div class="col-md-2">
                                        <label class="control-label">Gender</label>
                                        <?php
                                            $gender=array(""=>"Gender","Male"=>"Male","Female"=>"Female");
                                            $attr=array("class"=>"form-control");
                                            if($genderval!=''){$attr['disabled']="true";}
                                            echo form_dropdown('gender[]',$gender,$genderval,$attr);
                                        ?>
                                    </div>
                                    <input type="hidden" name="id[]" value="<?php echo $id; ?>">
                                </div>
                            </div>
                            <?php
								}
							?>
                            <div class="form-group my-15">
                                <button type="submit" class="btn btn-sm btn-success" name="addfamily">Add Family Member</button>
                            </div>
                        </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
    <?php
		}
    ?>
	<script>
		function validatepassword(){
			var pass=$('#password').val();
			var retype=$('#retype').val();
			if(pass!=retype){
				alert('Passwords Do Not Match');
				return false;
			}
		}
    	function validate(){
			count=0;
			$('input[name="name[]"]').each(function(index, element) {
				if($(this).val()==''){ count++; }
            });
			if(count==4){
				alert("Add atleast 1 Family Member!");
				return false;
			}
		}
    </script>