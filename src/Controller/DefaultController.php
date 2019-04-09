<?php
/**
 * Created by PhpStorm.
 * User: NumeriCall
 * Date: 4/1/2019
 * Time: 2:48 PM
 */

namespace App\Controller;

use App\Repository\PictureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class DefaultController
{
    /**
     * @Route("/", name="homepage")
     * @param Environment $twig
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function homepageAction(
        Environment $twig,
        PictureRepository $repository
    ) {
        $color='blue';

        return new Response(
            $twig->render(
                'Default/homepage.html.twig',
                        [
//                            'color'=>$color,
//                            'itemList'=>[1,2,50,8,7,654,24],
//                            'currentDate'=>new \DateTime(),
                            'picture' => $repository->findAll()
                        ]

            )
        );


    }

    /**
     * @Route("/terms", name="term_of_service")
     * @return Response
     */
    public function termOfServiceAction()
    {
        return new Response('<DOCTYPE><html>
        <body>This are the terms ...</body>
        </html>');
    }
}