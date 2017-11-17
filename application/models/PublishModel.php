<?php

class PublishModel extends CI_Model
{

    function PublishModel()
    {
        $this->load->database();
    }
   

    function insert($user_id,$note_content,$note_url,$note_time,$note_type,$note_title)
    {
        $sql = "insert into note(user_id,note_content,note_url,note_time,note_type,note_title,belong)values('$user_id','$note_content','$note_url','$note_time','$note_type','$note_title','0')";
        //echo $sql;
        $query = $this->db->query($sql);
        
        echo $query;
    }
    
    function getnote($note_content,$note_url,$note_time,$note_type,$note_title)
    {
           
         // $sql="select * from note where user_id = '".$_SESSION['user_id']."'";
         $sql="select * from note where user_id = 15";
        

        // 查询数据库
        $query = $this->db->query($sql);
        // 以数组形式返回查询结果
        $row=$query->result_array();

    }

}