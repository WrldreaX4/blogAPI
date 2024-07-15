    <?php
    require_once("global.php");
    class Post extends GlobalMethods {

        private $pdo;

        public function __construct(\PDO $pdo){
            $this->pdo = $pdo;
        }

        public function signup($data) {
            if (empty($data['email']) || empty($data['password']) || empty($data['username'])) {
                return [
                    'status' => 'error',
                    'message' => 'Email, username, and password are required.'
                ];
            }
            $username = $data['username'];
            $email = $data['email'];
            $password = $data['password'];
    
            $query = "SELECT * FROM users WHERE email = :email OR username = :username LIMIT 1";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if ($user) {
                return [
                    'status' => 'error',
                    'message' => 'Email or username already exists.'
                ];
            }
    
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    
            $query = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $hashedPassword);
    
            if ($stmt->execute()) {
                return [
                    'status' => 'success',
                    'message' => 'Signup successful.'
                ];
            } else {
                return [
                    'status' => 'error',
                    'message' => 'Signup failed. Please try again.'
                ];
            }
        }
    

        public function login($data) {
            if (empty($data['email']) || empty($data['password'])) {
                $this->sendPayload(null, "failed", "Email and password are required.", 404);
            }
    
            $email = trim($data['email']);
            $password = trim($data['password']);
    
            error_log("Login attempt: email = $email, password = $password");
    
            $query = "SELECT * FROM users WHERE email = :email LIMIT 1";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if ($user) {
                error_log("User found: " . print_r($user, true));
    
                if (password_verify($password, $user['password'])) {
                    $_SESSION['user_id'] = $user['id'];
                    return [
                        'status' => 'success',
                        'message' => 'Login successful.'
                    ];
                } else {
                    error_log("Password mismatch for user: $email");
                }
            } else {
                error_log("User not found: $email");
            }

            return [
                'status' => 'error',
                'message' => 'Invalid email or password.'
            ];
        }


        
    }
?>
