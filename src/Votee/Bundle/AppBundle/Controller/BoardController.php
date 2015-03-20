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
     * @Route("/{hash}", name="votee_app_board_index")
     * @Template()
     *
     * @ParamConverter("board", class="VoteeAppBundle:Board")
     */
    public function indexAction(Board $board)
    {
        return [
            'board' => $board,
        ];
    }

    /**
     * @Route("/{hash}/edit", name="votee_app_board_edit")
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

    /**
     * @Route("/{hash}/votes", name="votee_app_board_votes")
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
}
