<?php

require("AbstractController.php");

class Dental_list extends AbstractController {
    function __construct(){
        parent::__construct();

        $this->load->model('code_model');
        $this->limit = $this->code_model->getMaxDisplayCount();
    }

    public function index(){
        parent::index();
        $this->search();
    }

    public function action(){
        $form = $this->input->post();

        if(isset($form["search"])) {
            // 検索
            parent::clearOffset();
            $this->search();

        }else if(isset($form["clear"])){
            // クリア
            $_POST["name"] = "";
            $_POST["address"] = "";
            parent::clearOffset();
            $this->search();

        }else if(isset($form["prev"])){
            // 前ページ
            parent::setOffset($this->limit, true);
            $this->search();
            
        }else if(isset($form["next"])){
            // 次ページ
            parent::setOffset($this->limit, false);
            $this->search();

        }else if(isset($form["first"])){
            // 最初のページ
            parent::clearOffset();
            $this->search();

        }else if(isset($form["last"])){
            // 最後のページ
            parent::setOffsetLast($this->limit, $this->input->post("total"));
            $this->search();
        }
    }

    private function search(){
        $this->load->model('dental_model');
 
        $name = $this->input->post("name");
        $address = $this->input->post("address");
        $offset = $this->input->post("offset");

        $result = $this->dental_model->select($name, $address, $this->limit, $offset);

        if($result){
            $data["results"] = $result["data"];
            $data["total"] = $result["total"];
            $data["errors"] = array();
            $data["offset"] = $offset;
            $data["limit"] = $this->limit;

            parent::showTemplatePage($data, "pages/dental_list");
        }else{
            $data["results"] = array();
            $data["errors"] = array("検索結果が存在しませんでした。");
            $data["offset"] = $offset;

            parent::showTemplatePage($data, "pages/dental_list");
        }
    }

    /**
     * ページタイトルを取得します。
     */
    protected function getTitle(){
        return "茨城県の歯科医院一覧";
    }
}