# !/bin/bash

set -ex;
INSTALLDIR=/var/www/html
SITE_URL="http://localhost"

if ! wp core is-installed --network; then
    wp core multisite-install \
        --url="${SITE_URL}" \
        --title='野川特許事務所（local）_ja' \
        --admin_user=admin \
        --admin_password=password \
        --admin_email=hoge@fuga.com \
        --allow-root \
        --path=${INSTALLDIR}
else
    echo "Multisite already installed. Skipping."
fi

# 日本語言語ファイルのインストール
if ! wp language core is-installed ja; then
    wp language core install ja
fi

# メインサイトを日本語化
wp site switch-language ja \
    --url="${SITE_URL}"

# 英語サイトの作成
SITE_LIST=$(wp site list \
    --url="${SITE_URL}" --field=url)
if ! printf '%s\n' "${SITE_LIST}" | grep -Fxq "${SITE_URL}/en/"; then
    wp site create \
        --slug=en \
        --title='野川特許事務所（local）_en' \
        --url="${SITE_URL}"
else
    echo "English site already exists. Skipping."
fi

wp theme enable theme_nogawa --network
wp theme enable theme_nogawa_en --network

# 日本語サイトのテーマ設定
wp theme activate theme_nogawa \
    --url="${SITE_URL}"

# 英語サイトのテーマ設定
wp theme activate theme_nogawa_en \
    --url="${SITE_URL}/en/"

wp site option update site_name \
    '野川特許事務所（local）'

echo "Installation completed."