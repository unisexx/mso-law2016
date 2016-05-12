<?
#########
# Database Core
#########

/**
* @desc Class Database Connect
*/
class db_w {
        var $host;
        var $user;
        var $pass;
        var $db;
        var $conn;
        var $tbl_top;
        var $tbl_bottom;
        var $MsgConnDB;
        var $var_pageSize;
        var $var_currentPage;
        var $var_totalPage;
        var $var_file;

       /**
       * Start Class
       *
       */
       function __construct() {
            include 'config.inc.php';
            $Conf=new Conf();
            $this->dbtype=$Conf->dbtype;
            $this->db=$Conf->db;
            $this->host=$Conf->host;
            $this->user=$Conf->user;
            $this->pass=$Conf->pass;
            $this->port=$Conf->port;
            $this->tbl_top=$Conf->tbl_top;
            $this->tbl_bottom=$Conf->tbl_bottom;
            $this->MsgConnDB=$Conf->MsgConnDB;
            //error_reporting(0);
            switch($this->dbtype){
            case "mysql" :
                       $this->conn = mysql_connect($this->host, $this->user, $this->pass) or die ($this->tbl_top.mysql_error().$this->MsgConnDB.$this->tbl_bottom);
                       @mysql_query("SET character_set_results = utf8");
                       @mysql_query("SET collation_connection = utf8_general_ci");
                       @mysql_query("SET NAMES 'utf8'");
                        mysql_select_db($this->db);
                       break;
            case "postgres" :
                       $this->conn = pg_connect("host=$this->host user=$this->user password=$this->pass dbname=$this->db") or die ($this->tbl_top.$this->MsgConnDB.$this->tbl_bottom);
                        break;
            case "mssql" :
                       $this->conn = mssql_connect($this->host, $this->user, $this->pass) or die ($this->tbl_top.$this->MsgConnDB.$this->tbl_bottom);
                       mssql_select_db($this->db);
                        break;
            case "oracle" :
                       $this->conn = oci_connect($this->user, $this->pass,$this->db) or die ($this->tbl_top.oci_error().$this->MsgConnDB.$this->tbl_bottom);
                        break;
            }
       }

       /**
       * SetType Database
       *
       * @param mixed $type ชนิดของ Database
       */
       function setDBType($type){
           $this->dbtype = $type;
       }

       /**
       * @desc Function select_db In Class DB
       * @param string $db_name ชื่อ DataBase ที่ต้องการใช้
       * @param Interger $debug คำสั่ง 1 เปิด / 0 ปิด การทำงาน Debug
       */
       function select_db($db_name,$debug=''){
            global $debugMsg;
            if($debug == 1) $debugMsg = "<i>DataBase Select</i> -> <font color=\"#00FF00\"><u>$db_name</u><font>";
            switch($this->dbtype){
             case "mysql" :
                        mysql_select_db($db_name);
              break;
            }
       }

       /**
       * @desc Function execute In Class DB
       * @param string $query คำสั่ง SQL
       * @param Interger $debug คำสั่ง 1 เปิด / 0 ปิด การทำงาน Debug
       */
       function execute($query,$sp='') { // for insert and update
            global $debugMsg, $pg, $name;

            if(@$debug == 1){
                $debugMsg = "<i>SQL Debug</i> -> <font color=\"#FF0000\">$query</font> <br>\n";
            }

            switch($this->dbtype){
            case "mysql" :
                        if($query != ""){
                            if($sp == 0){
                                $this->result = mysql_query($query, $this->conn) or die ($this->errorMsg($name,$pg,$query,mysql_error()));
                            }else{
                                $this->result = $this->_query($query);
                            }
                        return $this->result;
                        }
                        return $this->result;
                        break;
            case "postgres" :
                        $this->result = pg_query($query, $this->conn) or die ("$query <br>");
                        return $this->result;
                        break;
            case "mssql" :
                        $this->result = mssql_query($query, $this->conn) or die ("$query <br>");
                        return $this->result;
                        break;
            case "oracle" :
                        $this->result = oci_parse($this->conn, $query) or die ("$query <br>");
                        oci_execute ($this->result);
                        return $this->result;
                        break;
             case "db2" :
                        return $this->result;
            }
       }//end function

       /**
       * put your comment there...
       *
       * @param mixed $sql
       * @param mixed $msg
       * @param mixed $ref
       */
       function ExeMsg($sql, $msg, $ref=''){
          if($this->execute($sql)){
              $msg = $msg;
          }else{
              $msg = "Error ระบบทำงานผิดพลาดกรุณาติดต่อผู้ดูแลระบบ";
          }

          return "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\"> <script type=\"text/JavaScript\"> alert('$msg !!'); location.href='$ref'  </script>";
       }

       /**
       * @desc Function fetch_array In Class DB
       */
       function fetch_array($result,$run=0){
            switch($this->dbtype){
            case "mysql" :
                        return mysql_fetch_array($result);
                        break;
            case "postgres" :
                        return pg_fetch_array($result);
                        break;
            case "mssql" :
                        return mssql_fetch_array($result);
                        break;
            case "oracle" :
                        return oci_fetch_array($result);
                        break;
            }
       }

       /**
       * @desc Function num_rows
       */
       function num_rows(){
            switch($this->dbtype){
            case "mysql" :
                        $this->num =  mysql_num_rows($this->result);
                        return $this->num;
                        break;
            case "postgres" :
                        $this->num =  pg_num_rows($this->result);
                        return $this->num;
                        break;
            case "mssql" :
                        $this->num =  mssql_num_rows($this->result);
                        return $this->num;
                        break;
            case "oracle" :
                        $this->num =  oci_num_rows($this->result);
                        return $this->num;
                        break;
            }
       }

