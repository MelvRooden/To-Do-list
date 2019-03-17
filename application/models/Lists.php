<?php

class Lists extends CI_Model
{
    //gets all Lists data from db
    public function getAll()
    {
        $dbdata = array();
        $this->db->from('Lists');
        $this->db->select('*');
        $query = $this->db->get();
        if ($query->num_rows()) {
            foreach ($query->result_array() as $row) {
                $dbdata[] = array(
                    'list_id' => $row['list_id'],
                    'list_name' => $row['list_name'],
                    'list_status' => $row['list_status']
                );
            }
        }
        return $dbdata;
    }


    public function insert($data)
    {
        $this->db->insert('Lists', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('list_id', $id);
        $this->db->update('Lists', $data);
    }

    public function delete($id)
    {
        $this->db->where('list_id', $id);
        $this->db->delete('Lists');
    }
}