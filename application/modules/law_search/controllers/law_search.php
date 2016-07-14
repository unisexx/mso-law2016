<?php
class Law_Search extends Public_Controller{

	function __construct(){
		parent::__construct();
        // $this->template->set_layout('_blank');
	}

	function index(){
		$searchtext = str_replace("\\","",@$_GET['searchtext']);
		$tools = @$_GET['tools'];
		$todo = @$_GET['todo'];
		$next = @$_GET['next'];
		$html = '';
		if($tools == "b"){
				include 'include/config.inc.php';
				include 'include/class.db.php';
        include "include/class.serach.php";
        $cSearch = new serach();
        if(@$todo == ""){
            $cSearch->searchT($searchtext,"doSearch_7");
            $_SESSION['Cookies']= $cSearch->getCookies();
        }

        //print_r($_SESSION['Cookies']);

        if($todo != ""){
            $cSearch->setCookies($_SESSION['Cookies']);
            $cSearch->serachNext($todo);
            $_SESSION['Cookies']= $cSearch->getCookies();
        }
       // $countWord = $cSearch->getFindCount();

        //$html .= $cSearch->_display($next);
        $html .= $cSearch->_displayNew($next,$searchtext,$tools);
        $htmlSearch = $html;
    }
		$data['htmlSearch'] = $htmlSearch;
		
		
		// save law_searchlog
		$user_type = $this->session->userdata('id') != '' ? 2 : 1;
		$ip = $_SERVER['REMOTE_ADDR'];
		$this->db->query("INSERT INTO law_searchlog (keyword,keytime,keyuser,created,ip)values('".$searchtext."','".date("Y-m-d H-i-s")."',".$user_type.",'".date("Y-m-d H:i:s")."','".$ip."')");
		
		$this->template->build('index',$data);
	}
}
?>
