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

            return [
                "view" => VIEW_DIR."wiki/playableCharacterList.php",
                "data" => [
                    "playableCharacterList" => $playableCharacterManager->findAll(["releaseDate", "ASC"])
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

        public function ascendPlayableCharacter($id)
        {
            $tracePlayableCharacterManager = new TraceManager();
            $eidolonPlayableCharacterManager = new EidolonManager();
            $playableCharacterManager = new PlayableCharacterManager();

            $tracePlayableCharacter = $tracePlayableCharacterManager->getTraceByPlayableCharacterId($id);
            $eidolonPlayableCharacter = $eidolonPlayableCharacterManager->getEidolonByPlayableCharacterId($id);
            $playableCharacter = $playableCharacterManager->findOneById($id);

            return [
                "view" => VIEW_DIR."wiki/ascendPlayableCharacter.php",
                "data" => [
                    // Trace data
                    "tracePlayableCharacter" => $tracePlayableCharacter,
                    // eidolon data
                    "eidolonPlayableCharacter" => $eidolonPlayableCharacter,
                    // Character data
                    "playableCharacter" => $playableCharacter,
                ]
            ];
        }
    }
