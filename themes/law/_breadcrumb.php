<?php
/************** WEBBOARD **************/
if($this->uri->segment(1) == "webboard" && $this->uri->segment(2) == "" && $this->uri->segment(3) == ""){
	$breadcrumb = '<li><a href="home">'.lang("h_home").'</a></li><li class="active">'.lang("h_webboard").'</li>';
}

if($this->uri->segment(1) == "webboard" && $this->uri->segment(2) == "form" && $this->uri->segment(3) == ""){
 	$breadcrumb = '<li><a href="home">'.lang("h_home").'</a></li><li><a href="webboard">'.lang("h_webboard").'</a></li><li class="active">'.lang("b_create_title").'</li>';
}

if($this->uri->segment(1) == "webboard" && $this->uri->segment(2) == "view" && is_numeric($this->uri->segment(3))){
 	$breadcrumb = '<li><a href="home">'.lang("h_home").'</a></li><li><a href="webboard">'.lang("h_webboard").'</a></li><li class="active">'.get_webboard_quiz_name($this->uri->segment(3)).'</li>';
}

/************** PLAN **************/
if($this->uri->segment(1) == "law_plans"){
 	$breadcrumb = '<li><a href="home">'.lang("h_home").'</a></li><li class="active">'.lang("h_plan").'</li>';
}

/************** WEBLINKS **************/
if($this->uri->segment(1) == "weblinks"){
 	$breadcrumb = '<li><a href="home">'.lang("h_home").'</a></li><li class="active">'.lang("h_other").'</li>';
}

/************** Law type_list **************/
if($this->uri->segment(1) == "law" && $this->uri->segment(2) == "type_list" && is_numeric($this->uri->segment(3))){
	$breadcrumb = '<li><a href="home">'.lang("h_home").'</a></li><li class="active">'.get_law_type_name($this->uri->segment(3)).'</li>';
}

/************** Law group_list **************/
if($this->uri->segment(1) == "law" && $this->uri->segment(2) == "group_list"){
	$breadcrumb = '<li><a href="home">'.lang("h_home").'</a></li><li class="active">'.lang("h_group").'</li>';
}

/************** Law view **************/
if($this->uri->segment(1) == "law" && $this->uri->segment(2) == "view" && is_numeric($this->uri->segment(3))){
	$breadcrumb = '<li><a href="home">'.lang("h_home").'</a></li><li class="active">'.lang("v_law_detail").'</li>';
}

/************** Law Search **************/
if($this->uri->segment(1) == "law_search"){
 	$breadcrumb = '<li><a href="home">'.lang("h_home").'</a></li><li class="active">'.lang("ho_search").'</li>';
}
?>

<ol class="breadcrumb2">
  <!-- <li><a href="#">'.lang("h_home").'</a></li>
  <li class="active">'.lang("h_plan").'</li> -->
  <?=$breadcrumb?>
</ol>
