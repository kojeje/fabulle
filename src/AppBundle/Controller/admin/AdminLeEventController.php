<?php
  /**
   * Created by PhpStorm.
   * User: jeromesuhard
   * Date: 09/01/2019
   * Time: 21:25
   */
  namespace AppBundle\Controller\admin;



  use AppBundle\Entity\LeEvent;
  use AppBundle\Entity\LeShow;
  use AppBundle\Form\LeEventType;
  use Symfony\Bundle\FrameworkBundle\Controller\Controller;
  use Symfony\Component\HttpFoundation\Request;
  use Symfony\Component\Routing\Annotation\Route;


  class AdminLeEventController extends Controller
  {

    // Afficher tous les spectacles avec droits d'administration


    /**
     * @Route("/admin/events", name="admin_events")
     */
    public function listEventsAdminAction()
    {

   $repository = $this->getDoctrine()->getRepository(Post::class);
//    on récupère l'ensemble des articles
      $posts = $repository->findAll();
//      On récupère le contenu de l'Entity dans la variable repository
      $repository = $this->getDoctrine()->getRepository(LeShow::class);
      $leShows = $repository->findAll();
//      On récupère le contenu de l'Entity dans la variable repository
      $repository = $this->getDoctrine()->getRepository(LeEvent::class);
//      on récupère l'ensemble des articles
      $leEvents = $repository->findAll();
//      On récupère le contenu de l'Entity dans la variable repository
      $repository = $this->getDoctrine()->getRepository(Place::class);
//      on récupère l'ensemble des articles
      $places = $repository->findAll();





//      var_dump($leShows);die;
      return $this->render('@App/admin/events.html.twig',
        [

          'posts' => $posts,
          'leShows' => $leShows,
          'leEvents' => $leEvents,



        ]);

    }


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

          /* J'affiche les messages flash confirmant l'enregistrement */
          $this->addFlash(
            'notice-icon',
            '<i class="flash-icon success fal fa-check"></i>'
          );
          $this->addFlash(
            'notice',
            '<h1 class="h1-flash">L\'évènement a été enregistré</h1>'
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
          /* Si les contraintes n'ont pas été respectées j'affice un message d'erreur */
          $this->addFlash(
            'error-icon',
            '<i class="flash-icon error fal fa-times"></i>'
          );
          $this->addFlash(
            'error',
            '<h1 class="h1-flash">L\'évènement n\'a été enregistré</h1>'
          );
        }
//      /* Je redirige ensuite sur la liste des évènements*/

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