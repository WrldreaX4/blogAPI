<?php

require_once "global.php";


class Get extends GlobalMethods{

    private $pdo;

    public function __construct(\PDO $pdo){
        $this->pdo = $pdo;
    }

    public function get_records($table, $condition=null){
        $sqlString ="SELECT * FROM $table";
        if($condition != null){
            $sqlString = "WHERE" .$condition;
        }
        $result = $this->executeQuery($sqlString);

        if($result['code']==200){
            return $this->sendPayload($result['data'], 'success', 'Sucessfully retrieved records', $result['code']);
        }
            return $this->sendPayload(null, 'failed', 'Failed retrieved records', $result['code']);

    }

    public function executeQuery($sql){
        $data = array();
        $errmsg = "";
        $code = 0;

         try{
            if($result = $this->pdo->query($sql)->fetchAll()){
                foreach($result as $record){
                    array_push($data, $record);
                }
                $code = 200;
                $result = null;
                return array("code"=>$code, "data"=>$data);
            }
            else{
                $errmsg = "No Data Found";
                $code = 404;
            }
         }
         catch(\PDOException $e){
            $errmsg = $e->getMessage();
            $code = 403;
         }

         return array("code"=>$code, "errmsg"=>$errmsg);
    }



    public function get_eventexpenses($user_id) {
        
        $sqlString = "SELECT * FROM eventexpenses WHERE user_id = ? ORDER BY expense_id DESC LIMIT 1";
        $stmt = $this->pdo->prepare($sqlString);
        $stmt->bindParam(1, $user_id, PDO::PARAM_INT); 
        $stmt->execute();
    
        $result = $stmt->fetch(PDO::FETCH_ASSOC); 
    
        if ($result) { 
            return $this->getResponse($result, "Success", null, 200); 
        } else {
            return $this->getResponse(null, "Failed", "Failed to retrieve", 404); 
        }
    }
    
    public function get_signup($id=null){
        $conditionString = null;
        if($id != null){
            $conditionString = "user_id=$id";
        }
        return $this->get_records("users", $conditionString);
    }

    public function get_flipbook($data) {
        $sqlString = "SELECT u.username, r.title, r.description, r.date_created, c.collage_desc, f.* 
        FROM users u
        JOIN reports r ON u.user_id = r.user_id 
        JOIN flipbook f ON r.report_id = f.report_id 
        JOIN collage c ON f.collage_id = c.collage_id 
        WHERE f.flipbook_id = :flipbook_id";
        
    
        $stmt = $this->pdo->prepare($sqlString);
        $stmt->bindParam(':flipbook_id', $data);
        $stmt->execute();
    
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        if ($result) {
            return $this->getResponse($result, "success", null, 200);
        } else {
            return $this->getResponse(null, "failed", "Failed retrieved records", 404);
        }
    }

        public function get_flipbookall() {
            $sqlString = "SELECT u.username, r.title, r.description, c.collage_desc, f.* 
            FROM users u
            JOIN reports r ON u.user_id = r.user_id 
            JOIN flipbook f ON r.report_id = f.report_id 
            JOIN collage c ON f.collage_id = c.collage_id";
            
        
            $stmt = $this->pdo->prepare($sqlString);
            $stmt->execute();
        
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
            if ($result) {
                return $this->getResponse($result, "success", null, 200);
            } else {
                return $this->getResponse(null, "failed", "Failed retrieved records", 404);
            }
        }

    public function get_collage($userId)
    {
        $sqlString = "
            SELECT collage.*, eventreports.*
            FROM collage
            INNER JOIN eventreports ON collage.event_id = eventreports.event_id
            WHERE collage.user_id = ?
            ORDER BY collage.collage_id DESC
            LIMIT 1;
        ";        
        $stmt = $this->pdo->prepare($sqlString);
        $stmt->execute([$userId]);
    
        $result = $stmt->fetch(PDO::FETCH_ASSOC); 
    
        if ($result) { 
            return $this->getResponse($result, "Success", null, 200);
        } else {
            return $this->getResponse(null, "Failed", "Failed to retrieve the collage", 404);
        }
    }

