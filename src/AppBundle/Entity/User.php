<?php
// src/AppBundle/Entity/User.php

  namespace AppBundle\Entity;

  use FOS\UserBundle\Model\User as BaseUser;
  use Doctrine\ORM\Mapping as ORM;
  use Symfony\Component\Validator\Mapping\ClassMetadata;
  use Symfony\Component\Validator\Constraints as Assert;

  /**
   * @ORM\Entity
   * @ORM\Table(name="fos_user")
   */
  class User extends BaseUser
  {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    private $img;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $img_alt;

    // Champs définis par FOS_USER

    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
      $metadata->addPropertyConstraint('publieLe', new Assert\DateTime());
    }

    public function __construct()
    {
      parent::__construct();

    }

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





  }