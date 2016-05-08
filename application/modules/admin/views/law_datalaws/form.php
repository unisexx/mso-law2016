<h3>ข้อมูลกฎหมาย (เพิ่ม / แก้ไข)</h3>

<form method="post" enctype="multipart/form-data" action="admin/law_datalaws/save/<?=$rs->id?>">
<!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="lang active"><a href="th" aria-controls="thai" role="tab" data-toggle="tab"><img src="themes/admin/images/thai_flag.png" width="32" height="32" /></a></li>
    <li role="presentation" class="lang"><a href="en" aria-controls="english" role="tab" data-toggle="tab"><img src="themes/admin/images/eng_flag.png" width="32" height="32" /></a></li>
  </ul>
  
  
<!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="thai">
        <table class="tbadd">
        <tr>
          <th>กลุ่มกฎหมาย &gt; หมวดกฎหมาย<span class="Txt_red_12"> *</span></th>
          <td><span class="form-inline">
            <?=form_dropdown('law_group_id',get_option('id','name','law_groups order by id asc'),@$rs->law_group_id,'class="form-control" style="width:auto;"','-- เลือกกลุ่มกฎหมาย --');?>
            &gt; 
            <span id="lawtype">
            	<select name="select3" class="form-control" style="width:auto;" readonly>
	              <option selected="selected">-- เลือกหมวดกฎหมาย --</option>
	            </select>
            </span>
          </span></td>
        </tr>
        <tr>
          <th>ประเภทกฎหมาย &gt; ประเภทย่อยกฎหมาย <span class="Txt_red_12"> *</span></th>
          <td><span class="form-inline">
          <?=form_dropdown('law_maintype_id',get_option('id','typeName','law_maintypes order by typeName asc'),@$rs->law_maintype_id,'class="form-control" style="width:auto;"','-- เลือกประเภทกฎหมาย --');?>
            &gt; 
            <span id="lawsubmaintype">
	            <select name="select5" class="form-control" style="width:auto;" readonly>
	              <option>-- เลือกประเภทย่อยกฎหมาย --</option>
	            </select>
            </span>
            </span></td>
        </tr>
        <tr>
          <th>ชื่อกฎหมาย<span class="Txt_red_12"> *</span></th>
          <td>
          	<input type="text" class="form-control" id="exampleInputName7" style="width:800px;" name="name_th" value="<?=str_replace("|"," ",$rs->name_th)?>" />
            </td>
        </tr>
        <tr>
          <th>เล่มที่ / ตอน<span class="Txt_red_12"> *</span></th>
          <td>
          	<span class="form-inline"><input type="text" class="form-control" id="exampleInputName7" style="width:100px; margin-right:30px;" name="gazette_numerative" value="<?=$rs->gazette_numerative?>" />
            <input name="gazette_section" value="1" type="radio" <?=$rs->gazette_section==1?"checked":"";?> /> ตอน  
        	<input name="gazette_section" value="2" type="radio" <?=$rs->gazette_section==2?"checked":"";?>/> ตอนที่ 
            <input type="text" class="form-control" id="exampleInputName3" style="width:200px;" name="gazette_data" value="<?=$rs->gazette_data?>" /></span></td>
        </tr>
        <tr>
          <th>วันที่ประกาศในราชกิจจานุเบกษา<span class="Txt_red_12"> *</span></th>
          <td>
          	<span class="form-inline">
		    <div class="input-group date">
			  <input type="text" class="form-control datepickerTH" name="gazete_notice_date" data-date-language="th-th" value="<?=DB2Date($rs->gazete_notice_date)?>"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
			</div>
		    </span>
		 </td>
        </tr>
        <tr>
          <th>อาศัยอำนาจกฎหมาย</th>
          <td>
            <select name="select2" class="form-control" style="width:auto;">
              <option>-- เลือกประเภทกฎหมายย่อยที่อาศัยอำนาจ --</option>
            </select>
        </td>
        </tr>
        <tr>
          <th>ผูกกฎหมาย (คาบ/ข้าม)</th>
          <td>
          <div id="btnBox" style="margin-bottom:10px;">
          <a class='inline' href="#inline_bind_th"><input type="button" value="เพิ่มการผูกกฎหมาย" title="เพิ่มการผูกกฎหมาย" class="btn btn-warning vtip" /></a>
        </div>
          <table class="tbSublist tbCrossSublist autocount">
            <tr>
              <th style="width:10%">#</th>
              <th style="width:60%">ชื่อกฎหมาย</th>
              <th style="width:20%">รูปแบบ</th>
              <th style="width:10%">ลบ</th>
            </tr>
            <?if(isset($law_overlaps)):?>
		    <?foreach($law_overlaps as $key=>$row):?>
		    <tr>
		    	<td><?=$key+1?></td>
		    	<td><?=get_law_name($row->ov_sk_law)?></td>
		    	<td><?=$row->ov_sk_type?></td>
		    	<td>
		    		<input type="hidden" name="ov_sk_law[]" value="<?=$row->ov_sk_law?>">
		    		<input type="hidden" name="ov_sk_type[]" value="<?=$row->ov_sk_type?>">
		    		<input type="hidden" name="ov_sk_description[]" value="<?=$row->ov_sk_description?>">
		    		<img class="delLawBtn" src="themes/admin/images/remove.png" alt="" width="32" height="32" class="vtip" title="ลบรายการนี้"   style="cursor:pointer;"/></td>
		    </tr>
		    <?endforeach;?>
		    <?endif;?>
            <!-- <?
				$sql = "select * from law_overlap_or_skip where code='$rs->oos_code' ";
				$law_overlap_or_skip = $this->db->query($sql)->result();
			?>
			<?if($law_overlap_or_skip):?>
			<?foreach($law_overlap_or_skip as $key=>$row_cross):?>
				<?
					$sql = "select * from law_datalaws where id='$row_cross->ov_sk_law'";
					$datalaw = $this->db->query($sql)->row();
				?>
				<tr>
		              <td><?=$key+1?></td>
		              <td><?=str_replace("|"," ",$datalaw->name_th)?></td>
		              <td>
		              		<?
								if($datalaw->law_group_id == 1 && $datalaw->law_type_id == 1 && $datalaw->law_maintype_id == 1 &&  $datalaw->law_submaintype_id == 1){ 
									echo "คาบ"; 
								}else{ 
									echo "ข้าม";
								}
							?>
		              </td>
		              <td><img src="themes/admin/images/remove.png" width="32" height="32" class="vtip" title="ลบรายการนี้"  /></td>
	            </tr>
            <?endforeach;?>
			<?endif;?> -->
          </table></td>
        </tr>
        <tr>
          <th>กฎหมายที่เกี่ยวข้อง (ยกเลิก/แก้ไข/เพิ่มเติม)</th>
          <td><div id="btnBox" style="margin-bottom:10px;">
            <a class='inline' href="#inline_related_th"><input type="button" value="เพิ่มกฎหมายที่เกี่ยวข้อง" title="เพิ่มกฎหมายที่เกี่ยวข้อง" class="btn btn-warning vtip" /></a>
          </div>
            <table class="tbSublist tbRelatedSublist autocount">
              <tr>
                <th style="width:10%">#</th>
              <th style="width:60%">ชื่อกฎหมาย</th>
              <th style="width:20%">รูปแบบ</th>
              <th style="width:10%">ลบ</th>
              </tr>
              <?
					$sql = "select * from law_version where code='$rs->version_code' ";
					$law_versions = $this->db->query($sql)->result();
				?>
				<?if($law_versions):?>
						<?foreach($law_versions as $key=>$row_version):?>
							<?
								$sql = "select * from law_datalaws where id='$row_version->law_id_select'";
								$datalaw = $this->db->query($sql)->row();
							?>
							<tr>
				                <td><?=$key+1?></td>
				                <td><?=str_replace("|"," ",$datalaw->name_th)?></td>
				                <td>แก้ไข</td>
				                <td><img src="themes/admin/images/remove.png" alt="" width="32" height="32" class="vtip" title="ลบรายการนี้"  /></td>
				              </tr>
						<?endforeach;?>
				<?endif;?>
            </table></td>
        </tr>
        <tr>
          <th>วันที่ประกาศใช้</th>
          <td>
          	<span class="form-inline">
		    <div class="input-group date">
			  <input type="text" class="form-control datepickerTH" data-date-language="th-th" name="notic_date" value="<?=DB2Date($rs->notic_date)?>"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
			</div>
		    </span>
		 </td>
        </tr>
        <tr>
          <th>วันที่นำเข้า</th>
          <td>
          	<span class="form-inline">
		    <div class="input-group date">
			  <input type="text" class="form-control datepickerTH" data-date-language="th-th" name="import_date" value="<?=DB2Date($rs->import_date)?>"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
			</div>
		    </span>
		 </td>
        </tr>
        <tr>
          <th>วันที่บังคับใช้</th>
          <td>
          	<span class="form-inline">
		    <div class="input-group date">
			  <input type="text" class="form-control datepickerTH" data-date-language="th-th" name="use_date" value="<?=DB2Date($rs->use_date)?>"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
			</div>
		    </span>
		 </td>
        </tr>
        <tr>
          <th>สถานะการใช้</th>
          <td>
          	<span><input type="radio" name="status" id="radio" value="1" <?=$rs->status == 1?"checked":"";?> />บังคับใช้ </span> 
          	<span><input type="radio" name="status" id="radio2" value="3" <?=$rs->status == 3?"checked":"";?> />อยู่ระหว่างพิจารณา</span> 
          	<span><input type="radio" name="status" id="radio3" value="2" <?=$rs->status == 2?"checked":"";?> />ยกเลิก</span>
          </td>
        </tr>
        <tr>
          <th>แนบเอกสารกฎหมาย</th>
          <td>
          	<?if($rs->filename_th != ""):?>
          		<a href="uploads/law_datalaws/<?=$rs->filename_th?>" target="_blank"><i class="fa fa-file-pdf-o"></i> <?=$rs->filename_th?></a>
          	<?endif;?>
          	<input type="file" name="filename_th" class="form-control" id="fileField" />
          </td>
        </tr>
        <tr>
          <th>Option</th>
          <td>
          <div id="btnBox" style="margin-bottom:10px;">
            <a class="inline" href="#inline_option_th"><input type="button" value="เพิ่ม Option กฎหมาย" title="เพิ่ม Option กฎหมาย" class="btn btn-warning vtip" /></a>
          </div>
            <table class="tbSublist">
              <tr>
                <th style="width:10%">#</th>
                <th style="width:25%">ชนิด Option</th>
                <th style="width:25%">ชื่อ</th>
                <th style="width:20%">แหล่งที่มา</th>
                <th style="width:10%">ปี</th>
                <th style="width:10%">ลบ</th>
              </tr>
              <tr>
                <td>1</td>
                <td>เอกสารนำเสนอกฎหมาย (Presentation)</td>
                <td>กฎหมาย abc</td>
                <td>ศาลเด็ก</td>
                <td>2525</td>
                <td><img src="themes/admin/images/remove.png"  width="32" height="32" class="vtip" title="ลบรายการนี้"  /></td>
              </tr>
            </table>
          
            </td>
        </tr>
        </table>
    </div>
    
