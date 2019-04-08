<?php
/**
 * Created by PhpStorm.
 * User: NumeriCall
 * Date: 4/8/2019
 * Time: 3:38 PM
 */

namespace App\Controller;

use App\Entity\Picture;
use App\Form\PictureFormType;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;


class PictureController
{
    /**
     * @Route("/add/picture", name="add_picture")
     */
    public function addPicture(
        Request $request,
        FormFactoryInterface $formFactory,
        Environment $twig
    ) {
        $picture = new Picture();
        $form = $formFactory ->create(
            PictureFormType::class,
            $picture,
            ['standalone' => true]
        );
        $form -> handleRequest($request);

        if($form -> isSubmitted() && $form->isValid()){
            //TODO: make the process here
//            $form=$picture->

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($picture);
            $entityManager->flush();
        }
        return new Response(
            $twig->render(
                'Picture/addForm.html.twig',
                ['form' => $form->createView()]
            )
        );
    }
}