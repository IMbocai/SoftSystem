<?php
	class PublicAction extends Action{
		
		public function code(){
			import('ORG.Util.Image');
    		Image::buildImageVerify(4,1,'png',30,30,'code');
		}
		
		/**
		 * 实现post数据自动验证，自动完成插入或者修改
		 * @param  $model 模型名
		 * @param  $returnInfo 错误或成功返回的信息
		 *
		 */
		public function addOrEdit($model,$returnInfo){
			$ret = D($model);
		
			if(!isset($_POST['id']) || $_POST['id'] == ''){
				if( !$ret->create() ){
					$this->ajaxReturn(0, $ret->getError(), 0);
				}
		
				$lastId = $ret->add();
		
				if( $lastId !== false ){
					$this->ajaxReturn(0,'添加'.$returnInfo.'成功！',1);
				}else{
					$this->ajaxReturn(0,'服务器连接异常',-1);
				}
			}else{
		
				if( !$ret->create() ){
					$this->ajaxReturn(0, $ret->getError(), 0);
				}
					
				$lastId = $ret->save();
				if( $lastId !== false ){
					$this->ajaxReturn(0,'修改'.$returnInfo.'成功！',1);
				}else{
					$this->ajaxReturn(0,'服务器连接异常',-1);
				}
			}
		}
		
		/**
		 * 删除客户
		 */
		public function delUser($model){
			if(isset($_GET['id']) || $_GET['id'] != ''){
				$ret = M($model)->where('id='.$_GET['id'])->delete();
				if($ret === false){
					$this->ajaxReturn("","服务器连接异常",-1);
				}else{
					if(empty($ret))
						$this->ajaxReturn("","没有此用户",0);
					else
						$this->ajaxReturn($ret,"删除成功！",1);
				}
			}
		}
		
		
	}
?>
