<?php Yii::app()->clientScript->registerScriptFile(
				Yii::app()->assetManager->publish(
					Yii::getPathOfAlias('application.modules.notifications.assets') . '/js/ajaxupload/ajaxupload.js'
				)
			);
		
			Yii::app()->clientScript->registerScript('browseActionPath', 'var browseActionPath="' . $this->createUrl('/notifications/default/browsedata') . '"', CClientScript::POS_BEGIN);
		
			Yii::app()->clientScript->registerScriptFile(
				Yii::app()->assetManager->publish(
					Yii::getPathOfAlias('application.modules.notifications.assets') . '/js/ajaxupload/download.js'
				)
			); ?>

<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl;?>/css/tagsinput/jquery.tagsinput.css" />
<script src="<?php echo Yii::app()->request->baseUrl;?>/js/tagsinput/jquery.tagsinput.min.js"></script>
<script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="assets/ckeditor/adapters/jquery.js"></script>
<script type="text/javascript">
  window.parent.CKEDITOR.tools.callFunction(CKEditorFuncNum, 
    url, errorMessage);
</script>
<style type="text/css">

.left1{ float:left; padding:5px;}

.batches{ margin-right:10px;}

#all_batches{ margin-right:10px;}

table.spacer tr td{ padding:5px 0}
.spacer{ height:200px;
	overflow: auto;}

</style>
<?php 	$this->breadcrumbs=array(
		Yii::t('app','Notify'),
		Yii::t('app','Send Mail'),);
	
?>

 
 <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td width="247" valign="top" id="port-left">    
        	<?php $this->renderPartial('/default/left_side');?>    
        </td>
        <td valign="top">        
        	<table width="100%" cellspacing="0" cellpadding="0" border="0">
                <tbody><tr>
                    <td width="75%" valign="top">                                   
                    	<div  class="cont_right formWrapper">
    <h1><?php echo Yii::t('app','Send Email');?></h1> 
    <div class="formCon">
    <div class="formConInner">
    <div class="form left" style=" padding-left:20px">
    <?php
    $criteria = new CDbCriteria;
	$criteria->compare('id',$_GET['id']);
	$content = EmailDrafts::model()->find($criteria);
    
	$criteria = new CDbCriteria;
	$criteria->compare('mail_id',$_GET['id']); 
	$attachments = EmailAttachments::model()->findAll($criteria);
	
	$criteria = new CDbCriteria;
	$criteria->compare('mail_id',$_GET['id']);
    $user = EmailRecipients::model()->find($criteria);
	$users = explode(",",$user->users);
	$batches2 = explode(",",$user->batches);
        $email_list= $user->user_email;
	//echo $email_list;
	 ?>
        
        
    <?php 
	$form = $this->beginWidget('CActiveForm', array(
    'id' => 'draft-form',
    'enableAjaxValidation' => false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
    ));
	
	?>
         <table cellpadding="0">
    	<tr>
        	<td><h4><?php echo Yii::t('app','Enter Email Address');?></h4>            
            	<input name="recipients" id="recipients" style="width:700px" values="ffff,ffffsss" />
                <div class="sent_clear" id="clear_number_box"><a href="javascript:void(0);"><?php echo Yii::t('app', 'Clear');?></a></div>
                <div class="sent_file_bg">
                
                <ul>
               		<li>
               		 <?php echo Yii::t('app','Upload Contact');?>
               		     <span class="sub_text">.csv / .xls <?php echo Yii::t('app', 'file');?></span>
           		     
               		</li>
                 	<li>
                            <a href="javascript:void(0);" id="browse_from_file">
                                <span><?php echo Yii::t('app','File');?></span></a></li>
                </ul>
                <div class="clear"></div>
                <div id="browse_resp" class="upload_con"></div>
                </div>
                
                
                 <div class="sent_file_bg" style=" margin-left:17px;">
                
                <ul>
               		<li><?php echo Yii::t('app','Add Contacts');?>
                    	<span class="sub_text"><?php echo Yii::t('app','Add your contacts');?></span>
                    </li>
                    
                 	<li><a href="javascript:void(0);" class="browse_assets" data-target="#add_contacts" id="browse_from_contacts"><span><?php echo Yii::t('app','Contacts');?></span></a></li>
                </ul>
                <div class="clear"></div>
                </div>
                <div class="clear"></div>
                <div id="add_contacts" class="assets_contents" style="display:none;"></div>
                
                <div class="sent_file_bg">
                
                <ul>
               		<li><?php echo Yii::t('app', 'Select Group');?>
                    	<span class="sub_text"><?php echo Yii::t('app', 'Select your group');?></span>
                    </li>
                 	<li><a href="javascript:void(0);" class="browse_assets" data-target="#add_groups" id="browse_from_groups"><span><?php echo Yii::t('app','Group');?></span></a></li>
                </ul>
                <div class="clear"></div>
                </div>
              
                
