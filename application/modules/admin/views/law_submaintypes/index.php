<h3>ประเภทย่อยกฎหมาย</h3>
<div id="search">
<div id="searchBox">
<form class="form-inline" method="get" action="admin/law_submaintypes">
  <div class="col-xs-4">
    <input type="text" class="form-control " name="search" placeholder="ชื่อประเภทย่อยกฎหมาย" value="<?=@$_GET['search']?>">
  </div>
  <?=form_dropdown('law_maintype_id', get_option('id','typeName','law_maintypes order by typeName asc'), @$_GET['law_maintype_id'],'class="form-control" style="width:auto;"','-- ประเภทกฎหมาย --');?>
  <button type="submit" class="btn btn-info"><img src="themes/admin/images/search.png" width="16" height="16" />Search</button>
</form>


</div>
</div>
<div id="btnBox">
  <input type="button" title="เพิ่มตำแหน่ง" value="เพิ่มตำแหน่ง" onclick="document.location='admin/law_submaintypes/form'" class="btn btn-warning vtip" />
</div>

<?php echo $rs->pagination()?>

<table class="tblist">
<tr>
  <th>ลำดับ</th>
  <th>ชื่อประเภทย่อยกฎหมาย</th>
  <th>ประเภทกฎหมาย</th>
  <th>จัดการ</th>
  </tr>
  <?foreach($rs as $key=>$row):?>
  <tr class="<?=alternator('','odd');?>">
	  <td><?=($key+1)+$rs->paged->current_row?></td>
	  <td><?=$row->typeName?></td>
	  <td><?=$row->law_maintype->typeName?></td>
	  <td><a href="admin/law_submaintypes/form/<?=$row->id?>"><img src="themes/admin/images/edit.png" width="24" height="24" style="margin-right:10px;" class="vtip" title="แก้ไขรายการนี้" /></a> <a href="admin/law_submaintypes/delete/<?=$row->id?>"><img src="themes/admin/images/remove.png" width="32" height="32" class="vtip" title="ลบรายการนี้"  onclick="return confirm('<?php echo lang('notice_confirm_delete');?>')" /></a></td>
	</tr>
  <?endforeach;?>
</table>

<?php echo $rs->pagination()?>
