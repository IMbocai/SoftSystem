<?php if (!defined('THINK_PATH')) exit();?><html>
  <head>
  <title>XXX公司</title>
  </head>
<body>

<div style="color:#00FF00">
<h1>XX公司欢迎您！</h1>
</div>

 <div id="main" align="left">
<table  width=100%>

 <img src="__PUBLIC__/Images/banner_logo.jpg"/>
 </table>
	<form action="__APP__/Login/dologin" method="POST">
		<table border="2" bgcolor=grey width="280" height="200" align="right">
				<tr>
					<td> 
						用户名:
					</td>
					<td>
						<input type="text" name="username" />
					</td>
				</tr>

				<tr> 
					<td>
						密码：
					</td>
					<td>
					<input  type="text" name="password"/>
				    </td>
				</tr>

				<tr> 
					<td>
					验证码：
					</td>
					 <td>
					<input  type="text" name="code"/>
					
                 <img src='__APP__//Public/code' onclick="this.src=this.src+'?'+Math.random()"/>
					</td>
				
				</tr>
					
				<tr>
					<td colspan="2" align="center">
					<input type="submit" name="submit" value="提交" / >
					<input type="reset" name="reset" value="重置" />
					</td>
				</tr>
		<table>
	</form>
</div>
<div id="footer">
<p>
<a href="">联系我们</a>
<a href="">收藏我们</a>
</p>

</div>
</body>
</html>