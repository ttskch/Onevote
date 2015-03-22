<?php

namespace Votee\Bundle\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultLocaleController extends Controller
{
    public function indexAction(Request $request)
    {
        $url = $request->getRequestUri();
        $url = '/' . $this->container->getParameter('locale') . $url;

        return $this->redirect($url, 301);
    }
}
