$(document).ready(function(){
	//加载人员
	var role=1;//成员角色
	showMenber(role);
	function showMenber(role){
		$.post("/home/index.php/Admin/showMenber",{
			role:role
		},function(result){
			console.log(result.data);
			var data = {
				list: result.data
			};

			var html = template('showMenber', data);
			document.getElementById('showTable').innerHTML = html;
		});
	}
	//选择查看成员
	$("#selectMenber a").on("click",function(){
		role = $(this).attr("data-value");
		showMenber(role);
	})
	//增加成员
	$("#sureAdd").on("click",function(){
		var username = $("#username").val(),
			password = $("#password").val(),
			telphpne = $("#telphpne").val(),
			email = $("#email").val(),
			zubie = $("#zubie .active").attr("data-value"),
			sex = $("#sex .active").attr("data-value"),
			leader = $("#leader .active").attr("data-value");
		if(!username || !password || !telphpne || !email || !zubie || !sex || !leader){
			alert("请填写完整");
			return false;
		}else{
			$.post("/home/index.php/Admin/addMenber",{
				username:username,
				password:password,
				telphpne:telphpne,
				email:email,
				zubie:zubie,
				sex:sex,
				leader:leader
			},function(result){
				console.log(result);
				if(result.status == 1){
					alert(result.info);
					window.location.reload();
				}else{
					alert(result.status);
				}
			});
		}
	});
	//编辑成员信息
	$("#showTable").on("click",".edit_a",function(){
		var id = $(this).attr("data-value"),
			tr = $(this).parent().parent();
		$("#sure_edit").attr("data-value",id);
		$("#edit_role .btn").removeClass("active");
		$("#edit_sex .btn").removeClass("active");
		$("#edit_leader .btn").removeClass("active");
		$("#edit_username").val(tr.find("td").eq(0).text());
		$("#edit_password").val(tr.find("td").eq(1).text());
		$("#edit_telphpne").val(tr.find("td").eq(2).text());
		$("#edit_email").val(tr.find("td").eq(3).text());
		$("#edit_role_option"+role).addClass("active");
		$("#edit_sex_option"+tr.find("td").eq(5).attr("data-value")).addClass("active");
		$("#edit_leader_option"+tr.find("td").eq(4).attr("data-value")).addClass("active");
	});
	//提交编辑成员信息
	$("#sure_edit").on("click",function(){
		var username = $("#edit_username").val(),
			password = $("#edit_password").val(),
			telphpne = $("#edit_telphpne").val(),
			email = $("#edit_email").val(),
			zubie = $("#edit_role .active").attr("data-value"),
			sex = $("#edit_sex .active").attr("data-value"),
			leader = $("#edit_leader .active").attr("data-value");
		var id = $(this).attr("data-value");
		if(!username || !password || !telphpne || !email || !zubie || !sex || !leader){
			alert("请填写完整");
			return false;
		}else{
			$.post("/home/index.php/Admin/editMenber",{
				id:id,
				username:username,
				password:password,
				telphpne:telphpne,
				email:email,
				zubie:zubie,
				sex:sex,
				leader:leader
			},function(result){
				console.log(result);
				if(result.status == 1){
					alert(result.info);
					window.location.reload();
				}else{
					alert(result.status);
				}
			});
		}
	})
	//删除成员
	$("#showTable").on("click",".del_a",function(){
		var id = $(this).attr("data-value");
		$("#sure_del").attr("data-value",id);
	})
	//确定删除
	$("#sure_del").on("click",function(){
		var id = $(this).attr("data-value");
		$.post("/home/index.php/Admin/delMenber",{
			id:id
		},function(result){
			if(result.status == 1){
				alert(result.info);
				window.location.reload();
			}else{
				alert(result.status);
			}
		})
	})
});