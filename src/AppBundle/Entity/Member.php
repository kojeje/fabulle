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

    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
      $metadata->addPropertyConstraint('publieLe', new Assert\DateTime());
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
    private $instru;
    /**
     * @ORM\Column(type="string")
     */
    private $photo;

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

    // Relations



    /**
     * @ORM\ManyToOne(targetEntity="show", inversedBy="member")
     */
    private $show;

    /**
     * @ORM\ManyToOne(targetEntity="post", inversedBy="member")
     */
    private $post;

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
    public function getInstru()
    {
      return $this->instru;
    }

    /**
     * @param mixed $instru
     */
    public function setInstru($instru): void
    {
      $this->instru = $instru;
    }







  }