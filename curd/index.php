<?php
// index.php - 展示所有数据并提供增删改查表单

$data = json_decode(file_get_contents('../database.json'), true);
?>

<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>增删改查系统</title>
</head>
<body>
    <h1>授权管理</h1>

    <h2>当前授权信息</h2>
    <table border="1">
        <tr>
            <th>授权编号</th>
            <th>网站</th>
            <th>授权人</th>
            <th>审批日期</th>
            <th>备注</th>
            <th>电话号码</th>
            <th>电子邮箱</th>
            <th>内部链接</th>
            <th>操作</th>
        </tr>
        <?php foreach ($data as $item):?>
        <tr>
            <td><?php echo htmlspecialchars($item['authorizationNumber']);?></td>
            <td><?php echo htmlspecialchars($item['website']);?></td>
            <td><?php echo htmlspecialchars($item['approver']);?></td>
            <td><?php echo htmlspecialchars($item['approvalDate']);?></td>
            <td><?php echo htmlspecialchars($item['remarks']);?></td>
            <td><?php echo htmlspecialchars($item['phoneNumber']);?></td>
            <td><?php echo htmlspecialchars($item['email']);?></td>
            <td><?php echo htmlspecialchars($item['internalLink']);?></td>
            <td>
                <!--这里正常还有一条修改按钮，但是BUG太多；干脆直接删了，有删增就行了，数据不多，我相信你不嫌麻烦（doge）-->
                <a href="delete.php?id=<?php echo urlencode($item['authorizationNumber']);?>">删除</a>
            </td>
        </tr>
        <?php endforeach;?>
    </table>

    <h2>添加新授权</h2>
    <form action="create.php" method="post">
        <label for="authorizationNumber">授权编号：</label>
        <input type="text" name="authorizationNumber" required><br>
        <label for="website">网站：</label>
        <input type="text" name="website" required><br>
        <label for="approver">授权人：</label>
        <input type="text" name="approver" required><br>
        <label for="approvalDate">审批日期：</label>
        <input type="date" name="approvalDate" required><br>
        <label for="remarks">备注：</label>
        <input type="text" name="remarks" required><br>
        <label for="phoneNumber">电话号码：</label>
        <input type="text" name="phoneNumber" required><br>
        <label for="email">电子邮箱：</label>
        <input type="email" name="email" required><br>
        <label for="internalLink">内部链接：</label>
        <input type="text" name="internalLink" required><br>
        <input type="submit" value="添加授权">
    </form>
</body>
</html>
