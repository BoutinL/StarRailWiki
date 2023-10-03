<?php

namespace Controller;

use App\Session;
use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\PathManager;
use Model\Managers\TraceManager;
use Model\Managers\CommentManager;
use Model\Managers\AbilityManager;
use Model\Managers\EidolonManager;
use Model\Managers\CombatTypeManager;
use Model\Managers\PlayableCharacterManager;
use Model\Managers\RatingManager;

    class WikiController extends AbstractController implements ControllerInterface{

        // Get all character datas 
        public function index()
        {
            // initiating managers
            $playableCharacterManager = new PlayableCharacterManager();
            $combatTypeManager = new CombatTypeManager();
            $pathManager = new PathManager();
            // List of combat type and path to display
            $combatTypeList = $combatTypeManager->getCombatType();
            $pathList = $pathManager->getPath();
            
            return [
                // Redirection
                "view" => VIEW_DIR."wiki/playableCharacterList.php",
                // Data to display in associative array
                "data" => [
                    // Order the character list in alphabetical and ascending order
                    "playableCharacterList" => $playableCharacterManager->findAll(["name", "ASC"]),
                    // List of combat type and path to display
                    "combatTypeList" => $combatTypeList,
                    "pathList" => $pathList
                ]
            ];  
        }

        public function orderBy()
        {
            // if submit pressed keep going
            if (isset($_POST['submitOrder'])) {
                // if the input combatType and Path isnt empty keep going
                if ((!empty($_POST['idCombatType'])) && (!empty($_POST['idPath']))) {
                    // Sanitize inputs
                    $idCombatType = filter_input(INPUT_POST, "idCombatType", FILTER_SANITIZE_NUMBER_INT);
                    $idPath = filter_input(INPUT_POST, "idPath", FILTER_SANITIZE_NUMBER_INT);
                    
                    if ($idCombatType !== false  && $idPath !== false) {

                        $playableCharacterManager = new PlayableCharacterManager();
                        $combatTypeManager = new CombatTypeManager();
                        $pathManager = new PathManager();
                        // List of CombatType and Path
                        $combatTypeList = $combatTypeManager->getCombatType();
                        $pathList = $pathManager->getPath();

                        return [
                            "view" => VIEW_DIR."wiki/playableCharacterList.php",
                            "data" => [
                                "playableCharacterList" => $playableCharacterManager->getOrderBy($idCombatType, $idPath),
                                "combatTypeList" => $combatTypeList,
                                "pathList" => $pathList
                            ]
                        ];
                    }
                }
            }
        }

        public function biographyPlayableCharacter($id){
                
            $biographyPlayableCharacterManager = new PlayableCharacterManager();
            $pathManager = new PathManager();
            $combatTypeManager = new CombatTypeManager();
            // biography of a character find with his id
            $biographyPlayableCharacter = $biographyPlayableCharacterManager->findOneById($id);
            // Path and combat type is also displayed in his biography and find with the character id
            $path = $pathManager->findOneById($id);
            $combatType = $combatTypeManager->findOneById($id);
            
            if($biographyPlayableCharacter) {
                return [
                    "view" => VIEW_DIR."wiki/biographyPlayableCharacter.php",
                    "data" => [
                        "biographyPlayableCharacter" => $biographyPlayableCharacter,
                        "path" => $path,
                        "combatType" => $combatType
                    ]
                ];
            } else {
                $this->redirectTo("wiki", "characterList");
            }
        }

        public function abilityPlayableCharacter($id)
        {
            $abilitiesPlayableCharacterManager = new AbilityManager();
            $playableCharacterManager = new PlayableCharacterManager();
            // Abilities of a character found by his id
            $abilitiesPlayableCharacter = $abilitiesPlayableCharacterManager->getAbilitiesByPlayableCharacterId($id);
            // Data of a character found by his id
            $playableCharacter = $playableCharacterManager->findOneById($id);

            if($playableCharacter) {
                return [
                    "view" => VIEW_DIR."wiki/abilityPlayableCharacter.php",
                    "data" => [
                        // Abilities data
                        "abilitiesPlayableCharacter" => $abilitiesPlayableCharacter, 
                        // Character data
                        "playableCharacter" => $playableCharacter,
                    ]
                ];
            } else {
                $this->redirectTo("wiki", "characterList");
            }
        }

        public function eidolonPlayableCharacter($id)
        {
            $eidolonPlayableCharacterManager = new EidolonManager();
            $playableCharacterManager = new PlayableCharacterManager();

            $eidolonPlayableCharacter = $eidolonPlayableCharacterManager->getEidolonByPlayableCharacterId($id);
            $playableCharacter = $playableCharacterManager->findOneById($id);

            if($playableCharacter) {
                return [
                    "view" => VIEW_DIR."wiki/eidolonPlayableCharacter.php",
                    "data" => [
                        // eidolon data
                        "eidolonPlayableCharacter" => $eidolonPlayableCharacter,
                        // Character data
                        "playableCharacter" => $playableCharacter,
                        ]
                    ];
                } else {
                    $this->redirectTo("wiki", "characterList");
                }
            }
            

        public function tracePlayableCharacter($id)
        {
            $tracePlayableCharacterManager = new TraceManager();
            $playableCharacterManager = new PlayableCharacterManager();

            $tracePlayableCharacter = $tracePlayableCharacterManager->getTraceByPlayableCharacterId($id);
            $playableCharacter = $playableCharacterManager->findOneById($id);

            if($playableCharacter) {
                return [
                    "view" => VIEW_DIR."wiki/tracePlayableCharacter.php",
                    "data" => [
                        // Trace data
                        "tracePlayableCharacter" => $tracePlayableCharacter,
                        // Character data
                        "playableCharacter" => $playableCharacter,
                    ]
                ];
            } else {
                $this->redirectTo("wiki", "characterList");
            }
        }

        public function reviewPlayableCharacter($id)
        {
            // For Pagination, to find on wich page we are
            if(isset($_GET['page']) && !empty($_GET['page'])){
                $currentPage = (int)strip_tags($_GET['page']);
            } else {
                $currentPage = 1;
            }
            $commentManager = new CommentManager();
            // get nbr of comments
            $nbrComments = $commentManager->getCommentsNbr($id);
            $intNbrComments = $nbrComments["nbrComments"];
            // nbr of comments to display by page
            $commentByPage = 5;
            $intCommentByPage = intval($commentByPage);
            // calcul nbr of pages
            $pages = (int)ceil($intNbrComments / $intCommentByPage);
            // first page comment
            $firstCommentByPage = ($currentPage * $intCommentByPage) - $intCommentByPage;
            $intFirstCommentByPage = intval($firstCommentByPage);
            // For comments / pagination
            $commentPlayableCharacter = $commentManager->getCommentByPlayableCharacter($id, $intFirstCommentByPage, $intCommentByPage);
            
            // For Rating
            $ratingManager = new RatingManager();
            // Contain the nbr of raiting of a character and the average rate
            $statsRate = $ratingManager->getRatingOfCharacter($id);
            // Contain the user rate if he already rate that character 
            $rateUser = (Session::getUser()) ? $ratingManager->getRatingByTrailblazer(Session::getUser()->getId(), $id) : null;

            // used to load informations of the page
            $playableCharacterManager = new PlayableCharacterManager();
            $playableCharacter = $playableCharacterManager->findOneById($id);

            if($playableCharacter){
                return [
                    "view" => VIEW_DIR."wiki/reviewPlayableCharacter.php",
                    "data" => [
                        // comments data
                        "commentPlayableCharacter" => $commentPlayableCharacter,
                        // Character data
                        "playableCharacter" => $playableCharacter,
                        // nbr of pages
                        "pages" => $pages,
                        // current page
                        "currentPage" => $currentPage,
                        // nbr of rating / final rate
                        "statsRate" => $statsRate,
                        // user rate
                        "rateUser" => $rateUser
                    ]
                ];
            } else {
                $this->redirectTo("wiki", "characterList");
            }
        }

        public function addComment($id){
            if (isset($_POST['submitComment'])) {
                if(Session::getUser()){
                    // Check if all required input arnt empty
                    if ((!empty($_POST['comment']))) {
                        // Sanitaze all input from the form
                        $comment = filter_input(INPUT_POST, "comment", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                        $tokenCSRF = filter_input(INPUT_POST, "csrf_token", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                        // var_dump($tokenCSRF);die;
                        if ($comment && $tokenCSRF == Session::getCSRF()) {
                            $commentManager = new CommentManager();
                            $commentManager->add([
                                "text" => $comment,
                                "playableCharacter_id" => $id,
                                "trailblazer_id" => Session::getUser()->getId()
                            ]);
                            $this->redirectTo("wiki", "reviewPlayableCharacter", $id);
                        } else {
                            $this->redirectTo("wiki", "playableCharacterList");
                        }
                    }
                }
            }
        }
        
        public function addRate($id){
            if (isset($_POST['submitRate'])) {
                if(Session::getUser()){
                    // Check if all required input arnt empty
                    if (!empty($_POST['rate'])) {
                        // Sanitaze all input from the form
                        $rate = filter_input(INPUT_POST, "rate", FILTER_SANITIZE_NUMBER_INT);
                        $tokenCSRF = filter_input(INPUT_POST, "csrf_token", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                        if ($rate && $tokenCSRF == Session::getCSRF()) {
                            $ratingManager = new RatingManager();
                            $ratingManager->add([
                                "rate" => $rate,
                                "playableCharacter_id" => $id,
                                "trailblazer_id" => Session::getUser()->getId()
                            ]);

                            $categ = 'success';
                            $msg ="Rate successfully added" ;
                            Session::addFlash($categ, $msg);
                            $this->redirectTo("wiki", "reviewPlayableCharacter", $id);
                        } else {
                            $this->redirectTo("wiki", "playableCharacterList");
                        }
                    }
                }
            }
        }

        public function updateRate($id){
            if(isset($_POST['submitUpdateRate'])) {
                if(Session::getUser()){
                    // Check if all required input arnt empty
                    if(!empty($_POST['rate'])){
                        // Sanitaze all input from the form
                        $rate = filter_input(INPUT_POST, "rate", FILTER_SANITIZE_NUMBER_INT);
                        $tokenCSRF = filter_input(INPUT_POST, "csrf_token", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                        // Check if CSRF token is the same
                        if($rate !== null && $tokenCSRF == Session::getCSRF()){
                            $idTrailblazer = Session::getUser()->getId();
                            $ratingManager = new RatingManager();
                            $ratingManager->updateRate($id, $idTrailblazer, $rate);
                            
                            $categ = 'success';
                            $msg ="Rate modified" ;
                            Session::addFlash($categ, $msg);
                            $this->redirectTo("wiki", "reviewPlayableCharacter", $id);
                        } else {
                            $this->redirectTo("wiki", "biographyPlayableCharacter", $id);
                        }
                    }
                }
            }
        }
    }
