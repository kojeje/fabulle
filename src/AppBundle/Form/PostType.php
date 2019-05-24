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
            'choice_label'=> function($leEvent)
            {
              return $leEvent->getTitre().' - '.$leEvent->getDate().' - '.$leEvent->getLeShow();

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
        ->add('img_title1')

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