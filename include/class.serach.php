<?php
/*
 * @desc    เป็น คลาสสำหรับส่วนการค้นหา
 *
 * @author    T.Pairin
 * @date      2009-10-28
 */
class serach {

    private $db;

    private $m_license;
    private $m_resultperpage;
    private $m_stroylength;
    private $m_estimatetotal;
    private $m_resultfieldparameter;
    private $m_searchtime;

    private $wsdl;
    private $web_service;

    private $parameter;
    private $params;
    private $result;
    private $method_name;
    private $result_name;

    private $count;

    var $showVar;
    var $path;

    var $word;

    /**
      * @desc
      * @param
      * @return
      * @author T.Pairin
      * @date   2009-10-28
      */
    function __construct(){

    //include "nusoap.php";

    $this->m_license = 'ThaiQuest';
    $this->m_resultperpage = 1000;
    $this->m_stroylength = 250;
    $this->m_estimatetotal= 0;
    $this->m_resultfieldparameter = 'ID SourceCode Headline Highlight Story Reference AttachText';
    $this->m_searchtime=1;


    $this->setPath("uploads/lawfile/");
    $this->db = new db_w();
    }

    /**
      * @desc
      * @param
      * @return
      * @author T.Pairin
      * @date   2009-10-28
      */
    function setShow($value){
    $this->showVar = $value;
    }

    /**
      * @desc
      * @param
      * @return
      * @author T.Pairin
      * @date   2009-10-28
      */
    function setInject(){
        $this->wsdl= "wsdl/injectService.wsdl";
        $this->inject();
    }

    /**
      * @desc
      * @param
      * @return
      * @author T.Pairin
      * @date   2009-10-28
      */
    function setSerach(){
        $this->wsdl= "wsdl/searchService.wsdl";
        $this->inject();
    }

    /**
      * @desc
      * @param
      * @return
      * @author T.Pairin
      * @date   2009-10-28
      */
    function setResultPage($value){
    $this->m_resultperpage = $value;
    }

    /**
      * @desc
      * @param
      * @return
      * @author T.Pairin
      * @date   2009-10-28
      */
    function setFindCount($value){
        $this->count = $value;
    }

    /**
      * @desc
      * @param
      * @return
      * @author T.Pairin
      * @date   2009-10-28
      */
    function getFindCount(){
        return $this->count;
    }

    /**
      * @desc
      * @param
      * @return
      * @author T.Pairin
      * @date   2009-10-28
      */
    function inject(){
        require_once 'nusoap.php';
        $this->web_service = new soapclientx($this->wsdl, true);
        //$this->web_service->getHTTPContentTypeCharset();
        $this->web_service->soap_defencoding = 'utf-8';
        $this->web_service->decode_utf8 = false;

        if($this->web_service->getError()){
            echo "<b><font color=\"red\">Error</font></b> -> ". $this->web_service->getError();
        }
    }

    /**
      * @desc
      * @param
      * @return
      * @author T.Pairin
      * @date   2009-10-28
      */
    function setPath($path){
        $this->path = $path;
    }

    /**
      * @desc เชื่อมต่อกับการค้นหากฎหมายของ web service
      * @param mixed $txtQuery
      * @param mixed $serachType
      * @param mixed $codeReturn
      * @return
      * @author T.Pairin
      * @date   2009-10-28
      */
    function searchT($txtQuery, $serachType, $codeReturn=''){
        $this->setSerach();
        //echo "$txtQuery";
        $txtQuery = str_replace("\\","",$txtQuery);

        if($serachType == "doSearch_7"){

            $this->parameter["Count"]= $this->m_resultperpage;
            $this->parameter["OldestFirst"] = false;
            $this->parameter["ResultFieldParameter"] = $this->m_resultfieldparameter;
            $this->parameter["StoryLength"] = $this->m_stroylength;
            $this->parameter["Field"]["Query"] = "$txtQuery";

            $this->params[] = array(
                        "PermissionKey"=>$this->m_license,
                        "Parameter"=>$this->parameter
                        );
        }

        if($serachType == "doSearch_2"){
            $this->params[] = array(
                        "PermissionKey" => $this->m_license,
                        "Query" => $txtQuery
                        );
        }


        $this->method_name = $serachType;
        $this->result_name = $serachType.'Result';

        /* echo "<pre>";
        print_r($this->params);
        echo "</pre>"; */

        if($this->showVar == 1){
            echo "<pre>";
            print_r($this->params);
            echo "</pre>";

            echo "method_name > ".$this->method_name."<br>";
            echo "result_name > ".$this->result_name."<br>";
        }

        $this->result = $this->web_service->call($this->method_name, $this->params);

        // Set Prameter
        $this->m_cookies = @$this->result[$this->result_name]['Cookies'];
        $this->m_isnext = @$this->result[$this->result_name]['IsNext'];
        $this->m_isprevious = @$this->result[$this->result_name]['IsPrevious'];
        $this->count = @$this->result[$this->result_name]['Count'];

        if($this->result[$this->result_name]['Count'] > 0){
              $this->addTempSearch($txtQuery);
             /*foreach ($this->result[$this->result_name]['Documents']['DocumentProperty'] as $value) {
                $this->addTempSearch($txtQuery,$value['ID'],$value['SourceCode']);
             }  */
        }

        /*echo "<pre>";
        print_r($this->result[$this->result_name]);
        echo "</pre>"; */

        if($this->showVar == 1){
            echo "Return Code : ".$this->result[$this->result_name]['ErrorCode']."<br>";
            echo "Count > ".$this->result[$this->result_name]['Count']."<br>";

        }

        if($this->web_service->getError()){
           echo "<b><font color=\"red\">Return INFO</font></b> -> ". $this->web_service->getError();
        }
    }

    /**
      * @desc  เชื่อมต่อกับการค้นหากฎหมายของ web service แบบ next back
      * @param mixed $todo
      * @return
      * @author T.Pairin
      * @date   2009-10-28
      */
    function serachNext($todo){
        $this->setSerach();
        //echo "Cookies > ".$this->result[$this->result_name]['Cookies'];
        //echo "Cookies > ".$this->word;
        $ck = $_SESSION['Cookies'];

        if($todo == "next"){
            $this->params[]=array(
                            "PermissionKey"=>$this->m_license,
                            "Cookies"=>$ck
                            );

            $this->method_name = 'doSearchNext';
            $this->result_name = 'doSearchNextResult';
        }

        if($todo == "back"){
            $this->params[]=array(
                            "PermissionKey"=>$this->m_license,
                            "Cookies"=>$ck
                            );

            $this->method_name = 'doSearchPrevious';
            $this->result_name = 'doSearchPreviousResult';
        }

        $this->result = $this->web_service->call($this->method_name, $this->params);
        $this->count = $this->result[$this->result_name]['Count'];
        $this->m_cookies = $this->result[$this->result_name]['Cookies'];
        $this->m_isnext = $this->result[$this->result_name]['IsNext'];
        $this->m_isprevious = $this->result[$this->result_name]['IsPrevious'];
    }

