<?php

class Items extends CI_Model
{
    //gets all Items data from db
    public function getAll()
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


    public function insert($data)
    {
        $this->db->insert('Items', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('item_id', $id);
        $this->db->update('Items', $data);
    }

    public function delete($id)
    {
        $this->db->where('item_id', $id);
        $this->db->delete('Items');
    }
}