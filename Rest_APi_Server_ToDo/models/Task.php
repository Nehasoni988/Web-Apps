<?php
    class Task
    {
        private $conn;
        private $table = 'tasks';

        //properties
        public $id;
        public $title;
        public $description;
        public $deadline;
        

        // Constructor with DB
        public function __construct($db)
        {
            $this->conn = $db;
        }
        //Get Tasks
        public function read()
        {
            // Create query
            $query = 'SELECT id, title,description,deadline
                        FROM ' . $this->table; 
            
            //prepare statement
            
            $stmt = $this->conn->prepare($query);

            //Execute query
            $stmt->execute();
    
            return $stmt;
        }
        public function read_single()
        {
            $query = 'SELECT *
            FROM ' . $this->table .' WHERE id = :id LIMIT 1';

            //Prepare statement
            $stmt = $this->conn->prepare($query);

            //Bind ID
            $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);

             //Execute query
              $stmt->execute();

             $row = $stmt->fetch(PDO::FETCH_ASSOC);

             //Set properties
             $this->title = $row['title'];
             $this->description = $row['description'];
             $this->deadline = $row['deadline'];
        }
        public function create()
        {
            //create query
            $query = 'INSERT INTO '. $this->table . '
                    SET
                        title = :title ,
                        description = :description,
                        deadline = :deadline';
                //Prepare Statement
                $stmt = $this->conn->prepare($query);

                //clean data
                $this->title = htmlspecialchars(strip_tags($this->title));
                $this->description = htmlspecialchars(strip_tags($this->description));
                $this->deadline = htmlspecialchars(strip_tags($this->deadline));

                //Bind Data
                $stmt->bindParam(':title', $this->title);
                $stmt->bindParam(':description', $this->description);
                $stmt->bindParam(':deadline', $this->deadline);

                //Execute query
                if($stmt->execute()){
                    return true;
                }

                //print error
                 printf("Error: %s.\n",$stmt->error);
                    return false;
        }
        // Update Task
        public function update()
        {
            //update query
            $query = 'UPDATE '. $this->table . '
                    SET
                        title = :title ,
                        description = :description,
                        deadline = :deadline
                   WHERE
                       id = :id';
                        
                //Prepare Statement
                $stmt = $this->conn->prepare($query);

                //clean data
                $this->title = htmlspecialchars(strip_tags($this->title));
                $this->description = htmlspecialchars(strip_tags($this->description));
                $this->deadline = htmlspecialchars(strip_tags($this->deadline));
                $this->id = htmlspecialchars(strip_tags($this->id));

                //Bind Data
                $stmt->bindParam(':title', $this->title);
                $stmt->bindParam(':description', $this->description);
                $stmt->bindParam(':deadline', $this->deadline);
                $stmt->bindParam(':id', $this->id);

                //Execute query
                if($stmt->execute()){
                    return true;
                }

                //print error
                 printf("Error: %s.\n",$stmt->error);
                    return false;
        }
        //Delete Task
         public function delete()
         {
             //create query
             $query = 'DELETE FROM ' . $this->table . 'WHERE id = :id';
            
             //Prepare Statement
            $stmt = $this->conn->prepare($query);
            
            //Bind ID
            $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
            $result = $stmt->execute();

            //Execute query
            if($result)
            {
                return true;
            }
                printf("Error: %s.\n",$stmt->error);
                return false;     
         }



    } 
?>