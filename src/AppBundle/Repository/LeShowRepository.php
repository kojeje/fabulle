<?php
  /**
   * Created by PhpStorm.
   * User: jeromesuhard
   * Date: 01/01/2019
   * Time: 17:37
   */

  namespace AppBundle\Repository;


  use Doctrine\ORM\EntityRepository;

  class LeShowRepository extends EntityRepository
  {
    /**
     * @return array
     */
    public function findAll(){
      //requête en alphabétique
      return $this->findBy(array(), ['titre' => 'ASC']);
    }
  }