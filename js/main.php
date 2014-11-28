<?php

$body = <<< EOPAGE
<div id="assign">{$LANGUAGES[$langue]['assign']}</div>
<div ><label>{$LANGUAGES[$langue]['restaurant']}</label><input type="text" id="restaurant"/></div>
<div ><label>{$LANGUAGES[$langue]['host']}</label><input type="text" id="host"/></div>
<div ><label>{$LANGUAGES[$langue]['phoneNumber']}</label><input type="text" id="phoneNumber"/></div>
<div ><label>{$LANGUAGES[$langue]['location']}</label><input type="text" id="location"/></div>
<div ><label>{$LANGUAGES[$langue]['cipher']}<label><input type="text" id="cipher"/></div>
<div ><label>{$LANGUAGES[$langue]['cipher2']}</label><input type="text" id="cipher2"/></div>
<div id="ok">{$LANGUAGES[$langue]['ok']}</div>
<div id="cancel">{$LANGUAGES[$langue]['cancel']}</div>
EOPAGE;
echo $body;

?>	

<script type="text/javascript">
		
$("#ok").click(function(){
	var restaurant=$("#restaurant").val(),
		host=$("#host").val(),
		phoneNumber=$("#phoneNumber").val(),
		location=$("#location").val(),
		cipher=$("#cipher").val(),
		cipher2=$("#cipher2").val();
	//在这里要对各个变量进行最基本的校验，需要使用正则表达式
	if((restaurant === null) || (host === null) || (phoneNumber === null) || (location === null) || (cipher === null) || (cipher2 === null) || (cipher !== cipher2)){
		alert('invalid infomation');
		return;
	}
	$.post("./php/restaurantAssign.php",
	{
		restaurant: $("#restaurant").val(),
		host:$("#host").val(),
		phoneNumber:$("#phoneNumber").val(),
		location:$("#location").val(),
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
$("#restaurant").mouseenter(function(e){
	$(this).css({
				"width":"200px",
				"height":"300px"
				});
});
</script>