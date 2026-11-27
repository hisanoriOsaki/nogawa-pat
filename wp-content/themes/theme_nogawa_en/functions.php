<?php
//概要の指定
function custom_excerpt_length($length) {   
    return 80;
}   
add_filter('excerpt_length', 'custom_excerpt_length');
function new_excerpt_more($more) {
    return ' ... ';
}
add_filter('excerpt_more', 'new_excerpt_more');


//固定ページに「P」タグ挿入無効
add_filter('the_content', 'wpautop_filter', 9);
function wpautop_filter($content) {
    global $post;
    $remove_filter = false;
     
    $arr_types = array('page'); //autopを無効にする投稿タイプを配列として用意する
    $post_type = get_post_type( $post->ID );
    if (in_array($post_type, $arr_types)) $remove_filter = true;
     
    if ( $remove_filter ) {
        remove_filter('the_content', 'wpautop');
        remove_filter('the_excerpt', 'wpautop');
    }
     
    return $content;
}

//親スラッグ取得
function is_parent_slug() {
	global $post;
	if ($post->post_parent) {
		$post_data = get_post($post->post_parent);
		return $post_data->post_name;
	}
}

//wp_head簡素化
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

// アーカイブ表記に「年」を追加
function my_archives_link($html){
if(preg_match('/[0-9]+?<\/a>/', $html))
$html = preg_replace('/([0-9]+?)<\/a>/', '$1年</a>', $html);
if(preg_match('/title=[\'\"][0-9]+?[\'\"]/', $html))
$html = preg_replace('/(title=[\'\"][0-9]+?)([\'\"])/', '$1年$2', $html);
return $html;
}
add_filter('get_archives_link', 'my_archives_link', 10);



/* contactform7 仮名バリデーション */
function custom_wpcf7_validate_kana($result,$tag)
{
    $tag   = new WPCF7_Shortcode($tag);
    $name  = $tag->name;
    $value = isset($_POST[$name]) ? trim(wp_unslash(strtr((string) $_POST[$name], "\n", " "))) : "";

    //全角カタカナ又は平仮名の入力チェック
    if ($name === "kana") {
        if(!preg_match("/^[ア-ヶーぁ-ん]+$/u", $value)) {
            $result->invalidate( $tag,"全角カタカナ又は平仮名で入力してください。");
        }
    }
    return $result;
}
add_filter('wpcf7_validate_text', 'custom_wpcf7_validate_kana', 11, 2);
add_filter('wpcf7_validate_text*', 'custom_wpcf7_validate_kana', 11, 2);

function wpcf7_validate_email_filter_confrim( $result, $tag ) {
    $type = $tag['type'];
    $name = $tag['name'];
    if ( 'email' == $type || 'email*' == $type ) {
        if (preg_match('/(.*)_confirm$/', $name, $matches)){ //確認用メルアド入力フォーム名を ○○○_confirm としています。
            $target_name = $matches[1];
                $posted_value = trim( (string) $_POST[$name] ); //前後空白の削除
                $posted_target_value = trim( (string) $_POST[$target_name] ); //前後空白の削除
            if ($posted_value != $posted_target_value) {
                $result->invalidate( $tag,"確認用のメールアドレスが一致していません");
            }
        }
    }
    return $result;
}
add_filter( 'wpcf7_validate_email', 'wpcf7_validate_email_filter_confrim', 11, 2 );
add_filter( 'wpcf7_validate_email*', 'wpcf7_validate_email_filter_confrim', 11, 2 );

// Contact Form 7で自動挿入されるPタグ、brタグを削除
add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
function wpcf7_autop_return_false() {
  return false;
}

// 固定ページ切り替えなし
function disable_visual_editor_in_page(){
global $typenow;
if( $typenow == 'page' ){
add_filter('user_can_richedit', 'disable_visual_editor_filter');
}
}
function disable_visual_editor_filter(){
return false;
}
add_action( 'load-post.php', 'disable_visual_editor_in_page' );
add_action( 'load-post-new.php', 'disable_visual_editor_in_page' );


// 画像取得
function catch_that_image() {
    global $post, $posts;
    $first_img = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    $first_img = $matches [1] [0];
  
    if(empty($first_img)){
        // 記事内で画像がなかったときのためのデフォルト画像を指定
        $first_img = "/images/default.jpg";
    }
    return $first_img;
}

//アイキャッチ画像
add_theme_support('post-thumbnails');

//カテゴリー説明の出力からPタグ外す
remove_filter('term_description','wpautop');


/*最上位親ページの取得*/
function get_page_parent( $parent_id , $object = true , $root = true ) {
     
    //parent_idが0の場合何もしない
    if( $parent_id == false ) {
        return false;
    }
 
    if( $object == true ) { //返り値がpostオブジェクト
         
        while( $parent_id ) {
            $page = get_post( $parent_id );
            $result[] = $page;
            $parent_id = $page->post_parent;
        }
         
    } else { //返り値がpostID
         
        while( $parent_id ) {
            $page_id = get_post_field( 'post_parent' , $parent_id );
            $result[] = $parent_id;
            $parent_id = $page_id;   
        }
         
    }
 
    //配列を逆順に(rootを0に)
    $result = array_reverse( $result );
     
    //rootがtureの場合0番目(rootページのみ)をセット
    if( $root == true) {
        $result = $result[0];  
    }
 
    return $result;
}

//wp-block-library-css削除
function dequeue_plugins_style() {
    wp_dequeue_style('wp-block-library');
}
add_action( 'wp_enqueue_scripts', 'dequeue_plugins_style', 9999);


//固定ページ（クラシックエディタ）を使う設定
add_filter( 'use_block_editor_for_post_type', 'hide_block_editor', 10, 10 );
function hide_block_editor( $use_block_editor, $post_type ) {
if ( $post_type === 'page' ) return false;
return $use_block_editor;
}

/* パスワード保護ページの「保護中:」を消す */
add_filter('protected_title_format', 'remove_protected');
function remove_protected($title) {
       return '%s';
}

if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title' => '基本設定', // ページタイトル
        'menu_title' => '基本設定', // メニュータイトル
        'menu_slug' => 'option',
        'capability' => 'edit_posts',
        'redirect' => false
    ));
    acf_add_options_page(array(
      'page_title' => '採用情報', // ページタイトル
      'menu_title' => '採用情報', // メニュータイトル
      'menu_slug' => 'option1',
      'capability' => 'edit_posts',
      'redirect' => false
  ));
}