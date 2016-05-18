<h3>สิทธิประโยชน์ (เพิ่ม / แก้ไข)</h3>

<form id="law_privileges_frm" method="post" enctype="multipart/form-data" action="admin/law_privileges/save/<?=$rs->id?>">
<!-- Nav tabs -->
  <!-- <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="lang active"><a href="th" aria-controls="thai" role="tab" data-toggle="tab"><img src="themes/admin/images/thai_flag.png" width="32" height="32" /></a></li>
    <li role="presentation" class="lang"><a href="en" aria-controls="english" role="tab" data-toggle="tab"><img src="themes/admin/images/eng_flag.png" width="32" height="32" /></a></li>
  </ul> -->
  
<!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="thai">
        <table class="tbadd">
        <tr>
          <th>ชื่อเอกสาร (ไทย)<span class="Txt_red_12"> *</span></th>
          <td>
            <input rel="th" type="text" class="form-control" name="pri_name[th]" value="<?=lang_decode($rs->pri_name,'th')?>" style="width:800px;" />
            </td>
        </tr>
        <tr>
          <th>ชื่อเอกสาร (อังกฤษ)<span class="Txt_red_12"> *</span></th>
          <td>
            <input rel="en" type="text" class="form-control" name="pri_name[en]" value="<?=lang_decode($rs->pri_name,'en')?>"  style="width:800px;" />
            </td>
        </tr>
        <tr>
          <th>วันที่นำเข้า<span class="Txt_red_12"> *</span></th>
		<td>
	      	<span class="form-inline">
		    <div class="input-group date">
			  <input type="text" class="form-control datepickerTH" name="pri_date" data-date-language="th-th" value="<?=DB2Date($rs->pri_date)?>"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
			</div>
		    </span>
		 </td>
        </tr>
        <tr>
          <th>ไฟล์แนบเอกสาร (ไทย)</th>
          <td>
          	<?if($rs->pri_file_th != ""):?>
          		<a href="uploads/privilegefile/<?=$rs->pri_file_th?>" target="_blank"><i class="fa fa-file-pdf-o"></i> <?=$rs->pri_file_th?></a>
          	<?endif;?>
          	<input type="file" name="pri_file_th" class="form-control" id="fileField" />
          </td>
        </tr>
        <tr>
          <th>ไฟล์แนบเอกสาร (อังกฤษ)</th>
          <td>
          	<?if($rs->pri_file_en != ""):?>
          		<a href="uploads/privilegefile/<?=$rs->pri_file_en?>" target="_blank"><i class="fa fa-file-pdf-o"></i> <?=$rs->pri_file_en?></a>
          	<?endif;?>
          	<input type="file" name="pri_file_en" class="form-control" id="fileField" />
          </td>
        </tr>
        <tr>
          <th>กฎหมายที่เกี่ยวข้อง</th>
          <td><div id="btnBox" style="margin-bottom:10px;">
            <a class='inline' href="#inline_related_th"><input type="button" value="เพิ่มกฎหมายที่เกี่ยวข้อง" title="เพิ่มกฎหมายที่เกี่ยวข้อง" class="btn btn-warning vtip" /></a>
            </div>
            <table class="tbSublist">
              <tr>
                <th style="width:60%">ชื่อกฎหมาย</th>
                <th style="width:10%">ลบ</th>
			  </tr>
			  	<?if(isset($laws)):?>
			    <?foreach($laws as $row):?>
			    <tr>
			    	<td><?=str_replace("|"," ",$row->law_datalaw->name_th)?></td>
			    	<td>
			    		<input type="hidden" name="law_datalaw_id[]" value="<?=$row->law_datalaw_id?>">
			    		<img class="delLawBtn" src="themes/admin/images/remove.png" alt="" width="32" height="32" class="vtip" title="ลบรายการนี้"   style="cursor:pointer;"/></td>
			    </tr>
			    <?endforeach;?>
			    <?endif;?>
            </table></td>
        </tr>
        </table>       
    </div>
    
</div>


<div id="btnBoxAdd">
	<?if($rs->id == ""):?>
	  	<input type="hidden" name="create_by" value="<?=user_login()->id?>">
	  <?else:?>
	  	<input type="hidden" name="update_by" value="<?=user_login()->id?>">
	  <?endif;?>
  <input name="input" type="submit" title="บันทึก" value="บันทึก" class="btn btn-primary" style="width:100px;"/>
  <input name="input2" type="button" title="ย้อนกลับ" value="ย้อนกลับ"  onclick="history.back(-1)"  class="btn btn-default" style="width:100px;"/>
</div>

</form>


     
        
<!-- This contains the hidden content for inline calls -->
<div style='display:none'>
<div id='inline_related_th' style='padding:10px; background:#fff;'>
			
	<h3>กฎหมายที่เกี่ยวข้อง</h3>
	<div id="search">
	<div id="searchBox">
	<form class="form-inline">
	  <div class="col-xs-4">
	    <input type="text" class="form-control " id="exampleInputName2" placeholder="ชื่อกฎหมาย" name="search">
	  </div>
	  <button id="searchLawBtn" type="button" class="btn btn-info"><img src="themes/admin/images/search.png" width="16" height="16" />Search</button>
	</form>
	</div>
	</div>
	
	<div id="lawData"></div>

</div>
</div>
        
        

<script type="text/javascript">
$(function() {
	// $("[rel=en]").hide();
// 	
	// $(".lang a").click(function(){
		// $("[rel=" + $(this).attr("href") + "]").show().siblings().hide();
		// $(this).closest('li').addClass('active').siblings().removeClass('active');
		// return false;
	// })
	
	$("#searchLawBtn").click(function(){
		$.get('ajax/get_law_data',{
			'search' : $(this).closest("form").find('input[name=search]').val()
		},function(data){
			$("#lawData").html(data);
		});
	});
	
	$('table').on('click', '.delLawBtn', function() {
		$(this).closest('tr').fadeOut(300, function(){ $(this).remove(); });
	});
	
	$("#law_privileges_frm").validate({
	    rules:
	    {
	    	'pri_name[th]':{required: true},
        	'pri_name[en]':{required: true},
	    	pri_date:{required: true}
	    },
	    messages:
	    {
	    	'pri_name[th]':{required: "กรุณากรอกชื่อเอกสาร (ไทย)"},
        	'pri_name[en]':{required: "กรุณากรอกชื่อเอกสาร (อังกฤษ)"},
	    	pri_date:{required: "กรุณากรอกวันที่นำเข้า"}
	    }
    });
});
</script>