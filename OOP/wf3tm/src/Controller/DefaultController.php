<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
class DefaultController extends Controller
{
    public function homepage()
    {
        $loggedState = true;
        $elementList = range(1,10);
        //return new Response('<html><body>Hello World!</body></html>');
        return $this->render(
            'example.html.twig',
            [
                'islogged'=>$loggedState,
                'elements'=>$elementList
            ]
        );

    }
}

