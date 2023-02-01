<?php


 function check_login()
{
    $ci = get_instance();
    if(!$ci->session->userdata('username'))
    {
        redirect('auth/logout');
    }
}



?>