<?php
  /**
   * Created by PhpStorm.
   * User: jeromesuhard
   * Date: 09/01/2019
   * Time: 21:25
   */
  namespace AppBundle\Controller\admin;

  use AppBundle\Entity\Place;
  use AppBundle\Entity\LeShow;
  use AppBundle\Entity\Post;
  use AppBundle\Entity\LeEvent;
  use AppBundle\Form\PlaceType;
  use Symfony\Bundle\FrameworkBundle\Controller\Controller;
  use Symfony\Component\HttpFoundation\Request;
  use Symfony\Component\Routing\Annotation\Route;
  use Symfony\Component\HttpFoundation\File\Exception\FileException;

  class AdminPlaceController extends Controller
  {

    // Afficher tous les Le Lieux avec droits d'administration


    /**
     * @Route("/admin/places", name="admin_places")
     */
    public function listPlacesAdminAction()
    {
      $repository = $this->getDoctrine()->getRepository(LeShow::class);
      $leShows = $repository->findAll();
      $repository = $this->getDoctrine()->getRepository(LeEvent::class);
      $leEvents = $repository->findAll();
      $repository = $this->getDoctrine()->getRepository(Post::class);
      $posts = $repository->findAll();
      $repository = $this->getDoctrine()->getRepository(Place::class);
      $place = $repository->findAll();



//      var_dump($leShows);die;
      return $this->render('@App/admin/shows.html.twig',
        [
          'leShows' => $leShows,
          'posts' => $posts,
          'leEvents' => $leEvents,
          'place' => $place

        ]);

    }
    // Afficher un lieu en fonction de l'id avec fonction d'administration
    /**
     * @Route("/admin/place/{id}", name="admin_place_id")
     * Je récupère une instance de Doctrine qui appelle une instense de repository
     */

    public function AdminPlaceIdAction($id)

    {
//    On récupère le contenu de l'Entity dans la variable repository
      $repository = $this->getDoctrine()->getRepository(Place::class);
      $place = $repository->getPlaceByEventId($id);



//      on récupère l'ensemble des articles
      $places = $repository->findAll();

//    On récupère le contenu de l'Entity dans la variable repository
      $repository = $this->getDoctrine()->getRepository(LeShow::class);
//    on récupère l'ensemble des articles
      $leShows = $repository->findAll();

//    On récupère le contenu de l'Entity dans la variable repository
      $repository = $this->getDoctrine()->getRepository(LeEvent::class);
//      on récupère l'ensemble des articles
      $leEvents = $repository->findAll();

//    On récupère le contenu de l'Entity dans la variable repository
      $repository = $this->getDoctrine()->getRepository(Post::class);
//    on récupère l'ensemble des articles
      $posts = $repository->findAll();



      return $this->render('@App/admin/place.html.twig',
        [
          'leShows' => $leShows,
          'posts' => $posts,
          'leEvents' => $leEvents,
          'places' => $places,
          'place' => $place,
          'id' => $id

        ]);




    }
    /**
     * @Route("/admin/create_place", name="create_place")
     */

    public function formCreatePlace(Request $request)

    {
//    On récupère le contenu de l'Entity dans la variable repository
      $repository = $this->getDoctrine()->getRepository(Place::class);
//      on récupère l'ensemble des articles
      $places = $repository->findAll();

//    On récupère le contenu de l'Entity dans la variable repository
      $repository = $this->getDoctrine()->getRepository(LeShow::class);
//    on récupère l'ensemble des articles
      $leShows = $repository->findAll();

//    On récupère le contenu de l'Entity dans la variable repository
      $repository = $this->getDoctrine()->getRepository(LeEvent::class);
//      on récupère l'ensemble des articles
      $leEvents = $repository->findAll();


//    On récupère le contenu de l'Entity dans la variable repository
      $repository = $this->getDoctrine()->getRepository(Post::class);
//    on récupère l'ensemble des articles
      $posts = $repository->findAll();


      /* Création d'un nouveau formulaire à partir d'un gabarit "Placetype" */
      $form = $this->createForm(PlaceType::class, new Place);

      /* Associe les données envoyées (éventuellement) par le client via le formulaire à notre variable $form.
      Donc la variable $form contient maintenant aussi les données de $_POST*/
      $form->handleRequest($request);


      if ($form->isSubmitted()) {


        /* Si le formulaire respecte les contraintes */
        if ($form->isValid()) {
          //Je récupère les données du formulaire
          $place = $form->getData();
          /* Je récupère l'entité manager de doctrine */
          $entityManager = $this->getDoctrine()->getManager();

          /* Je stocke temporairement les données dans l'unité de travail */
          $entityManager->persist($place);

          /* Je "pousse" les données dans la Bdd*/
          $entityManager->flush();

          /* J'affiche un message flash confirmant l'enregistrement */
          $this->addFlash(
            'notice-icon',
            '<i class="flash-icon success fal fa-check"></i>'
          );
          $this->addFlash(
            'notice',
            '<h1 class="h1-flash">Le Lieu a été enregistré</h1>'
          );
        } else {
          /* Si les contraintes n'ont pas été respectées j'affice un message d'erreur */
          $this->addFlash(
            'error-icon',
            '<i class="flash-icon error fal fa-times"></i>'
          );
          $this->addFlash(
            'error',
            '<h1 class="h1-flash">Le Lieu n\'a été enregistré</h1>'
          );
        }
      }

      /* Quand j'arrive sur la route "create_place" je vais directement sur le formulaire dont les champs sont définis dans le PlaceType,
      et qui seront affichés dans la twig*/
      return $this->render('@App/admin/CreatePlace.html.twig',
        [
          'formplace' => $form->createView(),
          'leShows' => $leShows,
          'posts' => $posts,
          'leEvents' => $leEvents,
          'places' => $places

        ]);

    }

//--------------------------------------------------------------------------------------------------------------------------------------------
    //UPDATE Lieu

    /**
     * @Route("/admin/update_place/{id}", name="admin_update_place")
     */
    public function UpdatePlaceAction(Request $request, $id)
    {

      // cherche un spectacle avec instance de getDoctrine -> méthode get Repository
      // puis ->find( spectacle )
      $repository = $this->getDoctrine()->getRepository(Place::class);
      $place = $repository->find($id);
      $repository = $this->getDoctrine()->getRepository(LeShow::class);
      $leShows = $repository->findAll();
      $repository = $this->getDoctrine()->getRepository(LeEvent::class);
      $leEvents = $repository->findAll();
      $repository = $this->getDoctrine()->getRepository(Post::class);
      $posts = $repository->findAll();





      //recherche entité leShow existant, puis créé la forme
      $form = $this->createForm(PlaceType::class, $place);

      // associe les données envoyées (éventuellement) par le client via le formulaire
      //à notre variable $form. Donc la variable $form contient maintenant aussi $_POST
      //handlerequest reremplit le formulaire, récupère données et les reinjecte dans formulaire
      $form->handleRequest($request);
//      var_dump($form->getData()->getImg1());die;

      //isSubmitted vérifie si il y a bien un contenu form envoyé, puis on regarde si valide (à compléter plus tard)

      /* Si le formulaire est soumis */
      if ($form->isSubmitted()) {
        if ($form->isValid()) {
          $place = $form->getData();

          // je récupère l'entity manager de doctrine
          $entityManager = $this->getDoctrine()->getManager();


          // j'enregistre en base de donnée, persist met dans zone tampon provisoire de l'unité de travail
          $entityManager->persist($place);
          //mise à jour BD, envoy à bd
          $entityManager->flush();

          // Renvoi de confirmation d'enregistrement Message flash
          /* J'affiche un message flash confirmant l'enregistrement */
          $this->addFlash(
            'notice-icon',
            '<i class="flash-icon success fal fa-check"></i>'
          );
          $this->addFlash(
            'notice',
            '<h1 class="h1-flash">Le Lieu a été enregistré</h1>'
          );
        } else {
          /* Si les contraintes n'ont pas été respectées j'affice un message d'erreur */
          $this->addFlash(
            'error-icon',
            '<i class="flash-icon error fal fa-times"></i>'
          );
          $this->addFlash(
            'error',
            '<h1 class="h1-flash">Le Lieu n\'a été enregistré</h1>'
          );
        }
      }


      return $this->render(
        '@App/admin/CreateLeShow.html.twig',
        [
          'formleshow' => $form->createView(),
          'leShows' => $leShows,
          'posts' => $posts,
          'leEvents' => $leEvents,
          'place' => $place


        ]);
    }
  }