       /**
       * @desc Function Quick
       */
       function quick($sql){
           switch($this->dbtype){
                case "mysql" :
                    return $this->fetch_array($this->execute($sql));
                break;
           }
       }

       /**
       * @desc Function นับ Record อย่างเร็ว
       * @param string $sql คำสั่ง SQL ที่ต้องการตรวจสอบ retuen ตัวเลข
       */
       function quick_num($sql){
            switch($this->dbtype){
                case "mysql" :
                     return $this->num_rows($this->execute($sql));
                break;
            }
       }

       /**
       * put your comment there...
       *
       * @param mixed $sql
       * @param mixed $run
       * @return array
       */
       function q_fetch_array($sql,$run=0){
            switch($this->dbtype){
            case "mysql" :
                        return mysql_fetch_array($this->execute($sql));
                        break;
            case "postgres" :
                        return pg_fetch_array($this->execute($sql));
                        break;
            case "mssql" :
                        return mssql_fetch_array($this->execute($sql));
                        break;
            case "oracle" :
                        return oci_fetch_array($this->execute($sql));
                        break;
            }
       }

       /**
       * put your comment there...
       *
       */
       function close(){
            switch($this->dbtype){
            case "mysql" :
                        if($this->conn){ mysql_close($this->conn);}
                        break;
            case "postgres" :
                        if($this->conn){ pg_close($this->conn);}
                        break;
            case "mssql" :
                        if($this->conn){ mssql_close($this->conn);}
                        break;
            case "oracle" :
                        if($this->conn){ oci_close($this->conn);}
                        break;
            }
      }

       /**
       * put your comment there...
       *
       * @param mixed $value1
       * @param mixed $value2
       * @param mixed $value3
       * @param mixed $value4
       */
       function errorMsg($value1,$value2,$value3,$value4) {
            global $title;
            $title = "SQL Error : ";
            $msgHtml = "
                <table width=\"100%\">
                  <tr>
                    <td width=\"10%\"><div align=\"left\"><strong>Error Module Name </strong></div></td>
                    <td width=\"\">:&nbsp;$value1</td>
                  </tr>
                  <tr>
                    <td><div align=\"left\"><strong>Error Page Name</strong></div></td>
                    <td>:&nbsp;$value2</td>
                  </tr>
                  <tr>
                    <td><div align=\"left\"><strong>Error SQL </strong></div></td>
                    <td>:&nbsp;$value3</td>
                  </tr>
                  <tr>
                    <td><div align=\"left\"><strong>Error Discription</strong></div></td>
                    <td>:&nbsp;$value4</td>
                  </tr>
                </table>
            ";
            echo $msgHtml;
       }


       ###################################################
       ## Witawat License Code :)
       ## @comment
       ## @version

       /**
       * Database Core Command Insert, Update, Delete
       *
       * @param mixed $type
       * @param mixed $table
       * @param mixed $data
       * @param mixed $where
       * @param mixed $ref
       */
       function dbcommand($type,$table,$data,$where='',$ref='',$nomsg=''){

           // แบ่ง Text SQL
           $type != "delete" ? $txtSql = $this->splitArray($type,$data) : $txtSql = "";

           // Gen SQL CommandLine
           if($type == "insert"){
                $sqlCommand = "insert into $table ($txtSql[filed]) value ($txtSql[value]) ";
           }else if($type == "update"){
                $sqlCommand = "update $table set $txtSql where $where ";
           }else if($type == "delete"){
                $sqlCommand = "delete from $table where $where";
           }
           if($this->execute($sqlCommand)){
                   $ref != "" ? $refCode = "location.href='$ref'" : $refCode = "";
                   $nomsg != "1" ? $alertCode = "alert('$type เรียบร้อยแล้ว !!');" : $alertCode = "";
                   echo "
                    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">
                    <script>
                        $alertCode
                        $refCode
                    </script>
                    ";
           }
       }

       /**
       * put your comment there...
       *
       * @param mixed $type
       * @param mixed $array
       */
       function splitArray($type,$array){

           $startArray = 1;
           $countArray = count($array);
           foreach ($array as $key => $value) {
                if($type == "insert"){
                    if($countArray == $startArray ){
                        $sqlTxt[filed] .= $key;
                        $sqlTxt[value] .= "'$value' ";
                    }else{
                        $sqlTxt[filed] .= $key.", ";
                        $sqlTxt[value] .= "'$value', ";
                    }
                }else if($type == "update"){
                    $countArray == $startArray ? $sqlTxt .= "$key = '$value' " : $sqlTxt .= "$key = '$value', ";
                }
                $startArray++;
           }
           //echo $countArray." ".$startArray;
           return $sqlTxt;
       }

       function covertID2Name($db,$id){
            $sqlCon = "select * from $db where id='$id' ";
            $value = $this->quick($sqlCon);
            return $value;
        }

        function getFiledByField($field,$db,$whereField,$id){
            $sqlCon = "select $field from $db where $whereField='$id' ";
            $value = $this->quick($sqlCon);
            return $value;
        }

       ###################################################
       ## Witawat License Code :)
       ## @comment
       ## @version

       function page_split($pagesize=10, $file=""){
            $this->var_pageSize=$pagesize;
            $this->var_currentPage=$page;
            $this->var_file=$file;
       }

       function _setPageSize($size=10){
           $this->var_pageSize=$size;
       }

       function _setPage($page=1){
            if(empty($page)) $page=1;
            $this->var_currentPage=$page;
       }

