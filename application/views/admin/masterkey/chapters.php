

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
                                        <?= form_open_multipart('admin/masterkey/addchapter/'); ?>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Chapter</label>
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
                                                <label class="col-sm-2 col-form-label">Subject</label>
                                                <div class="col-sm-10">
                                                    <?= form_dropdown('subject_id',$subjects,'',array('class'=>'form-control','required'=>"true","id"=>'subject_id')); ?>
                                                    <input type="hidden" name="subject_name" id="subject_name">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Description</label>
                                                <div class="col-sm-10">
                                                    <textarea name="description" id="description" class="form-control" rows="3"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row hidden">
                                                <label class="col-sm-2 col-form-label">Image</label>
                                                <div class="col-sm-10">
                                                    <input type="file" name="image" id="image" onChange="getPhoto(this)">
                                                    <input type="hidden" name="id" id="id">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label"></label>
                                                <div class="col-sm-10">
                                                    <input type="submit" class="btn btn-success waves-effect waves-light" name="addchapter" value="Save Chapter">
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
                                                        <th>Chapter</th>
                                                        <th>Subject</th>
                                                        <!--<th>Parent</th>-->
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                        if(is_array($chapters) && !empty($chapters)){$i=0;
                                                            foreach($chapters as $chapter){ $i++;
                                                    ?>
                                                    <tr>
                                                        <td><?= $i; ?></td>
                                                        <td><?= $chapter['name']; ?></td>
                                                        <td><?= $chapter['subject_name']; ?></td>
                                                        <td>
                                                            <button type="button" class="btn btn-xs btn-info edit-btn" value="<?= $chapter['id']; ?>"><i class="fa fa-edit"></i></button>
                                                            <a href="<?= admin_url('questions/assignchapter/?subject='.$chapter['subject_id'].'&chapter='.$chapter['id']); ?>" class="btn btn-sm p-1 btn-primary">Assign Chapter</a>
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
		$('#category').change(function(){
            var category_name=$('#category option[value="'+$(this).val()+'"]').text();
            $('#category_name').val(category_name);
        });
        $('table').on('click','.edit-btn',function(){
            $.ajax({
                type:"post",
                url:"<?= admin_url('masterkey/getchapter/'); ?>",
                data:{id:$(this).val()},
                success:function(data){
                    data=JSON.parse(data);
                    $('#name').val(data['name']);
                    $('#slug').val(data['slug']);
                    if(data['subject_id']==0){ data['subject_id']=''; }
                    $('#subject_id').val(data['subject_id']);
                    $('#subject_name').val(data['subject_name']);
                    $('#description').val(data['description']);
                    $('#id').val(data['id']);
                    $('.cancel-btn').removeClass('hidden');
                    $('input[name="addchapter"]').attr('name','updatechapter').val('Update Chapter');
                    $('form').attr('action','<?= admin_url('masterkey/updatechapter/'); ?>');
                }
            });
        });
        $('.cancel-btn').click(function(){
            $('#name,#slug,#subject_id,#description,#id,#image').val('');
            $('.cancel-btn').addClass('hidden');
            $('input[name="updatechapter"]').attr('name','addchapter').val('Save Chapter');
            $('form').attr('action','<?= admin_url('masterkey/addchapter/'); ?>');
            $('#subject_id option').show();
        });
        $('#table').dataTable();
    });
function getPhoto(input){
    
}
</script>