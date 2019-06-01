<?php
  /**
   * Created by PhpStorm.
   * User: jeromesuhard
   * Date: 01/01/2019
   * Time: 17:37
   */

  namespace AppBundle\Repository;


  use Doctrine\ORM\EntityRepository;

  class LeEventRepository extends EntityRepository
  {
    /**
     * @param $spectacle
     * @return array
     */
    public function getLeEventByShow($leShow)
    {
//requête par spectacle, ordre commence par la dernière date de réservation
      $queryBuilder = $this->createQueryBuilder('e');

      $query = $queryBuilder
        ->select('e')
        ->where('e.leShow.titre =:titre')
        ->setParameter('leShow', $leShow)
        ->orderBy('e.date', 'DESC')
        ->getQuery();
      $results = $query->getResult();
      return $results;
    }



  }