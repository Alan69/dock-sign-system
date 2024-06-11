function getDocument($documentId, $userId) {
    $db = new PDO('mysql:host=localhost;dbname=document_signing', 'root', '');
    $stmt = $db->prepare("SELECT file_path FROM documents WHERE id = :document_id AND user_id = :user_id");
    $stmt->execute([':document_id' => $documentId, ':user_id' => $userId]);
    $document = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($document) {
        // Возвращение пути к файлу
        return $document['file_path'];
    }
    return null;
}
