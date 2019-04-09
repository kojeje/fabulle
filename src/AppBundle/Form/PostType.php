<?php


  namespace AppBundle\Form;
  use AppBundle\Entity\Post;
  use Symfony\Component\Form\AbstractType;
  use Symfony\Component\Form\FormBuilderInterface;
  use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
  use Symfony\Component\Form\Extension\Core\Type\FileType;
  use Symfony\Component\Form\Extension\Core\Type\TextareaType;
  use Symfony\Component\Form\Extension\Core\Type\SubmitType;
  use Symfony\Component\OptionsResolver\OptionsResolver;



  class PostType extends AbstractType
  {
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
      $builder
        ->add('titre')
        ->add('category',ChoiceType::class,
          [
            'choices' => [
              'Le petit mot' => 'le petit mot',
              'Actu' => 'actu',
              'Histoire' => 'histoire'
            ]
          ]
          )
        ->add('img1', FileType::class, [
              'data_class' => null,
              'label' => 'Image1 (jpg)',
          ]
        )
        ->add('img_alt1')
        ->add('img_description1')

        ->add('img2', FileType::class, [
            'data_class' => null,
            'label' => 'Image2 (jpg)'
          ]
        )
        ->add('img_alt2')
        ->add('img_description2')

        ->add('img3', FileType::class, [
            'data_class' => null,
            'label' => 'Image3 (jpg)'
          ]
        )
        ->add('img_alt3')
        ->add('img_description3')

        ->add('img4', FileType::class, [
            'data_class' => null,
            'label' => 'Image4 (jpg)'
          ]
        )
        ->add('img_alt4')
        ->add('img_description4')


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

        ->add('youtube')
        ->add('submit', SubmitType::class)
      ;
       }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
      $resolver->setDefaults(array(
        'data_class' => Post::class,
      ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
      return 'appbundle_post';
    }
  }