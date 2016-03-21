<div id="plan">
  <span class="title-law2"><?=lang_decode($rs->name)?></span>
  <div class="line1">&nbsp;</div>
	
	<form class="form-horizontal">
	  <div class="form-group">
	    <label for="maintype" class="col-sm-2 control-label">ประเภทกฎหมาย</label>
	    <div class="col-sm-3">
	      <?=form_dropdown('law_maintype_id', get_option('id','typeName','law_maintypes order by id asc'), @$_GET['law_maintype_id'],'class="form-control" style="width:auto;"','-- เลือกประเภทกฎหมาย --');?>
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="submaintype" class="col-sm-2 control-label">ประเภทย่อยกฎหมาย</label>
	    <div id="submaintype" class="col-sm-3">
	      <?=form_dropdown('law_submaintype_id', get_option('id','typeName','law_submaintypes order by typeName asc'), @$_GET['law_maintype_id'],'disabled class="form-control" style="width:auto;"','-- เลือกประเภทย่อยกฎหมาย --');?>
	    </div>
	  </div>
	  <div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
	      <button type="submit" class="btn btn-default">ค้นหา</button>
	    </div>
	  </div>
	</form>
	
  <table class="table table-striped" id="tb-plan">
    <thead>
      <tr>
        <th>ชื่อกฎหมาย</th>
        <th>สถานะ</th>
        <th>ดาวน์โหลด</th>
      </tr>
    </thead>
    <tbody>
    	<?foreach($rs as $row):?>
    	<tr>
    		<td><?=$row->name_th?></td>
    		<td></td>
    		<td></td>
    	</tr>
    	<?endforeach;?>
    </tbody>
  </table>
</div>

<script type="text/javascript" charset="utf-8">
$(document).ready(function(){
	$("select[name='law_maintype_id']").live("change",function(){
		$.get('ajax/get_select_submaintype',{
				'law_maintype_id' : $(this).val()
			},function(data){
				$("#submaintype").html(data);
			});
	});
});
</script>