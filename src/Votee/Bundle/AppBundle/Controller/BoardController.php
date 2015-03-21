<?php

namespace Votee\Bundle\AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Votee\Bundle\AppBundle\Entity\Board;

/**
 * @Route("/boards")
 */
class BoardController extends Controller
{
    /**
     * @Route("/show/{hash}", name="votee_app_board_show")
     * @Template()
     *
     * @ParamConverter("board", class="VoteeAppBundle:Board")
     */
    public function showAction(Board $board)
    {
        return [
            'board' => $board,
        ];
    }

    /**
     * @Route("/show/{hash}/votes", name="votee_app_board_show_votes")
     * @Template()
     *
     * @ParamConverter("board", class="VoteeAppBundle:Board")
     */
    public function votesAction(Board $board)
    {
        return [
            'board' => $board,
        ];
    }

    /**
     * @Route("/new", name="votee_app_board_new")
     * @Template()
     */
    public function newAction()
    {
        return [];
    }

    /**
     * @Route("/edit/{hash}", name="votee_app_board_edit")
     * @Template()
     *
     * @ParamConverter("board", class="VoteeAppBundle:Board")
     */
    public function editAction(Board $board)
    {
        return [
            'board' => $board,
        ];
    }
}
