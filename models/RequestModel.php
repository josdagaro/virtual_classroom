<?php
	class RequestModel {
		protected $database;

		public function __construct () {$this->database = SPDO::singleton ();}

		public function create ($userId, $state, $type, $body) {
			$query = $this->database->prepare ('insert into request (user_id, state, type, body) values (?, ?, ?, ?)');
            $query->bindParam (1, $userId);
            $query->bindParam (2, $state);
            $query->bindParam (3, $type);
            $query->bindParam (4, $body);
            $query->execute ();
		}

		public function readAll () {
			$query = $this->database->prepare ('select * from request');
            $query->execute ();
            return $query->fetchAll ();
		}

        public function readSpecific ($symbol, $id = null, $userId = null, $state = null, $type = null, $body = null) {
            $sql = 'select * from request where 1 = 1';
            $count = 0;
            if (isset ($id)) $sql = $sql.' and id = ?';
            if (isset ($userId)) $sql = $sql.' and user_id = ?';
            if (isset ($state)) $sql = $sql.' and state = ?';
            if (isset ($type)) $sql = $sql.' and type = ?';

            if (isset ($body)) {
            	if ($symbol == '%') $sql = $sql.' and body like "%'.$body.'%"';
            	else $sql = $sql.' and body = ?';
            }

            $query = $this->database->prepare ($sql);

            if (isset ($id)) {
                $count ++;
                $query->bindParam ($count, $id);
            }

            if (isset ($userId)) {
                $count ++;
                $query->bindParam ($count, $userId);
            }

            if (isset ($state)) {
                $count ++;
                $query->bindParam ($count, $state);
            }

            if (isset ($type)) {
                $count ++;
                $query->bindParam ($count, $type);
            }

            if (isset ($body)) {
                $count ++;
                $query->bindParam ($count, $body);
            }

            $query->execute ();
            return $query->fetchAll ();
        }

        public function update ($id, $userId, $state, $type, $body) {
            $query = $this->database->prepare ('update request set user_id = ?, state = ?, type = ?, body = ? where id = ?');
            $query->bindParam (1, $userId);
            $query->bindParam (2, $state);
            $query->bindParam (3, $type);
            $query->bindParam (4, $body);
            $query->bindParam (5, $id);   
            $query->execute ();
        }
	}	
?>