<?php

namespace Controller;

use App\Session;
use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\TrailblazerManager;
use Model\Managers\PlayableCharacterManager;
use Model\Managers\CombatTypeManager;
use Model\Managers\PathManager;
    
    class AdminController extends AbstractController implements ControllerInterface{

        public function index(){
            
            return [
                "view" => VIEW_DIR."home.php"
            ];
        }
        
        public function trailblazerList(){
            $this->restrictTo("ROLE_ADMIN");

            $manager = new TrailblazerManager();
            $trailblazerList = $manager->findAll(['dateRegister', 'DESC']);

            return [
                "view" => VIEW_DIR."admin/trailblazerList.php",
                "data" => [
                    "trailblazerList" => $trailblazerList
                ]
            ];
        }

        public function addCharacterView(){
            $this->restrictTo("ROLE_ADMIN");

            $combatTypeManager = new CombatTypeManager();
            $pathManager = new PathManager();
            
            $combatTypeList = $combatTypeManager->getCombatType();
            $pathList = $pathManager->getPath();

            return [
                "view" => VIEW_DIR."admin/addCharacter.php",
                "data" => [
                    "combatTypeList" => $combatTypeList,
                    "pathList" => $pathList,
                ]
            ];
        }

        public function addCharacter(){
            $this->restrictTo("ROLE_ADMIN");
            
            if (isset($_POST['submit'])) {
                // var_dump($_POST['path']);die;
                // Check if all required input arnt empty
                if ((!empty($_POST['name'])) && (!empty($_POST['rarity'])) && (!empty($_POST['releaseDate'])) && (!empty($_POST['combatType'])) && (!empty($_POST['path']))) {
                    
                    // Sanitaze all input from the form
                    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $image = filter_input(INPUT_POST, "image-url", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $rarity = filter_input(INPUT_POST, "rarity", FILTER_SANITIZE_NUMBER_INT);
                    $sex = filter_input(INPUT_POST, "sex", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $specie = filter_input(INPUT_POST, "specie", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $faction = filter_input(INPUT_POST, "faction", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $world = filter_input(INPUT_POST, "world", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $quote = filter_input(INPUT_POST, "quote", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $releaseDate = filter_input(INPUT_POST, "releaseDate", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $introduction = filter_input(INPUT_POST, "introduction", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $combatType = filter_input(INPUT_POST, "combatType", FILTER_SANITIZE_NUMBER_INT);
                    $path = filter_input(INPUT_POST, "path", FILTER_SANITIZE_NUMBER_INT);

                    // !== false so if empty still work 
                    if ($name !== false  && $image !== false && $rarity !== false && $sex !== false && $specie !== false && $faction !== false && $world !== false && $quote !== false && $releaseDate !== false && $introduction !== false && $combatType !== false && $path !== false) {

                        $playableCharacterManager = new PlayableCharacterManager();
                        $playableCharacterManager->add([
                            "name" => $name,
                            "image" => $image,
                            "rarity" => $rarity,
                            "sex" => $sex,
                            "specie" => $specie,
                            "faction" => $faction,
                            "world" => $world,
                            "quote" => $quote,
                            "releaseDate" => date('y-m-d'),
                            "introduction" => $introduction,
                            "combatType" => $combatType,
                            "path" => $path
                        ]);
                        $this->redirectTo("wiki", "playableCharacterList");
                        exit;
                    } else {
                        $this->redirectTo("admin", "addCharacter");
                        exit;
                    }

                }
            }
        }

    }
