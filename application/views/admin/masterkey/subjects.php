

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
                                        <?= form_open_multipart('admin/masterkey/addsubject/'); ?>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Subject</label>
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
                                                    <input type="submit" class="btn btn-success waves-effect waves-light" name="addsubject" value="Save Subject">
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
                                                        <th>Subject</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                        if(is_array($subjects) && !empty($subjects)){$i=0;
                                                            foreach($subjects as $subject){ $i++;
                                                    ?>
                                                    <tr>
                                                        <td><?= $i; ?></td>
                                                        <td><?= $subject['name']; ?></td>
                                                        <td>
                                                            <button type="button" class="btn btn-xs btn-info p-1 edit-btn" value="<?= $subject['id']; ?>"><i class="fa fa-edit"></i></button>
                                                            <a href="<?= admin_url('questions/?subject='.$subject['id']); ?>" class="btn btn-sm p-1 btn-primary">Add Question</a>
                                                            <a href="<?= admin_url('questions/questionlist/?subject='.$subject['id']); ?>" class="btn btn-sm p-1 btn-primary">View Questions</a>
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
		$('body').on('change','#course_id',function(){
            var course_name=$('#course_id option[value="'+$(this).val()+'"]').text();
            $('#course_name').val(course_name);
        });
        $('table').on('click','.edit-btn',function(){
            $('#parent_id option').show();
            $.ajax({
                type:"post",
                url:"<?= admin_url('masterkey/getsubject/'); ?>",
                data:{id:$(this).val()},
                success:function(data){
                    data=JSON.parse(data);
                    $('#name').val(data['name']);
                    $('#slug').val(data['slug']);
                    $('#course_id').attr('data-value',data['course_id'])
                    if(data['category']==0){ data['category']=''; }
                    $('#category').val(data['category']).trigger('change');
                    $('#description').val(data['description']);
                    $('#id').val(data['id']);
                    $('.cancel-btn').removeClass('hidden');
                    $('input[name="addsubject"]').attr('name','updatesubject').val('Update Subject');
                    $('form').attr('action','<?= admin_url('masterkey/updatesubject/'); ?>');
                    $('#parent_id').find('option[value="'+data['id']+'"]').hide();
                }
            });
        });
        $('.cancel-btn').click(function(){
            $('#name,#slug,#parent_id,#description,#id,#image').val('');
            $('.cancel-btn').addClass('hidden');
            $('input[name="updatesubject"]').attr('name','addsubject').val('Save Subject');
            $('form').attr('action','<?= admin_url('masterkey/addsubject/'); ?>');
            $('#parent_id option').show();
        });
        $('#table').dataTable();
		$('body').on('change','#category',function(){
            var category=$(this).val();
            var course_id=$('#course_id').data('value');
            if(course_id==undefined){
                course_id='';
            }
            $.ajax({
                type:"post",
                url:"<?= admin_url('masterkey/getcourses/'); ?>",
                data:{category:category,course_id:course_id},
                success:function(data){
                    $('#course_id').replaceWith(data);
                }
            });
        });
    });
function getPhoto(input){
    
}
</script>