<!--                <div class="sent_file_bg" style=" margin-left:17px;">
                
                <ul>
               		<li><?php //echo Yii::t('app','Use Templates');?>
                    	<span class="sub_text"><?php //echo Yii::t('app','Sms templates');?></span>
                    </li>
                 	<li><a href="javascript:void(0);" class="browse_assets" data-target="#add_templates" id="select_templates"><span><?php echo Yii::t('app','Templates');?></span></a></li>
                </ul>
                <div class="clear"></div>
                </div>-->
                <div class="clear"></div>
                <div id="add_templates" style="display:none; padding:15px 20px 6px;" class="sent_table_temp assets_contents"></div>
                <div id="add_groups" class="assets_contents" style="display:none;"></div>
                <div></div>
            </td>
        </tr>
        <tr>
        	<td>
            	
            	
            </td>
        </tr>
        
        
    </table>
    <table cellpadding="0">
    	<!--<tr>
        	<td><h4><?php /*echo Yii::t('settings','Enter email address');*/?></h4>            
            	<input name="recipients" id="recipients" style="width:700px" />
                <div class="sent_clear" id="clear_number_box"><a href="javascript:void(0);">Clear</a></div>
           
            </td>
        </tr>-->
        <tr><td>&nbsp;<td></tr>
        
        <tr>
        	<td>
           		<h3><?php echo Yii::t('app', 'Select Recipients');?></h3>
            </td>
        </tr>
        <tr><td>&nbsp;<td></tr>
        <tr>
        	<td>
            <input type="checkbox" name="user[]" id="all_users" <?php if(in_array("a",$users)){ ?> checked= "checked" <?php } ?>value="a"><?php echo Yii::t('app', 'All Users');?>
            <input type="checkbox" class="users" name="user[]" <?php if(in_array("1",$users)){ ?> checked= "checked" <?php } ?>id="teacher" value="1"><?php echo Yii::t('app', 'Teachers');?>
			<input type="checkbox" class="users" name="user[]" <?php if(in_array("2",$users)){ ?> checked= "checked" <?php } ?>id="parent" value="2"><?php echo Yii::t('app', 'Parents');?>
            <input type="checkbox" class="users" name="user[]" <?php if(in_array("3",$users)){ ?> checked= "checked" <?php } ?>id="student" value="3"><?php echo Yii::t('app', 'Students');?>
            </td>
        </tr>
      <tr><td>&nbsp;<td></tr>
       <tr>
        	<td>
           		<h3><?php echo Yii::t('app', 'Select').' '.Yii::app()->getModule('students')->fieldLabel("Students", "batch_id");?></h3>
            </td>
        </tr>
        <tr><td>&nbsp;<td></tr>
        <tr>
        <td>
        <?php
			
			$current_academic_yr = Configurations::model()->findByAttributes(array('id'=>35));
						if(Yii::app()->user->year)
						{
							$year = Yii::app()->user->year;
							
						}
						else
						{
							$year = $current_academic_yr->config_value;
						}
			$batches = Batches::model()->findAll("is_deleted=:x AND academic_yr_id=:y", array(':x'=>'0',':y'=>$year));
		?>
            <div class="spacer">
        	 <table>
          	<?php if(isset($user)){
					if(in_array('a',$batches2))
						$check_all = 'checked= "checked"';
				  	else
				  		$check_all = '';
					}
			 ?>
			<tr><td><input type="checkbox" name="batch[]" id="all_batches" <?php echo $check_all; ?> value="a"><?php echo Yii::t('app', 'All').' '.Yii::app()->getModule('students')->fieldLabel("Students", "batch_id");?></td></tr>
            <?php
			  $data = array();			 
			 foreach($batches as $batch){ 
			 
				if(in_array($batch->id,$batches2))
					{
						$check = 'checked= "checked"';
					}
				else{
						$check = '';
					}
			 ?>
                          
             <tr><td><input type="checkbox" class="batches" value="<?php echo $batch->id; ?>" id="batch-<?php echo $batch->id; ?>" name="batch[]" <?php echo $check;?>/><?php echo $data[$batch->id] = $batch->course123->course_name.'-'.$batch->name;?>&nbsp;
             </td></tr>
			 <?php
			 }
		?>  
        </table>
        </div>
        </td>
        </tr>
       <tr>
         <td>&nbsp;<td></tr>
         <tr><td>
         <?php echo Yii::t('app', 'Subject :');?> <?php echo $form->textField($content,'subject');  ?>
         
         </td></tr>
         <tr>
        	<td>
            <?php /*echo CHtml::link('Add Template',array('default/template'),array('class'=>'formbut'));*/ ?>
            </td>
        </tr>
         <td>&nbsp;<td></tr>
         <tr>
        	<td>
           		<h3><?php echo Yii::t('app', 'Add Attachment :');?> </h3>
                
				<?php 
				foreach($attachments as $key=>$attachment){?> <div id="remov_<?php echo $key;?>"> <?php echo CHtml::ajaxlink(Yii::t('app', 'Remove'), array('default/Delete','name'=>$attachment->file,'mail_id'=>$attachment->mail_id),array('success'   => "js:function(html){
            $('#remov_".$key."').fadeOut();
        }"));?>&nbsp;&nbsp;
                <?php echo $attachment->file;?></div>
				<br /><?php } ?>
                </td></tr>
                <td>&nbsp;<td></tr>
                <tr>
                <td>
				<?php $this->widget('CMultiFileUpload',array(
    'name'=>'Attachment',
	'id'=>'file',
    'max'=>1,
    'remove'=>Yii::t('app','Remove'),
	'options'=>array(
	'afterFileSelect'=>'function(e,v,m){
		var fileSize = e.files[0].size;
		if(fileSize > 2085*1024){
			alert("'.Yii::t('app', 'Exceeds file upload limit 2Mb').'");
			$(".MultiFile-remove").last().click();
		}
		else{
		return true;
		}
	}'
	)
)); ?> 
            </td>
        </tr>
         <td>&nbsp;<td></tr>
          <tr>
        	<td>
           		<h3><?php echo Yii::t('app', 'Enter Message');?></h3>
            </td>
        </tr>
         <tr>
    <td colspan="2">
    	<textarea id="editor1" name="editor1" ><?php echo $content->message; ?></textarea>
    </td>
  </tr>
   <td>&nbsp;<td></tr>
   <tr>
   		<!--<td>
   			Test Mail To : <?php /*echo CHtml::textField('test',
 array('id'=>'test', 
       'width'=>100, 
       'maxlength'=>100));*/  ?>
      <?php //echo CHtml::Button('Send',array('onclick'=>'uploadfile()'));?>
   		</td>-->
   </tr>
