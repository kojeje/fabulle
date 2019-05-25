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
    use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
    use Symfony\Component\Validator\Constraints\Email;
    use Symfony\Component\Validator\Constraints\NotBlank;

    class ContactType extends AbstractType
    {
        public function buildForm(FormBuilderInterface $builder, array $options)
        {
            $builder
// ------------------------------------------------------------------------------
//      Données personnelles de l'expéditeur du message
//      -------------------------------------------------------------------------
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
                ->add('birth_date', DateType::class, [
                  'placeholder' => 'date de naissance',
                  'widget' => 'choice',
                  'years' => range(1912, 2012),

                  ]
                )
              // Statut de l'expéditeur

              ->add('statut', ChoiceType::class,
                  [
                    'attr' => [
                      'placeholder' => 'Vous êtes: ',
                      'choices' => [
                          'Diffuseur/programmateur de spectacles' => 'diffuseur',
                          'Un Spectateur' => 'spectateur',
                          'Autre' => 'autre',
                          'constraints' => [
                            new NotBlank(
                              [
                                "message" => "Veuillez renseigner votre nom"
                              ]
                            )
                        ]
                      ]
                    ]
                  ]
                )
              // téléphone
                ->add('tel', TelType::class,
                [
                  'attr' => [
                    'placeholder' => 'telephone'
                  ]
              ]
              )

              // adresse 1
              ->add('ad2', TextType::class,
                [
                  'attr' => [
                    'placeholder' => 'adresse1'
                  ]
                ]
              )

              // adresse 2
              ->add('ad2', TextType::class,
                [
                  'attr' => [
                    'placeholder' => 'adresse1'
                  ]
                ]
              )
              // CP
              ->add('ZIP', IntegerType::class,
                [
                  'attr' => [
                    'placeholder' => 'code postal'
                  ]
                ])
              // Ville
              ->add('town', TextType::class,
                [
                  'attr' => [
                    'placeholder' => 'Ville'
                  ]
                ])
              // Pays
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
// ------------------------------------------------------------------------------
//      Message
//      -------------------------------------------------------------------------
              // Objet
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
              // Corps du message
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
//              // Pièce Jointe
//              ->add('file', FileType::class,
//                [
//                    'attr' => [
//                      'placeholder' => 'piece jointe'
//                    ]
//                ])
              // Newsletter
              ->add('newsletter', CheckboxType::class,
                [
                  'required' => true
                ])
              // Consentement RGPD
              ->add('consentement', TextType::class,
                [
                  'constraints' => [
                    new NotBlank(
                      [
                        "message" => "Merci de saisir un message de consentement"
                      ]
                    )
                  ]
                ]
              );
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