<?php
namespace app\index\model;
use think\Model;
use traits\model\SoftDelete;
class User extends Model{

   use SoftDelete;
    protected $deleteTime = 'delete_time';


    //保存自动完成列表
   protected $auto=[

       'delete_time'=>Null,
       'is_delete'=>1,
    ];

    //新增自动完成列表

     protected $insert=[

       'login_time'=>Null,
       'login_count'=>0,
    ];
 //更新自动完成列
     protected $update=[];
      //是否要自动写入时间戳 如果设置字符串表示时间字段的类型
     protected $autoWriteTimestamp=true;//自动写入

//创建时间字段
     protected $createTime= 'create_time';
      protected $updateTime= 'update_time';
//时间字段取出后的默认时间格式
      protected $dateFormat= 'Y年m月d日';


  public function getRoleAttr($value)
  {
  	//数据表中角色字段:role返回值处理

  	$role=[

     0=>'管理员',
     1=>'超级管理员'
  	];
  	return $role[$value];
  }

    public function getStatusAttr($value)
  {
  	//数据表中角色字段:role返回值处理
  	
  	$Status=[

     0=>'已停用',
     1=>'已启用'
  	];
  	return $Status[$value];
  }


}