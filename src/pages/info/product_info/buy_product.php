<?php
if (!isset($_SESSION))
    session_start();

require_once('../../../core/config.php');
header('Content-Type: application/json');

if ($_SESSION['local_id'] == "") {
    echo json_encode(['error' => 'not login']);
    exit();
}

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        // $stmt = $pdo->query('SELECT * FROM books');
        // $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // echo json_encode($result);
        break;
    case 'POST':
        $data = json_decode(file_get_contents('php://input'), true);
        $title = $data['order_buy'];

        $sql = "INSERT INTO order_fish (fish_name, fish_type, fish_price, order_id, order_date, order_by, order_status) 
                VALUES ('" . $fish_result["fish_name"] . "',
                '" . $_POST["fish_type"] . "',
                '" . $fish_result["fish_price"] . "',
                '" . $result["id"] . "',
                '" . date("Y-m-d") . "',
                '" . $result["name"] . " " . $result["lastname"] . "',
                '0')";

        $query = mysqli_query($conn, $sql);

        if ($query) {
            echo json_encode(['message' => 'Book added successfully']);
        } else {
            echo json_encode(['error' => 'fail to buy product']);
        }


        break;
    case 'PUT':
        // parse_str(file_get_contents('php://input'), $data);
        // $id = $data['id'];
        // $title = $data['title'];
        // $author = $data['author'];
        // $published_at = $data['published_at'];

        // $stmt = $pdo->prepare('UPDATE books SET title=?, author=?, published_at=? WHERE id=?');
        // $stmt->execute([$title, $author, $published_at, $id]);

        // echo json_encode(['message' => 'Book updated successfully']);
        break;
    case 'DELETE':
        break;
    default:
        http_response_code(405);
        echo json_encode(['error' => 'Method not allowed']);
        break;
}
?>