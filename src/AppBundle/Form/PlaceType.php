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
        ->add('place_name')
        ->add('place_ad1')
        ->add('place_ad2')
        ->add('cp')
        ->add('commune')
        ->add('place_url')
        ->add('place_tel')
        ->add('place_mail')
        ->add('place_lat')
        ->add('place_long')
        ->add('img1', FileType::class, [
            'data_class' => null,
            'label' => 'Image1 (jpg)',
          ]
        )
        ->add('img_alt1')
        ->add('img_description1')
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