<?php

return array(

	'UID'					=> '帐户ID',
	'SEARCHTYPE'			=> '综合',
	'UNAME'					=> '用户名',
	'PUNAME'				=> '推荐人',
	'NICKNAME'				=> '用户昵称',
	'REAL_NAME'				=> '真实姓名',
	'SEX'					=> '性别',
	'SEX1' 					=> '男',
	'SEX2' 					=> '女',
	'SEX0' 					=> '保密',
	'USER_GROUP'			=> '用户组',
	'PASSWORD'				=> '登陆密码',
	'PASSWORD2'				=> '二级密码',
	'PASSWORD3'				=> '三级密码',
	'USER_STATUS'   		=> '用户状态',
	'NORMAL'				=> '正常',
	'LOCK'					=> '锁定',
	'AUDIT'					=> '未开通',
	'AUDIT_USER'    		=> '未开通用户',
	'NORMAL_USER'   		=> '正常用户',
	'LOCK_USER'     		=> '锁定用户',
	'COMPANY'				=> '工作单位',
	'JOB'					=> '工作职务',
	'INCOME'				=> '收入水平',
	'EMAIL'					=> '邮箱地址',
	'REGION'				=> '所在地区',
	'ADDRESS'				=> '详细地址',
	'TEL'					=> '联系电话',
	'MOBILE'				=> '手机号码',
	'QQ'					=> 'QQ',
    'ADD_TIME' 				=> '注册时间',
    'LAST_TIME' 			=> '上次登陆时间',
    'LAST_IP' 				=> '上次登陆IP',
    'LAST_ONLINE' 			=> '最后在线时间',
    'LOGIN_TIME' 			=> '登陆次数',
	
	'AUTH_EMAIL'			=> '验证邮箱',
	'AUTH_MOBILE'			=> '验证手机',
	'AUTH_IDCARD'			=> '身份证号',
	'IDCARD_VALIDITY'		=> '身份有效期',
	'IDCARD_STATUS'			=> '认证状态',
	'IDCARD_T' 				=> '认证时间',
	
	'UNAUTH'				=> '未认证',
	'AUDITING'				=> '审核中',
	'AUTH_PASS'				=> '已认证',
	'AUTH_FAILED'			=> '认证失败',
	'AUTH_EXPIRE'			=> '认证过期',
		
	'AUTH_BODY_PHOTO'		=> '身体免冠照',
	'AUTH_IDCARD_FACADE'	=> '身份证正面照',
	'AUTH_IDCARD_OBVERSE'	=> '身份证背面照',
		
	//认证失败原因数组
	'FAILURE_REASONS'   => array(
			'REASON1' => "信息不完整",
			'REASON2' => "身份证号有误",
			"REASON3" => "身体免冠照不清晰",
			"REASON4" => "身份证正面照不清晰",
			"REASON5" => "身份证反面照不清晰",
			"REASON6" => "真实姓名有误",
			"REASON7" => "其他原因"
	),
		
	'VIEW'					=> '查看',
	'AUTH_AUDIT'			=> '审核',
		
	'DATA_EMPTY'		=> '<tr><td colspan="20" align="center">未找到用户<b>%s</b>相关数据</td></tr>',
	'AUTH_EMPTY'		=> '<tr><td colspan="10" align="center"><span style="color:red">未找到任何证件照信息</span></td></tr>',
	'DELETE_OK' 		=> '成功删除信息!',
	'DELETE_ERROR' 		=> '删除信息出错!',
	'DO_EMPTY' 			=> '请勾选您要操作的用户!',
	'USER_NOT_FOUND' 	=> '未找到会员信息',

	'USER_LOCK'		=> '批量锁定',
	'USER_UNLOCK'	=> '批量解锁',
	'RECHARGE'		=> '充值',
);