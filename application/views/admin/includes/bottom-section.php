
                        </div>
                        <div id="styleSelector"></div>
                    </div>
                </div>
            </div>
        </div>
        <script type="d2d1d6e2f87cbebdf4013b26-text/javascript" src="<?= file_url('includes/js/jquery-ui.min.js'); ?>"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        <script src="<?= file_url('includes/js/waves.min.js'); ?>" type="d2d1d6e2f87cbebdf4013b26-text/javascript"></script>

        <script type="d2d1d6e2f87cbebdf4013b26-text/javascript" src="<?= file_url('includes/js/jquery.slimscroll.js'); ?>"></script>
        <script type="text/javascript" src="<?= file_url('includes/js/bootstrap-growl.min.js'); ?>"></script>
        <script type="text/javascript" src="<?= file_url('includes/js/notification.js'); ?>"></script>
        <script src="<?= file_url('includes/js/pcoded.min.js'); ?>" type="d2d1d6e2f87cbebdf4013b26-text/javascript"></script>
        <script src="<?= file_url('includes/js/vertical-layout.min.js'); ?>" type="d2d1d6e2f87cbebdf4013b26-text/javascript"></script>
        <script type="d2d1d6e2f87cbebdf4013b26-text/javascript" src="<?= file_url('includes/js/script.min.js'); ?>"></script>

        <script src="<?= file_url('includes/js/rocket-loader.min.js'); ?>" data-cf-settings="d2d1d6e2f87cbebdf4013b26-|49" defer=""></script>
<?php
		if(!empty($bottom_script)){
		  foreach($bottom_script as $key=>$script){
			  if($key=="link"){
					if(is_array($script)){
						foreach($script as $single_script){
							echo "<script src='$single_script'></script>\n\t\t";
						}
					}
					else{
						echo "<script src='$script'></script>\n\t\t";
					}
			  }
			  elseif($key=="file"){
				if(is_array($script)){
					foreach($script as $single_script){
						echo "<script src='".file_url("$single_script")."'></script>\n\t\t";
					}
				}
				else{
					echo "<script src='".file_url("$script")."'></script>\n\t\t";
				}
			  }
		  }
		}
		?>
        
        <script src="<?php echo file_url("includes/js/custom-script.js"); ?>"></script>
    </body>

</html>
<?php
if(isset($_SESSION['__ci_vars']) && is_array($_SESSION['__ci_vars'])){
    foreach($_SESSION['__ci_vars'] as $key=>$value){
        if($value=='old'){
            unset($_SESSION[$key]);
            unset($_SESSION['__ci_vars'][$key]);
        }
    }
    if(empty($_SESSION['__ci_vars'])){
        unset($_SESSION['__ci_vars']);
    }
}
?>
