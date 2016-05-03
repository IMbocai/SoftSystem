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

    //添加成员
    public function addMenber(){
      $data['user'] = $_POST['username'];
      $data['password'] = $_POST['password'];
      $data['tel'] = $_POST['telphpne'];
      $data['email'] = $_POST['email'];
      $data['role'] = $_POST['zubie'];
      $data['sex'] = $_POST['sex'];
      $data['leader'] = $_POST['leader'];
      $userInfo = M('user');
      $lastInsId = $userInfo->add($data);
      if($lastInsId){
        $this->ajaxReturn("","添加成员成功","1");
      }else{
        $this->ajaxReturn("","添加成员失败","2");
      }
    }
    //展示成员
    public function showMenber(){
      $role['role'] = $_POST['role'];
      $userInfo = M('user');
      $result = $userInfo->where($role)->select(); 
      if(!$result){
        $this->ajaxReturn($result,"获取成员数据失败","2");
      }else{
        $this->ajaxReturn($result,"获取成员数据成功","1");
      }
    }
    //编辑组员
    public function editMenber(){
      $data['user'] = $_POST['username'];
      $data['password'] = $_POST['password'];
      $data['tel'] = $_POST['telphpne'];
      $data['email'] = $_POST['email'];
      $data['role'] = $_POST['zubie'];
      $data['sex'] = $_POST['sex'];
      $data['leader'] = $_POST['leader'];
      $arr['id'] = $_POST['id'];
      $userInfo = M('user');
      $lastInsId = $userInfo->where($arr)->save($data);
      if($lastInsId){
        $this->ajaxReturn("","编辑成员成功","1");
      }else{
        $this->ajaxReturn("","编辑成员失败","2");
      }
    }
    //删除组员
    public function delMenber(){
      $arr['id'] = $_POST['id'];
      $userInfo = M('user');
      $lastInsId = $userInfo->where($arr)->delete();
      if($lastInsId){
        $this->ajaxReturn("","删除成员成功","1");
      }else{
        $this->ajaxReturn("","删除成员失败","2");
      }
    }
}
?>