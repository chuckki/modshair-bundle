<?php

namespace Chuckki\ModshairBundle\Model;

use Contao\Model;

/**
 * @property string  $host
 * @property string  $url
 * @property string  $ident
 * @property string  $access
 * @property integer $tstamp
 */

class QRModel extends Model
{
	protected static $strTable = 'tl_qr_code';

}
