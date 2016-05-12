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
		$this->template->build('index',$data);
	}
}
?>
