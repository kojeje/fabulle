<?php
  /**
   * Created by PhpStorm.
   * User: jeromesuhard
   * Date: 09/01/2019
   * Time: 21:25
   */
  namespace AppBundle\Controller\admin;



  use AppBundle\Entity\Event;
  use AppBundle\Form\EventType;
  use Symfony\Bundle\FrameworkBundle\Controller\Controller;
  use Symfony\Component\HttpFoundation\Request;
  use Symfony\Component\Routing\Annotation\Route;






  class AdminEventController extends Controller
  {

    /**
     * @Route("/admin/create_event", name="create_event")
     */

    public function formCreateEvent(Request $request)

    {

      /* Création d'un nouveau formulaire à partir d'un gabarit "Eventtype" */
      $form = $this->createForm(EventType::class, new Event);

      /* Associe les données envoyées (éventuellement) par le client via le formulaire à notre variable $form.
      Donc la variable $form contient maintenant aussi les données de $_POST*/
      $form->handleRequest($request);


      if ($form->isSubmitted()) {


        /* Si le formulaire respecte les contraintes */
        if ($form->isValid()) {
          // je recupere une entité grace aux donnees envoye par le formulaire
          $event = $form->getData();

          /* Je récupère l'entité manager de doctrine */

          $entityManager = $this->getDoctrine()->getManager();

          /* Je stocke temporairement les données dans l'unité de travail */
          $entityManager->persist($event);

          /* Je "pousse" les données dans la Bdd*/
          $entityManager->flush();

          /* J'affiche un message flash confirmant l'enregistrement */
          $this->addFlash(
            'notice',
            'L\'évènement a été enregistrée'
          );
        } else {
          /* Si les contraintes n'ont pas été respectées j'affice un message d'erreur */
          $this->addFlash(
            'error',
            'L\'évènement n\'a pas pu être enregistrée'
          );
        }
//                /* Je redirige ensuite sur la liste des pages*/
//                return $this->redirectToRoute('admin_pages');
      }

      /* Quand j'arrive sur la route "ajout_page_form" je vais directement sur le formulaire dont les champs sont définis dans le PostType,
      et qui seront affichés dans la twig*/
      return $this->render('@App/admin/CreateEvent.html.twig',
        [
          'formEvent' => $form->createView()
        ]);

    }

//
  }