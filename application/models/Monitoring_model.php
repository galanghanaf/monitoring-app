<?php

//untuk menampilkan data, dibutuhkan model
class Monitoring_model extends CI_Model
{
    public function get_data($table)
    {

        return $this->db->get($table);
    }


    // Opening Task List
    public function getAllTaskList()
    {
        $this->db->select("*");
        $this->db->from("task_list");
        $this->db->order_by("id", "desc");
        $query = $this->db->get();
        return $query->result();
    }
    // End Task List



    // Opening Data Admin
    public function getAllDataAdmin()
    {
        $this->db->select("*");
        $this->db->from("user");
        $this->db->order_by("id", "desc");
        $query = $this->db->get();
        return $query->result();
    }
    // End Data Admin




    // Opening Log Book
    public function getAllLogBook()
    {
        $this->db->select("*");
        $this->db->from("logbook");
        $this->db->order_by("id", "desc");
        $query = $this->db->get();
        return $query->result();
    }
    // End Log Book



    // Opening Ip Static
    public function getAllIpStatic()
    {
        $this->db->select("*");
        $this->db->from("ipstatic");
        $this->db->order_by("id", "desc");
        $query = $this->db->get();
        return $query->result();
    }
    // End Ip Static



    // Opening IT ASSET
    public function getAllItAsset()
    {

        return $this->db->get('it_asset')->result_array();
    }
    public function getItAsset()
    {
        $this->db->select("*");
        $this->db->from("it_asset");
        $this->db->order_by("id", "desc");
        $query = $this->db->get();
        return $query->result();
    }
    // End IT ASSET



    // Opening OT ASSET
    public function getAllOtAsset()
    {

        return $this->db->get('ot_asset')->result_array();
    }

    public function getOtAsset()
    {
        $this->db->select("*");
        $this->db->from("ot_asset");
        $this->db->order_by("id", "desc");
        $query = $this->db->get();
        return $query->result();
    }
    // End OT ASSET

    // Opening Access Point
    public function getAllAccessPoint()
    {
        $this->db->select("*");
        $this->db->from("access_point");
        $this->db->order_by("id", "desc");
        $query = $this->db->get();
        return $query->result();
    }
    // End Access Point



    // Opening Switch
    public function getAllSwitchPoint()
    {
        $this->db->select("*");
        $this->db->from("switchpoint");
        $this->db->order_by("id", "desc");
        $query = $this->db->get();
        return $query->result();
    }
    // End Switch Point



    // Opening Location Map
    public function getAllLocationMap()
    {

        return $this->db->get('locationmap')->result_array();
    }

    public function getLocationMap($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('location', $keyword);
        }
        return $this->db->get('locationmap', $limit, $start)->result_array();
    }

    public function countAllLocationMap()
    {

        return $this->db->get('locationmap')->num_rows();
    }
    // End Location Map





    public function insert_data($data, $table)
    {
        $orig_debug = $this->db->db_debug;
        $this->db->db_debug = FALSE;

        if ($this->db->insert($table, $data)) {
            $this->db->db_debug = $orig_debug;
            return true;
        } else {
            $this->db->db_debug = $orig_debug;
            return false;
        }
    }

    public function update_data($table, $data, $where)
    {
        $orig_debug = $this->db->db_debug;
        $this->db->db_debug = FALSE;

        if ($this->db->update($table, $data, $where)) {
            $this->db->db_debug = $orig_debug;
            return true;
        } else {
            $this->db->db_debug = $orig_debug;
            return false;
        }
    }



    public function delete_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function insert_batch($table = null, $data = array())
    {
        $jumlah = count($data);
        if ($jumlah > 0) {
            $this->db->insert_batch($table, $data);
        }
    }
}
