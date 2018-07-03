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
     * @Route("/lucky/number", name="Standard_Number_Action")
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

    /**
     * @Route("/api/lucky/number", name="API_Number_Action")
     */
    public function apiNumberAction()
    {
        $data = array('lucky_number' => rand(0, 100));

        return new Response(json_encode($data),
                        200,
                        array('Content-Type' => 'application/json')
                    );
    }

    /**
     * @Route("/lucky/number/{count}", name="Dynamic_Number_Action")
     */
    public function dynamicNumberAction($count)
    {
        $numbers = array();
        for($i=0; $i<$count; $i++)
        {
            $numbers[] = rand(0, 100);
        }
        $numbersList = implode(",", $numbers);

        return new Response('<html><body>Numbers : '.$numbersList.'</body></html>');
    }


}