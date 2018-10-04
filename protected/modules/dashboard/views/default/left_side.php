<?php 
$roles=Rights::getAssignedRoles(Yii::app()->user->Id); // check for single role
foreach($roles as $role)
	if(sizeof($roles)==1 and $role->name == 'parent')
	{
		$this->renderPartial('application.modules.parentportal.views.default.leftside');
	}
	else if(sizeof($roles)==1 and $role->name == 'student')
	{
		$this->renderPartial('application.modules.studentportal.views.default.leftside');
	}
	else if(sizeof($roles)==1 and $role->name == 'teacher')
	{
		$this->renderPartial('application.modules.teachersportal.views.default.leftside');
	}
	else
	{
	?>
	<div id="othleft-sidebar">
	<!--<div class="lsearch_bar">
	<input name="" type="text" class="lsearch_bar_left" value="Search" />
	<input name="" type="button" class="sbut" />
	<div class="clear"></div>
	</div>-->
	<h1><?php echo Yii::t('app','My Account'); ?></h1>  
	<?php
	function t($message, $category = 'cms', $params = array(), $source = null, $language = null) 
	{
	return $message;
	}
	$this->widget('zii.widgets.CMenu',array(
	'encodeLabel'=>false,
	'activateItems'=>true,
	'activeCssClass'=>'list_active',
	'items'=>array(
		//The Welcome Link
		//array('label'=>''.t('Welcome'),  'url'=>array('/message/index') ,'linkOptions'=>array('class'=>'menu_1' ), 'itemOptions'=>array('id'=>'menu_1') 
		//),
		
		
		// The MailBox Link
		array('label'=>Yii::t('app','Mailbox('.Yii::app()->getModule("mailbox")->getNewMsgs(Yii::app()->user->id).')<span>'.Yii::t('app','All Received Messages').'</span>'), 'url'=>array('/mailbox'),
		'active'=> ((Yii::app()->controller->module->id=='mailbox' and  Yii::app()->controller->id!='news') ? true : false),'linkOptions'=>array('class'=>'inbox_ico')),
		
		array('label'=>Yii::t('app','News').'<span>'.Yii::t('app','All Site News').'</span>', 'url'=>array('/mailbox/news'),
		'active'=> ((Yii::app()->controller->id=='news') ? true : false),'linkOptions'=>array('class'=>'news_ico')),
		
		array('label'=>Yii::t('app','Activity Feed').'<span>'.Yii::t('app','Track Activities').'</span>', 'url'=>array('/activityFeed/index'),
		'active'=> ((Yii::app()->controller->id=='activityFeed') ? true : false),'linkOptions'=>array('class'=>'news_ico')),
		
		/*array('label'=>t('Inbox ('.Yii::app()->getModule('message')->getCountUnreadedMessages(Yii::app()->user->getId()).')<span>All Received Messages</span>'), 'url'=>array('/message/inbox'),
		'active'=> ((Yii::app()->controller->action->id=='inbox') ? true : false),'linkOptions'=>array('class'=>'inbox_ico')),
		array('label'=>t('New Message<span>Create New Message</span>'), 'url'=>array('/message/compose'),
		'active'=> ((Yii::app()->controller->action->id=='compose') ? true : false),'linkOptions'=>array('class'=>'messgnew_ico')),
		array('label'=>t('Sent Items<span>All Sent Messages</span>'), 'url'=>array('/message/sent/sent'),
		'active'=> ((Yii::app()->controller->action->id=='sent') ? true : false),'linkOptions'=>array('class'=>'sentitem_ico')),*/
		
		
		//The Events Link
		//'label'=>''.t('Events'), 'url'=>'javascript:void(0);', 'itemOptions'=>array('id'=>'menu_2'),
		array('label'=>''.'<h1>'.Yii::t('app','Events').'</h1>',
		
		'active'=> ((Yii::app()->controller->module->id=='cal') ? true : false)),
		
		array('label'=>Yii::t('app','Events List').'<span>'.Yii::t('app','All Events').'</span>', 'url'=>array('/dashboard/default/event'),
		'active'=> ((Yii::app()->controller->module->id=='dashboard') ? true : false),'linkOptions'=>array('class'=>'evntlist_ico')),
		
		array('label'=>Yii::t('app','Calendar').'<span>'.Yii::t('app','Schedule Events').'</span>', 'url'=>array('/cal'),
		'active'=> ((Yii::app()->controller->module->id=='cal') ? true : false),'linkOptions'=>array('class'=>'cal_ico')),
		
		array('label'=>Yii::t('app','Event Types').'<span>'.Yii::t('app','Manage Event Types').'</span>', 'url'=>array('/cal/eventsType'),
			'active'=> ((Yii::app()->controller->id=='eventsType') ? true : false),'linkOptions'=>array('class'=>'evnttype_ico')),
		
		
		
		),
	));  
	?>
	</div>
	<?php
	}
	?>
<script type="text/javascript">
$(document).ready(function () {
	//Hide the second level menu
	$('#othleft-sidebar ul li ul').hide();            
	//Show the second level menu if an item inside it active
	$('li.list_active').parent("ul").show();
	
	$('#othleft-sidebar').children('ul').children('li').children('a').click(function () {                    
	
	if($(this).parent().children('ul').length>0){                  
		$(this).parent().children('ul').toggle();    
	}
	});	
});
</script>