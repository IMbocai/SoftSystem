<?php 
class TaskAction extends Action{
  //创建任务
    public function addTask(){
      $data['title'] = $_POST['taskName'];
      $data['start'] = $_POST['startTime'];
      $data['end'] = $_POST['endTime'];
      $data['taskLevel'] = $_POST['taskLevel'];
      $data['taskStatus'] = $_POST['taskStatus'];
      $data['username'] = $_SESSION['username'];
      $data['userId'] = $_SESSION['id'];
      $task = M('task');
      $result = $task->add($data);
      if($result){
        $this->ajaxReturn("","创建任务成功","1");
      }else{
        $this->ajaxReturn("","创建失败","0");
      }
    }
    //编辑任务
    public function editTask(){
      $data['title'] = $_POST['taskName'];
      $data['start'] = $_POST['startTime'];
      $data['end'] = $_POST['endTime'];
      $data['taskLevel'] = $_POST['taskLevel'];
      $data['taskStatus'] = $_POST['taskStatus'];
      $data['username'] = $_SESSION['username'];
      $data['userId'] = $_SESSION['id'];
      $arr['taskId'] = $_POST['taskId'];
      $task = M('task');
      $result = $task->where($arr)->save($data);
      if($result){
        $this->ajaxReturn("","编辑任务成功","1");
      }else{
        $this->ajaxReturn("","编辑任务失败","0");
      }
    }
    //删除任务
    public function delTask(){
      $arr['taskId'] = $_POST['taskId'];
      $arr['userId'] = $_SESSION['id'];
      $task = M('task');
      $result = $task->where($arr)->delete();
      if($result){
        $this->ajaxReturn("","删除任务成功","1");
      }else{
        $this->ajaxReturn("","删除任务失败","0");
      }
    }
    //展示用户拥有的任务
    public function showTask(){
      $arr['userId'] = $_SESSION['id'];
      $task = M('task');
      $result = $task->where($arr)->select();
      if($result){
        $this->ajaxReturn($result);
      }else{
        $this->ajaxReturn($result);
      }
    }
}
?>