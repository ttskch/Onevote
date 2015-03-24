<?php

namespace Onevote\Bundle\Appbundle\Controller\Rest;

use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Request;
use Onevote\Bundle\AppBundle\Entity\Board;
use Onevote\Bundle\AppBundle\Form\Type\BoardType;

/**
 * @Rest\RouteResource("Board")
 */
class BoardController extends FOSRestController
{
    /**
     * @Rest\View()
     */
    public function postAction(Request $request)
    {
        $form = $this->createNamelessForm($board = new Board);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($board);
            $em->flush();

            return $board;
        }

        return $form;
    }

    /**
     * @Rest\View()
     *
     * @ParamConverter("board")
     */
    public function putAction(Board $board, Request $request)
    {
        $form = $this->createNamelessForm($board, 'PUT');

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($board);
            $em->flush();

            return $board;
        }

        return $form;
    }

    /**
     * @param Board $board
     * @param string $method
     * @return \Symfony\Component\Form\Form|\Symfony\Component\Form\FormInterface
     */
    private function createNamelessForm(Board $board, $method = 'POST')
    {
        return $this->get('form.factory')->createNamed('', new BoardType, $board, [
            'method' => $method,
            'csrf_protection' => false,
        ]);
    }
}
