<h3>ข้อมูลกฎหมาย (เพิ่ม / แก้ไข)</h3>

<form id="law_datalaw_frm" method="post" enctype="multipart/form-data" action="admin/law_datalaws/save/<?=$rs->id?>">
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
          <th>กลุ่มกฎหมาย &gt; หมวดกฎหมาย<span class="Txt_red_12"> *</span></th>
          <td><span class="form-inline">
            <?=form_dropdown('law_group_id',get_option('id','name','law_groups order by id asc'),@$rs->law_group_id,'class="form-control" style="width:auto;"','-- เลือกกลุ่มกฎหมาย --');?>
            &gt;
            <span id="lawtype">
            	<select name="select3" class="form-control" style="width:auto;" disabled="disabled">
	              <option selected="selected">-- เลือกหมวดกฎหมาย --</option>
	            </select>
            </span>
          </span></td>
        </tr>
        <tr>
          <th>ประเภทกฎหมาย &gt; ประเภทย่อยกฎหมาย <span class="Txt_red_12"> *</span></th>
          <td><span class="form-inline">
          <?=form_dropdown('law_maintype_id',get_option('id','typeName','law_maintypes order by id asc'),@$rs->law_maintype_id,'class="form-control" style="width:auto;"','-- เลือกประเภทกฎหมาย --');?>
            &gt;
            <span id="lawsubmaintype">
	            <select name="select5" class="form-control" style="width:auto;" disabled="disabled">
	              <option>-- เลือกประเภทย่อยกฎหมาย --</option>
	            </select>
            </span>
            </span></td>
        </tr>
        <tr>
          <th>ชื่อกฎหมาย (ไทย)<span class="Txt_red_12"> *</span></th>
          <td>
          	<input type="text" class="form-control" id="exampleInputName7" style="width:800px;" name="name_th" value="<?=str_replace("|"," ",$rs->name_th)?>" />
            </td>
        </tr>
        <tr>
          <th>ชื่อกฎหมาย (อังกฤษ)</th>
          <td>
          	<input type="text" class="form-control" id="exampleInputName7" style="width:800px;" name="name_eng" value="<?=str_replace("|"," ",$rs->name_eng)?>" />
            </td>
        </tr>
        <tr>
          <th>เล่มที่ / ตอน</th>
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
            <span class="form-inline">
            	<span id="applypowergroup">
	            	<select name="select5" class="form-control" style="width:auto;" disabled="disabled">
		              <option>-- กรุณาเลือกประเภทกฎหมายย่อยที่อาศัยอำนาจ --</option>
		            </select>
            	</span>
            	&gt;
            	<span id="applypowerid">
	            	<select name="select3" class="form-control" style="width:auto;" disabled="disabled">
		              <option selected="selected">-- กรุณาเลือกกฎหมายที่อาศัยอำนาจ --</option>
		            </select>
	            </span>
            </span>
        </td>
        </tr>
        <tr>
          <th>ผูกกฎหมาย (คาบ/ข้าม)</th>
          <td>
          <div id="btnBox" style="margin-bottom:10px;">
          <a class='inline' href="#inline_bind_th"><input type="button" value="เพิ่มการผูกกฎหมาย" title="เพิ่มการผูกกฎหมาย" class="btn btn-warning vtip" /></a>
        </div>
          <table class="tbSublist tbCrossSublist">
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
		    		<input type="hidden" name="ov_id[]" value="<?=$row->id?>">
		    		<input type="hidden" name="ov_sk_law[]" value="<?=$row->ov_sk_law?>">
		    		<input type="hidden" name="ov_sk_type[]" value="<?=$row->ov_sk_type?>">
		    		<input type="hidden" name="ov_sk_description[]" value="<?=$row->ov_sk_description?>">
		    		<img class="delLawBtn" src="themes/admin/images/remove.png" alt="" width="32" height="32" class="vtip" title="ลบรายการนี้"   style="cursor:pointer;"/></td>
		    </tr>
		    <?endforeach;?>
		    <?endif;?>
          </table></td>
        </tr>
        <tr>
          <th>กฎหมายที่เกี่ยวข้อง (ยกเลิก/แก้ไข/เพิ่มเติม)</th>
          <td><div id="btnBox" style="margin-bottom:10px;">
            <a class='inline' href="#inline_related_th"><input type="button" value="เพิ่มกฎหมายที่เกี่ยวข้อง" title="เพิ่มกฎหมายที่เกี่ยวข้อง" class="btn btn-warning vtip" /></a>
          </div>
            <table class="tbSublist tbRelatedSublist">
              <tr>
                <th style="width:10%">#</th>
              <th style="width:40%">ชื่อกฎหมาย</th>
              <th style="width:20%">รายละเอียด</th>
              <th style="width:20%">รูปแบบ</th>
              <th style="width:10%">ลบ</th>
              </tr>
                <?if(isset($law_versions)):?>
			    <?foreach($law_versions as $key=>$row):?>
			    <tr>
			    	<td><?=$key+1?></td>
			    	<td><?=get_law_name($row->law_id_select)?></td>
			    	<td><?=$row->version_txt?></td>
			    	<td><?=get_law_version_versiontype_status($row->version_type)?></td>
			    	<td>
			    		<input type="hidden" name="version_id[]" value="<?=$row->id?>">
			    		<input type="hidden" name="law_id_select[]" value="<?=$row->law_id_select?>">
			    		<input type="hidden" name="version_type[]" value="<?=$row->version_type?>">
			    		<input type="hidden" name="version_txt[]" value="<?=$row->version_txt?>">
			    		<input type="hidden" name="version_filename[]" value="<?=$row->version_filename?>">
			    		<img class="delLawBtn" src="themes/admin/images/remove.png" alt="" width="32" height="32" class="vtip" title="ลบรายการนี้"   style="cursor:pointer;"/>
			    	</td>
			    </tr>
			    <?endforeach;?>
			    <?endif;?>
            </table></td>
        </tr>
        <tr>
          <th>วันที่ประกาศใช้ <span class="Txt_red_12"> *</span></th>
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
          <th>สถานะการใช้ <span class="Txt_red_12"> *</span></th>
          <td>
          	<span><input type="radio" name="status" id="radio" value="1" <?=$rs->status == 1?"checked":"";?> />บังคับใช้ </span>
          	<span><input type="radio" name="status" id="radio2" value="3" <?=$rs->status == 3?"checked":"";?> />อยู่ระหว่างพิจารณา</span>
          	<span><input type="radio" name="status" id="radio3" value="2" <?=$rs->status == 2?"checked":"";?> />ยกเลิก</span>
          </td>
        </tr>
        <tr>
          <th>แนบเอกสารกฎหมาย (ไทย)</th>
          <td>
          	<?if($rs->filename_th != ""):?>
          		<a href="uploads/lawfile/<?=$rs->filename_th?>" target="_blank"><i class="fa fa-file-pdf-o"></i> <?=$rs->filename_th?></a>
          	<?endif;?>
          	<input type="file" name="filename_th" class="form-control" id="fileField" />
            <input type="hidden" name="doc_id1" value="<?php echo @$rs->doc_id1;?>">
          </td>
        </tr>
        <tr>
          <th>แนบเอกสารกฎหมาย (อังกฤษ)</th>
          <td>
          	<?if($rs->filename_eng != ""):?>
          		<a href="uploads/lawfile/<?=$rs->filename_eng?>" target="_blank"><i class="fa fa-file-pdf-o"></i> <?=$rs->filename_eng?></a>
          	<?endif;?>
          	<input type="file" name="filename_eng" class="form-control" id="fileField" />
            <input type="hidden" name="doc_id2" value="<?php echo @$rs->doc_id2;?>">
          </td>
        </tr>
        <tr>
          <th>Option</th>
          <td>
          <div id="btnBox" style="margin-bottom:10px;">
            <a class="inline" href="#inline_option_th"><input type="button" value="เพิ่ม Option กฎหมาย" title="เพิ่ม Option กฎหมาย" class="btn btn-warning vtip" /></a>
          </div>
            <table class="tbSublist tbOptionSublist">
              <tr>
                <th style="width:10%">#</th>
                <th style="width:25%">ชนิด Option</th>
                <th style="width:25%">ชื่อ</th>
                <th style="width:20%">แหล่งที่มา</th>
                <th style="width:10%">ปี</th>
                <th style="width:10%">ลบ</th>
              </tr>
              <?if(isset($law_options)):?>
			    <?foreach($law_options as $key=>$row):?>
			    <tr class="optionRow">
			    	<td><?=$key+1?></td>
			    	<td><?=$row->law_option->typeName?></td>
			    	<td><?=$row->option_name?></td>
			    	<td><?=$row->option_source?></td>
			    	<td><?=$row->option_year?></td>
			    	<td>
			    		<input type="hidden" name="optioninlaw_id[]" value="<?=$row->id?>">
			    		<input type="hidden" name="law_option_id[]" value="<?=$row->law_option_id?>">
			    		<input type="hidden" name="option_name[]" value="<?=$row->option_name?>">
			    		<input type="hidden" name="option_source[]" value="<?=$row->option_source?>">
			    		<input type="hidden" name="option_year[]" value="<?=$row->option_year?>">
			    		<img class="delLawBtn" src="themes/admin/images/remove.png" alt="" width="32" height="32" class="vtip" title="ลบรายการนี้"   style="cursor:pointer;"/>
			    	</td>
			    </tr>
			    <?endforeach;?>
			    <?endif;?>
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

