    /**
      * @desc แสดงข้อมูลหน้าการค้นหากฎหมาย
      * @param  mixed $next
      * @return $html
      * @author T.Pairin
      * @date   2009-10-28
      */
    function _display($next=''){
        if($this->result[$this->result_name]['Count'] > 0){
              $this->m_estimatetotal = $this->result[$this->result_name]['EstimateTotal'];
              $this->m_searchtime = $this->result[$this->result_name]['SearchTime'];
              if($this->result[$this->result_name]['Count'] != 1){
                // แบ่งหน้า Array
                $total = $this->result[$this->result_name]['Count'];
                $recordCount = 1;

                foreach ($this->result[$this->result_name]['Documents']['DocumentProperty'] as $value) {
                    $recordPage[$recordCount] = $value;
                    $recordCount++;

                    list($d, $m, $y) = str_replace(':', '', $value['DisplayTime']);
                    //$value = $recordPage[$i];

                    // Update RefID
            //                $arrayRef = array(
            //                    "doc_id1"=>"$value[ID]",
            //                );
            //
            //                $this->db->dbcommand("update",LAW_DATALAW,$arrayRef,' ref_code='.$value[SourceCode].' ','',1);
                   /* $sql = "select * from ".LAW_DATALAW." where doc_id1='$value[ID]' or doc_id2='$value[ID]'  ";
                    if($this->db->quick_num($sql)){*/

                    $sqlGetData = "select * from ".LAW_DATALAW." where ref_code='$value[SourceCode]' ";

		            $valueData = $this->db->quick($sqlGetData);
                    $valueData[status] ? $sTxt = "<font color=\"#0000FF\">บังคับใชั</font>" : $sTxt = "<font color=\"#FF0000\">ยกเลิก</font>";
                    $categoryName = $this->db->covertID2Name(LAW_TYPE,$valueData[law_type_id]);

                    ###################################################
                    ## T.Pairin Date 07-10-51
                    ## @comment
                    ## @version
                    // นับจำนวนครั้ง Download
                    $sqlCheck = "select count(id) as CN from ".LAW_DOWNLOAD." where filename='$valueData[filename_th]' ";
                    $valueCount = $this->db->quick($sqlCheck);
                    $valueCount[CN] ? $count = $valueCount[CN] : $count = 0;
                    ###################################################

                    //$valueData[name_th] ? $textName = $valueData[name_th] : $textName = $value['HeadLine'] ;
                    $textName = $value['Headline'] ;
                    $textName = str_replace("|"," ",$textName);

                    is_array($value['Attachs']) ? $attachTxt = $value['Attachs']['AttachmentProperty']['AttachText'] : $attachTxt = "ไม่พบข้อมูลในเนื้อไฟล์กฎหมาย";
                    $valueData[use_date] == "" ? $txtUse = "-" : $txtUse = $valueData[use_date];
                    $resultSerach .= "
                        <table width=\"700\" border=\"0\">
                          <tr>
                            <td><a href=\"#\" onclick=\"window.open('module.php?name=search&pg=showchild&do=$valueData[id]|a','view$valueData[id]','height=490,width=730,scrollbars=1,resizable=1') \" > $textName</a> <b>( สถานะ : $sTxt )</b></td>
                          </tr>
                          <tr>
                            <td>
                            <table width=\"100%\" border=\"0\">
                              <tr>
                                <td width=\"26%\">หมวดกฎหมาย </td>
                                <td width=\"74%\">$categoryName[name]</td>
                              </tr>
                              <tr>
                                <td width=\"26%\">วันที่ประกาศใช้ </td>
                                <td width=\"74%\">$valueData[notic_date]</td>
                              </tr>
                              <tr>
                                <td width=\"26%\">วันที่บังคับใช้ </td>
                                <td width=\"74%\">$txtUse</td>
                              </tr>
                              <!--
                              <tr>
                                <td>แก้ไขเพิ่มเติม</td>
                                <td>- </td>
                              </tr>
                              <tr>
                                <td>กฎหมายที่เกี่ยวข้อง</td>
                                <td>- </td>
                              </tr>
                              -->
                              <tr>
                                <td valign=\"top\">เนื้อหาไฟล์กฎหมาย</td>
                                <td>$attachTxt</td>
                              </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td><font color=\"#00AE00\"><img src=\"images/appicon/download_icon.png\" border=\"0\"  alt=\"Download $valueData[filename_th]\"><a href=\"#$valueData[filename_th]\" onclick=\"window.open('getFile.php?name=$valueData[filename_th]','view_$valueData[id]','width=200,height=200,menubar')\">Download File</a> </font>&nbsp;( <b>$count</b> ครั้ง )</td>
                          </tr>
                        </table>
                        <br>
                        <br>
                    ";
                   // }
                }
                $resultSerach .= "<br><hr size=\"1px\" >".$this->_showpage();
          }else{
                $value = $this->result[$this->result_name]['Documents']['DocumentProperty'];

                $sql = "select * from ".LAW_DATALAW." where doc_id1='$value[ID]' or doc_id2='$value[ID]' ";
                if($this->db->quick_num($sql)){

                    $sqlGetData = "select * from ".LAW_DATALAW." where ref_code='$value[SourceCode]' ";
                    $valueData = $this->db->quick($sqlGetData);
                    $valueData[status] ? $sTxt = "<font color=\"#0000FF\">บังคับใชั</font>" : $sTxt = "<font color=\"#FF0000\">ยกเลิก</font>";
                    $categoryName = $this->db->covertID2Name(LAW_TYPE,$valueData[law_type_id]);

                    ###################################################
                    ## T.Pairin Date 07-10-51
                    ## @comment
                    ## @version
                    // นับจำนวนครั้ง Download
                    $sqlCheck = "select count(id) as CN from ".LAW_DOWNLOAD." where filename='$valueData[filename_th]' ";
                    $valueCount = $this->db->quick($sqlCheck);
                    $valueCount[CN] ? $count = $valueCount[CN] : $count = 0;
                    ###################################################

                    //$valueData[name_th] ? $textName = $valueData[name_th] : $textName = $value['HeadLine'] ;
                    $textName = $value['Headline'] ;
                    $textName = str_replace("|"," ",$textName);

                    is_array($value['Attachs']) ? $attachTxt = $value['Attachs']['AttachmentProperty']['AttachText'] : $attachTxt = "ไม่พบข้อมูลในเนื้อไฟล์กฎหมาย";
                    $valueData[use_date] == "" ? $txtUse = "-" : $txtUse = $valueData[use_date];

                    $resultSerach .= "
                        <table width=\"700\" border=\"0\">
                          <tr>
                            <td><a href=\"#\" onclick=\"window.open('module.php?name=search&pg=showchild&do=$valueData[id]|a','view$valueData[id]','height=490,width=730,scrollbars=1,resizable=1') \" > $textName</a> <b>( สถานะ : $sTxt )</b></td>
                          </tr>
                          <tr>
                            <td>
                            <table width=\"100%\" border=\"0\">
                              <tr>
                                <td width=\"26%\">หมวดกฎหมาย </td>
                                <td width=\"74%\">$categoryName[name]</td>
                              </tr>
                              <tr>
                                <td width=\"26%\">วันที่ประกาศใช้ </td>
                                <td width=\"74%\">$valueData[notic_date]</td>
                              </tr>
                              <tr>
                                <td width=\"26%\">วันที่บังคับใช้ </td>
                                <td width=\"74%\">$txtUse</td>
                              </tr>
                              <tr>
                                <td valign=\"top\">เนื้อหาไฟล์กฎหมาย</td>
                                <td>$attachTxt</td>
                              </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td><font color=\"#00AE00\"><img src=\"images/appicon/download_icon.png\" border=\"0\"  alt=\"Download $valueData[filename_th]\"><a href=\"#$valueData[filename_th]\" onclick=\"window.open('getFile.php?name=$valueData[filename_th]','view_$valueData[id]','width=200,height=200,menubar')\">Download File</a> </font>&nbsp;( <b>$count</b> ครั้ง )</td>
                          </tr>
                        </table>
                        <br>
                        <br>
                        ";
                }
          }

            return $resultSerach;
        }else{

            $warning = '<div class="alert alert-warning alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>ไม่พบข้อมูล!</strong>
            </div>';
            return $warning;
        }
    }

