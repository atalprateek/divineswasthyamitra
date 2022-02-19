  
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
                    
                        <div class="row">
                            <div class="col-12">
                            <div class="text-center text-success"><?= $this->session->flashdata('msg'); ?></div>
                            <div class="text-center text-danger"><?= $this->session->flashdata('err_msg'); ?></div>
                                <div class="h4">Personal Details</div>
                                <?= form_open('profile/updateprofile/','id="update-form"'); ?>
                                    <div class="form-group pos_rel">
                                        <input id="name" name="name" type="text" placeholder="Full name" class="form-control lgn_input" required autocomplete="off" pattern="[A-Za-z ]+" title="Only alphabets are allowed" value="<?= $user['name']; ?>" readonly>
                                        <i class="uil uil-user-circle lgn_icon"></i> 
                                    </div>
                                    <div class="form-group pos_rel">
                                        <input id="mobile" name="mobile" type="text" placeholder="Mobile Number" class="form-control lgn_input" required autocomplete="off" maxlength="10"  pattern="^\d{10}$" title="Enter Valid 10-digit mobile number" value="<?= $user['mobile']; ?>" readonly>
                                        <i class="uil uil-mobile-android-alt lgn_icon"></i> 
                                    </div>
                                    <div class="form-group pos_rel">
                                        <input id="email" name="email" type="email" placeholder="Email Address (Optional)" class="form-control lgn_input" autocomplete="off" value="<?= $user['email']; ?>" readonly>
                                        <i class="uil uil-envelope lgn_icon"></i> 
                                    </div>
                                    <button class="login-btn hover-btn d-none btn-success update-btn" type="submit" name="updateprofile">Update</button>
                                    <button class="btn btn-primary login-btn hover-btn update-btn" type="button" onClick="$('#update-form input').removeAttr('readonly'); $('.update-btn').toggleClass('d-none');">Edit</button>
                                <?= form_close(); ?>
                            </div>
                        </div><hr>
                        <div class="row">
                            <div class="col-12">
                                <div class="h4">Change Password</div>
                                <?= form_open('profile/updatepassword/','id="password-form" onSubmit="return validatepassword()"'); ?>
                                    <div class="form-group pos_rel">
                                        <input id="password" name="password" type="password" placeholder="Enter Password" class="form-control lgn_input" required autocomplete="off">
                                        <i class="uil uil-lock lgn_icon"></i> 
                                    </div>
                                    <div class="form-group pos_rel">
                                        <input id="reenter" name="reenter" type="password" placeholder="Re-Enter Password" class="form-control lgn_input" required autocomplete="off">
                                        <i class="uil uil-lock lgn_icon"></i> 
                                    </div>
                                    <button class="login-btn btn-success hover-btn" type="submit" name="updatepassword">Update</button>
                                <?= form_close(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script>

            function validatepassword(){
                var password=$('#password').val();
                var reenter=$('#reenter').val();
                if(password!=reenter){
                   alert("Password Do not Match!");
                    return false;
                }
            }
        </script>
        