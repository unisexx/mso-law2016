<?$usergroup_name = get_usergroup_array();?>

<h3>หมวดกฎหมาย</h3>
<div id="search">
<div id="searchBox">
<form class="form-inline" method="get" action="admin/law_types">
  <div class="col-xs-4">
    <input type="text" class="form-control " name="search" placeholder="ชื่อหมวดกฎหมาย" value="<?=@$_GET['search']?>">
  </div>
  <?=form_dropdown('law_group_id', get_option('id','name','law_groups order by name asc'), @$_GET['law_group_id'],'class="form-control" style="width:auto;"','-- ทุกกลุ่มกฎหมาย --');?>
  <button type="submit" class="btn btn-info"><img src="themes/admin/images/search.png" width="16" height="16" />Search</button>
</form>


</div>
</div>
<div id="btnBox">
  <input type="button" title="เพิ่มตำแหน่ง" value="เพิ่มตำแหน่ง" onclick="document.location='admin/law_types/form'" class="btn btn-warning vtip" />
</div>

<?php echo $rs->pagination()?>

<table class="tblist">
<tr>
  <th>ลำดับ</th>
  <th>ชื่อหมวดกฎหมาย</th>
  <th>จำนวนกฎหมาย</th>
  <th>กลุ่มกฎหมาย</th>
  <th>สิทธิการนำเข้ากฎหมาย</th>
  <th>จัดการ</th>
  </tr>
  <?foreach($rs as $key=>$row):?>
  <tr class="<?=alternator('','odd');?>">
	  <td><?=($key+1)+$rs->paged->current_row?></td>
	  <td><?=lang_decode($row->name)?></td>
	  <td><?=$row->law_datalaw->count();?></td>
      <td><?=lang_decode($row->law_group->name)?></td>
      <td>
      		<?
      			$user_groups = explode(",", $row->unit_import);
				foreach ($user_groups as $item)
				{
					echo "• ".@$usergroup_name[$item]."<br>";
				}
      		?>
      </td>
	  <td><a href="admin/law_types/form/<?=$row->id?>"><img src="themes/admin/images/edit.png" width="24" height="24" style="margin-right:10px;" class="vtip" title="แก้ไขรายการนี้" /></a> <a href="admin/law_types/delete/<?=$row->id?>"><img src="themes/admin/images/remove.png" width="32" height="32" class="vtip" title="ลบรายการนี้"  onclick="return confirm('<?php echo lang('notice_confirm_delete');?>')" /></a></td>
	</tr>
  <?endforeach;?>
</table>

<?php echo $rs->pagination()?>
