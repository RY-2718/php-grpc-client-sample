<?php
// GENERATED CODE -- DO NOT EDIT!

namespace Sample_proto\Sample;

/**
 */
class SampleServiceClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * @param \Sample_proto\Sample\SampleRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function SampleRpc(\Sample_proto\Sample\SampleRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/sample_proto.sample.SampleService/SampleRpc',
        $argument,
        ['\Sample_proto\Sample\SampleResponse', 'decode'],
        $metadata, $options);
    }

}
