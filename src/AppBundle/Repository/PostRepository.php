<?php
  /**
   * Created by PhpStorm.
   * User: jeromesuhard
   * Date: 01/01/2019
   * Time: 17:37
   */

  namespace AppBundle\Repository;


  use Doctrine\ORM\EntityRepository;

  class PostRepository extends EntityRepository
  {

    public function getAllPost($post)
    {
// QueryBuilder => Pour éxecuter des requêtes
// Altenatives  : DQL ou NativeQueries (permet de rentrer du SQL pur)

      $queryBuilder =$this
        ->createQueryBuilder('p');
      $query = $queryBuilder

        ->select('p')

//              Permet de définir un paramètre de requete de maniere sécurisée
        ->setParameter('post', $post)
//              recupérer la methode createQueryBuilder dans la variable $query et la passer dans $results
        ->getQuery();

//            eq fetch
      $results = $query->getArrayResult();
      return $results;
    }


    public function getPostbyCategory($category)
    {
      $queryBuilder =$this->createQueryBuilder('p');

      $query = $queryBuilder
        ->select('p')
        ->where('p.category = :category')
        ->setParameter('category', $category)
        ->getQuery();
//                    eq fetch

      $results = $query->getResult();

      return $results;
    }

    public function getPostbyShowId($id)
    {
      $queryBuilder =$this->createQueryBuilder('p');

      $query = $queryBuilder
        ->leftJoin('p.show','s')
        ->select('p')
        ->addSelect('s')
        ->where('s.id = :id')
        ->setParameter('id', $id)
        ->getQuery();
//                    eq fetch

      $results = $query->getResult();

      return $results;
    }


    public function getAllbyWord($word)
    {
      $queryBuilder = $this
        ->createQueryBuilder('p');
      $query=$queryBuilder

        ->leftJoin('p.event', 'e')
        ->leftJoin('p.show','s')
        ->leftJoin('p.member', 'm')
        ->leftJoin('p.place','pl')
//          eq SELECT sql
        ->select('p')
        ->addSelect('e')
        ->addSelect('s')
        ->addSelect('m')
        ->addSelect('pl')
//          eq WHERE  sql        eq Like        eq OR sql
        ->where(
          '
                          p.titre LIKE :word 
                          OR p.category LIKE :word 
                          OR p.img1 LIKE :word
                          OR p.img2 LIKE :word
                          OR p.img3 LIKE :word
                          OR p.img4 LIKE :word
                          OR p.intro LIKE :word
                          OR p.sub1 LIKE :word
                          OR p.text1 LIKE :word
                          OR p.sub2 LIKE :word
                          OR p.text2 LIKE :word
                          OR p.sub3 LIKE :word
                          OR p.text3 LIKE :word
                          OR p.sub4 LIKE :word
                          OR p.text4 LIKE :word
                          OR e.titre LIKE :word
                          OR e.thumbnail LIKE :word
                          OR e.description LIKE :word
                          OR e.date LIKE :word
                          OR pl.place_name LIKE :word
                          OR pl.cp LIKE :word
                          OR pl.commune LIKE :word
                          OR s.titre LIKE :word
                          OR s.sub1 LIKE :word
                          OR s.text1 LIKE :word
                          OR s.sub2 LIKE :word
                          OR s.text2 LIKE :word
                          OR s.sub3 LIKE :word
                          OR s.text3 LIKE :word
                          OR s.sub4 LIKE :word
                          OR s.text4 LIKE :word
                          OR s.type LIKE :word'



        )
        ->setParameter('word','%'.$word.'%')
        ->getQuery();

      $results = $query->getArrayResult();

      return $results;
    }
  }