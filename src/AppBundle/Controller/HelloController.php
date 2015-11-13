<?php
/**
 * Created by PhpStorm.
 * User: pueppi
 * Date: 13.11.15
 * Time: 04:07
 */

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;

class HelloController
{
    private $templating;

    public function __construct(EngineInterface $templating)
    {
        $this->templating = $templating;
    }

//    public function indexAction($name)
//    {
//        return new Response('<html><body>Hello '.$name.'!<body><html>');
//    }

    // render per injected templating service
    public function  indexAction($name)
    {
        return $this->templating->renderResponse(
            'hello/greet.html.twig',
            array('name' => $name)
        );
    }
}