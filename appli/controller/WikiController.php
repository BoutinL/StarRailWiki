<?php

    namespace Controller;

    use App\Session;
    use App\AbstractController;
    use App\ControllerInterface;
    use Model\Managers\PlayableCharacterManager;
    use Model\Managers\PathManager;
    use Model\Managers\CombatTypeManager;
    use Model\Managers\AbilityManager;
    use Model\Managers\TagAbilityManager;
    use Model\Managers\TypeAbilityManager;
    use Model\Managers\AscendManager;
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
            $combatTypeManager = new CombatTypeManager();

            $abilitiesPlayableCharacter = $abilitiesPlayableCharacterManager->getAbilitiesByPlayableCharacterId($id);
            $playableCharacter = $playableCharacterManager->findOneById($id);
            $playableCharacterCombatType = $playableCharacterManager->findOneById($id)->getCombatType()->getType();
            // $typeAbility = $typeAbilityManager

            return [
                "view" => VIEW_DIR."wiki/abilityPlayableCharacter.php",
                "data" => [
                    // Abilities data
                    "abilitiesPlayableCharacter" => $abilitiesPlayableCharacter, 
                    // Character data
                    "playableCharacter" => $playableCharacter,
                    // Combat Type of the current character
                    "playableCharacterCombatType" => $playableCharacterCombatType
                ]
            ];
        
        }

        public function ascendPlayableCharacter($id)
        {
            $playableCharacterManager = new PlayableCharacterManager();
            $combatTypeManager = new CombatTypeManager();

            return [
                "view" => VIEW_DIR."wiki/ascendPlayableCharacter.php",
                "data" => [
                    // Character data
                    "playableCharacter" => $playableCharacter,
                    // Combat Type of the current character
                    "playableCharacterCombatType" => $playableCharacterCombatType
                ]
            ];
        
        }
    }
