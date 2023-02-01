<?php

function check_login()
{
    $ci = get_instance();
    if(!$ci->session->userdata('ic'))
    {
        redirect('auth/logout');
    }
}

function check_role_admin()
{
    $ci = get_instance();
    if($ci->session->userdata('role') !== '1')
    {
        redirect('Error_page');
    }
}

function check_role_staff()
{
    $ci = get_instance();
    if($ci->session->userdata('role') !== '2')
    {
        redirect('Error_page');
    }
}

function check_role_kj()
{
    $ci = get_instance();
    if($ci->session->userdata('role') !== '3')
    {
        redirect('Error_page');
    }
}

function check_role_admin_kj()
{
    $ci = get_instance();
    if($ci->session->userdata('role') !== '1' && $ci->session->userdata('role') !== '3')
    {
        redirect('Error_page');
    }
}

function checkic()
{
    $ci = get_instance();
    if(!$ci->input->post('ic'))
        {
            redirect('staff/liststaff');
        }
}

function messege()
{
    $ci = get_instance();
     if($ci->session->flashdata('messege'))
     {
        echo '        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>'. $ci->session->flashdata("messege").'</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>       ';
     }
      
        
}

function success()
{
    $ci = get_instance();
     if($ci->session->flashdata('success'))
     {
        echo '        <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>'. $ci->session->flashdata("success").'</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>       ';
     }
      
        
}

function report_status($messege = '', $route = '', $id = 0)
{
    $ci = get_instance();

    $report_status = $ci->db->get_where('reports', ['id' => $id ])->row_array();

    if($report_status['comfirmation'] == 1)
    {
        $ci->session->set_flashdata('messege', $messege);
        redirect($route);
    }
}

function activiti_log($activity = '')
{
    $ci = get_instance();

    date_default_timezone_set("Asia/Kuala_Lumpur");

    $data = array(
                
        'id_user' => $ci->session->userdata('id'),
        'dates' => time(),
        'timess' => date('H:i:s'),
        'activity' => $activity
    );

    $ci->db->insert('activity_log', $data);
}



?>