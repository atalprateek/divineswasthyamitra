
        <!-- Modal For Login -->
        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <button type="button" class="close float-right" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" id="pills-login-tab" data-toggle="pill" href="#pills-login" role="tab" aria-controls="pills-login" aria-selected="true">Sign In</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="pills-signup-tab" data-toggle="pill" href="#pills-signup" role="tab" aria-controls="pills-signup" aria-selected="false">Sign Up</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="pills-login-tab">
                                        <?= form_open('validatelogin/','id="login-form" onSubmit="return validatelogin();"'); ?>
                                            <div class="input-container">
                                                <i class="fa fa-mobile icon"></i>
                                                <input class="form-control" type="text" placeholder="Mobile" name="mobile" id="login-mobile" pattern="^\d{10}$" title="Please Enter 10 Digit Mobile Number">
                                            </div>
                                            <div class="input-container">
                                                <i class="fa fa-key icon"></i>
                                                <input class="form-control" type="password" placeholder="Password" name="password" id="login-password">
                                            </div>
                                            <div class="text-center text-danger my-2" id="login-error"></div>
                                            <button type="submit" class="btn btn-block btn-success">Sign In</button>
                                        <?= form_close() ?>
                                    </div>
                                    <div class="tab-pane fade" id="pills-signup" role="tabpanel" aria-labelledby="pills-signup-tab">
                                        <?= form_open('register/','id="register-form" onSubmit="return validateregister();"'); ?>
                                            <div class="input-container">
                                                <i class="fa fa-user icon"></i>
                                                <input class="form-control" type="text" placeholder="Name" name="name" id="signup-name" required>
                                            </div>
                                            <div class="input-container">
                                                <i class="fa fa-mobile icon"></i>
                                                <input class="form-control" type="text" placeholder="Mobile" name="mobile" id="signup-mobile" pattern="^\d{10}$" title="Please Enter 10 Digit Mobile Number" required>
                                            </div>
                                            <div class="input-container">
                                                <i class="fa fa-envelope icon"></i>
                                                <input id="email" name="email" type="email" placeholder="Email Address" class="form-control lgn_input" autocomplete="off" required>
                                            </div>
                                            <div class="input-container">
                                                <i class="fa fa-key icon"></i>
                                                <input class="form-control" type="password" placeholder="Password" name="password" id="signup-password" required>
                                            </div>
                                            <div class="input-container">
                                                <i class="fa fa-key icon"></i>
                                                <input class="form-control" type="password" placeholder="Repeat Password" name="repassword" id="signup-repassword" required>
                                            </div>
                                            <div class="text-center text-danger my-2" id="signup-error"></div>
                                            <button type="submit" class="btn btn-block btn-success">Sign Up</button>
                                        <?= form_close() ?> 
                                    </div>
                                </div>
                                <?= form_open('verifyotp/','id="otp-form" onSubmit="return validateotp();" class="d-none"'); ?>
                                    <div class="input-container">
                                        <i class="fa fa-key icon"></i>
                                        <input type="password" class="form-control" placeholder="Enter OTP" id="o-otp" name="otp" required>
                                    </div>
                                    <div class="text-center text-danger my-2" id="o-error"></div>
                                    <button type="submit" class="btn btn-block btn-success">Verify OTP</button>
                                <?= form_close(); ?>
                                <div class="row">
                                    <div class="col-12"><hr>
                                        <h5 class="text-center">OR</h5>
                                        <div class="google-div">
                                            <div class="g-signin2 not-signed" id="my-signin2" onclick="ClickLogin()" data-onsuccess="onGoogleSignIn"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>