const mysql = require('mysql');

// 创建数据库连接
const connection = mysql.createConnection({
  host: 'root',      // 数据库主机名
  user: 'root@localhost',   // 数据库用户名
  password: '',   // 数据库密码
  database: 'sci'   // 数据库名称
});

// 连接到数据库
connection.connect((err) => {
  if (err) {
    console.error('数据库连接失败：', err);
  } else {
    console.log('数据库连接成功！');
  }
});

// 执行查询等操作...
// ...

// 关闭数据库连接
connection.end();
