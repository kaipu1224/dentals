<?php

require("AbstractController.php");

class Dental_map extends AbstractController {
    function __construct(){
        parent::__construct();

        $this->load->model('code_model');
        $this->limit = $this->code_model->getMaxDisplayCount();
    }

    public function index(){
        parent::index();

        $data["results"] = array();
        $data["errors"] = array();
        $data["offset"] = 0;

        parent::showTemplatePage($data, "pages/dental_map");
    }

    public function action(){
        $form = $this->input->post();

        if(isset($form["search"])) {
            // 検索
            parent::clearOffset();
            $this->search();
        }
    }

    private function search(){
        $this->load->model('dental_model');
 
        $name = "";
        $address = "水戸";
        $offset = $this->input->post("offset");

        $result = $this->dental_model->select($name, $address, 1000, $offset);

        echo json_encode($result);
    }

    /**
     * ページタイトルを取得します。
     */
    protected function getTitle(){
        return "茨城県の歯科医院(地図)";
    }
}