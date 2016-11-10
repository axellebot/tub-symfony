<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DownloadController extends Controller
{
    /**
     * @Route("/download/kml/{line_id}", name="download_kml")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function downloadKMLAction(Request $request, $line_id)
    {
        $filePath =$this->get('kernel')->getRootDir() . '/../web/kml/' . 'path'.'-' . $line_id . '.kml';
        if (!file_exists($filePath)) {
            throw $this->createNotFoundException('No KML file found');
        }

        $file = new File($filePath);

        $response = new BinaryFileResponse($file);
        $response->setContentDisposition(ResponseHeaderBag::DISPOSITION_ATTACHMENT);
        return $response;
    }
}
