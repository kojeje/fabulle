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
    private $category;


    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $img1;

    /**
     * @ORM\Column(type="string", nullable=true)

     */
    private $img2;


    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $img3;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $img4;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $intro;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $sub1;
    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $text1;
    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $sub2;
    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $text2;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $sub3;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $text3;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $sub4;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $text4;

//  Relations

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Event", mappedBy="post")
     */
    private $event;

    /**
     * @ORM\ManyToOne(targetEntity="show", inversedBy="post")
     */
    private $show;


  }