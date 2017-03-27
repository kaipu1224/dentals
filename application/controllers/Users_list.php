<?php

require("AbstractController.php");

/**
 * ユーザ一覧のコントローラ
 */
class Users_list extends AbstractController {
    // 表示件数制限
    protected $limit = 1;

    function __construct(){
        parent::__construct();

        $this->load->model('code_model');
        $this->limit = $this->code_model->getMaxDisplayCount();
    }

    public function index(){
        parent::index();
        $this->search();
    }

    /**
     * サブミット処理を振り分けます。
     */
    public function action(){
        $form = $this->input->post();

        if(isset($form["search"])) {
            // 検索
            parent::clearOffset();
            $this->search();

        }else if(isset($form["clear"])){
            // クリア
            $_POST["userid"] = "";
            $_POST["name"] = "";
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

    /**
     * 検索します。
     */
    public function search(){
        $this->load->model('users_model');

        $userid = $this->input->post("userid"); 
        $name = $this->input->post("name");
        $offset = $this->input->post("offset");

        $result = $this->users_model->selectUsers($userid, $name, $this->limit, $offset);
        if($result){
            $data["results"] = $result["data"];
            $data["total"] = $result["total"];
            $data["errors"] = array();
            $data["offset"] = $offset;

            parent::showTemplatePage($data, "pages/users_list");
        }else{
            $data["results"] = array();
            $data["errors"] = array("検索結果が存在しませんでした。");
            $data["offset"] = $offset;

            parent::showTemplatePage($data, "pages/users_list");
        }
    }

    /**
     * ページタイトルを取得します。
     */
    protected function getTitle(){
        return "ユーザ一覧";
    }
}