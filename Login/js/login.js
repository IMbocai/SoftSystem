$(document).ready(function(){
	alert("hello");
	$("#enter").click(function(){
		login();
	});
	$("input").keydown(function(e){
		if(e.which == 13){
			login();
		}
	})
	var zone = "/detai/";
	//登陆验证
	function login(){
		//var level = parseInt($("input[name='user']:checked").val());
		var level = parseInt($(".ipt_secect").val());
		$.post(zone+"home/index.php/Login/login",
		{
			username:$(".ipt").eq(0).val(),
			password:$(".ipt").eq(1).val(),
			code:$(".ipt").eq(3).val(),
			level:level
		},function(data){
			//console.log(data);
			if(data.status == 0){
				alert(data.info);
				return false;
			}else if(data.status == -1){
				alert("密码错误或用户不存在！");
				return false;
			}else{
				dump(level);
			}
		})
	}
	//登陆跳转
	function dump(num){
		switch(num){
			case 1:
				window.location.href = zone+"admin/";
				break;
			case 2:
				window.location.href = zone+"salesman/";
				break;
			case 3:
				window.location.href = zone+"followman/";
				break;
			case 4:
				window.location.href = zone+"designer/";
				break;
			case 5:
				window.location.href = zone+"customer/";
				break;
			case 6:
				window.location.href = zone+"supplier/";
				break;
		}
	}
})