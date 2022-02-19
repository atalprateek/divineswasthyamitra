// JavaScript Document
$(document).ready(function(){
    setTimeout(function() {
        //$('.pcoded-header').attr('header-theme',$('.pcoded-header').data('theme'));
        //$('.navbar-logo').attr('logo-theme',$('.navbar-logo').data('theme'));
    },600);
    
    if($('.notifications .btn').text()!=''){
        setTimeout(function() {
            $('.notifications .btn').click();
        },600);
    }
});