       function _setFile($file=""){
            $this->var_file=$file;
       }

       function _query($sql) {
            $result=mysql_query($sql);
            $num=mysql_num_rows($result);
            $rt = $num%$this->var_pageSize;

            # หาจำนวนหน้าทั้งหมด
            $this->var_totalPage = ($rt!=0) ? ceil($num/$this->var_pageSize) : floor($num/$this->var_pageSize);
            $goto = ($this->var_currentPage - 1) * $this->var_pageSize;

            $sql .= " LIMIT $goto , ".$this->var_pageSize;
            $result=mysql_query($sql);

            return $result;
        }

       function _displayPage($persent="100%",$option="",$align="left"){
        # รูปแบบตัวแปร option คือ $option = "id=$c_id";
        # ถ้ามีหลายตัวแปรก็จะเป็น  $option = "id=$c_id&name=$myname&action=$action";

        $this->var_totalPage = $this->var_totalPage == 0 ? 1 : $this->var_totalPage;

        if($option!=""){
            $option = "&".$option;
        }

        $html = "<table align=center width=$persent class=clear border=0 bordercolor=black cellspacing=0 cellpadding=2>\n";
        $html .= "<tr><td align=$align>\n";
        $html .= "<font color=#686898>\n";

        # สร้าง link เพื่อไปหน้าก่อน-หน้าถัดไป
        $html .= "กำลังแสดงหน้าที่  ";
        $html .= " <b>".$this->var_currentPage."/".$this->var_totalPage."</b> ";

        $html .= "</font>\n";
        $html .= "</td>\n";
        $html .= "<td align=right>\n";

        # วนลูปแสดงเลขหน้าทั้งหมด แบบเป็นช่วงๆ ช่วงละ 10 หน้า
        $b=floor($this->var_currentPage/10);
        $c=(($b*10));

        if($c>1) {
            $html .= "<a href='".$this->var_file."page=1".$option."' title='หน้าแรก'><img src='images/page/previous_2x_16.gif' border=0 align=absmiddle></a> \n";
        }
        if($this->var_currentPage >1 && $this->var_currentPage<=$this->var_totalPage) {
            $prevpage = $this->var_currentPage - 1;
            $html .= " <a href='".$this->var_file."page=".$prevpage.$option."' title='หน้าก่อนนี้'><img src='images/page/previous_x_16.gif' border=0 align=absmiddle></a>\n";
        }

        $html .= " <b>";

        for($i=$c; $i<$this->var_currentPage ; $i++) {
            if($i>0)
            $html .= "<a href='".$this->var_file."page=".$i.$option."'>$i</a> \n";
        }

        $html .= "<font size=2 color=red>".$this->var_currentPage."</font> \n";

        for($i=($this->var_currentPage+1); $i<($c+10) ; $i++) {
            if($i<=$this->var_totalPage)
            $html .= "<a href='".$this->var_file."page=".$i.$option."'>$i</a> \n";
        }

        $html .= "</b> ";

        if($this->var_currentPage != $this->var_totalPage) {
            $nextpage = $this->var_currentPage + 1;
            $html .= "<a href='".$this->var_file."page=".$nextpage.$option."' title='หน้าถัดไป'><img src='images/page/next_x_16.gif' border=0 align=absmiddle></a>\n";
        }
        if(($c+10)<=$this->var_totalPage){
          $html .= "<a href='".$this->var_file."page=".$this->var_totalPage.$option."' title='หน้าสุดท้าย'><img src='images/page/next_2x_16.gif' border=0 align=absmiddle></a> \n";
        }

        $html .= "</td></tr>\n";
        $html .= "</table>\n";

        return $html;
    }

