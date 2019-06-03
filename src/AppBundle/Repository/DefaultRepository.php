<?php
  /**
   * Created by PhpStorm.
   * User: jeromesuhard
   * Date: 03/06/2019
   * Time: 15:58
   */

  namespace AppBundle\Repository;



  class DefaultRepository extends \Doctrine\ORM\EntityRepository
  {
    public function findByWord($word)
    {
      // recherche par mot
      $queryBuilder = $this->createQueryBuilder('s');
      $query=$queryBuilder

        ->leftJoin('s.leEvent', 'e')
        ->leftJoin('s.post','p')
        ->leftJoin('s.place','pl')
//          eq SELECT sql
        ->select('s')
        ->addSelect('e')
        ->addSelect('p')
        ->addSelect('pl')
//          eq WHERE  sql        eq Like        eq OR sql
        ->where(
          '
                          s.titre LIKE :word
                          OR s.genre LIKE :word
                          OR s.dispo_boolean LIKE :word
                          OR s.text1 LIKE :word
                          OR s.creation_date LIKE :word
                          OR s.duree LIKE :word
                          OR s.min_age LIKE :word
                          OR s.max_age LIKE :word
                          OR s.min_artist LIKE :word
                          OR s.max_artist LIKE :word
                          OR s.tarif LIKE :word
                          OR s.sub2 LIKE :word
                          OR s.text2 LIKE :word
                          OR p.titre LIKE :word 
                          OR p.categorie LIKE :word 
                          OR p.text1 LIKE :word
                          OR e.date LIKE :word
                          OR e.categorie LIKE :word
                          OR pl.name LIKE :word
                          OR pl.presentation LIKE :word
                          OR pl.ad1 LIKE :word
                          OR pl.ad2 LIKE :word
                          OR pl.cp LIKE :word
                          OR pl.commune LIKE :word
                          OR pl.country LIKE :word
                          '
        )
        ->setParameter('word','%'.$word.'%')
        ->orderBy('e.date','ASC')
        ->getQuery();

      $results = $query->getArrayResult();

      return $results;
    }
  }