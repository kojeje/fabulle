<?php
  /**
   * Created by PhpStorm.
   * User: jeromesuhard
   * Date: 09/01/2019
   * Time: 21:25
   */
  namespace AppBundle\Controller\admin;



  use AppBundle\Entity\LeEvent;
  use AppBundle\Form\LeEventType;
  use Symfony\Bundle\FrameworkBundle\Controller\Controller;
  use Symfony\Component\HttpFoundation\Request;
  use Symfony\Component\Routing\Annotation\Route;


  class AdminLeEventController extends Controller
  {

    /**
     * @Route("/admin/create_event", name="create_event")
     */

    public function formCreateEvent(Request $request)

    {


      /* Création d'un nouveau formulaire à partir d'un gabarit "Eventtype" */
      $form = $this->createForm(LeEventType::class, new LeEvent);

      /* Associe les données envoyées (éventuellement) par le client via le formulaire à notre variable $form.
      Donc la variable $form contient maintenant aussi les données de $_POST*/
      $form->handleRequest($request);


      if ($form->isSubmitted()) {


        /* Si le formulaire respecte les contraintes */
        if ($form->isValid()) {
          // je recupere une entité grace aux donnees envoye par le formulaire
          $leEvent = $form->getData();

          /* Je récupère l'entité manager de doctrine */

          $entityManager = $this->getDoctrine()->getManager();

          /* Je stocke temporairement les données dans l'unité de travail */
          $entityManager->persist($leEvent);

          /* Je "pousse" les données dans la Bdd*/
          $entityManager->flush();

          // Renvoi de confirmation d'enregistrement Message flash
          $this->addFlash(
            'notice-icon',
            '<i class="flash-icon success fal fa-check"></i>'
          );
          $this->addFlash(
            'notice',
            'Votre évènement a bien été modifié!'
          );

          return $this->redirectToRoute('admin_events');
        } else {
          $this->addFlash(
            'error-icon',
            '<i class="flash-icon error fal fa-times"></i>'
          );
          $this->addFlash(
            'notice',
            'Votre évènement n\'a pas été modifié!'
          );
        }
//      /* Je redirige ensuite sur la liste des pages*/

      }

      /* Quand j'arrive sur la route "ajout_page_form" je vais directement sur le formulaire dont les champs sont définis dans le PostType,
      et qui seront affichés dans la twig*/
      return $this->render('@App/admin/CreateLeEvent.html.twig',
        [
          'formleEvent' => $form->createView(),

        ]);

    }

//
  }