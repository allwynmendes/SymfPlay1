<?php
/**
 * Created by PhpStorm.
 * User: allwyn
 * Date: 03/07/18
 * Time: 09:40
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class LuckyController
{

    /**
     * @Route("/lucky/number")
     */
    public function numberAction()
    {
        $number = rand(0, 100);

        return new Response('<html>
                                <body>
                                    <p>Lucky Number :'.$number.'</p>
                                </body>
                            </html>');

    }

}