</div>



<div id="btnBoxAdd">
  <input name="input" type="submit" title="บันทึก" value="บันทึก" class="btn btn-primary" style="width:100px;"/>
  <input name="input2" type="button" title="ย้อนกลับ" value="ย้อนกลับ"  onclick="history.back(-1)"  class="btn btn-default" style="width:100px;"/>
</div>

</form>















<!-- ผูกกฎหมาย (คาบ/ข้าม) -->
<!-- This contains the hidden content for inline calls -->
<div style='display:none'>
	<div id='inline_bind_th' style='padding:10px; background:#fff;'>
    <h3>การผูกกฎหมาย</h3>
		<div id="search">
		<div id="searchBox">
		<form id="cross_law_form" class="form-inline">
		  <div class="col-xs-4">
		    <input type="text" class="form-control " id="exampleInputName2" placeholder="ชื่อกฎหมาย" name="search">
		  </div><br><br>
		  <div>
			  <?=form_dropdown('law_group_id',get_option('id','name','law_groups order by id asc'),@$_GET['law_group_id'],'class="form-control" style="width:auto;"','-- ทุกกลุ่มกฎหมาย --');?>
			  <span id="cross_lawtype">
            	<select name="select3" class="form-control" style="width:auto;" readonly>
	              <option selected="selected">-- ทุกหมวดกฎหมาย --</option>
	            </select>
            </span>
		  </div>
		  <div style="margin-top: 6px;">
			   <?=form_dropdown('law_maintype_id',get_option('id','typeName','law_maintypes order by typeName asc'),@$_GET['law_maintype_id'],'class="form-control" style="width:auto;"','-- ทุกประเภทกฎหมาย --');?>
			  <span id="cross_lawsubmaintype">
	            <select name="select5" class="form-control" style="width:auto;" readonly>
	              <option>-- ทุกประเภทย่อยกฎหมาย --</option>
	            </select>
              </span>
			<button id="searchCrossLawBtn" type="button" class="btn btn-info"><img src="themes/admin/images/search.png" width="16" height="16" />Search</button>
		</div>
		</form>
		</div>
		</div>
		
		<div id="crosslawData"></div>

	</div>
