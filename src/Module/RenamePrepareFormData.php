<?php

namespace Chuckki\ModshairBundle\Module;

class RenamePrepareFormData
{
    public function renamePrepareFormData(&$arrSubmitted, $arrLabels, $form)
    {
        if (!empty($_SESSION['FILES'])) {
            foreach ($_SESSION['FILES'] as &$file) {
                if ($file['uploaded']) {
                    $hostA       = explode('.', $_SERVER['HTTP_HOST']);
                    $curDate     = date("ymdHis");
                    $newFileName = $hostA[1] . '-' . $curDate . '-' . $file['name'];
                    $newAbsoluteFileName = str_replace($file['name'], $newFileName, $file['tmp_name']);
                    $file['name']        = $newFileName;
                    $renamed             = rename($file['tmp_name'], $newAbsoluteFileName);
                }
            }
        }
    }
}
