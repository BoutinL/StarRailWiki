<?php

namespace Controller;

use App\Session;
use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\TrailblazerManager;

class HomeController extends AbstractController implements ControllerInterface
{

    public function register()
    {

        if (isset($_POST['submitRegister'])) {
            $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL, FILTER_VALIDATE_EMAIL);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $confirmPassword = filter_input(INPUT_POST, 'confirmPassword', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $role = "ROLE_MEMBER";

            // If filters alright
            if ($username && $email && $password) {
                $trailblazerManager = new TrailblazerManager();
                // If email doesnt exist
                if (!$trailblazerManager->findOneByEmail($email)) {
                    // If username doesnt exist
                    if (!$trailblazerManager->findOneByUser($username)) {
                        // If both password are the same and higher than 10
                        if (($password == $confirmPassword) and strlen($password) >= 10) {
                            // Password Hash
                            $passwordHash = self::getPasswordHash($password);
                            // Inject in database
                            $trailblazerManager->add(["username" => $username, "email" => $email, "password" => $passwordHash, "role" => $role]);
                            $categ = 'success';
                            $msg ="Account created succesfully" ;
                            Session::addFlash($categ, $msg);
                            $this->redirectTo("security", "login");
                        // error msg if password doesnt match confirm password
                        } else if($password !== $confirmPassword){
                            $categ = 'error';
                            $msg ="Password doesnt match the password confirmation" ;
                            Session::addFlash($categ, $msg);
                            $this->redirectTo("security", "register");
                        }
                    // error msg if username already exist 
                    } else if($trailblazerManager->findOneByUser($username)){
                        $categ = 'error';
                        $msg ="Username already exist" ;
                        Session::addFlash($categ, $msg);
                        $this->redirectTo("security", "register");
                    }
                // error msg if email already exist
                } else if($trailblazerManager->findOneByEmail($email)) {
                    $categ = 'error';
                    $msg ="Email already exist" ;
                    Session::addFlash($categ, $msg);
                    $this->redirectTo("security", "register");
                }
            }
        } else {
            return [
                "view" => VIEW_DIR . "security/register.php",
                "data" => []
            ];
        }
    }

    public function login()
    {
        $trailblazerManager = new TrailblazerManager();

        if (isset($_POST['submitLogin'])) {
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL, FILTER_VALIDATE_EMAIL);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            if ($email && $password) {
                $dbUser = $trailblazerManager->findOneByEmail($email);
                // If role = Ban unset session
                $ban = 'ROLE_BAN';
                $role = $dbUser->getRole();
                if ($dbUser && password_verify($password, $dbUser->getPassword()) && $role !== $ban) {
                    // if correct password do that
                    Session::setUser($dbUser);
                    $this->redirectTo('wiki', 'playableCharacterList');
                } else if($dbUser && password_verify($password, $dbUser->getPassword()) && $role == $ban) {
                    $trailblazer = null;
                    Session::setUser($trailblazer);
                    $categ = 'error';
                    $msg ="Your account have been banned" ;
                    Session::addFlash($categ, $msg);
                    $this->redirectTo('home', 'index');
                } else {
                    $categ = 'error';
                    $msg ="Your email or password is wrong" ;
                    Session::addFlash($categ, $msg);
                    $this->redirectTo('security', 'login');
                }
            }
        }

        return [
            "view" => VIEW_DIR . "security/login.php",
            "data" => []
        ];
    }
    
    public function viewProfile()
    {
        if(Session::getUser()) {
            $userId = Session::getUser()->getId();
            $trailblazerManager = new TrailblazerManager();
            $trailblazer = $trailblazerManager->findOneById($userId);

            return [
                "view" => VIEW_DIR . "security/viewProfile.php",
                "data" => ["trailblazer" => $trailblazer]
            ];
            
        } else {
            $this->redirectTo("security", "login");
        }
    }

    public function modifyPassword(){

        if (Session::getUser()) {
            if(isset($_POST['submitModifyPassword'])){
                $userId = Session::getUser()->getId();
                $trailblazerManager = new TrailblazerManager();
    
                $actualPassword = filter_input(INPUT_POST, 'actualPassword', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $newPassword = filter_input(INPUT_POST, 'newPassword', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $confirmPassword = filter_input(INPUT_POST, 'confirmPassword', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    
                // If filters alright
                if ($actualPassword && $newPassword && $confirmPassword) {
                    if(password_verify($actualPassword, $userId->getPassword()) && ($newPassword == $confirmPassword) && strlen($newPassword) >= 10){
                        // Password Hash
                        $passwordHash = self::getPasswordHash($newPassword);
                        // Inject in database
                        $trailblazerManager->add(["password" => $passwordHash]);
                        // success message 
                        $categ = 'success';
                        $msg ="Password modified successfully" ;
                        Session::addFlash($categ, $msg);
                        $this->redirectTo("security", "viewProfile");
                    // error msg if actual password doesnt match what we got in bdd 
                    } else if(password_verify($actualPassword, $userId->getPassword())){
                        $categ = 'error';
                        $msg ="Your actual password doesnt correspond" ;
                        Session::addFlash($categ, $msg);
                        $this->redirectTo("security", "modifyPasswordConfirmation");
                    // error msg if new password doesnt match the confirmation 
                    } else if($newPassword == $confirmPassword){
                        $categ = 'error';
                        $msg ="Your new password doesnt match the confirmation";
                        Session::addFlash($categ, $msg);
                        $this->redirectTo("security", "modifyPasswordConfirmation");
                    }
                }
            }
        } else {
            return [
                "view" => VIEW_DIR . "security/login.php",
                "data" => []
            ];
        }
    }
    
    private static function getPasswordHash($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public function logout()
    {
        $trailblazer = null;
        Session::setUser($trailblazer);

        return [
            "view" => VIEW_DIR . "security/login.php",
            "data" => []
        ];
    }

    public function deleteProfileComfirmation()
    {
        if(Session::getUser()) {
            $userId = Session::getUser()->getId();
            $trailblazerManager = new TrailblazerManager();
            $trailblazer = $trailblazerManager->findOneById($userId);

            return [
                "view" => VIEW_DIR . "security/deleteProfileComfirmation.php",
                "data" => ["trailblazer" => $trailblazer]
            ];
            
        } else {
            $this->redirectTo("security", "login");
        }
    }

    public function deleteProfile()
    {
        if(Session::getUser()) {
            $id = Session::getUser()->getId();
            $trailblazerManager = new TrailblazerManager();
            $trailblazerManager->deleteProfile($id);
            $categ = 'success';
            $msg ="Your account was successfully deleted" ;
            Session::addFlash($categ, $msg);
            $trailblazer = null;
            Session::setUser($trailblazer);

            $this->redirectTo("home", "index");
        } else {
            $this->redirectTo("security", "login");
        }
    }

}