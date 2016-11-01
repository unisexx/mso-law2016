<?php echo modules::run('home/inc_hilight'); ?>

<!-----------------------------------EnD Slide------------------------------------------------------------------------------------------------->
<div class="filter" style="margin-top:22px!important;">
  <label> <span class="title-filter"><?=lang("ho_search")?></span> </label> <br>
  <form method="get" action="law_search" data-toggle="validator" role="form">
    <input type="text" id="searchtext" name="searchtext" class="input-filter" placeholder="" value="<?php echo @$_GET['searchtext'];?>" required="true" data-error="กรุณากรอกคำค้นหา">
    <input type="hidden" name="tools" value="b" class="input-filter" placeholder=""> <button type="submit" class="btn-filter">Search</button>
  </form>
  <div class="key-filter"> <img src="themes/law/images/icon-triangle.png" width="13" height="15"> <?=lang("ho_search_top")?> : 
            <?php echo modules::run('home/inc_top_search'); ?> </div> </div>
<?php echo $htmlSearch;?>
