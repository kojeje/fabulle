<?php


  namespace AppBundle\Form;
  use AppBundle\Entity\Show;
  use Symfony\Component\OptionsResolver\OptionsResolver;
  use Symfony\Component\Form\AbstractType;
  use Symfony\Component\Form\Extension\Core\Type\FileType;
  use Symfony\Component\Form\Extension\Core\Type\IntegerType;
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
        ->add('intro', TextareaType::class,
          [
            'attr' => [
              'class'=>'textarea',
              'rows' => '20',
              'cols' => '50'
            ]
          ]
        )

        ->add('sub1')
        ->add('text1', TextareaType::class,
          [
            'attr' => [
              'class'=>'textarea',
              'rows' => '20',
              'cols' => '50'
            ]
          ]
        )
        ->add('sub2')
        ->add('text2', TextareaType::class,
          [
            'attr' => [
              'class'=>'textarea',
              'rows' => '20',
              'cols' => '50'
            ]
          ]
        )
        ->add('sub3')
        ->add('text3', TextareaType::class,
          [
            'attr' => [
              'class'=>'textarea',
              'rows' => '20',
              'cols' => '50'
            ]
          ]
        )
        ->add('sub4')
        ->add('text4', TextareaType::class,
          [
            'attr' => [
              'class'=>'textarea',
              'rows' => '20',
              'cols' => '50'
            ]
          ]
        )
        ->add('img1', FileType::class, [
          'data_class' => null,
//          @todo mimeType
          ]
        )
        ->add('img_alt1')
        ->add('img_description1')
        ->add('img2', FileType::class, array('data_class' => null))
        ->add('img_alt2')
        ->add('img_description2')
        ->add('img3', FileType::class, array('data_class' => null))
        ->add('img_alt3')
        ->add('img_description3')
        ->add('img4', FileType::class, array('data_class' => null))
        ->add('img_alt4')
        ->add('img_description4')
        ->add('affiche', FileType::class, array('data_class' => null))
        ->add('affiche_alt4')
        ->add('affiche_description4')

        ->add('categorie', ChoiceType::class,
          [
            'choices' => [
              'Conte musical' => 'conte_musical',
              'Concert' => 'concert'
            ]
          ]
        )
        ->add('tek', FileType::class)




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