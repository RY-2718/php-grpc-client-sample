build:
	docker-compose build

test:
	docker-compose run test
	docker-compose down

sh:
	docker-compose run test sh

generate-proto:
	rm -rf src/Protobuf
	mkdir -p src/Protobuf
	docker-compose run protoc /usr/bin/protoc \
	-I .:proto/third_party \
	--plugin=protoc-gen-grpc=/usr/local/bin/grpc_php_plugin \
	--php_out=src/Protobuf \
	--grpc_out=src/Protobuf \
	proto/sample.proto

update-third_party:
	mkdir -p proto/third_party
	rm -rf proto/third_party/*
	protodep up --force --use-https