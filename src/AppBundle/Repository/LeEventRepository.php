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
    public function getAllEvent($event)
    {
//    QueryBuilder => Pour éxecuter des requêtes
//    Altenatives  : DQL ou NativeQueries (permet de rentrer du SQL pur)

      $queryBuilder =$this
        ->createQueryBuilder('e');
      $query = $queryBuilder
        ->leftJoin('e.place','pl')

        ->select('e')
        ->addSelect('pl')

//    Permet de définir un paramètre de requete de maniere sécurisée
        ->setParameter('event', $event)
//    recupérer la methode createQueryBuilder dans la variable $query et la passer dans $results
        ->getQuery();

//    Eq fetch
      $results = $query->getArrayResult();
      return $results;
    }

    public function getEventbyShowId($id)
    {
      $queryBuilder =$this->createQueryBuilder('e');

      $query = $queryBuilder
        ->leftJoin('e.show','s')
        ->select('e')
        ->addSelect('s')
        ->where('s.id = :id')
        ->setParameter('id', $id)
        ->getQuery();
//                    eq fetch

      $results = $query->getResult();

      return $results;
    }

    public function getEventbyPlaceId($id)
    {
      $queryBuilder =$this->createQueryBuilder('e');

      $query = $queryBuilder
        ->leftJoin('e.place','pl')
        ->select('e')
        ->addSelect('pl')
        ->where('pl.id = :id')
        ->setParameter('id', $id)
        ->getQuery();
//                    eq fetch

      $results = $query->getResult();

      return $results;
    }
  }