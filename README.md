# wordpress のテーマ基底

## 使い方

```bash
# プロジェクトを配置したい親ディレクトリへ移動
cd /path/to/projects-dir

# git pull でインストール
git pull hoge

# 自由に改名
mv wordpress_theme_base dirNameYouWant

# code で開く
code dirNameYouWant

# node_modules をインストール
bun i
```

---

## ここまでの手順(実行済み)

### ディレクトリ・ファイル作成

```bash
mkdir {assets,assets/src,assets/css,assets/imgs}
touch .gitignore functions.php index.php 404.php header.php footer.php assets/css/style.css assets/src/main.js
echo "/*
Theme Name: wordpress-theme-base
Author: keijiek
Author URI: https://keijiek.com
Description: Incomplete empty theme, but basic settings, etc. are given.
Version: 0.0.1
Requires at least: 6.7
Tested up to: 6.7
Requires PHP: 8.2
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/" > ./style.css
```

### git 関係

### node modules