    function _new_displayPage($persent="100%",$option="",$align="left"){
      //<div class="pages"><ul><li class="disabled">« Previous</li><li class="currentpage">1</li><li><a href="/law2016/law/group_list?page=2">2</a></li><li><a href="/law2016/law/group_list?page=3">3</a></li><li><a href="/law2016/law/group_list?page=4">4</a></li><li><a href="/law2016/law/group_list?page=5">5</a></li><li><a href="/law2016/law/group_list?page=6">6</a></li><li class="next"><a href="/law2016/law/group_list?page=2" class="next">Next »</a></li><br clear="all"></ul></div>
      $this->var_totalPage = $this->var_totalPage == 0 ? 1 : $this->var_totalPage;

      if($option!=""){
          $option = "&".$option;
      }
      $html = '<div class="pages"><ul>';

      $b=floor($this->var_currentPage/10);
      $c=(($b*10));

      if($this->var_currentPage >1 && $this->var_currentPage<=$this->var_totalPage) {
          $prevpage = $this->var_currentPage - 1;
          $html.='<li class="preview"><a href="'.$this->var_file.'page='.$prevpage.$option.'" class="prev">« Previous</a></li>';
      }else{
         $html.='<li class="disabled">« Previous</li>';
      }

      for($i=$c; $i<$this->var_currentPage ; $i++) {
          if($i>0)
          $html.='<li><a href="'.$this->var_file."page=".$i.$option.'">'.$i.'</a></li>';
      }

      $html.= '<li class="currentpage">'.$this->var_currentPage.'</li>';

      for($i=($this->var_currentPage+1); $i<($c+10) ; $i++) {
          if($i<=$this->var_totalPage)
          $html.='<li><a href="'.$this->var_file."page=".$i.$option.'">'.$i.'</a></li>';
      }

      if($this->var_currentPage != $this->var_totalPage) {
          $nextpage = $this->var_currentPage + 1;
          $html.='<li class="next"><a href="'.$this->var_file.'page='.$nextpage.$option.'" class="next">Next »</a></li>';
      }else{
          $html.='<li class="disabled next">Next »</li>';
      }

      $html.= "</ul></div>";
      return $html;
    }


function Country($value){
        $country=array(
                            "AL"=>"Albania",
                            "DZ"=>"Algeria",
                            "AD"=>"Andorra",
                            "AO"=>"Angola",
                            "AI"=>"Anguilla",
                            "AG"=>"Antigua and Barbuda",
                            "AR"=>"Argentina",

                            "AM"=>"Armenia",
                            "AW"=>"Aruba",
                            "AU"=>"Australia",
                            "AT"=>"Austria",
                            "AZ"=>"Azerbaijan Republic",
                            "BS"=>"Bahamas",
                            "BH"=>"Bahrain",
                            "BB"=>"Barbados",
                            "BE"=>"Belgium",

                            "BZ"=>"Belize",
                            "BJ"=>"Benin",
                            "BM"=>"Bermuda",
                            "BT"=>"Bhutan",
                            "BO"=>"Bolivia",
                            "BA"=>"Bosnia and Herzegovina",
                            "BW"=>"Botswana",
                            "BR"=>"Brazil",
                            "VG"=>"British Virgin Islands",

                            "BN"=>"Brunei",
                            "BG"=>"Bulgaria",
                            "BF"=>"Burkina Faso",
                            "BI"=>"Burundi",
                            "KH"=>"Cambodia",
                            "CA"=>"Canada",
                            "CV"=>"Cape Verde",
                            "KY"=>"Cayman Islands",
                            "TD"=>"Chad",

                            "CL"=>"Chile",
                            "C2"=>"China Worldwide",
                            "CO"=>"Colombia",
                            "KM"=>"Comoros",
                            "CK"=>"Cook Islands",
                            "CR"=>"Costa Rica",
                            "HR"=>"Croatia",
                            "CY"=>"Cyprus",
                            "CZ"=>"Czech Republic",

                            "CD"=>"Democratic Republic of the Congo",
                            "DK"=>"Denmark",
                            "DJ"=>"Djibouti",
                            "DM"=>"Dominica",
                            "DO"=>"Dominican Republic",
                            "EC"=>"Ecuador",
                            "SV"=>"El Salvador",
                            "ER"=>"Eritrea",
                            "EE"=>"Estonia",

                            "ET"=>"Ethiopia",
                            "FK"=>"Falkland Islands",
                            "FO"=>"Faroe Islands",
                            "FM"=>"Federated States of Micronesia",
                            "FJ"=>"Fiji",
                            "FI"=>"Finland",
                            "FR"=>"France",
                            "GF"=>"French Guiana",
                            "PF"=>"French Polynesia",

                            "GA"=>"Gabon Republic",
                            "GM"=>"Gambia",
                            "DE"=>"Germany",
                            "GI"=>"Gibraltar",
                            "GR"=>"Greece",
                            "GL"=>"Greenland",
                            "GD"=>"Grenada",
                            "GP"=>"Guadeloupe",
                            "GT"=>"Guatemala",

                            "GN"=>"Guinea",
                            "GW"=>"Guinea Bissau",
                            "GY"=>"Guyana",
                            "HN"=>"Honduras",
                            "HK"=>"Hong Kong",
                            "HU"=>"Hungary",
                            "IS"=>"Iceland",
                            "IN"=>"India",
                            "ID"=>"Indonesia",

                            "IE"=>"Ireland",
                            "IL"=>"Israel",
                            "IT"=>"Italy",
                            "JM"=>"Jamaica",
                            "JP"=>"Japan",
                            "JO"=>"Jordan",
                            "KZ"=>"Kazakhstan",
                            "KE"=>"Kenya",
                            "KI"=>"Kiribati",

                            "KW"=>"Kuwait",
                            "KG"=>"Kyrgyzstan",
                            "LA"=>"Laos",
                            "LV"=>"Latvia",
                            "LS"=>"Lesotho",
                            "LI"=>"Liechtenstein",
                            "LT"=>"Lithuania",
                            "LU"=>"Luxembourg",
                            "MG"=>"Madagascar",

                            "MW"=>"Malawi",
                            "MY"=>"Malaysia",
                            "MV"=>"Maldives",
                            "ML"=>"Mali",
                            "MT"=>"Malta",
                            "MH"=>"Marshall Islands",
                            "MQ"=>"Martinique",
                            "MR"=>"Mauritania",
                            "MU"=>"Mauritius",

                            "YT"=>"Mayotte",
                            "MX"=>"Mexico",
                            "MN"=>"Mongolia",
                            "MS"=>"Montserrat",
                            "MA"=>"Morocco",
                            "MZ"=>"Mozambique",
                            "NA"=>"Namibia",
                            "NR"=>"Nauru",
                            "NP"=>"Nepal",

                            "NL"=>"Netherlands",
                            "AN"=>"Netherlands Antilles",
                            "NC"=>"New Caledonia",
                            "NZ"=>"New Zealand",
                            "NI"=>"Nicaragua",
                            "NE"=>"Niger",
                            "NU"=>"Niue",
                            "NF"=>"Norfolk Island",
                            "NO"=>"Norway",

                            "OM"=>"Oman",
                            "PW"=>"Palau",
                            "PA"=>"Panama",
                            "PG"=>"Papua New Guinea",
                            "PE"=>"Peru",
                            "PH"=>"Philippines",
                            "PN"=>"Pitcairn Islands",
                            "PL"=>"Poland",
                            "PT"=>"Portugal",

                            "QA"=>"Qatar",
                            "CG"=>"Republic of the Congo",
                            "RE"=>"Reunion",
                            "RO"=>"Romania",
                            "RU"=>"Russia",
                            "RW"=>"Rwanda",
                            "VC"=>"Saint Vincent and the Grenadines",
                            "WS"=>"Samoa",
                            "SM"=>"San Marino",

                            "ST"=>"S~ao Tom'e and Pr'incipe",
                            "SA"=>"Saudi Arabia",
                            "SN"=>"Senegal",
                            "SC"=>"Seychelles",
                            "SL"=>"Sierra Leone",
                            "SG"=>"Singapore",
                            "SK"=>"Slovakia",
                            "SI"=>"Slovenia",
                            "SB"=>"Solomon Islands",

                            "SO"=>"Somalia",
                            "ZA"=>"South Africa",
                            "KR"=>"South Korea",
                            "ES"=>"Spain",
                            "LK"=>"Sri Lanka",
                            "SH"=>"St. Helena",
                            "KN"=>"St. Kitts and Nevis",
                            "LC"=>"St. Lucia",
                            "PM"=>"St. Pierre and Miquelon",

                            "SR"=>"Suriname",
                            "SJ"=>"Svalbard and Jan Mayen Islands",
                            "SZ"=>"Swaziland",
                            "SE"=>"Sweden",
                            "CH"=>"Switzerland",
                            "TW"=>"Taiwan",
                            "TJ"=>"Tajikistan",
                            "TZ"=>"Tanzania",
                            "TH"=>"Thailand",

                            "TG"=>"Togo",
                            "TO"=>"Tonga",
                            "TT"=>"Trinidad and Tobago",
                            "TN"=>"Tunisia",
                            "TR"=>"Turkey",
                            "TM"=>"Turkmenistan",
                            "TC"=>"Turks and Caicos Islands",
                            "TV"=>"Tuvalu",
                            "UG"=>"Uganda",

                            "UA"=>"Ukraine",
                            "AE"=>"United Arab Emirates",
                            "GB"=>"United Kingdom",
                            "UY"=>"Uruguay",
                            "VU"=>"Vanuatu",
                            "VA"=>"Vatican City State",
                            "VE"=>"Venezuela",
                            "VN"=>"Vietnam",
                            "WF"=>"Wallis and Futuna Islands",

                            "YE"=>"Yemen",
                            "ZM"=>"Zambia"
                            );
            foreach ($country as $key=>$val) {
                   if($value==$key){
                        $nameCount="$country[$key]";
                     }
            }
          return $nameCount;
        }

}//end class

