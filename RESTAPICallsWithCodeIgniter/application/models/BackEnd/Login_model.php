<?php
class Login_model extends CI_Model
{
    function can_login($email, $password)
    {
        $this->db->where('email', $email);
        $query = $this->db->get('users');
        if($query->num_rows() > 0)
        {
            foreach($query->result() as $row)
            {
                if($row->is_email_verified == 'yes')
                {
                    $store_password = base64_decode($row->password);
                    if($password == $store_password)
                    {
                        $this->session->set_userdata('id', $row->id);
                    }
                else
                {
                    return 'Wrong Password';
                }
            }
            else
            {
                return 'First verified your email address';
            }
            }
        }
        else
        {
            return 'Wrong Email Address';
        }
    }

    function verify_email($verification_key,$email){
        $this->db->where('email', $email);
        $query = $this->db->get('users');
        if($query->num_rows()>0){
            $this->db->update('users',array('verification_key'=>$verification_key));
            return true;
        }else{
            return false;
        }
    }

    function reset_password($key,$encrypted_password){
        $this->db->where('verification_key',$key);
        $query = $this->db->get('users');
        if($query->num_rows() > 0){
            $this->db->update('users',array('password'=>$encrypted_password));
            $row = $this->db->affected_rows();
            return $row;
        }else{
            return false;
        }
    }
}

?>