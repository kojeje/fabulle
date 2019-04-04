<?php
  /**
   * Created by PhpStorm.
   * User: jeromesuhard
   * Date: 01/01/2019
   * Time: 17:37
   */

  namespace AppBundle\Repository;


  use Doctrine\ORM\EntityRepository;

  class EventRepository extends EntityRepository
  {
    public function getAllReferencies($referencies)
    {
//    QueryBuilder => Pour éxecuter des requêtes
//    Altenatives  : DQL ou NativeQueries (permet de rentrer du SQL pur)

      $queryBuilder =$this
        ->createQueryBuilder('r');
      $query = $queryBuilder
        ->leftJoin('r.show','s')

        ->select('r')
        ->addSelect('s')

//    Permet de définir un paramètre de requete de maniere sécurisée
        ->setParameter('referencies', $referencies)
//    recupérer la methode createQueryBuilder dans la variable $query et la passer dans $results
        ->getQuery();

//    Eq fetch
      $results = $query->getArrayResult();
      return $results;
    }
    public function getReferenciesbyShowId($id)
    {
      $queryBuilder =$this->createQueryBuilder('r');

      $query = $queryBuilder
        ->leftJoin('r.show','s')
        ->select('r')
        ->addSelect('s')
        ->where('s.id = :id')
        ->setParameter('id', $id)
        ->getQuery();
//                    eq fetch

      $results = $query->getResult();

      return $results;
    }
    public function getReferenciesbyCommune($commune)
    {
      $queryBuilder =$this->createQueryBuilder('r');

      $query = $queryBuilder
        ->leftJoin('r.show','s')
        ->select('r')
        ->addSelect('s')
        ->where('r.commune = :commune')
        ->setParameter('commune', $commune)
        ->getQuery();
//                    eq fetch

      $results = $query->getResult();

      return $results;
    }



  }