<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<?php  if(IMS_VERSION<1) { ?>
<link href="<?php echo MODULE_URL;?>/template/static/css/wq1.0.css" rel="stylesheet">
<?php  } ?>
<style>

.audit,.lock,.clearposter{cursor:pointer;}
.table>thead>tr>td, .table>tbody>tr>td, .table>tfoot>tr>td{
white-space: normal;
word-wrap: break-word;
word-break: normal;
}
.label {
    line-height: 1.8;
}
.MagicThumb img,.MagicThumb-container img{margin:2px;padding:1px;border:1px solid #ccc;}
.label{margin:3px 0;}
.we7-margin-right{margin-right: 10px;}
</style>
<script src="<?php echo MODULE_URL;?>/template/static/js/mzp-packed-me.js"></script>
<div class="main1">

    <div class="we7-page-title">投票管理</div>
    <ul class="we7-page-tab">
         <li<?php  if($_GPC['ty'] == '' && $_GPC['do'] == 'votelist' && $_GPC['ranking'] == ''  ) { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('votelist',array('rid'=>$_GPC['rid']));?>">全部投票</a></li>
    <li<?php  if($_GPC['ty'] == '2') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('votelist',array('rid'=>$_GPC['rid'],'ty'=>2));?>">待审核</a></li>
	<li<?php  if($_GPC['ty'] == '1') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('votelist',array('rid'=>$_GPC['rid'],'ty'=>1));?>">已审核</a></li>
	<li<?php  if($_GPC['ranking'] == '0') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('votelist',array('rid'=>$_GPC['rid'],'ranking'=>0));?>">票数排行</a></li>
	<li<?php  if($_GPC['ranking'] == '1') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('votelist',array('rid'=>$_GPC['rid'],'ranking'=>1));?>">礼物排行</a></li>
	<li<?php  if($_GPC['do'] == 'giftlist') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('giftlist',array('rid'=>$_GPC['rid']));?>">全部订单</a></li>
	<li<?php  if($_GPC['do'] == 'votedata') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('edit',array('id'=>$_GPC['id'],'rid'=>$_GPC['rid']));?>"><?php  if($_GPC['id'] > 0) { ?>编辑投票用户<?php  } else { ?>添加投票用户<?php  } ?></a></li>



    </ul>

    <div class="we7-padding-bottom clearfix">
        <form action="./index.php" method="get" role="form" >
            <div class="input-group pull-left col-sm-4">
            <input type="hidden" name="c" value="site" />
			<input type="hidden" name="a" value="entry" />
        	<input type="hidden" name="m" value="tyzm_diamondvote" />
        	<input type="hidden" name="do" value="votelist" />
			<input type="hidden" name="rid" value="<?php  echo $_GPC['rid'];?>" />

            <input type="text" name="keyword" value="<?php  echo $keyword;?>" class="form-control" placeholder="输入姓名，手机号或ID"/>
            <span class="input-group-btn"><button class="btn btn-default"><i class="fa fa-search"></i></button></span>
            </div>
        </form>
        <div class="pull-right">
        <a href="<?php  echo $this->createWebUrl('uploadvote',array('rid'=>$_GPC['rid']));?>" class="btn btn-primary  we7-margin-left">+批量导入用户</a>
            <a href="<?php  echo $this->createWebUrl('edit',array('rid'=>$_GPC['rid']));?>" class="btn btn-primary  we7-margin-left">+添加投票用户</a>
            <a href="<?php  echo $this->createWebUrl('download',array('rid'=>$_GPC['rid']));?>" class="btn btn-primary  we7-margin-left">导出用户数据</a>
        </div>
    </div>
        <table class="table we7-table table-hover">
            <thead class="navbar-inner">
                <tr>
				<th style="width:30px;">审?</th>
				<th  width="60">用户</th>	
                <th>用户信息</th>										
                <th>图片</th>										
				<th  width="125">数据</th>
				<th width="95">参加时间</th>
                <th width="95">状态</th>
                <th width="130">操作</th>
                </tr>
            </thead>
            <tbody>
                <?php  if(is_array($list)) { foreach($list as $row) { ?>
                <tr>
                    <td  class="text-left vertical-middle"><input type="checkbox" name="uid[]" value="<?php  echo $row['id'];?>" class=""><?php  echo $row['id'];?></td>
					<td  class="text-left vertical-middle"><img src="<?php  echo tomedia($row['avatar']);?>" width="48"><br /><?php  echo $row['nickname'];?>
<br>
编号：<?php  echo $row['noid'];?>
<br>


					</td>
					

					<td class="text-left vertical-middle" style="max-width:180px;display: inline-block; overflow-x: auto;">
					<p>姓名：<span class="label label-success"><?php  echo $row['name'];?></span></p>
					<p>宣言：<span class="label label-default"><?php  echo $row['introduction'];?></span></p>
					 <?php  if(is_array($row['joindata'])) { foreach($row['joindata'] as $join) { ?>
					 <p >
					     <?php  if($join['name']=="性别") { ?>
						    <?php  echo $join['name'];?>：<span class="label label-default">
						    <?php  if($join['val']==2) { ?>
							  女
							<?php  } else { ?>
							  男
							<?php  } ?>(<?php  echo $join['val'];?>)
							</span><br>
						 <?php  } else { ?>

						    <?php  echo $join['name'];?>：<span class="label label-default" ><?php  echo $join['val'];?></span><br/>
						 <?php  } ?>
					 </p>
					 <?php  } } ?>
					</td>										
                    <td  class="text-left vertical-middle">
					<a  href="<?php  echo tomedia($row['img1']);?>" class=" MagicThumb">
					<img src="<?php  echo tomedia($row['img1']);?>" width="48"></a>
					<?php  if($row['img2']!="") { ?><a  href="<?php  echo tomedia($row['img2']);?>" class=" MagicThumb"><img src="<?php  echo tomedia($row['img2']);?>" width="48"></a><?php  } ?>
					<?php  if($row['img3']!="") { ?><a  href="<?php  echo tomedia($row['img3']);?>" class=" MagicThumb"><img src="<?php  echo tomedia($row['img3']);?>" width="48"></a><?php  } ?>
					<?php  if($row['img4']!="") { ?><a  href="<?php  echo tomedia($row['img4']);?>" class=" MagicThumb"><img src="<?php  echo tomedia($row['img4']);?>" width="48"></a><?php  } ?>
					<?php  if($row['img5']!="") { ?><a  href="<?php  echo tomedia($row['img5']);?>" class=" MagicThumb"><img src="<?php  echo tomedia($row['img5']);?>" width="48"></a><?php  } ?>
					
					</td>
	                <td class="text-left vertical-middle">
<p>
	                票数：<span class="label label-primary"><?php  echo $row['votenum'];?></span>
</p><p>
	                礼物：<span class="label label-success"><?php  echo $row['giftcount'];?>元</span>
</p><p>
	                浏览：<span class="label label-info"><?php  echo $row['pvtotal'];?></span>
</p><p>
	                分享：<span class="label label-warning"><?php  echo $row['sharetotal'];?></span>
</p>
	                </td>
					<td class="text-left vertical-middle"><?php  echo date('Y-m-d H:i:s',$row['createtime'])?></td>
                    <td class="text-left vertical-middle">
                    <p>
                    <?php  if($row['status']==0) { ?><span class="label label-info audit" data-id="<?php  echo $row['id'];?>" data-s="1">待审核</span> <?php  } else if($row['status']==1) { ?><span class="label label-success audit" data-id="<?php  echo $row['id'];?>" data-s="0">已审核</span><?php  } ?>
					</p>
					<p>
					<?php  if($row['locktime']>time() ) { ?><span class="label label-danger lock" data-id="<?php  echo $row['id'];?>" data-s="1" title="点击解锁">已锁定</span> <?php  } else if($row['locktime']<time()) { ?><span class="label label-success lock" data-id="<?php  echo $row['id'];?>" data-s="0"title="点击锁定">非锁定</span><?php  } ?>
					</p>
					<p>
					<span class="label label-danger clearposter" data-id="<?php  echo $row['id'];?>" title="点击清除个人海报"title="点击锁定">清除海报</span>
					</p>
					<p>
					</td>
                    <td  class="text-left vertical-middle">
					<p>
					<a class="color-default we7-margin-right" title="投票数据" href="<?php  echo $this->createWebUrl('votedata',array('rid'=>$row['rid'],'id'=>$row['id'],'ty'=>'votenum'))?>" ><i class="fa fa-star-o"></i> 投票数据</a>
					</p><p>
					<a class="color-default we7-margin-right" title="钻石数据" href="<?php  echo $this->createWebUrl('giftlist',array('rid'=>$row['rid'],'id'=>$row['id']))?>" ><i class="fa fa-codepen"></i> 礼物订单</a>
					</p><p>
					<a class="color-default we7-margin-right" title="编辑" href="<?php  echo $this->createWebUrl('edit',array('rid'=>$row['rid'],'id'=>$row['id']))?>" ><i class="fa fa-edit"></i> 编辑</a>
					</p><p>
					
					<a class="color-default we7-margin-right" rel="tooltip" href="#" onclick="drop_confirm('您确定要删除吗?删除不可恢复，同时删除所有相关数据！', '<?php  echo $this->createWebUrl('otherset',array('ty'=>'deletevoteuser','id'=>$row['id'],'rid'=>$row['rid']))?>');" title="删除"><i class="fa fa-times"></i> 删除</a></p>
                    </td>
                </tr>
                <?php  } } ?>
				<tr>
			<td><input type="checkbox" name="" onclick="var ck = this.checked;$(':checkbox').each(function(){this.checked = ck});"></td>
			<td colspan="7"><input type="hidden" name="isstatus" class="btn btn-primary" value="审核"></td>
		</tr>
            </tbody>
        </table>
      <div class="pull-right">
        <?php  echo $pager;?>
    </div>
</div>
<script>
$(function(){

            $(".check_all").click(function(){
            var checked = $(this).get(0).checked;
                    $("input[type=checkbox]").attr("checked", checked);
            });
            $("input[name=isstatus]").click(function(){

				var check = $("input:checked");
						if (check.length < 1){
				err('请选择要删除的记录!');
						return false;
				}
				if (confirm("确认要删除选择的记录?")){
				var id = new Array();
						check.each(function(i){
						id[i] = $(this).val();
						});
						$.post('<?php  echo create_url('site/entry', array('do' => 'otherset','rid' => $_GPC["rid"],'ty' => 'statusAll', 'm' => 'tyzm_diamondvote'))?>', {idArr:id}, function(data){
						if (data.errno == 0)
						{
						    location.reload();
						} else {
						    alert(data.error);
						}
						}, 'json');
				}

            });
			
			

$(".audit").click(function(){
    var clickthis=$(this);
    var did=clickthis.attr('data-id');
	var audit=clickthis.attr('data-s');
	$.ajax({
		type : "post",
		url : "<?php  echo $this->createWebUrl('otherset',array('rid'=>$_GPC['rid'],'ty'=>'audit'))?>",
		data : {
			id : did,
			audit : audit,
		},
		dataType : "json",
		success : function(res) {
			if (res.status == 200) {
			    clickthis.attr('data-s',(1-audit));
				if(clickthis.hasClass('label-success')){
				    clickthis.removeClass("label-success");
                    clickthis.addClass('label-info');
					clickthis.html('待审核');
                }else{
				    clickthis.removeClass("label-info");
				    clickthis.addClass('label-success');
					clickthis.html('已审核');
				}
			}
		}

	});
});		
			

$(".lock").click(function(){
    var clickthis=$(this);
    var did=clickthis.attr('data-id');
	var lock=clickthis.attr('data-s');
	$.ajax({
		type : "post",
		url : "<?php  echo $this->createWebUrl('otherset',array('rid'=>$_GPC['rid'],'ty'=>'lock'))?>",
		data : {
			id : did,
			lock : lock,
		},
		dataType : "json",
		success : function(res) {
			if (res.status == 200) {
			    clickthis.attr('data-s',(1-lock));
				if(clickthis.hasClass('label-success')){
				    clickthis.removeClass("label-success");
                    clickthis.addClass('label-danger');
					clickthis.html('已锁定');
                }else{
				    clickthis.removeClass("label-danger");
				    clickthis.addClass('label-success');
					clickthis.html('非锁定');
				}
			}
		}

	});
});	

$(".clearposter").click(function(){
    var clickthis=$(this);
    var did=clickthis.attr('data-id');
	$.ajax({
		type : "post",
		url : "<?php  echo $this->createWebUrl('otherset',array('rid'=>$_GPC['rid'],'ty'=>'clearposter'))?>",
		data : {
			id : did
		},
		dataType : "json",
		success : function(res) {
			if (res.status == 200) {
			    alert("清除成功，可以重新生成！");
			}else if(res.status == 404){
			    alert("该用户还没有生成海报。");
			}else{
			     alert("删除失败，请检查是否有删除权限！");
			}
		}

	});
});	

	
			
});


</script>
<script>
            function drop_confirm(msg, url){
            if (confirm(msg)){
            window.location = url;
            }
            }

</script>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>