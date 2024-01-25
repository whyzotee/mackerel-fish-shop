<?php
if (!isset($_SESSION))
    session_start();

require_once('../../../core/config.php');
header('Content-Type: application/json');

$method = $_SERVER['REQUEST_METHOD'];

if ($_SESSION['local_id'] == "") {
    echo json_encode(['message' => 'not login']);
    exit();
}

switch ($method) {
    case 'GET':
        $stmt = $pdo->query('SELECT * FROM books');
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($result);
        break;
    case 'POST':
        $data = json_decode(file_get_contents('php://input'), true);
        $title = $data['title'];
        $author = $data['author'];
        $published_at = $data['published_at'];

        $stmt = $pdo->prepare('INSERT INTO books (title, author, published_at) VALUES (?, ?, ?)');
        $stmt->execute([$title, $author, $published_at]);

        echo json_encode(['message' => 'Book added successfully']);
        break;
    case 'PUT':
        parse_str(file_get_contents('php://input'), $data);
        $id = $data['id'];
        $title = $data['title'];
        $author = $data['author'];
        $published_at = $data['published_at'];

        $stmt = $pdo->prepare('UPDATE books SET title=?, author=?, published_at=? WHERE id=?');
        $stmt->execute([$title, $author, $published_at, $id]);

        echo json_encode(['message' => 'Book updated successfully']);
        break;
    case 'DELETE':
        $sql = 'DELETE FROM order_fish WHERE id=' . $_GET['id'];
        $query = mysqli_query($conn, $sql);
        if ($query) {
            echo json_encode(['message' => 'deleted product successfully']);
        }

        break;
    default:
        http_response_code(405);
        echo json_encode(['error' => 'Method not allowed']);
        break;
}
?>