<?php

namespace Votee\Bundle\AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Votee\Bundle\AppBundle\Entity\Board;

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

    /**
     * @Route("/boards/{hash}", name="votee_app_default_board")
     * @Template()
     *
     * @ParamConverter("board", class="VoteeAppBundle:Board")
     */
    public function boardAction(Board $board)
    {
        return compact('board');
    }
}
