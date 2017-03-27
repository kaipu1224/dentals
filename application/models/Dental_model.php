<?php

/**
 * 歯科医院マスタのモデル
 */
class Dental_model extends CI_Model {
    /**
     * 検索します。
     * @param $name 名称
     * @param $address 住所
     */
    public function select($name, $address, $limit, $offset) {
        // トータル件数取得
        $this->db->start_cache();
        if(strlen($name) > 0){
            $this->db->like("name", $name, "both");
        }
        if(strlen($address) > 0){
            $this->db->like("address", $address, "both");
        }
        $this->db->stop_cache();
        $total = $this->db->get("m_dental")->num_rows();
        
        // 表示用データ取得
        $this->db->limit($limit, $offset)->order_by("name", "asc");

        $query = $this->db->get("m_dental");
        if($query->num_rows() == 0){
            return false;
        }else{
            $result = array(
                "total" => $total,
                "data" => $query->result() 
            );
            return $result;
        }
    }
}