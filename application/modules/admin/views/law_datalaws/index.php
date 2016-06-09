<h3>ข้อมูลกฎหมาย</h3>
<div id="search">
<div id="searchBox">
<form id="cross_law_form" class="form-inline">
  <div class="col-xs-4">
    <input type="text" class="form-control " id="exampleInputName2" placeholder="ชื่อกฎหมาย" name="search" value="<?=@$_GET['search']?>">
  </div><br><br>
  <div>
	  <?=form_dropdown('law_group_id',get_option('id','name','law_groups order by id asc'),@$_GET['law_group_id'],'class="form-control" style="width:auto;"','-- ทุกกลุ่มกฎหมาย --');?>
	  <span id="lawtype">
    	<?=form_dropdown('law_type_id', get_option('id','name','law_types order by id asc'), @$_GET['law_type_id'],' class="form-control" id="input-cat-group" style="width:auto;"','--- เลือกหมวดกฎหมาย ---');?>
    </span>
  </div>
  <div style="margin-top: 6px;">
	   <?=form_dropdown('law_maintype_id',get_option('id','typeName','law_maintypes order by typeName asc'),@$_GET['law_maintype_id'],'class="form-control" style="width:auto;"','-- ทุกประเภทกฎหมาย --');?>
	  <span id="lawsubmaintype">
        <?=form_dropdown('law_submaintype_id', get_option('id','typeName','law_submaintypes order by id asc'), @$_GET['law_submaintype_id'],'class="form-control" style="width:auto;"','--- เลือกประเภทย่อยกฎหมาย ---');?>
      </span>
</div>
<div style="margin-top: 6px;">
	<?=form_dropdown('sortDate', array('notic_date asc'=>'ก่อน - หลัง','notic_date desc'=>'หลัง - ก่อน'), @$_GET['sortDate'],' class="form-control" id="input-cat-group" style="width:auto;"','--- เรียงตามวัน ---');?>
	<?=form_dropdown('sortName', array('name_th asc'=>'ก - ฮ','name_th desc'=>'ฮ - ก'), @$_GET['sortName'],' class="form-control" id="input-cat-group" style="width:auto;"','--- เรียงตามตัวอักษร ---');?>
	<button id="searchCrossLawBtn" type="submit" class="btn btn-info"><img src="themes/admin/images/search.png" width="16" height="16" />Search</button>
</div>
</form>

  
</div>
</div>
<div id="btnBox">
  <input type="button" title="เพิ่มข้อมูลกฎหมาย" value="เพิ่มข้อมูลกฎหมาย" onclick="document.location='admin/law_datalaws/form'" class="btn btn-warning vtip" />
</div>

<?php echo $rs->pagination()?>

<table class="tblist">
<tr>
  <th>#</th>
  <th>วันที่ประกาศใช้</th>
  <th width="40%">ชื่อกฎหมาย</th>
  <th width="25%">หมวดกฎหมาย</th>
  <!-- <th>กฎหมายที่เกี่ยวข้อง</th> -->
  <th>สถานะ</th>
  <th>จัดการ</th>
  </tr>
  <?foreach($rs as $key=>$row):?>
  <tr class="<?=alternator('','odd');?>">
	  <td><?=($key+1)+$rs->paged->current_row?></td>
	  <td><?=mysql_to_th($row->notic_date)?></td>
	  <td><?=str_replace("|"," ",$row->name_th)?></td>
	  <td><?=get_law_group_text($row->id)?></td>
	  <!-- <td>-</td> -->
	  <td><?=get_datalaw_status($row->status)?></td>
	  <td><a href="admin/law_datalaws/form/<?=$row->id?>"><img src="themes/admin/images/edit.png" width="24" height="24" style="margin-right:10px;" class="vtip" title="แก้ไขรายการนี้" /></a> <a href="admin/law_datalaws/delete/<?=$row->id?>"><img src="themes/admin/images/remove.png" width="32" height="32" class="vtip" title="ลบรายการนี้"  onclick="return confirm('<?php echo lang('notice_confirm_delete');?>')" /></a></td>
  </tr>
  <?endforeach;?>
</table>

<?php echo $rs->pagination()?>

<script>
$(document).ready(function(){
	// select กลุ่มกฏหมาย -> หมวดกฏหมาย
	$('form').on('change', "select[name='law_group_id']", function() {
		$('.loading').show();
		$.get('ajax/get_select_lawtype',{
			'law_group_id' : $(this).val()
		},function(data){
			$('.loading').hide();
			$("#lawtype").html(data);
		});
	});

	// select ประเภทกฏหมาย -> ประเภทย่อยกฏหมาย
	$('form').on('change', "select[name='law_maintype_id']", function() {
		var law_maintype_id = $(this).val();
		$('.loading').show();
		$.get('ajax/get_select_submaintype',{
			'law_maintype_id' : $(this).val()
		},function(data){
			$('.loading').hide();
			$("#lawsubmaintype").html(data);
		});
	});
});
</script>