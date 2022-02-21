 
        <section class="affordable-homes" style="background:#ffffff;">
            <div class="container"> 
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <br><br>
                        <?= form_open('validatelogin/','class="account-form"'); ?>
                            <fieldset>
                                <div class="text-center text-success"><?= $this->session->flashdata('msg'); ?></div>
                                <h3 class="text-center">Login</h3>
                                <div class="form-group pos_rel">
                                    <label for="">Email Or Mobile No</label>
                                    <input id="username" name="username" type="text" placeholder="Email Or Mobile No" class="form-control" required autocomplete="off"> 
                                </div>
                                <div class="form-group pos_rel">
                                    <label for="">Password</label>
                                    <input id="password" name="password" type="password" placeholder="Password" class="form-control lgn_input" autocomplete="off" required>
                                    <i class="uil uil-envelope lgn_icon"></i> 
                                </div>
                                <div class="text-center text-danger"><?= $this->session->flashdata('log_err'); ?></div>
                                <button class="btn btn-success" type="submit" name="login">Login</button>
                            </fieldset>
                        <?= form_close(); ?>
                        <br><br>
                    </div>
                </div>
            </div>
        </section>