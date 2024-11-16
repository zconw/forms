<?php
header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // 获取 JSON 数据
    $jsonData = file_get_contents('php://input');
    $newEntry = json_decode($jsonData, true);

    // 指定你的 JSON 文件路径
    $filePath = 'database.json';

    // 读取当前数据
    if (file_exists($filePath)) {
        $currentData = json_decode(file_get_contents($filePath), true);
    } else {
        $currentData = [];
    }

    // 将新数据添加到当前数据中
    $currentData[] = $newEntry;

    // 将更新后的数据写回 JSON 文件
    if (file_put_contents($filePath, json_encode($currentData, JSON_PRETTY_PRINT))) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "message" => "无法写入文件"]);
    }
} else {
    echo json_encode(["success" => false, "message" => "请求方法不正确"]);
}