<td>&nbsp;<td></tr>
<tr><td>
<?php if($content->is_mailshot==1){ ?>
<input type="checkbox" name="mailshot" id="mailshot" checked="checked" /><?php }else{ ?><input type="checkbox" name="mailshot" id="mailshot"/><?php } ?><?php echo Yii::t('app', 'Is Mailshot');?> &nbsp;
<?php echo CHtml::button(Yii::t('app', 'Save Draft'),array('submit'=>array('default/Savenewdraft','id'=>$content->id)));?>
</td></tr>
<td>&nbsp;<td></tr>

       <tr>
        	<td>
            <?php echo CHtml::button(Yii::t('app', 'Send Mail'),array('submit'=>array('default/Newusermail','id'=>$content->id))); ?>
            </td>
        </tr>
        
    </table>
  
    <?php $this->endWidget(); ?>
 
    	
    </div>
    </div>
    </div>
    
    <div class="clear"></div>
</div>                           
                    </td>
                </tr>
          </tbody></table>
        </td>
    </tr>
</table>

<script type="text/javascript">
    CKEDITOR.replace( 'editor1',{
		height: 300,
		width : '95%',
		resize_enabled : false,
		toolbar : 'Full',
	} );
</script>
<script>
//tags input
$('#recipients').tagsInput({
//	onAddTag: function(tag){
//          
//        var reg = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;      
//        // Check if email valid
//        if(!reg.test(tag)){
//          alert("Invalid Email Id");
//        }
//    },
	defaultText:'<?php echo Yii::t('app', 'Add email');?>',
});
$('#recipients').importTags('<?php echo $email_list; ?>');

