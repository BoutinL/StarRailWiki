<?php

namespace Controller;

use App\Session;
use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\TrailblazerManager;
use Model\Managers\PlayableCharacterManager;
use Model\Managers\CombatTypeManager;
use Model\Managers\PathManager;
use Model\Managers\AbilityManager;
use Model\Managers\TypeAbilityManager;
use Model\Managers\TagAbilityManager;

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
                            "combattype_id" => $combatType,
                            "path_id" => $path
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

        public function addAbilityView(){
            $this->restrictTo("ROLE_ADMIN");

            $playableCharacterManager = new PlayableCharacterManager();
            $typeAbilityManager = new TypeAbilityManager();
            $tagAbilityManager = new TagAbilityManager();

            $playableCharacterList = $playableCharacterManager->getPlayableCharacter();
            $typeAbilityList = $typeAbilityManager->getTypeAbility();
            $tagAbilityList = $tagAbilityManager->getTagAbility();

            return [
                "view" => VIEW_DIR."admin/addAbility.php",
                "data" => [
                    "playableCharacterList" => $playableCharacterList,
                    "typeAbilityList" => $typeAbilityList,
                    "tagAbilityList" => $tagAbilityList
                ]
            ];
        }

        public function addAbility(){
            $this->restrictTo("ROLE_ADMIN");
            
            if (isset($_POST['submit'])) {
                // Check if all required input arnt empty
                if ((!empty($_POST['name'])) && (!empty($_POST['description'])) && (!empty($_POST['playableCharacter'])) && (!empty($_POST['typeAbility'])) && (!empty($_POST['tagAbility']))) {
                    
                    // Sanitaze all input from the form
                    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $description = filter_input(INPUT_POST, "description", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $energyGeneration = filter_input(INPUT_POST, "energyGeneration", FILTER_SANITIZE_NUMBER_INT);
                    $energyCost = filter_input(INPUT_POST, "energyCost", FILTER_SANITIZE_NUMBER_INT);
                    $dmg = filter_input(INPUT_POST, "dmg", FILTER_SANITIZE_NUMBER_INT);
                    $icon = filter_input(INPUT_POST, "image-url", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $playableCharacter = filter_input(INPUT_POST, "playableCharacter", FILTER_SANITIZE_NUMBER_INT);
                    $typeAbility = filter_input(INPUT_POST, "typeAbility", FILTER_SANITIZE_NUMBER_INT);
                    $tagAbility = filter_input(INPUT_POST, "tagAbility", FILTER_SANITIZE_NUMBER_INT);

                    // !== false so if empty still work 
                    if ($name !== false  && $description !== false && $energyGeneration !== false && $energyCost !== false && $dmg !== false && $icon !== false && $playableCharacter !== false && $typeAbility !== false && $tagAbility !== false) {

                        $abilityManager = new AbilityManager();
                        $abilityManager->add([
                            "name" => $name,
                            "description" => $description,
                            "energyGeneration" => $energyGeneration,
                            "energyCost" => $energyCost,
                            "dmg" => $dmg,
                            "icon" => $icon,
                            "playableCharacter_id" => $playableCharacter,
                            "typeAbility_id" => $typeAbility,
                            "tagAbility_id" => $tagAbility
                        ]);
                        $this->redirectTo("admin", "addAbility");
                    } else {
                        $this->redirectTo("wiki", "playableCharacterList");
                    }

                }
            }
        }

        public function deleteCharacter($id){
            $this->restrictTo("ROLE_ADMIN");
            
            
        }

        public function updateCharacter($id){
            $this->restrictTo("ROLE_ADMIN");
            
            
        }

    }
