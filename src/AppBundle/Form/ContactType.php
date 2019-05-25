<?php
// your-path-to-types/ContactType.php

    namespace AppBundle\Form;

    use Symfony\Component\Form\AbstractType;
    use Symfony\Component\Form\Extension\Core\Type\CountryType;
    use Symfony\Component\Form\FormBuilderInterface;
    use Symfony\Component\OptionsResolver\OptionsResolver;
    use Symfony\Component\Form\Extension\Core\Type\TextType;
    use Symfony\Component\Form\Extension\Core\Type\DateType;
    use Symfony\Component\Form\Extension\Core\Type\TextareaType;
    use Symfony\Component\Form\Extension\Core\Type\EmailType;
    use Symfony\Component\Form\Extension\Core\Type\TelType;
    use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
    use Symfony\Component\Form\Extension\Core\Type\IntegerType;
    use Symfony\Component\Form\Extension\Core\Type\FileType;
    use Symfony\Component\Validator\Constraints\Email;
    use Symfony\Component\Validator\Constraints\NotBlank;

    class ContactType extends AbstractType
    {
        public function buildForm(FormBuilderInterface $builder, array $options)
        {
            $builder
              // Civilité
              ->add('civilité', TextType::class, [
                'attr' => [
                  'placeholder' => 'civilité',
                  'choices' => [
                    'Mme' => 'mme',
                    'Mr' => 'mr'
                  ]
                ]
              ]
            )
              // Nom
                ->add('first_name', TextType::class, [
                  'attr' => [
                    'placeholder' => 'prénom'
                  ]
                ]
              )
              // Prénom
                ->add('last_name', TextType::class, [
                  'attr' => [
                    'placeholder' => 'nom',
                    'constraints' => [
                      new NotBlank(
                        [
                          "message" => "Veuillez renseigner votre nom"
                        ]
                      )
                    ]
                  ]
                ]

              );
              // date de naissance
            $builder
                ->add('creation_date', DateType::class, [
                  'placeholder' => 'date de naissance',
                  'widget' => 'choice',
                  'years' => range(1912, 2012),

                  ]
                )
              // Statut de l'expéditeur

              ->add('statut', ChoiceType::class, [
                  'attr' => [
                    'placeholder' => 'Vous êtes: ',
                    'choices' => [
                      'Diffuseur/programmateur de spectacles' => 'diffuseur',
                      'Un Spectateur' => 'spectateur',
                      'Autre' => 'autre'
                    ]
                  ]
                ]
              )
              // téléphone
                ->add('tel', TelType::class, [
                  'attr' => [
                    'placeholder' => 'telephone'
                  ]
              ]
              )

              // adresse 1
              ->add('add1', TextType::class, [
                  'attr' => [
                    'placeholder' => 'adresse1'
                  ]
                ]
              )

              // adresse 2
              ->add('add1', TextType::class, [
                  'attr' => [
                    'placeholder' => 'adresse1'
                  ]
                ]
              )

              ->add('ZIP', IntegerType::class,
                [
                  'attr' => [
                    'placeholder' => 'code postal'
                  ]
                ])

              ->add('town', TextType::class,
                [
                  'attr' => [
                    'placeholder' => 'Ville'
                  ]
                ])

              ->add('country', CountryType::class,
                [
                  'attr' => [
                  'placeholder' => 'Country'
                ]
              ])


              // Email
                ->add('email', EmailType::class,
                array(
                  'attr' => array(
                    'placeholder' => 'email'
                  ),
                    'constraints' => array(
                        new NotBlank(array(
                          "message" => "Merci de renseigner votre adresse email")),
                        new Email(array(
                          "message" => "l'adresse email saisie semble invalide")),
                    )
                ))

              ->add('subject', TextType::class,
                array(
                  'attr' => array(
                    'placeholder' => 'Objet du message'
                  ),
                  'constraints' => array(
                  new NotBlank(array(
                    "message" => "Merci saisir le sujet de votre message")),
                )
              ))
                ->add('message', TextareaType::class,
                    array(
                        'attr' => array(
                          'placeholder' => 'message'),
                        'constraints' => array(
                            new NotBlank(array(
                              "message" => "Merci de saisir un message"))
                        )
                    )
                )




            ;
        }

        public function setDefaultOptions(OptionsResolver $resolver)
        {
            $resolver->setDefaults(array(
                'error_bubbling' => true
            ));
        }

        public function getName()
        {
            return 'contact_form';
        }
    }