<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('../database.json'), true);
    
    $id = $_POST['authorizationNumber'];
    
    foreach($data as $key => $item) {
        if($item['authorizationNumber'] === $id) {
            $data[$key]['website'] = $_POST['website'];
            $data[$key]['approver'] = $_POST['approver'];
            $data[$key]['approvalDate'] = $_POST['approvalDate'];
            $data[$key]['remarks'] = $_POST['remarks'];
            $data[$key]['phoneNumber'] = $_POST['phoneNumber'];
            $data[$key]['email'] = $_POST['email'];
            $data[$key]['internalLink'] = $_POST['internalLink'];
            break;
        }
    }
    
    file_put_contents('../database.json', json_encode($data, JSON_PRETTY_PRINT));
    
    header('Location: ../curd');
}
?>