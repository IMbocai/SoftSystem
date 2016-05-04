<?php 
class LoginAction extends Action{
    public function login(){
    	$username=$_POST['username'];
    	$password=$_POST['password'];
    	$code=$_POST['code'];
    	$level=$_POST['level'];
    	//验证码校验
    	 if(md5($code)!=$_SESSION['code']){
    	 	 $this->error("验证码错误！");
         } 
       //验证用户名及密码
       if($level!='' && ($level==5||$level==2||$level==3||$level==4))
       {
       	 //内部员工登录验证
         /*$manager=M('employee_info');
         $where['username']=$username;
         $where['password']=$password;
         $where['level']=$level;       
         $arr=$manager->field('id')->where($where)->find();
         
         if($arr ==false ){
         	$this->ajaxReturn("","服务器连接异常","-1");
         }
         else{
         		if(empty($arr))
         		 {
         	   		$this->ajaxReturn("","用户不存在或密码错误","0");
         		 }
         		else
         		{
					session_start();
					$_SESSION['username']=$username;
					$_SESSION['id']=$arr['id'];
					$_SESSION['login'] = $level;
         			$this->ajaxReturn("","","1");
         		 }
             }*/
        }
      else if($level!='' && $level ==1 )
       { 
      	//管理员登录验证
      	$manager=M('admin');//管理员信息表
      	$where['username']=$username;
      	$where['password']=$password;
      	$arr=$manager->field('id')->where($where)->find();
       if($arr ==false ){
         	$this->ajaxReturn("","服务器连接异常","-1");
            }
         else{
         		if(empty($arr))
         		 {
         	   		$this->ajaxReturn("","用户不存在或密码错误","0");
         		 }
         		else
         		{
         			session_start();
					$_SESSION['username']=$username;
					$_SESSION['id']=$arr['id'];
					$_SESSION['login'] = $level;
         			$this->ajaxReturn("true","","1");
         		 }
             }
      } 
      else 
      {
      	$this->ajaxReturn("false","用户不存在或密码错误","0");
      } 
    }
    
    public function logName(){
      $this->ajaxReturn($_SESSION['username']);
    }

    public function logout(){
    	$_SESSION=array();
 		if(isset($_COOKIE[session_name()])){
 			setcookie(session_name(),'',time()-1,'/');
 		}
 		session_destroy();
    }
}
?>