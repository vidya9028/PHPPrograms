<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Book_model extends CI_Model{
    /**
     * show data
     * @return result_array
     */
    public function getBooks(){
        $query = $this->db->query('select * from tbl_books');
        return $query->result_array();
    }

    /**
     * show data
     * @return result_array
     */
    public function getBooksbyID($name){
        $query = $this->db->query('select * from tbl_books where name = $name')->result_array();
        return $query;
    }

    /**
     * insert data into database
     * @return true or
     * @return false
     */
    public function insert($data){
        $this->name = $data['name'];
        $this->author = $data['author'];
        $this->ISBN = $data['ISBN'];
        $this->price = $data['price'];

        if($this->db->insert('tbl_books',$this)){
            return true;
        }else{
            return false;
        }
    }

    /**
     * update data from database
     * @return true or
     * @return false
     */
    public function update($id,$data){
        $this->name = $data['name'];
        $this->author = $data['author'];
        $this->ISBN = $data['ISBN'];
        $this->price = $data['price'];

        $result = $this->db->update('tbl_books',$this,array('id' => $id));
        if($result){
            return true;
        }else{
            return false;
        }
    }

    /**
     * delete data from database
     * @return true or
     * @return false
     */
    public function delete($id){
        $result = $this->db->query("delete from tbl_books where id = $id ");
        if($result){
            return true;
        }else{
            return false;
        }
    }
}
?>