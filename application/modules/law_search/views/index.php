<div id="highlight" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#highlight" data-slide-to="0" class="active"></li>
    <li data-target="#highlight" data-slide-to="1"></li>
    <li data-target="#highlight" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="themes/law/images/slide01.png" width="863" height="266">
      <!-- <div class="carousel-caption">
        ...
      </div> -->
    </div>
    <div class="item">
      <img src="themes/law/images/slide01.png" width="863" height="266">
      <!-- <div class="carousel-caption">
        ...
      </div> -->
    </div>
    <div class="item">
      <img src="themes/law/images/slide01.png" width="863" height="266">
      <!-- <div class="carousel-caption">
        ...
      </div> -->
    </div>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#highlight" role="button" data-slide="prev">
    <i class="icon-prev fa fa-angle-left"></i>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#highlight" role="button" data-slide="next">
    <i class="icon-next fa fa-angle-right"></i>
    <span class="sr-only">Next</span>
  </a>
</div>
<!-----------------------------------EnD Slide------------------------------------------------------------------------------------------------->
<div class="filter" style="margin-top:22px!important;">
  <label> <span class="title-filter">ค้นหากฎหมาย</span> </label> <br>
  <form method="get" action="law_search" data-toggle="validator" role="form">
    <input type="text" id="searchtext" name="searchtext" class="input-filter" placeholder="" value="<?php echo @$_GET['searchtext'];?>" required="true" data-error="กรุณากรอกคำค้นหา">
    <input type="hidden" name="tools" value="b" class="input-filter" placeholder=""> <button type="submit" class="btn-filter">Search</button>
  </form>
  <div class="key-filter"> <img src="themes/law/images/icon-triangle.png" width="13" height="15"> <a href="#">คำค้นหายอดนิยม</a> </div> </div>
<?php echo $htmlSearch;?>
