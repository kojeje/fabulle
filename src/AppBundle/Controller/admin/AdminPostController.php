<?php
  /**
   * Created by PhpStorm.
   * User: jeromesuhard*
   */
  namespace AppBundle\Controller\admin;



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
        $repository = $this->getDoctrine()->getRepository(Post::class);

        $post = $repository->find($id);

        return $this->render('@App/admin/Post.html.twig',
          [
            'post' => $post

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

      /* Création d'un nouveau formulaire à partir d'un gabarit "PostType" */
      $form = $this->createForm(PostType::class, new Post);

      /* Associe les données envoyées (éventuellement) par le client via le formulaire à notre variable $form.
      Donc la variable $form contient maintenant aussi les données de $_POST*/
      $form->handleRequest($request);


      if ($form->isSubmitted()) {

        /* Si le formulaire respecte les contraintes */
        if ($form->isValid()) {
          /* Upload d'image*/
          /* Compteur pour limiter le nombre d'image, jusqu'à 6 */
          for ($i = 1; $i <= 6; $i++) {

            /* On récupère une entité image grâce aux données envoyées par le formulaire */
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


          /* Je récupère l'entité manager de doctrine */
          $entityManager = $this->getDoctrine()->getManager();


          /* Je stocke temporairement les données dans l'unité de travail */
          $entityManager->persist($img);



          /* Je "pousse" les données dans la Bdd*/
          $entityManager->flush();


          /* J'affiche un message flash confirmant l'enregistrement */
          $this->addFlash(
            'notice',
            'L\'article a été enregistré'
          );

        } else {
          /* Si les contraintes n'ont pas été respectées j'affice un message d'erreur */
          $this->addFlash(
            'error',
            'L\'article n\'a pas pu être enregistré'
          );
        }
//      /* Je redirige ensuite sur la liste des articles*/
        return $this->redirectToRoute('admin_posts');
      }

      /* Quand j'arrive sur la route "ajout_page_form" je vais directement sur le formulaire dont les champs sont définis dans le LeShowType,
      et qui seront affichés dans la twig*/
      return $this->render('@App/admin/CreatePost.html.twig',
        [
          'formPost' => $form->createView()
        ]);


//
    }
  }