<!-- Option -->
<!-- This contains the hidden content for inline calls -->
<style>
	.fileUploadBlk{margin-bottom:10px;}
</style>
<div style='display:none'>
	<div id='inline_option_th' style='padding:10px; background:#fff;'>
    <h3>Option กฎหมาย</h3>
	<table class="tbadd">
	<tr>
	  <th>ชนิดของ Option<span class="Txt_red_12"> *</span></th>
	  <td>
		  <?=form_dropdown('law_option_id',get_option('id','typeName','law_options order by id asc'),'','id="law_option_id" class="form-control" style="width:auto;"','-- กรุณาเลือกชนิดของ Option --');?>
	</td>
	</tr>
	<tr>
	  <th>ชื่อ<span class="Txt_red_12"> *</span></th>
	  <td><input type="text" class="form-control" id="option_name" style="width:300px;" /></td>
	</tr>
	<tr>
	  <th>แหล่งที่มา</th>
	  <td><input type="text" class="form-control" id="option_source" style="width:500px;" /></td>
	</tr>
	<tr>
	  <th>ปี พ.ศ.</th>
	  <td><input type="text" class="form-control" id="option_year" style="width:100px;" /></td>
	</tr>
	<tr>
	  <th style="vertical-align: top;">ไฟล์แนบ <img class="addFileUpload" src="themes/admin/images/add.png" width="16" height="16" style="cursor: pointer;" /></th>
	  <td>
	  	<span class="multifile">
		  	<div class="form-inline fileUploadBlk">
		  		<input type="text" class="form-control" style="width:400px;" placeholder="ชื่อไฟล์แนบ" name="op_text[]" />
		  		<div class="input-group">
				  <input class="form-control" type="text" name="op_filename[]" value=""/>
				  <span class="input-group-addon" id="basic-addon2" onclick="browser($(this).prev(),'files')" style="cursor: pointer;">เลือกไฟล์</span>
				</div>
		  	</div>
		  </span>
	  </td>
	</tr>
	</table>
	<div id="btnBoxAdd">
	  <input name="input" type="button" title="บันทึก" value="บันทึก" class="btn btn-primary submitOptionLaw" style="width:100px;"/>
	</div>
  </div>