</div>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
<!-- กฎหมายที่เกี่ยวข้อง (ยกเลิก/แก้ไข/เพิ่มเติม) -->
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
		  <button id="searchRelatedLawBtn" type="button" class="btn btn-info"><img src="themes/admin/images/search.png" width="16" height="16" />Search</button>
		</form>
		</div>
		</div>
		
		<div id="relatedlawData"></div>
		
	</div>
</div>
        
        
























<!-- This contains the hidden content for inline calls -->
		<div style='display:none'>
			<div id='inline_option_th' style='padding:10px; background:#fff;'>
			
            <h3>Option กฎหมาย</h3>
<table class="tbadd">
<tr>
  <th>ชนิดของ Option<span class="Txt_red_12"> *</span></th>
  <td><select name="select2" class="form-control" style="width:auto;">
    <option>-- กรุณาเลือกชนิดของ Option --</option>
    <option>คำอธิบายกฎหมาย (Explanatory Notes)/สรุปสาระสำคัญ</option>
    <option>เอกสารนำเสนอกฎหมาย (Presentation)</option>
    <option>คำพิพากษาที่เกี่ยวข้อง</option>
    <option>คำวินิจฉัยของคณะกรรมการกฤษฎีกา</option>
    <option>บทความทางวิชาการ/ฐานข้อมูลประวัติกฎหมาย</option>
    <option>บทความทางกฎหมาย</option>
  </select></td>