/**
* @desc Class Oracle 8 Connect
*/
class orci8 {
       function ora_connect($username,$password,$listener){
           $this->user = $username;
           $this->pass = $password;
           $this->db = $listener;
           //$this->conn = oci_connect($this->user, $this->pass,$this->db) or die ($this->tbl_top.oci_error().$this->MsgConnDB.$this->tbl_bottom);
           $this->conn = ocilogon($this->user, $this->pass,$this->db) or die ($this->tbl_top.oci_error().$this->MsgConnDB.$this->tbl_bottom);
       }
       function orc_exe($query){
           $this->result = oci_parse($this->conn, $query) or die ($this->tbl_top."ไม่สามารถ ".$this->msg." ได้<br>".$this->tbl_bottom);
           oci_execute ($this->result);
           return $this->result;
       }
       function ora_farray($result){
           return oci_fetch_array($result);
       }
       function ora_numrow($result){
           return oci_num_rows($result);
       }
}

/**
* @desc Function Sendmail
*/
class Sendmail {
    var $headers;
    var $mailto;
    var $subject;
    var $message;
    function sendmail(){
     $this->headers="";
    }
    function from($email){
         $this->headers.="From:".$email." ";
     }
    function mailto($email){
        $this->mailto = $email;
     }
    function mailto_cc($email){
        $this->headers.="\r\nCC:".$email." ";
     }
    function mailto_bcc($email){
        $this->headers.="\r\nBCC:".$email." ";
     }
    function subject($subject){
        $this->subject = $subject;
     }
    function message($message){
         $this->headers.="\r\nMIME-Version: 1.0\n";
         $this->headers.="Content-Type: multipart/mixed; boundary=\"MIME_BOUNDRY\"\n";
         $this->headers.="X-Mailer: PHP4\n";
         $this->headers.="X-Priority: 10\n";
         $this->headers.="This is a multi-part Contentin MIME format.\n";
         $this->message.="--MIME_BOUNDRY\n";
         $this->message.="Content-type: text/html; charset=tis-620\r\n";
         $this->message.="Content-Transfer-Encoding: quoted-printable\n";
         $this->message.="\n";
         $this->message.= $message;
         $this->message.="\n";
     }
    function up_file($content,$type,$name){
          $this->message.="--MIME_BOUNDRY\n";
          $this->message.="Content-Type: ".$type."; name=\"".$name."\"\n";
          $this->message.="Content-disposition: attachment\n";
          $this->message.="Content-Transfer-Encoding: base64\n";
          $this->message.="\n";
          $this->message.=$content;
          $this->message.="\n";
          $this->message.="--MIME_BOUNDRY--\n";
     }
    function send(){
             mail($this->mailto, $this->subject, $this->message, $this->headers);
             //return $this->mailto.$this->subject.$this->message.$this->headers;
     }
}

