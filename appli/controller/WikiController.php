<?php

    namespace Controller;

    use App\Session;
    use App\AbstractController;
    use App\ControllerInterface;
    use Model\Managers\PlayableCharacterManager;
    use Model\Managers\PathManager;
    use Model\Managers\CombatTypeManager;

    
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
        
    }
