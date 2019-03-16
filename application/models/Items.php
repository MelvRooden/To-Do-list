<?php

class Items extends CI_Model
{
    public function getItems()
    {
        $dbdata = array();
        $this->db->from('Items');
        $this->db->select('*');
        $query = $this->db->get();
        if ($query->num_rows()) {
            foreach ($query->result_array() as $row) {
                $dbdata[] = array(
                    'item_id' => $row['item_id'],
                    'list_id' => $row['list_id'],
                    'item_name' => $row['item_name'],
                    'item_details' => $row['item_details'],
                    'item_status' => $row['item_status'],
                    'item_time' => $row['item_time']
                );
            }
        }
        return $dbdata;
    }
}