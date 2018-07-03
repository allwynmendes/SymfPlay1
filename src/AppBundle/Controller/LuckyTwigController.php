<?php
/**
 * Created by PhpStorm.
 * User: allwyn
 * Date: 03/07/18
 * Time: 12:04
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class LuckyTwigController extends Controller
{

    /**
     * @Route("/lucky/numbertwig/{count}", name="DynamicTwig_Number_Action")
     */
    public function dynamicNumberAction($count)
    {
        $numbers = array();
        for($i=0; $i<$count; $i++)
        {
            $numbers[] = rand(0, 100);
        }
        $numbersList = implode(",", $numbers);

        $html = $this->render(
            'lucky/number.html.twig',
            array('luckyNumberList' => $numbersList)
        );

        return new Response($html);
    }


}