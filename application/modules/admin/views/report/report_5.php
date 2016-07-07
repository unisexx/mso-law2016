<style>
section{margin:20px 0 50px;}
table tr td:first-child { width: 50em; }
</style>
<h3>รายงานแสดงจำนวนกฏหมาย</h3>

<?
	$law_groups = new Law_group();
	$law_groups->order_by('id','asc')->get();
?>
<section>
<h4>แยกตามกลุ่มกฏหมาย</h4>
<table class="tblist">
<tr>
  <th>ชื่อกลุ่มกฏหมาย</th>
  <th>จำนวน</th>
</tr>
<?foreach($law_groups as $law_group):?>
<tr class="<?=alternator('','odd');?>">
	<td><?=lang_decode($law_group->name);?></td>
	<td><?=$law_group->law_datalaw->count();?></td>
</tr>
<?endforeach;?>
</table>
</section>



<?
	$law_groups = new Law_group();
	$law_groups->order_by('id','asc')->get();
?>

<?foreach($law_groups as $law_group):?>
<section>
<h4>แยกตามหมวดกฏหมาย (<?=lang_decode($law_group->name)?>)</h4>
<table class="tblist">
<tr>
  <th>ชื่อหมวดกฏหมาย</th>
  <th>จำนวน</th>
</tr>
	<?
		$law_types = new Law_type();
		$law_types->where("law_group_id = ".$law_group->id)->get();
	?>
	<?foreach($law_types as $law_type):?>
	<tr class="<?=alternator('','odd');?>">
		<td><?=lang_decode($law_type->name)?></td>
		<td><?=$law_type->law_datalaw->count();?></td>
	</tr>
	<?endforeach;?>
</table>
</section>
<?endforeach;?>




<?
	$law_maintypes = new Law_maintype();
	$law_maintypes->order_by('id','asc')->get();
?>
<section>
<h4>แยกตามประเภทกฏหมาย</h4>
<table class="tblist">
<tr>
  <th>ชื่อประเภทกฏหมาย</th>
  <th>จำนวน</th>
</tr>
<?foreach($law_maintypes as $law_maintype):?>
<tr class="<?=alternator('','odd');?>">
	<td><?=lang_decode($law_maintype->typeName);?></td>
	<td><?=$law_maintype->law_datalaw->count();?></td>
</tr>
<?endforeach;?>
</table>
</section>




<?
	$law_maintypes = new Law_maintype();
	$law_maintypes->order_by('id','asc')->get();
?>

<?foreach($law_maintypes as $law_maintype):?>
<section>
<h4>แยกตามประเภทย่อยกฏหมาย (<?=lang_decode($law_maintype->typeName)?>)</h4>
<table class="tblist">
<tr>
  <th>ชื่อหมวดกฏหมาย</th>
  <th>จำนวน</th>
</tr>
	<?
		$law_submaintypes = new Law_submaintype();
		$law_submaintypes->where("law_maintype_id = ".$law_maintype->id)->get();
	?>
	<?foreach($law_submaintypes as $law_submaintype):?>
	<tr class="<?=alternator('','odd');?>">
		<td><?=lang_decode($law_submaintype->typeName)?></td>
		<td><?=$law_submaintype->law_datalaw->count();?></td>
	</tr>
	<?endforeach;?>
</table>
</section>
<?endforeach;?>