<?php

Class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getUserObject($name, $password) {
        $this->db->select('id,name,  type, phone');
        $this->db->from('user');
        $this->db->where('name', $name);
        $this->db->where('password', MD5($password));
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function getPrescriptionsInofByUserId($userId) {
        $sql = "SELECT p.id"
                . ",p.title"
                . ",p.medical_record_id,m.title medical_titile "
                . "FROM prescription p  LEFT JOIN medical_record m on p.medical_record_id=m.id "
                . " WHERE p.user_id={$userId}";
        $query = $this->db->query($sql);
        if ($this->db->error()) {
            $response['error'] = $this->db->error();
        }
        $data = $query->result_array();
        return $data;
    }

    public function getPrescriptionDetail($pid){
        
        $sql = "SELECT * from prescription where id=$pid";
        $query = $this->db->query($sql);
        if ($this->db->error()) {
            $response['error'] = $this->db->error();
        }
        $data = $query->result_array();
        return $data;
    }

        // For doctors and pharmacist 
    public function getAllUsersAllPrescriptions($accessorId) {

        $sql = "SELECT p.id"
                . ",p.title"
                . ",p.medical_record_id"
                . ",m.title as medical_titile"
                . ",u.name as username"
                . ",u.id as userId"
                . ",u.phone "
                . " FROM prescription p  INNER JOIN user u ON u.id=p.user_id "
                . " LEFT JOIN medical_record m ON p.medical_record_id=m.id ";

        $query = $this->db->query($sql);
        if ($this->db->error()) {
            $response['error'] = $this->db->error();
        }
        $data = $query->result_array();
        $rowCount = $query->num_rows();
        if ($rowCount >= 1) {
            $prescriptions = array();
            foreach ($data as $key => $value) {
                $prescriptions[$value['id']] = $value;
                $prescriptions[$value['id']]['status'] = null;
            }
        }
        // get prescription accesiblity information for prescriptions 
        if (!empty($accessorId)) {
            $sql = "SELECT prescriptoin_id,status "
                    . " FROM prescription_acl "
                    . " WHERE accessor_user_id=$accessorId";
            $query = $this->db->query($sql);
            $rowCount = $query->num_rows();
            if ($rowCount >= 1) {
                $resultAcl = $query->result_array();
                foreach ($resultAcl as $k => $v) {
                    $prescriptions[$v['prescriptoin_id']]['status'] = $v['status'];
                }
            }
        }
        return $prescriptions;
    }

    public function createAccessRequest($prescriptionID,$accessorID){
         $sql = "SELECT prescriptoin_id,status "
                    . " FROM prescription_acl "
                    . " WHERE accessor_user_id=$accessorID AND prescriptoin_id=$prescriptionID";
         $query = $this->db->query($sql);
            $rowCount = $query->num_rows();
             if ($rowCount >= 1) {
                 return FALSE;
             }
         
        $data = array('prescriptoin_id'=>$prescriptionID,'accessor_user_id'=>$accessorID,'status'=>'P');
            $this->db->insert('prescription_acl', $data);
            $aclId = $this->db->insert_id();
            $error = $this->db->error();
            if($aclId){
                $response_data['id'] = $aclId;
                $error = '';
                return true;
            }
            return FALSE;
    }
}

?>