<?php


$GLOBALS['TL_CTE']['modshair']['slideshowelement'] = 'Chuckki\ModshairBundle\Module\SlideshowElement';

$GLOBALS['TL_HOOKS']['prepareFormData'][] = array('Chuckki\ModshairBundle\Module\RenamePrepareFormData', 'renamePrepareFormData');

//$GLOBALS['FE_MOD']['miscellaneous']['helloWorld'] = 'Acme\ContaoHelloWorldBundle\Module\HelloWorldModule';

//$GLOBALS['TL_HOOKS']['prepareFormData'][] = array('modshair\classes\elements\uploadRenameClass', 'renamePrepareFormData');
