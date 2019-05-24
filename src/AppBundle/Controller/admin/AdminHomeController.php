<?php
  /**
   * Created by PhpStorm.
   * User: jeromesuhard*
   */
  namespace AppBundle\Controller\admin;



  use AppBundle\Entity\Home;
  use AppBundle\Entity\LeShow;
  use AppBundle\Form\HomeType;
  use Symfony\Bundle\FrameworkBundle\Controller\Controller;
  use Symfony\Component\HttpFoundation\Request;
  use Symfony\Component\Routing\Annotation\Route;
  use Symfony\Component\HttpFoundation\File\Exception\FileException;
  use Symfony\Component\HttpFoundation\File\File; // pour modifier image crée chemin




  class AdminHomeController extends Controller
  {
    // Afficher tous les spectacles avec droits d'administration


//-----------------------------------------------------------------------------------------
    // Afficher un spectacle en fonction de l'id avec fonction d'administration
    /**
     * @Route("/admin/home/{id}", name="admin_home_id")
     * Je récupère une instance de Doctrine qui appelle une instense de repository
     */

    public function AdminHomeIdAction($id = 1)

    {


      $repository = $this->getDoctrine()->getRepository(Home::class);

      $home = $repository->find($id);
      $leShows = $repository->findAll();


      return $this->render('@App/admin/home.html.twig',
        [
          'home' => $home,
          'leShows' => $leShows
        ]);


    }
// ----------------------------------------------------------------
    //CREATION De la page d'accueil (ne servira qu'une fois: une méthode "update permettra ensuite de la modifier à volonté"
    /**
     * @Route("/admin/create_home", name="create_home")
     */

    public function formCreateHome(Request $request)

    {
      /* Création d'un nouveau formulaire à partir d'un gabarit "LeShowType" */
      $form = $this->createForm(HomeType::class, new Home);


      /* Associe les données envoyées (éventuellement) par le client via le formulaire à notre variable $form.
      Donc la variable $form contient maintenant aussi les données de $_POST*/
      $form->handleRequest($request);

      /* Si le formulaire est soumis */
      if ($form->isSubmitted()) {

        /* Si le formulaire respecte les contraintes */
        if ($form->isValid()) {
          /* Upload d'image*/
          /* Compteur pour concaténer le nom de chacune des 6 images sur le modèle :"nom . $i" (1 <= $i >= 6) */
          for ($i = 1; $i <= 6; $i++) {

            /* On récupère une entité image grâce aux données envoyées par le formulaire */
            $img = $form->getData();
            $getImg = 'getImg' . $i;
            $File = $img->$getImg();


            /* Renomme l'image pour éviter les doublons de nom */

            /* Si il y a au moins une image à téléverser*/
            if (!is_null($File)) {
              /* On lui donne nom unique grace à la classe "guessExtension" */
              $filename = md5(uniqid()) . '.' . $File->guessExtension();


              try {
                /* Si réussite, on transfert le fichier dans le bon repertoire*/

                $File->move(
                  $this->getParameter('upl_directory'),
                  $filename
                );
                /* Si échec on affiche un message d'erreur*/
              } catch (FileException $e) {
                echo $e->getMessage();
              }
              // important alimente nouveau nom fichier image
              $setImg = 'setImg' . $i;
              $img->$setImg($filename);
            }
          }

          /* Je récupère l'entité manager de doctrine */
          $entityManager = $this->getDoctrine()->getManager();


          /* Je stocke temporairement les données dans l'unité de travail */
          $entityManager->persist($img);



          /* Je "pousse" les données dans la Bdd*/
          $entityManager->flush();


          /* J'affiche les messages flash confirmant l'enregistrement */
          $this->addFlash(
            'notice-icon',
            '<i class="flash-icon success fal fa-check"></i>'
          );
          $this->addFlash(
            'notice',
            '<h1 class="h1-flash">Le spectacle a été enregistré</h1>'
          );

//        /* Je redirige ensuite sur la page des spectacles */
          return $this->redirectToRoute('admin_shows');

        } else {
          /* Si les contraintes n'ont pas été respectées j'affice un message d'erreur */
          $this->addFlash(
            'error-icon',
            '<i class="flash-icon error fal fa-times"></i>'
          );
          $this->addFlash(
            'error',
            '<h1 class="h1-flash">Le spectacle n\'a été enregistré</h1>'
          );
        }
      }

      // cherche un spectacle avec instance de getDoctrine -> méthode get Repository
      // puis ->find( spectacle )
      $repository = $this->getDoctrine()->getRepository(LeShow::class);

      $leShows = $repository->findAll();
      /* Quand j'arrive sur la route "create_show" je vais directement sur le formulaire dont les champs sont définis dans  LeShowType,
      et qui seront affichés grace à twig*/
      return $this->render('@App/admin/EditHome.html.twig',
        [
          'formhome' => $form->createView(),
          'leShows' => $leShows
        ]);
    }

  }