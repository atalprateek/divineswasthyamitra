

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
                                        <?= form_open_multipart('admin/website/addtestimonial/'); ?>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="name" id="name" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Content</label>
                                                <div class="col-sm-10">
                                                    <textarea name="content" id="content" class="form-control" rows="3"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Image</label>
                                                <div class="col-sm-10">
                                                    <input type="file" name="image" id="image" onChange="getPhoto(this)">
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
                                                    <input type="hidden" name="id" id="id">
                                                    <input type="submit" class="btn btn-success waves-effect waves-light" name="addtestimonial" value="Save Testimonial">
                                                    <button type="button" class="btn btn-danger waves-effect waves-light cancel-btn hidden">Cancel</button>
                                                </div>
                                            </div>
                                        <?= form_close(); ?>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table table-condensed">
                                                <thead>
                                                    <tr>
                                                        <th>Sl.No.</th>
                                                        <th>Image</th>
                                                        <th>Name</th>
                                                        <th>Content</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                        if(!empty($testimonials) && is_array($testimonials)){$i=0;
                                                            foreach($testimonials as $testimonial){ $i++;
                                                                $status="<i class='fa fa-check text-success'></i>";
                                                                if($testimonial['status']==0){
                                                                    $status="<i class='fa fa-times text-danger'></i>";
                                                                }
                                                                $content=substr($testimonial['content'],0,100).'...';
                                                    ?>
                                                    <tr>
                                                        <td><?= $i; ?></td>
                                                        <td><img src="<?= file_url($testimonial['image']); ?>" alt="<?= $testimonial['name']; ?>" width="80"></td>
                                                        <td><?= $testimonial['name']; ?></td>
                                                        <td><?= $content; ?></td>
                                                        <td><?= $status; ?></td>
                                                        <td>
                                                            <button type="button" class="btn btn-xs btn-info edit-btn" value="<?= $testimonial['id']; ?>"><i class="fa fa-edit"></i></button>
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
        $('table').on('click','.edit-btn',function(){
            $.ajax({
                type:"post",
                url:"<?= admin_url('website/gettestimonial/'); ?>",
                data:{id:$(this).val()},
                success:function(data){
                    data=JSON.parse(data);
                    $('#name').val(data['name']);
                    $('#content').val(data['content']);
                    $('input[type="radio"][value="'+data['status']+'"]').prop('checked',true);
                    $('#id').val(data['id']);
                    $('.cancel-btn').removeClass('hidden');
                    $('input[name="addtestimonial"]').attr('name','updatetestimonial').val('Update Testimonial');
                    $('form').attr('action','<?= admin_url('website/updatetestimonial/'); ?>');
                }
            });
        });
        $('.cancel-btn').click(function(){
            $('#name,#content,#image,#id').val('');
            $('.cancel-btn').addClass('hidden');
            $('input[name="updatetestimonial"]').attr('name','addtestimonial').val('Save Testimonial');
            $('form').attr('action','<?= admin_url('website/addtestimonial/'); ?>');
        });
    });
function getPhoto(input){
    
}
</script>