<?php
$itemInfo['price']=1499;
$itemInfo['name']=$member['name'];
$itemInfo['image']='';
$productinfo = PROJECT_NAME.' Membership'; //$itemInfo['description'];
$txnid = time();
$surl = base_url("profile/success/");
$furl = base_url("profile/success/");
$key_id = RAZOR_KEY_ID;
$currency_code = 'INR';
$total = ($itemInfo['price']* 100); 
$amount = $itemInfo['price'];
$merchant_order_id = strtoupper(random_string('alpha', 4)).random_string('numeric', 4);
$card_holder_name = $member['name'];
$email =  $member['email'];
$phone = $member['mobile'];
$name = PROJECT_NAME;
$return_url = site_url().'razorpay/callback';
?>

    <div class="my-15">
        <div class="container">
            <div class="row my-10 py-5">
            	<div class="col-12">
                	<?php echo form_open_multipart('profile/success','id="razorpay-form"'); ?>
                        <div class="padding-15px background-white">
                        	<div class="lead margin-bottom-20px">Make Payment</div>
                            <div class="form-group margin-bottom-20px">
                                <div class="row">
                                	<div class="col-md-3"></div>
                                    <div class="col-md-6">
                                        <label class="control-label">Name</label>
                                        <?php 
                                            $data = array('name' => 'name', 'id'=> 'name', 'placeholder'=>'Name', 'class'=>'form-control', 'required'=>'true','value'=>$member['name']);
                                            if($data['value']!=''){$data['readonly']="true";}
                                            echo form_input($data); 
                                        ?>
                                    </div>
                           		</div>
                            </div>
                            <div class="form-group margin-bottom-20px">
                                <div class="row">
                                	<div class="col-md-3"></div>
                                    <div class="col-md-6">
                                        <label class="control-label">Mobile</label>
                                        <?php 
                                            $data = array('name' => 'mobile', 'id'=> 'mobile', 'placeholder'=>'Mobile', 'class'=>'form-control', 'required'=>'true','value'=>$member['mobile']);
                                            if($data['value']!=''){$data['readonly']="true";}
                                            echo form_input($data); 
                                        ?>
                                    </div>
                           		</div>
                            </div>
                            <div class="form-group margin-bottom-20px">
                                <div class="row">
                                	<div class="col-md-3"></div>
                                    <div class="col-md-6">
                                        <label class="control-label">Email</label>
                                        <?php 
                                            $data = array('type' => 'email', 'name' => 'email', 'id'=> 'email', 'placeholder'=>'Email', 'class'=>'form-control', 'required'=>'true','value'=>$member['email']);
                                            if($data['value']!=''){$data['readonly']="true";}
                                            echo form_input($data); 
                                        ?>
                                    </div>
                           		</div>
                            </div>
                            <div class="form-group margin-bottom-20px">
                                <div class="row">
                                	<div class="col-md-3"></div>
                                    <div class="col-md-6">
                                        <label class="control-label">Amount</label>
                                        <?php 
                                            $data = array('name' => 'amount', 'id'=> 'amount', 'placeholder'=>'Amount', 'class'=>'form-control', 'required'=>'true','value'=>'1499','readonly'=>true);
                                            if($data['value']!=''){$data['readonly']="true";}
                                            echo form_input($data); 
                                        ?>
                                    </div>
                           		</div>
                            </div>
                            <div class="form-group margin-bottom-20px">
                                <div class="row">
                                	<div class="col-md-3"></div>
                                    <div class="col-md-6">
                                        <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id" />
                                        <input type="hidden" name="merchant_order_id" id="merchant_order_id" value="<?php echo $merchant_order_id; ?>"/>
                                        <input type="hidden" name="merchant_trans_id" id="merchant_trans_id" value="<?php echo $txnid; ?>"/>
                                        <input type="hidden" name="merchant_product_info_id" id="merchant_product_info_id" value="<?php echo $productinfo; ?>"/>
                                        <input type="hidden" name="merchant_surl_id" id="merchant_surl_id" value="<?php echo $surl; ?>"/>
                                        <input type="hidden" name="merchant_furl_id" id="merchant_furl_id" value="<?php echo $furl; ?>"/>
                                        <input type="hidden" name="card_holder_name_id" id="card_holder_name_id" value="<?php echo $card_holder_name; ?>"/>
                                        <input type="hidden" name="merchant_total" id="merchant_total" value="<?php echo $total; ?>"/>
                                        <input type="hidden" name="merchant_amount" id="merchant_amount" value="<?php echo $amount; ?>"/>
                                        <input type="hidden" name="order_id" id="order_id" value="<?php echo $merchant_order_id; ?>">
                                        <input type="hidden" name="user_id" id="user_id" value="<?php echo $this->session->userdata('user'); ?>">
                                        <!--<button type="submit" class="btn btn-sm btn-success">Make Payment</button>-->
                                        <input  id="submit-pay" type="button" onclick="razorpaySubmit(this);" value="Pay Now" class="btn btn-sm btn-success" />
                                    </div>
                               	</div>
                            </div>
                       	</div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
  var razorpay_options = {
    key: "<?php echo $key_id; ?>",
    amount: "<?php echo $total; ?>",
    name: "<?php echo $name; ?>",
    description: "Order # <?php echo $merchant_order_id; ?>",
    netbanking: true,
    currency: "<?php echo $currency_code; ?>",
    prefill: {
      name:"<?php echo $card_holder_name; ?>",
      email: "<?php echo $email; ?>",
      contact: "<?php echo $phone; ?>"
    },
    notes: {
      soolegal_order_id: "<?php echo $merchant_order_id; ?>",
    },
    handler: function (transaction) {
        document.getElementById('razorpay_payment_id').value = transaction.razorpay_payment_id;
        document.getElementById('razorpay-form').submit();
    },
    "modal": {
        "ondismiss": function(){
            location.reload()
        }
    }
  };
  var razorpay_submit_btn, razorpay_instance;

  function razorpaySubmit(el){
    if(typeof Razorpay == 'undefined'){
      setTimeout(razorpaySubmit, 200);
      if(!razorpay_submit_btn && el){
        razorpay_submit_btn = el;
        el.disabled = true;
        el.value = 'Please wait...';  
      }
    } else {
      if(!razorpay_instance){
        razorpay_instance = new Razorpay(razorpay_options);
        if(razorpay_submit_btn){
          razorpay_submit_btn.disabled = false;
          razorpay_submit_btn.value = "Pay Now";
        }
      }
      razorpay_instance.open();
    }
  }  
</script>