    /**
      * @desc
      * @param  mixed $nextPage
      * @param  mixed $serachtext
      * @return $html
      * @author T.Pairin
      * @date   2009-10-28
      */
    function _showpage($nextPage='',$serachtext=''){

        $serachtext = str_replace("\"","&quot;",$serachtext);
        $this->getIsPrevious() == "true" ? $linkPre = "<img src='images/page/previous_2x_16.gif' align=absmiddle>&nbsp;<a href=\"module.php?name=search&tools=b&todo=back&serachtext=$serachtext&No_search=1\">หน้าที่แล้ว</a>" : $linkPre = "";
        $this->getIsNext() == "true" ? $linkNex = "<a href=\"module.php?name=search&tools=b&todo=next&serachtext=$serachtext&No_search=1\">หน้าถัดไป</a>&nbsp;<img src='images/page/next_2x_16.gif' align=absmiddle>" : $linkPre = "";

        $html = "<table align=center width=100% class=clear border=0 bordercolor=black cellspacing=0 cellpadding=2>
                <tr>
                    <td align=$align>$linkPre</td>
                    <td align=right>$linkNex</td>
                </tr>
                </table>";
    return $html;
    }

    /**
      * @desc
      * @param
      * @return
      * @author T.Pairin
      * @date   2009-10-28
      */
    function getIsNext(){
    return $this->m_isnext;
    }

    /**
      * @desc
      * @param
      * @return
      * @author T.Pairin
      * @date   2009-10-28
      */
    function getIsPrevious(){
    return $this->m_isprevious;
    }

    /**
      * @desc
      * @param
      * @return
      * @author T.Pairin
      * @date   2009-10-28
      */
    function setCookies($value){
    $this->m_cookies = $value;
    }

    /**
      * @desc
      * @param
      * @return
      * @author T.Pairin
      * @date   2009-10-28
      */
    function getCookies(){
    return $this->m_cookies;
    }

    /**
      * @desc
      * @param
      * @return
      * @author T.Pairin
      * @date   2009-10-28
      */
    function getCount(){
    return $this->FindCount;
    }

    /**
      * @desc  เพิ่มข้อมูลลงในระบบ Search Engins
      * @param  mixed $filename
      * @param  mixed $data
      * @param  mixed $encode
      * @param  mixed $attachType
      * @param  mixed $returnRef
      * @return
      * @author T.Pairin
      * @date   2009-10-28
      */
    function addSerach($filename, $data, $encode='', $attachType, $returnRef=''){
        $this->setInject();
        $filefullname=$this->path.$filename;
        //create documentproperty
        //$parameter["ID"]
        //if($data[id]) $this->parameter["ID"] = $data[id];
        if($data['sourceCode']) $this->parameter["SourceCode"] = $data['sourceCode'];
        if($data['displayTime']) $this->parameter["DisplayTime"] =  $data['displayTime'];
        if($data['storyTime']) $this->parameter["StoryTime"] =  $data['storyTime'];
        if($data['headLine']) $this->parameter["Headline"] =  $data['headLine'];
        if($data['description']) $this->parameter["Description"] =  $data['description'];
        if($data['story']) $this->parameter["Story"] =  $data['story'];
        if($data['category']) $this->parameter["Categories"] =  $data['category'];
        $this->parameter["Languages"] = 'Thai';
        if($data['disclaimer']) $this->parameter["Disclaimer"] =  $data['disclaimer'];
        //if() $this->parameter["Reference"] = '';
        //add attachment
        $strfile = file_get_contents($filefullname,'FILE_BINARY');
        $strbase64 = base64_encode($strfile);
        $this->parameter["Attachs"]["AttachmentProperty"]["AttachData"] = $strbase64;
        $this->parameter["Attachs"]["AttachmentProperty"]["AttachType"] = $attachType;
        $this->parameter["Attachs"]["AttachmentProperty"]["AttachFilename"] = $filename;
        $this->parameter["Attachs"]["AttachmentProperty"]["IsAttachConvert"] = 'True';
        $this->parameter["Attachs"]["AttachmentProperty"]["AttachReference"] = $filefullname;

        //create package parameter
        $this->params[]= array(
                         "PermissionKey"=>$this->m_license,
                         "Key"=>'B97157B11B39E8A4B235CA57D30D613E',
                         "Document"=>$this->parameter
                         );

        $this->method_name='doEdit';
        $this->result_name='doEditResult';

        if($this->showVar){
            echo "<pre>";
            print_r($this->params);
            echo "</pre>";
        }
        /*echo "<pre>";
        print_r($this->params);
        echo "</pre>"; */
        //do inject data to webservice
        $this->result=$this->web_service->call($this->method_name,$this->params);
        /* echo "<pre>";
        print_r($this->result);
        echo "</pre>"; */
        //receive result from injectservice
        //echo "Return Code : ".$this->result[$this->result_name]['ErrorCode'];
        //echo "ID Code : ".$this->result[$this->result_name]['Key'];

        if ($returnRef == 1) return $this->result[$this->result_name]['Key'];
        if ($this->result[$this->result_name]['ErrorCode'] != "") return "Return Code : ".$this->result[$this->result_name]['ErrorCode'];

        if($this->web_service->getError()){
            echo "<b><font color=\"red\">Error</font></b> -> ". $this->web_service->getError();
        }
    }

