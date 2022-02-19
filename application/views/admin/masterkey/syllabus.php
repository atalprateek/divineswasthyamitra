

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
                                        <?= form_open_multipart('admin/masterkey/addsyllabus/'); ?>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Title</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="title" id="title" required>
                                                </div>
                                            </div>
                                            <div class="form-group row hidden">
                                                <label class="col-sm-2 col-form-label">Slug</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="slug" id="slug" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">PDF File</label>
                                                <div class="col-sm-10">
                                                    <input type="file" name="file" id="file" required>
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
                                                    <input type="submit" class="btn btn-success waves-effect waves-light" name="addsyllabus" value="Save Syllabus">
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
                                                        <th>Title</th>
                                                        <th>Syllabus</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                        if(is_array($syllabus) && !empty($syllabus)){$i=0;
                                                            foreach($syllabus as $single){ $i++;
                                                                $status="<i class='fa fa-check text-success'></i>";
                                                                if($single['status']==0){
                                                                    $status="<i class='fa fa-times text-danger'></i>";
                                                                }
                                                    ?>
                                                    <tr>
                                                        <td><?= $i; ?></td>
                                                        <td><?= $single['title']; ?></td>
                                                        <td><a href="<?= file_url($single['filepath']); ?>" target="_blank" class="btn btn-sm p-1 btn-primary">View</a></td>
                                                        <td><?= $status; ?></td>
                                                        <td><button type="button" class="btn btn-xs btn-info edit-btn" value="<?= $single['id']; ?>"><i class="fa fa-edit"></i></button></td>
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
		$('#title').keyup(function(){
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
                url:"<?= admin_url('masterkey/getsyllabus/'); ?>",
                data:{id:$(this).val()},
                success:function(data){
                    data=JSON.parse(data);
                    $('#title').val(data['title']);
                    $('#slug').val(data['slug']);
                    $('#id').val(data['id']);
                    $('#file').removeAttr('required');
                    $('.cancel-btn').removeClass('hidden');
                    $('input[type="radio"][value="'+data['status']+'"]').prop('checked',true);
                    $('input[name="addsyllabus"]').attr('name','updatesyllabus').val('Update Syllabus');
                    $('form').attr('action','<?= admin_url('masterkey/updatesyllabus/'); ?>');
                    $('#parent_id').find('option[value="'+data['id']+'"]').hide();
                }
            });
        });
        $('.cancel-btn').click(function(){
            $('#title,#slug,#id,#file').val('');
            $('#file').attr('required',true);
            $('.cancel-btn').addClass('hidden');
            $('input[name="updatesyllabus"]').attr('name','addsyllabus').val('Save Syllabus');
            $('form').attr('action','<?= admin_url('masterkey/addsyllabus/'); ?>');
            $('#parent_id option').show();
        });
        $('#table').dataTable();
    });
function getPhoto(input){
    
}
</script>