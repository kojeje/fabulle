<?php
  /**
   * Created by PhpStorm.
   * User: jeromesuhard
   * Date: 09/01/2019
   * Time: 21:25
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
//CREATION D'ARTICLE
    /**
     * @Route("/admin/create_post", name="create_post")
     */

    public function formCreatePost(Request $request)

    {

      /* Création d'un nouveau formulaire à partir d'un gabarit "Pagetype" */
      $form = $this->createForm(PostType::class, new Post);

      /* Associe les données envoyées (éventuellement) par le client via le formulaire à notre variable $form.
      Donc la variable $form contient maintenant aussi les données de $_POST*/
      $form->handleRequest($request);


      if ($form->isSubmitted()) {


        /* Si le formulaire respecte les contraintes */
        if ($form->isValid()) {

          for ($i=1; $i<=4; $i++){

            /* On récupère une entité photo grâce aux données envoyées par le formulaire */
            $img=$form->getData();

            $getImg = 'getImg'.$i;
            $File= $img->$getImg();


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

            $setImg = 'setImg'.$i;
            $img->$setImg($filename);

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
            'L\'article été enregistré'
          );
        } else {
          /* Si les contraintes n'ont pas été respectées j'affice un message d'erreur */
          $this->addFlash(
            'error',
            'L\'article n\'a pas pu être enregistré'
          );
        }
//                /* Je redirige ensuite sur la liste des pages*/
//                return $this->redirectToRoute('admin_pages');
      }

      /* Quand j'arrive sur la route "ajout_page_form" je vais directement sur le formulaire dont les champs sont définis dans le PostType,
      et qui seront affichés dans la twig*/
      return $this->render('@App/admin/CreatePost.html.twig',
        [
          'formPost' => $form->createView()
        ]);

    }

//    UPDATE ARTICLE
    /**
     * @Route("/admin/update_post/{id}", name="admin_update_post")
     */
    public function updatePostAction(Request $request, $id)
    {
      $repository = $this->getDoctrine()->getRepository(Post::class);
      $post = $repository->find($id);
      $form = $this->createForm(PostType::class, $post);
      $form->handleRequest($request);
      if ($form->isSubmitted() && $form->isValid())
      {
        $post = $form->getData();
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($post);
        $entityManager->flush();
        /* Affiche un message flash */
        $this->addFlash(
          'notice',
          'Le contenu de l\'article a été modifié'
        );
        return $this->redirectToRoute('admin_post');
      }
      return $this->render('@App/admin/UpdatePost.html.twig',
        [
          'formPost' => $form->createView()
        ]);
    }
  }