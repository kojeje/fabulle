<?php


  namespace AppBundle\Form;

  use AppBundle\Entity\Place;
  use Symfony\Component\OptionsResolver\OptionsResolver;
  use Symfony\Component\Form\AbstractType;
  use Symfony\Component\Form\Extension\Core\Type\SubmitType;
  use Symfony\Component\Form\FormBuilderInterface;
  use Symfony\Component\Form\Extension\Core\Type\FileType;


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
        ->add('img', FileType::class, [
            'data_class' => null,
            'label' => 'Image (jpg)',
          ]
        )
        ->add('img_alt')
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