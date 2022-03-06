

    <div class="margin-tb-30px">
        <div class="container">
            <div class="row">
            	<div class="col-md-12 py-10 my-5">
                    <div class="lead my-15">Member List</div>
                    <div class="py-15 background-white">
                      	<div class="row" id="status">
                            <div class="col-md-2 col-3" id="export">
                            	<a href="<?php echo base_url('profile/exportmember'); ?>" class="btn btn-sm btn-info">Export <i class="fa fa-download"></i></a>
                            </div>
                        </div><br>
                    	<div class="row">
                        	<div class="col-md-12">
                    			<div class="table-responsive" id="result">
                                	<table class="table table-striped" id="table">
                                        <thead>
                                            <tr>
                                                <th>Sl No</th>
                                                <th>Card No</th>
                                                <th>Name</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                if(is_array($members)){ $slno=0;
                                                    foreach($members as $member){
                                            ?>
                                            <tr>
                                                <td><?php echo ++$slno; ?></td>
                                                <td><?php echo $member['card_no']; ?></td>
                                                <td><?php echo $member['name']; ?></td>
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
	<script>
        $(document).ready(function(e) {
			createDatatable();
        });
		function createDatatable(){
            table=$('#table').DataTable();
			table.columns('.select-filter').every(function(){
				var that = this;
				var title=that.context[0].aoColumns[that[0]].sTitle;
				var pos=$("<div class='col-md-4 col-8'></div>");
				$('#status').prepend(pos);
				// Create the select list and search operation
				var select = $('<select class="form-control" />').appendTo(pos).on('change',function(){
								that.search("^" + $(this).val() + "$", true, false, true).draw();
							});
					select.append('<option value=".+">Select '+title+'</option>');
				// Get the search data for the first column and add to the select list
				this.cache( 'search' ).sort().unique().each(function(d){
						select.append($('<option value="'+d+'">'+d+'</option>') );
				});
			});
		}
    </script>

