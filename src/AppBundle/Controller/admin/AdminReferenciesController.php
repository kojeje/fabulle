<?php
  /**
   * Created by PhpStorm.
   * User: jeromesuhard
   * Date: 09/01/2019
   * Time: 21:25
   */
  namespace AppBundle\Controller\admin;



  use AppBundle\Entity\Referencies;
  use AppBundle\Form\ReferenciesType;
  use Symfony\Bundle\FrameworkBundle\Controller\Controller;
  use Symfony\Component\HttpFoundation\Request;
  use Symfony\Component\Routing\Annotation\Route;





  class AdminReferenciesController extends Controller
  {

    /**
     * @Route("/admin/create_referencies", name="create_referencies")
     */

    public function formCreateReferencies(Request $request)

    {

      /* Création d'un nouveau formulaire à partir d'un gabarit "Referenciestype" */
      $form = $this->createForm(ReferenciesType::class, new Referencies);

      /* Associe les données envoyées (éventuellement) par le client via le formulaire à notre variable $form.
      Donc la variable $form contient maintenant aussi les données de $_POST*/
      $form->handleRequest($request);


      if ($form->isSubmitted()) {


        /* Si le formulaire respecte les contraintes */
        if ($form->isValid()) {
        // je recupere une entité grace aux donnees envoye par le formulaire
          $referencies = $form->getData();

          /* Je récupère l'entité manager de doctrine */

          $entityManager = $this->getDoctrine()->getManager();

          /* Je stocke temporairement les données dans l'unité de travail */
          $entityManager->persist($referencies);

          /* Je "pousse" les données dans la Bdd*/
          $entityManager->flush();

          /* J'affiche un message flash confirmant l'enregistrement */
          $this->addFlash(
            'notice',
            'La référence a été enregistrée'
          );
        } else {
          /* Si les contraintes n'ont pas été respectées j'affice un message d'erreur */
          $this->addFlash(
            'error',
            'La référence n\'a pas pu être enregistrée'
          );
        }
//                /* Je redirige ensuite sur la liste des pages*/
//                return $this->redirectToRoute('admin_pages');
      }

      /* Quand j'arrive sur la route "ajout_page_form" je vais directement sur le formulaire dont les champs sont définis dans le PostType,
      et qui seront affichés dans la twig*/
      return $this->render('@App/admin/CreateReferencies.html.twig',
        [
          'formReferencies' => $form->createView()
        ]);

    }

//


  //    UPDATE Reference
  /**
   * @Route("/admin/update_referencies/{id}", name="admin_update_referencies")
   */
  public function updateReferenciesAction(Request $request, $id)
  {
    $repository = $this->getDoctrine()->getRepository(Referencies::class);
    $referencies = $repository->find($id);
    $form = $this->createForm(ReferenciesType::class, $referencies);
    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid())
    {
      $referencies = $form->getData();
      $entityManager = $this->getDoctrine()->getManager();
      $entityManager->persist($referencies);
      $entityManager->flush();
      /* Affiche un message flash */
      $this->addFlash(
        'notice',
        'Le contenu de l\'article a été modifié'
      );
      return $this->redirectToRoute('admin_referencies');
    }
    return $this->render('@App/admin/UpdateReferencies.html.twig',
      [
        'formReferencies' => $form->createView()
      ]);
  }
  }