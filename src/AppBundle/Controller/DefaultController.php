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

      return $this->render("@App/home.html.twig",
        [
          'base_dir' => realpath($this->getParameter('kernel.project_dir')) . DIRECTORY_SEPARATOR,
          'leShows' => $leShows,
          'leEvents' => $leEvents,
          'posts' => $posts
        ]);
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contactAction(Request $request)
    {
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
          }else{
            // An error ocurred, handle
            var_dump("Errooooor :(");
          }
        }
      }

      return $this->render('@App/public/contact.html.twig', array(
        'form' => $form->createView()
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
      return $this->render("@App/public/contact_success.html.twig",
        [
          'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR

        ]);

    }


}
