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
        $host = $_SERVER['HTTP_HOST'];
        $url = 'http://' . $host . '/qr/' . $url;
        $qrCodeFactory = new QrCodeFactory();

        $qrCode = $qrCodeFactory->create($url, ['size' => 200]);
        $response = new Response($qrCode->writeString(), Response::HTTP_OK, ['Content-Type' => $qrCode->getContentType()]);
        return $response;
    }

    /**
     * @Route("/qr/{url}", name="qr-serve")
     */
    public function serveAction($url): Response
    {
        if(empty($url)){
            return RedirectResponse::HTTP_NOT_FOUND;
        }

        $url = '/' . $url . '.html';

        $log = new QRModel();
        $log->access = (new \DateTime())->format('Y-m-d h:m:s');
        $log->host = $_SERVER['HTTP_HOST'];
        $log->url = $url;
        $log->tstamp = time();
        $log->ident = '';
        $log->save();

        return RedirectResponse::create($url);

    }


}
