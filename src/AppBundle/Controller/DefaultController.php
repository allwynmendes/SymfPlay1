<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Prouct;
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
        // replace this example code with whatever you need
        echo 'Text';
        //$this->createAction('Test Drive', 20, 'Test Product');
        //$this->showAction2(1);
        //$this->showAction3(15);.
        //$this->showAction4();
        //$this->updateAction1(1, 'Keysword');
        $this->deleteAction1(4);
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    public function createAction($name, $price, $desc)
    {
        echo '/nInside createAction()';
        $entityManager = $this->getDoctrine()->getManager();

        $product = new Prouct();
        $product->setName($name);
        $product->setPrice($price);
        $product->setDescription($desc);

        $entityManager->persist($product);
        $entityManager->flush();

        //return new Response('Saved new product with id '.$product->getId());
    }

    public function showAction($productId)
    {
        $product = $this->getDoctrine()->getRepository(Product::class)->find($productId);

        if(!$product){
            throw $this->createNotFoundException('No product found with id '.$productId);
        }

    }

    public function showAction2($productId)
    {
        echo '\nInside showAction2()';
        $repository = $this->getDoctrine()->getRepository(Prouct::class);
        $product = $repository->find($productId);

        if(!$product){
            echo 'No data';
        }else{
            echo '/nName : ' . $product->getName();
        }
    }

    public function showAction3($price){
        echo '\nInside showAction3()';
        $repository = $this->getDoctrine()->getRepository(Prouct::class);
        $product = $repository->findByPrice($price);

        if(!$product){
            echo 'No data';
        }else {
            foreach ($product as $prod){
                echo '/nName : ' . $prod->getName();
            }
        }
    }

    public function showAction4(){
        echo '\nInside showAction4()';
        $repository = $this->getDoctrine()->getRepository(Prouct::class);
        $product = $repository->findAll();
        $i = 1;
        foreach ($product as $prod){
            echo ' '.$i++.'. '.$prod->getName();
        }
    }

    public function updateAction1($productId, $productName){
        echo '\nInside updateAction1()';
        $entityManager = $this->getDoctrine()->getManager();
        $product = $entityManager->getRepository(Prouct::class)->find($productId);

        if(!$product){
            echo '\n Product Not Found';
        }else{
            $product->setName($productName);
            $entityManager->flush();
        }
    }

    public function deleteAction1($productId)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $product = $entityManager->getRepository(Prouct::class)->find($productId);

        if(!$product){
            echo '\n Product not found';
        }else{
            $entityManager->remove($product);
            $entityManager->flush();
        }

    }

}
