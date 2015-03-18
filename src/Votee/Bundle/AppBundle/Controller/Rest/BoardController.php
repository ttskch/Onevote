<?php

namespace Votee\Bundle\Appbundle\Controller\Rest;

use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Votee\Bundle\AppBundle\Entity\Board;
use Votee\Bundle\AppBundle\Form\Type\BoardType;

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
        $form = $this->get('form.factory')->createNamed('', new BoardType(), $board = new Board(), [
            'csrf_protection' => false,
        ]);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($board);
            $em->flush();

            return $board;
        }

        return $form;
    }
}
