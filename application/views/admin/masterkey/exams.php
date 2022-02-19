

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
                                        <?= form_open_multipart('admin/masterkey/addexam/'); ?>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Exam</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="name" id="name" required>
                                                </div>
                                            </div>
                                            <div class="form-group row hidden">
                                                <label class="col-sm-2 col-form-label">Slug</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="slug" id="slug" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Description</label>
                                                <div class="col-sm-10">
                                                    <textarea name="description" id="description" class="form-control" rows="3"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Image</label>
                                                <div class="col-sm-10">
                                                    <input type="file" name="image" id="image" onChange="getPhoto(this)">
                                                    <input type="hidden" name="id" id="id">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label"></label>
                                                <div class="col-sm-10">
                                                    <input type="submit" class="btn btn-success waves-effect waves-light" name="addexam" value="Save Exam">
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
                                                        <th>Image</th>
                                                        <th>Exam</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                        if(is_array($exams) && !empty($exams)){$i=0;
                                                            foreach($exams as $exam){ $i++;
                                                    ?>
                                                    <tr>
                                                        <td><?= $i; ?></td>
                                                        <td><img src="<?= file_url($exam['image']); ?>" alt="<?= $exam['name']; ?>" height="50"></td>
                                                        <td><?= $exam['name']; ?></td>
                                                        <td><button type="button" class="btn btn-xs btn-info edit-btn" value="<?= $exam['id']; ?>"><i class="fa fa-edit"></i></button></td>
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
                url:"<?= admin_url('masterkey/getexam/'); ?>",
                data:{id:$(this).val()},
                success:function(data){
                    data=JSON.parse(data);
                    $('#name').val(data['name']);
                    $('#slug').val(data['slug']);
                    if(data['parent_id']==0){ data['parent_id']=''; }
                    $('#parent_id').val(data['parent_id']);
                    $('#description').val(data['description']);
                    $('#id').val(data['id']);
                    $('.cancel-btn').removeClass('hidden');
                    $('input[name="addexam"]').attr('name','updateexam').val('Update Exam');
                    $('form').attr('action','<?= admin_url('masterkey/updateexam/'); ?>');
                    $('#parent_id').find('option[value="'+data['id']+'"]').hide();
                }
            });
        });
        $('.cancel-btn').click(function(){
            $('#name,#slug,#parent_id,#description,#id,#image').val('');
            $('.cancel-btn').addClass('hidden');
            $('input[name="updateexam"]').attr('name','addexam').val('Save Exam');
            $('form').attr('action','<?= admin_url('masterkey/addexam/'); ?>');
            $('#parent_id option').show();
        });
        $('#table').dataTable();
    });
function getPhoto(input){
    
}
</script>