<?php
	class ReceivesModel {
		protected $database;

		public function __construct () {$this->database = SPDO::singleton ();}

		public function create ($userId, $requestId) {
			$query = $this->database->prepare ('insert into receives (user_id, request_id) values (?, ?)');
            $query->bindParam (1, $userId);
            $query->bindParam (2, $requestId);
            $query->execute ();
		}

		public function readAll () {
			$query = $this->database->prepare ('select * from receives');
            $query->execute ();
            return $query->fetchAll ();
		}

        public function readSpecific ($userId, $requestId) {
            $sql = 'select * from receives where user_id = '.$userId.' and request_id = '.$requestId;
            $query = $this->database->prepare ($sql);
            $query->bindParam (1, $userId);
            $query->bindParam (2, $requestId);
            $query->execute ();
            return $query->fetchAll ();
        }

        public function count ($userId) {
        	$sql = 'select count(*) as quantity from receives, request where receives.user_id = ? and request.state = 1';
        	$query = $this->database->prepare ($sql);
            $query->bindParam (1, $userId);
            $query->execute ();
            return $query->fetchAll ();
        }
	}	
?>