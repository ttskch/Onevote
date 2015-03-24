<?php

namespace Onevote\Bundle\Appbundle\Controller\Rest;

use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Onevote\Bundle\AppBundle\Entity\Vote;
use Onevote\Bundle\AppBundle\Form\Type\VoteType;

/**
 * @Rest\RouteResource("Vote")
 */
class VoteController extends FOSRestController
{
    /**
     * @Rest\View()
     */
    public function postAction(Request $request)
    {
        $form = $this->get('form.factory')->createNamed('', new VoteType(), $vote = new Vote(), [
            'csrf_protection' => false,
        ]);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($vote);
            $em->flush();

            return $vote;
        }

        return $form;
    }
}