/**
* @method Upload
*/
class Upload {
    var $max_file_size;
    var $max_image_width;
    var $_files;
    var $valid_types;
    var $msg_err;
    var $get_filename;
    var $get_typename;
    var $EncodeFile;
    function Upload()
    {
        $this->max_file_size = 9000*9000;//1 MB
        $this->max_image_width = 1024; //pixels
        $this->valid_types=array();
        $this->msg_err="";
        $this->get_filename="";
        $_files = array();
    }

    function setMaxWidth($width)
    {
        $this->max_image_width = $width;
    }

    function setMaxSize($size)
    {
        $this->max_file_size = $size;
    }

    function setValidTypes($types)
    {
        $this->valid_types=explode(",",$types);
    }

    function checkDir($dir)
    {
        $Conf =new Conf();
        $absolute_dir = $Conf->root_path.$dir;
        if (!is_dir($absolute_dir)) {
            mkdir($absolute_dir, 0777);
            chmod($absolute_dir, 0777);
        }
        return $absolute_dir;
    } // end checkDir()

/*    function uploadFile($target_dir)
    {
        $target_dir = $this->checkDir($target_dir); //print_r($_FILES); exit;
        foreach ($_FILES as $varname => $array) {
            if (!empty($array['name'])) {
                if (is_uploaded_file($array['tmp_name'])) {
                    $this->get_typename=$array['type'];
                    $filename = strtolower(str_replace(' ', '', $array['name']));
                    $f_pos=strrpos($filename,".")+1;
                    $ext=substr($filename,$f_pos,strlen($filename)-$f_pos);


                    if ($array['size'] > $this->max_file_size) {
                        $this->message_err('ไฟล์มีขนาดใหญ่เกินไป', '', '', E_USER_WARNING);

                    } elseif ((!in_array($ext, $this->valid_types))&&(count($this->valid_types)>0)) {
                        $this->message_err('ไม่อนุญาตให้อัปโหลดไฟล์ประเภทนี้', '', '', E_USER_WARNING);

                    } else {
                        // encode filename
                            $filename=date('d_m_Y_H_i_s').rand(1000,9999).'.'.$ext;

                        if (!move_uploaded_file($array['tmp_name'], $target_dir.'/'.$filename)) {
                            $this->message_err('ไม่สามารถอัปโหลดไฟล์ได้', '', '', E_USER_ERROR);
                        }else{
                                          $FilePointer=fopen($target_dir.'/'.$filename, "r");
                                          $this->EncodeFile=fread($FilePointer, filesize ($target_dir.'/'.$filename));
                                          fclose($FilePointer);
                                          $this->EncodeFile=chunk_split(base64_encode($this->EncodeFile));
                        }

                        //$this->_files[$varname] = $filename;
                        $this->get_filename=$filename;
                    }
                } else {
                    $this->message_err('ไม่สามารถ temp ไฟล์ได้', '', '', E_USER_ERROR);
                }
            }
        }
    }
*/

    function uploadFile($target_dir,$pre_fix="",$return=0,$change_file=0)
    {
        //echo "Upload <br>";
        $target_dir = $this->checkDir($target_dir); //print_r($_FILES); exit;
        foreach ($_FILES as $varname => $array) {
            /*if(is_array($array)){
                foreach ($array as $array2) {
                    echo " $array2 <br>";
                }
            } */
            if (!empty($array['name'])) {
                if (is_uploaded_file($array['tmp_name'])) {
                    $this->get_typename=$array['type'];
                    $filename = strtolower(str_replace(' ', '', $array['name']));
                    $f_pos=strrpos($filename,".")+1;
                    $ext=substr($filename,$f_pos,strlen($filename)-$f_pos);


//                    if ($array['size'] > $this->max_file_size) {
//                        $this->message_err('ไฟล์มีขนาดใหญ่เกินไป', '', '', E_USER_WARNING);
//
//                    } elseif ((!in_array($ext, $this->valid_types))&&(count($this->valid_types)>0)) {
//                        $this->message_err('ไม่อนุญาตให้อัปโหลดไฟล์ประเภทนี้', '', '', E_USER_WARNING);

                    if ((!in_array($ext, $this->valid_types))&&(count($this->valid_types)>0)) {
                        $this->message_err('ไม่อนุญาตให้อัปโหลดไฟล์ประเภทนี้', '', '', E_USER_WARNING);

                    } else {
                        // encode filename
                        if($change_file == 1){
                            //$filename=date('d_m_Y_H_i_s').rand(1000,9999).'.'.$ext;
                            $filename=date('Ymd_H_i_s_').rand(1000,9999).'.'.$ext;
                            $save_file[] = $filename;
                        }else{
                            $filename=$pre_fix.$filename;
                            $save_file[] = $filename;
                            //$filename2 = iconv('UTF-8','TIS-620',$filename);
                        }

                        if (!move_uploaded_file($array['tmp_name'], $target_dir.'/'.$filename)) {
                            $this->message_err('ไม่สามารถอัปโหลดไฟล์ได้', '', '', E_USER_ERROR);
                        }else{
                                          $FilePointer=fopen($target_dir.'/'.$filename, "r");
                                          $this->EncodeFile=fread($FilePointer, filesize ($target_dir.'/'.$filename));
                                          fclose($FilePointer);
                                          $this->EncodeFile=chunk_split(base64_encode($this->EncodeFile));
                        }

                        //$this->_files[$varname] = $filename;
                        $this->get_filename=$filename;
                    }
                } else {
                    $this->message_err('ไม่สามารถ temp ไฟล์ได้', '', '', E_USER_ERROR);
                }
            }
        }

        if($return == 1){ return $save_file ;}
    }

