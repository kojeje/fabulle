<?php


  namespace AppBundle\Form;

  use AppBundle\Entity\LeEvent;
  use AppBundle\Entity\Place;
  use Doctrine\ORM\EntityRepository;
  use Symfony\Component\OptionsResolver\OptionsResolver;
  use Symfony\Component\Form\AbstractType;
  use Symfony\Component\Form\Extension\Core\Type\SubmitType;
  use Symfony\Component\Form\FormBuilderInterface;
  use Symfony\Component\Form\Extension\Core\Type\CountryType;
  use Symfony\Component\Form\Extension\Core\Type\TextareaType;
  use Symfony\Bridge\Doctrine\Form\Type\EntityType;

  class PlaceType extends AbstractType
  {
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
      $builder
        ->add('name')
        ->add('presentation',TextareaType::class,
          [
            'attr' => [
              'class'=>'textarea',
              'rows' => '10',
              'cols' => '24'
            ]
          ]
        )
        ->add('ad1')
        ->add('ad2')
        ->add('cp')
        ->add('commune')
        ->add('country',CountryType::class,[
          'preferred_choices' => ['FR', 'France']])
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