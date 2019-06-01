<?php


  namespace AppBundle\Form;

//  use Doctrine\ORM\EntityRepository;
//  use AppBundle\Entity\LeEvent;
//  use AppBundle\Entity\LeShow;
  use Symfony\Bridge\Doctrine\Form\Type\EntityType;
//  use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
  use Symfony\Component\OptionsResolver\OptionsResolver;
  use Symfony\Component\Form\AbstractType;
  use Symfony\Component\Form\Extension\Core\Type\TextareaType;
  use Symfony\Component\Form\Extension\Core\Type\SubmitType;
  use Symfony\Component\Form\Extension\Core\Type\DateType;
  use Symfony\Component\Form\FormBuilderInterface;



  class LeEventType extends AbstractType
  {
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {


      $builder
//        ->add('categorie', ChoiceType::class,
//          [
//            'choice_label' => [
//              'Spectacle' => 'spectacle',
//              'Actu' => 'actu'
//            ]
//          ]
//          )
        ->add('titre')

        ->add('description', TextareaType::class,
          [
            'attr' => [
              'class'=>'textarea',
              'rows' => '50',
              'cols' => '50'
            ]
          ]
        )
        ->add('date',DateType::class)
        ->add('img')
        ->add('img_alt')
        ->add('img_title')


//        ->add('place',EntityType::class,
//
//          [
//              'class' => 'AppBundle:Place',
////            'choice_label' => 'nom',
//              'choices'=> function($place)
//              {
//                return $place->getId().$place->getDate().' - '.$place->getCP().' - '.$place->getCommune();
//
//
//              },
//
//          ]
//        )

        ->add('leShow', EntityType::class,
          [
            'class' => 'AppBundle\Entity\leShow',
            'choice_label'=> 'titre'
          ]

        )
        ->add('submit', SubmitType::class)
      ;
    }
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
      $resolver->setDefaults(array(
        'data_class' => 'AppBundle\Entity\leEvent'
      ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
      return 'appbundle_event';
    }
  }