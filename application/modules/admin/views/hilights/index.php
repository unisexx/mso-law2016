<h3>ไฮไลท์</h3>
<div id="search">
<div id="searchBox">
<form class="form-inline" method="get" action'admin/law_plans'>
  <div class="col-xs-4">
    <input type="text" class="form-control" name="search" id="exampleInputName2" placeholder="ชื่อไฮไลท์" value="<?=@$_GET['search']?>">
    </div>
  <button type="submit" class="btn btn-info"><img src="themes/admin/images/search.png" width="16" height="16" />Search</button>
</form>

  
</div>
</div>
<div id="btnBox">
  <input type="button" title="เพิ่มแผนพัฒนากฎหมาย" value="เพิ่มแผนพัฒนากฎหมาย" onclick="document.location='admin/hilights/form'" class="btn btn-warning vtip" />
</div>

<?php echo $rs->pagination()?>

<table class="tblist">
<tr>
  <th>#</th>
  <th>ชื่อ</th>
  <th>รูปภาพ (TH)</th>
  <th>รูปภาพ (ENG)</th>
  <th>ลิ้งค์</th>
  <th>จัดการ</th>
  </tr>
  <?foreach($rs as $key=>$row):?>
  <tr class="<?=alternator('','odd');?>">
	  <td><?=($key+1)+$rs->paged->current_row?></td>
	  <td><?=lang_decode($row->name)?></td>
	  <td><?if($row->img_th):?><img src="uploads/hilight/<?=$row->img_th?>" width="350"><?endif;?></td>
	  <td><?if($row->img_en):?><img src="uploads/hilight/<?=$row->img_en?>" width="350"><?endif;?></td>
	  <td><?=$row->url?></td>
	  <td><a href="admin/hilights/form/<?=$row->id?>"><img src="themes/admin/images/edit.png" width="24" height="24" style="margin-right:10px;" class="vtip" title="แก้ไขรายการนี้" /></a> <a href="admin/hilights/delete/<?=$row->id?>"><img src="themes/admin/images/remove.png" width="32" height="32" class="vtip" title="ลบรายการนี้"  onclick="return confirm('<?php echo lang('notice_confirm_delete');?>')" /></a></td>
  </tr>
  <?endforeach;?>
</table>

<?php echo $rs->pagination()?>