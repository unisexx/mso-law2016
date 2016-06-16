<?php
if(!function_exists('page_active'))
{
	function page_active($page,$uri=4,$class='active')
	{
		$CI =& get_instance();
		return ($CI->uri->segment($uri)==$page) ? 'class='.$class : '';
	}
}

if(!function_exists('get_option'))
{
	function get_option($value,$text,$table,$condition = NULL,$lang = NULL)
	{
		$CI =& get_instance();
		$query = $CI->db->query("select * from $table $condition");
		foreach($query->result() as $item) $option[$item->{$value}] = lang_decode($item->{$text},$lang);
		return $option;
	}
}

if(!function_exists('fix_file'))
{
    function fix_file(&$files)
    {
        $names = array( 'name' => 1, 'type' => 1, 'tmp_name' => 1, 'error' => 1, 'size' => 1);

        foreach ($files as $key => $part) {
            // only deal with valid keys and multiple files
            $key = (string) $key;
            if (isset($names[$key]) && is_array($part)) {
                foreach ($part as $position => $value) {
                    $files[$position][$key] = $value;
                }
                // remove old key reference
                unset($files[$key]);
            }
        }
    }
}

if(!function_exists('thumb'))
{
    function thumb($imgUrl,$width,$height,$zoom_and_crop,$param = NULL){
    	if(strpos($imgUrl, "http://") !== false or strpos($imgUrl, "https://") !== false){
    		return "<img ".$param." src=".site_url("media/timthumb/timthumb.php?src=".$imgUrl."&zc=".$zoom_and_crop."&w=".$width."&h=".$height)." width=".$width." height=".$height.">";
    	}else{
    		return "<img ".$param." src=".site_url("media/timthumb/timthumb.php?src=".site_url($imgUrl)."&zc=".$zoom_and_crop."&w=".$width."&h=".$height)."  width=".$width." height=".$height.">";
    	}

    }
}

if(!function_exists('check_image_url'))
{
	function check_image_url($url=false,$facebook_id=false,$google_picture_link=false,$twitter_picture_link=false,$imgur_img_type=false)
	{
		if($url!=false){
			// ถ้าลิ้งค์รูปเป็นลิ้งค์ของ imgur.com
			if(get_domain($url) == "imgur.com"){
				if($imgur_img_type == "original"){
					return $url;	// รูปดั้งเดิม
				}else{
					// หาไอดีรูป เพื่อทำ thumbnail
					$array = parse_url($url);
					$imgThumb = substr( $array['path'],1,-4).'b';
					$imgType = substr($url, strrpos($url, ".") + 1);
					return "http://i.imgur.com/".$imgThumb.".".$imgType;
				}
			}else{
				return $url;
			}
			// return site_url("media/timthumb/timthumb.php?src=".$url."&zc=1&w=120&h=120");
		}elseif($facebook_id!=false){
			return "https://graph.facebook.com/".$facebook_id."/picture?type=large";
			// return site_url("media/timthumb/timthumb.php?src=https://graph.facebook.com/".$facebook_id."/picture?type=large&zc=1&w=120&h=120");
		}elseif($google_picture_link!=false){
			return "$google_picture_link";
		}elseif($twitter_picture_link!=false){
			return $twitter_picture_link;
		}
	}
}

if(!function_exists('imgur_upload'))
{
	function imgur_upload($postImg)
	{
		if($postImg){
			$image = file_get_contents($postImg);
			$client_id="94af93212e2e617";//Your Client ID here
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, 'https://api.imgur.com/3/image.json');
			curl_setopt($ch, CURLOPT_POST, TRUE);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array( 'Authorization: Client-ID ' . $client_id ));
			curl_setopt($ch, CURLOPT_POSTFIELDS, array( 'image' => base64_encode($image) ));

			$reply = curl_exec($ch);

			curl_close($ch);

			$reply = json_decode($reply);
			return @$reply->data->link;
		}
	}
}

if(!function_exists('meta_description'))
{
	function meta_description($description=false){
	    $CI =& get_instance();
	    if($description!=""){
	        $CI->template->append_metadata( meta('description',$description));
	    }
	}
}

if(!function_exists('get_domain'))
{
	function get_domain($url)
	{
	  $pieces = parse_url($url);
	  $domain = isset($pieces['host']) ? $pieces['host'] : '';
	  if (preg_match('/(?P<domain>[a-z0-9][a-z0-9\-]{1,63}\.[a-z\.]{2,6})$/i', $domain, $regs)) {
	    return $regs['domain'];
	  }
	  return false;
	}
}

if(!function_exists('get_webboard_quiz_name'))
{
	function get_webboard_quiz_name($id){
    $CI =& get_instance();
    $rs = new Law_quiz($id);
    return $rs->quiz_title;
	}
}

if(!function_exists('get_law_group_name'))
{
	function get_law_group_name($id){
    $CI =& get_instance();
    $rs = new Law_group($id);
    return lang_decode($rs->name);
	}
}

if(!function_exists('get_law_type_name'))
{
	function get_law_type_name($id){
    $CI =& get_instance();
    $rs = new Law_type($id);
    return lang_decode($rs->name);
	}
}

