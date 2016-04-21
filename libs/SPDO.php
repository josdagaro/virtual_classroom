<?php
    class SPDO extends PDO {
        private static $instance = null;

        public function __construct () {
            $configuration = Configuration::singleton ();

            parent::__construct (
                'mysql:host=' . $configuration->get ('databaseHost').';dbname=' . $configuration->get ('databaseName'),
                $configuration->get ('databaseUser'), $configuration->get ('databasePassword')
            );
        }

        public static function singleton () {
            if ( self::$instance == null ) {
                self::$instance = new self ();
            }

            return self::$instance;
        }
  }
?>
