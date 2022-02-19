
        <img src="<?= file_url('assets/images/join us-banner.png'); ?>" width="100%">  
        <section class="affordable-homes" style="background:#ffffff;">
            <div class="container"> 
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <?= form_open('savejoinus/','class="join-us-form"'); ?>
                            <div class="text-center text-success"><?= $this->session->flashdata('msg'); ?></div>
                            <div class="text-center text-danger"><?= $this->session->flashdata('err_msg'); ?></div>
                            <h4>Enter Your Details</h4>
                            <div class="form-group pos_rel">
                                <input id="name" name="name" type="text" placeholder="Full name" class="form-control lgn_input" required autocomplete="off" pattern="[A-Za-z ]+" title="Only alphabets are allowed">
                                <i class="uil uil-user-circle lgn_icon"></i> 
                            </div>
                            <div class="form-group pos_rel">
                                <input id="mobile" name="mobile" type="text" placeholder="Mobile Number" class="form-control lgn_input" required autocomplete="off" maxlength="10"  pattern="^\d{10}$" title="Enter Valid 10-digit mobile number">
                                <i class="uil uil-mobile-android-alt lgn_icon"></i> 
                            </div>
                            <div class="form-group pos_rel">
                                <input id="email" name="email" type="email" placeholder="Email Address" class="form-control lgn_input" autocomplete="off" required>
                                <i class="uil uil-envelope lgn_icon"></i> 
                            </div>
                            <button class="btn btn-success" type="submit" name="savejoinus">Save </button>
                        <?= form_close(); ?>
                    </div>

                </div>
            </div>
        </section>