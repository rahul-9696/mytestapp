<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('HomeModel');
    }

    public function emplist(){
    	$data['empinfo']= $this->HomeModel->Getemplist();
    	$this->load->view('emplist',$data);
    }

    public function addemployee(){
    	$this->load->view('addemp');
    }

    public function addemp(){

    	if(isset( $_FILES['image']['name'])!="")
        {
      
            $config['upload_path']   = 'uploads/emp-img/';

            $config['allowed_types'] = 'jpg|png|JPG|PNG';

            $this->load->library('upload', $config);

            $img_nm = "";

          if ($this->upload->do_upload('image'))
            {
                $data = array('upload_data' => $this->upload->data());
                $img_nm = $this->upload->data('file_name');
            }

            if(isset( $_FILES['image']['name'])!="")
            {
              $data1['name'] = $this->input->post('name');
              $data1['address']  = $this->input->post('address');
              $data1['email']  = $this->input->post('email');
              $data1['phone']  = $this->input->post('phone');
              $data1['dob']  = date('Y-m-d',strtotime($this->input->post('dob')));
              $data1['image']  = $img_nm;

               $user_id = $this->HomeModel->insert_table("employee",$data1);
               if($user_id){
                      $data1['success']  = 'Employee Added Successfully!';
                  }else{
                      $data1['error']  = 'Error in Adding Employee!';
                  }
              
               redirect("home/emplist");
            
            }else
            {
              $data1['name'] = $this->input->post('name');
              $data1['address']  = $this->input->post('address');
              $data1['email']  = $this->input->post('email');
              $data1['phone']  = $this->input->post('phone');
              $data1['dob']  = date('Y-m-d',strtotime($this->input->post('dob')));

               $user_id = $this->HomeModel->insert_table("employee",$data1);
               if($user_id){
                      $data1['success']  = 'Employee Added Successfully!';
                  }else{
                      $data1['error']  = 'Error in Adding Employee!';
                  }
              
              redirect("home/emplist");
            }

       }
    }

    public function delemp(){
      $id = $this->input->post("duid");
      $udata= array(
      	'isactive' => '1'
      );
      $this->db->where('id',$id);
      $this->db->update('employee',$udata);
      redirect("home/emplist");
    }

    public function editemployee(){

	    $user1['user']=$this->HomeModel->getdata($this->input->post("euid"));
	    $data['alert']    = $this->session->flashdata('alert');
	    $data['error']    = $this->session->flashdata('error');
	    $data['success']  = $this->session->flashdata('success');
	   // print_r($user1);die;
	      
	    $this->load->view('editemp',$user1);
    }

    public function updatemp(){

    	if(isset( $_FILES['image']['name'])!="")
        {
      
            $config['upload_path']   = 'uploads/emp-img/';

            $config['allowed_types'] = 'jpg|png|JPG|PNG';

            $this->load->library('upload', $config);

            $img_nm = "";

          if ($this->upload->do_upload('image'))
            {
                $data = array('upload_data' => $this->upload->data());
                $img_nm = $this->upload->data('file_name');
            }

            if(isset( $_FILES['image']['name'])!="")
            {
              $edid= $this->input->post('hdneditid');		
              $data1['name'] = $this->input->post('name');
              $data1['address']  = $this->input->post('address');
              $data1['email']  = $this->input->post('email');
              $data1['phone']  = $this->input->post('phone');
              $data1['dob']  = date('Y-m-d',strtotime($this->input->post('dob')));
              $data1['image']  = $img_nm;

               $user_id = $this->HomeModel->update_table("employee",$data1,$edid);
               if($user_id){
                      $data1['success']  = 'Employee Updated Successfully!';
                  }else{
                      $data1['error']  = 'Error in Updating Employee!';
                  }
              
               redirect("home/emplist");
            
            }else
            {
           	  $edid= $this->input->post('hdneditid');			
              $data1['name'] = $this->input->post('name');
              $data1['address']  = $this->input->post('address');
              $data1['email']  = $this->input->post('email');
              $data1['phone']  = $this->input->post('phone');
              $data1['dob']  = date('Y-m-d',strtotime($this->input->post('dob')));

               $user_id = $this->HomeModel->update_table("employee",$data1,$edid);
               if($user_id){
                      $data1['success']  = 'Employee Updated Successfully!';
                  }else{
                      $data1['error']  = 'Error in Updating Employee!';
                  }
              
              redirect("home/emplist");
            }

       }
    } 

}
