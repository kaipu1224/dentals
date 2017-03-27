<?php

/**
 * コードマスタのモデル
 */
class Code_model extends CI_Model {
    /**
     * コードマスタから１件取得します。
     * @param $codeNo コードNO
     * @param $code コード
     */
    public function selectByKey($codeNo, $code) {
        $this->db->where("code_no", $codeNo);
        $this->db->where("code", $code);
        $query = $this->db->get("m_code");

        if($query->num_rows() == 1){
            return $query->row(0);
        }else{
            return false;
        }
    }

    /**
     * 最大表示件数を取得します。
     */
    public function getMaxDisplayCount(){
        $result = $this->selectByKey("002", "max_count");

        if($result){
            return $result->code_value;
        }else{
            // デフォルト100
            return 100;
        }
    }
}