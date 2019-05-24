<?php

  namespace AppBundle\Form;

  use AppBundle\Entity\Home;
  use Symfony\Component\Form\AbstractType;
  use Symfony\Component\Form\FormBuilderInterface;
  use Symfony\Component\Form\Extension\Core\Type\FileType;
  use Symfony\Component\Form\Extension\Core\Type\TextareaType;
  use Symfony\Component\Form\Extension\Core\Type\SubmitType;
  use Symfony\Component\OptionsResolver\OptionsResolver;



  class HomeType extends AbstractType
  {
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
      $builder


// CORPS DE L'ARTICLE


// titre du spectacle
        ->add('titre')
// texte principal/ description
        ->add('text1', TextareaType::class,
          [
            'attr' => [
              'class'=>'textarea',
              'rows' => '10',
              'cols' => '24'
            ]
          ]
        )
// image principale (affiche, logo)
        ->add('img1', FileType::class, [
            'data_class' => null,


          ]
        )
        ->add('img_alt1')
        ->add('img_title1')

//Sous-titre, texte et image optionnels

        ->add('sub2')
        ->add('text2', TextareaType::class,
          [
            'attr' => [
              'class'=>'textarea',
              'rows' => '10',
              'cols' => '24'
            ]
          ]
        )
        ->add('img2', FileType::class, [
            'data_class' => null,
          ]
        )
        ->add('img_alt2')
        ->add('img_title2')



//--------------------------------------------------------------------

        // SLIDER

//--------------------------------------------------------------------
// Images du slider


        ->add('img3', FileType::class, [
            'data_class' => null,
          ]
        )
        ->add('img_alt3')

        ->add('img4', FileType::class, [
            'data_class' => null,
          ]
        )
        ->add('img_alt4')


        ->add('img5', FileType::class, [
            'data_class' => null,
          ]
        )
        ->add('img_alt5')

        ->add('img6', FileType::class, [
            'data_class' => null,
          ]
        )
        ->add('img_alt6')

// Textes du slider
        ->add('sl_caption1')
        ->add('sl_caption2')
        ->add('sl_caption3')
        ->add('sl_caption4')
//--------------------------------------------------------------------

        // Video


// Le cas échéant: code d'intégration
        ->add('youtube')
//--------------------------------------------------------------------



        ->add('submit', SubmitType::class)
      ;
    }
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
      $resolver->setDefaults(array(
        'data_class' => Home::class,
      ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
      return 'appbundle_home';
    }
  }