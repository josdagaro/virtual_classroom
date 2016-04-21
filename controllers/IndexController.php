<?php
    require 'libs/Controller.php';    

    class IndexController extends Controller
    {
        public function __construct ()
        {
            parent::__construct ();
        }

        public function index ()
        {
            require 'libs/Session.php';
            require 'models/CourseModel.php';
            $session = new Session;
            $session->init ();            

            if ($session->exists ()) {
                $variables = array
                (
                    'title' => 'Aula virtual UC',
                    'slideJs' =>  'views/Index/js/slide.js',
                    'img_1' => 'views/Index/img/i1.jpg',
                    'img_2' => 'views/Index/img/i3.jpg',
                    'img_3' => 'views/Index/img/i4.jpg',
                    'indexJs' => 'views/Index/js/index.js'
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
            else {
                header ("Location: User");         
            }
        }
    }
?>
