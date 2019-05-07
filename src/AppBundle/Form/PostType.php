<?php

  namespace AppBundle\Form;

  use AppBundle\Entity\Post;
  use Symfony\Component\Form\AbstractType;
  use Symfony\Component\Form\FormBuilderInterface;
  use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
  use Symfony\Component\Form\Extension\Core\Type\FileType;
  use Symfony\Component\Form\Extension\Core\Type\TextareaType;
  use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
  use Symfony\Bridge\Doctrine\Form\Type\EntityType;
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
        ->add('category',ChoiceType::class,
          [
            'choices' => [
              'Le petit mot' => 'le petit mot',
              'Actu' => 'actu',
              'Histoire' => 'histoire'
            ]
          ]
        )

        ->add('leShow', EntityType::class,
          [
            'class'=> 'AppBundle\Entity\LeShow',
            'choice_label'=> 'titre'
          ]
        )
        ->add('leEvent', EntityType::class,

          [
            'class' => 'AppBundle\Entity\LeEvent',
            'choice_label'=> function($event)
            {
              return $event->getTitre().' - '.$event->getdate().' - '.$event->getLeshow();

            },
          ]
        )
        ->add('titre')
        ->add('text1', TextareaType::class,
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
              'label' => 'Image1 (jpg)',
          ]
        )
        ->add('img_alt1')

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
        ->add('img2', FileType::class, [
            'data_class' => null,
            'label' => 'Image2 (jpg)'
          ]
        )

        ->add('img_alt2')
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



// Présence d'un slider (booléen)

        ->add('slider_boolean', CheckboxType::class, [
          'label'    => 'Cochez si presence d\'un slider photo',
          'required' => true,

        ])


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

// Présence d'une video (booléen)
        ->add('video_boolean', CheckboxType::class, [
          'label'    => 'Cochez si presence d\'un insert video',
          'required' => false,
        ])
// Le cas échéant: code d'intégration
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