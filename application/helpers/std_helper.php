<?php 

function view($view_path, $newdata = null)
{
    $CI = &get_instance();
    return $CI->load->view($view_path, $newdata);

}