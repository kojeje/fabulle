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


    public function __construct()
    {
      $this->setPubliele(new \DateTime());
    }

    /**
     * @ORM\Column(type="datetimetz")
     *
     */
    private $publiele;



    /**
     * @ORM\Column(type="string")
     */

    private $nom;

    /**
     * @ORM\Column(type="string", nullable=true)
     */

    private $description;



    /**
     * @ORM\Column(type="string", nullable=true)
     */

    private $ad1;

    /**
     * @ORM\Column(type="string", nullable=true)
     */

    private $ad2;

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
    private $tel;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $site;

    /**
     * @ORM\Column(type="string", nullable=true)
     *
     */
    private $email;

    /**
     * @ORM\Column(type="string", nullable=true)
     *
     */
    private $gmap;


    /**
     * @ORM\Column(type="string", nullable=true)
     * @Assert\File(maxSize="10000000",
     * mimeTypes = {"image/jpeg", "image/png", "image/gif", "image/jpg"},
     * mimeTypesMessage = "Ce fichier doit être une image (jpg, jpeg, png)"
     * )
     *
     */
    private $img;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $img_alt;


// ---------------------------------------------------------------------------
//  Relations
    /**
     * @ORM\OneToMany(targetEntity="LeEvent", mappedBy="place")
     */
    private $leEvent;

  //------------------------------------------------------------------------------
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
    public function getPubliele()
    {
      return $this->publiele;
    }

    /**
     * @param mixed $publiele
     */
    public function setPubliele($publiele): void
    {
      $this->publiele = $publiele;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
      return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom): void
    {
      $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
      return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
      $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getAd1()
    {
      return $this->ad1;
    }

    /**
     * @param mixed $ad1
     */
    public function setAd1($ad1): void
    {
      $this->ad1 = $ad1;
    }

    /**
     * @return mixed
     */
    public function getAd2()
    {
      return $this->ad2;
    }

    /**
     * @param mixed $ad2
     */
    public function setAd2($ad2): void
    {
      $this->ad2 = $ad2;
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
    public function getTel()
    {
      return $this->tel;
    }

    /**
     * @param mixed $tel
     */
    public function setTel($tel): void
    {
      $this->tel = $tel;
    }

    /**
     * @return mixed
     */
    public function getSite()
    {
      return $this->site;
    }

    /**
     * @param mixed $site
     */
    public function setSite($site): void
    {
      $this->site = $site;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
      return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
      $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getGmap()
    {
      return $this->gmap;
    }

    /**
     * @param mixed $gmap
     */
    public function setGmap($gmap): void
    {
      $this->gmap = $gmap;
    }

    /**
     * @return mixed
     */
    public function getImg()
    {
      return $this->img;
    }

    /**
     * @param mixed $img
     */
    public function setImg($img): void
    {
      $this->img = $img;
    }

    /**
     * @return mixed
     */
    public function getImgAlt()
    {
      return $this->img_alt;
    }

    /**
     * @param mixed $img_alt
     */
    public function setImgAlt($img_alt): void
    {
      $this->img_alt = $img_alt;
    }

    /**
     * @return mixed
     */
    public function getLeEvent()
    {
      return $this->leEvent;
    }

    /**
     * @param mixed $leEvent
     */
    public function setLeEvent($leEvent): void
    {
      $this->leEvent = $leEvent;
    }








  }