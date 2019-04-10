<?php
  /**
   * Created by PhpStorm.
   * User: jeromesuhard
   * Date: 09/01/2019
   * Time: 21:25
   */
  namespace AppBundle\Controller\admin;



  use AppBundle\Entity\Place;
  use AppBundle\Form\PlaceType;
  use Symfony\Bundle\FrameworkBundle\Controller\Controller;
  use Symfony\Component\HttpFoundation\Request;
  use Symfony\Component\Routing\Annotation\Route;
  use Symfony\Component\HttpFoundation\File\Exception\FileException;




  class AdminPlaceController extends Controller
  {

    /**
     * @Route("/admin/create_place", name="create_place")
     */

    public function formCreatePlace(Request $request)

    {

      /* Création d'un nouveau formulaire à partir d'un gabarit "Pagetype" */
      $form = $this->createForm(PlaceType::class, new Place);

      /* Associe les données envoyées (éventuellement) par le client via le formulaire à notre variable $form.
      Donc la variable $form contient maintenant aussi les données de $_POST*/
      $form->handleRequest($request);


      if ($form->isSubmitted()) {


        /* Si le formulaire respecte les contraintes */
        if ($form->isValid()) {



            /* On récupère une entité photo grâce aux données envoyées par le formulaire */
            $img1=$form->getData();

            $getImg1 = 'getImg1';
            $File= $img1->$getImg1();


            /* Renomme l'image pour éviter les doublons de nom */

            $filename = md5(uniqid()) . '.' . $File->guessExtension();

            try {

              $File->move(
                $this->getParameter('img_directory'),
                $filename
              );
            } catch (FileException $e) {
              echo $e->getMessage();
            }

            $setImg = 'setImg1';
            $img1->$setImg($filename);


          /* Je récupère l'entité manager de doctrine */
          $entityManager = $this->getDoctrine()->getManager();

          /* Je stocke temporairement les données dans l'unité de travail */
          $entityManager->persist($img1);

          /* Je "pousse" les données dans la Bdd*/
          $entityManager->flush();

          /* J'affiche un message flash confirmant l'enregistrement */
          $this->addFlash(
            'notice',
            'L\'article été enregistré'
          );
        } else {
          /* Si les contraintes n'ont pas été respectées j'affice un message d'erreur */
          $this->addFlash(
            'error',
            'L\'article n\'a pas pu être enregistré'
          );
        }
//                /* Je redirige ensuite sur la liste des places*/
//                return $this->redirectToRoute('admin_places');
      }

      /* Quand j'arrive sur la route "create_place" je vais directement sur le formulaire dont les champs sont définis dans le PlaceType,
      et qui seront affichés dans la twig*/
      return $this->render('@App/admin/CreatePlace.html.twig',
        [
          'formPlace' => $form->createView()
        ]);

    }

//
  }