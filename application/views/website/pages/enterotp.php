 
        <section class="affordable-homes" style="background:#ffffff;">
            <div class="container"> 
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <br><br>
                        <?= form_open('verifyotp/','class="account-form"'); ?>
                            <fieldset>
                                <h3 class="text-center">Enter OTP</h3>
                                <div class="form-group pos_rel">
                                    <label for="">OTP</label>
                                    <input id="otp" name="otp" type="password" placeholder="OTP" class="form-control lgn_input" autocomplete="off" required value="<?= $this->uri->segment(2); ?>">
                                </div>
                                <div class="text-center text-danger"><?= $this->session->flashdata('log_err'); ?></div>
                                <button class="btn btn-success" type="submit" name="verifyotp">Verify OTP</button>
                            </fieldset>
                        <?= form_close(); ?>
                        <br><br>
                    </div>
                </div>
            </div>
        </section>