</tr>
<tr>
  <th>ชื่อ<span class="Txt_red_12"> *</span></th>
  <td><input type="text" class="form-control" id="exampleInputName6" style="width:300px;" /></td>
</tr>
<tr>
  <th>แหล่งที่มา</th>
  <td><input type="text" class="form-control" id="exampleInputName8" style="width:500px;" /></td>
</tr>
<tr>
  <th>ปี พ.ศ.</th>
  <td><input type="text" class="form-control" id="exampleInputName2" style="width:100px;" /></td>
</tr>
<tr>
  <th>ไฟล์แนบ <img src="themes/admin/images/add.png" width="16" height="16" /></th>
  <td><span class="form-inline"><input type="text" class="form-control" id="exampleInputName8" style="width:400px;" placeholder="ชื่อไฟล์แนบ" /> <input type="file" name="fileField3" id="fileField3" class="form-control" style="width:400px;" /></span></td>
</tr>
</table>
<div id="btnBoxAdd">
  <input name="input" type="button" title="บันทึก" value="บันทึก" class="btn btn-primary" style="width:100px;"/>
</div>


            
		  </div>
		</div>
		

















<script type="text/javascript">
$(function() {
	//----------------------- ฟอร์มหลัก -----------------------------------
		// เปลี่ยนภาษา
		$("[rel=en]").hide();
		
		$(".lang a").click(function(){
			$("[rel=" + $(this).attr("href") + "]").show().siblings().hide();
			$(this).closest('li').addClass('active').siblings().removeClass('active');
			return false;
		});
		
		// select กลุ่มกฏหมาย -> หมวดกฏหมาย
		$('table').on('change', "select[name='law_group_id']", function() {
			$('.loading').show();
			$.get('ajax/get_select_lawtype',{
				'law_group_id' : $(this).val()
			},function(data){
				$('.loading').hide();
				$("#lawtype").html(data);
			});
		});
		
		// select ประเภทกฏหมาย -> ประเภทย่อยกฏหมาย
		$('table').on('change', "select[name='law_maintype_id']", function() {
			$('.loading').show();
			$.get('ajax/get_select_submaintype',{
				'law_maintype_id' : $(this).val()
			},function(data){
				$('.loading').hide();
				$("#lawsubmaintype").html(data);
			});
		});
		
		<?php if(@$rs->id != ""):?>
			$.get('ajax/get_select_lawtype',{
				'law_group_id' : $('select[name=law_group_id]').val(),
				'law_type_id' : <?=$rs->law_type_id?>
			},function(data){
				$('.loading').hide();
				$("#lawtype").html(data);
			});
			
			$.get('ajax/get_select_submaintype',{
				'law_maintype_id' : $('select[name=law_maintype_id]').val(),
				'law_submaintype_id' : <?=$rs->law_submaintype_id?>
			},function(data){
				$('.loading').hide();
				$("#lawsubmaintype").html(data);
			});
		<?php endif;?>
	
	//----------------------- ผูกกฎหมาย (คาบ/ข้าม) -----------------------------------
		// select กลุ่มกฏหมาย -> หมวดกฏหมาย
		$('#cross_law_form').on('change', "select[name='law_group_id']", function() {
			$('.loading').show();
			$.get('ajax/get_select_lawtype',{
				'law_group_id' : $(this).val()
			},function(data){
				$('.loading').hide();
				$("#cross_lawtype").html(data);
			});
		});
		
		// select ประเภทกฏหมาย -> ประเภทย่อยกฏหมาย
		$('#cross_law_form').on('change', "select[name='law_maintype_id']", function() {
			$('.loading').show();
			$.get('ajax/get_select_submaintype',{
				'law_maintype_id' : $(this).val()
			},function(data){
				$('.loading').hide();
				$("#cross_lawsubmaintype").html(data);
			});
		});
		
		// ปุ่มค้นหา
		$("#searchCrossLawBtn").click(function(){
			$.get('ajax/get_cross_law_data',{
				'search' : $(this).closest("form").find('input[name=search]').val(),
				'law_group_id' : $(this).closest("form").find('select[name=law_group_id]').val(),
				'law_type_id' : $(this).closest("form").find('select[name=law_type_id]').val(),
				'law_maintype_id' : $(this).closest("form").find('select[name=law_maintype_id]').val(),
				'law_submaintype_id' : $(this).closest("form").find('select[name=law_submaintype_id]').val()
			},function(data){
				$("#crosslawData").html(data);
			});
		});
	
	//----------------------- กฎหมายที่เกี่ยวข้อง (ยกเลิก/แก้ไข/เพิ่มเติม) -----------------------------------
		// ปุ่มค้นหา 
		$("#searchRelatedLawBtn").click(function(){
			$.get('ajax/get_related_law_data',{
				'search' : $(this).closest("form").find('input[name=search]').val()
			},function(data){
				$("#relatedlawData").html(data);
			});
		});
	
	
	// ปุ่มลบกฏหมาย  ผูกกฎหมาย (คาบ/ข้าม), กฎหมายที่เกี่ยวข้อง (ยกเลิก/แก้ไข/เพิ่มเติม)
	$('table').on('click', '.delLawBtn', function() {
		$(this).closest('tr').fadeOut(300, function(){ 
			$(this).remove(); 
			autoCountTableRow();
		});
	});
});

// นับจำนวนใส่ตัวเลขหน้าแถว
function autoCountTableRow(){
	// add Table Class Name "autocount"
	$('.autocount tr td:first-child').each(function(i){
		// $(this).before('<td>'+(i+1)+'</td>');
		$(this).html('');
		$(this).append((i+1));
	});
}
</script>