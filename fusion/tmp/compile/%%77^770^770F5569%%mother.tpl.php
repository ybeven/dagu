<?php /* Smarty version 2.6.26, created on 2014-12-09 22:22:10
         compiled from mother.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'acquire', 'mother.tpl', 59, false),array('function', 'crumb', 'mother.tpl', 173, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $this->_tpl_vars['__htmlTitle']; ?>
</title>
<link rel='stylesheet' href='/css/table.css' type="text/css" />
<link rel='stylesheet' href='/css/jquery-ui-1.8.16.custom.css' type="text/css" />
<link rel='stylesheet' href='/css/style.css' type="text/css" />
<?php echo $this->_tpl_vars['__css']; ?>

<script src="/js/jquery-1.6.2.min.js" type="text/javascript"></script>
<script src="/js/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
<script type="text/javascript">
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../webroot/js/jqueryui.js", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</script>
<script src="/js/jquery.ui.datepicker-zh-CN.js" type="text/javascript"></script>
<script src="/js/table.js" type="text/javascript"></script>
<script language="javascript" type="text/javascript" src="/js/json.js"></script>
<script language="javascript" type="text/javascript" src="/js/main.js"></script>
<script src="/js/time.js" type="text/javascript"></script>
<script type="text/javascript" src="/static/js/util.js"> </script>
<script type="text/javascript" src="/static/js/js/highcharts.js"> </script>
<script type="text/javascript" src="/static/js/formatjson.js"></script>
<script type="text/javascript" src="/static/js/js/modules/exporting.js"> </script>
<script type="text/javascript" src="/static/js/query.js"> </script>
<script type="text/javascript" src="/static/js/chart.js"> </script>
<?php echo $this->_tpl_vars['__script']; ?>

<?php if ($this->_tpl_vars['notice']): ?><script type="text/javascript">alert("<?php echo $this->_tpl_vars['notice']; ?>
");</script><?php endif; ?>
</head>

<body>
<div id='container'>
	<div id='header'>
    	<div class='Logo'></div>
        <div class="loginInfo">
        	<div class="time">
                <!--<div class="time1">2011年8月27日</div>
                <div class="time1">今天是</div>-->
                <!--<div class="time2">14:20:52</div>-->
                <div id="time">
                	<script language="javascript"> showtime();</script>
                </div>
            </div>
            <div class="welcome">
		<div class="name1">|&nbsp;&nbsp;<a href="/system/logout">退出</a></div>
                <div class="name1">登录</div>
                <div class="name2"><?php echo $this->_tpl_vars['curUser']['name']; ?>
</div>
            	<div class="name1">欢迎</div>
            </div>
        </div>
        <div class='navhead'></div>
    </div>
    <div id='main'>
    	<div id='left'>
        	<div id='box'>
        		<div id='accordion'>
					<div>
						<h3><a>原始成绩导入</a></h3>
						<div>	
							<?php $this->_tag_stack[] = array('acquire', array('action' => '申报信息管理','visitor' => $this->_tpl_vars['curUser'])); $_block_repeat=true;smarty_block_acquire($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
							<div class="link"><a href="/predata/AddPreData">总体成绩导入</a></div>
							<div class="link"><a href="/predata/AddPreData1">西安考点导入</a></div>
							<div class="link"><a href="/predata/AddPreData2">咸阳考点导入</a></div>
							<div class="link"><a href="/predata/AddPreData3">宝鸡考点导入</a></div>
							<div class="link"><a href="/predata/AddPreData4">铜川考点导入</a></div>
							<div class="link"><a href="/predata/AddPreData5">延安考点导入</a></div>
							<div class="link"><a href="/predata/AddPreData6">榆林考点导入</a></div>
							<div class="link"><a href="/predata/AddPreData7">商洛考点导入</a></div>
							<div class="link"><a href="/predata/AddPreData8">渭南考点导入</a></div>
							<div class="link"><a href="/predata/AddPreData9">安康考点导入</a></div>
							<div class="link"><a href="/predata/AddPreData10">汉中考点导入</a></div>
							<div class="link"><a href="/predata/AddPreData11">杨凌考点导入</a></div>
							<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_acquire($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>								
						</div>
					</div>
					<div>
						<h3><a>需要修改成绩人员导入</a></h3>
						<div>	
							<?php $this->_tag_stack[] = array('acquire', array('action' => '申报信息管理','visitor' => $this->_tpl_vars['curUser'])); $_block_repeat=true;smarty_block_acquire($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
							<div class="link"><a href="/alterdata/AddAlterData2">按照准考证方式</a></div>
							<div class="link"><a href="/alterdata/AddAlterData">按照身份证、考试科目方式</a></div>
							<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_acquire($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>								
						</div>
					</div>
					<!-- <div>
						<h3><a>规划项目管理</a></h3>
						<div>	
							<?php $this->_tag_stack[] = array('acquire', array('action' => '规划信息管理','visitor' => $this->_tpl_vars['curUser'])); $_block_repeat=true;smarty_block_acquire($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
							<div class="link"><a href="/minedata/ChooseMineData">添加规划项目</a></div>
							<div class="link"><a href="/minedata/ListMineData">查看规划项目</a></div>	
							<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_acquire($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>								
						</div>
					</div>
					<div>
						<h3><a>专家信息管理</a></h3>
						<div>
							<?php $this->_tag_stack[] = array('acquire', array('action' => '专家信息管理','visitor' => $this->_tpl_vars['curUser'])); $_block_repeat=true;smarty_block_acquire($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
							<div class="link"><a href="/expert/ExpertInfo">专家信息管理</a></div>
							<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_acquire($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
						</div>
					</div> -->

					<div>
						<h3><a>成绩查询</a></h3>
						<div>
							<?php $this->_tag_stack[] = array('acquire', array('action' => '项目信息查询','visitor' => $this->_tpl_vars['curUser'])); $_block_repeat=true;smarty_block_acquire($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
							<div class="link"><a href="/predata/SearchPreData/1">导入成绩查询</a></div>
							<div class="link"><a href="/predata/SearchPreDataDetails/1">根据准考证号查询</a></div>
							<div class="link"><a href="/predata/SearchPreDataDetails2/1">根据身份证考试科目</a></div>
							<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_acquire($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
						</div>
					</div>

					<div>
						<h3><a>修改成绩</a></h3>
						<div>	
							<?php $this->_tag_stack[] = array('acquire', array('action' => '申报信息管理','visitor' => $this->_tpl_vars['curUser'])); $_block_repeat=true;smarty_block_acquire($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
							<div class="link"><a href="/alterdata/AlterData">更改数据</a></div>
							<!-- <div class="link"><a href="/alterdata/AddAlterData">按照身份证、考试科目方式</a></div> -->
							<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_acquire($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>								
						</div>
					</div>

					<!-- <?php $this->_tag_stack[] = array('acquire', array('action' => '地图管理','visitor' => $this->_tpl_vars['curUser'])); $_block_repeat=true;smarty_block_acquire($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?> -->
					<!-- <div>
						<h3><a>Gis地图管理</a></h3>
						<div>
							<div class="link"><a href="/start">甘肃省</a></div>
							<div class="link"><a href="/gis/citygis">各市区地图</a></div>
						</div>
						
						 <div>
										
							<div class="link"><a href="/HC/AddTrainPlan">点选查询</a></div>
							<div class="link"><a href="/HC/ListTrainMainApply">拉框查询</a></div>
							<div class="link"><a href="/HC/ListTrainNotice">单点坐标查询</a></div>
							<div class="link"><a href="/HC/ListTrainInfo">多点坐标查询</a></div>
							<div class="link"><a href="/HC/ListTrainDetail">模糊查询</a></div>
							
						</div>
						
					</div> -->
					<!-- <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_acquire($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?> -->
					<div>
						<h3><a>数据统计管理</a></h3>
						<div>
							<?php $this->_tag_stack[] = array('acquire', array('action' => '数据统计管理','visitor' => $this->_tpl_vars['curUser'])); $_block_repeat=true;smarty_block_acquire($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
							<div class="link"><a href="/gragh/search">原始成绩统计</a></div>
							<div class="link"><a href="/gragh/minerals">矿种为基准统计</a></div>
							<div class="link"><a href="/gragh/times">时间为基准统计</a></div>
							<div class="link"><a href="/gragh/compare">实际和规划对比</a></div>
							<div class="link"><a href="/gragh/mineRatio">全省矿山统计</a></div>
							<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_acquire($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
						</div>
					</div>							
					<div>
						<h3><a>系统管理</a></h3>
						<div>
							<?php $this->_tag_stack[] = array('acquire', array('action' => '系统管理','visitor' => $this->_tpl_vars['curUser'])); $_block_repeat=true;smarty_block_acquire($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>						
							<div class="link"><a href="/system/manageUser">用户管理</a></div>
							<!-- <div class="link"><a href="/system/manageRole">角色权限管理</a></div> -->
							<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_acquire($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
							<div class="link"><a href="/system/changePwd">密码修改</a></div>
							<!-- <div class="link"><a href="/system/dataCount">基本数据项统计</a></div>
							<div class="link"><a href="/system/ThreePersent">三率标准维护</a></div> -->

						</div>
					</div>
				</div>
			</div>
        </div>
    	<div id='right'>
        	<div id='window'>
        		<div id='guide'><?php echo smarty_function_crumb(array(), $this);?>

                </div>
                <div id='detail'>
                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['childTpl'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                </div>
            </div>
        </div>
    </div>
    <div id='footer'></div>
    <div class="block"></div>
</div>
</body>
</html>