    public function getCollageAll($userId)
    {
        $sqlString = "
            SELECT collage.*, eventreports.*
            FROM collage
            INNER JOIN eventreports ON collage.event_id = eventreports.event_id
            WHERE collage.user_id = ?
            ORDER BY collage.collage_id;
        ";        
        $stmt = $this->pdo->prepare($sqlString);
        $stmt->execute([$userId]);
    
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC); 
    
        if ($results) { 
            return $this->getResponse($results, "Success", "Success", 200);
        } else {
            return $this->getResponse(null, "Failed", "Failed to retrieve the collages", 404);
        }
    }
    
    public function get_reports($data){
        $sqlString = "SELECT * FROM reports WHERE report_id = ?";
        $stmt = $this->pdo->prepare($sqlString);
        $stmt->bindParam(1, $data);
        $stmt->execute();

        $result = $stmt-> fetchAll(PDO:: FETCH_ASSOC);

        if(!empty($result)){
            return $this->getResponse($result, "Success", null, 200);
        } else{
            return $this->getResponse(null, "Failed", "Failed to retrieve", 404);
        }
    }

    public function get_annualReport($data) {
        $sqlString = "SELECT * FROM annualreports WHERE user_id = ? ORDER BY created_at DESC LIMIT 1";
        $stmt = $this->pdo->prepare($sqlString);
        $stmt->bindParam(1, $data, PDO::PARAM_INT); 
        $stmt->execute();
    
        $result = $stmt->fetch(PDO::FETCH_ASSOC); 
    
        if ($result) { 
            return $this->getResponse($result, "Success", null, 200); 
        } else {
            return $this->getResponse(null, "Failed", "Failed to retrieve", 404); 
        }
    }
    

        
        public function get_eventreport($data) {
            $sqlString = "SELECT * FROM eventreports WHERE user_id = ? ORDER BY created_at DESC LIMIT 1";
            $stmt = $this->pdo->prepare($sqlString);
            $stmt->bindParam(1, $data, PDO::PARAM_INT); 
            $stmt->execute();
        
            $result = $stmt->fetch(PDO::FETCH_ASSOC); 
        
            if ($result) { 
                return $this->getResponse($result, "Success", null, 200); 
            } else {
                return $this->getResponse(null, "Failed", "Failed to retrieve", 404); 
            }
        }

        public function get_eventreportAll($data) {
            $sqlString = "SELECT * FROM eventreports WHERE user_id = ?";
            $stmt = $this->pdo->prepare($sqlString);
            $stmt->bindParam(1, $data, PDO::PARAM_INT); 
            $stmt->execute();
        
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
        
            if ($result) { 
                return $this->getResponse($result, "Success", null, 200); 
            } else {
                return $this->getResponse(null, "Failed", "Failed to retrieve", 404); 
            }
        }


       
        public function get_annualReportAll($data) {
            $sqlString = "SELECT * FROM annualreports WHERE user_id = ?";
            $stmt = $this->pdo->prepare($sqlString);
            $stmt->bindParam(1, $data, PDO::PARAM_INT); 
            $stmt->execute();
        
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
        
            if ($result) { 
                return $this->getResponse($result, "Success", null, 200);
            } else {
                return $this->getResponse(null, "Failed", "Failed to retrieve", 404); 
            }
        }

        
        public function get_financialreportAll($data) {
            $sqlString = "SELECT * FROM financialreports WHERE user_id = ?";
            $stmt = $this->pdo->prepare($sqlString);
            $stmt->bindParam(1, $data, PDO::PARAM_INT); 
            $stmt->execute();
        
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
        
            if ($result) { 
                return $this->getResponse($result, "Success", null, 200); 
            } else {
                return $this->getResponse(null, "Failed", "Failed to retrieve", 404); 
            }
        }

        
    
    public function get_financialreport($data) {
        $sqlString = "SELECT * FROM financialreports WHERE user_id = ? ORDER BY date_created DESC LIMIT 1";
        $stmt = $this->pdo->prepare($sqlString);
        $stmt->bindParam(1, $data, PDO::PARAM_INT); 
        $stmt->execute();
    
        $result = $stmt->fetch(PDO::FETCH_ASSOC); 
    
        if ($result) { 
            return $this->getResponse($result, "Success", null, 200); 
        } else {
            return $this->getResponse(null, "Failed", "Failed to retrieve", 404); 
        }
    }


   
    public function get_annualonly($data) {
        $sqlString = "SELECT * FROM annualreports WHERE report_id = ?";
        $stmt = $this->pdo->prepare($sqlString);
        $stmt->bindParam(1, $data, PDO::PARAM_INT); 
        $stmt->execute();
    
        $result = $stmt->fetch(PDO::FETCH_ASSOC); 
    
        if ($result) { 
            return $this->getResponse($result, "Success", null, 200);
        } else {
            return $this->getResponse(null, "Failed", "Failed to retrieve", 404); 
        }
    }


    
    public function get_eventonly($data) {
        $sqlString = "SELECT * FROM eventreports WHERE event_id = ?";
        $stmt = $this->pdo->prepare($sqlString);
        $stmt->bindParam(1, $data, PDO::PARAM_INT); 
        $stmt->execute();
    
        $result = $stmt->fetch(PDO::FETCH_ASSOC); 
    
        if ($result) { 
            return $this->getResponse($result, "Success", null, 200); 
        } else {
            return $this->getResponse(null, "Failed", "Failed to retrieve", 404); 
        }
    }


    public function get_financialonly($data) {
        $sqlString = "SELECT * FROM financialreports WHERE financialreport_id = ?";
        $stmt = $this->pdo->prepare($sqlString);
        $stmt->bindParam(1, $data, PDO::PARAM_INT); 
        $stmt->execute();
    
        $result = $stmt->fetch(PDO::FETCH_ASSOC); 
    
        if ($result) { 
            return $this->getResponse($result, "Success", null, 200); 
        } else {
            return $this->getResponse(null, "Failed", "Failed to retrieve", 404); 
        }
    }


    public function get_projectreport($data) {
        
        $sqlString = "SELECT * FROM projectreport WHERE user_id = ? ORDER BY created_at DESC LIMIT 1";
        $stmt = $this->pdo->prepare($sqlString);
        $stmt->bindParam(1, $data, PDO::PARAM_INT); 
        $stmt->execute();
    
        $result = $stmt->fetch(PDO::FETCH_ASSOC); 
    
        if ($result) { 
            return $this->getResponse($result, "Success", null, 200); 
        } else {
            return $this->getResponse(null, "Failed", "Failed to retrieve", 404); 
        }
    }

            
            public function get_projectreportAll($data) {
                
                $sqlString = "SELECT * FROM projectreport WHERE user_id = ?";
                $stmt = $this->pdo->prepare($sqlString);
                $stmt->bindParam(1, $data, PDO::PARAM_INT); 
                $stmt->execute();
            
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
            
                if ($result) { 
                    return $this->getResponse($result, "Success", null, 200); 
                } else {
                    return $this->getResponse(null, "Failed", "Failed to retrieve", 404);
                }
            }

            public function get_projectonly($data) {
                $sqlString = "SELECT * FROM projectreport WHERE report_id = ?";
                $stmt = $this->pdo->prepare($sqlString);
                $stmt->bindParam(1, $data, PDO::PARAM_INT);
                $stmt->execute();
            
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
            
                if ($result) { 
                    return $this->getResponse($result, "Success", null, 200);
                } else {
                    return $this->getResponse(null, "Failed", "Failed to retrieve", 404); 
                }
            }


    public function get_reportsall(){
        $sqlString = "SELECT * FROM reports";
        $stmt = $this->pdo->prepare($sqlString);
        $stmt->execute();

        $result = $stmt-> fetchAll(PDO:: FETCH_ASSOC);

        if(!empty($result)){
            return $this->getResponse($result, "Success", null, 200);
        } else{
            return $this->getResponse(null, "Failed", "Failed to retrieve", 404);
        }
    }


    public function isUserLoggedIn() {
        return isset($_SESSION['user_id']);
    }

    public function logout() {
        session_unset(); 
        session_destroy(); 
    }
    
    public function get_profile(){
        
        $sqlString = "SELECT * FROM users WHERE user_id = ?";
        $stmt = $this->pdo->prepare($sqlString);
        $stmt->bindParam(1, $data);
        $stmt->execute();

        $result = $stmt-> fetchAll(PDO:: FETCH_ASSOC);

        if(!empty($result)){
            return $this->getResponse($result, "Success", null, 200);
        } else{
            return $this->getResponse(null, "Failed", "Failed to retrieve", 404);
        }
    }
}

  

?>