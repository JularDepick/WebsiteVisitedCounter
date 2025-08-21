<?php
header('Content-Type: application/json; charset=utf-8');  // 新增响应头
$numf = "./visited_count.num";

// 确保目录存在
$dir = dirname($numf);
if (!is_dir($dir) && !mkdir($dir, 0755, true)) {
    http_response_code(500);
    echo json_encode(['success' => false, 'error' => '无法创建目录']);
    exit;
}

// 检查文件是否存在，不存在则创建并初始化为0
if (!file_exists($numf)) {
    file_put_contents($numf, '0', LOCK_EX);
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

// 计数加1
$count++;

// 写入新计数
$result = file_put_contents($numf, $count, LOCK_EX);

if ($result !== false) {
    echo json_encode([
        'success' => true,
        'count' => $count
    ]);
} else {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'error' => '无法更新计数'
    ]);
}
exit;
?>