</div>

















<!-- Load TinyMCE -->
<script type="text/javascript" src="media/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="media/tiny_mce/config.js"></script>
<script type="text/javascript">
$(function() {
	//----------------------- ฟอร์มหลัก -----------------------------------
		// เปลี่ยนภาษา
		// $("[rel=en]").hide();
//
		// $(".lang a").click(function(){
			// $("[rel=" + $(this).attr("href") + "]").show().siblings().hide();
			// $(this).closest('li').addClass('active').siblings().removeClass('active');
			// return false;
		// });

		$("#law_datalaw_frm").validate({
		    rules:
		    {
		    	law_group_id:{required: true},
		    	law_type_id:{required: true},
		    	law_maintype_id:{required: true},
		    	law_submaintype_id:{required: true},
		    	name_th:{required: true},
		    	notic_date:{required: true},
		    	// gazette_numerative:{required: true},
		    	gazete_notice_date:{required: true},
		    	status:{required: true}
		    },
		    messages:
		    {
		    	law_group_id:{required: "กรุณาเลือกกลุ่มกฎหมาย"},
		    	law_type_id:{required: "กรุณาเลือกหมวดกฎหมาย"},
		    	law_maintype_id:{required: "กรุณาเลือกประเภทกฎหมาย"},
		    	law_submaintype_id:{required: "กรุณาเลือกประเภทย่อยกฎหมาย"},
		    	name_th:{required: "กรุณากรอกชื่อกฎหมาย (ไทย)"},
		    	notic_date:{required: "กรุณากรอกวันที่ประกาศใช้"},
		    	// gazette_numerative:{required: "กรุณากรอกเล่มที่"},
		    	gazete_notice_date:{required: "กรุณากรอกวันที่ประกาศในราชกิจจานุเบกษา"},
		    	status:{required: "กรุณากรอกสถานะการใช้"}
		    }
	    });

		// select กลุ่มกฏหมาย -> หมวดกฏหมาย
		$('table').on('change', "select[name='law_group_id']", function() {
			var law_group_id = $(this).val();
			// $('.loading').show();
			if(law_group_id == ""){
					$("#lawtype").find('select').val('').attr("disabled", true);
			}else{
				$.get('ajax/get_select_lawtype',{
					'law_group_id' : law_group_id
				},function(data){
					$('.loading').hide();
					$("#lawtype").html(data);
				});
			}
		});

		// select ประเภทกฏหมาย -> ประเภทย่อยกฏหมาย
		$('table').on('change', "select[name='law_maintype_id']", function() {
			var law_maintype_id = $(this).val();
			// $('.loading').show();
			if(law_maintype_id == ""){
					$("#lawsubmaintype").find('select').val('').attr("disabled", true);
			}else{
				$.get('ajax/get_select_submaintype',{
					'law_maintype_id' : law_maintype_id
				},function(data){
					$('.loading').hide();
					$("#lawsubmaintype").html(data);
				});
			}

			$("select[name=apply_power_group],select[name=apply_power_id]").val('').attr("disabled", true);
		});

		// select ประเภทกฎหมายย่อยที่อาศัยอำนาจ
		$('table').on('change', "select[name='law_submaintype_id']",function(){
			var law_maintype_id = $("select[name=law_maintype_id]").val();
			if($(this).val() > 1 && law_maintype_id <= 2){
				$('.loading').show();
				$.get('ajax/get_select_power_group',{
					'law_submaintype_id' : $(this).val()
				},function(data){
					$('.loading').hide();
					$("#applypowergroup").html(data);
				});
			}

			$("select[name=apply_power_id]").val('').attr("disabled", true);
		});

		// select กฏหมายที่ต้องการอาศัยอำนาจ
		$('table').on('change', "select[name='apply_power_group']", function() {
			// $('.loading').show();
			var apply_power_group = $(this).val();
			if(apply_power_group == ""){
					$("#applypowerid").find('select').val('').attr("disabled", true);
			}else{
				$.get('ajax/get_select_apply_power_id',{
					'apply_power_group' : apply_power_group
				},function(data){
					$('.loading').hide();
					$("#applypowerid").html(data);
				});
			}
		});

		//ถ้าเป็นฟอร์มแก้ไขให้ select หมวดกฏหมาย, ประเภทย่อยกฏหมาย, ประเภทกฎหมายย่อยที่อาศัยอำนาจ แบบ auto
		<?php if(@$rs->id != ""):?>
			$.get('ajax/get_select_lawtype',{
				'law_group_id' : $('select[name=law_group_id]').val(),
				'law_type_id' : '<?=@$rs->law_type_id?>'
			},function(data){
				$('.loading').hide();
				$("#lawtype").html(data);
			});

			$.get('ajax/get_select_submaintype',{
				'law_maintype_id' : $('select[name=law_maintype_id]').val(),
				'law_submaintype_id' : '<?=@$rs->law_submaintype_id?>'
			},function(data){
				$('.loading').hide();
				$("#lawsubmaintype").html(data);
			});

			var law_maintype_id = $("select[name=law_maintype_id]").val();
			var law_submaintype_id = '<?=$rs->law_submaintype_id?>';
			var apply_power_group = '<?=$rs->apply_power_group?>';
			var apply_power_id = '<?=$rs->apply_power_id?>';
			
			if(law_maintype_id <= 2 && law_submaintype_id > 1 ){
				$('.loading').show();
				$.get('ajax/get_select_power_group',{
					'law_submaintype_id' : law_submaintype_id,
					'apply_power_group' : apply_power_group
				},function(data){
					$('.loading').hide();
					$("#applypowergroup").html(data);
				});
			}

			$.get('ajax/get_select_apply_power_id',{
				'apply_power_group' : apply_power_group,
				'apply_power_id' : apply_power_id
			},function(data){
				$('.loading').hide();
				$("#applypowerid").html(data);
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

	//----------------------- Option -----------------------------------
		// Add file upload
		$('.addFileUpload').click(function(){
			$('.fileUploadBlk:last').after('<div class="form-inline fileUploadBlk"><input type="text" class="form-control"  style="width:400px;" placeholder="ชื่อไฟล์แนบ" name="op_text[]" /> <div class="input-group"><input class="form-control" type="text" name="op_filename[]" value=""/><span class="input-group-addon"  onclick="browser($(this).prev(),\'files\')" style="cursor: pointer;">เลือกไฟล์</span></div></div>');
		});

		// ดึงข้อมูลที่เลือกลงฟอร์มหลัก
		$('.submitOptionLaw').click(function(){
			// ปิด colorbox
			$.colorbox.close();

			var lawOptionIDValue = $(this).closest('#inline_option_th').find('#law_option_id option:selected').val();
			var lawOptionIDTxt = $(this).closest('#inline_option_th').find('#law_option_id option:selected').text();
			var optionName = $(this).closest('#inline_option_th').find('#option_name').val();
			var optionSource = $(this).closest('#inline_option_th').find('#option_source').val();
			var optionYear = $(this).closest('#inline_option_th').find('#option_year').val();
			// วนลูปหา fileupload
			var multiUpload = [];
			$(".fileUploadBlk").each(function() {
			   var op_text = $(this).find('input[name="op_text[]"]').val();
			   var op_filename = $(this).find('input[name="op_filename[]"]').val();
			   multiUpload.push('<input type="hidden" name="op_text[]" value="'+op_text+'"><input type="hidden" name="op_filename[]" value="'+op_filename+'">');
			});

			$('.tbOptionSublist tr:last').after('<tr class="optionRow"><td></td><td>'+lawOptionIDTxt+'</td><td>'+optionName+'</td><td>'+optionSource+'</td><td>'+optionYear+'</td><td><input type="hidden" name="law_option_id[]" value="'+lawOptionIDValue+'"><input type="hidden" name="option_name[]" value="'+optionName+'"><input type="hidden" name="option_source[]" value="'+optionSource+'"><input type="hidden" name="option_year[]" value="'+optionYear+'"><img class="delLawBtn" src="themes/admin/images/remove.png" alt="" width="32" height="32" class="vtip" title="ลบรายการนี้"   style="cursor:pointer;"/>'+multiUpload.join('')+'</td></tr>');

			// เคลียร์ค่า input ของฟอร์มใน colorbox
			$(this).closest('#inline_option_th').find("input[type=text], textarea").val("");

			// คำนวนใส่ตัวเลขแถว
			autoCountTableRow('tbOptionSublist');
		});

		// ใส่ index ที่ชื่อไฟล์ multiupload ใหม้ให้ง่ายต่อการ insert ข้อมูล
		$('form').submit(function(event){
			$(".optionRow").each(function(index) {
			   $(this).find('input[name="op_text[]"]').attr('name', 'op_text_'+index+'[]');
			   $(this).find('input[name="op_filename[]"]').attr('name', 'op_filename_'+index+'[]');
			});

	        // event.preventDefault();
	    });

	//--------------------------------------------------------------------------
	// ปุ่มลบกฏหมาย  ผูกกฎหมาย (คาบ/ข้าม), กฎหมายที่เกี่ยวข้อง (ยกเลิก/แก้ไข/เพิ่มเติม), option กฏหมาย
	$('table').on('click', '.delLawBtn', function() {
		$(this).closest('tr').fadeOut(300, function(){
			$(this).remove();
			autoCountTableRow('tbCrossSublist');
			autoCountTableRow('tbRelatedSublist');
			autoCountTableRow('tbOptionSublist');
		});
	});

});

// นับจำนวนใส่ตัวเลขหน้าแถว
function autoCountTableRow(tbClassName){
	// add Table Class Name "autocount"
	$('.'+tbClassName+' tr td:first-child').each(function(i){
		// $(this).before('<td>'+(i+1)+'</td>');
		$(this).html('');
		$(this).append((i+1));
	});
}
</script>
