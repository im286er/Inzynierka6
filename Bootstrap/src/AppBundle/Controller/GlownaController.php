<?php

namespace AppBundle\Controller;


use AppBundle\Entity\SearchEntity;
use AppBundle\Form\Search;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class GlownaController extends Controller
{
    /**
     * @Route("", name="StronaGlowna")
     */

    public function newAction()
    {
        // create a task and give it some dummy data for this example
        $task = new SearchEntity();

        $form = $this->createForm(new Search());

        return $this->render(':Szablony:glowna.html.twig', array(
            'form' => $form->createView(),
        ));
    }

}