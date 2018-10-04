<style>
    .table-responsive label{ display: inline-block;
    width: 200px;}
    
</style>

<div class="form theme_box">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-themes-form',
	'enableAjaxValidation'=>false,
)); ?>

	<div class="row">
	<div class="col-md-3">
    <div class="theme_listbox">
                <?php echo $form->labelEx($model,'header_logo_background'); ?>
                <?php $this->widget('ext.SMiniColors.SActiveColorPicker', array(
			'model' => $model,
			'attribute' => 'header_logo_background',
			'hidden'=>false, // defaults to false - can be set to hide the textarea with the hex
			'options' => array(), // jQuery plugin options
			'htmlOptions' => array(), // html attributes
		)); ?>
     </div>
     </div>	
	<div class="col-md-3">
    <div class="theme_listbox">
                <?php echo $form->labelEx($model,'header_bar_background'); ?>
                <?php $this->widget('ext.SMiniColors.SActiveColorPicker', array(
			'model' => $model,
			'attribute' => 'header_bar_background',
			'hidden'=>false, // defaults to false - can be set to hide the textarea with the hex
			'options' => array(), // jQuery plugin options
			'htmlOptions' => array(), // html attributes
		)); ?>
        </div>
     </div>	
	<div class="col-md-3">
    <div class="theme_listbox">
                <?php echo $form->labelEx($model,'header_border'); ?>
                <?php $this->widget('ext.SMiniColors.SActiveColorPicker', array(
			'model' => $model,
			'attribute' => 'header_border',
			'hidden'=>false, // defaults to false - can be set to hide the textarea with the hex
			'options' => array(), // jQuery plugin options
			'htmlOptions' => array(), // html attributes
		)); ?>
        </div>
     </div>	
	<div class="col-md-3">
    <div class="theme_listbox">
                <?php echo $form->labelEx($model,'header_dropdown_background'); ?>
                <?php $this->widget('ext.SMiniColors.SActiveColorPicker', array(
			'model' => $model,
			'attribute' => 'header_dropdown_background',
			'hidden'=>false, // defaults to false - can be set to hide the textarea with the hex
			'options' => array(), // jQuery plugin options
			'htmlOptions' => array(), // html attributes
		)); ?>
        </div>
     </div>
   
	<div class="col-md-3">
    <div class="theme_listbox">
                <?php echo $form->labelEx($model,'header_dropdown_text'); ?>

                <?php $this->widget('ext.SMiniColors.SActiveColorPicker', array(
			'model' => $model,
			'attribute' => 'header_dropdown_text',
			'hidden'=>false, // defaults to false - can be set to hide the textarea with the hex
			'options' => array(), // jQuery plugin options
			'htmlOptions' => array(), // html attributes
		)); ?>
        </div>
     </div>	
	<div class="col-md-3">
    <div class="theme_listbox">
                <?php echo $form->labelEx($model,'header_dropdown_over'); ?>

                <?php $this->widget('ext.SMiniColors.SActiveColorPicker', array(
			'model' => $model,
			'attribute' => 'header_dropdown_over',
			'hidden'=>false, // defaults to false - can be set to hide the textarea with the hex
			'options' => array(), // jQuery plugin options
			'htmlOptions' => array(), // html attributes
		)); ?>
        </div>
     </div>	

	<div class="col-md-3">
    <div class="theme_listbox">
                <?php echo $form->labelEx($model,'header_text_color'); ?>
                <?php $this->widget('ext.SMiniColors.SActiveColorPicker', array(
			'model' => $model,
			'attribute' => 'header_text_color',
			'hidden'=>false, // defaults to false - can be set to hide the textarea with the hex
			'options' => array(), // jQuery plugin options
			'htmlOptions' => array(), // html attributes
		)); ?>
        </div>
     </div>	
	<div class="col-md-3">
    <div class="theme_listbox">
                <?php echo $form->labelEx($model,'page_header_background'); ?>
                <?php $this->widget('ext.SMiniColors.SActiveColorPicker', array(
			'model' => $model,
			'attribute' => 'page_header_background',
			'hidden'=>false, // defaults to false - can be set to hide the textarea with the hex
			'options' => array(), // jQuery plugin options
			'htmlOptions' => array(), // html attributes
		)); ?>
        </div>
     </div>	

	<div class="col-md-3">
    <div class="theme_listbox">
                <?php echo $form->labelEx($model,'page_header_text'); ?>
                <?php $this->widget('ext.SMiniColors.SActiveColorPicker', array(
			'model' => $model,
			'attribute' => 'page_header_text',
			'hidden'=>false, // defaults to false - can be set to hide the textarea with the hex
			'options' => array(), // jQuery plugin options
			'htmlOptions' => array(), // html attributes
		)); ?>
     </div>	
     </div>
	<div class="col-md-3">
    <div class="theme_listbox">
                <?php echo $form->labelEx($model,'left_panel_background'); ?>
                <?php $this->widget('ext.SMiniColors.SActiveColorPicker', array(
			'model' => $model,
			'attribute' => 'left_panel_background',
			'hidden'=>false, // defaults to false - can be set to hide the textarea with the hex
			'options' => array(), // jQuery plugin options
			'htmlOptions' => array(), // html attributes
		)); ?>
        </div>
     </div>	
	<div class="col-md-3">
    <div class="theme_listbox">
                <?php echo $form->labelEx($model,'left_panel_text'); ?>
                <?php $this->widget('ext.SMiniColors.SActiveColorPicker', array(
			'model' => $model,
			'attribute' => 'left_panel_text',
			'hidden'=>false, // defaults to false - can be set to hide the textarea with the hex
			'options' => array(), // jQuery plugin options
			'htmlOptions' => array(), // html attributes
		)); ?>
        </div>
     </div>	
	<div class="col-md-3">
    <div class="theme_listbox">
                <?php echo $form->labelEx($model,'left_panel_over_background'); ?>
                <?php $this->widget('ext.SMiniColors.SActiveColorPicker', array(
			'model' => $model,
			'attribute' => 'left_panel_over_background',
			'hidden'=>false, // defaults to false - can be set to hide the textarea with the hex
			'options' => array(), // jQuery plugin options
			'htmlOptions' => array(), // html attributes
		)); ?>
        </div>

     </div>	
	<div class="col-md-3">
    <div class="theme_listbox">
                <?php echo $form->labelEx($model,'left_panel_over_text'); ?>

                <?php $this->widget('ext.SMiniColors.SActiveColorPicker', array(
			'model' => $model,
			'attribute' => 'left_panel_over_text',
			'hidden'=>false, // defaults to false - can be set to hide the textarea with the hex
			'options' => array(), // jQuery plugin options
			'htmlOptions' => array(), // html attributes
		)); ?>
        </div>
     </div>	
	<div class="col-md-3">
    <div class="theme_listbox">
                <?php echo $form->labelEx($model,'left_panel_active_background'); ?>
                <?php $this->widget('ext.SMiniColors.SActiveColorPicker', array(
			'model' => $model,
			'attribute' => 'left_panel_active_background',
			'hidden'=>false, // defaults to false - can be set to hide the textarea with the hex
			'options' => array(), // jQuery plugin options
			'htmlOptions' => array(), // html attributes
		)); ?>
        </div>
     </div>	
	<div class="col-md-3">
    <div class="theme_listbox">
                <?php echo $form->labelEx($model,'left_panel_active_text'); ?>

                <?php $this->widget('ext.SMiniColors.SActiveColorPicker', array(
			'model' => $model,
			'attribute' => 'left_panel_active_text',
			'hidden'=>false, // defaults to false - can be set to hide the textarea with the hex
			'options' => array(), // jQuery plugin options
			'htmlOptions' => array(), // html attributes
		)); ?>
        </div>
     </div>	
	<div class="col-md-3">
    <div class="theme_listbox">
                <?php echo $form->labelEx($model,'main_panel_background'); ?>
                <?php $this->widget('ext.SMiniColors.SActiveColorPicker', array(
			'model' => $model,
			'attribute' => 'main_panel_background',
			'hidden'=>false, // defaults to false - can be set to hide the textarea with the hex
			'options' => array(), // jQuery plugin options
			'htmlOptions' => array(), // html attributes
		)); ?>
        </div>
		</div>
        </div>		
		<div class="col-md-12">		
			
            
            <div class="opnsl_headerBox">
             <div class="opnsl_actn_box"> </div>
            <div class="opnsl_actn_box">
            <?php
                if($status==1)
                {
					?>
            <div class="opnsl_actn_box1">
            <?php 
				echo CHtml::Button(Yii::t('app','Save'),array('submit'=>array('portalThemes/update'),'class'=>'btn btn-danger'));
			?>
            </div>
            <?php
				}else{
					
				?>
            
            <div class="opnsl_actn_box2">
             <?php 
			  echo CHtml::Button(Yii::t('app','Save'),array('submit'=>array('portalThemes/create'),'class'=>'btn btn-danger'));
			 ?>
            </div>
            <?php
				}
				?>
            </div>
           
            </div>

            
		</div>

    </div>
    

<span id="success-EventsType_colour_code"
              class="hid input-notification-success  success png_bg right"></span>
        <div>
            <small></small>
        </div>
<?php $this->endWidget(); ?>

</div><!-- form -->