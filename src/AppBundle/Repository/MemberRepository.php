<?php
  /**
   * Created by PhpStorm.
   * User: jeromesuhard
   * Date: 01/01/2019
   * Time: 17:37
   */

  namespace AppBundle\Repository;


  use Doctrine\ORM\EntityRepository;

  class MemberRepository extends EntityRepository
  {
    public function getAllMember($member)
    {
// QueryBuilder => Pour éxecuter des requêtes
// Altenatives  : DQL ou NativeQueries (permet de rentrer du SQL pur)

      $queryBuilder =$this
        ->createQueryBuilder('m');
      $query = $queryBuilder

        ->select('m')

//              Permet de définir un paramètre de requete de maniere sécurisée
        ->setParameter('member', $member)
//              recupérer la methode createQueryBuilder dans la variable $query et la passer dans $results
        ->getQuery();

//            eq fetch
      $results = $query->getArrayResult();
      return $results;
    }

    public function getMemberbyMetier($metier)
    {
      $queryBuilder =$this->createQueryBuilder('m');

      $query = $queryBuilder
        ->select('m')
        ->where('m.metier = :metier')
        ->setParameter('metier', $metier)
        ->getQuery();
//                    eq fetch

      $results = $query->getResult();

      return $results;
    }

    public function getMemberbyShowId($id)
    {
      $queryBuilder =$this->createQueryBuilder('m');

      $query = $queryBuilder
        ->leftJoin('m.show','s')
        ->select('m')
        ->addSelect('s')
        ->where('s.id = :id')
        ->setParameter('id', $id)
        ->getQuery();
//                    eq fetch

      $results = $query->getResult();

      return $results;
    }

  }