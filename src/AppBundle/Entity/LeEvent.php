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
    private $category;

    /**
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Length(
     *      max = 255,
     *      maxMessage = "La longueur maximum du contenu doit-être de {{ limit }} caractères"
     * )
     */
    private $titre;



    /**
     * @ORM\Column(type="string")
     * @Assert\Length(
     *      max = 5000,
     *      maxMessage = "La longueur maximum du contenu doit-être de
     * {{ limit }} caractères"
     * )
     */
    private $description;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date;



// ---------------------------------------------------------------------------
    //  Relations

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Post", mappedBy="leEvent")
     */
    private $post;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\LeShow", inversedBy="leEvent")
     */
    private $leShow;

    /**
     * @ORM\ManyToOne(targetEntity="Place", inversedBy="leEvent")
     */
    private $place;

    /**
     * @ORM\ManyToOne(targetEntity="Home", inversedBy="leEvent")
     */
    private $home;

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
    public function getPost()
    {
      return $this->post;
    }

    /**
     * @param mixed $post
     */
    public function setPost($post): void
    {
      $this->post = $post;
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


    /**
     * @return mixed
     */
    public function getPlace()
    {
      return $this->place;
    }

    /**
     * @param mixed $place
     */
    public function setPlace($place): void
    {
      $this->place = $place;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
      return $this->category;
    }

    /**
     * @param mixed $category
     */
    public function setCategory($category): void
    {
      $this->category = $category;
    }

    /**
     * @return mixed
     */
    public function getHome()
    {
      return $this->home;
    }

    /**
     * @param mixed $home
     */
    public function setHome($home): void
    {
      $this->home = $home;
    }


  }