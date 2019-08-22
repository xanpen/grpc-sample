<?php
/**
 * Created by PhpStorm.
 * User: wangxianpeng
 * Date: 2019-08-22
 * Time: 14:05
 */

use Sample\Model\User;
use Sample\Model\UserList;

ini_set('display_errors', true);
error_reporting(E_ALL);

require_once 'autoload.php';

$user = new User();
$user->setId(6596)->setName("wangxp");

$client = new \Sample\Model\GreeterServiceClient('192.168.21.186:50051', [
    'credentials' => \Grpc\ChannelCredentials::createInsecure()
]);

list($reply, $status) = $client->sayHello($user)->wait();

if (!$reply) {
    echo json_encode($status);
    return;
}

//序列化为string
echo $reply->serializeToJsonString(true) . PHP_EOL;
echo $reply->getErrCode() . PHP_EOL; //errCode
echo $reply->getErrMsg() . PHP_EOL; //errMsg
//data
foreach ($reply->getData() as $key => $value) {
    echo $key . "-" . $value . PHP_EOL;
}
