<?php
$this->breadcrumbs=array(
	Yii::t('app','Publications'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Create Publication'), 'url'=>array('create')),
	array('label'=>Yii::t('app','Manage Publication'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app','Publications');?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
