<?php

namespace TodoBundle\Controller;

use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use TodoBundle\Entity\TodoList;

class DefaultController extends Controller
{
    /**
     * @Route("/todolist")
     */
    public function indexAction(Request $request)
    {
        $todoObj = new TodoList();

        $todoObj->setTodo('Kill That Task');

        $form = $this->createFormBuilder($todoObj)
            ->add('Todo', TextType::class)
            ->add('Add', SubmitType::class)
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()){
            echo 'Form is Valid';
            echo 'Todo : '.$todoObj->getTodo();
        }else{
            echo 'Form is In Valid';
        }



        return $this->render('@TodoBundle/Resources/views/todohome.html.twig', array(
            'ourForm' => $form->createView()
        ));
    }
}
