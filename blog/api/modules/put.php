<?php
class Put extends GlobalMethods{
    private $pdo;

    public function __construct(\PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function edit_reports($data, $id){
        try{
            $query = "UPDATE reports SET title=?, description=? WHERE report_id=?";
            $stmt = $this->pdo->prepare($query);
            $result = $stmt->execute([
               $data->title,
                $data->description,
                $id
            ]);
            return $this->sendResponse("Success", null, 200);

        } catch(PDOException $e) {
            return $this->sendResponse("Failed", $e->getMessage(), 500); 
        }
    }

    public function update_username($data) {
        try {

            $user_id = 1;
            $query = "UPDATE users SET username=? WHERE user_id=?";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([
                $data->username,
                $user_id
            ]);
            return $this->sendResponse("Success", null, 200);
        } catch(PDOException $e) {
            return $this->sendResponse("Failed", $e->getMessage(), 500); 
        }
    }
    public function update_email($data, $id) {
        try {
            $query = "UPDATE users SET email=? WHERE user_id=?";
            $stmt = $this->pdo->prepare($query);
            var_dump($data);
            $stmt->execute([
                $data->email,
                $id
            ]);
            return $this->sendResponse("Success", null, 200);
        } catch(PDOException $e) {
            return $this->sendResponse("Failed", $e->getMessage(), 500); 
        }
    }
    public function update_password($data, $id) {
        try {

            $hashed = password_hash($data->password, PASSWORD_DEFAULT);
    
            $query = "UPDATE users SET password=? WHERE user_id=?";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([
                $hashed,
                $id
            ]);
            
            return $this->sendResponse("Success", null, 200);
        } catch(PDOException $e) {
            return $this->sendResponse("Failed", $e->getMessage(), 500); 
        }
    }
    public function update_departmnet($data, $id) {
        try {
            $query = "UPDATE users SET department=? WHERE user_id=?";
            $stmt = $this->pdo->prepare($query);
            var_dump($data);
            $stmt->execute([
                $data->department,
                $id
            ]);
            return $this->sendResponse("Success", null, 200);
        } catch(PDOException $e) {
            return $this->sendResponse("Failed", $e->getMessage(), 500); 
        }
    }
    public function update_address($data, $id) {
        try {
            $query = "UPDATE users SET address=? WHERE user_id=?";
            $stmt = $this->pdo->prepare($query);
            var_dump($data);
            $stmt->execute([
                $data->address,
                $id
            ]);
            return $this->sendResponse("Success", null, 200);
        } catch(PDOException $e) {
            return $this->sendResponse("Failed", $e->getMessage(), 500); 
        }
    }
}

?>