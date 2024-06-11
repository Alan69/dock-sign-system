function registerUser($username, $password, $email) {
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    // Сохранение пользователя в базе данных
    $db = new PDO('mysql:host=localhost;dbname=document_signing', 'root', '');
    $stmt = $db->prepare("INSERT INTO users (username, password, email) VALUES (:username, :password, :email)");
    $stmt->execute([':username' => $username, ':password' => $hashedPassword, ':email' => $email]);
}