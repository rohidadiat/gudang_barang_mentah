<?php 

class Api_model extends CI_Model 
{
    function registerUser($data)
    {
        $this->db->insert('otentikasi',$data);
    }

    function checkLogin($data)
    {
        $this->db->where($data);
        $query = $this->db->get('otentikasi');
        if($query->num_rows()==1)
        {
            return $query->row();
        }
        else 
        {
            return false;
        }
    }

}