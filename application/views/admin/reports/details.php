

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
                                                        <th>Date</th>
                                                        <th>Blood Pressure</th>
                                                        <th>Sugar</th>
                                                        <th>SPO2</th>
                                                        <th>Pulse</th>
                                                        <th>Temperatue</th>
                                                        <th>BMI</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        if(is_array($checkups)){ 
                                                            if(isset($offset)){$slno=$offset;}else{$slno=0;}
                                                            foreach($checkups as $checkup){
                                                    ?>
                                                    <tr>
                                                        <td><?php echo ++$slno; ?></td>
                                                        <td><?php echo date('d-m-Y',strtotime($checkup['date'])); ?></td>
                                                        <td><?php echo $checkup['blood_pressure']; ?></td>
                                                        <td><?php echo $checkup['blood_sugar']; ?></td>
                                                        <td><?php echo $checkup['spo2']; ?></td>
                                                        <td><?php echo $checkup['pulse']; ?></td>
                                                        <td><?php echo $checkup['temperature']; ?></td>
                                                        <td><?php echo $checkup['bmi']; ?></td>
                                                    </tr>
                                                    <?php
                                                            }
                                                        }
                                                    ?>
                                                </tbody>
                                            </table>
                                            <a href="<?= admin_url('reports/'); ?>" class="btn btn-danger btn-sm">Back</a>
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