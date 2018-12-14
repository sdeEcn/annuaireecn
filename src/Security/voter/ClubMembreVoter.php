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
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;

class ClubMembreVoter extends Voter
{

    private $security;

    /**
     * ClubAdminVoter constructor.
     * @param $security
     */
    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    protected function supports($attribute, $subject)
    {
        return $attribute==="MEMBRE" && $subject instanceof Club;
    }


    protected function voteOnAttribute($attribute, $subject, TokenInterface $token)
    {
        $user = $token->getUser();

        if( !$user instanceof UserInterface){
            return false;
        }

        if($this->security->isGranted("ROLE_ADMIN"))
        {
            return true;
        }

        if($user===$subject->getBureau()->getPresident())
        {
            return true;
        }

        foreach ($subject->getMembres() as $membre){
            if($membre->getEleve()->getId() == $user->getId() && $membre->getStatus()==2){
                return true;
            }
        }

        return false;
    }
}