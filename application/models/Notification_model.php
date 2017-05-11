<?php

Class Notification_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getAccessRequestByPatient($userId) {

        $sql = "SELECT p.id, p.title, pacl.accessor_user_id,u.name as accessor_name,pacl.id pacl_id "
                . " FROM prescription_acl as pacl "
                . " INNER JOIN prescription as p ON pacl.prescriptoin_id=p.id"
                . " INNER JOIN user as u on pacl.accessor_user_id=u.id "
                . " WHERE pacl.status='P' AND p.user_id=$userId";

        $query = $this->db->query($sql);
        if ($this->db->error()) {
            $response['error'] = $this->db->error();
        }
        $data = $query->result_array();
        return $data;
    }

    public function updatePcl($paclID, $status) {
        if ($status == 'A')
            $data = array('status' => 'A');
        if ($status == 'D')
            $data = array('status' => 'D');

        $this->db->where('id', $paclID);
        if ($this->db->update('prescription_acl', $data)) {
            return true;
        } else {
            return false;
        }
    }

}

?>