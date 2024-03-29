<div id="cat-group">
  <span class="title-law1"><?=lang("ho_group")?></span>
  <div id="bgcat-group">
  	
    <label class="text-cat-group"><?=lang("ho_group_select")?> :</label>
    <?=form_dropdown('law_group_id', get_option('id','name','law_groups order by id asc'), @$_GET['law_group_id'],'class="form-control" id="input-cat-group"','--- '.lang("ho_select_law_group").' ---');?>
    <label class="text-cat-group"><?=lang("ho_group_select2")?> :</label>
    <span id="lawtype" style="width:30%;">
    <?=form_dropdown('law_type_id', get_option('id','name','law_types order by id asc'), @$_GET['law_type_id'],' class="form-control" id="input-cat-group"','--- '.lang("ho_select_law_type").' ---');?>
    </span>
    <i class="loading fa fa-refresh fa-spin fa-2x"></i>
    
    <div>
      <table width="99%" border="0" cellspacing="0" cellpadding="0" class="text-head">
        <tbody>
          <tr>
            <td width="7">&nbsp;</td>
            <td valign="top"><?=lang("ho_law")?></td>
            <td colspan="2" valign="top" align="center"><?=lang("ho_download")?></td>
          </tr>
          <tr>
            <td width="10">&nbsp;</td>
            <td>&nbsp;</td>
            <td valign="top" width="30" align="center">th</td>
            <td valign="top" width="30" align="center">eng</td>
          </tr>
        </tbody>
      </table>
      

      <div id="group_list">
      <!-- Accordion begin -->
      <ul class="accordion_example">
      	<?foreach($laws as $row):?>
      		<?
      			$sql = "SELECT law_datalaws.id,
					        law_datalaws.name_th,
					        law_datalaws.name_eng,
					        law_datalaws.filename_th,
					        law_datalaws.filename_eng
					      FROM law_datalaws
					      WHERE law_datalaws.apply_power_id = '$row->id'
					      ORDER BY law_datalaws.law_submaintype_id ASC,
					        law_datalaws.name_th ASC";
				$sublaws = $this->db->query($sql)->result();
      		?>
      	<!-- กลุ่มหลัก -->
        <li>
          <div>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tbody>
                <tr>
                  <td class="td-line" width="30">
                  	<?if($sublaws):?>
                  		<img src="themes/law/images/icon-folder-plus.png" width="19" height="15">
                  	<?else:?>
                  		<img src="themes/law/images/icon-page-blue.png" width="13" height="18">
                  	<?endif;?>
                  </td>
                  <td class="td-line"><a href="law/view/<?=$row->id?>" target="_blank">
                  	<?if(@$this->session->userdata('lang') == "th"):?>
				            <?=str_replace("|"," ",$row->name_th)?>
					<?elseif(@$this->session->userdata('lang') == "en"):?>
				            <?if($row->name_eng == ""):?>
				            	<?=str_replace("|"," ",$row->name_th)?>
				            <?else:?>
				            	<?=str_replace("|"," ",$row->name_eng)?>
				            <?endif;?>
				    <?endif;?>
                  </a></td>
                  <td valign="top" width="35" class="td-line text-center">
                  	<?if($row->filename_th != ""):?>
                    <!-- <a href="law/download_by_name/<?=$row->id?>?filename=<?=$row->filename_th?>"><?=file_icon_th($row->filename_th)?></a> -->
                    <a href="uploads/lawfile/<?=$row->filename_th?>" target="_blank"><?=file_icon_th($row->filename_th)?></a>
                    <?endif;?>
                    </td>
                    <td valign="top" width="35" class="td-line text-center">
                    <?if($row->filename_eng != ""):?>
                    <!-- <a href="law/download_by_name/<?=$row->id?>?filename=<?=$row->filename_eng?>"><?=file_icon_en($row->filename_eng)?></a> -->
                    <a href="uploads/lawfile/<?=$row->filename_eng?>" target="_blank"><?=file_icon_en($row->filename_eng)?></a>
                    <?endif;?>
                    </td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- กลุ่มหลัก -->
          <?if($sublaws):?>
          <!-- กลุ่มย่อย -->
          <div>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tbody>
              	<?foreach($sublaws as $sublaw):?>
              	<tr>
                  <td width="30">&nbsp;</td>
                  <td width="20" valign="top" class="td-line">
                    <img src="themes/law/images/icon-page-gray.png" width="10" height="14">
                  </td>
                  <td valign="top" class="td-line"><a href="law/view/<?=$sublaw->id?>" target="_blank">
                  	<?if(@$this->session->userdata('lang') == "th"):?>
				            <?=str_replace("|"," ",$sublaw->name_th)?>
					<?elseif(@$this->session->userdata('lang') == "en"):?>
				            <?if($sublaw->name_eng == ""):?>
				            	<?=str_replace("|"," ",$sublaw->name_th)?>
				            <?else:?>
				            	<?=str_replace("|"," ",$sublaw->name_eng)?>
				            <?endif;?>
				    <?endif;?>
                  </a></td>
                  <td valign="top" width="33" class="td-line text-center">
                    <?if($sublaw->filename_th != ""):?>
                    <!-- <a href="law/download_by_name/<?=$sublaw->id?>?filename=<?=$sublaw->filename_th?>"><?=file_icon_th($sublaw->filename_th)?></a> -->
                    <a href="uploads/lawfile/<?=$sublaw->filename_th?>" target="_blank"><?=file_icon_th($sublaw->filename_th)?></a>
                    <?endif;?>
                  </td>
                  <td valign="top" width="33" class="td-line text-center">
                    <?if($sublaw->filename_eng != ""):?>
                    <!-- <a href="law/download_by_name/<?=$sublaw->id?>?filename=<?=$sublaw->filename_eng?>"><?=file_icon_en($sublaw->filename_eng)?></a> -->
                    <a href="uploads/lawfile/<?=$row->filename_eng?>" target="_blank"><?=file_icon_en($row->filename_eng)?></a>
                    <?endif;?>
                  </td>
                </tr>
              	<?endforeach;?>
              </tbody>
            </table>
          </div>
          <!-- กลุ่มย่อย -->
          <?endif;?>
        </li>
      	<?endforeach;?>
      </ul>
      <!-- Accordion end -->
      </div>
      
    </div>
    <style>
    	#bgcat-group{min-height: 548px;}
    	select[name=law_type_id]{width:30% !important;}
    	#cat-group{position:relative;}
    	.loading{position: absolute;top: 48px;right: 120px;}
    </style>
    <script type="text/javascript" src="themes/law/js/smk-accordion.js"></script>
    <script type="text/javascript">
      jQuery(document).ready(function($){
        $(".accordion_example").smk_Accordion();
     });
    </script>
    
    <script type="text/javascript" charset="utf-8">
	$(document).ready(function(){
		$('.loading').hide();
		
		$("select[name='law_group_id']").live("change",function(){
			$('.loading').show();
			$.get('ajax/get_select_lawtype',{
					'law_group_id' : $(this).val()
				},function(data){
					$('.loading').hide();
					$("#lawtype").html(data);
				});
		});
		
		$("select[name='law_type_id']").live("change",function(){
			$('.loading').show();
			$.get('ajax/get_law_group_list_data',{
					'law_group_id' : $("select[name='law_group_id']").val(),
					'law_type_id' : $(this).val()
				},function(data){
					$('.loading').hide();
					$("#group_list").html(data);
				});
		});
	});
	</script>
    <!-- <div class="pages">
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
    </div> -->
  </div>
</div>
<div class="clearfix">&nbsp;</div>