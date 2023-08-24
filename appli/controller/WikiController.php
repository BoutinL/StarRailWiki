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

            $abilityPlayableCharacterManager = new AbilityManager();
            $typeAbilityManager = new TypeAbilityManager();
            $tagAbilityManager = new TagAbilityManager();
            $combatTypeManager = new CombatTypeManager();
            $playableCharacterManager = new PlayableCharacterManager();
            

            $playableCharacter = $playableCharacterManager->findOneById($id);
            $playableCharacterCombatType = $playableCharacterManager->findOneById($id)->getCombatType()->getType();
           ;
            return [
                "view" => VIEW_DIR."wiki/abilityPlayableCharacter.php",
                "data" => [
                    "playableCharacter" => $playableCharacter,
                    // "typeAbility" => $typeAbility,
                    // "tagAbility" => $tagAbility,
                    "playableCharacterCombatType" => $playableCharacterCombatType
                ]
            ];
        
        }
    }
