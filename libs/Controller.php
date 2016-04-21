<?php
    abstract class Controller
    {
        protected $view;

        public function __construct ()
        {
            $this->view = new View (new Request);
        }

        abstract public function index ();
    }
?>
