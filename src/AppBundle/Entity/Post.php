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
     *
     */
    private $category;
    /**
     * @ORM\Column(type="datetimetz")
     *
     */
    private $publiele;

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
    private $img_description1;



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

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $img_description2;


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

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $img_description3;

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

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $img_description4;


    /**
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Length(
     *      min = 15,
     *      max = 255,
     *      minMessage = "La longueur minimum du contenu doit-être de {{ limit }} caractères",
     *      maxMessage = "La longueur maximum du contenu doit-être de {{ limit }} caractères"
     * )
     */
    private $intro;

    /**
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Length(
     *      min = 5,
     *      max = 100,
     *      minMessage = "La longueur minimum du contenu doit-être de {{ limit }} caractères",
     *      maxMessage = "La longueur maximum du contenu doit-être de {{ limit }} caractères"
     * )
     */
    private $sub1;

    /**
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Length(
     *      min = 10,
     *      max = 5000,
     *      minMessage = "La longueur minimum du contenu doit-être de {{ limit }} caractères",
     *      maxMessage = "La longueur maximum du contenu doit-être de {{ limit }} caractères"
     * )
     */
    private $text1;

    /**
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Length(
     *      min = 5,
     *      max = 100,
     *      minMessage = "La longueur minimum du contenu doit-être de {{ limit }} caractères",
     *      maxMessage = "La longueur maximum du contenu doit-être de {{ limit }} caractères"
     * )
     */
    private $sub2;

    /**
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Length(
     *      min = 10,
     *      max = 5000,
     *      minMessage = "La longueur minimum du contenu doit-être de {{ limit }} caractères",
     *      maxMessage = "La longueur maximum du contenu doit-être de {{ limit }} caractères"
     * )
     */
    private $text2;

    /**
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Length(
     *      min = 5,
     *      max = 100,
     *      minMessage = "La longueur minimum du contenu doit-être de {{ limit }} caractères",
     *      maxMessage = "La longueur maximum du contenu doit-être de {{ limit }} caractères"
     * )
     */
    private $sub3;

    /**
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Length(
     *      min = 10,
     *      max = 5000,
     *      minMessage = "La longueur minimum du contenu doit-être de {{ limit }} caractères",
     *      maxMessage = "La longueur maximum du contenu doit-être de {{ limit }} caractères"
     * )
     */
    private $text3;

    /**
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Length(
     *      min = 5,
     *      max = 100,
     *      minMessage = "La longueur minimum du contenu doit-être de {{ limit }} caractères",
     *      maxMessage = "La longueur maximum du contenu doit-être de {{ limit }} caractères"
     * )
     */
    private $sub4;

    /**
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Length(
     *      min = 10,
     *      max = 5000,
     *      minMessage = "La longueur minimum du contenu doit-être de {{ limit }} caractères",
     *      maxMessage = "La longueur maximum du contenu doit-être de {{ limit }} caractères"
     * )
     */
    private $text4;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $youtube;

//  Relations

    /**
     * @ORM\ManyToOne(targetEntity="Event", inversedBy="post")
     */
    private $event;

//    /**
//     * @ORM\OneToMany(targetEntity="AppBundle\Entity\User", mappedBy="post")
//     */
//    private $user;


    /**
     * @ORM\ManyToOne(targetEntity="Show", inversedBy="post")
     */
    private $show;

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
    public function getIntro()
    {
      return $this->intro;
    }

    /**
     * @param mixed $intro
     */
    public function setIntro($intro): void
    {
      $this->intro = $intro;
    }

    /**
     * @return mixed
     */
    public function getSub1()
    {
      return $this->sub1;
    }

    /**
     * @param mixed $sub1
     */
    public function setSub1($sub1): void
    {
      $this->sub1 = $sub1;
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
    public function getShow()
    {
      return $this->show;
    }

    /**
     * @return mixed
     */
    public function getMember()
    {
      return $this->member;
    }

    /**
     * @param mixed $member
     */
    public function setMember($member): void
    {
      $this->member = $member;
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
    public function getImgDescription1()
    {
      return $this->img_description1;
    }

    /**
     * @param mixed $img_description1
     */
    public function setImgDescription1($img_description1): void
    {
      $this->img_description1 = $img_description1;
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
    public function getImgDescription2()
    {
      return $this->img_description2;
    }

    /**
     * @param mixed $img_description2
     */
    public function setImgDescription2($img_description2): void
    {
      $this->img_description2 = $img_description2;
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
    public function getImgDescription3()
    {
      return $this->img_description3;
    }

    /**
     * @param mixed $img_description3
     */
    public function setImgDescription3($img_description3): void
    {
      $this->img_description3 = $img_description3;
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
    public function getImgDescription4()
    {
      return $this->img_description4;
    }

    /**
     * @param mixed $img_description4
     */
    public function setImgDescription4($img_description4): void
    {
      $this->img_description4 = $img_description4;
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



  }