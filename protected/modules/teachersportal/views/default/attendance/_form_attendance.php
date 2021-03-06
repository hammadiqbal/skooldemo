
		<?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'student-attentance-form',
            'enableAjaxValidation'=>false,
        )); ?>
			 <input type="hidden" value="<?php echo $_REQUEST['student_id']; ?>" name="student_id" />
             <input type="hidden" value="<?php echo $_REQUEST['batch_id']; ?>" name="batch_id" />
             <input type="hidden" value="<?php echo $_REQUEST['date']; ?>" name="date" />
        
            <?php echo $form->errorSummary($model); ?>

            <div class="row">
               <div class="col-md-12">
                    <div class="model-popup-form">
                        <?php echo $form->labelEx($model,'leave_type_id');?>
                        <?php echo $form->dropDownList($model,'leave_type_id',CHtml::listData(StudentLeaveTypes::model()->findAllByAttributes(array('status'=>1)),'id','name'), array('class'=>'form-control', 'empty'=>'Select Leave Type')); ?>
                        <?php echo $form->error($model,'leave_type_id'); ?>  
                    </div> 
                </div>             
            </div>
        	<div class="row">
                <div class="col-md-12">
                    <div class="model-popup-form">
						<?php echo $form->labelEx($model,'reason'); ?>
                        <?php echo $form->textField($model,'reason',array('maxlength'=>120, 'class'=>'form-control')); ?>
                        <?php echo $form->error($model,'reason'); ?>
                    </div>
                </div>
            </div>
            <div class="row buttons">
             <div class="col-md-12">
             <div class="model-popup-form-btn">
                 <?php
                    echo CHtml::ajaxSubmitButton(
                        Yii::t('app','Save'),
                        CHtml::normalizeUrl(array('/teachersportal/default/updateDayAttendance','render'=>false)),
                        array(
                            'dataType'=>'json',
                            'success'=>'js: function(data){
                                if (data.status == "success"){
                                    window.location.reload();
                                }
                                else{
                                    var errors = JSON.parse(data.errors);
                                    $(".errorMessage").remove();
                                    $.each(errors, function(index, value){
										var id  = index + "_em_";
										var error = $("<div class=\"errorMessage\" />");
										error.attr({
											id:id,
										});
										error.html(value[0]);
										error.insertAfter($("#"+ index));
                                    });
                                }
                            }'
                        ),
                        array(
                            'id'=>'closeJobDialog'.$day.$emp_id,
							'class'=>'btn model-save-btn',
                            'name'=>'save'
                        )
                    );
                ?>
                </div>
                </div>
            </div>
        <?php $this->endWidget(); ?>
