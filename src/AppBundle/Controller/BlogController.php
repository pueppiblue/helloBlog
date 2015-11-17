<?php
/**
 * Created by PhpStorm.
 * User: pueppi
 * Date: 17.11.15
 * Time: 14:55
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;


class BlogController
{
    private $templating;

    public function __construct(EngineInterface $templating)
    {
        $this->templating = $templating;
    }

    public function indexAction($page)
    {
        $entryList = [
            '1' => "foo",
            '2' => "bar",
        ];

        return $this->templating->renderResponse(
            "blog/blogList.html.twig",
            array('entryList' => $entryList,
                  'blogPage' => $page
            )
        );
    }

    public function showAction($slug)
    {
        //...
        return $this->templating->renderResponse(
                "base.html.twig"
        );

    }
}