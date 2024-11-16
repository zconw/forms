<?php
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $data = json_decode(file_get_contents('../database.json'), true);
    
    foreach($data as $key => $item) {
        if($item['authorizationNumber'] === $id) {
            unset($data[$key]);
            break;
        }
    }
    
    file_put_contents('../database.json', json_encode(array_values($data), JSON_PRETTY_PRINT));
    
    header('Location: ../curd');
}
?>
