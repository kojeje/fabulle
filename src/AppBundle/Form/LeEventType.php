<?php


  namespace AppBundle\Form;


  use AppBundle\Entity\LeEvent;
  use Symfony\Bridge\Doctrine\Form\Type\EntityType;
  use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
  use Symfony\Component\OptionsResolver\OptionsResolver;
  use Symfony\Component\Form\AbstractType;
  use Symfony\Component\Form\Extension\Core\Type\TextareaType;
  use Symfony\Component\Form\Extension\Core\Type\SubmitType;
  use Symfony\Component\Form\Extension\Core\Type\DateType;
  use Symfony\Component\Form\Extension\Core\Type\FileType;
  use Symfony\Component\Form\FormBuilderInterface;



  class LeEventType extends AbstractType
  {
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
      $builder
        ->add('category', ChoiceType::class,
          [
            'choice_label' => [
              'Spectacle' => 'spectacle',
              'Actu' => 'actu'
            ]
          ]
          )
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
        ->add('img', FileType::class, [
            'data_class' => null,
            'label' => 'Image (jpg)',
          ]
        )
        ->add('img_alt')

        ->add('place',EntityType::class,

          [
            'class' => 'AppBundle\Entity\Place',
//            'choice_label' => 'nom',
              'choice_label'=> function($place)
              {
                return $place->getNom().' - '.$place->getCP().' - '.$place->getCommune;

              },
          ]
        )
        ->add('show', EntityType::class,
          [
            'class' => 'AppBundle\Entity\Leshow',
            'choice_label' => 'titre'

          ])
        ->add('submit', SubmitType::class)
      ;
    }
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
      $resolver->setDefaults(array(
        'data_class' => LeEvent::class,
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