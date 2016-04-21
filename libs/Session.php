<?php
    class Session {
        public static function init () {
            session_start ();
        }

        public static function destroy () {
            session_destroy ();
        }

        public static function setValue ($variable, $value) {
            $_SESSION [$variable] = $value;
        }

        public static function getValue ($variable) {

            return $_SESSION [$variable];
        }

        public static function unsetValue ($variable) {
            if (isset ($_SESSION [$variable])) {
                unset ($_SESSION [$variable]);
            }
        }

        static function exists () {
            $check = false;

            if (sizeof ($_SESSION) > 0) {
                $check = true;
            }

            return $check;
        }
    }
?>
