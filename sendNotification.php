function sendNotification($userId, $message) {
    $db = new PDO('mysql:host=localhost;dbname=document_signing', 'root', '');
    $stmt = $db->prepare("SELECT email FROM users WHERE id = :user_id");
    $stmt->execute([':user_id' => $userId]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($user) {
        // Использование PHP mail() для отправки почты
        mail($user['email'], "Notification from Document Signing Platform", $message);
    }
}
