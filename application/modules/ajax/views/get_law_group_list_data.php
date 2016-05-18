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
              <td valign="top" width="35" class="td-line text-center">
              	<?if($row->filename_th != ""):?>
                <a href="law/download_by_name/<?=$row->id?>?filename=<?=$row->filename_th?>"><?=file_icon($row->filename_th)?></a>
                <?endif;?>
                </td>
                <td valign="top" width="35" class="td-line text-center">
				<?if($row->filename_eng != ""):?>
				<a href="law/download_by_name/<?=$row->id?>?filename=<?=$row->filename_eng?>"><?=file_icon($row->filename_eng)?></a>
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
              <td valign="top" width="33" class="td-line text-center">
                <?if($sublaw->filename_th != ""):?>
                <a href="law/download_by_name/<?=$sublaw->id?>?filename=<?=$sublaw->filename_th?>"><?=file_icon($sublaw->filename_th)?></a>
                <?endif;?>
              </td>
              <td valign="top" width="33" class="td-line text-center">
                <?if($sublaw->filename_eng != ""):?>
				<a href="law/download_by_name/<?=$sublaw->id?>?filename=<?=$sublaw->filename_eng?>"><?=file_icon($sublaw->filename_eng)?></a>
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
  <div class="text-center" >
  	<a href="law/group_list?law_group_id=<?=$_GET['law_group_id']?>&law_type_id=<?=$_GET['law_type_id']?>">ดูทั้งหมด</a>
  </div>
  
<script type="text/javascript" src="themes/law/js/smk-accordion.js"></script>
<script type="text/javascript">
  jQuery(document).ready(function($){
    $(".accordion_example").smk_Accordion();
 });
</script>