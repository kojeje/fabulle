<?php
  /**
   * Created by PhpStorm.
   * User: jeromesuhard
   * Date: 04/04/2019
   * Time: 16:48
   */

  namespace AppBundle\Entity;
  use Doctrine\ORM\Mapping as ORM;
  use Symfony\Component\Validator\Constraints as Assert;
  use Symfony\Component\Validator\Mapping\ClassMetadata;

  //    Colonnes de la table
  /**
   * @ORM\Table(name="referencies")
   * @ORM\Entity(repositoryClass="AppBundle\Repository\ReferenciesRepository")
   */

  class Referencies
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
     */
    private $salle;
    /**
     * @ORM\Column(type="integer", length=5)
     */
    private $cp;
    /**
     * @ORM\Column(type="string")
     */
    private $commune;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="datetimetz")
     *
     */
    private $publiele;

    //  Relations
    /**
     * @ORM\ManyToOne(targetEntity="Show", inversedBy="referencies")
     */
    private $show;



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
    public function getSalle()
    {
      return $this->salle;
    }

    /**
     * @param mixed $salle
     */
    public function setSalle($salle): void
    {
      $this->salle = $salle;
    }

    /**
     * @return mixed
     */
    public function getCp()
    {
      return $this->cp;
    }

    /**
     * @param mixed $cp
     */
    public function setCp($cp): void
    {
      $this->cp = $cp;
    }

    /**
     * @return mixed
     */
    public function getCommune()
    {
      return $this->commune;
    }

    /**
     * @param mixed $commune
     */
    public function setCommune($commune): void
    {
      $this->commune = $commune;
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