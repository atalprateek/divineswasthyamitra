

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
                                    <div class="col-md-6">
                                        <?= form_open_multipart('admin/masterkey/addpackage/'); ?>
                                            <div class="form-group row hidden">
                                                <label class="col-sm-2 col-form-label">Package Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="name" id="name" value="Membership Plan" required>
                                                </div>
                                            </div>
                                            <div class="form-group row hidden">
                                                <label class="col-sm-2 col-form-label">Slug</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="slug" id="slug" value="membership-plan" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Amount</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="amount" id="amount" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Duration </label>
                                                <div class="col-sm-10">
                                                    <select name="duration" id="duration" class="form-control" required>
                                                        <option value="">Select Duration</option>
                                                        <option value="3">3 Months</option>
                                                        <option value="6">6 Months</option>
                                                        <option value="12">1 Year</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Plan Image</label>
                                                <div class="col-sm-10">
                                                    <input type="file" name="image" id="image" onChange="getPhoto(this)" required><br>
                                                    <small class="text-danger">Width : 1600px, Height : 800px (Recommended)</small>
                                                    <input type="hidden" name="id" id="id">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="status" class="col-sm-2 control-label">Status</label>
                                                <div class="col-sm-10">
                                                    <div class="radio-inline text-success">
                                                        <label>
                                                            <input type="radio" name="status" value="1" checked> Published
                                                        </label>
                                                    </div>
                                                    <div class="radio-inline text-danger">
                                                        <label>
                                                            <input type="radio" name="status" value="0">
                                                            Un-Published
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label"></label>
                                                <div class="col-sm-10">
                                                    <input type="submit" class="btn btn-success waves-effect waves-light" name="addpackage" value="Save Package">
                                                    <button type="button" class="btn btn-danger waves-effect waves-light cancel-btn hidden">Cancel</button>
                                                </div>
                                            </div>
                                        <?= form_close(); ?>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="table-responsive">
                                            <table class="table table-condensed" id="table">
                                                <thead>
                                                    <tr>
                                                        <th>Sl.No.</th>
                                                        <th>Plan Image</th>
                                                        <th>Amount</th>
                                                        <th>Duration</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                        if(is_array($packages) && !empty($packages)){$i=0;
                                                            foreach($packages as $package){ $i++;
                                                                $duration=0;
                                                                $year=$package['duration']/12;
                                                                $month=$package['duration']%12;
                                                                if($month==0 && $year>=1){
                                                                    $y=($year>1)?' Years':' Year';
                                                                    $duration=$year.$y;
                                                                }
                                                                elseif($month!=0 && $year>=1){
                                                                    $y=($year>1)?' Years ':' Year ';
                                                                    $m=($month>1)?' Months':' Month';
                                                                    $duration=$year.$y.$month.$m;
                                                                }
                                                                elseif($month!=0 && $year<1){
                                                                    $m=($month>1)?' Months':' Month';
                                                                    $duration=$month.$m;
                                                                }
                                                    ?>
                                                    <tr>
                                                        <td><?= $i; ?></td>
                                                        <td><img src="<?= file_url($package['image']); ?>" alt="<?= $package['name']; ?>" height="80"></td>
                                                        <td><?= '₹'.$package['amount']; ?></td>
                                                        <td><?= $duration; ?></td>
                                                        <td><button type="button" class="btn btn-xs btn-info edit-btn" value="<?= $package['id']; ?>"><i class="fa fa-edit"></i></button></td>
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
		$('#name').keyup(function(){
			//if($('#id').val()==''){
				var name=$(this).val();
				$.ajax({
					type:"POST",
					url:"<?= admin_url('masterkey/getslug/'); ?>",
					data:{name:name},
					success: function(data){
						$('#slug').val(data);
					}
				});
			//}
		});
        $('table').on('click','.edit-btn',function(){
            $('#parent_id option').show();
            $.ajax({
                type:"post",
                url:"<?= admin_url('masterkey/getpackage/'); ?>",
                data:{id:$(this).val()},
                success:function(data){
                    data=JSON.parse(data);
                    $('#name').val(data['name']);
                    $('#slug').val(data['slug']);
                    $('#amount').val(data['amount']);
                    $('#duration').val(data['duration']);
                    $('#id').val(data['id']);
                    $('.cancel-btn').removeClass('hidden');
                    $('#image').prop('required',false);
                    $('input[type="radio"][value="'+data['status']+'"]').prop('checked',true);
                    $('input[name="addpackage"]').attr('name','updatepackage').val('Update Package');
                    $('form').attr('action','<?= admin_url('masterkey/updatepackage/'); ?>');
                    $('#parent_id').find('option[value="'+data['id']+'"]').hide();
                }
            });
        });
        $('.cancel-btn').click(function(){
            $('#name,#slug,#amount,#duration,#id,#image').val('');
            $('#image').prop('required',true);
            $('.cancel-btn').addClass('hidden');
            $('input[name="updatepackage"]').attr('name','addpackage').val('Save Package');
            $('form').attr('action','<?= admin_url('masterkey/addpackage/'); ?>');
            $('#parent_id option').show();
        });
        $('#table').dataTable();
    });
function getPhoto(input){
    
}
</script>