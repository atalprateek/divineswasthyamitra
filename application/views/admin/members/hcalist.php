

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
                                                        <th>District</th>
                                                        <th>Referral Code</th>
                                                        <th>Status</th>
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
                                                        <td><?php echo $member['district']; ?></td>
                                                        <td><?php echo $member['referral_code']; ?></td>
                                                        <?php
                                                                if($member['status']==1){
                                                        ?>
                                                        <td>
                                                            <span class="text-success">Member Active</span>
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-sm btn-danger deactivate" value="<?php echo $member['id']; ?>" data-status="3">De-Activate Member</button>
                                                        </td>
                                                        <?php
                                                                }elseif($member['status']==3){
                                                        ?>
                                                        <td>
                                                            <span class="text-danger">Member Deactived</span>
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-sm btn-success activate" value="<?php echo $member['id']; ?>" data-status="1">Activate Member</button>
                                                        </td>                                            
                                                        <?php
                                                                }
                                                        ?>
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
<script>
	$(document).ready(function(e) {
        $('#table').dataTable();
        $('body').on('click','.deactivate',function(){
            var id=$(this).val();
            var status=$(this).data('status');
            $this=$(this);
            $.ajax({
                type:"POST",
                url:"<?php echo admin_url("members/changememberstatus"); ?>",
                data:{id:id,status:status},
                success:function(data){
                    $this.addClass('btn-success activate').removeClass('btn-danger deactivate').text('Activate Member');
                    $this.data('status',1);
                    let $span=$this.closest('td').prev().find('span');
                    $span.text('Member Deactived').removeClass('text-success').addClass('text-danger');
                }
            });
        });
        $('body').on('click','.activate',function(){
            var id=$(this).val();
            var status=$(this).data('status');
            $this=$(this);
            $.ajax({
                type:"POST",
                url:"<?php echo admin_url("members/changememberstatus"); ?>",
                data:{id:id,status:status},
                success:function(data){
                    $this.removeClass('btn-success activate').addClass('btn-danger deactivate').text('De-Activate Member');
                    $this.data('status',3);
                    let $span=$this.closest('td').prev().find('span');
                    $span.text('Member Active').removeClass('text-danger').addClass('text-success');
                }
            });
        });
    });
    function validate(){
        var check=confirm("Are you sure you want to delete this entry?");
        return check;
    }
</script>