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
    public function getAllShow($leShow)
    {
// QueryBuilder => Pour éxecuter des requêtes
// Altenatives  : DQL ou NativeQueries (permet de rentrer du SQL pur)

      $queryBuilder =$this
        ->createQueryBuilder('s');
      $query = $queryBuilder

        ->select('s')

//              Permet de définir un paramètre de requete de maniere sécurisée
        ->setParameter('leShow', $leShow)
//              recupérer la methode createQueryBuilder dans la variable $query et la passer dans $results
        ->getQuery();

//            eq fetch
      $results = $query->getArrayResult();
      return $results;
    }

    public function getLeShowbyType($type)
    {
      $queryBuilder =$this->createQueryBuilder('s');

      $query = $queryBuilder
        ->select('s')
        ->where('s.type = :type')
        ->setParameter('type', $type)
        ->getQuery();
//                    eq fetch

      $results = $query->getResult();

      return $results;
    }

    public function getShowbyAge($min_age)
    {
      $queryBuilder =$this->createQueryBuilder('s');

      $query = $queryBuilder
        ->select('s')
        ->where('s.min_age = :min_age')
        ->setParameter('min_age', $min_age)
        ->getQuery();
//                    eq fetch

      $results = $query->getResult();

      return $results;
    }
  }