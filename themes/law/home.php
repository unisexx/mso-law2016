<html>
  <head>
    <base href="<?php echo base_url(); ?>" />
    <link rel="icon" href="D:\MyJob\m-so-58\template-Lawwwww\html-law\images\favicon.ico">
    <title><?php echo $template['title'] ?></title>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <? include "_inc.php";?>
      <?php echo $template['metadata'] ?>
  </head><body>
    <div class="navbar navbar-default navbar-static-top" id="top">
      <div class="container">
        <? include "_header.php";?>


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


        <div class="filter">
          <label>
            <span class="title-filter">ค้นหากฎหมาย</span>
          </label>
          <br>
          <input type="text" class="input-filter" placeholder="">
          <button type="button" class="btn-filter">Search</button>
          <div class="key-filter">
            <img src="themes/law/images/icon-triangle.png" width="13" height="15">
            <a href="#">คำค้นหายอดนิยม</a>
          </div>
        </div>
        <div class="clearfix">&nbsp;</div>
        <!-----------------------------------EnD Filter------------------------------------------------------------------------------------------------->

        <?php echo modules::run('home/inc_newlaw'); ?>
        <!-----------------------------------กฎหมายใหม่...------------------------------------------------------------------------------------------------->


        <div id="cat-law">
          <span class="title-law1">กฎหมายประเภทต่างๆ</span>
          <div class="line1">&nbsp;</div>
          <div data-interval="false" class="carousel slide" data-ride="carousel" id="cat-laww">
            <div class="carousel-inner">
              <div class="item active" id="cate">
                <ul>
                  <li class="cat1">
                    <a href="#">&nbsp;<br><div class="text-cat">กฎหมายเด็กและเยาวชน</div></a>
                  </li>
                  <li class="cat2">
                    <a href="#">&nbsp;<br><div class="text-cat">กลุ่มกฎหมายการส่งเสริม<br>และพัฒนาคุณภาพชีวิต<br>คนพิการ</div></a>
                  </li>
                  <li class="cat3">
                    <a href="#">&nbsp;<br><div class="text-cat">กฎหมายผู้สูงอายุ</div></a>
                  </li>
                  <li class="cat4">
                    <a href="#">&nbsp;<br><div class="text-cat">กฎหมายสวัสดิการสังคม</div></a>
                  </li>
                </ul>
              </div>
              <div class="item">
                <div class="item active" id="cate">
                  <ul>
                    <li class="cat5">
                      <a href="#">&nbsp;<br><div class="text-cat">กฎหมายพัฒนาชุมชนและสังคม</div></a>
                    </li>
                    <li class="cat6">
                      <a href="#">&nbsp;<br><div class="text-cat">กฎหมายป้องกันและปราบปราม<br>การค้ามนุษย์และการค้าประเวณี<br>และควบคุมการขอทาน</div></a>
                    </li>
                    <li class="cat7">
                      <a href="#">&nbsp;<br><div class="text-cat">กฎหมายสตรีและสถาบันครอบครัว</div></a>
                    </li>
                    <li class="cat8">
                      <a href="#">&nbsp;<br><div class="text-cat">กฎหมายจัดตั้งกระทรวง</div></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <a class="left carousel-control" href="#carousel-example" data-slide="prev" id="arrow-left-cat"><i class="arrow-left"></i></a>
            <a class="right carousel-control" href="#carousel-example" data-slide="next" id="arrow-right-cat"><i class="arrow-right"></i></a>
          </div>
        </div>
        <div class="clearfix">&nbsp;</div>
        <!-----------------------------------กฎหมายประเภทต่างๆ------------------------------------------------------------------------------------------------->
        <div id="cat-group">
          <span class="title-law1">กฎหมาย แสดงข้อมูลแบบกลุ่ม</span>
          <div id="bgcat-group">
            <label class="text-cat-group">กลุ่มกฎหมาย :</label>
            <select class="form-control" id="input-cat-group">
              <option>ในภารกิจ</option>
              <option>กฎหมายประกอบภารกิจ</option>
            </select>
            <label class="text-cat-group">หมวดกฎหมาย :</label>
            <select class="form-control" id="input-cat-group">
              <option>กฎหมายเด็กและเยาวชน</option>
              <option>กลุ่มกฎหมายการส่งเสริมและพัฒนาคุณภาพชีวิตคนพิการ</option>
              <option>กฎหมายผู้สูงอายุ</option>
              <option>กฎหมายสวัสดิการสังคม</option>
              <option>กฎหมายพัฒนาชุมชนและสังคม</option>
              <option>กฎหมายป้องกันและปราบปรามการค้ามนุษย์และการค้าประเวณี</option>
              <option>กฎหมายสตรีและสถาบันครอบครัว</option>
              <option>กลุ่มกฎหมายการส่งเสริมและพัฒนาคุณภาพชีวิตคนพิการ</option>
              <option>กฎหมายจัดตั้งกระทรวง</option>
              <option>กลุ่มกฎหมายการส่งเสริมและพัฒนาคุณภาพชีวิตคนพิการ</option>
            </select>
            <div class="clearfix">&nbsp;</div>
            <div class="container_demo">
              <table width="99%" border="0" cellspacing="0" cellpadding="0" class="text-head">
                <tbody>
                  <tr>
                    <td width="7">&nbsp;</td>
                    <td valign="top">กฎหมาย</td>
                    <td colspan="2" valign="top" align="center">ดาวน์โหลด</td>
                  </tr>
                  <tr>
                    <td width="10">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td valign="top" width="30" align="center">th</td>
                    <td valign="top" width="30" align="center">eng</td>
                  </tr>
                </tbody>
              </table>
              <!-- Accordion begin -->
              <ul class="accordion_example">
                <!-- Section 1 -->
                <li>
                  <div>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tbody>
                        <tr>
                          <td class="td-line" width="30">
                            <img src="themes/law/images/icon-folder-plus.png" width="19" height="15">
                          </td>
                          <td class="td-line">พระราชบัญญัติ การรับเด็กเป็นบุตรบุญธรรม (ฉบับที่ 3) พ.ศ. 2553</td>
                          <td valign="top" width="30" class="td-line">
                            <a href="#"><img src="themes/law/images/icon-pdf.png" width="16" height="16" class="icon-hover"></a>
                            </td>
                            <td valign="top" width="30" class="td-line">
                              <a href="#"><img src="themes/law/images/icon-pdf.png" width="16" height="16" class="icon-hover"></a>
                            </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <!-- Head -->
                  <div>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tbody>
                        <tr>
                          <td width="30">&nbsp;</td>
                          <td width="20" valign="top" class="td-line">
                            <img src="themes/law/images/icon-page-gray.png" width="10" height="14">
                          </td>
                          <td valign="top" class="td-line">กฎกระทรวงกระบวนการให้คำปรึกษาเยียวยาก่อนเลิกรับบุตรบุญธรรมซึ่งยังเป็นเด็ก
                            พ.ศ. 2554</td>
                          <td valign="top" width="30" class="td-line">
                            <a href="#"><img src="themes/law/images/icon-pdf.png" width="16" height="16" class="icon-hover"></a>
                          </td>
                          <td valign="top" width="30" class="td-line">
                            <a href="#"><img src="themes/law/images/icon-pdf.png" width="16" height="16" class="icon-hover"></a>
                          </td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td valign="top" class="td-line">
                            <img src="themes/law/images/icon-page-gray.png" width="10" height="14">
                          </td>
                          <td valign="top" class="td-line">ฎกระทรวงการสอบคุณสมบัติและข้อเท็จจริงเกี่ยวกับสภาพความเป็นอยู่และความเหมาะสมของผู้ขอรับเด็กเป็นบุตรบุญธรรม
                            บุคคลผู้มีอำนาจให้ความยินยอมในการรับเด็กเป็นบุตรบุญธรรม และเด็กที่จะเป็นบุตรบุญธรรม
                            พ.ศ. 2554</td>
                          <td valign="top" class="td-line">
                            <a href="#"><img src="themes/law/images/icon-pdf.png" width="16" height="16" class="icon-hover"></a>
                          </td>
                          <td valign="top" class="td-line">
                            <a href="#"><img src="themes/law/images/icon-pdf.png" width="16" height="16" class="icon-hover"></a>
                          </td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td valign="top" class="td-line">
                            <img src="themes/law/images/icon-page-gray.png" width="10" height="14">
                          </td>
                          <td valign="top" class="td-line">ระเบียบคณะกรรมการการรับเด็กเป็นบุตรบุญธรรม ว่าด้วยหลักเกณฑ์ วิธีการ และเงื่อนไขการเตรียมความพร้อมในการรับเด็กเป็นบุตรบุญธรรม
                            พ.ศ. 2554</td>
                          <td valign="top" class="td-line">
                            <a href="#"><img src="themes/law/images/icon-pdf.png" width="16" height="16" class="icon-hover"></a>
                          </td>
                          <td valign="top" class="td-line">
                            <a href="#"><img src="themes/law/images/icon-pdf.png" width="16" height="16" class="icon-hover"></a>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </li>
                <!-- Section 2 -->
                <li>
                  <div>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tbody>
                        <tr>
                          <td class="td-line" width="30">
                            <img src="themes/law/images/icon-page-blue.png" width="13" height="18">
                          </td>
                          <td class="td-line">พระราชบัญญัติ จัดการฝึกและอบรมเด็กบางจำพวก (ฉบับที่ 2) พ.ศ. 2501</td>
                          <td valign="top" width="30" class="td-line">
                            <a href="#"><img src="themes/law/images/icon-word.png" width="16" height="16" class="icon-hover"></a>
                            </td>
                            <td valign="top" width="30" class="td-line">
                              <a href="#"><img src="themes/law/images/icon-word.png" width="16" height="16" class="icon-hover"></a>
                            </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <!-- Head -->
                </li>
                <!-- Section 3 -->
                <li>
                  <div>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tbody>
                        <tr>
                          <td class="td-line" width="30">
                            <img src="themes/law/images/icon-page-blue.png" width="13" height="18">
                          </td>
                          <td class="td-line">พระราชบัญญัติ จัดการฝึกและอบรมเด็กบางจำพวก พุทธศักราช 2479</td>
                          <td valign="top" width="30" class="td-line">
                            <a href="#"><img src="themes/law/images/icon-word.png" width="16" height="16" class="icon-hover"></a>
                          </td>
                          <td valign="top" width="30" class="td-line">
                            <a href="#"><img src="themes/law/images/icon-word.png" width="16" height="16" class="icon-hover"></a>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <!-- Head -->
                </li>
                <!-- Section 4 -->
                <li>
                  <div>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tbody>
                        <tr>
                          <td class="td-line" width="30">
                            <img src="themes/law/images/icon-page-blue.png" width="13" height="18">
                          </td>
                          <td class="td-line">พระราชบัญญัติการรับเด็กเป็นบุตรบุญธรรม (ฉบับที่ 2) พ.ศ. 2533</td>
                          <td valign="top" width="30" class="td-line">
                            <a href="#"><img src="themes/law/images/icon-word.png" width="16" height="16" class="icon-hover"></a>
                          </td>
                          <td valign="top" width="30" class="td-line">
                            <a href="#"><img src="themes/law/images/icon-word.png" width="16" height="16" class="icon-hover"></a>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <!-- Head -->
                </li>
                <!-- Section 5 -->
                <li>
                  <div>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tbody>
                        <tr>
                          <td class="td-line" width="30">
                            <img src="themes/law/images/icon-page-blue.png" width="13" height="18">
                          </td>
                          <td class="td-line">พระราชบัญญัติการรับเด็กเป็นบุตรบุญธรรม พ.ศ.2522</td>
                          <td valign="top" width="30" class="td-line">
                            <a href="#"><img src="themes/law/images/icon-word.png" width="16" height="16" class="icon-hover"></a>
                          </td>
                          <td valign="top" width="30" class="td-line">
                            <a href="#"><img src="themes/law/images/icon-word.png" width="16" height="16" class="icon-hover"></a>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <!-- Head -->
                </li>
                <!-- Section 6 -->
                <li>
                  <div>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tbody>
                        <tr>
                          <td class="td-line" width="30">
                            <img src="themes/law/images/icon-page-blue.png" width="13" height="18">
                          </td>
                          <td class="td-line">พระราชบัญญัติความร่วมมือระหว่างประเทศในทางแพ่งเกี่ยวกับการละเมิดสิทธิควบคุมดูแลเด็ก</td>
                          <td valign="top" width="30" class="td-line">
                            <a href="#"><img src="themes/law/images/icon-pdf.png" width="16" height="16" class="icon-hover"></a>
                            </td>
                            <td valign="top" width="30" class="td-line">
                              <a href="#"><img src="themes/law/images/icon-pdf.png" width="16" height="16" class="icon-hover"></a>
                            </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <!-- Head -->
                </li>
                <!-- Section 7 -->
                <li>
                  <div>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tbody>
                        <tr>
                          <td class="td-line" width="30">
                            <img src="themes/law/images/icon-folder-plus.png" width="19" height="15">
                          </td>
                          <td class="td-line">พระราชบัญญัติคุ้มครองเด็ก พ.ศ. 2546</td>
                          <td valign="top" width="30" class="td-line">
                            <a href="#"><img src="themes/law/images/icon-word.png" width="16" height="16" class="icon-hover"></a>
                          </td>
                          <td valign="top" width="30" class="td-line">
                            <a href="#"><img src="themes/law/images/icon-word.png" width="16" height="16" class="icon-hover"></a>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <!-- Head -->
                  <div>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tbody>
                        <tr>
                          <td width="30">&nbsp;</td>
                          <td width="20" valign="top" class="td-line">
                            <img src="themes/law/images/icon-page-gray.png" width="10" height="14">
                          </td>
                          <td valign="top" class="td-line">กฎกระทรวง กำหนดหลักเกณฑ์ วิธีการ และเงื่อนไขในการจัดระบบงานและกิจกรรมในการแนะแนว
                            ให้คำปรึกษาและฝึกอบรมแก่นักเรียน นักศึกษาและผู้ปกครอง พ.ศ. 2548</td>
                          <td valign="top" width="30" class="td-line">
                            <a href="#"><img src="themes/law/images/icon-pdf.png" width="16" height="16" class="icon-hover"></a>
                            </td>
                            <td valign="top" width="30" class="td-line">
                              <a href="#"><img src="themes/law/images/icon-pdf.png" width="16" height="16" class="icon-hover"></a>
                            </td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td valign="top" class="td-line">
                            <img src="themes/law/images/icon-page-gray.png" width="10" height="14">
                          </td>
                          <td valign="top" class="td-line">กฎกระทรวงกำหนดความประพฤติของนักเรียนและนักศึกษา พ.ศ. 2548</td>
                          <td valign="top" class="td-line">
                            <a href="#"><img src="themes/law/images/icon-word.png" width="16" height="16" class="icon-hover"></a>
                          </td>
                          <td valign="top" class="td-line">
                            <a href="#"><img src="themes/law/images/icon-word.png" width="16" height="16" class="icon-hover"></a>
                          </td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td valign="top" class="td-line">
                            <img src="themes/law/images/icon-page-gray.png" width="10" height="14">
                          </td>
                          <td valign="top" class="td-line">กฎกระทรวงกำหนดเด็กที่เสี่ยงต่อการกระทำผิด พ.ศ. 2549</td>
                          <td valign="top" class="td-line">
                            <a href="#"><img src="themes/law/images/icon-word.png" width="16" height="16" class="icon-hover"></a>
                          </td>
                          <td valign="top" class="td-line">
                            <a href="#"><img src="themes/law/images/icon-word.png" width="16" height="16" class="icon-hover"></a>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </li>
              </ul>
              <!-- Accordion end -->
            </div>
            <script type="text/javascript" src="themes/law/js/smk-accordion.js"></script>
            <script type="text/javascript">
              jQuery(document).ready(function($){
                                $(".accordion_example").smk_Accordion();
                            });
            </script>
            <div class="pages">
              <ul>
                <li class="preview">
                  <a href="#"><span> </span></a>
                </li>
                <li>
                  <a href="#">1 </a>
                </li>
                <li>
                  <a href="#">2 </a>
                </li>
                <li>
                  <a href="#">3 </a>
                </li>
                <li>
                  <a href="#">4 </a>
                </li>
                <li>
                  <a href="#">5 </a>
                </li>
                <li>
                  <a href="#">.... </a>
                </li>
                <li>
                  <a href="#">78</a>
                </li>
                <li class="next">
                  <a href="#"><span> </span></a>
                </li>
                <div class="clear"></div>
              </ul>
            </div>
          </div>
        </div>
        <div class="clearfix">&nbsp;</div>
        <!-----------------------------------กฎหมาย แสดงข้อมูลแบบกลุ่ม------------------------------------------------------------------------------------------------->
        <div class="download">
          <div class="text-download">
            <strong>ดาวน์โหลดเอกสาร</strong>
            <ul>
              <li>
                <a href="#">คู่มือการใช้งานระบบฐานข้อมูลกฎหมายของผู้ใช้งานทั่วไป</a>
              </li>
              <li>
                <a href="#">คู่มือการใช้งานระบบฐานข้อมูลกฎหมายของผู้ใช้งานทั่วไป</a>
              </li>
            </ul>
          </div>
          <div class="pic-download">
            <img src="themes/law/images/icon-docs.png" width="140" height="116" class="pic-doc">
          </div>
        </div>
        <div class="poll">
          <img src="themes/law/images/icon-questionMark.png" width="16" height="16">&nbsp;
          <strong>คุณคิดว่าเนื้อหาของระบบฐานข้อมูลกฎหมายเป็นอย่างไรบ้าง</strong>
          <table width="100%" border="0" cellspacing="0" cellpadding="0" class="tb-poll">
            <tbody>
              <tr>
                <td class="td-poll">ดีมาก</td>
                <td>
                  <div class="percent">
                    <div style="margin-left:-6px; padding-left:35px; width:80%;background-color:#e9e7e7;">80%</div>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="td-poll">ดี</td>
                <td>
                  <div class="percent">
                    <div style="margin-left:-6px; padding-left:35px; width: 30%;background-color:#e9e7e7;">30%</div>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="td-poll">พอใช้</td>
                <td>
                  <div class="percent">
                    <div style="margin-left:-6px; padding-left:35px; width:75%;background-color:#e9e7e7;">75%</div>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="td-poll">ควรปรับปรุง</td>
                <td>
                  <div class="percent">
                    <div style="margin-left:-6px; padding-left:35px; width:60%;background-color:#e9e7e7;">60%</div>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
          <a href="#" class="pollAll">ทำแบบสอบถาม</a>
        </div>
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


</body></html>
