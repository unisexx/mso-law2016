<style>
.lawtype_cat{
	width: 171px;
    height: 171px;
    display: block;
    float: left;
    cursor: pointer;
}
.text_cat{color:#333;text-decoration:none;margin-top:5px;}
#overlay    {  
   background: rgba(235, 104, 65, 0.70);
   text-align:center;
   padding:70px 0 0 0;
   opacity:0;
   -webkit-transition: opacity .25s ease;
   -moz-transition: opacity .25s ease;
   width: 171px;
    height: 171px;
    border-radius: 100px;
}
#cat-laww li:hover #overlay {opacity:1;}
#plus {color:rgba(255,255,255,1);}
<?foreach($rs as $row):?>
.lawtype_cat<?=$row->id?> {
    width: 171px;
    height: 171px;
    background-image: url(<?=$row->pic?>);
    background-repeat: no-repeat;
    display: block;
    float: left;
    cursor: pointer;
}
<?endforeach;?>
</style>

<div id="cat-law">
  <span class="title-law1">กฎหมายประเภทต่างๆ</span>
  <div class="line1">&nbsp;</div>
  
  <div id="cat-laww" data-interval="false" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner" role="listbox">
      <div class="item active" id="cate">
      	<ul>
      	<?$item = 4?>
      	<?foreach($rs as $key=>$row):?>
      	<?=(($key%$item)==0 && ($key != 0))? '</ul></div><div class="item"  id="cate"><ul>' : '' ;?>
		<li class="lawtype_cat<?=$row->id?>">
            <a href="law/type_list/<?=$row->id?>">
            	<div id="overlay">
			    <span id="plus"><i class="fa fa-search fa-2x"></i></span>
			  </div>	
            	<br>
            	<div class="text_cat"><?=lang_decode($row->name)?></div>
            </a>
		</li>
      	<?endforeach;?>
      	</ul>
    </div>
    <a class="left carousel-control" href="#cat-laww" data-slide="prev" id="arrow-left-cat"><i class="arrow-left"></i></a>
    <a class="right carousel-control" href="#cat-laww" data-slide="next" id="arrow-right-cat"><i class="arrow-right"></i></a>
  </div>
  
  
 </div>
</div>
<div class="clearfix">&nbsp;</div>