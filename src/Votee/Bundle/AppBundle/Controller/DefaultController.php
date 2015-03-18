<?php

namespace Votee\Bundle\AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Votee\Bundle\AppBundle\Entity\Board;
use Votee\Bundle\AppBundle\Entity\Choice;

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
        return [
            'board' => $board,
        ];
    }

    /**
     * @Route("/boards/{hash}/votes", name="votee_app_default_board_votes")
     * @Template()
     *
     * @ParamConverter("board", class="VoteeAppBundle:Board")
     */
    public function boardVotesAction(Board $board)
    {
        return [
            'board' => $board,
        ];
    }
}