    /**
      * @desc  แก้ไขข้อมูลลงในระบบ Search Engins
      * @param  mixed $filename
      * @param  mixed $data
      * @param  mixed $encode
      * @param  mixed $attachType
      * @param  mixed $returnRef
      * @return
      * @author T.Pairin
      * @date   2009-10-28
      */
      /*
    function editSerach($filename, $data, $encode='', $attachType, $returnRef=''){
        $this->setInject();
        $filefullname=$this->path.$filename;
        //create documentproperty
        //$parameter["ID"]
        if($data[id]) $this->parameter["ID"] = $data[id];
        if($data[sourceCode]) $this->parameter["SourceCode"] = $data[sourceCode];
        if($data[displayTime]) $this->parameter["DisplayTime"] =  $data[displayTime];
        if($data[storyTime]) $this->parameter["StoryTime"] =  $data[storyTime];
        if($data[headLine]) $this->parameter["Headline"] =  $data[headLine];
        if($data[description]) $this->parameter["Description"] =  $data[description];
        if($data[story]) $this->parameter["Story"] =  $data[story];
        if($data[category]) $this->parameter["Categories"] =  $data[category];
        $this->parameter["Languages"] = 'Thai';
        if($data[disclaimer]) $this->parameter["Disclaimer"] =  $data[disclaimer];
        //if() $this->parameter["Reference"] = '';
        //add attachment
        $strfile = file_get_contents($filefullname,FILE_BINARY);
        $strbase64 = base64_encode($strfile);

        $this->parameter["Attachs"]["AttachmentProperty"]["AttachData"] = $strbase64;
        $this->parameter["Attachs"]["AttachmentProperty"]["AttachType"] = $attachType;
        $this->parameter["Attachs"]["AttachmentProperty"]["AttachFilename"] = $filename;
        $this->parameter["Attachs"]["AttachmentProperty"]["IsAttachConvert"] = 'True';
        $this->parameter["Attachs"]["AttachmentProperty"]["AttachReference"] = $filefullname;

        //create package parameter
        $this->params[]= array(
                         "PermissionKey"=>$this->m_license,
                         "Key"=>$this->parameter["ID"],
                         "Document"=>$this->parameter
                         );

        $this->method_name='doEdit';
        $this->result_name='doEditResult';

        if($this->showVar){
            echo "<pre>";
            print_r($this->params);
            echo "</pre>";
        }

        //do inject data to webservice
        $this->result=$this->web_service->call($this->method_name,$this->params);
        //receive result from injectservice
        //echo "Return Code : ".$this->result[$this->result_name]['ErrorCode'];
        //echo "<BR>";
        //return key(documentid) that inject
        echo "Return RefID : ".$this->result[$this->result_name]['Key'];
        //if ($this->result[$this->result_name]['ErrorCode'] != "") return "Return Code : ".$this->result[$this->result_name]['ErrorCode'];
        if ($returnRef) return $this->result[$this->result_name]['Key'];
        if($this->web_service->getError()){
            echo "<b><font color=\"red\">Error</font></b> -> ". $this->web_service->getError();
        }
    }*/

    function editSerach($filename, $data, $encode='', $attachType, $returnRef=''){
      $this->setInject();
      $filefullname=$this->path.$filename;
      //create documentproperty
      //$parameter["ID"]
      if($data['id']) $this->parameter["ID"] = $data['id'];
      if($data['sourceCode']) $this->parameter["SourceCode"] = $data['sourceCode'];
      if($data['displayTime']) $this->parameter["DisplayTime"] =  $data['displayTime'];
      if($data['storyTime']) $this->parameter["StoryTime"] =  $data['storyTime'];
      if($data['headLine']) $this->parameter["Headline"] =  $data['headLine'];
      if($data['description']) $this->parameter["Description"] =  $data['description'];
      if($data['story']) $this->parameter["Story"] =  $data['story'];
      if($data['category']) $this->parameter["Categories"] =  $data['category'];
      $this->parameter["Languages"] = 'Thai';
      if($data['disclaimer']) $this->parameter["Disclaimer"] =  $data['disclaimer'];
      //if() $this->parameter["Reference"] = '';
      //add attachment
      $strfile = file_get_contents($filefullname,'FILE_BINARY');
      $strbase64 = base64_encode($strfile);
      $this->parameter["Attachs"]["AttachmentProperty"]["AttachData"] = $strbase64;
      $this->parameter["Attachs"]["AttachmentProperty"]["AttachType"] = $attachType;
      $this->parameter["Attachs"]["AttachmentProperty"]["AttachFilename"] = $filename;
      $this->parameter["Attachs"]["AttachmentProperty"]["IsAttachConvert"] = 'True';
      $this->parameter["Attachs"]["AttachmentProperty"]["AttachReference"] = $filefullname;

      //create package parameter
      $this->params[]= array(
                       "PermissionKey"=>$this->m_license,
                       "Key"=>$this->parameter["ID"],
                       "Document"=>$this->parameter
                       );

      $this->method_name='doEdit';
      $this->result_name='doEditResult';

      if($this->showVar){
          echo "<pre>";
          print_r($this->params);
          echo "</pre>";
      }

        $this->method_name='doEdit';
        $this->result_name='doEditResult';

        if($this->showVar){
            echo "<pre>";
            print_r($this->params);
            echo "</pre>";
        }

        //do inject data to webservice
        $this->result=$this->web_service->call($this->method_name,$this->params);
        //receive result from injectservice
        //echo "Return Code : ".$this->result[$this->result_name]['ErrorCode'];
        //echo "<BR>";
        //return key(documentid) that inject
        //echo "Return RefID : ".$this->result[$this->result_name]['Key'];
        //if ($this->result[$this->result_name]['ErrorCode'] != "") return "Return Code : ".$this->result[$this->result_name]['ErrorCode'];
        if ($returnRef) return $this->result[$this->result_name]['Key'];
        if($this->web_service->getError()){
            echo "<b><font color=\"red\">Error</font></b> -> ". $this->web_service->getError();
        }
    }

    /**
      * @desc  ลบข้อมูลในระบบ Search Engins
      * @param mixed $documentid
      * @return
      * @author T.Pairin
      * @date   2009-10-28
      */
    function deleteSerach($documentid){
        $this->setInject();
        $this->params[]= array(
                         "PermissionKey"=>$this->m_license,
                         "Key"=>$documentid
                         );
        $this->method_name='doDelete';
        $this->result_name='doDeleteResult';
        $this->result=$this->web_service->call($this->method_name,$this->params);
        if ($this->result[$this->result_name]['ErrorCode'] != "") return "Return Code : ".$this->result[$this->result_name]['ErrorCode'];
        if($this->web_service->getError()){
            echo "<b><font color=\"red\">Error</font></b> -> ". $this->web_service->getError();
        }

    }

    /**
      * @desc  Check DB Mysql Is TQ
      * @param
      * @return
      * @author T.Pairin
      * @date   2009-10-28
      */
    function checkDB(){
        $this->setResultPage('500');
        $this->setSerach();

        $this->parameter["Count"]= $this->m_resultperpage;
        $this->parameter["OldestFirst"] = false;
        $this->parameter["ResultFieldParameter"] = $this->m_resultfieldparameter;
        $this->parameter["StoryLength"] = $this->m_stroylength;
        $this->parameter["Field"]["Query"] = $txtQuery;

        $this->params[] = array(
        "PermissionKey"=>$this->m_license,
        "Parameter"=>$this->parameter
        );

        $this->method_name = "doSearch_7";
        $this->result_name = 'doSearch_7Result';

        $this->result = $this->web_service->call($this->method_name, $this->params);
        $i = 1;
        foreach ($this->result[$this->result_name]['Documents']['DocumentProperty'] as $value) {
          $sql = "select * from ".LAW_DATALAW." where doc_id1='$value[ID]' or doc_id2='$value[ID]' ";
          if($this->db->quick_num($sql)){
              echo "ID >> ".$value[ID]." &nbsp;&nbsp;&nbsp;&nbsp; ";
              echo "Found  $i <br>";
             $i++;
          }else{
             echo "ID >> ".$value[ID]." &nbsp;&nbsp;&nbsp;&nbsp; ";
             echo "<b><font color=\"red\">Not Found</font></b>&nbsp;<br>";
             //echo $this->deleteSerach($value[ID])."<br>";
          }
        }
    }


