<?php

namespace Controller;

use App\Session;
use App\AbstractController;
use App\ControllerInterface;
use Model\Entities\PlayableCharacter;
use Model\Managers\PathManager;
use Model\Managers\AscendManager;
use Model\Managers\AbilityManager;
use Model\Managers\CombatTypeManager;
use Model\Managers\TagAbilityManager;
use Model\Managers\TrailblazerManager;
use Model\Managers\TypeAbilityManager;
use Model\Managers\PlayableCharacterManager;
use Model\Managers\EidolonManager;
use Model\Managers\TraceManager;

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
                    $image = filter_input(INPUT_POST, "image-url", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ? filter_input(INPUT_POST, "image-url", FILTER_SANITIZE_FULL_SPECIAL_CHARS) : "https://placehold.co/1024x877";
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
                        $this->redirectTo("admin", "addAbilityView");
                        exit;
                    } else {
                        $this->redirectTo("admin", "addCharacterView");
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
                    
                    $energyGeneration = filter_input(INPUT_POST, "energyGeneration", FILTER_SANITIZE_NUMBER_INT) ? filter_input(INPUT_POST, "energyGeneration", FILTER_SANITIZE_NUMBER_INT) : 0; 
                    $energyCost = filter_input(INPUT_POST, "energyCost", FILTER_SANITIZE_NUMBER_INT) ? filter_input(INPUT_POST, "energyCost", FILTER_SANITIZE_NUMBER_INT) : 0;
                    $dmg = filter_input(INPUT_POST, "dmg", FILTER_SANITIZE_NUMBER_INT) ? filter_input(INPUT_POST, "dmg", FILTER_SANITIZE_NUMBER_INT) : 0;

                    $icon = filter_input(INPUT_POST, "image-url", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ? filter_input(INPUT_POST, "image-url", FILTER_SANITIZE_FULL_SPECIAL_CHARS) : "https://placehold.co/120";
                    $playableCharacter = filter_input(INPUT_POST, "playableCharacter", FILTER_SANITIZE_NUMBER_INT);
                    $typeAbility = filter_input(INPUT_POST, "typeAbility", FILTER_SANITIZE_NUMBER_INT);
                    $tagAbility = filter_input(INPUT_POST, "tagAbility", FILTER_SANITIZE_NUMBER_INT);

                    if ($name !== false && $description !== false && $playableCharacter && isset($energyGeneration)  && isset($energyCost) && isset($dmg) && $icon !== false && $typeAbility !== false && $tagAbility !== false) {

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
                        $this->redirectTo("admin", "addAbilityView");
                    } else {
                        $this->redirectTo("wiki", "playableCharacterList");
                    }

                }
            }
        }

        public function addEidolonView(){
            $this->restrictTo("ROLE_ADMIN");

            $playableCharacterManager = new PlayableCharacterManager();

            $playableCharacterList = $playableCharacterManager->getPlayableCharacter();
            // var_dump($ascendList->current());die;
            return [
                "view" => VIEW_DIR."admin/addEidolon.php",
                "data" => [
                    "playableCharacterList" => $playableCharacterList
                ]
            ];
        }

        public function addEidolon(){
            $this->restrictTo("ROLE_ADMIN");
            
            if (isset($_POST['submitEidolon'])) {
                // Check if all required input arnt empty
                if ((!empty($_POST['nameEidolon'])) && (!empty($_POST['effectEidolon'])) && (!empty($_POST['playableCharacterEidolon'])) && (!empty($_POST['nbrEidolon']))) {
                    
                    // Sanitaze all input from the form
                    $name = filter_input(INPUT_POST, "nameEidolon", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $effect = filter_input(INPUT_POST, "effectEidolon", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $nbr = filter_input(INPUT_POST, "nbrEidolon", FILTER_SANITIZE_NUMBER_INT); 
                    $playableCharacter = filter_input(INPUT_POST, "playableCharacterEidolon", FILTER_SANITIZE_NUMBER_INT);
                    $icon = filter_input(INPUT_POST, "image-urlEidolon", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ? filter_input(INPUT_POST, "image-url", FILTER_SANITIZE_FULL_SPECIAL_CHARS) : "https://placehold.co/120";

                    if ($name !== false && $effect !== false && $nbr !== false && $playableCharacter !== false && $icon !== false) {
                        // var_dump("$icon");die;
                        $eidolonManager = new EidolonManager();
                        $eidolonManager->add([
                            "name" => $name,
                            "effect" => $effect,
                            "nbr" => $nbr,
                            "playableCharacter_id" => $playableCharacter,
                            "icon" => $icon,
                        ]);
                        $this->redirectTo("admin", "addEidolonView");
                    } else {
                        $this->redirectTo("wiki", "playableCharacterList");
                    }

                }
            }
        }

        public function addTraceView(){
            $this->restrictTo("ROLE_ADMIN");

            $playableCharacterManager = new PlayableCharacterManager();
            $ascendManager = new AscendManager();

            $playableCharacterList = $playableCharacterManager->getPlayableCharacter();
            $ascendList = $ascendManager->getAscend();
            // var_dump($ascendList->current());die;
            return [
                "view" => VIEW_DIR."admin/addTrace.php",
                "data" => [
                    "playableCharacterList" => $playableCharacterList,
                    "ascendList" => $ascendList,
                ]
            ];
        }
        
        public function addTrace(){
            $this->restrictTo("ROLE_ADMIN");
            
            if (isset($_POST['submitTrace'])) {
                // Check if all required input arnt empty
                if ((!empty($_POST['nameTrace'])) && (!empty($_POST['effectTrace'])) && (!empty($_POST['playableCharacterTrace'])) && (!empty($_POST['ascendTrace']))) {
                    
                    // Sanitaze all input from the form
                    $name = filter_input(INPUT_POST, "nameTrace", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $effect = filter_input(INPUT_POST, "effectTrace", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $ascend_id = filter_input(INPUT_POST, "ascendTrace", FILTER_SANITIZE_NUMBER_INT); 
                    $playableCharacter = filter_input(INPUT_POST, "playableCharacterTrace", FILTER_SANITIZE_NUMBER_INT);
                    $icon = filter_input(INPUT_POST, "image-urlTrace", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ? filter_input(INPUT_POST, "image-url", FILTER_SANITIZE_FULL_SPECIAL_CHARS) : "https://placehold.co/120";

                    if ($name !== false && $effect !== false && $ascend_id !== false && $playableCharacter !== false && $icon !== false) {
                        // var_dump("$icon");die;
                        $traceManager = new TraceManager();
                        $traceManager->add([
                            "name" => $name,
                            "effect" => $effect,
                            "ascend_id" => $ascend_id,
                            "playableCharacter_id" => $playableCharacter,
                            "icon" => $icon,
                        ]);
                        $this->redirectTo("admin", "addTraceView");
                    } else {
                        $this->redirectTo("wiki", "playableCharacterList");
                    }

                }
            }
        }

        public function deleteCharacterView(){
            $this->restrictTo("ROLE_ADMIN");
            
            $playableCharacterManager = new PlayableCharacterManager();

            $playableCharacterList = $playableCharacterManager->getPlayableCharacter();

            // var_dump($ascendList->current());die;
            return [
                "view" => VIEW_DIR."admin/deleteCharacter.php",
                "data" => [
                    "playableCharacterList" => $playableCharacterList
                ]
            ];
            
        }

        public function deleteCharacter(){
            $this->restrictTo("ROLE_ADMIN");
            
            if (isset($_POST['submit'])) {
                // Check if all required input arnt empty
                if ((!empty($_POST['playableCharacter']))) {
                    
                    // Sanitaze all input from the form
                    $playableCharacter = filter_input(INPUT_POST, "playableCharacter", FILTER_SANITIZE_NUMBER_INT);

                    if ($playableCharacter !== false) {
                        $playableCharacterManager = new PlayableCharacterManager();
                        $playableCharacterManager->deleteCharacter($playableCharacter);

                        $this->redirectTo("wiki", "playableCharacterList");
                    } else {
                        $this->redirectTo("admin", "deleteCharacterView");
                    }

                }

            }
        }

        public function deleteAbilityView(){
            $this->restrictTo("ROLE_ADMIN");
            
            $abilityManager = new AbilityManager();

            $abilityList = $abilityManager->getAbilities();

            // var_dump($ascendList->current());die;
            return [
                "view" => VIEW_DIR."admin/deleteAbility.php",
                "data" => [
                    "abilityList" => $abilityList
                ]
            ];
            
        }

        public function deleteAbility(){
            $this->restrictTo("ROLE_ADMIN");
            
            if (isset($_POST['submit'])) {
                // Check if all required input arnt empty
                if ((!empty($_POST['ability']))) {
                    
                    // Sanitaze all input from the form
                    $ability = filter_input(INPUT_POST, "ability", FILTER_SANITIZE_NUMBER_INT);

                    if ($ability !== false) {
                        $abilityManager = new AbilityManager();
                        $abilityManager->deleteAbility($ability);

                        $this->redirectTo("admin", "deleteAbilityView");
                    } else {
                        $this->redirectTo("wiki", "playableCharacterList");
                    }

                }

            }
        }

        public function deleteEidolonView(){
            $this->restrictTo("ROLE_ADMIN");
            
            $eidolonManager = new EidolonManager();

            $eidolonList = $eidolonManager->getEidolon();

            // var_dump($ascendList->current());die;
            return [
                "view" => VIEW_DIR."admin/deleteEidolon.php",
                "data" => [
                    "eidolonList" => $eidolonList
                ]
            ];
            
        }

        public function deleteEidolon(){
            $this->restrictTo("ROLE_ADMIN");
            
            if (isset($_POST['submit'])) {
                // Check if all required input arnt empty
                if ((!empty($_POST['eidolon']))) {
                    
                    // Sanitaze all input from the form
                    $eidolon = filter_input(INPUT_POST, "eidolon", FILTER_SANITIZE_NUMBER_INT);

                    if ($eidolon !== false) {
                        $eidolonManager = new EidolonManager();
                        $eidolonManager->deleteEidolon($eidolon);

                        $this->redirectTo("admin", "deleteEidolonView");
                    } else {
                        $this->redirectTo("wiki", "playableCharacterList");
                    }

                }

            }
        }

        public function deleteTraceView(){
            $this->restrictTo("ROLE_ADMIN");
            
            $traceManager = new TraceManager();

            $traceList = $traceManager->getTrace();

            return [
                "view" => VIEW_DIR."admin/deleteTrace.php",
                "data" => [
                    "traceList" => $traceList
                ]
            ];
            
        }

        public function deleteTrace(){
            $this->restrictTo("ROLE_ADMIN");
            
            if (isset($_POST['submit'])) {
                // Check if all required input arnt empty
                if ((!empty($_POST['trace']))) {
                    
                    // Sanitaze all input from the form
                    $trace = filter_input(INPUT_POST, "trace", FILTER_SANITIZE_NUMBER_INT);

                    if ($trace !== false) {
                        $traceManager = new TraceManager();
                        $traceManager->deleteTrace($trace);

                        $this->redirectTo("admin", "deleteTraceView");
                    } else {
                        $this->redirectTo("wiki", "playableCharacterList");
                    }

                }

            }
        }

        public function updateCharacterView(){
            $this->restrictTo("ROLE_ADMIN");
            
            $playableCharacterManager = new PlayableCharacterManager();

            $playableCharacterList = $playableCharacterManager->getPlayableCharacter();

            return [
                "view" => VIEW_DIR."admin/updateCharacterSelect.php",
                "data" => [
                    "playableCharacterList" => $playableCharacterList
                ]
            ];
            
        }

        public function updateCharacterSelect(){
            $this->restrictTo("ROLE_ADMIN");

            $id = filter_input(INPUT_POST,"playableCharacter", FILTER_VALIDATE_INT);
            if (isset($_POST['submit'])) {
                if ((!empty($_POST['playableCharacter']))) {
                    $playableCharacterManager = new PlayableCharacterManager;
                    $combatTypeManager = new CombatTypeManager();
                    $pathManager = new PathManager();

                    $playableCharacter = $playableCharacterManager->findOneById($id);
                    $combatTypeList = $combatTypeManager->getCombatType();
                    $pathList = $pathManager->getPath();
            
                    return [
                        "view" => VIEW_DIR."admin/updateCharacter.php",
                        "data" => [
                            "playableCharacter" => $playableCharacter,
                            "combatTypeList" => $combatTypeList,
                            "pathList" => $pathList
                        ]
                    ];
                }
            }
        }

        public function updateCharacter(){
            $this->restrictTo("ROLE_ADMIN");
            
            if (isset($_POST['submit'])) {
                // var_dump($_POST['path']);die;
                // Check if all required input arnt empty
                if ((!empty($_POST['name'])) && (!empty($_POST['rarity'])) && (!empty($_POST['releaseDate'])) && (!empty($_POST['combatType'])) && (!empty($_POST['path']))) {
                    
                    // Sanitaze all input from the form
                    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $image = filter_input(INPUT_POST, "image-url", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ? filter_input(INPUT_POST, "image-url", FILTER_SANITIZE_FULL_SPECIAL_CHARS) : "https://placehold.co/1024x877";
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
                        $playableCharacterManager->updateCharacter($name,$image,$rarity,$sex,$specie,$faction,$world,$quote,$releaseDate,$introduction,$combatType,$path,$id);
                        $this->redirectTo("wiki", "playableCharacterList");
                    } else {
                        $this->redirectTo("admin", "addCharacterView");
                    }

                }
            }
        }
    }