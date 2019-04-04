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

  //    Colonnes de la table
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

    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
      $metadata->addPropertyConstraint('publieLe', new Assert\DateTime());
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
     * @Assert\Length(
     *      min = 15,
     *      max = 255,
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
     * @ORM\Column(type="string", nullable=true)
     */
    private $tel;
    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $email;



    //  Relations

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Post", mappedBy="event")
     */
    private $post;

    /**
     * @ORM\ManyToOne(targetEntity="show", inversedBy="event")
     */
    private $show;

    /**
     * @ORM\ManyToOne(targetEntity="place", inversedBy="event")
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








  }