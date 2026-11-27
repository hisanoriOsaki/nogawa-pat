# 初回のみ実施
docker-compose up -d --build

## ログイン
docker-compose run --rm wpcli bash

## インストーラー実行
sh /tmp/wp-install.sh

# 起動
docker compose start

# 停止
docker compose stop

# 完全削除
docker compose down --rmi all --volumes --remove-orphans