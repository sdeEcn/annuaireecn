<?php
/**
 * Created by PhpStorm.
 * User: Alban
 * Date: 13/12/2018
 * Time: 15:22
 */

namespace App\Security\voter;


use App\Entity\Club;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Tests\Fixtures\Entity;

class ClubAdminVoter extends Voter
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
        return ($attribute==='EDIT' && $subject instanceof Club);
    }

    protected function voteOnAttribute($attribute, $subject, TokenInterface $token)
    {
        $user = $token->getUser();

        if( !$user instanceof UserInterface){
            return false;
        }

        if( $subject->getAdmin()->contains($user) || $user===$subject->getBureau()->getPresident()){
            return true;
        }

        if($this->security->isGranted('ROLE_ADMIN')){
            return true;
        }

        return false;
    }
}