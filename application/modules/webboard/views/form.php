<div id="webboard">
  <span class="title-law2"><?=lang("b_create_title")?></span>
  <div class="line1">&nbsp;</div>

  <form id="questionForm" method="post" action="webboard/save_quiz">
	  <div class="form-group">
	    <label for="title"><?=lang("b_question")?></label>
	    <input type="text" class="form-control" id="title" placeholder="หัวข้อ" name="quiz_title">
	  </div>
	  <div class="form-group">
	    <label for="detail"><?=lang("b_detail")?></label>
	    <textarea id="detail" class="form-control" name="quiz_detail" rows="8" placeholder="รายละเอียด"></textarea>
	  </div>
	  <div class="form-group">
	    <label for="title"><?=lang("b_question_name")?></label>
	    <input type="text" class="form-control" id="quiz_who" placeholder="ชื่อผู้ตั้งคำถาม" name="quiz_who">
	  </div>
	  <div class="form-group">
	    <label for="title"><?=lang("b_captcha")?></label>
	    <div>
		    <img src="users/captcha" /><Br>
	        <input class="form-control" type="text" name="captcha" id="inputCaptcha" placeholder="<?=lang("b_captcha")?>" style="width:125px;">
        </div>
	  </div>
	  <button type="submit" class="btn btn-info"><?=lang("b_created_button")?></button>
	</form>
  
  
</div>

<script type="text/javascript">
$(document).ready(function(){
	$("#questionForm").validate({
    rules: 
    {
    	quiz_title:{required: true},
    	quiz_detail:{required: true},
    	quiz_who:{required: true},
        captcha:
        {
            required: true,
            remote: "users/check_captcha"
        }
    },
    messages:
    {
    	quiz_title:{required: "ฟิลด์นี้ห้ามเป็นค่าว่าง"},
    	quiz_detail:{required: "ฟิลด์นี้ห้ามเป็นค่าว่าง"},
    	quiz_who:{required: "ฟิลด์นี้ห้ามเป็นค่าว่าง"},
        captcha:
        {
            required: "กรุณากรอกตัวอักษรตัวที่เห็นในภาพ",
            remote: "กรุณากรอกตัวอักษรให้ตรงกับภาพ"
        }
    }
    });
});
</script>