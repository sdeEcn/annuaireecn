<?php
/**
 * Created by PhpStorm.
 * User: Alban
 * Date: 26/11/2018
 * Time: 21:50
 */

namespace App\Repository;


use Doctrine\ORM\EntityRepository;
use phpDocumentor\Reflection\Types\Integer;

class EleveRepository extends EntityRepository
{
    public function getById(Integer $id)
    {
        return $this->createQueryBuilder("j")
            ->where("j.id=:id")
            ->setParameter('id',$id)
            ->getQuery()
            ->getResult();
    }

    public function getByNom(string $nom)
    {
        return $this->createQueryBuilder("j")
            ->where("j.nom= :nom")
            ->setParameter('nom',$nom)
            ->getQuery()
            ->getResult();
    }

    public function getByPrenom(string $prenom)
    {
        return $this->createQueryBuilder("j")
            ->where("j.prenom=:prenom")
            ->setParameter('prenom',$prenom)
            ->getQuery()
            ->getResult();
    }

    public function getByMail(string $mail)
    {
        return $this->createQueryBuilder("j")
            ->where("j.mail= :mail")
            ->setParameter('mail',$mail)
            ->getQuery()
            ->getResult();
    }

    public function getByPromo(Integer $promo)
    {
        return $this->createQueryBuilder("j")
            ->where("j.promo=:promo")
            ->setParameter('promo',$promo)
            ->getQuery()
            ->getResult();
    }
}