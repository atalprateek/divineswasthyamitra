

    <div class="my-10">
        <div class="container">
            <div class="row mb-10">
            	<div class="col-md-12 mb-10">
                    <div class="py-15 background-white">
                        <div class="row">
                            <div class="col-md-6 py-10 my-5">
                                <div class="lead my-15">My Profile</div>
                                <table class="profile mb-10">
                                	<tr>
                                        <td>Name</td>
                                        <td><?php echo $member['name']; ?></td>
                                    </tr>
                                	<tr>
                                        <td>Mobile</td>
                                        <td><?php echo $member['mobile']; ?></td>
                                    </tr>
                                	<tr>
                                        <td>Email</td>
                                        <td><?php echo $member['email']; ?></td>
                                    </tr>
                                	<tr>
                                        <td>Aadhar</td>
                                        <td><?php echo $member['aadhar']; ?></td>
                                    </tr>
                                	<tr>
                                        <td>Gender</td>
                                        <td><?php echo $member['gender']; ?></td>
                                    </tr>
                                	<tr>
                                        <td>Age</td>
                                        <td><?php echo $member['age']; ?></td>
                                    </tr>
                                	<tr>
                                        <td>Address</td>
                                        <td><?php echo $member['address']; ?></td>
                                    </tr>
                                	<tr>
                                        <td>District</td>
                                        <td><?php echo $member['district']; ?></td>
                                    </tr>
                                	<tr>
                                        <td>State</td>
                                        <td><?php echo $member['state']; ?></td>
                                    </tr>
                                    <?php
                                        if($this->session->role=='hca'){
                                    ?>
                                	<tr>
                                        <td>Referral Code</td>
                                        <td><?php echo $member['referral_code']; ?></td>
                                    </tr>
                                	<tr>
                                        <td>Ward/Panchayat</td>
                                        <td>
											<?php 
												$w=array();
												if(is_array($wards)){
													foreach($wards as $ward){
														$w[]=$ward['ward'];
													}
												}
												echo implode(', ',$w);
											?>
                                        </td>
                                    </tr>
                                    <?php
                                        }
                                        if($this->session->role=='member'){
                                    ?>
                                	<tr>
                                        <td>Ward/Panchayat</td>
                                        <td>
											<?php 
												echo $ward['ward'];
											?>
                                        </td>
                                    </tr>
                                	<tr>
                                        <td>Card No</td>
                                        <td><?php echo $member['card_no']; ?></td>
                                    </tr>
                                    <?php
                                        }
                                        if($member['name']!='' && $this->session->role=='member'){
                                    ?>
                                	<tr>
                                        <td>Membership Status</td>
                                        <td>
											<?php if($this->session->paid==0){ echo "Free Registration"; }
                                            else{ echo "Paid Member"; } ?>
										</td>
                                    </tr>
                                    <?php
                                        }
                                    ?>
                                </table>
                                <?php
                                if($this->session->role!='nurse'){
                                ?>
                                <a href="<?php echo base_url('profile/editprofile/'); ?>" class="btn btn-sm btn-info">
                                    <?php
                                        if($member['name']==''){echo "Complete Profile";}
                                        else{ echo "Edit Profile"; }
                                    ?>
                                </a>
                                <?php
                                }
                                    if($member['name']!='' && $this->session->role=='member' && $this->session->paid==0){
                                ?>
                                <a href="<?php echo base_url('profile/makepayment/');?>" class="btn btn-sm btn-primary">Make Payment</a>
                                <?php
                                    }
                                    if($this->session->role=='member' && $this->session->paid==1 && $member['card_no']!=''){
                                ?>
                                <a href="<?php echo base_url('profile/certificate/');?>" class="btn btn-sm btn-danger">Print Certificate</a>
                                <?php
										if($member['cardfile']!==NULL){
                                ?>
                                <a href="<?php echo file_url($member['cardfile']);?>" class="btn btn-sm btn-warning" download >Download Card</a>
                                <?php
										}
                                    }
                                ?>
                            </div>
                            <?php
								if($this->session->role=='hca'){
							?>
                            <div class="col-md-6 py-10 my-5">
                                <div class="lead my-15">Members</div>
                                <table class="profile">
									<?php
                                        if(isset($members)){
									?>
                                	<tr>
                                        <td width="60%">Total Paid Members</td>
                                        <td><?php echo $members['paid_members']; ?></td>
                                    </tr>
                                	<tr>
                                        <td>Total Free Members</td>
                                        <td><?php echo $members['free_members']; ?></td>
                                    </tr>
                                    <?php
                                        }
                                    ?>
                              	</table>
                                <a href="<?php echo base_url('profile/memberlist/'); ?>" class="btn btn-sm btn-danger">View Members</a>
                            </div>
                            <?php
								}
                                elseif($this->session->role=='nurse'){
							?>
                            <div class="col-md-6 py-10 my-5">
                                <div class="lead my-15">Patients</div>
                                <table class="profile">
									<?php
                                        if(isset($patients)){
									?>
                                	<tr>
                                        <td width="60%">Total Paid Members</td>
                                        <td><?php echo $patients['paid_members']; ?></td>
                                    </tr>
                                	<tr>
                                        <td>Total Free Members</td>
                                        <td><?php echo $patients['free_members']; ?></td>
                                    </tr>
                                    <?php
                                        }
                                    ?>
                              	</table>
                                <a href="<?php echo base_url('patientlist/'); ?>" class="btn btn-sm btn-danger">View Patients</a>
                            </div>
                            <?php
								}
							?>
                        </div>
            		</div>
            	</div>
            </div>
            <?php
            	if(isset($offers) && !empty($offers)){
			?>
            <div class="row">
            	<div class="col-md-12">
                    <div class="py-15 background-white">
                        <div class="row">
                            <div class="col-md-6">
                            <div class="lead margin-bottom-20px margin-top-20px">Discount Offers</div>
                            <ul>
                                <?php
                                    foreach($offers as $offer){
                                ?>
                                <li><?php echo $offer['offer']; ?></li>
                                <?php
                                    }
                                ?>
                            </ul>
                      	</div>
                    </div>
                </div>
          	</div>
            <?php
				}
			?>
        </div>
    </div>

