<?php
  /**
   * Created by PhpStorm.
   * User: jeromesuhard*
   */
  namespace AppBundle\Controller\admin;



  use AppBundle\Entity\LeEvent;
  use AppBundle\Entity\LeShow;
  use AppBundle\Entity\Post;
  use AppBundle\Entity\Place;
  use AppBundle\Form\LeShowType;
  use Symfony\Bundle\FrameworkBundle\Controller\Controller;
  use Symfony\Component\HttpFoundation\Request;
  use Symfony\Component\Routing\Annotation\Route;
  use Symfony\Component\HttpFoundation\File\Exception\FileException;
  use Symfony\Component\HttpFoundation\File\File; // pour modifier image crée chemin




  class AdminController extends Controller
  {
    /**
     * @Route("/admin/", name="admin_home")
     */
    public function AdminHomeidAction()
    {

      $repository = $this->getDoctrine()->getRepository(Post::class);
      $post = $repository->find(1);
      $posts = $repository->findAll();

      $repository = $this->getDoctrine()->getRepository(LeShow::class);
      $leShows = $repository->findAll();
      $repository = $this->getDoctrine()->getRepository(LeEvent::class);
      $leEvents = $repository->findAll();
      $repository = $this->getDoctrine()->getRepository(Place::class);
      $places = $repository->findAll();


      return $this->render('@App/admin/home.html.twig',
        [
          'post' => $post,
          'leShows' => $leShows,
          'leEvents' => $leEvents,
          'posts' => $posts,
          'places' => $places,
        ]);


    }


  }