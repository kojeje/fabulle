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
  use Symfony\Component\Validator\Mapping\ClassMetadata;

  //    Colonnes de la table
  /**
   * @ORM\Table(name="show")
   * @ORM\Entity(repositoryClass="AppBundle\Repository\ShowRepository")
   */

  class show
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
     *
     */

    private $titre;

    /**
     * @ORM\Column(type="string")
     *
     */
    private $sub1;

    /**
     * @ORM\Column(type="string")
     *
     */
    private $text1;

    /**
     * @ORM\Column(type="string")
     *
     */
    private $sub2;

    /**
     * @ORM\Column(type="string")
     *
     */
    private $text2;

    /**
     * @ORM\Column(type="string")
     *
     */
    private $sub3;

    /**
     * @ORM\Column(type="string")
     *
     */
    private $text3;

    /**
     * @ORM\Column(type="string")
     *
     */
    private $sub4;

    /**
     * @ORM\Column(type="string")
     *
     */
    private $text4;


    /**
     * @ORM\Column(type="string", nullable=true)
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
     * @ORM\Column(type="string",)
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
     */
    private $img4;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $img_alt4;



    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $affiche;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $affiche_alt;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $affiche_description;

    /**
     * @ORM\Column(type="string", nullable=true)
     *
     */
    private $type;

    /**
     * @ORM\Column(type="string", nullable=true)
     *
     */
    private $tek;


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
     * @ORM\Column(type="integer", length=1, nullable=true)
     */
    private $min_tek;

    /**
     * @ORM\Column(type="integer", length=1, nullable=true)
     */
    private $max_tek;

    /**
     * @ORM\Column(type="integer", nullable=true)
     *
     */
    private $duree;

    /**
     * @ORM\Column(type="integer", nullable=true)
     *
     */
    private $tarif;

    /**
     * @ORM\Column(type="integer", nullable=true)
     *
     */
    private $jauge_max;

    // Relations

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Event", mappedBy="show")
     */
    private $event;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Referencies", mappedBy="show")
     */
    private $referencies;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Member", mappedBy="show")
     */
    private $member;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Post", mappedBy="show")
     */
    private $post;

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
    public function getAffiche()
    {
      return $this->affiche;
    }

    /**
     * @param mixed $affiche
     */
    public function setAffiche($affiche): void
    {
      $this->affiche = $affiche;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
      return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type): void
    {
      $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getTek()
    {
      return $this->tek;
    }

    /**
     * @param mixed $tek
     */
    public function setTek($tek): void
    {
      $this->tek = $tek;
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
    public function getMinTek()
    {
      return $this->min_tek;
    }

    /**
     * @param mixed $min_tek
     */
    public function setMinTek($min_tek): void
    {
      $this->min_tek = $min_tek;
    }

    /**
     * @return mixed
     */
    public function getMaxTek()
    {
      return $this->max_tek;
    }

    /**
     * @param mixed $max_tek
     */
    public function setMaxTek($max_tek): void
    {
      $this->max_tek = $max_tek;
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
    public function getAfficheAlt()
    {
      return $this->affiche_alt;
    }

    /**
     * @param mixed $affiche_alt
     */
    public function setAfficheAlt($affiche_alt): void
    {
      $this->affiche_alt = $affiche_alt;
    }

    /**
     * @return mixed
     */
    public function getAfficheDescription()
    {
      return $this->affiche_description;
    }

    /**
     * @param mixed $affiche_description
     */
    public function setAfficheDescription($affiche_description): void
    {
      $this->affiche_description = $affiche_description;
    }

















  }