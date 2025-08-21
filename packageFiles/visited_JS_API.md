\# 访问计数器 JS 函数 API 文档



\## 概述

本文档描述用于访问计数器功能的前端 JavaScript 函数接口，包含函数功能、语法、参数、返回值及使用示例，方便开发者进行接口式调用。



\## 函数列表



\### 1. visited\_read()



\#### 功能

获取当前访问计数器的数值（仅读取，不修改计数）



\#### 语法async function visited\_read()

\#### 参数

无参数



\#### 返回值

\- 类型：`Promise<number>`

\- 说明：异步返回当前访问次数的整数数值



\#### 异常

\- 当请求失败时，Promise 会 reject 一个 `Error` 对象

\- 错误信息可通过 `error.message` 获取



\#### 示例// 示例 1: 使用 async/await

try {

&nbsp; const count = await visited\_read();

&nbsp; console.log("当前访问次数:", count);

} catch (error) {

&nbsp; console.error("获取失败:", error.message);

}



// 示例 2: 使用 .then()/.catch()

visited\_read()

&nbsp; .then(count => console.log("当前访问次数:", count))

&nbsp; .catch(error => console.error("获取失败:", error.message));

---



\### 2. visited\_increase()



\#### 功能

更新访问计数器（计数自增1）并返回最新数值



\#### 语法async function visited\_increase()

\#### 参数

无参数



\#### 返回值

\- 类型：`Promise<number>`

\- 说明：异步返回自增后的访问次数整数数值



\#### 异常

\- 当请求失败时，Promise 会 reject 一个 `Error` 对象

\- 错误信息可通过 `error.message` 获取



\#### 示例// 示例 1: 使用 async/await

try {

&nbsp; const newCount = await visited\_increase();

&nbsp; console.log("更新后访问次数:", newCount);

} catch (error) {

&nbsp; console.error("更新失败:", error.message);

}



// 示例 2: 使用 .then()/.catch()

visited\_increase()

&nbsp; .then(newCount => console.log("更新后访问次数:", newCount))

&nbsp; .catch(error => console.error("更新失败:", error.message));

\## 使用说明



\### 引入方式

需在页面中引入包含这些函数的 JS 文件：<script src="visited\_op.js"></script>

\### 调用条件

\- 浏览器需支持 ES6 及以上语法（主流现代浏览器均支持）

\- 函数需在 DOM 加载完成后调用（建议放在 `DOMContentLoaded` 事件中）



\### 注意事项

1\. 所有函数均为异步函数，必须使用 `await` 或 `.then()` 处理返回结果

2\. `visited\_increase()` 调用会使计数永久增加，需根据业务场景合理使用

3\. 确保 JS 文件路径正确，否则会导致函数未定义错误

4\. 若出现跨域问题，需后端配合配置 CORS 策略



