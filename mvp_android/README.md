# 基于shadowsocks的管理系统

### 关于 About

本版本为shadowsocks android版的纯java版本


代码多整理自 [smartproxy](https://github.com/hedaode/SmartProxy) 和 [shadowsocks-java](https://github.com/blakey22/shadowsocks-java)
Most code is merged from [smartproxy](https://github.com/hedaode/SmartProxy) and [shadowsocks-java](https://github.com/blakey22/shadowsocks-java)

```
ss://method:password@host:port
ss://base64encode(method:password@host:port)
```
其中代码保留了SmartProxy对http(s)代理的支持, 使用时将配置链接填写标准http(s)代理格式即可.
And also it inherited the support of http(s) proxy from Smartproxy , Set the url as stardand http(s) proxy format when use it. 
http(s)代理格式
http(s)proxy foramt:
```
http(s)://(username:passsword)@host:port
```
支持的加密类型：
Support methods of encryption:

```
bf-cfb
seed-cfb
aes-128-cfb
aes-192-cfb
aes-256-cfb
aes-128-ofb
aes-192-ofb
aes-256-ofb
camellia-128-cfb
camellia-192-cfb
camellia-256-cfb
```
#### LICENSE
[Apache License](./LICENSE)
