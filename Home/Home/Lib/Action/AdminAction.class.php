<?php 
class AdminAction extends Action{
  //获取管理员信息
    public function adminInfo(){
      $admin=M('admin');//管理员信息表
      $info=$admin->field('username,email,tel,sex')->find();
      //$info=$admin->getField('id,email');
      $this->ajaxReturn($info);
    }
  //修改管理员信息
    public function changeInfo(){
      $data['username'] = $_POST['username'];
      $data['tel'] = $_POST['telPhone'];
      $data['email'] = $_POST['email'];
      $data['sex'] = $_POST['sex'];
      $admin=M('admin');//管理员信息表
      $count = $admin->where('id=1')->save($data); 
      if($count){
        $this->ajaxReturn("","更改成功","1");
      }else{
        $this->ajaxReturn("","更改失败","0");
      }
    }
    //修改管理员密码
    public function adminPass(){
      $username = $_SESSION['username'];
      $oldPass = $_POST['oldPass'];
      $newPass = $_POST['newPass'];
      $admin=M('admin');//管理员信息表
      $arr['username'] = $username;
      $arr['password'] = $oldPass;
      $info=$admin->where($arr)->select();
      if(!$info){
        $this->ajaxReturn("","原始密码不正确","0");
      }else{
        $data['password'] = $newPass;
        $count = $admin->where('username='+$username)->save($data); 
        if($count){
          $this->ajaxReturn("","密码更改成功","1");
        }else{
          $this->ajaxReturn("","密码更改失败","2");
        }
      }
    }
}
?>