    // fix for api
    var $api_session;
    var $api_ip;
    var $api_keyword;
    function getApiSearchValue() {
        $data = array(
            'session_id' => $this->api_session,
            'ip' => $this->api_ip,
            'keyword' => $this->api_keyword
        );
        return $data;
    }

    /**
      * @desc  เพิ่มข้อมูล search ลงในตาราง temp_law
      * @param mixed $keyword
      * @return
      * @author T.Pairin
      * @date   2009-10-28
      */
    function addTempSearch($keyword){
        $sess = session_id();
        $ipp = $_SERVER['REMOTE_ADDR'];
        $time = date("Y/m/d : H/i/s");
        $time_session = date("H/i/s",time()-3600);
        $day_session = date("Y/m/d");

        // fix for api
        $this->api_session = $sess;
        $this->api_ip = $ipp;
        $this->api_keyword = $keyword;

        $sql_chk = "select * from temp_law where replace(substr(time,14,8),'/','') < replace('$time_session','/','')";
        $countChk = $this->db->quick_num($sql_chk);
        if($countChk){
          $sql_del = "delete from temp_law where replace(substr(time,14,8),'/','') < replace('$time_session','/','')";
              $this->db->execute($sql_del);
        }

        $sqlSelect = "select * from ".TEMP_LAW." where session_id = '".$sess."' and  ip = '".$ipp."'";
        $countSelect = $this->db->quick_num($sqlSelect);
        if($countSelect > 0){

           $sqlDel = "delete from ".TEMP_LAW." where session_id = '".$sess."' and ip = '".$ipp."'";
           $this->db->execute($sqlDel);

           foreach ($this->result[$this->result_name]['Documents']['DocumentProperty'] as $value) {
               //var_dump($value);
               $headline = @str_replace("\\","",@$value['Headline']);
               @is_array($value['Attachs']) ? $file = @$value['Attachs']['AttachmentProperty']['AttachText'] : $file = "ไม่พบข้อมูลในเนื้อไฟล์กฎหมาย";
               $sqlInsert = "insert into ".TEMP_LAW." (session_id, time, ip, keyword, id, sourcecode,headline,file) ";
               $sqlInsert .= " value ('".$sess."', '".$time."', '".$ipp."', '".$keyword."', '".@$value['ID']."', '".@$value['SourceCode']."','".$headline."','".mysql_real_escape_string($file)."')";
               $this->db->execute($sqlInsert);
           }
             //  echo "<script type=\"text/JavaScript\"> alert('$countSearch delete ตัวเดิม insert ตัวใหม่ !!'); </script>";
        }else{
            foreach ($this->result[$this->result_name]['Documents']['DocumentProperty'] as $value) {
               $headline = str_replace("\\","",$value['Headline']);
               is_array($value['Attachs']) ? $file = $value['Attachs']['AttachmentProperty']['AttachText'] : $file = "ไม่พบข้อมูลในเนื้อไฟล์กฎหมาย";
               $sqlInsert = "insert into ".TEMP_LAW." (session_id, time, ip, keyword, id, sourcecode,headline,file) ";
               $sqlInsert .= " value ('$sess', '$time', '$ipp', '$keyword', '$value[ID]', '$value[SourceCode]','$headline','$file')";
               $this->db->execute($sqlInsert);
            }
              // echo "<script type=\"text/JavaScript\"> alert('$countSearch insert ตัวใหม่ !!'); </script>";
        }
    }

