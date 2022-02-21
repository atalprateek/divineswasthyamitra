 
        <section class="affordable-homes" style="background:#ffffff;">
            <div class="container"> 
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <br><br>
                        <?= form_open('register/','class="account-form" onSubmit="return validate()"'); ?>
                            <fieldset>
                                <h3 class="text-center">Sign Up</h3>
                                <div class="text-center text-danger"><?= $this->session->flashdata('reg_err'); ?></div>
                                <div class="form-group pos_rel">
                                    <label for="">Name</label>
                                    <input id="name" name="name" type="text" placeholder="Name" class="form-control" required autocomplete="off"> 
                                </div>
                                <div class="form-group pos_rel">
                                    <label for="">Email</label>
                                    <input id="email" name="email" type="email" placeholder="Email" class="form-control" required autocomplete="off"> 
                                    <div class="email-status"></div>
                                </div>
                                <div class="form-group pos_rel">
                                    <label for="">Mobile</label>
                                    <input class="form-control" type="text" placeholder="Mobile" name="mobile" id="mobile" pattern="^\d{10}$" title="Please Enter 10 Digit Mobile Number" required>
                                    <div class="mobile-status"></div>
                                </div>
                                <div class="form-group pos_rel">
                                    <label for="">Password</label>
                                    <input class="form-control" type="password" placeholder="Password" name="password" id="password" required> 
                                </div>
                                <div class="form-group pos_rel">
                                    <label for="">Re-Type Password</label>
                                    <input class="form-control" type="password" placeholder="Re-Type Password" name="retype" id="retype" required> 
                                </div>
                                <div class="form-group pos_rel">
                                    <label for="">Gender</label>
                                    <select name="gender" id="gender" class="form-control" required>
                                        <option value="">Select</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                                <div class="form-group pos_rel">
                                    <label for="">Referral Code</label>
                                    <input class="form-control" type="text" placeholder="Referral Code" name="refcode" id="refcode" required>
                                </div>
                                <button class="btn btn-success" type="submit" name="register" id="submitBtn">Sign Up</button>
                            </fieldset>
                        <?= form_close(); ?>
                        <br><br>
                    </div>
                </div>
            </div>
        </section>

        <script>
            $(document).ready(function(e) {
                $('body').on('keyup','#email',function(){
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
                    }
                });
                $('body').on('keyup','#mobile',function(){
                    var mobile=$(this).val();
                    $('.mobile-status').text('').removeClass('text-success').removeClass('text-danger');
                    var re = /[\d+]{10}/;
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
                    }
                });
            });
            function validate(){
                var pass=$('#password').val();
                var retype=$('#retype').val();
                if(pass!=retype){
                    alert('Passwords Do Not Match');
                    return false;
                }
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