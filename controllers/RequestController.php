<?php
    require 'libs/Controller.php';    

    class RequestController extends Controller {
        public function __construct () {parent::__construct ();}

        public function index () {
            require 'libs/Session.php';
            require 'models/RequestModel.php';
            $session = new Session;
            $session->init ();            

            if ($session->exists ()) {
                $variables = array ('title' => 'Solicitudes', 'indexJs' => 'views/Index/js/index.js');
                $model = new RequestModel ();
                $result = $model->readAll ();
                $variables ['requests'] = $result; 

                foreach ($variables ['requests'] as $key => $value) {
                    $value ['body'] = utf8_encode ($value ['body']); 
                    $variables ['requests'][$key] = $value;         
                }
                
                $this->view->show ('index', $variables);
            }
            else header ('Location: User?go=index');     
        }

        public function send () {
        	require 'libs/Session.php';
            require 'models/RequestModel.php';
            require 'models/UserModel.php';
            require 'models/ReceivesModel.php';
            $session = new Session;
            $session->init ();                        
            $jsonData = null;
            $thereAdmins = false;

            if ($session->exists ()) {
            	if (isset ($_POST ['selected-role']) && $_POST ['selected-role'] != null && isset ($_POST ['type']) && $_POST ['type'] != null) {
            		$role = $_POST ['selected-role'];
            		$type = $_POST ['type'];
            		$requestModel = new RequestModel (); //type = 0 | actualización de rol, state = 1 | activo		
            		if ($role == 0) $role = 'admin';
            		else if ($role == 1) $role = 'teacher';
            		else $role = 'student';
            		$result = $requestModel->readSpecific ('=', null, $_SESSION ['userAccount']['identifier'], 1, $type, null);
            		$array = null;

            		foreach ($result as $key => $value) {
	                    $array = array (
	                        'id' => $value ['id'], 'userId' => $value ['user_id'],
	                        'state' => $value ['state'], 'type' => $value ['type'],
	                        'body' => $value ['body']
	                    );
                	}

                	if ($array == null) {
                		if ($type == 0) {                			
		            		$requestModel->create ($_SESSION ['userAccount']['identifier'], 1, 0, $role);
		            		$userModel = new UserModel ();
		            		$receivesModel = new ReceivesModel ();
		            		$result = $requestModel->readSpecific ('=', null, $_SESSION ['userAccount']['identifier'], 1, $type, null);
		            		$userResult = $userModel->readSpecific ('=', null, null, null, null, null, $type, null, null);

		            		foreach ($result as $key => $value) {
			            		foreach ($userResult as $userKey => $userValue) {
			            			if ($value ['type'] == 0) {
			            				$receivesModel->create ($userValue ['identifier'], $value ['id']);
			            				$thereAdmins = true;
			            			}
			            		}
		            		}
	            		}

	            		$jsonData = array ('create' => true, 'thereAdmins' => $thereAdmins);
            		}            		
            		else $jsonData = array ('create' => false);
            	}            	            	
            	header ('Content-type: application/json; charset=utf-8');
            	echo json_encode ($jsonData);
            }
            else header ('Location: User?go=index');
        }
    }
?>
