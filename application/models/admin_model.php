<?php
class Admin_model extends CI_Model{
    public function add_task($task_name) {
        $newtask_name = strtoupper($task_name);
        $data = array(
            'task_name' => $newtask_name
        );
        $this->db->insert('task_name', $data);
        $newtask_name = str_replace(' ', '_', $newtask_name);
        $this->db->query("
        CREATE TABLE IF NOT EXISTS $newtask_name (
            id INT AUTO_INCREMENT PRIMARY KEY,
            Sub_Task_Name VARCHAR(255),
            Description VARCHAR(255),
            Link VARCHAR(255),
            Status VARCHAR(255),
            Status_Vimal VARCHAR(255),
            Status_Muskan VARCHAR(255),
            Status_Complete VARCHAR(255)
        )
    ");

    }

    public function get_task(){
        return $this->db->get('task_name')->result();
    }
    public function get_task_name($id){
        $this->db->where('id',$id);
        return $this->db->get('task_name')->row();
    }

    public function add_sub_task($task_name,$sub_task_name,$sub_task_description,$sub_task_link){
        $data = array(
            'Sub_Task_Name' => ucwords($sub_task_name),
            'Description' => $sub_task_description,
            'Link' => $sub_task_link,
            'Status' => 0,
        );
        $this->db->insert($task_name, $data);
    }
    public function update_task($id,$task_name,$get_task_name){
        $old_task_name = $get_task_name->task_name;
        $newtask_name = strtoupper($task_name);
        $old_task_name = str_replace(' ', '_', $old_task_name);
        $newtask_name = str_replace(' ', '_', $newtask_name);
        $sql = "RENAME TABLE $old_task_name TO $newtask_name";
        $this->db->query($sql);
        $newtask_name = str_replace('_', ' ', $newtask_name);
        $this->db->where('id',$id);
        $data = array(
            'task_name' => $newtask_name
        );
       
        
        $this->db->update('task_name', $data);

    }
    public function delete_task($id,$get_task_name){
        $task_name = $get_task_name->task_name;
        $task_name = str_replace(' ', '_', $task_name);
           $this->db->query("DROP TABLE $task_name");
        $this->db->where('id',$id);
        $this->db->delete('task_name');
       }

       public function get_sub_tasks($task_name){
        $task_name = str_replace(' ', '_', $task_name);
        return $this->db->get($task_name)->result();
       }

       public function get_sub_task($id,$task_name){
         $this->db->where('id',$id);
         $task_name = str_replace(' ', '_', $task_name);
         return $this->db->get($task_name)->row();
       }
       public function update_sub_task($task_name,$sub_task_name,$sub_task_description,$sub_task_link,$id){
        $this->db->where('id',$id);
        $task_name = str_replace(' ', '_', $task_name);
        $data = array(
            'Sub_Task_Name'=> $sub_task_name,
            'Description'=> $sub_task_description,
            'Link'=> $sub_task_link,
        );
        $this->db->update($task_name,$data);
       }

       public function delete_sub_task($task_name,$id){
        $this->db->where('id',$id);
        $task_name = str_replace(' ', '_', $task_name);
        $this->db->delete($task_name);

       }

       public function update_status($status,$task_name,$id){
        $this->db->where('id',$id);
        $task_name = str_replace(' ', '_', $task_name);
        $data = array(
            'Status'=> $status,
        );
        $this->db->update($task_name,$data);
       }

       public function get_percentage_status(){
        $this->db->select('(SELECT COUNT(*) FROM FLA) AS total_rows');
$this->db->select('COUNT(CASE WHEN Status_Vimal = "1" THEN 1 END) AS rows_containing_1');
$this->db->select('(COUNT(CASE WHEN Status_Vimal = "1" THEN 1 END) / (SELECT COUNT(*) FROM FLA)) * 100 AS percentage_containing_1');
$this->db->from('FLA');

$query = $this->db->get();
$result = $query->row();
       }
       public function updateTaskStatus($id, $status, $task_name) {
        $this->db->where('id', $id);
        $this->db->update($task_name, ['status' => $status]);
        
    }
}
?>