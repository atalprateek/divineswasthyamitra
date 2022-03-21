

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
                                                            <a href="<?= admin_url('reports/details/'.$member['id']); ?>" class="btn btn-sm btn-info">View Report</a>
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