$('#clear_number_box').click(function(e) {
	$('#recipients_tag, #recipients').val('');
	$('#recipients_tagsinput span.tag').remove(); 
});

$('#clear_message_box').click(function(e) {
    $('#message').val('');
});
</script>
<script type="text/javascript"> /* Checking and unchecking the SMS checkboxes. */
	$(document).ready(function(){
	
	 
	 $("#all_users").change(function(){ 
		  if (this.checked) {
			$('.users').attr('checked', true);
		  }
		  else{
			$('.users').attr('checked', false);
		  }
	  });
	  $(".users").change(function(){ /* Check/Uncheck SMS All on enabling/disabling of SMS */
	  		if($('.users:checked').size() >= 3)
			{
				$('#all_users').attr('checked', true);
			}
			else
			{
				$('#all_users').attr('checked', false);
			}
	  });
	   
	  $("#all_batches").change(function(){ 
		  if (this.checked) {
			$('.batches').attr('checked', true);
		  }
		  else{
			$('.batches').attr('checked', false);
		  }
	  }); 
	   $(".batches").change(function(){ /* Check/Uncheck SMS All on enabling/disabling of SMS */
	  		if($('.batches:checked').size() >= ($('.batches').size()))
			{
				$('#all_batches').attr('checked', true);
			}
			else
			{
				$('#all_batches').attr('checked', false);
			}
	  });
	}); 
	
function updateck(){
	for(var instanceName in CKEDITOR.instances)
   		CKEDITOR.instances[instanceName].updateElement();
}</script>
<script type="text/javascript">
function uploadfile() {
    var fd = new FormData($('#mail-form')[0]);
	
	var finputs	= $('#mail-form input[type="file"]');
	var counter	= 0;
	$.each(finputs, function(index, input){
		var files = $( this ).prop("files")
		$.each(files, function(index, file){
			// Main magic with files here
			fd.append('Attachment[' + counter + ']', file);
			counter++;
		});
	});

    $.ajax({
       url: "<?php echo Yii::app()->createUrl('/notifications/default/test');?>",
       type: "POST",
       data: fd,
       processData: false,
       contentType: false,
       success: function(response) {
           //setAlert("Document uploaded!",success);
       },
       error: function(jqXHR, textStatus, errorMessage) {
           console.log(errorMessage); // Optional
       }
    });
}  
$('#browse_from_contacts').click(function(e) {
	if($('#add_contacts').is(':visible')){
		$('#add_contacts').slideUp(function(){
			$(this).html('');
		});
	}
	else{
		$.ajax({
			url:'<?php echo Yii::app()->createUrl('/notifications/default/search');?>',
			cache:false,
			beforeSend: function(){
				var img	= $('<img />');
				img.attr({
					src:'<?php echo Yii::app()->request->baseUrl;?>/images/loadinfo.gif',
				});
				$('#add_contacts').html(img);
			},
			success: function(response){
				$('#add_contacts').html( response ).slideDown();
                                
			}
		});
	}
});

$('#browse_from_groups').click(function(e) {
	if($('#add_groups').is(':visible')){
		$('#add_groups').slideUp(function(){
			$(this).html('');
		});
	}
	else{
		$.ajax({
			url:'<?php echo Yii::app()->createUrl('/notifications/default/groups');?>',
			cache:false,
			beforeSend: function(){
				var img	= $('<img />');
				img.attr({
					src:'<?php echo Yii::app()->request->baseUrl;?>/images/loadinfo.gif',
				});
				$('#add_groups').html(img);
			},
			success: function(response){
				$('#add_groups').html( response ).slideDown();
			}
		});
	}
});
</script>
