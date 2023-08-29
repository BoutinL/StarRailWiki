<?php


namespace Controller;

use App\Session;
use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\TrailblazerManager;
    
    class HomeController extends AbstractController implements ControllerInterface{

        public function index(){
            
            return [
                "view" => VIEW_DIR."    .php"
            ];
        }
        
        public function trailblazerList(){
            $this->restrictTo("ROLE_ADMIN");

            $manager = new TrailblazerManager();
            $trailblazerList = $manager->findAll(['dateRegister', 'DESC']);

            return [
                "view" => VIEW_DIR."home/trailblazerList.php",
                "data" => [
                    "trailblazerList" => $trailblazerList
                ]
            ];
        }

        public function forumRules(){
            return [
                "view" => VIEW_DIR."rules.php"
            ];
        }

        /*public function ajax(){
            $nb = $_GET['nb'];
            $nb++;
            include(VIEW_DIR."ajax.php");
        }*/
    }