    function deleteFile($source_dir,$filename)
    {
        $Conf =new Conf();
        $source_dir=$Conf->root_path."/".$source_dir;
        if(($source_dir!="")&&($filename!="")){
            if (file_exists($source_dir.'/'.$filename)) {
                if (unlink($source_dir.'/'.$filename)) {
                    return true;
                }//end if
            }//end if
        }//end if
        return false;
    }

    function checkGd()
    {
        $gd_content = get_extension_funcs('gd'); // Grab function list
        if (!$gd_content) {
            $this->message_err('Upload class: GD libarary is not installed!', '', '', E_USER_ERROR);

            return false;
        } else {
            ob_start();
            phpinfo(8);
            $buffer = ob_get_contents();
            ob_end_clean();

            if (strpos($buffer, '2.0')) {
                return 'gd2';
            } else {
                return 'gd';
            }
        }
    }

    function imgResize($filename, $source_dir, $dest_width, $duplicate = false)
    {
        $source_dir = $this->checkDir($source_dir);
        $full_path = $source_dir.'/'.$filename;
        $basefilename = preg_replace("/(.*)\.([^.]+)$/","\\1", $filename);
        $ext = preg_replace("/.*\.([^.]+)$/","\\1", $filename);

        switch ($ext) {
        case 'png':
            $image = imagecreatefrompng($full_path);
            break;

        case 'jpg':
            $image = imagecreatefromjpeg($full_path);
            break;

        case 'gif':
            $image = imagecreatefromgif($full_path);
            break;

        case 'jpeg':
            $image = imagecreatefromjpeg($full_path);
            break;

        default:
            $this->message_err('Upload class: the '.$ext.' format is not allowed in your GD version', '', '', E_USER_ERROR);
            break;
        }

        $image_width = imagesx($image);
        $image_height = imagesy($image);

        // resize image pro rata
        $coefficient = ($image_width > $this->max_image_width) ? (real)($this->max_image_width / $image_width) : 1;
        $dest_width = (int)($image_width * $coefficient);
        $dest_height = (int)($image_height * $coefficient);

        // create copy of original image and next working with copy.
        // an original image still old
        if (false !== $duplicate) {
            $filename = $basefilename.'_2.'.$ext;
            copy($full_path, $source_dir.'/'.$filename);
        }

        if ('gd2' == $this->checkGd()) {
            $img_id = imagecreatetruecolor($dest_width, $dest_height);
            imagecopyresampled($img_id, $image, 0, 0, 0, 0, $dest_width + 1, $dest_height + 1, $image_width, $image_height);
        } else {
            $img_id = imagecreate($dest_width, $dest_height);
            imagecopyresized($img_id, $image, 0, 0, 0, 0, $dest_width + 1, $dest_height + 1, $image_width, $image_height);
        }

        switch ($ext) {
        case 'png':
            imagepng($img_id, $source_dir.'/'.$filename);
            break;

        case 'jpg':
            imagejpeg($img_id, $source_dir.'/'.$filename);
            break;

        case 'jpeg':
            imagejpeg($img_id, $source_dir.'/'.$filename);
            break;
        }

        imagedestroy($img_id);

        return true;
    }


    // }}}
    // {{{ displayFiles()

    /**
     * Display files in destination folder
     * @param $source_dir the dir where files stored
     * @access  public
     */
    function displayFiles($source_dir)
    {
        $source_dir = $this->checkDir($source_dir);
        if ($contents = opendir($source_dir)) {
            echo 'Directory contents:<br>';

            while (false !== ($file = readdir($contents))) {
                if (is_dir($file)) continue;

                $filesize = (real)(filesize($source_dir.'/'.$file) / 1024);
                $filesize = number_format($filesize, 3, ',', ' ');

                $ext = preg_replace("/.*\.([^.]+)$/","\\1", $file);
                echo '<p><img src="'.$this->icons_path.''.$ext.'.gif">&nbsp;'.$file.'&nbsp;('.$filesize.') Kb</p>';
            }
        }
    }

    function fileRename($source_dir, $filename, $newname)
    {
        $source_dir = $this->checkDir($source_dir);
        if (rename($source_dir.'/'.$filename, $newname)) {
            return true;
        } else {
            return false;
        }
    }

    function message_err($msg_err, $err_line, $err_file, $error_type = E_USER_WARNING)
    {
        $this->msg_err=$msg_err;
        echo $this->msg_err;
        exit;
        /*
        $error_msg.= (!empty($err_line)) ? 'on line '.$err_line : '';
        $error_msg.= (!empty($err_file)) ? 'in - '.$err_file : '';
        trigger_error($error_msg, $error_type);
        */
    }
}//end class upload


 //::::::::::::::::::::::::::::::::::::::::::::::::: Start Function Other::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

function alert($msg,$ref){
    //$msg = iconv('TIS-620','UTF-8', $msg);
    echo "
    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">
    <script>
        alert('$msg');
        location.href='$ref';
    </script>
    ";
}

function checkFileType($extName){
    // Text or Html or Pdf or MSWord or MSExcel or MSPowerPoint or Xml or Mht or Zip or Jpg or Gif or Bmp or Tif or Png or Pcx or Ai or Vsd or MsWord2007 or MsExcel2007 or MsPowerPoint2007 or All
    list($fileNmae, $fileExt) = explode(".",$extName);

    $arrayType = array(
        "doc"=>"MSWord",
        "docx"=>"MsWord2007",
        "xls"=>"MsExcel",
        "xlsx"=>"MsExcel2007",
        "ppt"=>"MsPowerPoint",
        "pptx"=>"MsPowerPoint2007",
        "pdf"=>"Pdf",
        "txt"=>"Text",
        "html"=>"Html",
        "xml"=>"Xml",
        "mht"=>"Mht",
        "zip"=>"Zip",
        "jpg"=>"Jpg",
        "gif"=>"Gif",
        "bmp"=>"Bmp",
        "tif"=>"Tif",
        "png"=>"Png",
        "pcx"=>"Pcx",
        "ai"=>"Ai",
        "vsd"=>"Vsd",
    );
    return $arrayType[$fileExt];
}

