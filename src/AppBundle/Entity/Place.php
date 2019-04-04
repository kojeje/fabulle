<?php
  /**
   * Created by PhpStorm.
   * User: jeromesuhard
   * Date: 04/04/2019
   * Time: 14:59
   */

  namespace AppBundle\Entity;
  use Doctrine\ORM\Mapping as ORM;
  use Symfony\Component\Validator\Constraints as Assert;
  use Symfony\Component\Validator\Mapping\ClassMetadata;

  //    Colonnes de la table
  /**
   * @ORM\Table(name="place")
   * @ORM\Entity(repositoryClass="AppBundle\Repository\PlaceRepository")
   */

  class Place
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
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Event", mappedBy="place")
     */
    private $event;

//  Getters & Setters

    /**
     * @return mixed
     */
    public function getId()
    {
      return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
      $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getPlaceName()
    {
      return $this->place_name;
    }

    /**
     * @param mixed $place_name
     */
    public function setPlaceName($place_name): void
    {
      $this->place_name = $place_name;
    }

    /**
     * @return mixed
     */
    public function getPlaceAd1()
    {
      return $this->place_ad1;
    }

    /**
     * @param mixed $place_ad1
     */
    public function setPlaceAd1($place_ad1): void
    {
      $this->place_ad1 = $place_ad1;
    }

    /**
     * @return mixed
     */
    public function getPlaceAd2()
    {
      return $this->place_ad2;
    }

    /**
     * @param mixed $place_ad2
     */
    public function setPlaceAd2($place_ad2): void
    {
      $this->place_ad2 = $place_ad2;
    }

    /**
     * @return mixed
     */
    public function getCp()
    {
      return $this->cp;
    }

    /**
     * @param mixed $cp
     */
    public function setCp($cp): void
    {
      $this->cp = $cp;
    }

    /**
     * @return mixed
     */
    public function getCommune()
    {
      return $this->commune;
    }

    /**
     * @param mixed $commune
     */
    public function setCommune($commune): void
    {
      $this->commune = $commune;
    }

    /**
     * @return mixed
     */
    public function getPlaceUrl()
    {
      return $this->place_url;
    }

    /**
     * @param mixed $place_url
     */
    public function setPlaceUrl($place_url): void
    {
      $this->place_url = $place_url;
    }

    /**
     * @return mixed
     */
    public function getPlaceTel()
    {
      return $this->place_tel;
    }

    /**
     * @param mixed $place_tel
     */
    public function setPlaceTel($place_tel): void
    {
      $this->place_tel = $place_tel;
    }

    /**
     * @return mixed
     */
    public function getPlaceMail()
    {
      return $this->place_mail;
    }

    /**
     * @param mixed $place_mail
     */
    public function setPlaceMail($place_mail): void
    {
      $this->place_mail = $place_mail;
    }

    /**
     * @return mixed
     */
    public function getPlaceLat()
    {
      return $this->place_lat;
    }

    /**
     * @param mixed $place_lat
     */
    public function setPlaceLat($place_lat): void
    {
      $this->place_lat = $place_lat;
    }

    /**
     * @return mixed
     */
    public function getPlaceLong()
    {
      return $this->place_long;
    }

    /**
     * @param mixed $place_long
     */
    public function setPlaceLong($place_long): void
    {
      $this->place_long = $place_long;
    }

    /**
     * @return mixed
     */
    public function getEvent()
    {
      return $this->event;
    }

    /**
     * @param mixed $event
     */
    public function setEvent($event): void
    {
      $this->event = $event;
    }



  }