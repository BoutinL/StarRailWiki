<?php

namespace Controller;

use App\Session;
use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\PathManager;
use Model\Managers\TraceManager;
use Model\Managers\ReviewManager;
use Model\Managers\CommentManager;
use Model\Managers\AbilityManager;
use Model\Managers\EidolonManager;
use Model\Managers\CombatTypeManager;
use Model\Managers\PlayableCharacterManager;

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
            $reviewManager = new ReviewManager();
            $commentManager = new CommentManager();
            $playableCharacterManager = new PlayableCharacterManager();

            $reviewPlayableCharacter = $reviewManager->getReviewByPlayableCharacterId($id);
            $commentPlayableCharacter = $commentManager->getCommentByPlayableCharacterId($id);
            $playableCharacter = $playableCharacterManager->findOneById($id);

            if($playableCharacter) {
                return [
                    "view" => VIEW_DIR."wiki/reviewPlayableCharacter.php",
                    "data" => [
                        // review data
                        "reviewPlayableCharacter" => $reviewPlayableCharacter,
                        // review data
                        "commentPlayableCharacter" => $commentPlayableCharacter,
                        // Character data
                        "playableCharacter" => $playableCharacter,
                    ]
                ];
            } else {
                $this->redirectTo("wiki", "characterList");
            }
        }
    }
