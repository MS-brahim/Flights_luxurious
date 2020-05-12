$(document).ready(function() {
	$("#oneway").show();
	$("#all").hide();
	
	$("#button1").click(function(){	
		$("#oneway").show();
		$("#all").hide();
	});

	$("#button2").click(function(){
		$("#oneway").hide();
		$("#all").show();
	});
});