<?php

    namespace Controller;

    use App\Session;
    use App\AbstractController;
    use App\ControllerInterface;
    use Model\Managers\PlayableCharacterManager;

    
    class WikiController extends AbstractController implements ControllerInterface{

        public function index(){

            $playableCharacterManager = new PlayableCharacterManager();

            return [
                "view" => VIEW_DIR."wiki/playableCharacterList.php",
                "data" => [
                    "playableCharacterList" => $playableCharacterManager->findAll(["releaseDate", "ASC"])
                ]
            ];
        
        }

        public function playableCharacterDetails(){

            $playableCharacterManager = new PlayableCharacterManager();

            return [
                "view" => VIEW_DIR."wiki/playableCharacterDetails.php",
                "data" => [
                    "playableCharacterDetails" => $playableCharacterManager->findAll()
                ]
            ];
        
        }
        
    }
