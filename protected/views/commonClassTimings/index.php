<?php 
/**
 * Ajax Crud Administration
 * ClassTimings * index.php view file
 * InfoWebSphere {@link http://libkal.gr/infowebsphere}
 * @author  Spiros Kabasakalis <kabasakalis@gmail.com>
 * @link http://reverbnation.com/spiroskabasakalis/
 * @copyright Copyright &copy; 2011-2012 Spiros Kabasakalis
 * @since 1.0
 * @ver 1.3
 * @license The MIT License
 */
?><?php
$this->breadcrumbs=array(
 Yii::t('app','Settings')=>array('/configurations'),
 Yii::t('app','Manage Common Class Timings')
);
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">
<div id="othleft-sidebar">
<?php $this->renderPartial('//configurations/left_side');?>
  </div>
 </td>
 <td valign="top">
<div class="cont_right formWrapper">  
<h1><?php echo Yii::t('app','Manage Common Class Timings'); ?></h1>
<div class="button-bg">
<div class="top-hed-btn-left"> </div>
<div class="top-hed-btn-right">
<ul>    
        <li><?php echo CHtml::link('<span>'.Yii::t('app','Create Common Class Timings').'</span>', array('create'), array('class'=>'a_tag-btn')); ?></li>
    </ul>
</div>
</div>
<?php  
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('class-timings-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php
Yii::app()->clientScript->registerScript(
	'myHideEffect',
	'$(".flashMessage").animate({opacity: 1.0}, 3000).fadeOut("slow");',
	CClientScript::POS_READY
);
?>
<?php
/* Success Message */
if(Yii::app()->user->hasFlash('success')): 
?>
	<div class="flashMessage" style="background:#FFF; color:#C00; padding-left:200px; font-size:16px">
	<?php echo Yii::app()->user->getFlash('success'); ?>
	</div>
<?php endif;
 /* End Success Message */
?>


<?php
//Strings for the delete confirmation dialog.
$del_con = Yii::t('app', 'Are you sure you want to delete this class timing?');
$del_title=Yii::t('app', 'Delete Confirmation');
 $del=Yii::t('app', 'Delete');
 $cancel=Yii::t('app', 'Cancel');
   ?>
<?php
    $this->widget('zii.widgets.grid.CGridView', array(
         'id' => 'class-timings-grid',
         'dataProvider' => $model->search(),
         'pager'=>array('cssFile'=>Yii::app()->baseUrl.'/css/formstyle.css'),
         'cssFile' => Yii::app()->baseUrl . '/css/formstyle.css',
         'htmlOptions'=>array('class'=>'grid-view clear'),
          'columns' => array(          		
		'name',
		'start_time',
		'end_time',
		array(
			'name'=>'is_break',
			'value'=>'$data->is_break ? "'.Yii::t('app','Yes').'" : "'.Yii::t('app','No').'"'
		),
		
    array(
					'header' => Yii::t('app','Action'),					
                   'class' => 'CButtonColumn',
                    'buttons' => array(
                                                     'class-timings_delete' => array(
                                                     'label' => Yii::t('app', 'Delete'), // text label of the button
                                                      'url' => '$data->id', // a PHP expression for generating the URL of the button
                                                      'imageUrl' =>Yii::app()->request->baseUrl .'/js_plugins/ajaxform/images/icons/cross.png', // image URL of the button.   If not set or false, a text link is used
                                                      'options' => array("class" => "fan_del", 'title' => Yii::t('app', 'Delete')), // HTML options for the button   tag
                                                      ),
                                                     'update' => array(
                                                     'label' => Yii::t('app', 'Update'), // text label of the button
                                                     'url'=>'Yii::app()->createUrl("commonClassTimings/update", array("id"=>$data->id))',
                                                     
                                                     'options' => array('title' => Yii::t('app', 'Update')), // HTML options for the    button tag
                                                        ),
                                                     'class-timings_view' => array(
                                                      'label' => Yii::t('app', 'View'), // text label of the button
                                                      'url' => '$data->id', // a PHP expression for generating the URL of the button
                                                      'imageUrl' =>Yii::app()->request->baseUrl .'/js_plugins/ajaxform/images/icons/properties.png', // image URL of the button.   If not set or false, a text link is used
                                                      'options' => array("class" => "fan_view", 'title' => Yii::t('app', 'View')), // HTML options for the    button tag
                                                        ),
                       
                                                    ),
                   'template' => '{update}{class-timings_delete}',
            ),
    ),
           'afterAjaxUpdate'=>'js:function(id,data){$.bind_crud()}'

                                            ));


   ?>
<script type="text/javascript">
//document ready
$(function() {

    //declaring the function that will bind behaviors to the gridview buttons,
    //also applied after an ajax update of the gridview.(see 'afterAjaxUpdate' attribute of gridview).
        $. bind_crud= function(){
            
 //VIEW

    $('.fan_view').each(function(index) {
        var id = $(this).attr('href');
        $(this).bind('click', function() {
            $.ajax({
                type: "POST",
                url: "<?php echo Yii::app()->request->baseUrl;?>/index.php?r=commonClassTimings/returnView",
                data:{"id":id,"YII_CSRF_TOKEN":"<?php echo Yii::app()->request->csrfToken;?>"},
                beforeSend : function() {
                    $("#class-timings-grid").addClass("ajax-sending");
                },
                complete : function() {
                    $("#class-timings-grid").removeClass("ajax-sending");
                },
                success: function(data) {
                    $.fancybox(data,
                            {    "transitionIn" : "elastic",
                                "transitionOut" :"elastic",
                                "speedIn"              : 600,
                                "speedOut"         : 200,
                                "overlayShow"  : false,
                                "hideOnContentClick": false
                            });//fancybox
                    //  console.log(data);
                } //success
            });//ajax
            return false;
        });
    });


// DELETE

    var deletes = new Array();
    var dialogs = new Array();
    $('.fan_del').each(function(index) {
        var id = $(this).attr('href');
        deletes[id] = function() {
            $.ajax({
                type: "POST",
                url: "<?php echo Yii::app()->request->baseUrl;?>/index.php?r=commonClassTimings/ajax_delete",
                data:{"id":id,"YII_CSRF_TOKEN":"<?php echo Yii::app()->request->csrfToken;?>"},
                    beforeSend : function() {
                    $("#class-timings-grid").addClass("ajax-sending");
                },
                complete : function() {
                    $("#class-timings-grid").removeClass("ajax-sending");
                },
                success: function(data) {
                    var res = jQuery.parseJSON(data);
					window.location.reload();
                     /*var page=$("li.selected  > a").text();
                    $.fn.yiiGridView.update('class-timings-grid', {url:'',data:{"ClassTimings_page":page}});*/
                }//success
            });//ajax
        };//end of deletes

        dialogs[id] =
                        $('<div style="text-align:center;"></div>')
                        .html('<?php echo  $del_con; ?><br><br>' + '<h2 style="color:#999999"></h2>')
                       .dialog(
                        {
                            autoOpen: false,
                            title: '<?php echo  $del_title; ?>',
                            modal:true,
                            resizable:false,
                            buttons: [
                                {
                                    text: "<?php echo  $del; ?>",
                                    click: function() {
                                                                      deletes[id]();
                                                                      $(this).dialog("close");
                                                                      }
                                },
                                {
                                   text: "<?php echo $cancel; ?>",
                                   click: function() {
                                                                     $(this).dialog("close");
                                                                     }
                                }
                            ]
                        }
                );

        $(this).bind('click', function() {
                                                                      dialogs[id].dialog('open');
                                                                       // prevent the default action, e.g., following a link
                                                                      return false;
                                                                     });
    });//each end

        }//bind_crud end

   //apply   $. bind_crud();
  $. bind_crud();


})//document ready
    
</script>
