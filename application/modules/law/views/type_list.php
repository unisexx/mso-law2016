<style type="text/css" media="screen">
	.search{padding:10px; background: rgba(158, 158, 158, 0.46);}
</style>
<div id="type-list">
  <span class="title-law2"><?=lang_decode($rs->name)?></span>
  <div class="line1">&nbsp;</div>
	
	<form class="form-inline search">
	  <div class="form-group">
	    <!-- <label for="maintype" class="col-sm-2 control-label">ประเภทกฎหมาย</label> -->
	    <div class="col-sm-3">
	      <?=form_dropdown('law_maintype_id', get_option('id','typeName','law_maintypes order by id asc'), @$_GET['law_maintype_id'],'class="form-control" style="width:auto;"','--- เลือกประเภทกฎหมาย ---');?>
	    </div>
	  </div>
	  <div class="form-group">
	    <!-- <label for="submaintype" class="col-sm-2 control-label">ประเภทย่อยกฎหมาย</label> -->
	    <div id="submaintype" class="col-sm-3">
	    	<?if(@$_GET['law_maintype_id']):?>
	    		<?=form_dropdown('law_submaintype_id', get_option('id','typeName','law_submaintypes where law_maintype_id = '.$_GET['law_maintype_id'].' order by typeName asc'), @$_GET['law_submaintype_id'],' class="form-control" style="width:auto;"','--- เลือกประเภทย่อยกฎหมาย ---');?>
	    	<?else:?>
	    		<?=form_dropdown('law_submaintype_id', get_option('id','typeName','law_submaintypes order by typeName asc'), @$_GET['law_submaintype_id'],'disabled class="form-control" style="width:auto;"','--- เลือกประเภทย่อยกฎหมาย ---');?>
	    	<?endif;?>
	    </div>
	  </div>
	  <div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
	      <button type="submit" class="btn btn-info">ค้นหา</button>
	    </div>
	  </div>
	</form>

  <table class="table table-striped" id="tb-plan">
    <thead>
      <tr>
        <th class="col-sm-9">ชื่อกฎหมาย</th>
        <th class="col-sm-2 text-center">สถานะ</th>
        <th class="col-sm-1 text-center" colspan="2">ดาวน์โหลด</th>
      </tr>
      <tr>
      	<th></th>
      	<th></th>
      	<th class="text-center">th</th>
      	<th class="text-center">eng</th>
      </tr>
    </thead>
    <tbody>
    	<?foreach($laws as $row):?>
    	<tr>
    		<td><a href="law/view/<?=$row->id?>" target="_blank"><?=str_replace("|"," ",$row->name_th)?></a></td>
    		<td class="text-center"><?=get_datalaw_status($row->status)?></td>
    		<td valign="top" width="48" class="text-center">
          	<?if($row->filename_th != ""):?>
            <a href="law/download_by_name/<?=$row->id?>?filename=<?=$row->filename_th?>"><?=file_icon_th($row->filename_th)?></a>
            <?endif;?>
            </td>
            <td valign="top" width="48" class="text-center">
			<?if($row->filename_eng != ""):?>
			<a href="law/download_by_name/<?=$row->id?>?filename=<?=$row->filename_eng?>"><?=file_icon_en($row->filename_eng)?></a>
            <?endif;?>
            </td>
    	</tr>
    	<?endforeach;?>
    </tbody>
  </table>
  
  <?=$laws->pagination_front();?>
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