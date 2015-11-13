<?php
/**
 * Created by PhpStorm.
 * User: pueppi
 * Date: 10.11.15
 * Time: 19:05
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;

//class LuckyController extends Controller
class LuckyController
{
    private $templating;

    public function __construct(EngineInterface $templating)
    {
        $this->templating = $templating;
    }

    public function numberAction($count)
    {
        $numbers = array();
        for ($i = 0; $i < $count; $i++) {
            $numbers[] = rand(0, 200);
        }
        $numbersList = implode(', ', $numbers);

        // render per injected templating service
        return $this->templating->renderResponse(
            'lucky/number.html.twig',
            array('luckyNumberList' => $numbersList)
        );

        //render über render()-Methode der Controller Superclass ('extends Controller' required)
//        return $this->render(
//            'lucky/number.html.twig',
//            array('luckyNumberList' => $numbersList)
//        );

      //render über Container (Container muss bei service-controllern per 'calls:' geadded werden)
/*        $html = $this->container->get('templating')->render(
            'lucky/number.html.twig',
            array('luckyNumberList' => $numbersList)
        );

        return new Response($html);*/

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