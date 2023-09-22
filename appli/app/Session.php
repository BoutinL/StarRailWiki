<?php
    namespace App;

    use Model\Managers\TrailblazerManager;
    use Service\UpdateUser;

    class Session{

        private static $categories = ['error', 'success'];

        /**
        *   ajoute un message en session, dans la catégorie $categ
        */
        public static function addFlash($categ, $msg){
            $_SESSION[$categ] = $msg;
        }

        /**
        *   renvoie un message de la catégorie $categ, s'il y en a 
        */
        public static function getFlash($categ){
            
            if(isset($_SESSION[$categ])){
                $msg = $_SESSION[$categ];  
                unset($_SESSION[$categ]);
            }
            else $msg = "";
            
            return $msg;
        }

        /**
        *   met un user dans la session (pour le maintenir connecté)
        */
        public static function setUser($user){
            $_SESSION["user"] = $user;
        }

        public static function getUser(){
            if(isset($_SESSION['user']) && $_SESSION['user'] !== null){
                // Update session
                $updateUser = new UpdateUser($_SESSION['user']);
                $updateUser->update();
                // Ban condition
                $ban = 'ROLE_BAN';
                $role = $_SESSION['user']->getRole();
                if($role == $ban){
                    unset($_SESSION['user']);
                    $categ = 'error';
                    $msg ="Your account have been banned" ;
                    Session::addFlash($categ, $msg);
                    header("Location: index.php");
                } else {
                    return (isset($_SESSION['user'])) ? $_SESSION['user'] : false;
                }
            }
        }

        public static function isAdmin(){
            if(self::getUser() && self::getUser()->hasRole("ROLE_ADMIN")){
                return true;
            }
            return false;
        }

    }