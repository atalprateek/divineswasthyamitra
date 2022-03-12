

    <div class="margin-tb-30px">
        <div class="container">
            <div class="row">
            	<div class="col-12">
                	<?php echo form_open_multipart('profile/savecheckup'); ?>
                        <div class="py-15 background-white">
                        	<div class="lead my-15">Monitoring Chart</div>
                            <div class="form-group my-15">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="control-label">Patient Name</label>
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
                                        <label class="control-label">Date</label>
                                        <?php 
                                            $data = array('type'=>'date','name' => 'date', 'id'=> 'date','class'=>'form-control', 'required'=>'true','value'=>date('Y-m-d'));
                                            echo form_input($data); 
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group my-15">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="control-label">Blood Pressure (mmHg)</label>
                                        <?php 
                                            $data = array('name' => 'blood_pressure', 'id'=> 'blood_pressure', 'placeholder'=>'Blood Pressure', 'class'=>'form-control', 'required'=>'true');
                                            echo form_input($data); 
                                        ?>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label">Blood Sugar(RBS/FBS/PPBS)(mg/dl)</label>
                                        <?php 
                                            $data = array('name' => 'blood_sugar', 'id'=> 'blood_sugar', 'placeholder'=>'Blood Sugar', 'class'=>'form-control', 'required'=>'true');
                                            echo form_input($data); 
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group my-15">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="control-label">SPO2</label>
                                        <?php 
                                            $data = array('name' => 'spo2', 'id'=> 'spo2', 'placeholder'=>'SPO2', 'class'=>'form-control', 'required'=>'true');
                                            echo form_input($data); 
                                        ?>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label">Pulse</label>
                                        <?php 
                                            $data = array('name' => 'pulse', 'id'=> 'pulse', 'placeholder'=>'Pulse', 'class'=>'form-control', 'required'=>'true');
                                            echo form_input($data); 
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group my-15">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="control-label">Body Temperature</label>
                                        <?php 
                                            $data = array('name' => 'temperature', 'id'=> 'temperature', 'placeholder'=>'Body Temperature', 'class'=>'form-control', 'required'=>'true');
                                            echo form_input($data); 
                                        ?>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label">Height</label>
                                        <?php 
                                            $data = array('name' => 'height', 'id'=> 'height', 'placeholder'=>'Height', 'class'=>'form-control', 'required'=>'true');
                                            echo form_input($data); 
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group my-15">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="control-label">Weight</label>
                                        <?php 
                                            $data = array('name' => 'weight', 'id'=> 'weight', 'placeholder'=>'Weight', 'class'=>'form-control', 'required'=>'true');
                                            echo form_input($data); 
                                        ?>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label">BMI</label>
                                        <?php 
                                            $data = array('name' => 'bmi', 'id'=> 'bmi', 'placeholder'=>'BMI', 'class'=>'form-control', 'required'=>'true');
                                            echo form_input($data); 
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group my-15">
                                <div class="row">
                                    <div class="col-md-12 my-5">
                                        <div class="radio-inline">
                                            <label><input type="radio" name="body_type" value="Normal" required>Normal</label>
                                        </div>
                                        <div class="radio-inline">
                                            <label><input type="radio" name="body_type" value="Obese Class I">Obese Class I</label>
                                        </div>
                                        <div class="radio-inline">
                                            <label><input type="radio" name="body_type" value="Obese Class II">Obese Class II</label>
                                        </div>
                                        <div class="radio-inline">
                                            <label><input type="radio" name="body_type" value="Obese Class III">Obese Class III</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group my-15">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="control-label">ECG(2 Times in a Year)</label>
                                        <?php 
                                            $data = array('name' => 'ecg', 'id'=> 'ecg', 'placeholder'=>'ECG(2 Times in a Year)', 'class'=>'form-control');
                                            echo form_input($data); 
                                        ?>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label">Eye Screening(Once a Year)</label>
                                        <?php 
                                            $data = array('name' => 'eye_screening', 'id'=> 'eye_screening', 'placeholder'=>'Eye Screening', 'class'=>'form-control');
                                            echo form_input($data); 
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group my-15">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="control-label">Other Screening</label>
                                        <?php 
                                            $data = array('name' => 'other_screening', 'id'=> 'other_screening', 'placeholder'=>'Other Screening', 'class'=>'form-control');
                                            echo form_input($data); 
                                        ?>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label">Doctor Consultation(2 Times in a Year)</label>
                                        <?php 
                                            $data = array('name' => 'doctor_consultation', 'id'=> 'doctor_consultation', 'placeholder'=>'Doctor Consultation(2 Times in a Year)', 'class'=>'form-control');
                                            echo form_input($data); 
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group my-15">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="control-label">Home Blood Sample Collection</label>
                                        <?php 
                                            $data = array('name' => 'blood_sample', 'id'=> 'blood_sample', 'placeholder'=>'Home Blood Sample Collection', 'class'=>'form-control');
                                            echo form_input($data); 
                                        ?>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label">Advise</label>
                                        <?php 
                                            $data = array('name' => 'advise', 'id'=> 'advise', 'placeholder'=>'Advise', 'class'=>'form-control');
                                            echo form_input($data); 
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group my-15">
                                <input type="hidden" name="user_id" value="<?= $member['id']; ?>">
                                <button type="submit" name="savecheckup" class="btn btn-sm btn-success">Save Checkup</button>
                                <a href="<?= base_url('patientlist/'); ?>" class="btn btn-sm btn-danger">Cancel</a>
                            </div>
                        </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>

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