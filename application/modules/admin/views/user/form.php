<h3>ผู้ใช้งาน (เพิ่ม / แก้ไข)</h3>
<form id="sys_user_form" method="post" action="admin/user/save/<?=$rs->id?>">
	<table class="tbadd">
	<tr>
	  <th>ชื่อ / สกุล<span class="Txt_red_12"> *</span></th>
	  <td><span class="form-inline"><input name="name" type="text" class="form-control" placeholder="ชื่อผู้ใช้งาน" id="textarea7" value="<?=$rs->name?>" style="width:250px;"/> / <input name="lastname" type="text" class="form-control" placeholder="นามสกุลผู้ใช้งาน" id="textarea7" value="<?=$rs->lastname?>" style="width:350px;"/></span></td>
	</tr>
	<tr>
	  <th>ตำแหน่ง</th>
	  <td>
	  	<?=form_dropdown('position',get_option('name','name','user_positions order by id asc'),@$rs->position,'class="form-control" style="width:auto;"','-- เลือกตำแหน่ง --');?>
	</td>
	</tr>
	<tr>
	  <th>เบอร์โทร</th>
	  <td><span class="form-inline"><input name="tel" type="text" class="form-control" id="textarea5" value="<?=$rs->tel?>" style="width:300px;"/> 
	  	<!-- ต่อ <input name="textarea5" type="text" class="form-control" id="textarea5" value="" style="width:70px;"/></span> -->
	  </td>
	</tr>
	<tr>
	  <th>วันที่</th>
		<td>
	      	<span class="form-inline">
		    <div class="input-group date">
			  <input type="text" class="form-control datepickerTH" name="rdate" data-date-language="th-th" value="<?=DB2Date($rs->rdate)?>"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
			</div>
		    </span>
		 </td>
	</tr>
	<tr>
	  <th>สังกัด</th>
	  <td>
	  	<?=form_dropdown('user_group_id',get_option('id','name','user_groups order by id asc'),@$rs->user_group_id,'id="group" class="form-control" style="width:auto;" onchange="frm=this.form; check_permit();"','-- เลือกสังกัด --');?>
	</td>
	</tr>
	<!-- <tr>
	  <th>สิทธ์การใช้งาน</th>
	  <td id="premission2"><input name="textarea6" type="text" disabled="disabled" class="form-control" style="width:300px;" value=""/></td>
	</tr> -->
	<tr>
	  <th>อีเมล์<span class="Txt_red_12"> *</span></th>
	  <td><input name="email" type="text" class="form-control" id="textarea2" value="<?=$rs->email?>" style="width:300px;"/></td>
	</tr>
	<tr>
	  <th>Username<span class="Txt_red_12"> *</span></th>
	  <td><input name="username" type="text" class="form-control" id="textarea4" value="<?=$rs->username?>" style="width:200px;"/></td>
	</tr>
	<tr>
	  <th>รหัสผ่าน<span class="Txt_red_12"> *</span></th>
	  <td><input name="password" type="text" class="form-control" id="inputPass" value="<?=$rs->password?>" style="width:200px;"/></td>
	</tr>
	<tr>
	  <th>ยืนยันรหัสผ่าน<span class="Txt_red_12"> *</span></th>
	  <td><input name="_password" type="text" class="form-control" id="textarea3" value="<?=$rs->password?>" style="width:200px;"/></td>
	</tr>
	</table>
	<div id="btnBoxAdd">
	  <input name="input" type="submit" title="บันทึก" value="บันทึก" class="btn btn-primary" style="width:100px;"/>
	  <input name="input2" type="button" title="ย้อนกลับ" value="ย้อนกลับ"  onclick="history.back(-1)"  class="btn btn-default" style="width:100px;"/>
	</div>
</form>

<script type="text/javascript" charset="utf-8">
$(document).ready(function(){
	check_permit();
	
	$("#sys_user_form").validate({
	    rules: 
	    {
	    	name:{required: true},
	    	lastname:{required: true},
	        email: 
	        { 
	            required: true,
	            email: true
	        },
	        username:{required: true},
	        password: 
	        {
	            required: true,
	            minlength: 4
	        },
	        _password:
	        {
	            equalTo: "#inputPass"
	        }
	    },
	    messages:
	    {
	    	name:{required: "กรุณากรอกชื่อ"},
	    	lastname:{required: "กรุณากรอกนามสกุล"},
	        email: 
	        { 
	            required: "กรุณากรอกอีเมล์",
	            email: "กรุณากรอกอีเมล์ให้ถูกต้อง"
	        },
	        username:{required: "กรุณากรอกยูสเซอร์เนม"},
	        password: 
	        {
	            required: "กรุณากรอกรหัสผ่าน",
	            minlength: "กรุณากรอกรหัสผ่านอย่างน้อย 4 ตัวอักษร"
	        },
	        _password:
	        {
	            equalTo: "กรุณากรอกรหัสผ่านให้ตรงกันทั้ง 2 ช่อง"
	        }
	    }
    });
});
</script>

<script language="javascript">
     function check_permit(){
          var unit=document.getElementById("group").value;
         if(unit==1){
              permit='ผู้ดูแลระบบ';
              document.getElementById("premission2").innerHTML ='<input type=\'text\' name="prem"  id="prem" class="form-control" style="width:300px;"   value="'+permit+'" readonly="" style="color:#999999" ><input type="hidden" name="premission"  id="premission" value="1">';
          }else if(unit==2){
             
              permit='ผู้นำเข้าระดับ1';
              document.getElementById("premission2").innerHTML ='<input type=\'text\' name="prem"  id="prem" class="form-control" style="width:300px;"   value="'+permit+'" readonly="" style="color:#999999" ><input type="hidden" name="premission"  id="premission" value="2">';
          }else{ 
            
              permit='ผู้นำเข้าระดับ2';
              document.getElementById("premission2").innerHTML ='<input type=\'text\' name="prem"  id="prem" class="form-control" style="width:300px;"   value="'+permit+'" readonly="" style="color:#999999" ><input type="hidden" name="premission"  id="premission" value="3">';
          }
        }//fn
        
        function numbersonly(e){
             var unicode=e.charCode? e.charCode : e.keyCode
             if (unicode!=8){ //if the key isn't the backspace key (which we should allow)
             if (unicode<48||unicode>57) //if not a number
             return false //disable key press
             }
        }
</script>