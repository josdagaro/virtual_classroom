<?php
    require 'libs/Controller.php';

    class UserController extends Controller {
        public function __construct () {parent::__construct ();}

        public function index () { 
            require 'libs/Session.php';

            if (isset ($_GET ['go']) && $_GET ['go'] == 'index') {    
                $variables = array ('title' => 'Sesión', 'userJs' => 'views/User/js/user.js');
                $this->view->show ('index', $variables);
            }
            else if (isset ($_GET ['go']) && $_GET ['go'] == 'profile') {
                $session = new Session;
                $session->init ();

                if ($session->exists ()) {
                    $variables = array ('title' => 'Perfil', 'profileJs' => 'views/User/js/profile.js');
                    $this->view->show ('profile', $variables);
                }
                else header ('Location: User?go=index');
            }
            else header ('Location: Index');
        }

        public function retrieveSession () {
            require 'libs/Session.php';
            $session = new Session;
            $session->init ();
            $jsonData = null;

            if ($session->exists ()) $jsonData = $session->getValue ('userAccount');

            header ('Content-type: application/json; charset=utf-8');
            echo json_encode ($jsonData);
        }

        public function destroySession () {
            require 'libs/Session.php';
            $session = new Session;
            $session->init ();
            $jsonData = null;

            if ($session->exists ()) {
                $session->unsetValue ('userAccount');
                $session->destroy ();
                $jsonData = array ('session' => true);
            }

            header ('Content-type: application/json; charset=utf-8');
            echo json_encode ($jsonData);
        }

        public function requestsNumber () {
            require 'models/ReceivesModel.php';
            require 'libs/Session.php';
            $session = new Session;
            $session->init ();
            $jsonData = null;

            if ($session->exists ()) {
                $receivesModel = new ReceivesModel ();
                $result = $receivesModel->count ($_SESSION ['userAccount']['identifier']);
                $count = 0;
                foreach ($result as $key => $value) $count = $value ['quantity'];
                $jsonData = array ('notificationsQuantity' => $count);
            }

            header ('Content-type: application/json; charset=utf-8');
            echo json_encode ($jsonData);
        }

        public function authenticate () {
            require 'models/UserModel.php';
            require 'libs/Session.php';
            require 'libs/Bcrypt.php';
            $email = $_POST ['signInEmail'];
            $password = $_POST ['signInPassword'];
            $session = new Session;
            $bcrypt = new Bcrypt (15);
            $jsonData = null;

            if (isset ($email) && isset ($password)) {
                $user = new UserModel ();
                $result = $user->readSpecific ('=', null, null, null, $email);

                foreach ($result as $key => $value) {
                    $array = array (
                        'identifier' => $value ['identifier'],
                        'identificationNumber' => $value ['identification_number'], 'name' => $value ['name'],
                        'lastName' => $value ['last_name'], 'email' => $value ['email'], 'password' => $value ['password'],
                        'type' => $value ['type'], 'image' => $value ['image'], 'active' => $value ['active']
                    );
                }

                if (isset ($array ['email']) && $array ['email'] == $email && isset ($array ['password']) &&
                $bcrypt->verify ($password, $array ['password'])) {
                    if ($array ['active'] == 0) $jsonData = array ('case' => 1);
                    else {
                        $session->init ();
                        $session->setValue ('userAccount', $array);

                        $jsonData = array (
                            'case' => 2, 'name' => $array ['name'], 'lastName' => $array ['lastName'], 'email' => $array ['email'],
                            'password' => $password, 'type' => $array ['type'], 'image' => $array ['image']
                        );
                    }
                }
                else $jsonData = array ('case' => 0);
            }

            header ('Content-type: application/json; charset=utf-8');
            echo json_encode ($jsonData);
        }

        public function confirmUser ($email, $userImage) {
            $variables = array ('title' => 'Activación', 'email' => $email, 'gravatar' => $userImage);
            $this->view->show ('confirmUser', $variables);
        }

        public function create () {
            require 'models/UserModel.php';
            require 'libs/phpMailer/PHPMailerAutoload.php';
            require 'libs/Gravatar.php' ;
            $identifier = $_POST ['identifier'];
            $name = $_POST ['name'];
            $lastName = $_POST ['lastName'];
            $email = $_POST ['signUpEmail'];
            $password = $_POST ['signUpPassword'];
            $verifyPassword = $_POST ['verifyPassword'];

            if (isset ($identifier) && isset ($name) && isset ($lastName) && isset ($email) && isset ($password) && isset ($verifyPassword) &&
            $password == $verifyPassword) {
                $user = new UserModel ();
                $result = $user->readSpecific ('=', $identifier);
                foreach ($result as $key => $value) $array = array ('identificationNumber' => $value ['identification_number']);

                if (!(isset ($array ['identificationNumber']) && $array ['identificationNumber'] == $identifier)) {
                    $possible = "1234567890abcdefghijklmnopqrstuvwxyz_";
                    $chain = "";
                    $i = 0;

                    while ($i < 5) {
                        $character = substr ($possible, mt_rand (0, strlen ($possible) - 1), 1);
                        $chain .= $character;
                        $i ++;
                    }

                    $gravatar = new Gravatar ($email);
                    $userImage = $gravatar->getSrc ();
                    $user->create ($identifier, $name, $lastName, $email, $password, 2, $userImage, 0, $chain);
                    $subject = "Activación de cuenta";

                    $message = '<html lang = "es">
                                    <head>
                                        <title>Activación de cuenta</title>
                                        <meta charset = "utf-8"/>
                                    </head>
                                    <body>
                                        Gracias por crear su usuario en nuestro sistema. Para poder acceder, debe activar su usuario haciendo clic aqui:
                                        <a href = "http://localhost/virtual_classroom/User/verifyUser?activeCode='.$chain.'">Activar</a>
                                    </body>
                               </html>
                    ';

                    $header = 'MIME-Version: 1.0\r\n';
                    $header .= 'Content-type: text/html; charset = iso-8859-1\r\n';
                    $header .= 'From: Aula virtual UC <david07seven@gmail.com>\r\n';
                    $mail = new PHPMailer;
                    $mail->isSMTP ();
                    $mail->SMTPDebug = 2;
                    $mail->Debugoutput = 'html';
                    $mail->Host = 'smtp.gmail.com';
                    //$mail->Host = 'aspmx.l.google.com'; 25
                    $mail->Port = 587;
                    $mail->SMTPSecure = 'tls';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'tu email';
                    $mail->Password = 'clave de tu email';
                    $mail->setFrom ($email, 'Aula virtual UC');
                    $mail->addReplyTo ($email, 'Aula virtual UC');
                    $mail->addAddress ($email, 'Aula virtual UC');
                    $mail->Subject = utf8_decode ($subject);
                    $mail->msgHTML ($message, dirname ('views/User/'));
                    $mail->AltBody = $message;            
                    if ($mail->send ()) echo "Envió";
                    else echo "No envió: ".$mail->ErrorInfo;
                }
            }
        }

        public function verifyUser () {
            require 'models/UserModel.php';

            if ($_GET ['activeCode'] != null) {
                $activeCode = $_GET ['activeCode'];
                $user = new UserModel ();
                $result = $user->readSpecific ('=', null, null, null, null, null, null, null, $activeCode);

                foreach ($result as $key => $value) {
                    $array = array (
                        'identificationNumber' => $value ['identification_number'], 'name' => $value ['name'],
                        'lastName' => $value ['last_name'], 'email' => $value ['email'],
                        'password' => $value ['password'], 'type' => $value ['type'], 'image' => $value ['image'],
                        'active' => $value ['active'], 'activeCode' => $value ['active_code']
                    );
                }

                if (isset ($array ['activeCode']) && $array ['activeCode'] == $activeCode && $array ['active'] == 0) {
                    $array ['active'] = 1;

                    $user->update (
                        $array ['identificationNumber'], $array ['name'], $array ['lastName'], $array ['email'], $array ['password'],
                        $array ['type'], $array ['active']
                    );

                    $this->confirmUser ($array ['email'], $array ['image']);
                }
                else $this->index ();
            }
            else $this->index ();
        }
    }
?>
