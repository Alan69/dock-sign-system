function uploadDocument($file, $userId) {
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($file["name"]);
    
    // Проверка и загрузка файла
    if (move_uploaded_file($file["tmp_name"], $targetFile)) {
        $db = new PDO('mysql:host=localhost;dbname=document_signing', 'root', '');
        $stmt = $db->prepare("INSERT INTO documents (user_id, file_path) VALUES (:user_id, :file_path)");
        $stmt->execute([':user_id' => $userId, ':file_path' => $targetFile]);
        return true;
    }
    return false;
}