    /**
      * @desc  แสดงข้อมูลจากการค้นหากฎหมาย(ตัวใหม่)
      * @param  mixed $next
      * @param  mixed $serachtext
      * @param  mixed $tools
      * @return $html
      * @author T.Pairin
      * @date   2009-10-28
      */
    function _displayNew($next='',$serachtext,$tools){
        global $countWord;
        if($this->result[$this->result_name]['Count'] > 0){

            $this->m_estimatetotal = $this->result[$this->result_name]['EstimateTotal'];
            $this->m_searchtime = $this->result[$this->result_name]['SearchTime'];

            if($this->result[$this->result_name]['Count'] != 1){
                $sess = session_id();
                $ipp = $_SERVER['REMOTE_ADDR'];
                global $page;
                $page = @$_GET['page'] > 0 ? $_GET['page'] : 1;
                //$searchTxt = $keyword;
                $this->db->_setPageSize(10);
                $this->db->_setFile("law_search?name=".@$_GET['search']."&tools=".@$_GET['tools']."&searchtext=".@$_GET['searchtext']."&");
                $this->db->_setPage($page);

                //$sqlSerach = "select t.* ,l.law_group_id,l.type_id ,l.type_id is null type_null ,l.law_group_id is null group_null ";
                //$sqlSerach .="from ".TEMP_LAW." t left outer join  ".LAW_DATALAW." l on t.sourcecode=l.ref_code where t.session_id = '$sess' and t.ip = '$ipp' ";
                $sqlSerach = "select t.* ,l.law_group_id,l.law_maintype_id , l.law_submaintype_id,(l.law_maintype_id = 0 ) as type_null,l.import_code  ";
                $sqlSerach .="from ".TEMP_LAW." t ,".LAW_DATALAW." l  where t.session_id = '$sess' and t.ip = '$ipp' and trim(t.sourcecode)=l.ref_code and l.status<>'2'";
                if($serachtext != "null" && $serachtext != "")$sqlSerach .= " and t.keyword = '$serachtext'";
                //$sqlSerach .= " order by group_null,type_null ,l.law_group_id,l.type_id asc ";
                // $sqlSerach .= " order by type_null, l.import_code, l.law_group_id, l.law_maintype_id, length(l.law_submaintype_id) ,l.law_submaintype_id,t.headline asc ";
				$sqlSerach .= " order by l.notic_date Desc ";
                // echo $sqlSerach;

                $result = $this->db->execute($sqlSerach,1);
                $countWord = $this->db->quick_num($sqlSerach);
                $resultSerach = '';


                $resultSerach = '<table width="100%" border="0" cellspacing="0" cellpadding="0" class="tb-result">
                          <tbody>
                          <tr>
                            <td width="4%" height="25" align="center" bgcolor="#d2f1e4"><strong>สถานะ</strong></td>
                            <td width="76%" bgcolor="#d2f1e4"> <strong>เรื่อง</strong></td>
                            <td width="6%" align="center" bgcolor="#d2f1e4" nowrap="nowrap"><strong>TH ดาวน์โหลด</strong></td>
                            <td width="14%" align="center" bgcolor="#d2f1e4"  nowrap="nowrap"><strong>EN Download</strong></td>
                          </tr>

                          ';




                //$resultSerach .= $this->db->_new_displayPage().'<br>';

                 while($value = $this->db->fetch_array($result)){

                    $sqlGetData = "select * from ".TEMP_LAW." t,".LAW_DATALAW." l where t.session_id='$sess' and t.ip='$ipp' ";
                    $sqlGetData .= " and t.sourcecode=l.ref_code and l.ref_code='$value[sourcecode]'";
					// echo $sqlGetData;
                    $valueData = $this->db->quick($sqlGetData);
                    $valueData['status']==1 ? $sTxt = "<font color=\"#0000FF\">บังคับใชั</font>" : $sTxt = "<font color=\"#FF0000\">ยกเลิก</font>";
                    $categoryName = $this->db->covertID2Name(LAW_TYPE,$valueData['law_type_id']);

                   // นับจำนวนครั้ง Download
                    $sqlCheck = "select count(id) as CN from ".LAW_DOWNLOAD." where filename='".$valueData['filename_th']."' ";
                    $valueCount = $this->db->quick($sqlCheck);
                    $valueCount['CN'] ? $count = $valueCount['CN'] : $count = 0;
                    $counte = 0;
                    if($valueData['filename_eng']!=""){
                        $sqlCheck = "select count(id) as CE from ".LAW_DOWNLOAD." where filename='".$valueData['filename_eng']."' ";
                        $valueCount = $this->db->quick($sqlCheck);
                        $valueCount['CE'] ? $counte = $valueCount['CE'] : $counte = 0;
                        $txtDownloadEN = '<a href="law/download_by_name/'.$valueData['id'].'?filename='.$valueData['filename_eng'].'" target="_blank">'.file_icon_th($valueData['filename_eng']).'<br> ('.$counte.' Downloads)</a>';
                        /*
                                        <font color=\"#00AE00\"><img src=\"images/appicon/download_icon.png\" border=\"0\"  alt=\"Download ".$valueData['filename_eng']."\"><a href=\"law/download_by_name/".$valueData['id']."?filename=".$valueData['filename_eng']."\" target=\"_blank\">Download File English</a> </font>&nbsp;( <b>".$counte."</b> ครั้ง )";
                      */

                    }else{
                        $txtDownloadTH = '<a href="law/download_by_name/'.$valueData['id'].'?filename='.$valueData['filename_th'].'" target="_blank">'.file_icon_th($valueData['filename_th']).'<br> ('.$count.' ครั้ง)</a>';
                        //$txtDownload = "<font color=\"#00AE00\"><img src=\"images/appicon/download_icon.png\" border=\"0\"  alt=\"Download ".$valueData['filename_th']."\"><a href=\"law/download_by_name/".$valueData['id']."?filename=".$valueData['filename_th']."\" target=\"_blank\">Download File</a> </font>&nbsp;( <b>".$count."</b> ครั้ง )";
                    }

                    $textName = $valueData['name_th'] ;
                    $textName = str_replace("|"," ",$textName);

                   $txt1 = $this->db->covertID2Name(LAW_GROUP,$valueData['law_group_id']);
                   $txt2 = $this->db->covertID2Name(LAW_TYPE,$valueData['law_type_id']);
                   $groupLaw = lang_decode($txt1['name'])." > ".lang_decode($txt2['name'])." ";
                   if($valueData['law_type_id']==10){
                      $txt3 = $this->db->covertID2Name(LAW_TYPE,$valueData['law_maintype_id']);
                      $txt4 = $this->db->covertID2Name(LAW_SUBMAINTYPE,$valueData['law_submaintype_id']);
                      $groupLaw .=  "> ".lang_decode($txt3['name'])." > ".lang_decode($txt4['typeName']);
                   }elseif($valueData['law_type_id']!=11 && $valueData['law_type_id']!=10){
                      $txt3 = $this->db->covertID2Name(LAW_MAINTYPE,$valueData['law_maintype_id']);
                      $txt4 = $this->db->covertID2Name(LAW_SUBMAINTYPE,$valueData['law_submaintype_id']);
                      $groupLaw .=  "> ".lang_decode($txt3['typeName'])." > ".lang_decode($txt4['typeName']);
                   }

                    $value['file'] ? $attachTxt =  $value['file'] :  $attachTxt = "ไม่พบข้อมูลในเนื้อไฟล์กฎหมาย";
                    $valueData['use_date'] == "" ? $txtUse = "-" : $txtUse = $valueData['use_date'];
                      $resultSerach .='
                       <tr>
                         <td align="center" valign="top" class="line-result"><div class="status">'.$sTxt.'</div></td>
                         <td valign="top" class="line-result"><span class="title-result"><a href="law/view/'.$valueData['id'].'" target="_blank">'.$textName.'</a></span><br>
                           <table width="100%" border="0" cellspacing="0" cellpadding="0">
                               <tbody>
                               <tr>
                                 <td width="27%" valign="top">โครงสร้างกฎหมาย</td>
                                 <td width="80%" valign="top">'.$groupLaw.'</td>
                               </tr>
                               <tr>
                                 <td valign="top">วันที่ประกาศใช้</td>
                                 <td valign="top">'.mysql_to_th($valueData['notic_date']).'</td>
                               </tr>
                               <tr>
                                 <td valign="top">วันที่บังคับใช้</td>
                                 <td valign="top">'.mysql_to_th($txtUse).'</td>
                               </tr>
                               <tr>
                                 <td valign="top">เนื้อหาไฟล์กฎหมาย	ปัจจุบัน</td>
                                 <td valign="top">'.$attachTxt.'</td>
                               </tr>
                               </tbody>
                           </table>
                         </td>
                         <td align="center" valign="top" class="line-result">'.@$txtDownloadTH.'</td>
                         <td align="center" valign="top" class="line-result">'.@$txtDownloadEN.'</td>
                       </tr>';

                 }
                //$resultSerach .= "<hr size=\"1px\" >".$this->db->_new_displayPage();
          }else{
                $value = $this->result[$this->result_name]['Documents']['DocumentProperty'];
                $sql = "select * from ".LAW_DATALAW." where doc_id1='$value[ID]' or doc_id2='$value[ID]' ";
                if($this->db->quick_num($sql)){
                    $sqlGetData = "select * from ".LAW_DATALAW." where ref_code='$value[SourceCode]' ";
                    $valueData = $this->db->quick($sqlGetData);
                    $valueData[status]==1 ? $sTxt = "<font color=\"#0000FF\">บังคับใชั</font>" : $sTxt = "<font color=\"#FF0000\">ยกเลิก</font>";
                    $categoryName = $this->db->covertID2Name(LAW_TYPE,$valueData[law_type_id]);

                   // นับจำนวนครั้ง Download
                    $sqlCheck = "select count(id) as CN from ".LAW_DOWNLOAD." where filename='$valueData[filename_th]' ";
                    $valueCount = $this->db->quick($sqlCheck);
                    $valueCount[CN] ? $count = $valueCount[CN] : $count = 0;

                     if($valueData[import_code]=="im4"){
                        $sqlCheck = "select count(id) as CE from ".LAW_DOWNLOAD." where filename='$valueData[filename_eng]' ";
                        $valueCount = $this->db->quick($sqlCheck);
                        $valueCount[CE] ? $counte = $valueCount[CE] : $counte = 0;
                        $txtDownload = "<font color=\"#00AE00\"><img src=\"images/appicon/download_icon.png\" border=\"0\"  alt=\"Download $valueData[filename_th]\"><a href=\"#$valueData[filename_th]\" onclick=\"window.open('getFile.php?name=$valueData[filename_th]','view_$valueData[id]','width=200,height=200,menubar')\">Download File Thai</a> </font>&nbsp;( <b>$count</b> ครั้ง ) &nbsp;
                                        <font color=\"#00AE00\"><img src=\"images/appicon/download_icon.png\" border=\"0\"  alt=\"Download $valueData[filename_eng]\"><a href=\"#$valueData[filename_eng]\" onclick=\"window.open('getFile.php?name=$valueData[filename_th]','view_$valueData[id]','width=200,height=200,menubar')\">Download File English</a> </font>&nbsp;( <b>$counte</b> ครั้ง )";
                    }else{
                        $txtDownload = "<font color=\"#00AE00\"><img src=\"images/appicon/download_icon.png\" border=\"0\"  alt=\"Download $valueData[filename_th]\"><a href=\"#$valueData[filename_th]\" onclick=\"window.open('getFile.php?name=$valueData[filename_th]','view_$valueData[id]','width=200,height=200,menubar')\">Download File</a> </font>&nbsp;( <b>$count</b> ครั้ง )";
                    }

                    $textName = $valueData[name_th] ? $valueData[name_th] : $value['HeadLine'] ;
                    //$textName = $value['Headline'] ;
                    $textName = str_replace("|"," ",$textName);

                    is_array($value['Attachs']) ? $attachTxt = $value['Attachs']['AttachmentProperty']['AttachText'] : $attachTxt = "ไม่พบข้อมูลในเนื้อไฟล์กฎหมาย";
                    $valueData[use_date] == "" ? $txtUse = "-" : $txtUse = $valueData[use_date];

                    $resultSerach .= "
                        <table width=\"700\" border=\"0\">
                          <tr>
                            <td><a href=\"law/view/".$valueData['id']."\" target=\"_blank\"> $textName</a> <b>( สถานะ : $sTxt )</b></td>
                          </tr>
                          <tr>
                            <td>
                            <table width=\"100%\" border=\"0\">
                              <tr>
                                <td width=\"26%\">หมวดกฎหมาย </td>
                                <td width=\"74%\">$categoryName[name]</td>
                              </tr>
                              <tr>
                                <td width=\"26%\">วันที่ประกาศใช้ </td>
                                <td width=\"74%\">$valueData[notic_date]</td>
                              </tr>
                              <tr>
                                <td width=\"26%\">วันที่บังคับใช้ </td>
                                <td width=\"74%\">$txtUse</td>
                              </tr>
                              <tr>
                                <td valign=\"top\">เนื้อหาไฟล์กฎหมาย</td>
                                <td>$attachTxt</td>
                              </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td>$txtDownload</td>
                          </tr>
                        </table>
                        <br>
                        <br>
                        ";
                }
            }

            $resultSerach .= '</table>';
            $resultSerach .= $this->db->_new_displayPage();
            /*$header = "
            <table class=\"table tableTLinedot\" style=\"background:#F4F4F4;margin-bottom:8px!important;\">
            <tr>
              <td>
                  <div align=\"left\"><a href=\"javascript:window.print()\"><img src=\"images/appicon/print.jpg\" border=\"0\" alt=\"พิมพ์ข้อมูลหน้านี้\">พิมพ์หน้านี้</a></div>
              </td>
              <td width=\"40%\">
                <div align=\"right\">พบข้อมูลจำนวน. <b><font color=\"red\" >".$countWord."</font></b> ข้อมูล&nbsp;&nbsp;สำหรับคำว่า <b><font color=\"red\" >".$serachtext."</font></b></div>
              </td>
            </tr>
            </table>
            ";*/
            $header = '<div class="text-result">ค้นหาคำว่า “'.$serachtext.'” พบทั้งสิ้น '.$countWord.' รายการ </div><div class="clearfix">&nbsp;</div>';
            return $header.$resultSerach;
        }else{
            $warning = '
            <div style="margin-top:15px;">
            <div class="alert alert-warning alert-dismissible" role="alert" style="color:#000000;height: 150px;width:863px;margin:0 auto;text-align: center;padding-top: 66px;">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>ไม่พบข้อมูล!</strong>
            </div>
            </div>
            ';
            return $warning;
        }
    }

