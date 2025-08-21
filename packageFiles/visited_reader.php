<?php
header('Content-Type: application/json; charset=utf-8');  // 新增响应头
$numf = "./visited_count.num";

// 检查文件是否存在
if (!file_exists($numf)) {
    // 如果文件不存在，返回0
    echo json_encode([
        'success' => true,
        'count' => 0
    ]);
    exit;
}

// 读取当前计数
$content = file_get_contents($numf);
if ($content === false) {
    http_response_code(500);
    echo json_encode(['success' => false, 'error' => '无法读取计数文件']);
    exit;
}

$count = trim($content);
$count = is_numeric($count) ? (int)$count : 0;

// 返回当前计数
echo json_encode([
    'success' => true,
    'count' => $count
]);
exit;
?>
