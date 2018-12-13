<?php
/**
 * Created by PhpStorm.
 * User: Alban
 * Date: 13/12/2018
 * Time: 20:34
 */

namespace App\Security\voter;


use App\Entity\Club;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

class ClubMembreVoter extends Voter
{


    protected function supports($attribute, $subject)
    {
        return $attribute==="MEMBRE" && $subject instanceof Club;
    }


    protected function voteOnAttribute($attribute, $subject, TokenInterface $token)
    {

    }
}