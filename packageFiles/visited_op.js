// 新增公共请求函数
async function fetchCount(url) {
    try {
        const response = await fetch(url);
        if (!response.ok) {
            throw new Error(`HTTP错误: ${response.status}`);
        }
        const data = await response.json();
        if (data.success) {
            return data.count;
        } else {
            throw new Error(data.error || '操作失败');
        }
    } catch (error) {
        console.error('请求出错:', error);
        throw error;
    }
}

// 简化原有函数
async function visited_increase() {
    return fetchCount('visited_increaser.php');
}

async function visited_read() {
    return fetchCount('visited_reader.php');
}