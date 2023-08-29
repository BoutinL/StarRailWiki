<?php

namespace Controller;

use App\Session;
use App\AbstractController;
use App\ControllerInterface;
use Model\Entities\Trailblazer;
use Model\Managers\TrailblazerManager;

class HomeController extends AbstractController implements ControllerInterface
{

    public function register()
    {
        $UserManager = new TrailblazerManager();

        if (isset($_POST['submitRegister'])) {
            $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL, FILTER_VALIDATE_EMAIL);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $confirmPassword = filter_input(INPUT_POST, 'confirmPassword', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $role = "ROLE_MEMBER";

            // If filters alright
            if ($username && $email && $password) {
                $TrailblazerManager = new TrailblazerManager();

                // If email doesnt exist
                if (!$TrailblazerManager->findOneByEmail($email)) {
                    // If username doesnt exist
                    if (!$TrailblazerManager->findOneByUser($username)) {
                        // If both password are the same and higher than 10
                        if (($password == $confirmPassword) and strlen($password) >= 10) {
                            // Password Hash
                            $passwordHash = self::getPasswordHash($password);
                            // Inject in database
                            $TrailblazerManager->add(["username" => $username, "email" => $email, "password" => $passwordHash, "role" => $role]);
                            $this->redirectTo("security", "login");
                        }
                    }
                }
            }
        }
        return [
            "view" => VIEW_DIR . "./security/register.php",
            "data" => []
        ];
    }


    public function login()
    {
        $TrailblazerManager = new TrailblazerManager();

        if (isset($_POST['submitLogin'])) {
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL, FILTER_VALIDATE_EMAIL);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            if ($email && $password) {
                $dbUser = $TrailblazerManager->findOneByEmail($email);

                if ($dbUser && password_verify($password, $dbUser->getPassword())) {
                    // if password correct do that
                    Session::setUser($dbUser);
                    $this->redirectTo('wiki', 'playableCharacterList');
                } else {
                    // if password not correct do that
                    $this->redirectTo('security', 'login');
                }
            }
        }

        return [
            "view" => VIEW_DIR . "security/login.php",
            "data" => []
        ];
    }


    private static function getPasswordHash($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }


    public function logout()
    {
        $user = null;
        Session::setUser($user);

        return [
            "view" => VIEW_DIR . "security/login.php",
            "data" => []
        ];
    }
}