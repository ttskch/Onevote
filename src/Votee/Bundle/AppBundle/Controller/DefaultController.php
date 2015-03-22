<?php

namespace Votee\Bundle\AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/")
 */
class DefaultController extends Controller
{
    /**
     * @Route("/", name="home")
     * @Template()
     */
    public function indexAction()
    {
        return [];
    }

    public function defaultLocaleRedirectAction(Request $request)
    {
        $url = $request->getRequestUri();
        $url = '/' . $this->container->getParameter('locale') . $url;

        return $this->redirect($url, 301);
    }
}
