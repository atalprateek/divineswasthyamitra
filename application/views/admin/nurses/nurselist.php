

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
                                                        <th>Password</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        if(is_array($nurses)){ 
                                                            if(isset($offset)){$slno=$offset;}else{$slno=0;}
                                                            foreach($nurses as $nurse){
                                                    ?>
                                                    <tr>
                                                        <td><?php echo ++$slno; ?></td>
                                                        <td><?php echo $nurse['name']; ?></td>
                                                        <td><?php echo $nurse['mobile']; ?></td>
                                                        <td><?php echo $nurse['email']; ?></td>
                                                        <td><?php echo $nurse['district']; ?></td>
                                                        <td>
                                                            <a href="#" onClick="$(this).hide();$(this).parent().find('span').removeClass('hidden'); return false;">
                                                                View Password
                                                            </a>
                                                            <span class="hidden"><?php echo $nurse['vp']; ?></span>
                                                            <span class="hidden text-danger" 
                                                                onClick="$(this).parent().find('span').addClass('hidden');$(this).parent().find('a').show();">
                                                                <i class="fa fa-times"></i>
                                                            </span>
                                                        </td>
                                                        <?php
                                                                if($nurse['status']==1){
                                                        ?>
                                                        <td>
                                                            <span class="text-success">Nurse Active</span>
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-sm btn-danger deactivate" value="<?php echo $nurse['id']; ?>" data-status="3">De-Activate Nurse</button>
                                                        </td>
                                                        <?php
                                                                }elseif($nurse['status']==3){
                                                        ?>
                                                        <td>
                                                            <span class="text-danger">Nurse Deactived</span>
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-sm btn-success activate" value="<?php echo $nurse['id']; ?>" data-status="1">Activate Nurse</button>
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
                url:"<?php echo admin_url("nurses/changenursestatus"); ?>",
                data:{id:id,status:status},
                success:function(data){
                    $this.addClass('btn-success activate').removeClass('btn-danger deactivate').text('Activate nurse');
                    $this.data('status',1);
                    let $span=$this.closest('td').prev().find('span');
                    $span.text('Nurse Deactived').removeClass('text-success').addClass('text-danger');
                }
            });
        });
        $('body').on('click','.activate',function(){
            var id=$(this).val();
            var status=$(this).data('status');
            $this=$(this);
            $.ajax({
                type:"POST",
                url:"<?php echo admin_url("nurses/changenursestatus"); ?>",
                data:{id:id,status:status},
                success:function(data){
                    $this.removeClass('btn-success activate').addClass('btn-danger deactivate').text('De-Activate Nurse');
                    $this.data('status',3);
                    let $span=$this.closest('td').prev().find('span');
                    $span.text('Nurse Active').removeClass('text-danger').addClass('text-success');
                }
            });
        });
    });
    function validate(){
        var check=confirm("Are you sure you want to delete this entry?");
        return check;
    }
</script>