<?php

namespace AppBundle\Repository;

use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\NoResultException;

/**
 * ZoneRepository
 *
 * Pour les requetes et fonction relativement à la zone
 * repository methods below.
 */
class ZoneRepository extends \Doctrine\ORM\EntityRepository
{

    /**
    * Fonction de recuperation du dernier identifiant de la base de données
    *
    * Author: Delrodie AMOIKON
    * Date: 10/10/2016 19/57
    */
    public function getDernierId()
    {
        $qb = $this->createQueryBuilder('z')
            ->select('count(z.id)')
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

  /**
  * Fonction de formattage du code
  *
  * Author: Delrodie AMOIKON
  *
  * Date: 10/10/2016 19:15
  */
  public function formatCode($id)
  {
    if ($id < 10) {
      return $code = '0'.$id;
    } else {
      return $id;
    }

  }

  /**
  * Fonction de recherche du code de la zone du beneficiaire
  * par son ID
  *
  * Author: Delrodie AMOIKON
  * Date: 12/10/2016
  * Since: v1.0
  */
  public function requeteZoneCode($id)
  {
      $em = $this->getEntityManager();
      $qb = $em->createQuery('
          SELECT z.code as code
          FROM AppBundle:Zone z
          WHERE z.id = :id
      ')->setParameter('id', $id)
      ;
      try {
          $code = $qb->getSingleResult();
          foreach ($code as $key => $value) {
              return $value;
          }

      } catch (NoResultException $e) {
          return $e;
      }

  }
}
