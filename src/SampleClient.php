<?php

namespace GrpcClient\Sample;

use DateTime;
use Google\Protobuf\Timestamp;
use Sample_proto\Sample\SampleRequest;
use Sample_proto\Sample\SampleServiceClient;
use const Grpc\STATUS_OK;

function callSampleRpc(string $id)
{
    $client = new SampleServiceClient('localhost:50051', ['credentials' => \Grpc\ChannelCredentials::createInsecure()]);

    $req = new SampleRequest();
    $req->setId($id);

    $pbTime = new Timestamp;
    $pbTime->fromDateTime(new DateTime());

    [$res, $status] = $client->SampleRpc($req)->wait();

    if ($status->code !== STATUS_OK) {
        throw new APIException($status);
    }

    // Any 型を 扱う前に Any でラップした型のオブジェクトを生成するか対応するメタデータクラスの initOnce() を呼ぶ必要がある
    // https://github.com/protocolbuffers/protobuf/issues/7509
    \GPBMetadata\Proto\Sample::initOnce();
    $unpack = $res->getExtension()->unpack();
}
