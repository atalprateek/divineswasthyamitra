
        
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
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
        <script src="<?= file_url('assets/js/script.js'); ?>"></script>
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
