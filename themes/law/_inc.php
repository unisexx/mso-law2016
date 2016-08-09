<!-- css style sheet -->
<link id="bootstrap_themes" href="themes/law/css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="media/font-awesome-4.5.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="themes/law/css/smk-accordion.css">
<!-- <link rel="stylesheet/less" type="text/css" href="themes/law/css/style.less" /> -->

<!-- Theme default -->
<link id="law_themes" href="themes/law/css/template.css" type="text/css" rel="stylesheet">

<!-- js script -->
<script type="text/javascript" src="themes/law/js/jquery_2.0.3.min.js"></script>
<script type="text/javascript" src="themes/law/js/bootstrap_3.3.4.min.js"></script>
<script type="text/javascript" src="themes/law/js/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="themes/law/js/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="themes/law/js/smk-accordion.js"></script>
<script type="text/javascript" src="media/js/validate/jquery.validate.min.js"></script>
<script type="text/javascript" src="media/js/js-cookie/src/js.cookie.js"></script>
<script type="text/javascript">
jQuery(document).ready(function($){
    $(".accordion_example").smk_Accordion();
});
</script>
<script>
$(document).ready(function() { 
	// เปลี่ยนธีม
	if(Cookies.get('css')) {
		var $this = Cookies.get('css');
		var webCssPath = $this+'template.css';
		var bootstrapCssPath = $this+'bootstrap.css';
		
		$("#law_themes").attr("href",webCssPath);
		$("#bootstrap_themes").attr("href",bootstrapCssPath);
	}
	
	$("ul.ulTheme li a").click(function() { 
		var $this = $(this).attr('rel');
		var webCssPath = $this+'template.css';
		var bootstrapCssPath = $this+'bootstrap.css';
		
		$("#law_themes").attr("href",webCssPath);
		$("#bootstrap_themes").attr("href",bootstrapCssPath);
		
		//set cookie
		Cookies.set('css', $this, { expires: 365 });
		
		return false;
	});
	
	// ขนาดตัวอักษร
	var ChangeElement = $('.filter,#news-law,#cat-group,.title-law1,.title-filter,.td-line a,#webboard,#tb-plan tr,tbody,.text-muted,.tb-result td');
	if(Cookies.get('front')) {
		var $this = Cookies.get('front');
		ChangeElement.css("font-size", $this + "px", 'important');
	}
	
	$("ul.ulFront li a").click(function() { 
		var $this = $(this).attr('rel');
		// if($this == 'defaultFont'){
			// $(ChangeElement).css("font-size","14px", 'important');
		// }else if($this == 'incFont'){
			// curSize= parseInt(ChangeElement.css('font-size')) + 2;
			// if(curSize<=20){
	        	// $(ChangeElement).css('font-size', curSize, 'important');
	        // }
		// }else if($this == 'decFont'){
			// curSize= parseInt(ChangeElement.css('font-size')) - 2;
			// if(curSize>=12)
	        	// $(ChangeElement).css('font-size', curSize, 'important');
	        // }
		// }
		ChangeElement.css("font-size", $this + "px", 'important');
		//set cookie
		Cookies.set('front', $this, { expires: 365 });
		
		return false;
	});
});
</script>
