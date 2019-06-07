<?php
  /**
   * Created by PhpStorm.
   * User: jeromesuhard
   * Date: 01/01/2019
   * Time: 17:37
   */

  namespace AppBundle\Repository;




  class LeEventRepository extends \Doctrine\ORM\EntityRepository


    {
    /**
     * @return array
     */
    public function findAll(){
        //requête en alphabétique
        return $this->findBy(array(), ['date' => 'ASC']);
    }




  }