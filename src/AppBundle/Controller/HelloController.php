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
use Symfony\Component\HttpFoundation\Session\Session;

class HelloController
{
    private $templating;
    private $session;

    public function __construct(EngineInterface $templating, Session $session)
    {
        $this->templating = $templating;
        $this->session = $session;
    }

//    public function indexAction($name)
//    {
//        return new Response('<html><body>Hello '.$name.'!<body><html>');
//    }

    // render per injected templating service
    public function indexAction($name)
    {
        $this->session->getFlashBag()->add('notice','Bist du geflashed?');
        return $this->templating->renderResponse(
            'hello/greet.html.twig',
            array('name' => $name)
        );
    }
}