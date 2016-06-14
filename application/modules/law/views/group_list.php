<!-- หมายเหตุ :: เลียนแบบฟอร์มจากเว็บเก่าที่ไฟล์ /opt/lampp/htdocs/law/law/modules/search/list.php -->

<style type="text/css" media="screen">
	.search{padding:10px; background: rgba(158, 158, 158, 0.46);}
</style>
<div id="type-list">
  <span class="title-law2">แสดงข้อมูลแบบกลุ่ม</span>
  <div class="line1">&nbsp;</div>
	
	<form class="form-inline search">
	  <div class="form-group">
	    <div class="col-sm-3">
	      <?=form_dropdown('law_group_id', get_option('id','name','law_groups order by id asc'), @$_GET['law_group_id'],'class="form-control" style="width:auto;"','--- เลือกกลุ่มกฎหมาย ---');?>
	    </div>
	  </div>
	  <div class="form-group">
	    <div id="lawtype" class="col-sm-3">
	    	<?=form_dropdown('law_type_id', get_option('id','name','law_types order by id asc'), @$_GET['law_type_id'],' class="form-control" style="width:auto;"','--- เลือกหมวดกฎหมาย ---');?>
	    </div>
	  </div>
	  <div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
	      <button type="submit" class="btn btn-info">ค้นหา</button>
	    </div>
	  </div>
	</form>

  <table class="table table-striped" id="tb-plan">
    <thead>
      <tr>
        <th class="col-sm-9">ชื่อกฎหมาย</th>
        <th colspan="2" class="col-sm-1 text-center">ดาวน์โหลด</th>
      </tr>
      <tr>
      	<th></th>
      	<th class="text-center">th</th>
      	<th class="text-center">eng</th>
      </tr>
    </thead>
    
  </table>
  
  <!-- Accordion begin -->
      <ul class="accordion_example">
      	<?foreach($laws as $row):?>
      		<?
      			$sql = "SELECT law_datalaws.id,
					        law_datalaws.name_th,
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
                  <td class="td-line"><a href="law/view/<?=$row->id?>" target="_blank"><?=str_replace("|"," ",$row->name_th)?></a></td>
                  <td valign="top" width="48" class="td-line text-center">
                  	<?if($row->filename_th != ""):?>
                    <a href="law/download_by_name/<?=$row->id?>?filename=<?=$row->filename_th?>"><?=file_icon_th($row->filename_th)?></a>
                    <?endif;?>
                    </td>
                    <td valign="top" width="48" class="td-line text-center">
					<?if($row->filename_eng != ""):?>
					<a href="law/download_by_name/<?=$row->id?>?filename=<?=$row->filename_eng?>"><?=file_icon_en($row->filename_eng)?></a>
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
                  <td valign="top" class="td-line"><a href="law/view/<?=$sublaw->id?>" target="_blank"><?=str_replace("|"," ",$sublaw->name_th)?></a></td>
                  <td valign="top" width="45" class="td-line text-center">
                    <?if($sublaw->filename_th != ""):?>
                    <a href="law/download_by_name/<?=$sublaw->id?>?filename=<?=$sublaw->filename_th?>"><?=file_icon_th($sublaw->filename_th)?></a>
                    <?endif;?>
                  </td>
                  <td valign="top" width="45" class="td-line text-center">
                    <?if($sublaw->filename_eng != ""):?>
					<a href="law/download_by_name/<?=$sublaw->id?>?filename=<?=$sublaw->filename_eng?>"><?=file_icon_en($sublaw->filename_eng)?></a>
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
  
  <?=$laws->pagination_front();?>
</div>

<script type="text/javascript" charset="utf-8">
$(document).ready(function(){
	$("select[name='law_group_id']").live("change",function(){
		$.get('ajax/get_select_lawtype',{
				'law_group_id' : $(this).val()
			},function(data){
				$("#lawtype").html(data);
			});
	});
});
</script>