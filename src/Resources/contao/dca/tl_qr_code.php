<?php

$GLOBALS['TL_DCA']['tl_qr_code'] = [
    'config' => [
        'dataContainer' => 'Table',
        'switchToEdit' => true,
        'enableVersioning' => true,
        'sql' => array
        (
            'keys' => array
            (
                'id' => 'primary'
            )
        )
    ],
    'list' => [
        'sorting' => [
            'mode' => 1,
            'fields' => ['host'],
            'headerFields' => ['host'],
            'flag' => 1,
            'panelLayout' => 'debug;filter;sort,search,limit',
        ],
        'label' => [
            'fields'            => ['host','ident'],
            'format'            => 'hier: %s %s %s',
            'showColumns'       => true,
        ],
        'global_operations' => [
            'all' => [
                'label' => &$GLOBALS['TL_LANG']['MSC']['all'],
                'href' => 'act=select',
                'class' => 'header_edit_all',
                'attributes' => 'onclick="Backend.getScrollOffset();" accesskey="e"'
            ]
        ],
        'operations' => [
            'edit' => [
                'label' => &$GLOBALS['TL_LANG']['tl_hvz_rabatt']['edit'],
                'href' => 'act=edit',
                'icon' => 'edit.gif',
            ],
            'copy' => [
                'label' => &$GLOBALS['TL_LANG']['tl_hvz_rabatt']['copy'],
                'href' => 'act=copy',
                'icon' => 'copy.gif',
            ],
            'delete' => [
                'label' => &$GLOBALS['TL_LANG']['tl_hvz_rabatt']['delete'],
                'href' => 'act=delete',
                'icon' => 'delete.gif',
                'attributes' => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"',
            ],
            'show' => [
                'label' => &$GLOBALS['TL_LANG']['tl_simpleguestbook']['show'],
                'href' => 'act=show',
                'icon' => 'show.gif'
            ]
        ]
    ],
    'palettes' => [
        '__selector__' => [],
        'default' => '
			host,
			url,
			ident,
			access'
    ],
    'subpalettes' => [
        '' => ''
    ],
    'fields' => [
        'id' => [
            'sql' => "int(11) unsigned NOT NULL auto_increment"
        ],
        'ident' => [
            'label' => array('ident ','zur Identifizierung'),
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'sql'                     => "varchar(128) NOT NULL default ''",
            'inputType' => 'text',
            'eval' => ['mandatory' => true, 'maxlength' => 255],
        ],
        'url' => [
            'label' => array('url ','zur Identifizierung'),
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'sql'                     => "varchar(128) NOT NULL default ''",
            'inputType' => 'text',
            'eval' => ['mandatory' => true, 'maxlength' => 255],
        ],
        'host' => [
            'label' => array('url ','zur Identifizierung'),
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'sql'                     => "varchar(128) NOT NULL default ''",
            'inputType' => 'text',
            'eval' => ['mandatory' => true, 'maxlength' => 255],
        ],
        'access' => array
        (
            'exclude'                 => true,
            'label'                   => array('Zugriffzeit'),
            'inputType'               => 'text',
            'sql'                     => "varchar(20) NOT NULL default ''",
            'eval' => ['mandatory' => true, 'maxlength' => 255],
        ),
        'tstamp' => [
            'sql'                     => "int(10) unsigned NOT NULL default '0'"
        ],
    ]
];


