<?php

$strName = 'tl_content';

$GLOBALS['TL_DCA'][$strName]['palettes']['slideshowelement'] = '
{type_legend},type;
{source_legend},cssImage;
{link_legend},url,title,target,titleText,linkTitle;
{image_legend},addImage;
{template_legend:hide},customTpl;
{expert_legend:hide},cssID;';

$GLOBALS['TL_DCA'][$strName]['subpalettes']['addImage'] = 'singleSRC,alt,size,imageUrl,fullsize';

$GLOBALS['TL_DCA'][$strName]['fields']['url']['eval']['mandatory'] = false;
$GLOBALS['TL_DCA'][$strName]['fields']['titleText']['label'] = array('Link Text','angezeigter Text');
$GLOBALS['TL_DCA'][$strName]['fields']['linkTitle']['label'] = array('Title','Title in Link und im Bild');



$GLOBALS['TL_DCA'][$strName]['fields']['cssImage'] = array(
			'label'                   => &$GLOBALS['TL_LANG']['tl_content']['cssImage'],
			'exclude'                 => true,
			'inputType'               => 'fileTree',
			'eval'                    => array('filesOnly'=>true, 'fieldType'=>'radio', 'mandatory'=>true, 'tl_class'=>'clr'),
			'load_callback' => array
			(
				array('tl_content', 'setSingleSrcFlags')
			),
			'sql'                     => "binary(16) NULL"
);

$GLOBALS['TL_DCA'][$strName]['fields']['url']['eval'] 		= array('mandatory'=>true, 'decodeEntities'=>true, 'maxlength'=>255, 'fieldType'=>'radio', 'filesOnly'=>true, 'tl_class'=>'w50 wizard');
$GLOBALS['TL_DCA'][$strName]['fields']['imageUrl']['eval']  = array('decodeEntities'=>true, 'maxlength'=>255, 'fieldType'=>'radio', 'filesOnly'=>true, 'tl_class'=>'w50 wizard');

