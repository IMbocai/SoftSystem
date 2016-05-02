$(document).ready(function(){
	$("#sure").on("click",function(){
		var newPass = $("#newPassword").val(),
			surePass = $("#surePassword").val(),
			oldPass = $("#oldPassword").val();
		if(!oldPass || !surePass || !oldPass){
			alert("请填写完整信息");
			return false;
		}else{
			if(surePass != newPass){
				alert("两次密码不一致");
				return false;
			}else{
				$.post("/home/index.php/Admin/adminPass",{
					oldPass:oldPass,
					newPass:newPass
				},function(result){
					console.log(result);
					if(result.status == 0){
						alert(result.info);
						window.location.reload();
					}else{
						if(result.status == 1){
							alert(result.info);
							window.location.replace("http://softsystem.com/");
						}else{
							alert(result.info);
						}
					}
				});
			}
		}
	});
});