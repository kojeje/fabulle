<?php
  /**
   * Created by PhpStorm.
   * User: jeromesuhard*
   */
  namespace AppBundle\Controller;

  use AppBundle\Form\ContactType;
  use AppBundle\Entity\LeEvent;
  use AppBundle\Entity\Post;
  use AppBundle\Entity\LeShow;

  use Symfony\Bundle\FrameworkBundle\Controller\Controller;
  use Symfony\Component\HttpFoundation\Request;
  use Symfony\Component\Routing\Annotation\Route;

  class DefaultController extends Controller{

    public function AdminHomeidAction()
    {
      $repository = $this->getDoctrine()->getRepository(Post::class);
      $home = $repository->find(1);

      $repository = $this->getDoctrine()->getRepository(LeShow::class);
      $leShows = $repository->findAll();

      return $this->render('@App/admin/home.html.twig',
        [
          'home' => $home,
          'leShows' => $leShows
        ]);


    }

    //-----------------------------------------------------------------------------------------
    // Afficher PAGE "La Cie"
    /**
     * @Route("/admin/cie", name="admin_cie_id")
     * Je récupère une instance de Doctrine qui appelle une instense de repository
     */

    public function AdminCieIdAction()
    {
      $repository = $this->getDoctrine()->getRepository(Post::class);
      $cie = $repository->find(2);

      $repository = $this->getDoctrine()->getRepository(LeShow::class);
      $leShows = $repository->findAll();
      $repository = $this->getDoctrine()->getRepository(LeEvent::class);
      $leEvents = $repository->findAll();
      $repository = $this->getDoctrine()->getRepository(Post::class);
      $posts = $repository->findAll();





      return $this->render('@App/admin/home.html.twig',
        [
          'posts' => $posts,
          'leShows' => $leShows,
          'leEvents' => $leEvents,
          'cie' => $cie
        ]);


    }
    // Afficher tous les spectacles avec droits d'administration


    /**
     * @Route("/shows", name="shows")
     */
    public function listShowsAction()
    {
      $repository = $this->getDoctrine()->getRepository(LeShow::class);
      $leShows = $repository->findAll();
      $repository = $this->getDoctrine()->getRepository(LeEvent::class);
      $leEvents = $repository->findAll();
      $repository = $this->getDoctrine()->getRepository(Post::class);
      $posts = $repository->findAll();

      return $this->render('@App/pages/shows.html.twig',
        [
          'posts' => $posts,
          'leShows' => $leShows,
          'leEvents' => $leEvents
        ]);
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contactAction(Request $request)
    {
      $repository = $this->getDoctrine()->getRepository(LeShow::class);
      $leShows = $repository->findAll();
      $repository = $this->getDoctrine()->getRepository(LeEvent::class);
      $leEvents = $repository->findAll();
      $repository = $this->getDoctrine()->getRepository(Post::class);
      $posts = $repository->findAll();


      // Create the form according to the FormType created previously.
      // And give the proper parameters
      $form = $this->createForm(ContactType::class,null,array(
        // To set the action use $this->generateUrl('route_identifier')
        'action' => $this->generateUrl('myapplication_contact'),
        'method' => 'POST'
      ));

      if ($request->isMethod('POST')) {
        // Refill the fields in case the form is not valid.
        $form->handleRequest($request);

        if($form->isValid()){
          // Send mail
          if($this->sendEmail($form->getData())){

            // Everything OK, redirect to wherever you want ! :

            return $this->redirectToRoute('contact_success');
          } else {
            // An error ocurred, handle
            var_dump("Errooooor :(");
          }
        }
      }

      return $this->render('@App/pages/contact.html.twig', array(
        'form' => $form->createView(),
        'posts' => $posts,
        'leShows' => $leShows,
        'leEvents' => $leEvents
      ));
    }

    private function sendEmail($data){
      $myappContactMail = 'contact@kojeje.fr';
      $myappContactPassword = 'Kestufe12';

      // In this case we'll use the ZOHO mail services.
      // If your service is another, then read the following article to know which smpt code to use and which port
      // http://ourcodeworld.com/articles/read/14/swiftmailer-send-mails-from-php-easily-and-effortlessly
      $transport = \Swift_SmtpTransport::newInstance('ssl0.ovh.net', 465,'ssl')
        ->setUsername($myappContactMail)
        ->setPassword($myappContactPassword);

      $mailer = \Swift_Mailer::newInstance($transport);

      $message = \Swift_Message::newInstance($data["subject"])
        ->setFrom(array($myappContactMail => $data["name"]))
        ->setTo(array(
          $myappContactMail => $myappContactMail
        ))
        ->setBody($data["message"]."ContactMail :".$data["email"]);

      return $mailer->send($message);
    }
    /**
     * @Route("/contact_success", name="contact_success")
     */

    public function ContactSuccessAction ()
    {

      $repository = $this->getDoctrine()->getRepository(LeShow::class);
      $leShows = $repository->findAll();
      $repository = $this->getDoctrine()->getRepository(LeEvent::class);
      $leEvents = $repository->findAll();
      $repository = $this->getDoctrine()->getRepository(Post::class);
      $posts = $repository->findAll();

      return $this->render("@App/pages/contact_success.html.twig",
        [
          'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
          'posts' => $posts,
          'leShows' => $leShows,
          'leEvents' => $leEvents
        ]);

    }


}