    function _displayNewAPI($next='',$serachtext,$tools){
        global $countWord;
        $json = array();

        if($this->result[$this->result_name]['Count'] > 0){

            $this->m_estimatetotal = $this->result[$this->result_name]['EstimateTotal'];
            $this->m_searchtime = $this->result[$this->result_name]['SearchTime'];

            if($this->result[$this->result_name]['Count'] != 1){
                $sess = session_id();
                $ipp = $_SERVER['REMOTE_ADDR'];
                $searchTxt = $keyword;
                global $page;
                $this->db->_setPageSize(10);
                $this->db->_setFile("api-search.php?search=$serachtext&");
                $this->db->_setPage($page);

                //$sqlSerach = "select t.* ,l.law_group_id,l.type_id ,l.type_id is null type_null ,l.law_group_id is null group_null ";
                //$sqlSerach .="from ".TEMP_LAW." t left outer join  ".LAW_DATALAW." l on t.sourcecode=l.ref_code where t.session_id = '$sess' and t.ip = '$ipp' ";
                $sqlSerach = "select t.* ,l.law_group_id,l.law_maintype_id , l.law_submaintype_id,(l.law_maintype_id = 0 ) as type_null,l.import_code  ";
                $sqlSerach .="from ".TEMP_LAW." t ,".LAW_DATALAW." l  where t.session_id = '$sess' and t.ip = '$ipp' and t.sourcecode=l.ref_code and l.status<>'2'";
                if($serachtext != "null" && $serachtext != "")$sqlSerach .= " and t.keyword = '$serachtext'";
                //$sqlSerach .= " order by group_null,type_null ,l.law_group_id,l.type_id asc ";
                $sqlSerach .= " order by type_null, l.import_code, l.law_group_id, l.law_maintype_id, length(l.law_submaintype_id) ,l.law_submaintype_id,t.headline asc ";
                //echo "$sqlSerach";

                $result = $this->db->execute($sqlSerach,1);
                $countWord = $this->db->quick_num($sqlSerach);
                $json['total_item'] = $countWord;
                $resultSerach .= $this->db->_displayPage()."<hr size=\"1px\" ><br>";
                $json['current_page'] = $this->db->var_currentPage;
                $json['total_page'] = $this->db->var_totalPage;
                $json['session_id'] = $sess;
                $json['ip'] = $ipp;
                 while($value = $this->db->fetch_array($result)){

                    $sqlGetData = "select * from ".TEMP_LAW." t,".LAW_DATALAW." l where t.session_id='$sess' and t.ip='$ipp' ";
                    $sqlGetData .= " and t.sourcecode=l.ref_code and l.ref_code='$value[sourcecode]'";

                    $valueData = $this->db->quick($sqlGetData);
                    $valueData[status]==1 ? $sTxt = "<font color=\"#0000FF\">บังคับใชั</font>" : $sTxt = "<font color=\"#FF0000\">ยกเลิก</font>";
                    $categoryName = $this->db->covertID2Name(LAW_TYPE,$valueData[law_type_id]);

                   // นับจำนวนครั้ง Download
                    $sqlCheck = "select count(id) as CN from ".LAW_DOWNLOAD." where filename='$valueData[filename_th]' ";
                    $valueCount = $this->db->quick($sqlCheck);
                    $valueCount[CN] ? $count = $valueCount[CN] : $count = 0;

                    if($valueData[filename_eng]!=""){
                        $sqlCheck = "select count(id) as CE from ".LAW_DOWNLOAD." where filename='$valueData[filename_eng]' ";
                        $valueCount = $this->db->quick($sqlCheck);
                        $valueCount[CE] ? $counte = $valueCount[CE] : $counte = 0;
                        $txtDownload = "<font color=\"#00AE00\"><img src=\"images/appicon/download_icon.png\" border=\"0\"  alt=\"Download $valueData[filename_th]\"><a href=\"#$valueData[filename_th]\" onclick=\"window.open('getFile.php?name=$valueData[filename_th]','view_$valueData[id]','width=200,height=200,menubar')\">Download File Thai</a> </font>&nbsp;( <b>$count</b> ครั้ง ) &nbsp;
                                        <font color=\"#00AE00\"><img src=\"images/appicon/download_icon.png\" border=\"0\"  alt=\"Download $valueData[filename_eng]\"><a href=\"#$valueData[filename_eng]\" onclick=\"window.open('getFile.php?name=$valueData[filename_eng]','view_$valueData[id]','width=200,height=200,menubar')\">Download File English</a> </font>&nbsp;( <b>$counte</b> ครั้ง )";
                    }else{
                        $txtDownload = $valueData[filename_th];
                    }

                    $textName = $valueData['name_th'] ;
                    $textName = str_replace("|"," ",$textName);

                   $txt1 = $this->db->covertID2Name(LAW_GROUP,$valueData[law_group_id]);
                   $txt2 = $this->db->covertID2Name(LAW_TYPE,$valueData[law_type_id]);
                   $groupLaw = "$txt1[name] > $txt2[name] ";
                   if($valueData[law_type_id]==10){
                      $txt3 = $this->db->covertID2Name(LAW_TYPE,$valueData[law_maintype_id]);
                      $txt4 = $this->db->covertID2Name(LAW_SUBMAINTYPE,$valueData[law_submaintype_id]);
                      $groupLaw .=  "> $txt3[name] > $txt4[typeName]";
                   }elseif($valueData[law_type_id]!=11 && $valueData[law_type_id]!=10){
                      $txt3 = $this->db->covertID2Name(LAW_MAINTYPE,$valueData[law_maintype_id]);
                      $txt4 = $this->db->covertID2Name(LAW_SUBMAINTYPE,$valueData[law_submaintype_id]);
                      $groupLaw .=  "> $txt3[typeName] > $txt4[typeName]";
                   }

                    $value[file] ? $attachTxt =  $value[file] :  $attachTxt = "ไม่พบข้อมูลในเนื้อไฟล์กฎหมาย";
                    $valueData[use_date] == "" ? $txtUse = "-" : $txtUse = $valueData[use_date];
                    $json['items'][] = array(
                        'title' => $textName,
                        'category' => $groupLaw,
                        'file_th' => $valueData['filename_th'],
                        'file_en' => $valueData['filename_eng']
                    );

                 }
          }else{
                $value = $this->result[$this->result_name]['Documents']['DocumentProperty'];
                $sql = "select * from ".LAW_DATALAW." where doc_id1='$value[ID]' or doc_id2='$value[ID]' ";
                if($this->db->quick_num($sql)){
                    $sqlGetData = "select * from ".LAW_DATALAW." where ref_code='$value[SourceCode]' ";
                    $valueData = $this->db->quick($sqlGetData);
                    $valueData[status]==1 ? $sTxt = "<font color=\"#0000FF\">บังคับใชั</font>" : $sTxt = "<font color=\"#FF0000\">ยกเลิก</font>";
                    $categoryName = $this->db->covertID2Name(LAW_TYPE,$valueData[law_type_id]);

                   // นับจำนวนครั้ง Download
                    $sqlCheck = "select count(id) as CN from ".LAW_DOWNLOAD." where filename='$valueData[filename_th]' ";
                    $valueCount = $this->db->quick($sqlCheck);
                    $valueCount[CN] ? $count = $valueCount[CN] : $count = 0;

                     if($valueData[import_code]=="im4"){
                        $sqlCheck = "select count(id) as CE from ".LAW_DOWNLOAD." where filename='$valueData[filename_eng]' ";
                        $valueCount = $this->db->quick($sqlCheck);
                        $valueCount[CE] ? $counte = $valueCount[CE] : $counte = 0;
                        $txtDownload = "<font color=\"#00AE00\"><img src=\"images/appicon/download_icon.png\" border=\"0\"  alt=\"Download $valueData[filename_th]\"><a href=\"#$valueData[filename_th]\" onclick=\"window.open('getFile.php?name=$valueData[filename_th]','view_$valueData[id]','width=200,height=200,menubar')\">Download File Thai</a> </font>&nbsp;( <b>$count</b> ครั้ง ) &nbsp;
                                        <font color=\"#00AE00\"><img src=\"images/appicon/download_icon.png\" border=\"0\"  alt=\"Download $valueData[filename_eng]\"><a href=\"#$valueData[filename_eng]\" onclick=\"window.open('getFile.php?name=$valueData[filename_th]','view_$valueData[id]','width=200,height=200,menubar')\">Download File English</a> </font>&nbsp;( <b>$counte</b> ครั้ง )";
                    }else{
                        $txtDownload = "<font color=\"#00AE00\"><img src=\"images/appicon/download_icon.png\" border=\"0\"  alt=\"Download $valueData[filename_th]\"><a href=\"#$valueData[filename_th]\" onclick=\"window.open('getFile.php?name=$valueData[filename_th]','view_$valueData[id]','width=200,height=200,menubar')\">Download File</a> </font>&nbsp;( <b>$count</b> ครั้ง )";
                    }

                    $textName = $valueData[name_th] ? $valueData[name_th] : $value['HeadLine'] ;
                    //$textName = $value['Headline'] ;
                    $textName = str_replace("|"," ",$textName);

                    is_array($value['Attachs']) ? $attachTxt = $value['Attachs']['AttachmentProperty']['AttachText'] : $attachTxt = "ไม่พบข้อมูลในเนื้อไฟล์กฎหมาย";
                    $valueData[use_date] == "" ? $txtUse = "-" : $txtUse = $valueData[use_date];

                    $resultSerach .= "
                        <table width=\"700\" border=\"0\">
                          <tr>
                            <td><a href=\"#\" onclick=\"window.open('module.php?name=search&pg=showchild&do=$valueData[id]|a','view$valueData[id]','height=490,width=730,scrollbars=1,resizable=1') \" > $textName</a> <b>( สถานะ : $sTxt )</b></td>
                          </tr>
                          <tr>
                            <td>
                            <table width=\"100%\" border=\"0\">
                              <tr>
                                <td width=\"26%\">หมวดกฎหมาย </td>
                                <td width=\"74%\">$categoryName[name]</td>
                              </tr>
                              <tr>
                                <td width=\"26%\">วันที่ประกาศใช้ </td>
                                <td width=\"74%\">$valueData[notic_date]</td>
                              </tr>
                              <tr>
                                <td width=\"26%\">วันที่บังคับใช้ </td>
                                <td width=\"74%\">$txtUse</td>
                              </tr>
                              <tr>
                                <td valign=\"top\">เนื้อหาไฟล์กฎหมาย</td>
                                <td>$attachTxt</td>
                              </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td>$txtDownload</td>
                          </tr>
                        </table>
                        <br>
                        <br>
                        ";
                }
            }
            return $json;
            // return $resultSerach;
        }else{
            $json['total_item'] = 0;
            return $json;
        }
    }
}
?>
