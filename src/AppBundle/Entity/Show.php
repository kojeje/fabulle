<?php
  /**
   * Created by PhpStorm.
   * User: jeromesuhard
   * Date: 03/04/2019
   * Time: 22:44
   */

  namespace AppBundle\Entity;
  use Doctrine\ORM\Mapping as ORM;
  use Symfony\Component\Validator\Constraints as Assert;


  //    Colonnes de la table
  /**
   * @ORM\Table(name="show")
   * @ORM\Entity(repositoryClass="AppBundle\Repository\ShowRepository")
   */

  class Show
  {
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

// --------------------------------

    // date de publication

    public function __construct()
    {
      $this->setPubliele(new \DateTime());
    }
    /**
     * @ORM\Column(type="datetimetz")
     *
     */
    private $publiele;


// --------------------------------

    // disponibilité (booléen)

    /**
     * @ORM\Column(type="boolean")
     */
    private $dispo_boolean;


// --------------------------------

    // date de création

    /**
     * @ORM\Column(type="date")
     *
     */
    private $creation_date;


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
     * @ORM\Column(type="string")
     * @Assert\Length(
     *      min = 50,
     *      max = 5000,
     *      minMessage = "La longueur minimum du contenu doit-être de {{ limit }} caractères",
     *      maxMessage = "La longueur maximum du contenu doit-être de {{ limit }} caractères"
     * )
     */

    private $text1;


  // image principale

    /**
     * @ORM\Column(type="string")
     * @Assert\File(maxSize="10000000",
     * mimeTypes = {"image/jpeg", "image/png", "image/gif", "image/jpg"},
     * mimeTypesMessage = "Ce fichier doit être une image (jpg, jpeg, png)"
     * )
     *
     */
    private $img1;

    /**
     * @ORM\Column(type="string")
     */
    private $img_alt1;

// --------------------------------

    // sub_title optionnel

    /**
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Length(
     *      min = 10,
     *      max = 255,
     *      minMessage = "La longueur minimum du contenu doit-être de {{ limit }} caractères",
     *      maxMessage = "La longueur maximum du contenu doit-être de {{ limit }} caractères"
     * )
     */

    private $sub2;

    // Texte optionnel

    /**
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Length(
     *      min = 50,
     *      max = 10000,
     *      minMessage = "La longueur minimum du contenu doit-être de {{ limit }} caractères",
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
     *      min = 10,
     *      max = 255,
     *      minMessage = "La longueur minimum du contenu doit-être de {{ limit }} caractères",
     *      maxMessage = "La longueur maximum du contenu doit-être de {{ limit }} caractères"
     * )
     */
    private $sub3;

    // Texte optionnel

    /**
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Length(
     *      min = 50,
     *      max = 10000,
     *      minMessage = "La longueur minimum du contenu doit-être de {{ limit }} caractères",
     *      maxMessage = "La longueur maximum du contenu doit-être de {{ limit }} caractères"
     * )
     */
    private $text3;

    // sub_title optionnel

    /**
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Length(
     *      min = 10,
     *      max = 255,
     *      minMessage = "La longueur minimum du contenu doit-être de {{ limit }} caractères",
     *      maxMessage = "La longueur maximum du contenu doit-être de {{ limit }} caractères"
     * )
     */
    private $sub4;

    // texte optionnel

    /**
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Length(
     *      min = 50,
     *      max = 10000
     *   ,
     *      minMessage = "La longueur minimum du contenu doit-être de {{ limit }} caractères",
     *      maxMessage = "La longueur maximum du contenu doit-être de {{ limit }} caractères"
     * )
     */
    private $text4;


//--------------------------------------------------------------------
//  SLIDER
//_____________________________________________________________________


  // Presence slider booléen
    /**
     * @ORM\Column(type="boolean")
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
     * @ORM\Column(type="boolean")
     */
    private $video_boolean;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $youtube;

//-------------------------------------------------------------
//  données sur le spectacle
//_____________________________________________________________




    /**
     * @ORM\Column(type="string", nullable=true)
     *
     */
    private $genre;
    /**
     * @ORM\Column(type="integer", nullable=true)
     *
     */
    private $duree;

    /**
     * @ORM\Column(type="integer", length=1, nullable=true)
     */
    private $min_age;

    /**
     * @ORM\Column(type="integer", length=1, nullable=true)
     */
    private $max_age;

    /**
     * @ORM\Column(type="integer", length=1, nullable=true)
     */
    private $min_artist;

    /**
     * @ORM\Column(type="integer", length=1, nullable=true)
     */
    private $max_artist;
    /**
     * @ORM\Column(type="integer", nullable=true)
     *
     */
    private $jauge_max;

    /**
     * @ORM\Column(type="integer", nullable=true)
     *
     */
    private $tarif;

//------------------------------------------------------------------------------

    // Relations

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Event", mappedBy="show")
     */
    private $event;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Post", mappedBy="show")
     */
    private $post;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Referencies", mappedBy="show")
     */
    private $referencies;

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
    public function getDispoBoolean()
    {
      return $this->dispo_boolean;
    }

    /**
     * @param mixed $dispo_boolean
     */
    public function setDispoBoolean($dispo_boolean): void
    {
      $this->dispo_boolean = $dispo_boolean;
    }

    /**
     * @return mixed
     */
    public function getCreationDate()
    {
      return $this->creation_date;
    }

    /**
     * @param mixed $creation_date
     */
    public function setCreationDate($creation_date): void
    {
      $this->creation_date = $creation_date;
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
    public function getGenre()
    {
      return $this->genre;
    }

    /**
     * @param mixed $genre
     */
    public function setGenre($genre): void
    {
      $this->genre = $genre;
    }

    /**
     * @return mixed
     */
    public function getDuree()
    {
      return $this->duree;
    }

    /**
     * @param mixed $duree
     */
    public function setDuree($duree): void
    {
      $this->duree = $duree;
    }

    /**
     * @return mixed
     */
    public function getMinAge()
    {
      return $this->min_age;
    }

    /**
     * @param mixed $min_age
     */
    public function setMinAge($min_age): void
    {
      $this->min_age = $min_age;
    }

    /**
     * @return mixed
     */
    public function getMaxAge()
    {
      return $this->max_age;
    }

    /**
     * @param mixed $max_age
     */
    public function setMaxAge($max_age): void
    {
      $this->max_age = $max_age;
    }

    /**
     * @return mixed
     */
    public function getMinArtist()
    {
      return $this->min_artist;
    }

    /**
     * @param mixed $min_artist
     */
    public function setMinArtist($min_artist): void
    {
      $this->min_artist = $min_artist;
    }

    /**
     * @return mixed
     */
    public function getMaxArtist()
    {
      return $this->max_artist;
    }

    /**
     * @param mixed $max_artist
     */
    public function setMaxArtist($max_artist): void
    {
      $this->max_artist = $max_artist;
    }

    /**
     * @return mixed
     */
    public function getJaugeMax()
    {
      return $this->jauge_max;
    }

    /**
     * @param mixed $jauge_max
     */
    public function setJaugeMax($jauge_max): void
    {
      $this->jauge_max = $jauge_max;
    }

    /**
     * @return mixed
     */
    public function getTarif()
    {
      return $this->tarif;
    }

    /**
     * @param mixed $tarif
     */
    public function setTarif($tarif): void
    {
      $this->tarif = $tarif;
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
    public function getReferencies()
    {
      return $this->referencies;
    }

    /**
     * @param mixed $referencies
     */
    public function setReferencies($referencies): void
    {
      $this->referencies = $referencies;
    }






      }