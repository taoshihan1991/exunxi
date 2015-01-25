<?php
// 文章关联模型
class XwRelationModel extends RelationModel {
    protected $tableName='xw';
    protected $_link=array(
    	'attr'=>array(
    		'mapping_type'=>MANAY_TO_MANAY,
    		'mapping_name'=>'attr',
    		'foreign_key'=>'aid',
    		'relation_foreign_key'=>'attr_id',
    		'relation_table'=>'tg_xw_attr'

    	)
    );
	
}