if(!function_exists('get_law_maintype_name'))
{
	function get_law_maintype_name($id){
    $CI =& get_instance();
    $rs = new Law_maintype($id);
    return lang_decode($rs->typeName);
	}
}

if(!function_exists('get_law_submaintype_name'))
{
	function get_law_submaintype_name($id){
    $CI =& get_instance();
    $rs = new Law_submaintype($id);
    return lang_decode($rs->typeName);
	}
}

if(!function_exists('get_usergroup_array'))
{
	function get_usergroup_array(){
		$CI =& get_instance();
		$rs = new User_group();
		$rs->order_by('id','asc')->get();
		
		$user_group = array();
		foreach($rs as $row){
			$user_group[$row->id] = $row->name;
		}
		
		return $user_group;
	}
}

if(!function_exists('get_datalaw_status'))
{
	function get_datalaw_status($id){
    $status = array('1'=>'บังคับใช้','2'=>'ยกเลิก','3'=>'อยู่ระหว่างพิจารณา');
    return $status[$id];
	}
}

if(!function_exists('get_law_version_versiontype_status'))
{
	function get_law_version_versiontype_status($id){
    $status = array("1"=>"ยกเลิก","2"=>"แก้ไข","3"=>"เพิ่มเติม","4"=>"แก้ไข / เพิ่มเติม");   
    return $status[$id];
	}
}

if(!function_exists('file_icon'))
{
	function file_icon($file){
	    $ext = pathinfo($file, PATHINFO_EXTENSION);
		if($ext == 'doc'){
			return '<i class="fa fa-file-word-o" aria-hidden="true"></i>';
		}else{
			return '<i class="fa fa-file-pdf-o text-danger" aria-hidden="true"></i>';
		}
	}
}

if(!function_exists('file_icon_th'))
{
	function file_icon_th($file){
	    $ext = pathinfo($file, PATHINFO_EXTENSION);
		if($ext == 'doc'){
			return '<img src="themes/law/images/word_th.png">';
		}else{
			return '<img src="themes/law/images/pdf_th.png">';
		}
	}
}

if(!function_exists('file_icon_en'))
{
	function file_icon_en($file){
	    $ext = pathinfo($file, PATHINFO_EXTENSION);
		if($ext == 'doc'){
			return '<img src="themes/law/images/word_en.png">';
		}else{
			return '<img src="themes/law/images/pdf_en.png">';
		}
	}
}

if(!function_exists('get_law_group_text'))
{
	function get_law_group_text($id){
	   $CI =& get_instance();
	   $law_datalaw = $CI->db->query("select * from law_datalaws where id = ".$id)->row();
	   
	   $txt1 = get_law_group_name($law_datalaw->law_group_id);
	   $txt2 = get_law_type_name($law_datalaw->law_type_id);
	   $groupLaw = "$txt1 > $txt2 "; 
	   if($law_datalaw->law_type_id==10){
	      $txt3 = get_law_type_name($law_datalaw->law_maintype_id);
	      $txt4 = get_law_submaintype_name($law_datalaw->law_submaintype_id);
	      $groupLaw .=  "> $txt3 > $txt4";
	   }elseif($law_datalaw->law_type_id!=11 && $law_datalaw->law_type_id!=10){  
	      $txt3 = get_law_maintype_name($law_datalaw->law_maintype_id);
	      $txt4 = get_law_submaintype_name($law_datalaw->law_submaintype_id);
	      $groupLaw .=  "> $txt3 > $txt4"; 
	   }        
    return $groupLaw;
	}
}

if(!function_exists('get_law_name'))
{
	function get_law_name($id,$link=false){
		$CI =& get_instance();
		$law_datalaw = $CI->db->query("select name_th from law_datalaws where id = ".$id)->row();
		if($link){
			return '<a href="law/view/'.$id.'" target="_blank">'.str_replace("|"," ",$law_datalaw->name_th).'</a>';	
		}else{
			return str_replace("|"," ",$law_datalaw->name_th);	
		}
	}
}

// import code
if(!function_exists('getIMType'))
{
    function getIMType($type,$id1,$id2,$id3=''){               
        //echo "$type | $id1 | $id2 | $id3 ";
        $name1 = $this->covertID2Name(LAW_MAINTYPE,$id1);
        $name2 = $this->covertID2Name(LAW_SUBMAINTYPE,$id2);    
        $lawName1 = $name1[typeName];
        $lawName2 = $name2[typeName];                 
        if($type == 1){                    
            if(($id1 == 1 || $id1 == 2) && $id2 ){
                return "im1";
            }  
            if($id1 == 3 && $id2){
                return "im2";
            }
        }                                                                           
        if($type == 2){  
             if(($id3 == 7 || $id3 == 8 || $id3 == 9  || $id3 == 11 ) && $id2 ){
                return "im3";
             }         
             if(($id2 >= 20) && $id3){
                return "im4";
             }      
        }   
    }
}

// function user_logs(){
	// $rs = new User_log();
// }
?>
