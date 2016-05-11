<?php
    require 'libs/Controller.php';

    class CourseController extends Controller {
        public function __construct () {parent::__construct ();}
        
        public function index () {     
            require 'models/CourseModel.php'; 
            require 'libs/Session.php';        
            $session = new Session;
            $session->init ();

            if ($session->exists ()) {
                $variables = array (
                    'title' => 'Cursos',
                    'courseJs' => 'views/Course/js/course.js',
                    'fileInputCss' => 'public/css/fileinput.min.css',
                    'fileInputJs' => 'public/js/fileinput.min.js',
                    'validationsJs' => 'views/Course/js/validations.js'
                 );
                
                $course = new CourseModel ();
                $result = $course->readAll ();   
                $variables ['courses'] = $result;             

                foreach ($variables ['courses'] as $key => $value) {
                    $value ['name'] = utf8_encode ($value ['name']);
                    $value ['description'] = utf8_encode ($value ['description']);   
                    $variables ['courses'][$key] = $value;         
                }
            
                $this->view->show ('index', $variables);
            }
            else header ('Location: User?go=index');
        }

        public function addOrUpdate () {
            require 'models/CourseModel.php';
            require 'libs/PHPThumb/GD.php';
            $name = $_POST ['name'];
            $description = $_POST ['description'];
            $jsonData = null;

            if (isset ($_POST ['course-id']) && $_POST ['course-id'] != null) {
                echo 'Updating';
                $identifier = $_POST ['course-id'];            

                if ($identifier != null && $name != null && $description != null) {
                    if (isset ($_FILES ['img']) && $_FILES ['img']['tmp_name'] != null) {
                        $file = $_FILES ['img']['tmp_name'];
                        $path = 'views/Course/img/'.$_FILES ['img']['name'];
                        move_uploaded_file ($file, $path);
                        $thumb = new GD ($path);
                        $thumb->resize (200, 200);
                        $extension = 'png';
                        $thumb->save ($path.'thumb.'.$extension, $extension);
                        echo '<br>New image';
                    }
                    else $path = null;

                    $course = new CourseModel ();
                    $result = $course->readSpecific ('=', $identifier, null, null, null);                
                    $array = null;

                    foreach ($result as $key => $value) {
                        $array = array (
                            'identifier' => $value ['identifier'], 'name' => $value ['name'],
                            'image' => $value ['image'], 'creationDate' => $value ['creation_date']
                        );

                        echo '<br>Course found';
                    }                

                    if ($array != null && $identifier == $array ['identifier']) {
                        if ($path == null) $path = $array ['image'];
                        $course->update ($identifier, $name, $description, $array ['creationDate'], $path);
                        $jsonData = array ('update' => true);
                        echo '<br>Updated';
                    }
                    else $jsonData = array ('update' => false);       
                }      
    
                header ('Content-type: application/json; charset=utf-8');
                echo json_encode ($jsonData);
            }
            else {        
                echo 'Saving';        
                $currentDate = date ("Y-m-d");    

                if (isset ($_FILES ['img']) && $_FILES ['img']['tmp_name'] != null) {
                    $file = $_FILES ['img']['tmp_name'];
                    $path = 'views/Course/img/'.$_FILES ['img']['name'];
                    move_uploaded_file ($file, $path);
                }
                else $path = 'views/Course/img/default.png';            

                $course = new CourseModel ();
                $result = $course->readSpecific ('=', null, $name, null, null);
                $array = null;            

                foreach ($result as $key => $value) $array = $value;

                if ($array == null && $name != null && $description != null) {                
                    $thumb = new GD ($path);
                    $thumb->resize (200, 200);
                    $extension = 'png';
                    $thumb->save ($path.'thumb.'.$extension, $extension);                        
                    $course->create (utf8_encode ($name), utf8_encode ($description), $currentDate, $path.'thumb.'.$extension);
                    $jsonData = array ('create' => true);
                    echo 'Saved';
                }
                else $jsonData = array ('create' => false);
    
                header ('Content-type: application/json; charset=utf-8');
                echo json_encode ($jsonData);
            }
        }

        public function delete () {
            require 'models/CourseModel.php';
            $identifier = $_POST ['id'];
            $jsonData = null;

            if ($identifier != null) {
                $course = new CourseModel ();            
                $course->delete ($identifier);
                $jsonData = array ('delete' => true);
            }

            header ('Content-type: application/json; charset=utf-8');
            echo json_encode ($jsonData);
        }
    }
?>