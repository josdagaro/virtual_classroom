<?php
    class Configuration
    {
        private $variables;
        private static $instance;

        private function __construct () {$this->variables = array ();}

        public function set ($name, $value)
        {
            if (!isset ($this->variables [$name])) $this->variables [$name] = $value;
        }

        public function get ($name) {if (isset ($this->variables [$name])) return $this->variables [$name];}

        public static function singleton ()
        {
            if (!isset (self::$instance))
            {
                $class = __CLASS__;
                self::$instance = new $class;
            }

            return self::$instance;
        }
    }
?>
