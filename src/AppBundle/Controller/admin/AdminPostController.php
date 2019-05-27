<?php
  /**
   * Created by PhpStorm.
   * User: jeromesuhard*
   */
  namespace AppBundle\Controller\admin;



  use AppBundle\Entity\LeShow;
  use AppBundle\Entity\leEvent;
  use AppBundle\Entity\Post;
  use AppBundle\Form\PostType;
  use Symfony\Bundle\FrameworkBundle\Controller\Controller;
  use Symfony\Component\HttpFoundation\Request;
  use Symfony\Component\Routing\Annotation\Route;
  use Symfony\Component\HttpFoundation\File\Exception\FileException;




  class AdminPostController extends Controller
  {
  // Afficher tous les articles avec droits d'administration


    /**
     * @Route("/admin/posts", name="admin_posts")
     */
    public function listPostsAdminAction()
    {
      $repository = $this->getDoctrine()->getRepository(Post::class);

      $posts = $repository->findAll();

      return $this->render('@App/admin/posts.html.twig',
        [
          'posts' => $posts
        ]);
    }
// ----------------------------------------------------------------
//  Afficher coté admin un article en fonction de l'id
    /**
     * @Route("/admin/post/{id}", name="admin_post")
     * Je récupère une instance de Doctrine qui appelle une instense de repository
     */

    public function PostAdminIdAction($id)

    {
      {


//      On récupère le contenu de l'Entity dans la variable repository
        $repository = $this->getDoctrine()->getRepository(Post::class);
//      on récupère l'article en fonction de l'id
        $post = $repository->find($id);
//      on récupère l'ensemble des articles
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


        return $this->render('@App/admin/Post.html.twig',
          [
            'post' => $post,
            'posts' => $posts,
            'leShows' => $leShows,
            'leEvents' => $leEvents,



          ]);
      }
    }
// ----------------------------------------------------------------
//CREATION D'ARTICLE
    /**
     * @Route("/admin/create_post", name="create_post")
     */

    public function formCreatePost(Request $request)

    {
      $repository = $this->getDoctrine()->getRepository(LeShow::class);
      $leShows = $repository->findAll();
      $repository = $this->getDoctrine()->getRepository(LeEvent::class);
      $leEvents = $repository->findAll();
      $repository = $this->getDoctrine()->getRepository(Post::class);
      $posts = $repository->findAll();


      /* Création d'un nouveau formulaire à partir d'un gabarit "LeShowType" */
      $form = $this->createForm(PostType::class, new Post);


      /* Associe les données envoyées (éventuellement) par le client via le formulaire à notre variable $form.
      Donc la variable $form contient maintenant aussi les données de $_POST*/
      $form->handleRequest($request);

      /* Si le formulaire est soumis */
      if ($form->isSubmitted()) {

        /* Si le formulaire respecte les contraintes */
        if ($form->isValid()) {
          /* Upload d'image*/
          /* Compteur pour concaténer le nom de chacune des 6 images sur le modèle :"nom . $i" (1 <= $i >= 6) */
          for ($i = 1; $i <= 5; $i++) {

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
            '<h1 class="h1-flash">L\'article ou la page a été enregistré</h1>'
          );

//        /* Je redirige ensuite sur la page des articles */
          return $this->redirectToRoute('admin_posts');

        } else {
          /* Si les contraintes n'ont pas été respectées j'affice un message d'erreur */
          $this->addFlash(
            'error-icon',
            '<i class="flash-icon error fal fa-times"></i>'
          );
          $this->addFlash(
            'error',
            '<h1 class="h1-flash">L\'article ou la page n\'a pas été enregistré</h1>'
          );
        }
      }

      /* Quand j'arrive sur la route "create_show" je vais directement sur le formulaire dont les champs sont définis dans  LeShowType,
      et qui seront affichés grace à twig*/
      return $this->render('@App/admin/CreatePost.html.twig',
        [
          'formpost' => $form->createView(),
          'leShows' => $leShows,
          'leEvents' => $leEvents,
          'posts' => $posts
        ]);




    }
  }
