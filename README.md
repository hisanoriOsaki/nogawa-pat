# 初回のみ実施
```
docker-compose up -d --build
```

```
docker-compose run --rm wpcli bash
```

### インストーラー実行
```
sh /tmp/wp-install.sh
```

[ローカル環境](http://localhost/)にアクセスできれば成功

## ログイン情報
[ログインページ](http://localhost/wp-admin/)
ID: admin
PW: password

# 起動
```
docker compose start
```

# 停止
```
docker compose stop
```

# 完全削除
```
docker compose down --rmi all --volumes --remove-orphans
```