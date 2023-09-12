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

        public function index()
        {
            $playableCharacterManager = new PlayableCharacterManager();
            $combatTypeManager = new CombatTypeManager();
            $pathManager = new PathManager();

            $combatTypeList = $combatTypeManager->getCombatType();
            $pathList = $pathManager->getPath();
            
            return [
                "view" => VIEW_DIR."wiki/playableCharacterList.php",
                "data" => [
                    "playableCharacterList" => $playableCharacterManager->findAll(["name", "ASC"]),
                    "combatTypeList" => $combatTypeList,
                    "pathList" => $pathList
                ]
            ];  
        }

        public function orderBy()
        {
            if (isset($_POST['submitOrder'])) {
        
                if ((!empty($_POST['idCombatType'])) && (!empty($_POST['idPath']))) {
                    
                    $idCombatType = filter_input(INPUT_POST, "idCombatType", FILTER_SANITIZE_NUMBER_INT);
                    $idPath = filter_input(INPUT_POST, "idPath", FILTER_SANITIZE_NUMBER_INT);
                    
                    if ($idCombatType !== false  && $idPath !== false) {

                        $playableCharacterManager = new PlayableCharacterManager();
                        $combatTypeManager = new CombatTypeManager();
                        $pathManager = new PathManager();

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

            $biographyPlayableCharacter = $biographyPlayableCharacterManager->findOneById($id);
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

            $abilitiesPlayableCharacter = $abilitiesPlayableCharacterManager->getAbilitiesByPlayableCharacterId($id);
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
                // var_dump($currentPage);die;
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
            // $firstCommentByPage = ($currentPage * $intCommentByPage) - $intCommentByPage;
            $firstCommentByPage = ($currentPage * $intCommentByPage) - $intCommentByPage;
            $intFirstCommentByPage = intval($firstCommentByPage);
            
            // For comments / pagination
            $commentPlayableCharacter = $commentManager->getCommentByPlayableCharacter($id, $intFirstCommentByPage, $intCommentByPage);
            
            // For Rating
            $ratingManager = new RatingManager();
            $statsRate = $ratingManager->getRatingOfCharacter($id);
            $rateUser = $ratingManager->getRatingByTrailblazer(Session::getUser()->getId(), $id);

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
                        // var_dump($comment);die;
                        if ($comment) {
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
                    if ((!empty($_POST['rate']))) {
                        // Sanitaze all input from the form
                        $rate = filter_input(INPUT_POST, "rate", FILTER_SANITIZE_NUMBER_INT);
                        if ($rate) {
                            $ratingManager = new RatingManager();
                            $ratingManager->add([
                                "rate" => $rate,
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

        // public function updateRate($id){
            
        // }
    }
