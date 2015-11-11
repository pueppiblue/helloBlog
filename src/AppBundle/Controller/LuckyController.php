<?php
/**
 * Created by PhpStorm.
 * User: pueppi
 * Date: 10.11.15
 * Time: 19:05
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class LuckyController extends Controller
{

    public function numberAction($count)
    {
        $numbers = array();
        for ($i = 0; $i < $count; $i++) {
            $numbers[] = rand(0, 200);
        }
        $numbersList = implode(', ', $numbers);

        return new Response(
            '<html><body>Lucky numbers: '.$numbersList.'</body></html>'
        );

    }

//    public function piNumberAction()
//    {
//        $data = array(
//                'lucky_number' => rand(0,100),
//        );
//
////        return new Response(
////            json_encode($data),
////            200,
////            array('Content-Type' => 'application/json')
////        );
//        return new JsonResponse($data);
 //   }
}