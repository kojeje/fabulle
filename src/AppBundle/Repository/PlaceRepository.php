<?php
  /**
   * Created by PhpStorm.
   * User: jeromesuhard
   * Date: 01/01/2019
   * Time: 17:37
   */

  namespace AppBundle\Repository;


  use Doctrine\ORM\EntityRepository;

  class PlaceRepository extends EntityRepository
  {
    public function getAllPlace($place)
    {
//    QueryBuilder => Pour éxecuter des requêtes
//    Altenatives  : DQL ou NativeQueries (permet de rentrer du SQL pur)

      $queryBuilder =$this
        ->createQueryBuilder('pl');
      $query = $queryBuilder

        ->select('pl')

//    Permet de définir un paramètre de requete de maniere sécurisée
        ->setParameter('place', $place)
//    recupérer la methode createQueryBuilder dans la variable $query et la passer dans $results
        ->getQuery();

//    Eq fetch
      $results = $query->getArrayResult();
      return $results;
    }
    public function getPlacebyEventId($id)
    {
      $queryBuilder =$this->createQueryBuilder('pl');

      $query = $queryBuilder
        ->leftJoin('pl.event','pl')
        ->select('pl')
        ->addSelect('e')
        ->where('e.id = :id')
        ->setParameter('id', $id)
        ->getQuery();
//                    eq fetch

      $results = $query->getResult();

      return $results;
    }
  }