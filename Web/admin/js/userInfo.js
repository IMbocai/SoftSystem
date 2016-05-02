$(document).ready(function(){
	//加载管理员资料
	$.get("/home/index.php/Admin/adminInfo",function(result){
		console.log(result)
		$("#userName").attr("placeholder",result.username);
		$("#telPhone").attr("placeholder",result.tel);
		$("#email").attr("placeholder",result.email);
		if(result.sex == 1){
			$("#option1").addClass("active");
		}else{
			$("#option2").addClass("active");
		}
	});
	//确定修改资料
	$("#sure").on("click",function(){
		$.post("/home/index.php/Admin/changeInfo",{
			username:$("#userName").val(),
			telPhone:$("#telPhone").val(),
			email:$("#email").val(),
			sex:$("#sex .active").attr("data-value")
		},function(result){
			console.log(result)
			if(result.status == 1){
				alert(result.info);
				window.location.reload();
			}else{
				alert(result.info);
			}
		});
	});
});