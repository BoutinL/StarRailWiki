<?php

namespace Controller;

use App\Session;
use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\PathManager;
use Model\Managers\TraceManager;
use Model\Managers\AscendManager;
use Model\Managers\AbilityManager;
use Model\Managers\EidolonManager;
use Model\Managers\CombatTypeManager;
use Model\Managers\TagAbilityManager;
use Model\Managers\TrailblazerManager;
use Model\Managers\TypeAbilityManager;
use Model\Managers\PlayableCharacterManager;
use Model\Managers\CommentManager;

    class AdminController extends AbstractController implements ControllerInterface{

        public function index(){
            
            return [
                "view" => VIEW_DIR."home.php"
            ];
        }

        // Modération
        
        public function trailblazerList(){
            $this->restrictTo("ROLE_ADMIN");

            // For Pagination, to find on wich page we are
            if(isset($_GET['page']) && !empty($_GET['page'])){
                $currentPage = (int)strip_tags($_GET['page']);
            } else {
                $currentPage = 1;
            }

            $trailblazerManager = new TrailblazerManager();
            
            // get nbr of users
            $nbrUsers = $trailblazerManager->getUsersNbr();
            $intNbrUsers = $nbrUsers["nbrUsers"];
            // nbr of users to display by page
            $UsersByPage = 6;
            $intUsersByPage = intval($UsersByPage);
            // calcul nbr of pages
            $pages = (int)ceil($intNbrUsers / $intUsersByPage);
            // first page comment
            $firstUserByPage = ($currentPage * $intUsersByPage) - $intUsersByPage;
            $intFirstUserByPage = intval($firstUserByPage);
            
            // For comments / pagination
            $trailblazerList = $trailblazerManager->getAllUsersButAdmin($intFirstUserByPage, $intUsersByPage);
            return [
                "view" => VIEW_DIR."admin/trailblazerList.php",
                "data" => [
                    "trailblazerList" => $trailblazerList,
                    // nbr of pages
                    "pages" => $pages,
                    // current page
                    "currentPage" => $currentPage
                ]
            ];
        }

        public function deleteProfile($id){
            $this->restrictTo("ROLE_ADMIN");

            $trailblazerManager = new TrailblazerManager;

            $trailblazerManager->deleteProfile($id);

            $this->redirectTo("admin","trailblazerList");

        }

        public function updateRoleConfirm($id){
            $this->restrictTo("ROLE_ADMIN");
            if (isset($_POST['roleUser'])) {
                // Check if all required input arnt empty
                if ((!empty($_POST['roleUser']))) {
                    
                    // Sanitaze all input from the form
                    $roleUser = filter_input(INPUT_POST, "roleUser", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    // !== false so if empty still work 
                    if ($roleUser !== false) {
                        $trailblazerManager = new TrailblazerManager();
                        $trailblazerManager->updateRole($id, $roleUser);
                        $this->redirectTo("admin", "trailblazerList");
                    } else {
                        $this->redirectTo("security", "viewProfile");
                    }

                }
            }
        }
        
        public function deleteComment($id){
            //$this->restrictTo("ROLE_ADMIN", "ROLE_MEMBER");
            if(Session::getUser()) {
                $commentManager = new CommentManager();
                $comment = $commentManager->findOneById($id);

                // If role = admin allow the delete
                if(Session::getUser()->hasRole("ROLE_ADMIN") && $comment ){
                    
                    $commentManager->deleteComment($id);
    
                    $categ = 'success';
                    $msg ="The comment was deleted" ;
                    Session::addFlash($categ, $msg);
                    $this->redirectTo("wiki", "reviewPlayableCharacter", $comment->getPlayableCharacter()->getId());
                    die;
                } else if(Session::getUser()->hasRole("ROLE_MEMBER")){
                    // If id in session = user id from the comment id we got as argument
                    if(Session::getUser()->getId() == $comment->getTrailblazer()->getId()){

                        $commentManager->deleteComment($id);

                        $categ = 'success';
                        $msg ="Your comment was deleted" ;
                        Session::addFlash($categ, $msg);
            
                        $this->redirectTo("wiki", "reviewPlayableCharacter", $comment->getPlayableCharacter()->getId());
                    }
                } else {
                    $categ = 'error';
                    $msg ="Nothing was found" ;
                    Session::addFlash($categ, $msg);
    
                    $this->redirectTo("wiki", "playableCharacterList");
                }
            } 
        }

        // CRUD Character

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
            // If submit button pressed do that
            if (isset($_POST['submit'])) {
                // if the select input isnt empty do that
                if ((!empty($_POST['playableCharacter']))) {
                    
                    // Sanitaze what was selected in that input
                    $playableCharacter = filter_input(INPUT_POST, "playableCharacter", FILTER_SANITIZE_NUMBER_INT);
                    
                    if ($playableCharacter !== false) {
                        $playableCharacterManager = new PlayableCharacterManager();
                        // Then we use the custom methode to delete the character with his id 
                        $playableCharacterManager->deleteCharacter($playableCharacter);
                        
                        $categ = 'success';
                        $msg ="Character deleted successfully" ;
                        Session::addFlash($categ, $msg);

                        $this->redirectTo("wiki", "playableCharacterList");
                    }
                    
                } else {
                    $this->redirectTo("admin", "deleteCharacterView");
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
                } else {
                    $this->redirectTo("admin", "updateCharacterView");
                }
            }
        }

        public function updateCharacter($id){
            $this->restrictTo("ROLE_ADMIN");
            
            if (isset($_POST['submit'])) {
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

                        $playableCharacterManager->updateCharacter($id, $name, $image, $rarity, $sex, $specie, $faction, $world, $quote, $releaseDate, $introduction, $combatType, $path);
                        // var_dump($id);die;
                        $this->redirectTo("admin", "updateCharacterView");
                    } else {
                        $this->redirectTo("security", "viewProfile");
                    }

                }
            }
        }

        // Ability CRUD 

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
                
                } else {
                    $this->redirectTo("admin", "deleteAbilityView");
                }

            }
        }

        public function updateAbilityView(){
            $this->restrictTo("ROLE_ADMIN");
            
            $abilityManager = new AbilityManager();

            $abilityList = $abilityManager->getAbilities();

            return [
                "view" => VIEW_DIR."admin/updateAbilitySelect.php",
                "data" => [
                    "abilityList" => $abilityList
                ]
            ];
            
        }

        public function updateAbilitySelect(){
            $this->restrictTo("ROLE_ADMIN");

            if (isset($_POST['submit'])) {
                $id = filter_input(INPUT_POST,"ability", FILTER_VALIDATE_INT);
                if ((!empty($_POST['ability']))) {
                    $abilityManager = new AbilityManager;
                    $playableCharacterManager = new PlayableCharacterManager;
                    $typeAbilityManager = new TypeAbilityManager();
                    $tagAbilityManager = new TagAbilityManager();

                    $ability = $abilityManager->findOneById($id);
                    $playableCharacterList = $playableCharacterManager->getPlayableCharacter();
                    $typeAbilityList = $typeAbilityManager->getTypeAbility();
                    $tagAbilityList = $tagAbilityManager->getTagAbility();
            
                    return [
                        "view" => VIEW_DIR."admin/updateAbility.php",
                        "data" => [
                            "ability" => $ability,
                            "playableCharacterList" => $playableCharacterList,
                            "typeAbilityList" => $typeAbilityList,
                            "tagAbilityList" => $tagAbilityList
                        ]
                    ];
                } else {
                    $this->redirectTo("admin", "updateAbilityView");
                }
            }
        }

        public function updateAbility($id){
            $this->restrictTo("ROLE_ADMIN");
            
            if (isset($_POST['submit'])) {
                // Check if all required input arnt empty

                if ((!empty($_POST['playableCharacter'])) && (!empty($_POST['name'])) && (!empty($_POST['description'])) && (!empty($_POST['typeAbility'])) && (!empty($_POST['tagAbility']))) {
                    // Sanitaze all input from the form
                    $playableCharacter = filter_input(INPUT_POST, "playableCharacter", FILTER_SANITIZE_NUMBER_INT);
                    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $description = filter_input(INPUT_POST, "description", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $energyGeneration = filter_input(INPUT_POST, "energyGeneration", FILTER_SANITIZE_NUMBER_INT) ? $energyGeneration = filter_input(INPUT_POST, "energyGeneration", FILTER_SANITIZE_NUMBER_INT) : 0;
                    $energyCost = filter_input(INPUT_POST, "energyCost", FILTER_SANITIZE_NUMBER_INT) ? $energyCost = filter_input(INPUT_POST, "energyCost", FILTER_SANITIZE_NUMBER_INT) : 0;
                    $dmg = filter_input(INPUT_POST, "dmg", FILTER_SANITIZE_NUMBER_INT) ? $dmg = filter_input(INPUT_POST, "dmg", FILTER_SANITIZE_NUMBER_INT) : 0;
                    $image = filter_input(INPUT_POST, "image-url", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ? filter_input(INPUT_POST, "image-url", FILTER_SANITIZE_FULL_SPECIAL_CHARS) : "https://placehold.co/120";
                    $typeAbility = filter_input(INPUT_POST, "typeAbility", FILTER_SANITIZE_NUMBER_INT);
                    $tagAbility = filter_input(INPUT_POST, "tagAbility", FILTER_SANITIZE_NUMBER_INT);
                    
                    if ($playableCharacter !== false  && $name !== false && $description !== false && $energyGeneration !== false || $energyGeneration === 0 && $energyCost !==false || $energyCost === 0 && $dmg !==false || $dmg === 0 && $image !== false && $typeAbility !== false && $tagAbility !== false) {
                        $abilityManager = new AbilityManager();
                        $abilityManager->updateAbility($id, $playableCharacter, $name, $description, $energyGeneration, $energyCost, $dmg, $image, $typeAbility, $tagAbility);
                        $this->redirectTo("admin", "updateAbilityView");
                    } else {
                        $this->redirectTo("security", "viewProfile");
                    }

                }
            }
        }

        // Eidolon CRUD

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
                    $icon = filter_input(INPUT_POST, "imageUrlEidolon", FILTER_VALIDATE_URL) ? filter_input(INPUT_POST, "imageUrlEidolon", FILTER_VALIDATE_URL) : "https://placehold.co/120";

                    if ($name !== false && $effect !== false && $nbr !== false && $playableCharacter !== false && $icon !== false) {
                        $eidolonManager = new EidolonManager();
                        $eidolonManager->add([
                            "name" => $name,
                            "effect" => $effect,
                            "nbr" => $nbr,
                            "playableCharacter_id" => $playableCharacter,
                            "icon" => $icon,
                        ]);
                        $categ = 'success';
                        $msg ="Successfully added" ;
                        Session::addFlash($categ, $msg);
                        $this->redirectTo("admin", "addEidolonView");
                    } else {
                        $categ = 'error';
                        $msg ="Not added" ;
                        Session::addFlash($categ, $msg);
                        $this->redirectTo("wiki", "playableCharacterList");
                    }

                }
            }
        }

        public function updateEidolonView(){
            $this->restrictTo("ROLE_ADMIN");
            
            $eidolonManager = new EidolonManager();

            $eidolonList = $eidolonManager->getEidolon();

            return [
                "view" => VIEW_DIR."admin/updateEidolonSelect.php",
                "data" => [
                    "eidolonList" => $eidolonList
                ]
            ];
            
        }

        public function deleteEidolonView(){
            $this->restrictTo("ROLE_ADMIN");
            
            $eidolonManager = new EidolonManager();

            $eidolonList = $eidolonManager->getEidolon();

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
                    } 

                } else {
                    $this->redirectTo("admin", "deleteEidolonView");
                }

            }
        }
        
        public function updateEidolonSelect(){
            $this->restrictTo("ROLE_ADMIN");

            $id = filter_input(INPUT_POST,"eidolon", FILTER_VALIDATE_INT);
            if (isset($_POST['submit'])) {
                if ((!empty($_POST['eidolon']))) {
                    $eidolonManager = new EidolonManager();
                    $playableCharacterManager = new PlayableCharacterManager;

                    $eidolon = $eidolonManager->findOneById($id);
                    $playableCharacterList = $playableCharacterManager->getPlayableCharacter();
            
                    return [
                        "view" => VIEW_DIR."admin/updateEidolon.php",
                        "data" => [
                            "eidolon" => $eidolon,
                            "playableCharacterList" => $playableCharacterList,
                        ]
                    ];
                } else {
                    $this->redirectTo("admin", "updateEidolonView");
                }
            }
        }

        public function updateEidolon($id){
            $this->restrictTo("ROLE_ADMIN");
            
            if (isset($_POST['submitEidolon'])) {
                // Check if all required input arnt empty
                if ((!empty($_POST['playableCharacterEidolon'])) && (!empty($_POST['nameEidolon'])) && (!empty($_POST['effectEidolon'])) && (!empty($_POST['nbrEidolon']))) {
                    // Sanitaze all input from the form
                    $playableCharacter = filter_input(INPUT_POST, "playableCharacterEidolon", FILTER_SANITIZE_NUMBER_INT);
                    $name = filter_input(INPUT_POST, "nameEidolon", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $nbr = filter_input(INPUT_POST, "nbrEidolon", FILTER_SANITIZE_NUMBER_INT);
                    $effect = filter_input(INPUT_POST, "effectEidolon", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $image = filter_input(INPUT_POST, "imageUrlEidolon", FILTER_VALIDATE_URL) ? filter_input(INPUT_POST, "imageUrlEidolon", FILTER_VALIDATE_URL) : "https://placehold.co/120";

                    if ($playableCharacter !== false  && $name !== false && $effect !== false && $nbr !== false && $image !== false ) {
                        $eidolonManager = new EidolonManager();
                        $eidolonManager->updateEidolon($id, $playableCharacter, $name, $nbr, $effect, $image);
                        $this->redirectTo("admin", "updateEidolonView");
                    } else {
                        $this->redirectTo("security", "viewProfile");
                    }

                }
            }
        }

        // Trace CRUD

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
                    } 
                } else {
                    $this->redirectTo("admin", "deleteTraceView");
                }

            }
        }

        public function updateTraceView(){
            $this->restrictTo("ROLE_ADMIN");
            
            $traceManager = new TraceManager();

            $traceList = $traceManager->getTrace();

            return [
                "view" => VIEW_DIR."admin/updateTraceSelect.php",
                "data" => [
                    "traceList" => $traceList
                ]
            ];
            
        }

        public function updateTraceSelect(){
            $this->restrictTo("ROLE_ADMIN");

            $id = filter_input(INPUT_POST,"trace", FILTER_VALIDATE_INT);
            if (isset($_POST['submit'])) {
                if ((!empty($_POST['trace']))) {
                    $traceManager = new TraceManager();
                    $playableCharacterManager = new PlayableCharacterManager();
                    $ascendManager = new AscendManager();

                    $trace = $traceManager->findOneById($id);
                    $playableCharacterList = $playableCharacterManager->getPlayableCharacter();
                    $ascendList = $ascendManager->getAscend();
            
                    return [
                        "view" => VIEW_DIR."admin/updateTrace.php",
                        "data" => [
                            "trace" => $trace,
                            "playableCharacterList" => $playableCharacterList,
                            "ascendList" => $ascendList
                        ]
                    ];
                } else {
                    $this->redirectTo("admin", "updateTraceView");
                }
            }
        }

        public function updateTrace($id){
            $this->restrictTo("ROLE_ADMIN");
            
            if (isset($_POST['submitTrace'])) {
                // Check if all required input arnt empty
                if ((!empty($_POST['playableCharacterTrace'])) && (!empty($_POST['nameTrace'])) && (!empty($_POST['effectTrace'])) && (!empty($_POST['ascendTrace']))) {
                    // Sanitaze all input from the form
                    $playableCharacter = filter_input(INPUT_POST, "playableCharacterTrace", FILTER_SANITIZE_NUMBER_INT);
                    $name = filter_input(INPUT_POST, "nameTrace", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $effect = filter_input(INPUT_POST, "effectTrace", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $ascend = filter_input(INPUT_POST, "ascendTrace", FILTER_SANITIZE_NUMBER_INT);
                    $image = filter_input(INPUT_POST, "imageUrlTrace", FILTER_SANITIZE_FULL_SPECIAL_CHARS) ? filter_input(INPUT_POST, "imageUrlTrace", FILTER_SANITIZE_FULL_SPECIAL_CHARS) : "https://placehold.co/120";

                    if ($playableCharacter !== false  && $name !== false && $effect !== false && $ascend !== false && $image !== false ) {
                        $traceManager = new traceManager();
                        // Be carefull, the order matter
                        $traceManager->updateTrace($id, $playableCharacter, $name, $effect, $ascend, $image);
                        $this->redirectTo("admin", "updateTraceView");
                    } else {
                        $this->redirectTo("security", "viewProfile");
                    }

                }
            }
        }

    }