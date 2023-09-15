<?php
namespace Service;

use App\Session;
use Model\Entities\Trailblazer;
use Model\Managers\TrailblazerManager;


class UpdateUser {
    private $user;

    public function __construct(Trailblazer $user)
    {
        $userManager = new TrailblazerManager;
        $this->user = $userManager->findOneById($user->getId());
    }

    public function update(){
        Session::setUser($this->user);
        return true;
    }

}