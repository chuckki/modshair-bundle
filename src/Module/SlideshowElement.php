<?php

/*
 * This file is part of [package name].
 *
 * (c) Dennis Esken
 *
 * @license LGPL-3.0-or-later
 */

namespace Chuckki\ModshairBundle\Module;

/**
 * @property string $titleText
 * @property string $cssImage
 * @property string $singleSRC
 * @property bool addImage
 */
class SlideshowElement extends \Module
{
    /**
     * Template.
     *
     * @var string
     */
    protected $strTemplate = 'ce_slideshowelement';

    /**
     * Compile the content element.
     */
    protected function compile()
    {
        if (TL_MODE === 'BE') {
            $this->genBeOutput();
        } else {
            $this->genFeOutput();
        }
    }

    /**
     * Erzeugt die Ausgebe für das Backend.
     */
    private function genBeOutput()
    {
        $this->strTemplate = 'be_wildcard';
        $this->Template = new \BackendTemplate($this->strTemplate);
        $this->Template->title = $this->titleText;
        $this->Template->wildcard = '### SlideshowElement ###';
    }

    /**
     * Erzeugt die Ausgebe für das Frontend.
     */
    private function genFeOutput()
    {
        if (!empty($this->cssImage)) {
            $objFile = \FilesModel::findByUuid($this->cssImage);
            if ($objFile !== null) {
                if (is_file(TL_ROOT . '/' . $objFile->path)) {
                    $this->Template->href     = $objFile->path;
                    $this->Template->addImage = false;
                    // Add an image
                    if ($this->addImage && $this->singleSRC != '') {
                        $objModel = \FilesModel::findByUuid($this->singleSRC);
                        if ($objModel !== null and is_file(TL_ROOT . '/' . $objModel->path)) {
                            $this->singleSRC = $objModel->path;
                            $this->addImageToTemplate($this->Template, $this->arrData);
                        }
                    }
                }
            }

        }

    }

}
