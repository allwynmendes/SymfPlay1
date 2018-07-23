<?php

namespace TodoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/todolist")
     */
    public function indexAction()
    {
        return $this->render('@TodoBundle/Resources/views/todohome.html.twig');
    }
}
