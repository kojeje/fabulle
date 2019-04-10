<?php


  namespace AppBundle\Form;

  use AppBundle\Entity\Member;
  use Symfony\Component\OptionsResolver\OptionsResolver;
  use Symfony\Component\Form\AbstractType;
  use Symfony\Component\Form\Extension\Core\Type\SubmitType;
  use Symfony\Component\Form\FormBuilderInterface;
  use Symfony\Component\Form\Extension\Core\Type\FileType;
  use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


  class MemberType extends AbstractType
  {
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
      $builder
        ->add('first_name')
        ->add('last_name')
        ->add('pseudo')
        ->add('metiers',ChoiceType::class,
          [
            'choices' => [
              'Musicien(ne)' => 'musicien',
              'Comédien(ne)' => 'comedien',

            ]
          ]
        )
        ->add('instru1',ChoiceType::class,
          [
            'choices' => [
              'Guitare' => 'guitare',
              'Chant' => 'chant',
              'Percussions'=>'percussions',
              'Piano'=>'piano'

            ]
          ])
        ->add('instru2',ChoiceType::class,
          [
            'choices' => [
              'Guitare' => 'guitare',
              'Chant' => 'chant',
              'Percussions'=>'percussions',
              'Piano'=>'piano'

            ]
          ])
        ->add('instru3',ChoiceType::class,
          [
            'choices' => [
              'Guitare' => 'guitare',
              'Chant' => 'chant',
              'Percussions'=>'percussions',
              'Piano'=>'piano'

            ]
          ])
        ->add('photo', FileType::class, [
            'data_class' => null,
            'label' => 'photo (jpg)',
          ]

        )
        ->add('photo_alt')
        ->add('photo_description')
        ->add('bio')

        ->add('submit', SubmitType::class)
      ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
      $resolver->setDefaults(array(
        'data_class' => Member::class,
      ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
      return 'appbundle_member';
    }
  }