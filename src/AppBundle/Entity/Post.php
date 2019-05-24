<?php
  /**
   * Created by PhpStorm.
   * User: jeromesuhard
   * Date: 03/04/2019
   * Time: 22:17
   */

  namespace AppBundle\Entity;
  use Doctrine\ORM\Mapping as ORM;
  use Symfony\Component\Validator\Constraints as Assert;



  //    Colonnes de la table
  /**
   * @ORM\Table(name="post")
   * @ORM\Entity(repositoryClass="AppBundle\Repository\PostRepository")
   */

  class Post
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
     *
     */
    private $category;

    // --------------------------------

    //Titre

    /**
     * @ORM\Column(type="string")
     *
     */

    private $titre;

// --------------------------------
    // Corps de l'article

    // texte principal

    /**
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Length(
     *      max = 10000,
     *      maxMessage = "La longueur maximum du contenu doit-être de {{ limit }} caractères"
     * )
     */

    private $text1;


    // image principale

    /**
     * @ORM\Column(type="string", nullable=true)
     * @Assert\File(maxSize="10000000",
     * mimeTypes = {"image/jpeg", "image/png", "image/gif", "image/jpg"},
     * mimeTypesMessage = "Ce fichier doit être une image (jpg, jpeg, png)"
     * )
     *
     */
    private $img1;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $img_alt1;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $img_title1;


//-------------------------------------------------------------
//  VIDEO
//_____________________________________________________________

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $video_boolean;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $youtube;



// ---------------------------------------------------------------------------
//  Relations

    /**
     * @ORM\ManyToOne(targetEntity="LeEvent", inversedBy="post")
     */
    private $leEvent;

    /**
     * @ORM\ManyToOne(targetEntity="LeShow", inversedBy="post")
     */
    private $leShow;

    /**
     * @ORM\ManyToOne(targetEntity="Home", inversedBy="post")
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
    public function getText1()
    {
      return $this->text1;
    }

    /**
     * @param mixed $text1
     */
    public function setText1($text1): void
    {
      $this->text1 = $text1;
    }

    /**
     * @return mixed
     */
    public function getImg1()
    {
      return $this->img1;
    }

    /**
     * @param mixed $img1
     */
    public function setImg1($img1): void
    {
      $this->img1 = $img1;
    }

    /**
     * @return mixed
     */
    public function getImgAlt1()
    {
      return $this->img_alt1;
    }

    /**
     * @param mixed $img_alt1
     */
    public function setImgAlt1($img_alt1): void
    {
      $this->img_alt1 = $img_alt1;
    }

    /**
     * @return mixed
     */
    public function getImgTitle1()
    {
      return $this->img_title1;
    }

    /**
     * @param mixed $img_title1
     */
    public function setImgTitle1($img_title1): void
    {
      $this->img_title1 = $img_title1;
    }

    /**
     * @return mixed
     */
    public function getVideoBoolean()
    {
      return $this->video_boolean;
    }

    /**
     * @param mixed $video_boolean
     */
    public function setVideoBoolean($video_boolean): void
    {
      $this->video_boolean = $video_boolean;
    }

    /**
     * @return mixed
     */
    public function getYoutube()
    {
      return $this->youtube;
    }

    /**
     * @param mixed $youtube
     */
    public function setYoutube($youtube): void
    {
      $this->youtube = $youtube;
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