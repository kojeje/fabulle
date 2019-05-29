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

  /**
   * @ORM\Table(name="LeEvent")
   * @ORM\Entity(repositoryClass="AppBundle\Repository\LeEventRepository")
   */
  class LeEvent
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
     */
    private $publiele;

    /**
     * @ORM\Column(type="string")
     */
    private $categorie;

    /**
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Length(
     *      max = 255,
     *      maxMessage = "La longueur maximum du contenu doit-être de {{ limit }} caractères"
     * )
     */
    private $titre;



    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date;

    /**
     * @ORM\Column(type="string", nullable=true)
     */

    private $place_name;





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
     * @ORM\Column(type="blob", nullable=true)
     *
     */
    private $gmap;


// ---------------------------------------------------------------------------
    //  Relations

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\LeShow", inversedBy="leEvent")
     */
    private $leShow;

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
    public function getCategorie()
    {
      return $this->categorie;
    }

    /**
     * @param mixed $categorie
     */
    public function setCategorie($categorie): void
    {
      $this->categorie = $categorie;
    }

    /**
     * @return mixed
     */
    public function getTitre()
    {
      return $this->titre;
    }

    /**
     * @param mixed $titre
     */
    public function setTitre($titre): void
    {
      $this->titre = $titre;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
      return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date): void
    {
      $this->date = $date;
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
    public function getLeShow()
    {
      return $this->leShow;
    }

    /**
     * @param mixed $leShow
     */
    public function setLeShow($leShow): void
    {
      $this->leShow = $leShow;
    }






     }