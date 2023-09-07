<?php

    namespace Controller;

    use App\Session;
    use App\AbstractController;
    use App\ControllerInterface;
    use Model\Managers\PlayableCharacterManager;
    use Model\Managers\PathManager;
    use Model\Managers\CombatTypeManager;
    use Model\Managers\AbilityManager;
    use Model\Managers\TraceManager;
    use Model\Managers\EidolonManager;
    
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
                    "playableCharacterList" => $playableCharacterManager->findAll(["releaseDate", "ASC"]),
                    "combatTypeList" => $combatTypeList,
                    "pathList" => $pathList
                ]
            ];
        
        }

        public function biographyPlayableCharacter($id)
        {

            $biographyPlayableCharacterManager = new PlayableCharacterManager();
            $pathManager = new PathManager();
            $combatTypeManager = new CombatTypeManager();

            $biographyPlayableCharacter = $biographyPlayableCharacterManager->findOneById($id);
            $path = $pathManager->findOneById($id);
            $combatType = $combatTypeManager->findOneById($id);

            return [
                "view" => VIEW_DIR."wiki/biographyPlayableCharacter.php",
                "data" => [
                    "biographyPlayableCharacter" => $biographyPlayableCharacter,
                    "path" => $path,
                    "combatType" => $combatType
                ]
            ];
        
        }

        public function abilityPlayableCharacter($id)
        {
            $abilitiesPlayableCharacterManager = new AbilityManager();
            $playableCharacterManager = new PlayableCharacterManager();

            $abilitiesPlayableCharacter = $abilitiesPlayableCharacterManager->getAbilitiesByPlayableCharacterId($id);
            $playableCharacter = $playableCharacterManager->findOneById($id);

            return [
                "view" => VIEW_DIR."wiki/abilityPlayableCharacter.php",
                "data" => [
                    // Abilities data
                    "abilitiesPlayableCharacter" => $abilitiesPlayableCharacter, 
                    // Character data
                    "playableCharacter" => $playableCharacter,
                ]
            ];
        }

        public function eidolonPlayableCharacter($id)
        {
            $eidolonPlayableCharacterManager = new EidolonManager();
            $playableCharacterManager = new PlayableCharacterManager();

            $eidolonPlayableCharacter = $eidolonPlayableCharacterManager->getEidolonByPlayableCharacterId($id);
            $playableCharacter = $playableCharacterManager->findOneById($id);

            return [
                "view" => VIEW_DIR."wiki/eidolonPlayableCharacter.php",
                "data" => [
                    // eidolon data
                    "eidolonPlayableCharacter" => $eidolonPlayableCharacter,
                    // Character data
                    "playableCharacter" => $playableCharacter,
                ]
            ];
        }

        public function tracePlayableCharacter($id)
        {
            $tracePlayableCharacterManager = new TraceManager();
            $playableCharacterManager = new PlayableCharacterManager();

            $tracePlayableCharacter = $tracePlayableCharacterManager->getTraceByPlayableCharacterId($id);
            $playableCharacter = $playableCharacterManager->findOneById($id);

            return [
                "view" => VIEW_DIR."wiki/tracePlayableCharacter.php",
                "data" => [
                    // Trace data
                    "tracePlayableCharacter" => $tracePlayableCharacter,
                    // Character data
                    "playableCharacter" => $playableCharacter,
                ]
            ];
        }
    }
