<?php
  /**
   * Created by PhpStorm.
   * User: jeromesuhard
   * Date: 03/04/2019
   * Time: 22:28
   */

  namespace AppBundle\Entity;
  use Doctrine\ORM\Mapping as ORM;
  use Symfony\Component\Validator\Constraints as Assert;

  //    Colonnes de la table
  /**
   * @ORM\Table(name="event")
   * @ORM\Entity(repositoryClass="AppBundle\Repository\EventsRepository")
   */

  class Event
  {
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
      $metadata->addPropertyConstraint('publieLe', new Assert\DateTime());
    }

    /**
     * @ORM\Column(type="string")
     *
     */

    private $titre;

    /**
     * @ORM\Column(type="string")
     *
     */
    private $thumbnail;

    /**
     * @ORM\Column(type="string")
     * @Assert\Length(
     *      min = 15,
     *      max = 255,
     *      minMessage = "La longueur minimum du contenu doit-être de
     * {{ limit }} caractères"
     * )
     */
    private $description;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date;

    /**
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Length(
     *      min = 2,
     *      max = 50,
     *      minMessage =
     *     "La longueur minimum du contenu doit-être de {{ limit }} caractères",
     *      maxMessage =
     *     "La longueur maximum du contenu doit-être de {{ limit }} caractères"
     * )
     */

    private $place_name;

    /**
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Length(
     *      min = 2,
     *      max = 50,
     *      minMessage =
     *     "La longueur minimum du contenu doit-être de {{ limit }} caractères",
     *      maxMessage =
     *     "La longueur maximum du contenu doit-être de {{ limit }} caractères"
     * )
     */

    private $place_ad1;

    /**
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Length(
     *      min = 2,
     *      max = 50,
     *      minMessage =
     *     "La longueur minimum du contenu doit-être de {{ limit }} caractères",
     *      maxMessage =
     *     "La longueur maximum du contenu doit-être de {{ limit }} caractères"
     * )
     */

    private $place_ad2;

    /**
     * @ORM\Column(type="integer", length=5, nullable=true)
     */
    private $cp;

    /**
     * @ORM\Column(type="string", nullable=true)
     *
     */
    private $commune;

    /**
     * @ORM\Column(type="string", nullable=true)
     *
     */
    private $place_url;

    /**
     * @ORM\Column(type="string", nullable=true)
     *
     */
    private $place_tel;

    /**
     * @ORM\Column(type="string", nullable=true)
     *
     */
    private $place_mail;

    /**
     * @ORM\Column(type="string", nullable=true)
     *
     */
    private $place_lat;

    /**
     * @ORM\Column(type="string", nullable=true)
     *
     */
    private $place_long;



    //  Relations

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Post", mappedBy="event")
     */
    private $post;

    /**
     * @ORM\ManyToOne(targetEntity="show", inversedBy="post")
     */
    private $show;




  }