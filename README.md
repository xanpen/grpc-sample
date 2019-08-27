# macOS grpc-sample

式例基于grpc框架包含内容如下：
1. 一个golang实现的rpc service
2. 一个golang的单元测试
3. 一个php实现的client

--- 
## 安装

- 使用homebrew安装protobuf编译器和其他支持的语言的proto插件

```bash
brew tap grpc/grpc
brew install grpc
```

- 安装结果如下

```bash
ls /usr/local/bin/protoc
/usr/local/bin/protoc

ls /usr/local/bin/grpc_*
/usr/local/bin/grpc_cli			/usr/local/bin/grpc_node_plugin		/usr/local/bin/grpc_python_plugin
/usr/local/bin/grpc_cpp_plugin		/usr/local/bin/grpc_objective_c_plugin	/usr/local/bin/grpc_ruby_plugin
/usr/local/bin/grpc_csharp_plugin	/usr/local/bin/grpc_php_plugin
```

- golang官网安装（https://golang.google.cn/）或者 `brew install go`;环境变量设置下:

```bash
cat ~/.bash_profile

export PATH=$PATH:$(go env GOPATH)/bin
export GOPATH=$(go env GOPATH)
export GOBIN=$(go env GOPATH)/bin
export GOPROXY=https://goproxy.io
export GO111MODULE=on
export CGO_ENABLED=0

```

- php扩展安装，自行修改php.ini文件

```bash
pecl install protobuf
pecl install grpc

#安装结果查看
php --ri gprc
php --ri protobuf

```

- php gprc库安装

```bash
cd tests
composer install
cd ..

``` 
    
## 初始化

```bash
sh ./pb.sh
 
```
## 运行

```bash
go mod tidy
go run main.go

```

## 运行单元测试
```bash
go test -v client_test.go

```

## 运行php client
```bash
php tests/clinet_test.php 

```
