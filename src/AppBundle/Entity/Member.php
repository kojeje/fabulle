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
  use Symfony\Component\Validator\Mapping\ClassMetadata;

  //    Colonnes de la table
  /**
   * @ORM\Table(name="member")
   * @ORM\Entity(repositoryClass="AppBundle\Repository\MemberRepository")
   */

  class Member
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
     * @ORM\Column(type="string")
     */
    private $first_name;

    /**
     * @ORM\Column(type="string")
     */
    private $last_name;

    /**
     * @ORM\Column(type="string")
     */
    private $pseudo;

    /**
     * @ORM\Column(type="string")
     */
    private $metiers;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $instru1;
    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $instru2;
    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $instru3;

    /**
     * @ORM\Column(type="string")
     */
    private $photo;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $photo_alt;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $photo_description;

    /**
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Length(
     *      min = 2,
     *      max = 50,
     *      minMessage = "La longueur minimum du contenu doit-être de {{ limit }} caractères",
     *      maxMessage = "La longueur maximum du contenu doit-être de {{ limit }} caractères"
     * )
     */
    private $bio;

    /**
     * @ORM\Column(type="datetimetz")
     */
    private $publiele;

    // Relations



    /**
     * @ORM\ManyToOne(targetEntity="Show", inversedBy="member")
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
    public function getFirstName()
    {
      return $this->first_name;
    }

    /**
     * @param mixed $first_name
     */
    public function setFirstName($first_name): void
    {
      $this->first_name = $first_name;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
      return $this->last_name;
    }

    /**
     * @param mixed $last_name
     */
    public function setLastName($last_name): void
    {
      $this->last_name = $last_name;
    }

    /**
     * @return mixed
     */
    public function getPseudo()
    {
      return $this->pseudo;
    }

    /**
     * @param mixed $pseudo
     */
    public function setPseudo($pseudo): void
    {
      $this->pseudo = $pseudo;
    }

    /**
     * @return mixed
     */
    public function getMetiers()
    {
      return $this->metiers;
    }

    /**
     * @param mixed $metiers
     */
    public function setMetiers($metiers): void
    {
      $this->metiers = $metiers;
    }

    /**
     * @return mixed
     */
    public function getPhoto()
    {
      return $this->photo;
    }

    /**
     * @param mixed $photo
     */
    public function setPhoto($photo): void
    {
      $this->photo = $photo;
    }

    /**
     * @return mixed
     */
    public function getBio()
    {
      return $this->bio;
    }

    /**
     * @param mixed $bio
     */
    public function setBio($bio): void
    {
      $this->bio = $bio;
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
    public function getInstru1()
    {
      return $this->instru1;
    }

    /**
     * @param mixed $instru
     */
    public function setInstru1($instru1): void
    {
      $this->instru1 = $instru1;
    }

    /**
     * @return mixed
     */
    public function getInstru2()
    {
      return $this->instru2;
    }

    /**
     * @param mixed $instru2
     */
    public function setInstru2($instru2): void
    {
      $this->instru2 = $instru2;
    }

    /**
     * @return mixed
     */
    public function getInstru3()
    {
      return $this->instru3;
    }

    /**
     * @param mixed $instru3
     */
    public function setInstru3($instru3): void
    {
      $this->instru3 = $instru3;
    }

    /**
     * @return mixed
     */
    public function getPhotoAlt()
    {
      return $this->photo_alt;
    }

    /**
     * @param mixed $photo_alt
     */
    public function setPhotoAlt($photo_alt): void
    {
      $this->photo_alt = $photo_alt;
    }

    /**
     * @return mixed
     */
    public function getPhotoDescription()
    {
      return $this->photo_description;
    }

    /**
     * @param mixed $photo_description
     */
    public function setPhotoDescription($photo_description): void
    {
      $this->photo_description = $photo_description;
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


  }