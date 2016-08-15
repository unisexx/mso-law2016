<div id="plan">
  <span class="title-law2"><?=lang("h_other")?></span>
  <div class="line1">&nbsp;</div>

  <table class="table table-striped" id="tb-plan">
    <thead>
      <tr>
        <th><?=lang("o_name")?></th>
        <th><?=lang("o_web")?></th>
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
