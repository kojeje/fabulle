<?php


  namespace AppBundle\Form;

  use AppBundle\Entity\LeEvent;
  use AppBundle\Entity\Place;
  use Doctrine\ORM\EntityRepository;
  use Symfony\Component\OptionsResolver\OptionsResolver;
  use Symfony\Component\Form\AbstractType;
  use Symfony\Component\Form\Extension\Core\Type\SubmitType;
  use Symfony\Component\Form\FormBuilderInterface;
  use Symfony\Component\Form\Extension\Core\Type\FileType;
  use Symfony\Component\Form\Extension\Core\Type\TextareaType;
  use Symfony\Bridge\Doctrine\Form\Type\EntityType;

  class PlaceType extends AbstractType
  {
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
      $builder
        ->add('nom')
        ->add('description', TextareaType::class,
          [
            'attr' => [
              'class'=>'textarea',
              'rows' => '50',
              'cols' => '50'
            ]
          ]
        )


        ->add('ad1')
        ->add('ad2')
        ->add('cp')
        ->add('commune')
        ->add('tel')
        ->add('site')
        ->add('email')
        ->add('gmap')
        ->add('submit', SubmitType::class)
      ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
      $resolver->setDefaults(array(
        'data_class' => Place::class,
      ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
      return 'appbundle_place';
    }
  }