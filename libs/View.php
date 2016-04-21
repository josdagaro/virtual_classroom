<?php
    class View {
        private $controller;

        function __construct (Request $petition) {
            $this->controller = $petition->getController ();
        }

        public function show ($name, $variables = array ()) {
            require 'libs/smarty/libs/Smarty.class.php';
            $configuration = Configuration::singleton ();
            $path = $configuration->get ('viewsFolder').$this->controller.'/'.$name.'.html';

            if (file_exists ($path) == false) {
                trigger_error ('La plantilla `'.$path.'` no existe.', E_USER_NOTICE);
                return false;
            }

            $smarty = new Smarty;
            $smarty->compile_dir = './views/templates_c/';
            $smarty->assign ('baseUrl', $configuration->get ('baseUrl'));
            $smarty->assign ('applicationName', $configuration->get ('applicationName'));
            $smarty->assign ('applicationCompany', $configuration->get ('applicationCompany'));
            $smarty->assign ('applicationSlogan', $configuration->get ('applicationSlogan'));            
            $smarty->assign ('jquery', 'https://code.jquery.com/jquery-2.2.3.min.js');

            $smarty->assign (
                'bootstrapCss', 
                'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'
            );

            $smarty->assign (
                'bootstrapJs', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js'
            );

            $smarty->assign (
                'bootstrapValidatorCss', 
                'http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css'
            );

            $smarty->assign (
                'bootstrapValidatorJs', 
                'http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js'
            );

            foreach ($variables as $key => $value) {
                $smarty->assign ($key, $value);
            }

            $smarty->display ($path);
        }
    }
?>
