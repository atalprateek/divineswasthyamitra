

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
                                            <table class="table table-condensed" id="table">
                                                <thead>
                                                    <tr>
                                                        <th>Sl.No.</th>
                                                        <th>Image</th>
                                                        <th>Hospital</th>
                                                        <th>Category</th>
                                                        <th>Location</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                        if(is_array($hospitals) && !empty($hospitals)){$i=0;
                                                            foreach($hospitals as $hospital){ $i++;
                                                    ?>
                                                    <tr>
                                                        <td><?= $i; ?></td>
                                                        <td><img src="<?= $hospital['thumb_image']; ?>" alt="" height="80"></td>
                                                        <td><?= $hospital['name']; ?></td>
                                                        <td><?= $hospital['category']; ?></td>
                                                        <td><?= $hospital['district'].', '.$hospital['state']; ?></td>
                                                        <td>
                                                            <a href="<?= admin_url('listings/edit/'.md5($hospital['id'])); ?>" class="btn btn-xs btn-info"><i class="fa fa-edit"></i></a>
                                                            <a href="<?= admin_url('listings/delete/'.md5($hospital['id'])); ?>" class="btn btn-xs btn-danger" onClick="return validate();"><i class="fa fa-trash"></i></a>
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
    });
    function validate(){
        var check=confirm("Are you sure you want to delete this entry?");
        return check;
    }
</script>