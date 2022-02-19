

<?php
    $titles=json_decode($page['titles'],true);
    $contents=json_decode($page['contents'],true);
?>
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
                                        <?= form_open_multipart('admin/website/updatepage/'); ?>
                                            <?php
                                                foreach($titles as $key=>$title){
                                            ?>
                                            <div id="inputs<?= $key; ?>" class="d-none allinputs">
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Title</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control title" name="titles[]" value="<?= $title; ?>" required>
                                                        <input type="hidden" class="form-control temptitle" value="<?= $title; ?>" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Content</label>
                                                    <div class="col-sm-10">
                                                        <textarea name="contents[]" class="form-control content" rows="3"><?= $contents[$key]; ?></textarea>
                                                        <textarea class="form-control tempcontent d-none" rows="3"><?= $contents[$key]; ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="content<?= $key ?>" class="allcontent">
                                                <h3><?= $title; ?></h3>
                                                <p><?= $contents[$key]; ?></p>
                                                <button type="button" class="btn btn-sm btn-primary" onClick="editSection('<?= $key; ?>')"><i class="fa fa-edit"></i> Edit</button>
                                            </div>
                                            <?php } ?>
                                            <div class="form-group row d-none" id="btn-row">
                                                <label class="col-sm-2 col-form-label"></label>
                                                <div class="col-sm-10">
                                                    <input type="hidden" name="page" id="page" value="<?= $page['page']; ?>">
                                                    <input type="hidden" name="id" id="id" value="<?= $page['id']; ?>">
                                                    <input type="submit" class="btn btn-success waves-effect waves-light" name="updatepage" value="Update ">
                                                    <button type="button" class="btn btn-danger waves-effect waves-light cancel-btn hidden">Cancel</button>
                                                </div>
                                            </div>
                                        <?= form_close(); ?>
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
    });
    function editSection(key){
        $('.allinputs').addClass('d-none');
        $('.allcontent').removeClass('d-none');
        $('.allinputs').each(function(){
            $(this).find('.title').val($(this).find('.temptitle').val());
            $(this).find('.content').val($(this).find('.tempcontent').val());
        });
        var inputsid='#inputs'+key;
        var contentid='#content'+key;
        $(inputsid).toggleClass('d-none');
        $(contentid).toggleClass('d-none');
        var btns='<div class="form-group row" id="btn-row">'+$('#btn-row').html()+'</div>';
        $('#btn-row').remove();
        $(btns).insertAfter(inputsid);
        
    }
</script>