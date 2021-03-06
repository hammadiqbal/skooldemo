
<?php
$this->breadcrumbs=array(
Yii::t('app','Import CSV')=>array('/importcsv'),
Yii::t('app','Parent Users'),
);

$parent_visible_fields   = FormFields::model()->getVisibleFields('Guardians', 'forStudentProfile');
?>
<?php $form=$this->beginWidget('CActiveForm', array(
                        'method'=>'post',
                        )); ?>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td width="247" valign="top">
            	<?php $this->renderPartial('/default/left_side');?>
            </td>
            <td valign="top">
                <div class="cont_right formWrapper">
                    <!--<div class="searchbx_area">
                    <div class="searchbx_cntnt">
                    <ul>
                    <li><a href="#"><img src="images/search_icon.png" width="46" height="43" /></a></li>
                    <li><input class="textfieldcntnt"  name="" type="text" /></li>
                    </ul>
                    </div>
                    
                    </div>-->
                    
                    <div class="clear"></div>
                    <div class="emp_right_contner">
                        <h1><?php echo Yii::t('app','Create Users'); ?></h1>
                             <!-- Flash Message -->
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
								<div class="flashMessage" style="background:#FFF; color:#C00; padding-left:220px; font-size:13px">
								<?php echo Yii::app()->user->getFlash('success'); ?>
								</div>
                            <?php endif; ?>
                        <div class="emp_tabwrapper">
                            
                            	<?php $this->renderPartial('/default/emp_tab_nav');?>
                         
                            <div class="clear"></div>
                            <br />
                            <div class="pagecon" style="height:17px;">
								<?php     							                                 
                                  $this->widget('CLinkPager', array(
                                  'currentPage'=>$pages->getCurrentPage(),
                                  'itemCount'=>$item_count,
                                  'pageSize'=>50,
                                  'maxButtonCount'=>5,
                                  //'nextPageLabel'=>'My text >',
                                  'header'=>'',
                                'htmlOptions'=>array('class'=>'pages',"style"=>"margin:0px;"),
                                ));?>
                            </div>
                            <div class="emp_cntntbx" >
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
                                $is_create = PreviousYearSettings::model()->findByAttributes(array('id'=>1));
                                ?>
                                <?php
                                //$parentlist = Guardians::model()->findAll(array('condition'=>'uid=:x and is_delete=:y','params'=>array(':x'=>0,':y'=>0),'order'=>'last_name ASC'));								
                                ?>
                                <?php
                                if($year != $current_academic_yr->config_value and $is_create->settings_value==0 and count($parentlist)!=0)
                                {
                                ?>
                                <div>
                                    <div class="yellow_bx" style="background-image:none;width:690px;padding-bottom:45px;">
                                        <div class="y_bx_head" style="width:650px;">
                                        <?php 
                                            echo Yii::t('app','You are not viewing the current active year. ');
                                            echo Yii::t('app','To create parent users, enable the Create option in Previous Academic Year Settings.');	
                                            
                                        ?>
                                        </div>
                                        <div class="y_bx_list" style="width:650px;">
                                            <h1><?php echo CHtml::link(Yii::t('app','Previous Academic Year Settings'),array('/previousYearSettings/create')) ?></h1>
                                        </div>
                                    </div>
                                </div><br />
                                <?php
                                }
                                ?>
                                
                                <div align="center" style="font-size:16px; font-style:bold; padding:10px 0px;">
                                <!-- Create User Button Only-->
                                <?php /*?><?php 
                                if(count($parentlist)!=0)
                                {
                                echo Yii::t('app','You have not created user accounts for ').count($parentlist).' parents ';
                                if(($year == $current_academic_yr->config_value) or ($year != $current_academic_yr->config_value and $is_create->settings_value!=0))
                                {
                                echo CHtml::submitButton(Yii::t('app','Create Now'),array('confirm'=>'Are you sure?','name'=>'parentuser','value'=>'Create Now','class'=>'formbut'));
                                }
                                }
                                else 
                                { 
                                echo Yii::t('app','No data available'); 
                                }?><?php */?>
                                <!-- Create User Button Only-->
                                <!-- Parents List -->
                                
                                <div class="tablebx">
                                  <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                  <tbody>
                                      <tr class="tablebx_topbg">
                                        <td><?php echo Yii::t('app','Sl. No.');?></td>
                                        <td> 
                                            <?php 
                                            if($parentlist)
                                            {
                                                echo CHtml::CheckBox('all_parents','',array('value'=>0)); 
                                            }
                                            else
                                            {
                                                echo CHtml::CheckBox('all_parents','',array('value'=>0,'disabled'=>'disabled')); 
                                            }
                                            ?>
                                        </td>
                                        <?php if(FormFields::model()->isVisible("fullname", "Guardians", "forStudentProfile")){ ?>
                                        <td><?php echo Yii::t('app','Parent Name');?> </td>
                                        <?php } ?>
                                        <td><?php echo Yii::t('app','Email');?> </td>
                                        <td><?php echo Yii::t('app','No of Active Students');?> </td>                                       
                                        
                                        <!--<td style="border-right:none;">Task</td>--> 
                                      </tr>
                                    <?php
                                    if(isset($_REQUEST['page']))
									{
										$i=($pages->pageSize*$_REQUEST['page'])-49;
									}
									else
									{
										$i=1;
									}
                                    $cls = 'even';
                                    if($parentlist)
                                    {
                                        foreach($parentlist as $parent)
                                        {
											$criteria = new CDbCriteria;
											//$criteria->condition = "(parent_id LIKE :id) and (is_deleted LIKE :is_del) and (is_active LIKE :is_active)";
											//$criteria->params = array(':id'=>$parent->id,':is_del'=>0,':is_active'=>1);
											
											$criteria->join			= "JOIN `guardian_list` `gl` ON `gl`.`student_id`=`t`.`id`";
											$criteria->condition 	= "`gl`.`guardian_id`=:guardian_id";
											$criteria->params 		= array(':guardian_id'=>$parent->id);
											
											$students = Students::model()->count($criteria);
											
                                        ?>
                                            <tr id="1" class="<?php echo $cls; ?>">
                                                <td><?php echo $i; ?></td>
                                                <td>
                                                    <?php
                                                    if($students>0)
                                                    {
                                                        echo CHtml::CheckBox('parent_user[]','',array('value'=>$parent->id,'class'=>'parent')); 
                                                    }
                                                    else
                                                    {
                                                    
                                                        echo CHtml::CheckBox('parent_user[]','',array('disabled'=>'disabled','class'=>'inactiveparent'));
                                                                                      
                                                    }
                                                    ?>
                                                </td>
                                                <?php if(FormFields::model()->isVisible("fullname", "Guardians", "forStudentProfile")){ ?>
                                                <td><?php echo $parent->parentFullName('forStudentProfile');?></td>
                                                <?php } ?>
                                                <td><?php echo $parent->email; ?></td>
                                                <td>
													<?php
                                                    
													echo $students;                                                    
                                                    ?>
                                                </td>
                                              </tr>
                                        <?php
                                            $i++;						
                                            if($cls=="even")
                                            {
                                                $cls="odd" ;
                                            }
                                            else
                                            {
                                                $cls="even"; 
                                            }
                                        }
                                    }
                                    else
                                    {
                                    ?>
                                        <tr>
                                            <td colspan="5" style="padding:11px;"><?php echo Yii::t('app','No data available!');?></td>
                                        </tr>
                                    <?php	
                                    }
                                    ?>
                                    </tbody>
                                  </table>
                                </div>   
                                <!-- Parents List -->
                                </div>
                                <div class="pagecon" style="height:17px;">
									<?php     							                                 
                                      $this->widget('CLinkPager', array(
                                      'currentPage'=>$pages->getCurrentPage(),
                                      'itemCount'=>$item_count,
                                      'pageSize'=>50,
                                      'maxButtonCount'=>5,
                                      //'nextPageLabel'=>'My text >',
                                      'header'=>'',
                                    'htmlOptions'=>array('class'=>'pages',"style"=>"margin:0px;"),
                                    ));?>
                                </div>
                                <?php
							   if($parentlist)
								{
									echo CHtml::submitButton(Yii::t('app','Create Now'),array('confirm'=>'Are you sure. You want to create user account ?',
									'name'=>'parentuser','class'=>'formbut'));
								}
								?>   
                            </div>
                        </div>
                    
                    </div>
                </div>
            
            </td>
        </tr>
    </table>
<?php $this->endWidget(); ?>

<script type="text/javascript"> 
	$(document).ready(function(){
	
	 
	 $("#all_parents").change(function(){ /* Check/Uncheck All option */
		  if (this.checked) {
			$('.parent').attr('checked', true);
		  }
		  else{
			$('.parent').attr('checked', false);
		  }
	  });
	  
	   $(".parent").change(function(){ /* Check/Uncheck individual check box */
		  if (this.checked) {
			if (!$('input.parent[type=checkbox]:not(:checked)').length){
				$('#all_parents').attr('checked', true);	
			}
		  }
		  else{
			$('#all_parents').attr('checked', false);
		  }
	  });
 }); 
 
</script>