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
//    /**
//     * @return array
//     */
//    public function findAll(){
//        //requête EN DATES ASCENDANTE
//        return $this->findBy(array(), ['date' => 'ASC']);
//    }

    public function getPlaceByLeEvent($id){


//    requête par lieu, ordre commence par la prochaine date
        $queryBuilder = $this->createQueryBuilder('e');
///  querybuilder classe de doctrine permettant de créer des requêtes en php
        $query = $queryBuilder
//    //equivalent de SELECT * FROM place
          ->select('e')
          /* jointures */

          // avec Place
          ->leftJoin('e.place', 'p')
          //On récupère les données des tables liées
          ->addSelect('p')
          // Si équivalence entre la saisie et le code postal du lieu
          ->andWhere('p.id = e.place')
          // Sécurise le formulaire contre des injections sql
          ->setParameter('id', $id)
          // GO
          ->getQuery();


        $results = $query->getResult();
        return $results;
      }

    public function getleShowByLeEvent($id){


//    requête par lieu, ordre commence par la prochaine date
      $queryBuilder = $this->createQueryBuilder('e');
///  querybuilder classe de doctrine permettant de créer des requêtes en php
      $query = $queryBuilder
//    //equivalent de SELECT * FROM place
        ->select('e')
        /* jointures */

        // avec Place
        ->leftJoin('e.leShow', 's')
        //On récupère les données des tables liées
        ->addSelect('s')
        // Si équivalence entre la saisie et le code postal du lieu
        ->andWhere('s.id = e.leShow')
        // Sécurise le formulaire contre des injections sql
        ->setParameter('id', $id)
        // GO
        ->getQuery();


      $results = $query->getResult();
      return $results;
    }



  }