<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    //loads the page and sends all data received data with it
    public function index()
    {
        $this->load->model('Lists');
        $listData = $this->Lists->getAll();

        $this->load->model('Items');
        $itemData = $this->Items->getAll();

        $data = array(
            "listData" => $listData,
            "itemData" => $itemData
        );
        $this->load->view('Templates/header');
        $this->load->view('ToDoList/index' , $data);
        $this->load->view('Templates/footer');
    }

    function error($error)
    {
//        alert("Oops! " . $error);
//        redirect(base_url('/Main/index'));
    }


    //..........Lists..........//
    //creates a new List
    public function createList()
    {
        if (!empty($_POST)) {
            $list_name = $this->input->post('createListName');
            $list_status = $this->input->post('createListDetails');;
            if ($list_name && $list_status) {
                $data = array(
                    'list_name' => $list_name,
                    'list_status' => $list_status
                );
            }
            $this->load->model('Lists');
            $this->Lists->insert($data);
            redirect(base_url('/Main/index'));
        } else {
            $this->error('An error occurred while trying to create a List');
        }
    }

    //updates an exiting List
    public function updateList()
    {
        if (!empty($_POST)) {
            $list_id = $this->input->post('newListId');
            $list_name = $this->input->post('newListName');
            $list_status = $this->input->post('newListStatus');;
            if ($list_id && $list_name && $list_status) {
                $data = array(
                    'list_id' => $list_id,
                    'list_name' => $list_name,
                    'list_status' => $list_status
                );
            }
            $this->load->model('Lists');
            $this->Lists->update($data);
            redirect(base_url('/Main/index'));
        } else {
            $this->error('An error occurred while trying to update a List');
        }
    }

    //deletes an exiting List
    public function deleteList($id)
    {
        if(!empty($id)) {
            $this->load->model('Lists');
            $this->Lists->delete($id);
            redirect(base_url('Main/index'));
        } else {
            $this->error('An error occurred while trying to delete a List');
        }
    }


    //..........Items..........//
    //creates a new Item
    public function createItem()
    {
        if (!empty($_POST)) {
            $list_id = $this->input->post('createItemListId');
            $item_name = $this->input->post('createItemName');
            $item_details = $this->input->post('createItemDetails');
            $item_status = $this->input->post('createItemStatus');
            $item_time = $this->input->post('createItemTime');
            if ($list_id && $item_name && $item_details) {
                $data = array(
                    'list_id' => $list_id,
                    'item_name' => $item_name,
                    'item_details' => $item_details,
                    'item_status' => $item_status,
                    'item_time' => $item_time
                );
            }
            var_dump($list_id, $item_name, $item_details, $item_status, $item_time);
            $this->load->model('Items');
            $this->Items->insert($data);
            redirect(base_url('/Main/index'));
        } else {
            $this->error('An error occurred while trying to create an Item');
        }
    }

    //updates an exiting Item
    public function updateItem()
    {
        if (!empty($_POST)) {
            $item_id = $this->input->post('updateList');
            $list_id = $this->input->post('updateItemListId');
            $item_name = $this->input->post('updateItemName');
            $item_details = $this->input->post('updateItemDetails');
            $item_status = $this->input->post('updateItemStatus');
            $item_time = $this->input->post('updateItemTime');
            if ($item_id && $list_id && $item_name && $item_details) {
                $data = array(
                    'item_id' => $item_id,
                    'list_id' => $list_id,
                    'item_name' => $item_name,
                    'item_details' => $item_details,
                    'item_status' => $item_status,
                    'item_time' => $item_time
                );
            }
            $this->load->model('Items');
            $this->Items->update($data);
            redirect(base_url('Main/index'));
        } else {
            $this->error('An error occurred while trying to update an Item');
        }
    }

    //deletes an exiting Item
    public function deleteItem($id)
    {
        if(!empty($id)) {
            $this->load->model('Items');
            $this->Items->delete($id);
            redirect(base_url('Main/index'));
        } else {
            $this->error('An error occurred while trying to delete an Item');
        }
    }


}