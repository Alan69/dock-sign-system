function signDocument($documentId, $userId) {
    $db = new PDO('mysql:host=localhost;dbname=document_signing', 'root', '');
    $stmt = $db->prepare("INSERT INTO signatures (document_id, user_id, signed_at) VALUES (:document_id, :user_id, NOW())");
    $stmt->execute([':document_id' => $documentId, ':user_id' => $userId]);
}

function checkSignature($documentId, $userId) {
    $db = new PDO('mysql:host=localhost;dbname=document_signing', 'root', '');
    $stmt = $db->prepare("SELECT * FROM signatures WHERE document_id = :document_id AND user_id = :user_id");
    $stmt->execute([':document_id' => $documentId, ':user_id' => $userId]);
    return $stmt->fetch(PDO::FETCH_ASSOC) !== false;
}
