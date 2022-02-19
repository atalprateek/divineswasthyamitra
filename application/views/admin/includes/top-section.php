<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?= $title.' | '.PROJECT_NAME; ?></title>
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="icon" type="image/png" href="<?= file_url('includes/images/fav.png'); ?>">
        <!-- Google Font: -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <link rel="stylesheet" href="<?= file_url('includes/css/waves.min.css'); ?>" type="text/css" media="all">

        <link rel="stylesheet" type="text/css" href="<?= file_url('includes/css/feather.css'); ?>">
        
        <link rel="stylesheet" type="text/css" href="<?= file_url('includes/css/notification.css'); ?>">

        <link rel="stylesheet" type="text/css" href="<?= file_url('includes/css/animate.css'); ?>">

        <link rel="stylesheet" type="text/css" href="<?= file_url('includes/css/style.css'); ?>">
        <?php
			if(!empty($styles)){
				foreach($styles as $key=>$style){
					if($key=="link"){
						if(is_array($style)){
							foreach($style as $single_style){
								echo "<link rel='stylesheet' href='$single_style'>\n\t";
							}
						}
						else{
							echo "<link rel='stylesheet' href='$style'>\n\t";
						}
					}
					elseif($key=="file"){
						if(is_array($style)){
							foreach($style as $single_style){
								echo "<link rel='stylesheet' href='".file_url("$single_style")."'>\n\t";
							}
						}
						else{
							echo "<link rel='stylesheet' href='".file_url("$style")."'>\n\t";
						}
					}
				}
			}
		?>   
        <!-- Custom style -->
        <link rel="stylesheet" href="<?= file_url('includes/css/custom.css'); ?>">  
        <script src="https://kit.fontawesome.com/512e5abe13.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <?php
            if(!empty($top_script)){
                foreach($top_script as $key=>$script){
                    if($key=="link"){
                        if(is_array($script)){
                            foreach($script as $single_script){
                                echo "<script src='$single_script'></script>\n\t";
                            }
                        }
                        else{
                            echo "<script src='$script'></script>\n\t";
                        }
                    }
                    elseif($key=="file"){
                        if(is_array($script)){
                            foreach($script as $single_script){
                                echo "<script src='".file_url("$single_script")."'></script>\n\t";
                            }
                        }
                        else{
                            echo "<script src='".file_url("$script")."'></script>\n\t";
                        }
                    }
                }
            }
        ?>
    </head>
    <body <?= !empty($body_class)?$body_class:''; ?>>
        
        <div class="loader-bg">
            <div class="loader-bar"></div>
        </div>

        <div id="pcoded" class="pcoded">
            <div class="pcoded-overlay-box"></div>
            <div class="pcoded-container navbar-wrapper">