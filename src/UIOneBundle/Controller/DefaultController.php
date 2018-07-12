<?php

namespace UIOneBundle\Controller;

use AppBundle\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/UIOne/1")
     */
    public function indexAction()
    {
        $products = [
            [
                'id' => '1',
                'name' => 'Keyboard',
                'price' => 20,
                'desc' => 'Dope'
            ],
            [
                'id' => '2',
                'name' => 'Mouse',
                'price' => 15,
                'desc' => 'Dopper'
            ]
        ];
        return $this->render('@UIOneBundle/Resources/views/Default/index.html.twig', ['products' => $products] );
    }

    /**
     * @Route("/UIOne/2")
     */
    public function docAction()
    {
        $repository = $this->getDoctrine()->getRepository(Product::class);
        $product = $repository->findAll();

        /*
        foreach($product as $prod){
            echo $prod->getId().' ';
            echo $prod->getName().' ';
            echo $prod->getPrice().' ';
            echo $prod->getDescription().'<br>';
        }*/

        return $this->render('@UIOneBundle/Resources/views/Default/index.html.twig', ['products' => $product]);
    }


}
