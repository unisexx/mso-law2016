<h3>รายงานสถิติจำนวนผู้เข้าชม</h3>

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
	  <th align="left">ลำดับ</th>
	  <th align="left">ชื่อ</th>
	  <th align="left">เวลา</th>
	  <th align="left">ไอพี</th>
	</tr>
	<?php $i=(isset($_GET['page']))? (($_GET['page'] -1)* 20)+1:1; ?>
	<?foreach($rs as $key=>$row):?>
	<tr class="<?=alternator('','odd');?>">
		<td><?=$i?></td>
		<td><?=($row->username == "people")? "บุคคลทั่วไป" : $row->username ;?></td>
		<td><?=mysql_to_th($row->created,'s',TRUE)?> น.</td>
		<td><?=$row->ip?></td>
	</tr>
	<?$i++;?> 
	<?endforeach;?>
</table>

<?php echo $pagination?>