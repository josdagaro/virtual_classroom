<?php
    require 'libs/Controller.php';    

    class ReceivesController extends Controller
    {
        public function __construct () {parent::__construct ();}

        public function index ()
        {
            require 'libs/Session.php';
            require 'models/ReceivesModel.php';
            require 'models/RequestModel.php';
            require 'models/UserModel.php';
            $session = new Session;
            $session->init ();            

            if ($session->exists ()) {
                $variables = array ('title' => 'Notificaciones', 'receivesJs' => 'views/Receives/js/receives.js');
                $receivesModel = new ReceivesModel ();
                $requestModel = new RequestModel ();
                $userModel = new UserModel ();
                $result = $receivesModel->readSpecific ($_SESSION ['userAccount']['identifier']);   
                foreach ($result as $key => $value) {
                    $requestResult = $requestModel->readSpecific ('=', $value ['request_id'], null, 1, null, null);
                    
                    foreach ($requestResult as $requestKey => $requestValue) {
                        //$variables ['requests'][$requestKey] = $requestValue;
                        $userResult = $userModel->readSpecific ('=', $requestValue ['user_id'], null, null, null, null, null, null, 1, null);
                        foreach ($userResult as $userkey => $userValue) //$variables ['user'][$requestKey] = $userValue;
                            $requestValue ['user'] = $userValue;                                                
                    }

                    if (isset ($requestValue)) $variables ['requests'][$requestKey] = $requestValue;
                }

                if (!isset ($variables ['requests'])) $variables ['requests'] = null;    
                $this->view->show ('index', $variables);
            }
            else header ("Location: User?go=index");
        }
    }
?>
