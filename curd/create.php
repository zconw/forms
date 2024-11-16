<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('../database.json'), true);

    $newData = array(
        "authorizationNumber" => $_POST['authorizationNumber'],
        "website" => $_POST['website'],
        "number" => count($data) + 1,
        "approver" => $_POST['approver'],
        "approvalDate" => $_POST['approvalDate'],
        "remarks" => $_POST['remarks'],
        "phoneNumber" => $_POST['phoneNumber'],
        "email" => $_POST['email'],
        "internalLink" => $_POST['internalLink']
    );

    $data[] = $newData;
    
    file_put_contents('../database.json', json_encode($data, JSON_PRETTY_PRINT));
    
    header('Location: ../curd');
}
?>
