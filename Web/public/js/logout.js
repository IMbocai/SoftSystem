$(document).ready(function(){
	$("#logout").on("click",function(){
		$.get("/home/index.php/Login/logout",function(re){
			window.location.replace("http://softsystem.com/");
		});
	});
});