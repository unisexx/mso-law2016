<div id="plan">
  <span class="title-law2">หน่วยงานกฎหมายอื่น</span>
  <div class="line1">&nbsp;</div>

  <table class="table table-striped" id="tb-plan">
    <thead>
      <tr>
        <th>ชื่อหน่วยงาน</th>
        <th>เว็บไซต์</th>
      </tr>
    </thead>
    <tbody>
    	<?foreach($rs as $key=>$row):?>
    	<tr>
    		<td><?=$row->name?></td>
    		<td><a href="<?=$row->url?>" target="_blank"><?=$row->url?></a></td>
    	</tr>
    	<?endforeach;?>
    </tbody>
  </table>
</div>
