<?php
/**
 * Created by PhpStorm.
 * User: Alban
 * Date: 26/11/2018
 * Time: 22:00
 */

namespace App\Repository;


use Doctrine\ORM\EntityRepository;

class ClubRepository extends EntityRepository
{
    public function getByName(string $nom){
        return $this->createQueryBuilder("C")
            ->where("C.nom=:nom")
            ->setParameter('nom',$nom)
            ->getQuery()
            ->getResult();
    }

    public function getNotHidden(){
        return $this->createQueryBuilder("C")
            ->where("!C.confidentialite")
            ->getQuery()
            ->getResult();
    }

    public function getByNameNotHidden(string $nom)
    {
        return $this->createQueryBuilder("C")
            ->where("C.nom=:nom")
            ->andWhere("!C.confidentialite")
            ->setParameter('nom',$nom)
            ->getQuery()
            ->getResult();
    }
}