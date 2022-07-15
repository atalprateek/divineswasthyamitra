

<div class="pcoded-inner-content">
    <div class="main-body">
        <div class="page-wrapper">
            <div class="page-body">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h5><?= $title; ?></h5>
                            </div>
                            <div class="card-block">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table table-striped" id="table">
                                                <thead>
                                                    <tr>
                                                        <th>Sl No</th>
                                                        <th>Name</th>
                                                        <th>Contact No</th>
                                                        <th>Email</th>
                                                        <th>Card No</th>
                                                        <th>Password</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        if(is_array($members)){ 
                                                            if(isset($offset)){$slno=$offset;}else{$slno=0;}
                                                            foreach($members as $member){
                                                    ?>
                                                    <tr>
                                                        <td><?php echo ++$slno; ?></td>
                                                        <td><?php echo $member['name']; ?></td>
                                                        <td><?php echo $member['mobile']; ?></td>
                                                        <td><?php echo $member['email']; ?></td>
                                                        <td><?php echo $member['card_no']; ?></td>
                                                        <td>
                                                            <a href="#" onClick="$(this).hide();$(this).parent().find('span').removeClass('hidden'); return false;">
                                                                View Password
                                                            </a>
                                                            <span class="hidden"><?php echo $member['vp']; ?></span>
                                                            <span class="hidden text-danger" 
                                                                onClick="$(this).parent().find('span').addClass('hidden');$(this).parent().find('a').show();">
                                                                <i class="fa fa-times"></i>
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <?php
                                                                if($member['paid']==0){
                                                            ?>
                                                            <form action="<?php echo admin_url("members/activatemember"); ?>" method="post" onSubmit="return approval();">
                                                                <button type="submit" class="btn btn-sm btn-success mb-2" name="user_id" value="<?php echo $member['id']; ?>">
                                                                    Approve Payment
                                                                </button>
                                                            </form>
                                                            <?php
                                                                }
                                                                $text="Add Card No";
                                                                if(!empty($member['card_no'])){
                                                            ?>
                                                            <a href="<?= file_url($member['cardfile']); ?>" class="mb-2 btn btn-sm btn-info" download>Download Card</div></a>
                                                            <?php
                                                                    $text="Update Card No / Nurse";
                                                                }
                                                            ?>
                                                            <a href="#" data-toggle="modal" data-value="<?php echo $member['id']; ?>" data-target="#addcardno" class="mb-2 btn btn-sm btn-warning addcard"><?= $text; ?></div></a>
                                                            <?php
                                                                if($member['paid']==0){
                                                            ?>
                                                            <button type="button" class="btn btn-sm btn-danger mb-2 delete" value="<?php echo $member['id']; ?>">Delete</button>
                                                            <?php
                                                                }
                                                            ?>
                                                        </td>     
                                                    </tr>
                                                    <?php
                                                            }
                                                        }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="addcardno" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addcardnoModalLabel">Add Card No</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
            </div>
            <div class="modal-body">
                <?php echo form_open('admin/members/addcardno','class="full-width" '); ?>
                    <div class="form-group margin-bottom-20px">
                        <label><i class="far fa-list-alt margin-right-10px"></i> Name</label>
                        <?php 
                            $data = array('name' => '', 'id'=> 'mem_name', 'placeholder'=>'Name', 'class'=>'form-control form-control-sm', 'readonly'=>'true');
                            echo form_input($data); 
                        ?>
                    </div>
                    <div class="form-group margin-bottom-20px">
                        <label><i class="fa fa-user-nurse margin-right-10px"></i> Nurse</label>
                        <?php
                            echo form_dropdown('nurse_id', $nurses, '',array('id'=>'nurse_id','class'=>'form-control'));
                        ?>
                    </div>
                    <div class="form-group margin-bottom-20px">
                        <label><i class="far fa-list-alt margin-right-10px"></i> Card No.</label>
                        <?php 
                            $data = array('name' => 'card_no', 'id'=> 'card_no', 'placeholder'=>'Card No.', 
                                          'class'=>'form-control form-control-sm', 'required'=>'true','maxlength'=>12,
                                          'pattern'=>'[\d]{12}','title'=>'Enter 12 Digit Card Number');
                            echo form_input($data); 
                        ?>
                    </div>
                    <div class="form-group margin-bottom-20px">
                        <label><i class="far fa-list-alt margin-right-10px"></i> Issue Date</label>
                        <?php 
                            $data = array('type' => 'date', 'name' => 'issue_date', 'id'=> 'issue_date', 'class'=>'form-control form-control-sm', 'required'=>'true');
                            echo form_input($data); 
                        ?>
                    </div>
                    <div class="form-group margin-bottom-20px">
                        <?php 
                            $data = array('type' => 'hidden', 'name' => 'user_id', 'id'=> 'user_id');
                            echo form_input($data); 
                        ?>
                        <input type="submit" name="addcardno" value="Add Card No" class="btn btn-sm btn-info">
                        <button class="btn btn-sm btn-danger" type="button" data-dismiss="modal">Cancel</button>
                    </div>
                <?php
                    echo form_close();
                ?>
            </div>
        </div>
    </div>
</div>
<script>
	$(document).ready(function(e) {
        $('#table').dataTable();
        $('body').on('click','.addcard',function(){
            var id=$(this).attr('data-value');
            $.ajax({
                type:"POST",
                url:"<?php echo admin_url('members/getmember'); ?>",
                data:{id:id},
                success: function(data){
                    data=JSON.parse(data);
                    $('#mem_name').val(data['name']);
                    $('#card_no').val(data['card_no']);
                    $('#issue_date').val(data['issue_date']);
                    $('#nurse_id').val(data['nurse_id']);
                    $('#user_id').val(data['id']);
                }
            });
        });
        $('body').on('click','.delete',function(){
            if(confirm("Confirm Delete this member?")){
                var id=$(this).val();
                $.ajax({
                    type:"POST",
                    url:"<?php echo admin_url("members/deletemember/"); ?>",
                    data:{id:id,deletemember:'deletemember'},
                    success: function(data){
                        window.location.reload();
                    }
                });
            }
        });
    });
    function validate(){
        var check=confirm("Are you sure you want to delete this entry?");
        return check;
    }
</script>