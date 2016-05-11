<?php
	class CourseModel {
		protected $database;

		public function __construct () {$this->database = SPDO::singleton ();}

		public function create ($name, $description, $creationDate, $image) {
            $query = $this->database->prepare (
                'insert into course (name, description, creation_date, image) values (?, ?, ?, ?)'
            );

            $query->bindParam (1, $name);
            $query->bindParam (2, $this->database->quote ($description));
            $query->bindParam (3, $creationDate);
            $query->bindParam (4, $image);
            $query->execute ();
        }

		public function readAll () {
			$query = $this->database->prepare ('select * from course');
            $query->execute ();
            return $query->fetchAll ();
		}

        public function readSpecific ($symbol, $identifier = null, $name = null, $description = null, $creationDate = null) {
            $sql = 'select * from course where 1 = 1';
            $count = 0;
            if (isset ($identifier)) $sql = $sql.' and identifier = ?';

            if (isset ($name)) {
                if ($symbol == '%') $sql = $sql.' and name like "%'.$name.'%"';
                else $sql = $sql.' and name = "'.$name.'"';
            }

            if (isset ($description)) {
                if ($symbol == '%') $sql = $sql.' and description like "%'.$description.'%"';
                else $sql = $sql.' and description = "'.$description.'"';
            }

            if (isset ($creationDate)) $sql = $sql.' and creation_date = ?';
            $query = $this->database->prepare ($sql);

            if (isset ($identifier)) {
                $count ++;
                $query->bindParam ($count, $identifier);
            }

            if (isset ($name)) {
                $count ++;
                $query->bindParam ($count, $name);
            }

            if (isset ($description)) {
                $count ++;
                $query->bindParam ($count, $description);
            }

            if (isset ($creationDate)) {
                $count ++;
                $query->bindParam ($count, $creationDate);
            }

            $query->execute ();
            return $query->fetchAll ();
        }

        public function update ($identifier, $name, $description, $creationDate, $image) {
            $query = $this->database->prepare (
            	'update course set name = ?, description = ?, creation_date = ?, image = ? where identifier = ?'
            );

            $query->bindParam (1, $name);
            $query->bindParam (2, $this->database->quote ($description));
            $query->bindParam (3, $creationDate);
            $query->bindParam (4, $image);
            $query->bindParam (5, $identifier);   
            $query->execute ();
        }

        public function delete ($identifier) {
            $query = $this->database->prepare ('delete from course where identifier = ?');
            $query->bindParam (1, $identifier);
            $query->execute ();
        }
}