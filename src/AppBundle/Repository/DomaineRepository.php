<?php

namespace AppBundle\Repository;

use Doctrine\ORM\QueryBuilder;

/**
 * DomaineRepository
 *
 * Class de requête relativement au domaine dans le systeme
 *
 * Author: Delrodie AMOIKON
 * Date: 11/10/2015 01:02
 */
class DomaineRepository extends \Doctrine\ORM\EntityRepository
{

  /**
  * Fonction de recuperation du dernier identifiant de la base de données
  *
  * Author: Delrodie AMOIKON
  * Date: 10/10/2016 19/57
  */
  public function getDernierId()
  {
      $qb = $this->createQueryBuilder('d')
          ->select('count(d.id)')
      ;

      $query = $qb->getQuery();

      $recup =  $query->getSingleScalarResult();

      // Si compteur est egal a 0 alors initialiser
      if ($recup < 10){
          $suffixe = $recup + 1;
          return $code = '0'.$suffixe;
      }
      else{
          return $code = $recup;
      }

  }
}
