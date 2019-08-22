#!/usr/bin/env bash

#pwd=$(cd `dirname $0`;pwd)
pwd=$(cd $(dirname $0); pwd)


output="$pwd/output"
proto="$pwd/proto"

rm -rf $output/*
rm -rf $pwd/Pb_Go

mkdir -p $output/php $output/go
mkdir -p $pwd/Pb_Go

cd $proto
protoc --go_out=plugins=grpc:$pwd/Pb_Go/ --php_out=$output/php --grpc_out=$output/php --plugin=protoc-gen-grpc=/usr/local/bin/grpc_php_plugin *.proto

cd $output/php

mv GPBMetadata Sample/Model/

find ./ -name '*.php' -exec sed -i "" -e 's#GPBMetadata#Sample\\Model\\GPBMetadata#g' -e 's#\\Sample\\Model\\GPBMetadata\\Google#\\GPBMetadata\\Google#g' {} \;

cd -

echo "done"