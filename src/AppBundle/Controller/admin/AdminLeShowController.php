<?php
  /**
   * Created by PhpStorm.
   * User: jeromesuhard*
   */
  namespace AppBundle\Controller\admin;



  use AppBundle\Entity\LeShow;
  use AppBundle\Form\LeShowType;
  use Symfony\Bundle\FrameworkBundle\Controller\Controller;
  use Symfony\Component\HttpFoundation\Request;
  use Symfony\Component\Routing\Annotation\Route;
  use Symfony\Component\HttpFoundation\File\Exception\FileException;




  class AdminLeShowController extends Controller
  {
 // Afficher tous les spectacles avec droits d'administration


    /**
     * @Route("/admin/shows", name="admin_shows")
     */
    public function listShowsAdminAction()
    {
      $repository = $this->getDoctrine()->getRepository(LeShow::class);

      $leShows = $repository->findAll();

      return $this->render('@App/public/shows.html.twig',
        [
          'leShows' => $leShows
        ]);
    }
// ----------------------------------------------------------------
  //CREATION D'ARTICLE "Spectacle"
    /**
     * @Route("/admin/create_show", name="create_show")
     */

    public function formCreateShow(Request $request)

    {

      /* Création d'un nouveau formulaire à partir d'un gabarit "LeShowType" */
      $form = $this->createForm(LeShowType::class, new LeShow);

      /* Associe les données envoyées (éventuellement) par le client via le formulaire à notre variable $form.
      Donc la variable $form contient maintenant aussi les données de $_POST*/
      $form->handleRequest($request);


      if ($form->isSubmitted()) {

        /* Si le formulaire respecte les contraintes */
        if ($form->isValid()) {
          /* Upload d'image*/
          /* Compteur pour limiter le nombre d'image, jusqu'à 6 */
          for ($i = 1; $i <= 6; $i++) {

            /* On récupère une entité photo grâce aux données envoyées par le formulaire */
            $img = $form->getData();
            $getImg = 'getImg' . $i;
            $File = $img->$getImg();


            /* Renomme l'image pour éviter les doublons de nom */

            /* Si il y a une image à téléverser*/
            if (!is_null($File)) {
              /* On lui donne nom unique*/
              $filename = md5(uniqid()) . '.' . $File->guessExtension();


              try {
                /* Si réussite, on transfert le fichier dans le bon repertoire*/

                $File->move(
                  $this->getParameter('img_directory'),
                  $filename
                );
                /* Si échec on affiche un message d'erreur*/
              } catch (FileException $e) {
                echo $e->getMessage();
              }

              $setImg = 'setImg' . $i;
              $img->$setImg($filename);
            }




          }

          $tek = $form->getData();
          $getFichetek = 'getFichetek';
          $File = $tek->$getFichetek();

          /* Si il y a une image*/
          if (!is_null($File)) {
            $filename = md5(uniqid()) . '.' . $File->guessExtension();


            try {

              $File->move(
                $this->getParameter('img_directory'),
                $filename
              );
            } catch (FileException $e) {
              echo $e->getMessage();
            }

            $setImg = 'setFichetek';
            $img->$setImg($filename);
          }




          /* Je récupère l'entité manager de doctrine */
          $entityManager = $this->getDoctrine()->getManager();


          /* Je stocke temporairement les données dans l'unité de travail */
          $entityManager->persist($img);
          $entityManager->persist($tek);


          /* Je "pousse" les données dans la Bdd*/
          $entityManager->flush();


          /* J'affiche un message flash confirmant l'enregistrement */
          $this->addFlash(
            'notice',
            'Le spectacle a été enregistré'
          );

        } else {
          /* Si les contraintes n'ont pas été respectées j'affice un message d'erreur */
          $this->addFlash(
            'error',
            'Le spectacle n\'a pas pu être enregistré'
          );
        }
//      Je redirige ensuite sur la page de l'article
        return $this->redirectToRoute('public_shows');
      }

      /* Quand j'arrive sur la route "create_show" je vais directement sur le formulaire dont les champs sont définis dans  LeShowType,
      et qui seront affichés grace à twig*/
      return $this->render('@App/admin/CreateLeShow.html.twig',
        [
          'formleshow' => $form->createView()
        ]);


//
    }
  }
