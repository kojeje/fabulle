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

// --------------------------------

    // sub_title optionnel

    /**
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Length(
     *      max = 255,
     *      maxMessage = "La longueur maximum du contenu doit-être de {{ limit }} caractères"
     * )
     */

    private $sub2;

    // Texte optionnel

    /**
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Length(
     *      max = 10000,
     *      maxMessage = "La longueur maximum du contenu doit-être de {{ limit }} caractères"
     * )
     */
    private $text2;

    // image optionnelle
    /**
     * @ORM\Column(type="string", nullable=true)
     * @Assert\File(maxSize="10000000",
     * mimeTypes = {"image/jpeg", "image/png", "image/gif", "image/jpg"},
     * mimeTypesMessage = "Ce fichier doit être une image (jpg, jpeg, png)"
     * )
     *
     */
    private $img2;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $img_alt2;



    //_____________________________________

    // sub_title optionnel



    /**
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Length(
     *      max = 255,
     *      maxMessage = "La longueur maximum du contenu doit-être de {{ limit }} caractères"
     * )
     */
    private $sub3;

    /**
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Length(
     *      max = 10000,
     *      maxMessage = "La longueur maximum du contenu doit-être de {{ limit }} caractères"
     * )
     */
    private $text3;

    // sub_title optionnel

    /**
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Length(
     *      max = 255,
     *      maxMessage = "La longueur maximum du contenu doit-être de {{ limit }} caractères"
     * )
     */
    private $sub4;

    // texte optionnel

    /**
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Length(
     *      max = 10000,
     *      maxMessage = "La longueur maximum du contenu doit-être de {{ limit }} caractères"
     * )
     */
    private $text4;



//--------------------------------------------------------------------
//  SLIDER
//_____________________________________________________________________


    // Presence slider booléen
    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $slider_boolean;

    // image slider

    /**
     * @ORM\Column(type="string", nullable=true)
     * @Assert\File(maxSize="10000000",
     * mimeTypes = {"image/jpeg", "image/png", "image/gif", "image/jpg"},
     * mimeTypesMessage = "Ce fichier doit être une image (jpg, jpeg, png)"
     * )
     *
     */
    private $img3;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $img_alt3;

    // image slider

    /**
     * @ORM\Column(type="string", nullable=true)
     * @Assert\File(maxSize="10000000",
     * mimeTypes = {"image/jpeg", "image/png", "image/gif", "image/jpg"},
     * mimeTypesMessage = "Ce fichier doit être une image (jpg, jpeg, png)"
     * )
     *
     */
    private $img4;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $img_alt4;

    // image slider

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $img5;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $img_alt5;

    // image slider

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $img6;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $img_alt6;

    // Caption slider

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $sl_caption;
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
    public function getSub2()
    {
      return $this->sub2;
    }

    /**
     * @param mixed $sub2
     */
    public function setSub2($sub2): void
    {
      $this->sub2 = $sub2;
    }

    /**
     * @return mixed
     */
    public function getText2()
    {
      return $this->text2;
    }

    /**
     * @param mixed $text2
     */
    public function setText2($text2): void
    {
      $this->text2 = $text2;
    }

    /**
     * @return mixed
     */
    public function getImg2()
    {
      return $this->img2;
    }

    /**
     * @param mixed $img2
     */
    public function setImg2($img2): void
    {
      $this->img2 = $img2;
    }

    /**
     * @return mixed
     */
    public function getImgAlt2()
    {
      return $this->img_alt2;
    }

    /**
     * @param mixed $img_alt2
     */
    public function setImgAlt2($img_alt2): void
    {
      $this->img_alt2 = $img_alt2;
    }

    /**
     * @return mixed
     */
    public function getSub3()
    {
      return $this->sub3;
    }

    /**
     * @param mixed $sub3
     */
    public function setSub3($sub3): void
    {
      $this->sub3 = $sub3;
    }

    /**
     * @return mixed
     */
    public function getText3()
    {
      return $this->text3;
    }

    /**
     * @param mixed $text3
     */
    public function setText3($text3): void
    {
      $this->text3 = $text3;
    }

    /**
     * @return mixed
     */
    public function getSub4()
    {
      return $this->sub4;
    }

    /**
     * @param mixed $sub4
     */
    public function setSub4($sub4): void
    {
      $this->sub4 = $sub4;
    }

    /**
     * @return mixed
     */
    public function getText4()
    {
      return $this->text4;
    }

    /**
     * @param mixed $text4
     */
    public function setText4($text4): void
    {
      $this->text4 = $text4;
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
    public function getSliderBoolean()
    {
      return $this->slider_boolean;
    }

    /**
     * @param mixed $slider_boolean
     */
    public function setSliderBoolean($slider_boolean): void
    {
      $this->slider_boolean = $slider_boolean;
    }

    /**
     * @return mixed
     */
    public function getImg3()
    {
      return $this->img3;
    }

    /**
     * @param mixed $img3
     */
    public function setImg3($img3): void
    {
      $this->img3 = $img3;
    }

    /**
     * @return mixed
     */
    public function getImgAlt3()
    {
      return $this->img_alt3;
    }

    /**
     * @param mixed $img_alt3
     */
    public function setImgAlt3($img_alt3): void
    {
      $this->img_alt3 = $img_alt3;
    }

    /**
     * @return mixed
     */
    public function getImg4()
    {
      return $this->img4;
    }

    /**
     * @param mixed $img4
     */
    public function setImg4($img4): void
    {
      $this->img4 = $img4;
    }

    /**
     * @return mixed
     */
    public function getImgAlt4()
    {
      return $this->img_alt4;
    }

    /**
     * @param mixed $img_alt4
     */
    public function setImgAlt4($img_alt4): void
    {
      $this->img_alt4 = $img_alt4;
    }

    /**
     * @return mixed
     */
    public function getImg5()
    {
      return $this->img5;
    }

    /**
     * @param mixed $img5
     */
    public function setImg5($img5): void
    {
      $this->img5 = $img5;
    }

    /**
     * @return mixed
     */
    public function getImgAlt5()
    {
      return $this->img_alt5;
    }

    /**
     * @param mixed $img_alt5
     */
    public function setImgAlt5($img_alt5): void
    {
      $this->img_alt5 = $img_alt5;
    }

    /**
     * @return mixed
     */
    public function getImg6()
    {
      return $this->img6;
    }

    /**
     * @param mixed $img6
     */
    public function setImg6($img6): void
    {
      $this->img6 = $img6;
    }

    /**
     * @return mixed
     */
    public function getImgAlt6()
    {
      return $this->img_alt6;
    }

    /**
     * @param mixed $img_alt6
     */
    public function setImgAlt6($img_alt6): void
    {
      $this->img_alt6 = $img_alt6;
    }

    /**
     * @return mixed
     */
    public function getSlCaption()
    {
      return $this->sl_caption;
    }

    /**
     * @param mixed $sl_caption
     */
    public function setSlCaption($sl_caption): void
    {
      $this->sl_caption = $sl_caption;
    }







  }