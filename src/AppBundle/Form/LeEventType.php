<?php


  namespace AppBundle\Form;


  use AppBundle\Entity\LeEvent;
  use AppBundle\Entity\LeShow;
  use Symfony\Bridge\Doctrine\Form\Type\EntityType;
  use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
  use Symfony\Component\OptionsResolver\OptionsResolver;
  use Symfony\Component\Form\AbstractType;
  use Symfony\Component\Form\Extension\Core\Type\TextareaType;
  use Symfony\Component\Form\Extension\Core\Type\SubmitType;
  use Symfony\Component\Form\Extension\Core\Type\DateType;

  use Symfony\Component\Form\FormBuilderInterface;



  class LeEventType extends AbstractType
  {
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {


      $builder
        ->add('categorie', ChoiceType::class,
          [
            'choice_label' => [
              'Spectacle' => 'spectacle',
              'Actu' => 'actu'
            ]
          ]
          )
        ->add('titre')


        ->add('date',DateType::class)
        ->add('img')
        ->add('img_alt')
        ->add('img_title')
        ->add('place_name')
        ->add('ad1')
        ->add('ad2')
        ->add('cp')
        ->add('commune')
        ->add('tel')
        ->add('site')
        ->add('email')
        ->add('gmap')

        ->add('leShow', EntityType::class,
          [
            'class' => LeShow::class,
            'choice_label'=> function($leShow)
            {

                return $leShow->getTitre();

            }
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
        'data_class' => LeEvent::class,
      ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
      return 'appbundle_event';
    }
  }