function get_day_s($day){
$d_array=array("อา.","จ.","อ.","พ.","พฤ.","ศ.","ส.");
return $d_array[$day-1];
}

function get_day_l($day){
$d_array=array("อาทิตย์.","จันทร์.","อังคาร.","พุธ.","พฤหัสบดี.","ศุกร์.","เสาร์.");
return $d_array[$day-1];
}

function get_month_s($date){
return substr($date,5,2);
}// end function

function get_month_m($month){
$m_array = array("ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
return $m_array[$month-1];
}

function get_month_l($month){
$m_array = array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
return $m_array[$month-1];
}

function get_year_s($date){
return (substr($date,2,2));
}// end function

function get_year_l($date){
return (substr($date,0,4));
}

function get_month_budget_s($month){
$m_array = array("ต.ค.","พ.ย.","ธ.ค.","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.");
return $m_array[$month-1];
}

function get_month_budget_l($month){
$m_array = array("ตุลาคม","พฤศจิกายน","ธันวาคม","มการาคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","การกฎาคม","สิงหาคม","กันยายน");
return $m_array[$month-1];
}

function get_quarter_budget_s($qaurter){
$q_array = array("Q1","Q2","Q3","Q4");
return $q_array[$qaurter-1];
}

function get_quarter_budget_m($qaurter){
$q_array = array("1(ต.ค.-ธ.ค.)","2(ม.ค.-มี.ค.)","3(เม.ย.-มิ.ย.)","4(ก.ค.-ก.ย.)");
return $q_array[$qaurter-1];
}

function get_quarter_budget_l($qaurter){
$q_array = array("Q1(ต.ค.-ธ.ค.)","Q2(ม.ค.-มี.ค.)","Q3(เม.ย.-มิ.ย.)","Q4(ก.ค.-ก.ย.)");
return $q_array[$qaurter-1];
}

function get_date_s($date){
    if(($date=="")||($date=="0000-00-00")){
        return "-";
    }else{
        return (substr($date,8,2)+0)."/".substr($date,5,2)."/".substr(substr($date,0,4)+543,2,2);
    }
}// end function

function get_date_m($date){
    if(($date=="")||($date=="0000-00-00")){
        return "-";
    }else{
        return (substr($date,8,2)+0)." ".get_month_m(substr($date,5,2))." ".substr(substr($date,0,4)+543,2,2);
    }
}// end function

function get_date_l($date){
    if(($date=="")||($date=="0000-00-00")){
        return "-";
    }else{
        return (substr($date,8,2)+0)." ".get_month_l(substr($date,5,2))." ".(substr($date,0,4)+543);
    }
}// end function

function get_dateTime_s($date){
    if(($date=="")||($date=="0000-00-00 00:00:00")){
        return "-";
    }else{
        return (substr($date,8,2)+0)."/".substr($date,5,2)."/".substr(substr($date,0,4)+543,2,2)." ".substr($date,10,9);
    }
}// end function

function get_dateTime_m($date){
    if(($date=="")||($date=="0000-00-00 00:00:00")){
        return "-";
    }else{
        return (substr($date,8,2)+0)." ".get_month_m(substr($date,5,2))." ".substr(substr($date,0,4)+543,2,2)." ".substr($date,10,9);
    }
}// end function

function get_dateTime_m2($date){
    if(($date=="")||($date=="0000-00-00 00:00:00")){
        return "-";
    }else{
        return (substr($date,8,2)+0)." ".get_month_m(substr($date,5,2))." ".substr(substr($date,0,4)+543,2,2)." ".substr(str_replace("/",":",$date),12,9);
    }
}

function get_dateTime_l($date){
    if(($date=="")||($date=="0000-00-00 00:00:00")){
        return "-";
    }else{
        return (substr($date,8,2)+0)." ".get_month_l(substr($date,5,2))." ".(substr($date,0,4)+543)." ".substr($date,10,9);
    }
}// end function

function get_date_m_ys($date){
    if(($date=="")||($date=="0000-00-00")){
        return "-";
    }else{
        return (substr($date,8,2)+0)." ".get_month_m(substr($date,5,2))." ".(substr($date,0,4)+543);
    }
}

function get_dateTime_ThToEng($date){
    $month_array = array("ม.ค."=>'01',"ก.พ."=>"02","มี.ค."=>"03","เม.ย."=>"04","พ.ค."=>"05","มิ.ย."=>"06","ก.ค."=>"07","ส.ค."=>"08","ก.ย."=>"09","ต.ค."=>"10","พ.ย."=>"11","ธ.ค."=>"12");
    list($day, $month, $year) = explode(" ",$date);
    $year = $year - 543;
    return $year."-".$month_array[$month]."-".$day;
}

function date_diff($today, $update_date) {
$s = strtotime($today)-strtotime($update_date);
$d = intval($s/86400);
return $d;
}

function hour_diff($today, $update_date) {
$s = strtotime($today)-strtotime($update_date);
$d = intval($s/3600);
return $d;
}

function chk_number($str){
    $str=str_replace(",","",$str);
    if(is_numeric($str)){
        return $str;
    }else{
        return 0;
    }
}

?>
