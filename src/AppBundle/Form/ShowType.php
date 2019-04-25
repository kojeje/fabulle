<?php
  namespace AppBundle\Form;
  use AppBundle\Entity\Show;
  use Symfony\Component\OptionsResolver\OptionsResolver;
  use Symfony\Component\Form\AbstractType;
  use Symfony\Component\Form\Extension\Core\Type\FileType;
  use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
  use Symfony\Component\Form\Extension\Core\Type\TextareaType;
  use Symfony\Component\Form\Extension\Core\Type\SubmitType;
  use Symfony\Component\Form\FormBuilderInterface;


  class ShowType extends AbstractType
  {
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
      $builder


        ->add('titre')
        ->add('dispo_boolean')
        ->add('text1', TextareaType::class,
          [
            'attr' => [
              'class'=>'textarea',
              'rows' => '50',
              'cols' => '50'
            ]
          ]
        )

        ->add('sub2')
        ->add('text2', TextareaType::class,
          [
            'attr' => [
              'class'=>'textarea',
              'rows' => '50',
              'cols' => '50'
            ]
          ]
        )
        ->add('sub3')
        ->add('text3', TextareaType::class,
          [
            'attr' => [
              'class'=>'textarea',
              'rows' => '50',
              'cols' => '50'
            ]
          ]
        )
        ->add('sub4')
        ->add('text4', TextareaType::class,
          [
            'attr' => [
              'class'=>'textarea',
              'rows' => '50',
              'cols' => '50'
            ]
          ]
        )

        ->add('img1', FileType::class, [
          'data_class' => null,
            'label' => 'affiche'

          ]
        )
        ->add('img_alt1')

        ->add('img2', FileType::class, [
          'data_class' => null,
          ]
        )
        ->add('img_alt2')
        ->add('slider_boolean')
        ->add('sl_caption')
        ->add('img3', FileType::class, [
          'data_class' => null,
            'label' => 'slider-1'
          ]
        )
        ->add('img_alt3')

        ->add('img4', FileType::class, [
          'data_class' => null,
            'label' => 'slider-2'
          ]
        )
        ->add('img_alt4')


        ->add('img5', FileType::class, [
          'data_class' => null,
            'label' => 'slider-3'
            ]
        )
        ->add('img_alt5')

        ->add('img6', FileType::class, [
            'data_class' => null,
            'label' => 'slider-4'
          ]
        )
        ->add('img_alt6')

        ->add('video_boolean')
        ->add('youtube')


        ->add('genre', ChoiceType::class,
          [
            'choices' => [
              'Conte musical' => 'conte_musical',
              'Concert' => 'concert'
            ]
          ]
        )
        ->add('duree')
        ->add('min_age')
        ->add('max_age')
        ->add('min_artist')
        ->add('max_artist')
        ->add('tarif')
        ->add('creation_date')





        ->add('submit', SubmitType::class)
        ;
    }
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
      $resolver->setDefaults(array(
        'data_class' => Show::class,
      ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
      return 'appbundle_show';
    }
  }