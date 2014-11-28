<?php

$body = <<< EOPAGE
<div id="assign">{$LANGUAGES[$langue]['login']}</div>

<div ><label>{$LANGUAGES[$langue]['phoneNumber']}</label><input type="text" id="phoneNumber"/></div>
<div ><label>{$LANGUAGES[$langue]['cipher']}<label><input type="text" id="cipher"/></div>

<div id="ok">{$LANGUAGES[$langue]['ok']}</div>
<div id="cancel">{$LANGUAGES[$langue]['cancel']}</div>
EOPAGE;
echo $body;

?>	

<script type="text/javascript">
		
$("#ok").click(function(){
	var phoneNumber=$("#phoneNumber").val(),
		cipher=$("#cipher").val();
	//在这里要对各个变量进行最基本的校验，需要使用正则表达式
	if( (phoneNumber === null) || (location === null) (cipher === null)){
		alert('invalid infomation');
		return;
	}
	$.post("./php/restaurantLogin.php",
	{
		phoneNumber:$("#phoneNumber").val(),
		cipher:$("#cipher").val()
	},
	function(data,status){
		if(status){
			alert(data);
		}else{
			alert('filed');
		}
	});
});
</script>