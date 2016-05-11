<?php
    class FrontController {
        public static function main (Request $petition) {
            require 'libs/Configuration.php';
            require 'libs/SPDO.php';
            require 'libs/View.php';
            require 'configuration.php';            
            if (!$petition->getController ()) $controllerName = $configuration->get ('defaultController');
            else $controllerName = $petition->getController ();
            $controllerName = $controllerName.'Controller';
            $actionName = $petition->getAction ();
            $controllerPath = $configuration->get ('controllersFolder').$controllerName.'.php';
            if (is_file ($controllerPath)) require $controllerPath;
            else die ('El controlador no existe - 404 not found');

            if (is_callable (array ($controllerName, $actionName)) == false) {
                trigger_error ($controllerName.'->'.$actionName.'` no existe', E_USER_NOTICE);
                header ('Location: http://localhost/virtual_classroom');           
            }

            $controller = new $controllerName ();

            if ($petition->getArguments () != null) {
                call_user_func (array ($controller, $actionName), $petition->getArguments ());
            }
            else call_user_func (array ($controller, $actionName));
        }
    }
?>
