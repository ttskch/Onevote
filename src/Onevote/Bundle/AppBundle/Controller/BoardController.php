<?php

namespace Onevote\Bundle\AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Onevote\Bundle\AppBundle\Entity\Board;

/**
 * @Route("/boards")
 */
class BoardController extends Controller
{
    /**
     * @Route("/{hash}", requirements={"hash"="\w{31}"})
     */
    public function tmpShowAction($hash)
    {
        return $this->redirectToRoute('onevote_app_board_show', ['hash' => $hash]);
    }

    /**
     * @Route("/show/{hash}", name="onevote_app_board_show")
     * @Template()
     *
     * @ParamConverter("board", class="OnevoteAppBundle:Board")
     */
    public function showAction(Board $board)
    {
        return [
            'board' => $board,
        ];
    }

    /**
     * @Route("/show/{hash}/votes", name="onevote_app_board_show_votes")
     * @Template()
     *
     * @ParamConverter("board", class="OnevoteAppBundle:Board")
     */
    public function votesAction(Board $board)
    {
        return [
            'board' => $board,
        ];
    }

    /**
     * @Route("/new", name="onevote_app_board_new")
     * @Template()
     */
    public function newAction()
    {
        return [];
    }

    /**
     * @Route("/edit/{hash}", name="onevote_app_board_edit")
     * @Template()
     *
     * @ParamConverter("board", class="OnevoteAppBundle:Board")
     */
    public function editAction(Board $board)
    {
        return [
            'board' => $board,
        ];
    }
}
