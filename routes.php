<?php
require_once 'controllers/ProductController.php';
require_once 'controllers/CategoryController.php';

// Get the requested URI and action
$requestUri = $_SERVER['REQUEST_URI'];
$action = $_GET['action'] ?? 'index';

// Determine the controller based on the URL
if (strpos($requestUri, '/Product') !== false) {
    $controller = new ProductController();
} elseif (strpos($requestUri, '/Category') !== false) {
    $controller = new CategoryController();
} else {
    // Handle the case where neither route is matched
    http_response_code(404);
    echo "Page not found.";
    exit;
}

// Execute the action
try {
    switch ($action) {
        case 'index':
            $controller->index();
            break;
        case 'show':
            $controller->show($_GET['id'] ?? null);
            break;
        case 'create':
            $controller->create();
            break;
        case 'store':
            $controller->store($_POST['name'] ?? '', $_POST['price'] ?? '', $_POST['quantity'] ?? '');
            break;
        case 'edit':
            $controller->edit($_GET['id'] ?? null);
            break;
        case 'update':
            $controller->update($_GET['id'] ?? null, $_POST['name'] ?? '', $_POST['price'] ?? '', $_POST['quantity'] ?? '');
            break;
        case 'delete':
            $controller->delete($_GET['id'] ?? null);
            break;
        default:
            $controller->index();
            break;
    }
} catch (Exception $e) {
    // Handle unexpected errors gracefully
    http_response_code(500);
    echo "An error occurred: " . $e->getMessage();
}
