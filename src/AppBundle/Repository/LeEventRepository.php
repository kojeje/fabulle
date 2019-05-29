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
    public function getEventByShowTitre($titre)
    {//recherche par nom client approximatif dans Client pour Administrateur !!!!!!!!!!!!!!
      //crée objet constructeur de requete sur table r
      $queryBuilder = $this->createQueryBuilder('e');
      // utilisation du LIKE avec contrôle entrée setParameter;
      $query = $queryBuilder
        ->select('e')
        /* jointure table client*/
        ->leftJoin('e.leShow', 's')
        /* requete ciblée sur nom client, avec Like qui permet de retourner une liste de réservations
        à partir des premières lettres d'un nom de Client */
        ->where('s.titre LIKE :titre')
        ->setParameter('titre', '%' . $titre . '%')// sécurité injection !!!
        ->orderBy('e.date', 'DESC')
        ->getQuery();
      $results = $query->getResult();
      return $results;
////    QueryBuilder => Pour éxecuter des requêtes
////    Altenatives  : DQL ou NativeQueries (permet de rentrer du SQL pur)
//
//      $queryBuilder =$this
//        ->createQueryBuilder('e');
//      $query = $queryBuilder
//        ->leftJoin('e.place','pl')
//        ->select('e')
//        ->addSelect('pl')
//        ->where('pl.leEvent LIKE :leEvent')
////    Permet de définir un paramètre de requete de maniere sécurisée
//        ->setParameter('leEvent', '%'. $id .'%')
////    recupérer la methode createQueryBuilder dans la variable $query et la passer dans $results
//        ->getQuery();
//
////    Eq fetch
//      $results = $query->getArrayResult();
//      return $results;
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


  }