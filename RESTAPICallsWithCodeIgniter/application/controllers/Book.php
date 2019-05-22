<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'/libraries/REST_Controller.php');

class Book extends REST_Controller{

    //constructor
    public function __construct(){
        parent::__construct();
        $this->load->model('Book_model');
    }

    /**
     * retrive data with this method
     * @return Response
     */
    public function book_get(){
        $book = $this->Book_model->getBooks();
        $this->response($book);
    }

    /**
     * retrive data with this method
     * @return Response
     */
    public function book_byName(){
        $name = $this->uri->segment(3);
        $book1 = $this->Book_model->getBookbyName($name);
        $this->response($book1);
    }

    /**
     * update data with this method
     * @return Response
     */
    public function book_put(){
        $id = $this->uri->segment(3);
        $data = array('name'=>$this->input->get('name'),
                      'author'=>$this->input->get('author'),
                      'ISBN'=>$this->input->get('ISBN'),
                      'price'=>$this->input->get('price'));
        $book = $this->Book_model->update($id,$data);
        $this->response($book);
        echo "Data Updated Successfully!\n";
        echo Book::book_get();
    }

    /**
     * create data with this method
     * @return Response
     */
    public function book_post(){
        $data = array('name'=>$this->input->post('name'),
                      'author'=>$this->input->post('author'),
                      'ISBN'=>$this->input->post('ISBN'),
                      'price'=>$this->input->post('price'));
        $book = $this->Book_model->insert($data);
        $this->response($book);
        echo "Data Inserted Successfully!";
        echo Book::book_get();
    }

    /**
     * delete data with this method
     * @return Response
     */
    public function book_delete(){
        $id = $this->uri->segment(3);
        $book = $this->Book_model->delete($id);
        $this->response($book);
        echo "Data Deleted Successfully!\n";
        echo Book::book_get();
    }
}

?>