<?php


namespace Controller;
use App\AbstractController;
use App\ControllerInterface;
    
    class LegalityController extends AbstractController implements ControllerInterface{

        public function index(){
            
            return [
                "view" => VIEW_DIR."home.php"
            ];
        }

        public function wikiRules(){
            return [
                "view" => VIEW_DIR."rules.php"
            ];
        }

        public function legalNotice(){
            return [
                "view" => VIEW_DIR."legality/legalNotice.php"
            ];
        }

        /*public function ajax(){
            $nb = $_GET['nb'];
            $nb++;
            include(VIEW_DIR."ajax.php");
        }*/
    }
