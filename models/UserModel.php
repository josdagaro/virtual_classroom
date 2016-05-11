<?php
    class UserModel {
        protected $database;
        
        public function __construct () {$this->database = SPDO::singleton ();}

        public function create ($identificationNumber, $name, $lastName, $email, $password, $type = 0, $image = null, $active = 0, $activeCode) {
            require 'libs/Bcrypt.php';
            $bcrypt = new Bcrypt (15);
            $hash = $bcrypt->hash ($password);

            $query = $this->database->prepare (
                'insert into user (identification_number, name, last_name, email, password, type, image, active, active_code) values (?, ?, ?, ?, ?, ?, ?, ?, ?)'
            );

            $query->bindParam (1, $identificationNumber);
            $query->bindParam (2, $name);
            $query->bindParam (3, $lastName);
            $query->bindParam (4, $email);
            $query->bindParam (5, $hash);
            $query->bindParam (6, $type);
            $query->bindParam (7, $image);
            $query->bindParam (8, $active);
            $query->bindParam (9, $activeCode);
            $query->execute ();
        }

        public function readlAll () {
            $query = $this->database->prepare (
                'select identification_number, name, last_name, email, password, type, image, active from user'
            );

            $query->execute ();
            return $query->fetchAll ();
        }

        public function readSpecific ($symbol, $identificationNumber = null, $name = null, $lastName = null, $email = null, $password = null,
        $type = null, $active = null, $activeCode = null) {
            $sql = 'select * from user where 1 = 1';
            $count = 0;

            if (isset ($identificationNumber)) $sql = $sql.' and identification_number = ?';

            if (isset ($name)) {
                if ($symbol == '%') $sql = $sql.' and name like "%'.$name.'%"';
                else $sql = $sql.' and name = "'.$name.'"';
            }

            if (isset ($lastName)) {
                if ($symbol == '%') $sql = $sql.' and last_name like "%'.$lastName.'%"';
                else $sql = $sql.' and last_name = "'.$lastName.'"';
            }

            if (isset ($email)) {
                if ($symbol == '%') $sql = $sql.' and email like "%'.$email.'%"';
                else $sql = $sql.' and email = "'.$email.'"';
            }

            if (isset ($password)) $sql = $sql.' and password = ?';
            if (isset ($type)) $sql = $sql.' and type = ?';
            if (isset ($active)) $sql = $sql.' and active = ?';        
            if (isset ($activeCode)) $sql = $sql.' and active_code = ?';
            $query = $this->database->prepare ($sql);

            if (isset ($identificationNumber)) {
                $count ++;
                $query->bindParam ($count, $identificationNumber);
            }

            if (isset ($password)) {
                $count ++;
                $query->bindParam ($count, $password);
            }

            if (isset ($type)) {
                $count ++;
                $query->bindParam ($count, $type);
            }

            if (isset ($active)) {
                $count ++;
                $query->bindParam ($count, $active);
            }

            if (isset ($activeCode)) {
                $count ++;
                $query->bindParam ($count, $activeCode);
            }

            $query->execute ();
            return $query->fetchAll ();
        }

        public function update ($identificationNumber, $name, $lastName, $email, $password, $type, $active) {
            $query = $this->database->prepare (
                'update user set name = ?, last_name = ?, email = ?, password = ?, type = ?, active = ? where identification_number = ?'
            );

            $query->bindParam (1, $name);
            $query->bindParam (2, $lastName);
            $query->bindParam (3, $email);
            $query->bindParam (4, $password);
            $query->bindParam (5, $type);
            $query->bindParam (6, $active);
            $query->bindParam (7, $identificationNumber);
            $query->execute ();
        }

        public function delete ($identificationNumber) {
            $query = $this->database->prepare ('delete from user where identification_number = ?');
            $query->bindParam (1, $identificationNumber);
            $query->execute ();
        }
    }
?>
