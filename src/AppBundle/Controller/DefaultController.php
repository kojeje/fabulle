<?php
  /**
   * Created by PhpStorm.
   * User: jeromesuhard*
   */
  namespace AppBundle\Controller;

  use AppBundle\Entity\LeEvent;
  use AppBundle\Entity\LeShow;
  use AppBundle\Entity\Post;
  use Symfony\Bundle\FrameworkBundle\Controller\Controller;
//  use Symfony\Component\HttpFoundation\Request;
  use Symfony\Component\Routing\Annotation\Route;

  class DefaultController extends Controller{

    /**
     * @Route("/", name="home")
     */
    public function HomeAction(){
      $repository = $this->getDoctrine()->getRepository(LeShow::class);
      $leShows = $repository->findAll();

      $repository = $this->getDoctrine()->getRepository(LeEvent::class);
      $leEvents = $repository->findAll();

      $repository = $this->getDoctrine()->getRepository(Post::class);
      $posts = $repository->findAll();

      return $this->render("@App/default/home.html.twig",
        [
          'base_dir' => realpath($this->getParameter('kernel.project_dir')) . DIRECTORY_SEPARATOR,
          'leShows' => $leShows,
          'leEvents' => $leEvents,
          'posts' => $posts
        ]);
    }

//  /**
//   * @Route("/contact", name="contact")
//   */
//  default function contactAction(Request $request)
//  {
//    // Create the form according to the FormType created previously.
//    // And give the proper parameters
//    $form = $this->createForm(ContactType::class, null, array(
//      // To set the action use $this->generateUrl('route_identifier')
//      'action' => $this->generateUrl('myapplication_contact'),
//      'method' => 'POST'
//    ));
//
//    if ($request->isMethod('POST')) {
//      // Refill the fields in case the form is not valid.
//      $form->handleRequest($request);
//
//      if ($form->isValid()) {
//        // Send mail
//        if ($this->sendEmail($form->getData())) {
//
//          // Everything OK, redirect to wherever you want ! :
//
//          return $this->redirectToRoute('contact_success');
//        } else {
//          // An error ocurred, handle
//          var_dump("Errooooor :(");
//        }
//      }
//    }
//
//    return $this->render('@App/default/contact.html.twig', array(
//      'form' => $form->createView()
//    ));
//  }
//
//  /**
//   * @Route("/contact_success", name="contact_success")
//   */
//
//  default function ContactSuccessAction ()
//  {
//    return $this->render("@App/default/contact_success.html.twig",
//      [
//        'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR
//
//      ]);
//
//  }


}
