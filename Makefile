all: run

# イメージのビルド
build:
	docker-compose build

# コンテナ起動
up:
	docker-compose up -d

# コンテナ停止 & 削除
down:
	docker-compose down

# 起動したコンテナに入る
exec:
	docker-compose exec app /bin/bash

# 起動 & 停止時に自動でコンテナなどを削除
run:
	docker-compose run --service-ports --rm app
