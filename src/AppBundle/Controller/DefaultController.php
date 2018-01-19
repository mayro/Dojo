<?php

namespace AppBundle\Controller;

use AppBundle\Services\Calculator;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $result = Calculator::calculate('testy', -3);
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'result' => $result,
        ]);
    }
}
