<?php

namespace Chuckki\ModshairBundle\Controller;

use Chuckki\ModshairBundle\Model\QRModel;
use Contao\CoreBundle\Framework\ContaoFramework;
use Endroid\QrCode\Factory\QrCodeFactory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QRController extends AbstractController
{

    public function __construct(ContaoFramework $contaoFramework)
    {
        $contaoFramework->initialize(true);
    }

    /**
     * @Route("/qr/get/{url}", name="qr-get")
     */
    public function getAction($url = 'magazin'): Response
    {
        return $this->getQrPerSizeAction($url, 945);
    }

    /**
     * @Route("/qr/getsize/{size}/{token}", name="qr-get-with-size")
     */
    public function getQrPerSizeAction($token = 'magazin', $size = 945): Response
    {

        $host          = $_SERVER['HTTP_HOST'];
        $schema        = $_SERVER['HTTPS'] ? 'https' : 'http';
        $url           = $schema.'://'.$host.'/qr/'.$token;
        $qrCodeFactory = new QrCodeFactory();
        $qrCode        = $qrCodeFactory->create($url, ['size' => $size]);

        $response      = new Response(
            $qrCode->writeString(), Response::HTTP_OK, [
                'Content-Type' => $qrCode->getContentType(),
                'Content-Disposition' => 'inline; filename="'.$host.'-'.$token.'.png"',
            ]
        );

        return $response;
    }

    /**
     * @Route("/qr/{url}", name="qr-serve")
     */
    public function serveAction($url): Response
    {
        if (empty($url)) {
            return RedirectResponse::HTTP_NOT_FOUND;
        }
        $url         = '/'.$url.'.html';
        $log         = new QRModel();
        $log->access = (new \DateTime())->format('Y-m-d h:m:s');
        $schema      = $_SERVER['HTTPS'] ? 'https' : 'http';
        $log->host   = $schema.'://'.$_SERVER['HTTP_HOST'];
        $log->url    = $url;
        $log->tstamp = time();
        $log->ident  = '';
        $log->save();

        return RedirectResponse::create($url);
    }

    /**
     * @Route("/qr-statistic", name="qr-serve-stats")
     */
    public function showStatisticAction()
    {
        $qrAccess    = QRModel::findall();
        $returnArray = [];
        foreach ($qrAccess as $item) {
            if (!array_key_exists($item->host, $returnArray)) {
                $returnArray[$item->host] = ['count' => 0];
            }
            $returnArray[$item->host]['count']++;
        }
        $returnValue = '';
        foreach ($returnArray as $key => $item) {
            $returnValue .= $key.'='.$item['count'].'<br>';
        }

        return new Response($returnValue);
    }

}
