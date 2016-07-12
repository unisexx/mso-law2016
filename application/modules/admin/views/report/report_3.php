<h3>รายงานการสถิติการใช้ข้อมูล (ดาวน์โหลด)</h3>

<div id="search">
<div id="searchBox">
<form class="form-inline">
<span class="form-inline">
<div class="input-group date">
  <input type="text" class="form-control datepickerTH" name="s_date" data-date-language="th-th" value="<?=@$_GET['s_date']?>"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
</div>
ถึง
<div class="input-group date">
  <input type="text" class="form-control datepickerTH" name="e_date" data-date-language="th-th" value="<?=@$_GET['e_date']?>"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
</div>
<button type="submit" class="btn btn-info"><img src="themes/admin/images/search.png" width="16" height="16" />Search</button>
</span>
</form>
</div>
</div>

<?php echo $pagination?>

<table class="tblist">
	<tr>
	  <th align="left">ชื่อกฏหมาย</th>
	  <th align="left">จำนวนครั้งที่ดาวน์โหลด</th>
	</tr>
	<?foreach($rs as $key=>$row):?>
	<tr class="<?=alternator('','odd');?>">
		<td><?=str_replace("|"," ",$row->name_th)?></td>
		<td><?=$row->total?></td>
	</tr>
	<?endforeach;?>
</table>

<?php echo $pagination?>