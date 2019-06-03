<?php


  namespace AppBundle\Form;

//  use Doctrine\ORM\EntityRepository;
//  use AppBundle\Entity\LeEvent;
//  use AppBundle\Entity\LeShow;
  use Symfony\Bridge\Doctrine\Form\Type\EntityType;
  use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
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
        ->add('categorie', ChoiceType::class,
          [
            'choices' => [
              'Spectacle' => 'spectacle',
              'Actu' => 'actu'
            ]
          ]
          )



        ->add('date',DateType::class)



//

        ->add('leShow', EntityType::class,
          [
            'class' => 'AppBundle\Entity\LeShow',
            'choice_label'=> 'titre',

          ]

        )
        ->add('place', EntityType::class,
          [
            'class' => 'AppBundle\Entity\Place',
            'choice_label' => 'name',
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
        'data_class' => 'AppBundle\Entity\LeEvent'
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