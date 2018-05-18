<?php

namespace app\index\controller;
use app\index\model\Teacher as TeacherModel;
use think\Request;

class Teacher extends Base
{
    //教师列表
    public function  teacherList()
    {
        //获取所有教师表teacher数据
        $teacher = TeacherModel::all();

        //获取记录数量
        $count = TeacherModel::count();
        //遍历teacher表
        foreach ($teacher as $value){
            $data = [
                'id' => $value->id,  //主键
                'name' => $value->name,  //姓名
                'degree' => $value->degree,  //学历
                'school' => $value->school,  //毕业学校
                'mobile' => $value->mobile,  //手机号
                'hiredate' => $value->hiredate,  //入职时间
                'status' => $value->status,  //当前启用状态
                //用关联方法grade属性方式访问grade表中数据
                'grade' => isset($value->grade->name)? $value->grade->name : '<span style="color:red;">未分配</span>',
            ];
            //每次关联查询结果,保存到数组   $teacher中
            $teacherList[] = $data;
        }

        $this -> view -> assign('teacherList', $teacherList);
        $this -> view -> assign('count', $count);

        //设置当前页面的seo模板变量
        $this->view->assign('title','编辑班级');
        $this->view->assign('keywords','php.cn');
        $this->view->assign('desc','PHP中文网ThinkPHP5开发实战课程');

        return $this -> view -> fetch('teacher-list');
    }
  


     public function setStatus(Request $request){

        $user_id=$request->param('id');
        $result=TeacherModel::get($user_id);

        if($result->getData('status')==1)
        {

          TeacherModel::update(['status'=>0],['id'=>$user_id]);
          

       }else{
TeacherModel::update(['status'=>1],['id'=>$user_id]);

       }
        }


        public function teacherEdit(Request $request){

        
        $user_id=$request->param('id');
        $result=TeacherModel::get($user_id);
       
        $this->view->assign('teacher_info',$result);
           //将班级表中所有数据赋值给当前模板
        $this->view->assign('gradeList',\app\index\model\Grade::all());
     return $this -> fetch('teacher-edit');

        }


          public function doEdit(Request $request)
    {
        //从提交表单中排除关联字段teacher字段
       //$data = $request -> except('grade');
  $data=$request->param();
        //设置更新条件
        $condition = ['id'=>$data['id']];

        //更新当前记录
        $result = TeacherModel::update($data,$condition);

        //设置返回数据
        $status = 0;
        $message = '更新失败,请检查';

        //检测更新结果,将结果返回给grade_edit模板中的ajax提交回调处理
        if (true == $result) {
            $status = 1;
            $message = '恭喜, 更新成功~~';
        }
        return ['status'=>$status, 'message'=>$message];
    }



  public function teacherAdd(){

        
       $this->view->assign('gradeList',\app\index\model\Grade::all());
     return $this -> fetch('teacher-add');

        }




         public function doAdd(Request $request){

        
       $data = $request -> param();
        $status = 0;
        $message = '添加失败';
            $user= TeacherModel::create($data);
            if ($user) {
                $status = 1;
                $message = '添加成功~~';
            }
           //将班级表中所有数据赋值给当前模板
       
     return ['status'=>$status, 'message'=>$message];
        }



   public function deleteTeacher(Request $request){

       
 $id = $request -> param('id');
                   TeacherModel::update(['is_delete'=>1],['id'=>$id]);

                  $user=TeacherModel::destroy($id);


    }


     public  function unDelete(Request $request){

                 TeacherModel::update(['delete_time'=>null],['is_delete'=>1]);
          }

}