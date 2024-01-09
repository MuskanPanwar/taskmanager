<?php
 
 class Admin extends CI_Controller{

    public function index(){
        $get_task = $this->admin_model->get_task();
        $data = array(
            'get_task' => $get_task,
            'title'=> "Dashboard"
        );
        $this->load->view('inc/header',$data);
        $this->load->view('dashboard',$data);
    }
    public function add_task(){
        $data = array(
            'title'=> "Add Task"
        );
       
        $this->form_validation->set_rules('task_name', 'Task Name', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('inc/header',$data);
            $this->load->view('add_task');
        } else {
            $task_name = $this->input->post('task_name');
            $this->admin_model->add_task($task_name);
            $this->session->set_flashdata('success', 'Task Added Successfully');
			redirect('addtask');
        }

    }
    public function add_sub_task(){
        $get_task = $this->admin_model->get_task();
        $data = array(
            'get_task' => $get_task,
            'title'=> "Add Sub Task"
        );
       
        $this->form_validation->set_rules('sub_task_name', 'sub_Task Name', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('inc/header',$data);
            $this->load->view('add_sub_task',$data);
        } else {
            $task_name = $this->input->post('task_name');
            $sub_task_name = $this->input->post('sub_task_name');
            $sub_task_description = $this->input->post('sub_task_description');
            $sub_task_link = $this->input->post('sub_task_link');
            $this->admin_model->add_sub_task($task_name,$sub_task_name,$sub_task_description,$sub_task_link);
            $this->session->set_flashdata('success', 'Sub Task Added Successfully');
			redirect('addsubtask');
        }

    }

    public function task_list(){
        $get_task = $this->admin_model->get_task();
        $data = array(
            'get_task' => $get_task,
            'title'=> "Task List"
        );
        $this->load->view('inc/header',$data);
        $this->load->view('task_list',$data);
    }
    public function edit_task($id){
       $get_task_name = $this->admin_model->get_task_name($id);
       $data = array(
        'get_task_name' => $get_task_name,
        'title'=> "Edit Task"
    );
    $this->form_validation->set_rules('task_name', 'Task Name', 'required');
    if ($this->form_validation->run() == FALSE) {
        $this->load->view('inc/header',$data);
        $this->load->view('edit_task',$data);
    } else {
        $task_name = $this->input->post('task_name');
        $this->admin_model->update_task($id,$task_name,$get_task_name);
        $this->session->set_flashdata('success', 'Task Updated Successfully');
        redirect('addtask');
    }
    }
    public function delete_task($id){
        $get_task_name = $this->admin_model->get_task_name($id);
        $this->admin_model->delete_task($id,$get_task_name);
        $this->session->set_flashdata('success', 'Sub Task Added Successfully');
        redirect('addsubtask');
    }
    public function task_page($task_name){
        $get_sub_tasks = $this->admin_model->get_sub_tasks($task_name);
        $data = array(
            'title'=>$task_name,
            'get_sub_tasks'=>$get_sub_tasks,
        );
        $this->load->view('inc/header',$data);
        $this->load->view('task_page',$data);


    }

    public function task($task_name,$id){
        $get_sub_task = $this->admin_model->get_sub_task($id,$task_name);
        $data = array(
            'title'=> $task_name,
            'get_sub_task'=> $get_sub_task,
            'task_name'=> $task_name
        );
        $this->form_validation->set_rules('sub_task_name', 'sub_Task Name', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('inc/header',$data);
            $this->load->view('task',$data);
        }
        else{
            $sub_task_name = $this->input->post('sub_task_name');
            $sub_task_description = $this->input->post('sub_task_description');
            $sub_task_link = $this->input->post('sub_task_link');
            $this->admin_model->update_sub_task($task_name,$sub_task_name,$sub_task_description,$sub_task_link,$id);
            $this->session->set_flashdata('success', 'Sub Task Updated Successfully');
            $task_name = str_replace(' ', '_', $task_name);
			redirect('task_page/'.$task_name);

        }
        
    }
    public function delete_sub_task($task_name,$id){
        $this->admin_model->delete_sub_task($task_name,$id);
        $this->session->set_flashdata('success', 'Sub Task Deleted Successfully');
        $task_name = str_replace(' ', '_', $task_name);
        redirect('task_page/'.$task_name);

    }

    public function status_change($task_name,$id){
        $status = $this->input->post('status');
         $this->admin_model->updateTaskStatus($id, $status,$task_name);
       
    }
 }
?>