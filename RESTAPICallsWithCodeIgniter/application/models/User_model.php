<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
    /**
     * show data
     * @return result_array
     */
    public function read(){
   
       $query = $this->db->query("select * from user");
       return $query->result_array();
    }

    /**
     * insert data into database
     * @return message
     */
    public function insert($data){
       
       $this->name    = $data['name']; 
       $this->password  = $data['password'];
       $this->type = $data['type'];
       if($this->db->insert('user',$this))
       {    
           return 'Data is inserted successfully';
       }
         else
       {
           return "Error has occured";
       }
    }

    /**
     * update data from database
     * @return message
     */
    public function update($id,$data)
    {
   
       $this->name    = $data['name']; 
       $this->password  = $data['password'];
       $this->type = $data['type'];
       $result = $this->db->update('user',$this,array('id' => $id));
       if($result)
       {
           return "Data is updated successfully";
       }
       else
       {
           return "Error has occurred";
       }
    }

    /**
     * delete data from database
     * @return message
     */
    function delete($id){
   
       $result = $this->db->query("delete from user where id = $id");
       if($result)
       {
           return "Data is deleted successfully";
       }
       else
       {
           return "Error has occurred";
       }
    }
}