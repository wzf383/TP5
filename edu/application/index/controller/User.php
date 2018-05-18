<?php
namespace app\index\controller;
use app\index\controller\Base;
use think\Request;
use think\Db;
use think\Session;
use app\index\model\User as UserModel;
use think\Validate;
class User extends Base
{

	//渲染登录界面
    public function login()
    {
    
  $this->alreadyLogin();
    return view();
     
    }
//验证登录 $this->validate($data,$rule,$msg)
     public function checkLogin(Request $request)
    {
    
         $status=0;
         $result='';
         $data=$request->param();
       
      //验证规则

        

         $rule=[
           'name|用户名'=>'require',
           'password|密码'=>'require',
          'verify'=>'require|captcha',

         ];

         $msg=[
           'name'=>['require'=>'用户名不能为空，请重新输入'],
           'password'=>['require'=>'密码名不能为空，请重新输入'],
          'verify'=>[

          'require'=>'验证码不能为空，请重新输入',
          'captcha'=>'验证码错误'




          ],

         ];

 $result=$this->validate($data,$rule,$msg);
          
      /*    if($result===true){

            $name=$data['name'];
            $password=$data['password'];
           $password1=md5($password);
           
           //数据表密码字段加密的问题 我老忘记  peter可以登录，admin不可以因为密码加密了
            $dd=Db::table('user')->where('name',$name)->where('password',$password1)->find();

           if($dd){
            $status=1;
           }else{
             $status=11;
           }
          }*/

         if($result===true){
           $map=[
          'name'=>$data['name'],
          'password'=>md5($data['password']),
           ];

           //用模型查询

           $user=UserModel::get($map);

        if($user==null){

          $result="用户名或者密码错误";
        }else{
          $status=1;
           $result="验证通过,点击确定进入";

           //
           Session::set('user_id',$user->id); //用户ID
           Session::set('user_info',$user->getData()); //获取用户所有信息 二维数组
        }

         }

       return ['status'=>$status,'message'=>$result,'data'=>$data];
     
    }

       public function logout()

       {
       	 Session::delete('user_id');
         Session::delete('user_info');
         $this->success('注销登录,正在返回','user/login');
       }

       public function adminList(){

        $this->assign("title","管理员列表");
        $this->assign("keywords","学生管理系统");
        $this->assign("desc","教学案例");


        $count=UserModel::count();

        //判断当前是不是admin用户
        $userName=Session::get('user_info.name');

        if($userName=='admin'){

          $list=UserModel::all();//admin用户可以查看所有记录，数据要经过模型获取器处理
        }else{
          //为了公用列表模板,使用了all(),其实这里用get()符合逻辑，但有时也要变通
          //非admin只能看自己信息,数据要经过模型获取器处理
           
           $list=UserModel::all(['name'=>$userName]);
        }

         $this->assign("list",$list);
         $this->assign("count",$count);
        return $this->fetch('admin-list');
       }
      //管理员状态变更
       public function setStatus(Request $request){

        $user_id=$request->param('id');
        $result=UserModel::get($user_id);

        if($result->getData('status')==1)
        {

          UserModel::update(['status'=>0],['id'=>$user_id]);
          

       }else{
UserModel::update(['status'=>1],['id'=>$user_id]);

       }
        }

        public function adminEdit(Request $request){

          $user_id=$request->param('id');
             $result=UserModel::get($user_id);
              $this->assign("title",'编辑管理员信息');
              $this->assign("keywords",'php.cn');
              $this->assign("desc",'学生管理系统ThinkPHP5开发');
              $this->assign("user_info",$result->getData());
           return $this->fetch('admin-edit');
        }

        public function adminAdd(Request $reques){

         
           return $this->fetch('admin-add');
        }

        public function  checkUserName(Request $request){


             $userName=trim($request->param('name'));
             $status=1;
             $message='用户名可用';

             if(UserModel::get(['name'=>$userName])){
                      //如果在表中查询到该用户名

              $status=0;
              $message='用户名重复,请重新输入!!';

             }
             return ['status'=>$status,'message'=>$message];
        }

          public function  checkUserEmail(Request $request){


             $userEmail=trim($request->param('email'));
             $status=1;
             $message='邮箱可用';

             if(UserModel::get(['email'=>$userEmail])){
                      //如果在表中查询到该用户名

              $status=0;
              $message='邮箱重复,请重新输入!!';

             }
             return ['status'=>$status,'message'=>$message];
        }


     public function addUser(Request $request)
    {
      $data = $request -> param();
        $status = 0;
        $message = '添加失败';
            $user= UserModel::create($request->param());
            if ($user) {
                $status = 1;
                $message = '添加成功~~';
            }
       
/*$data = $request -> param();
        $status = 1;
        $message = '添加失败';

        



        $rule = [
            'name|用户名' => "require|min:3|max:10",
            'password|密码' => "require|min:3|max:10",
            'email|邮箱' => 'require|email'
        ];

        $result = $this -> validate($data, $rule);

        if ($result === true) {
            $user= UserModel::create($request->param());
            if ($user === null) {
                $status = 0;
                $message = '添加失败~~';
            }
        }*/

        
        return ['status'=>$status, 'message'=>$message];
    }

      public  function  editUser(Request $request){

         //获取表单返回的数据
//        $data = $request -> param();
        /*$param = $request -> param();
        $status = 0;
        $message = '更新失败';
        //去掉表单中为空的数据,即没有修改的内容
        foreach ($param as $key => $value ){
            if (!empty($value)){
                $data[$key] = $value;
            }
        }*/

       /* $condition = ['id'=>$data['id']] ;
        $result = UserModel::update($data, $condition);*/

         /*  $id = $request -> param('id');
        $data = $request -> param();
        $status = 0;
        $message = '更新失败';
            $user= UserModel::where('id', $id)->update($request->param());
            if ($user) {
                $status = 1;
                $message = '更新成功~~';
            }*/
/*
             if (true == $result) {
              $status = 1;
                $message = '更新成功~~';
             }
   return ['status'=>$status, 'message'=>$message];*/

     //获取表单返回的数据
//        $data = $request -> param();
        $param = $request -> param();

        //去掉表单中为空的数据,即没有修改的内容
        foreach ($param as $key => $value ){
            if (!empty($value)){
                $data[$key] = $value;
            }
        }

        $condition = ['id'=>$data['id']] ;
        $result = UserModel::update($data, $condition);

        //如果是admin用户,更新当前session中用户信息user_info中的角色role,供页面调用
       /* if (Session::get('user_info.name') == 'admin') {
            Session::set('user_info.role', $data['role']);
        }*/


        if (true == $result) {
            return ['status'=>1, 'message'=>'更新成功'];
        } else {
            return ['status'=>0, 'message'=>'更新失败,请检查'];
        }
      }

          public  function deleteUser(Request $request){
                    $id = $request -> param('id');
                   UserModel::update(['is_delete'=>1],['id'=>$id]);

                  $user=UserModel::destroy($id);


          }

          public  function unDelete(Request $request){

                 UserModel::update(['delete_time'=>null],['is_delete'=>1]);
          }
}
