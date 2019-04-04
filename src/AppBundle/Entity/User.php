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
     * @ORM\Column(type="string", nullable=true)
     */
    private $avatar;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $avatar_alt;


    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
      $metadata->addPropertyConstraint('publieLe', new Assert\DateTime());
    }

    public function __construct()
    {
      parent::__construct();
      // your own logic
    }

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
    public function getAvatar()
    {
      return $this->avatar;
    }

    /**
     * @param mixed $avatar
     */
    public function setAvatar($avatar): void
    {
      $this->avatar = $avatar;
    }

    /**
     * @return mixed
     */
    public function getAvatarAlt()
    {
      return $this->avatar_alt;
    }

    /**
     * @param mixed $avatar_alt
     */
    public function setAvatarAlt($avatar_alt): void
    {
      $this->avatar_alt = $avatar_alt;
    }



  }