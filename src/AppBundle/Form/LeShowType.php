<?php

  namespace AppBundle\Form;

  use AppBundle\Entity\LeShow;
  use Symfony\Component\Form\AbstractType;
  use Symfony\Component\Form\FormBuilderInterface;
  use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
  use Symfony\Component\Form\Extension\Core\Type\FileType;
  use Symfony\Component\Form\Extension\Core\Type\TextareaType;
  use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
  use Symfony\Component\Form\Extension\Core\Type\SubmitType;
  use Symfony\Component\OptionsResolver\OptionsResolver;



  class LeShowType extends AbstractType
  {
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
      $builder

// disponibilité du spectacle (booléen)
        ->add('dispo_boolean', CheckboxType::class, [
          'label'    => 'Cochez si spectacle disponible',
          'required' => true,
        ])
// date de création du spectacle
        ->add('creation_date')

//--------------------------------------------------------------------

       // CORPS DE L'ARTICLE

//--------------------------------------------------------------------
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

//Sous-titre et texte optionnels
        ->add('sub3')
        ->add('text3', TextareaType::class,
          [
            'attr' => [
              'class'=>'textarea',
              'rows' => '10',
              'cols' => '24'
            ]
          ]
        )
//Sous-titre et texte optionnels
        ->add('sub4')
        ->add('text4', TextareaType::class,
          [
            'attr' => [
              'class'=>'textarea',
              'rows' => '10',
              'cols' => '24'
            ]
          ]
        )

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

// Texte du slider
        ->add('sl_caption')

//--------------------------------------------------------------------

        // Video

//--------------------------------------------------------------------

// Le cas échéant: code d'intégration
        ->add('youtube')
//--------------------------------------------------------------------

        // Renseignements et fiche technique du spectacle

//--------------------------------------------------------------------

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
        // fiche technique (pdf)
        ->add('fichetek', FileType::class, [
            'data_class' => null,


          ]
        )

        ->add('submit', SubmitType::class)
        ;
    }
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
      $resolver->setDefaults(array(
        'data_class' => Leshow::class,
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