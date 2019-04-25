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
  use Symfony\Component\Validator\Mapping\ClassMetadata;

  /**
   * @ORM\Table(name="event")
   * @ORM\Entity(repositoryClass="AppBundle\Repository\EventRepository")
   */
  class Event
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
     *      min = 10,
     *      max = 50,
     *      minMessage = "La longueur minimum du contenu doit-être de {{ limit }} caractères",
     *      maxMessage = "La longueur maximum du contenu doit-être de {{ limit }} caractères"
     * )
     */
    private $titre;



    /**
     * @ORM\Column(type="string")
     * @Assert\Length(
     *      min = 15,
     *      max = 5000,
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
     * @ORM\Column(type="string")
     */
    private $img;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $img_alt;


    //  Relations

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Post", mappedBy="event")
     */
    private $post;

    /**
     * @ORM\ManyToOne(targetEntity="Show", inversedBy="event")
     */
    private $show;

    /**
     * @ORM\ManyToOne(targetEntity="Place", inversedBy="event")
     */
    private $place;



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
    public function getShow()
    {
      return $this->show;
    }

    /**
     * @param mixed $show
     */
    public function setShow($show): void
    {
      $this->show = $show;
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


  }