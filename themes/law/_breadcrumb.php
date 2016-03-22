<?php
/************** WEBBOARD **************/
if($this->uri->segment(1) == "webboard" && $this->uri->segment(2) == "" && $this->uri->segment(3) == ""){
	$breadcrumb = '<li><a href="home">หน้าแรก</a></li><li class="active">กระทู้ ถาม-ตอบ</li>';
}

if($this->uri->segment(1) == "webboard" && $this->uri->segment(2) == "form" && $this->uri->segment(3) == ""){
 	$breadcrumb = '<li><a href="home">หน้าแรก</a></li><li><a href="webboard">กระทู้ ถาม-ตอบ</a></li><li class="active">สร้างคำถามใหม่</li>';
}

if($this->uri->segment(1) == "webboard" && $this->uri->segment(2) == "view" && is_numeric($this->uri->segment(3))){
 	$breadcrumb = '<li><a href="home">หน้าแรก</a></li><li><a href="webboard">กระทู้ ถาม-ตอบ</a></li><li class="active">'.get_webboard_quiz_name($this->uri->segment(3)).'</li>';
}

/************** PLAN **************/
if($this->uri->segment(1) == "law_plans"){
 	$breadcrumb = '<li><a href="home">หน้าแรก</a></li><li class="active">แผนพัฒนากฎหมาย</li>';
}

/************** WEBLINKS **************/
if($this->uri->segment(1) == "weblinks"){
 	$breadcrumb = '<li><a href="home">หน้าแรก</a></li><li class="active">หน่วยงานกฎหมายอื่น</li>';
}

/************** Law Type **************/
if($this->uri->segment(1) == "law" && $this->uri->segment(2) == "type_list" && is_numeric($this->uri->segment(3))){
	$breadcrumb = '<li><a href="home">หน้าแรก</a></li><li class="active">'.get_law_type_name($this->uri->segment(3)).'</li>';
}
?>

<ol class="breadcrumb2">
  <!-- <li><a href="#">หน้าแรก</a></li>
  <li class="active">แผนพัฒนากฎหมาย</li> -->
  <?=$breadcrumb?>
</ol>
