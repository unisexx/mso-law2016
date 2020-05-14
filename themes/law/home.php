<html>

<head>
    <base href="<?php echo base_url(); ?>" />
    <link rel="icon" href="D:\MyJob\m-so-58\template-Lawwwww\html-law\images\favicon.ico">
    <title><?php echo $template['title'] ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=11; IE=10; IE=EDGE" />
    <? include "_inc.php";?>
    <?php echo $template['metadata'] ?>
</head>

<body>
    <div class="navbar navbar-default navbar-static-top" id="top">
        <div class="container">
            <? include "_header.php";?>


            <?php echo modules::run('home/inc_hilight'); ?>
            <!-----------------------------------EnD Slide------------------------------------------------------------------------------------------------->


            <div class="filter">
                <label>
                    <span class="title-filter"><?=lang("ho_search")?></span>
                </label>
                <br>
                <form method="get" action="law_search">

                    <label><input type="radio" name="type" value="title" checked> ค้นหาจากชื่อกฏหมาย</label>
                    <label style="margin-left:10px;"><input type="radio" name="type" value="file"> ค้นหาจากเอกสารแนบกฏหมาย</label>

                    <input type="text" id="searchtext" name="searchtext" class="input-filter"
                        placeholder="<?=lang("ho_search_placeholder2")?>" required autofocus>
                    <input type="hidden" name="tools" value="b" class="input-filter" placeholder="">

                    <button type="submit" class="btn-filter">Search</button>
                </form>
                <div class="key-filter">
                    <img src="themes/law/images/icon-triangle.png" width="13" height="15">
                    <?=lang("ho_search_top")?> :
                    <?php echo modules::run('home/inc_top_search'); ?>
                </div>
            </div>
            <div class="clearfix">&nbsp;</div>
            <!-----------------------------------EnD Filter------------------------------------------------------------------------------------------------->

            <?php echo modules::run('home/inc_newlaw'); ?>
            <!-----------------------------------กฎหมายใหม่...------------------------------------------------------------------------------------------------->

            <?php echo modules::run('home/inc_lawtype'); ?>
            <!-----------------------------------กฎหมายประเภทต่างๆ------------------------------------------------------------------------------------------------->

            <?php echo modules::run('home/inc_group_list'); ?>
            <!-----------------------------------กฎหมาย แสดงข้อมูลแบบกลุ่ม------------------------------------------------------------------------------------------------->

            <!-- <div class="download">
          <div class="text-download">
            <strong><?=lang("ho_download_doc")?></strong>
            <ul>
              <li>
                <a href="http://law.m-society.go.th/law/download/L0001.pdf" target="_blank">คู่มือการใช้งานระบบฐานข้อมูลกฎหมายของผู้ใช้งานทั่วไป</a>
              </li>
              <li>
                <a href="#">คู่มือการใช้งานระบบฐานข้อมูลกฎหมายของผู้ใช้งานทั่วไป</a>
              </li>
            </ul>
          </div>
          <div class="pic-download">
            <img src="themes/law/images/icon-docs.png" width="140" height="116" class="pic-doc">
          </div>
        </div> -->

            <?php echo modules::run('home/inc_poll'); ?>
            <div class="clearfix">&nbsp;</div>
            <!-----------------------------------End poll------------------------------------------------------------------------------------------------->
        </div>


        <? include "_footer.php";?>

        <!--
      <div class="copy">Copyright @ 2015. All rights reserved.
        <a href="#">http://law.m-society.go.th</a>
      </div>-->

    </div>
    <!-----------------------------------End wrap1------------------------------------------------------------------------------------------------->


</body>

</html>