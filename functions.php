<?php
remove_action('wp_head', 'wp_generator');

// .css ve .js dosyalarını silme
function stil_sil() {
    wp_deregister_style( 'cptchStylesheet' );
    wp_deregister_style( 'codecolorer' );
    wp_deregister_script( 'wp-recentcomments-jquery' );
    wp_deregister_style('grunion.css');
}
add_action('wp_print_styles', 'stil_sil');

function disable_comment_author_links( $author_link ){
 return strip_tags( $author_link );
}
add_filter( 'get_comment_author_link', 'disable_comment_author_links' );

// son yorumlar
function son_yorumlar($limit="5",$kelime_limiti="45",$avatar_boyutu="45",$baslangic_etiket="<li>",$bitis_etiket="</li>") {
global $wpdb;
$sorgu = "SELECT DISTINCT ID, post_title, post_password, comment_ID, comment_post_ID, comment_author, comment_date_gmt, comment_approved, comment_type,comment_author_url, SUBSTRING(comment_content,1,$kelime_limiti) AS com_excerpt FROM $wpdb->comments LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID = $wpdb->posts.ID) WHERE comment_approved = '1' AND comment_type = '' AND post_password = '' ORDER BY comment_date_gmt DESC LIMIT $limit";
$yorumlar = $wpdb->get_results($sorgu);
    foreach ($yorumlar as $yorum) {
    $yorumid = $yorum->ID;
    $yazan = strip_tags($yorum->comment_author);
    $yazi_baslik = strip_tags($yorum->post_title);
    $avatar = get_avatar($yorum, $avatar_boyutu);
    $yorum_icerik = strip_tags($yorum->com_excerpt);
    $yorum_tarihi = get_comment_date('', $yorum->comment_ID );
    echo $baslangic_etiket.'<span style="font-size:11px"><strong><a href="'.get_permalink($yorumid).'" title="">'.$yazi_baslik.'</a></strong> </span><br />' .$yorum_icerik.' '.$bitis_etiket;
    }
}


// yazı okunma sayısı
function getPostViews($postID){
$count_key = 'post_views_count';
$count = get_post_meta($postID, $count_key, true);
if($count==''){
delete_post_meta($postID, $count_key);
add_post_meta($postID, $count_key, '0');
return "0 okunma";
}
return $count.' okunma';
}
function setPostViews($postID) {
$count_key = 'post_views_count';
$count = get_post_meta($postID, $count_key, true);
if($count==''){
$count = 0;
delete_post_meta($postID, $count_key);
add_post_meta($postID, $count_key, '0');
}else{
$count++;
update_post_meta($postID, $count_key, $count);
}
}

// Yazıdaki ilk resmi alma 
function mstfturkgoster() { 
    error_reporting(0); 
    global $post, $posts; 
    $mstfturkbir = ''; 
    ob_start(); 
    ob_end_clean(); 
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches); 
    $mstfturkbir = $matches [1] [0]; 
    if(empty($mstfturkbir)){ //Eğer mstfturk eklememişseniz 
        $mstfturkbir = '//epfarki.com/ep/tanitim/epfarki-com-banner-149-149.jpg'; 
    } 
    return $mstfturkbir; 
} 
function mstfturkgoster_by_post($post) { 
    error_reporting(0); 
    $mstfturkbir = ''; 
    ob_start(); 
    ob_end_clean(); 
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches); 
    $mstfturkbir = $matches [1] [0]; 
    if(empty($mstfturkbir)){ //Eğer mstfturk eklememişseniz 
        $mstfturkbir = '//epfarki.com/ep/tanitim/epfarki-com-banner-149-149.jpg';
    } 
    return $mstfturkbir; 
} 

// Yazıyı kelime sayısınca kısaltma
add_filter('excerpt_length', 'my_excerpt_length');
function my_excerpt_length($len) { return 60; }

// yan menüyü 2 ye bölünmüş olarak kullanma
if (function_exists('register_sidebars')) {
	register_sidebars(2);
}

// Rastgele 10 Yazı
// www.yakuter.com/yakuter-rastgele-yazi-eklentisi
function rastgele_yazi($yazi_sayisi="10") {
    global $wpdb;	
    $sorgu = "SELECT ID, post_title, post_status FROM $wpdb->posts where post_status='publish' ORDER BY RAND() LIMIT 0, $yazi_sayisi";
    $sonuclar = $wpdb->get_results($sorgu);
    foreach ($sonuclar as $sonuc) {
      $cikti .= "<li><a href=\"" . get_permalink($sonuc->ID) . "\" title=\"". $sonuc->post_title ."\">" . $sonuc->post_title ."</a></li>";
    }
    echo $cikti;
}

// ?random veya ?rastgele
// wordpress.org/extend/plugins/random-redirect/
function yazi_yonlendir() {
   global $wpdb;
   $query = "SELECT ID FROM $wpdb->posts WHERE post_type = 'post' AND post_password = '' AND 	post_status = 'publish' ORDER BY RAND() LIMIT 1";
   if ( isset( $_GET['random_cat_id'] ) ) {
      $random_cat_id = (int) $_GET['random_cat_id'];
      $query = "SELECT DISTINCT ID FROM $wpdb->posts AS p INNER JOIN $wpdb->term_relationships AS tr ON (p.ID = tr.object_id AND tr.term_taxonomy_id = $random_cat_id) INNER JOIN  $wpdb->term_taxonomy AS tt ON(tr.term_taxonomy_id = tt.term_taxonomy_id AND taxonomy = 'category') WHERE post_type = 'post' AND post_password = '' AND 	post_status = 'publish' ORDER BY RAND() LIMIT 1";
   }
   if ( isset( $_GET['random_post_type'] ) ) {
      $post_type = preg_replace( '|[^a-z]|i', '', $_GET['random_post_type'] );
      $query = "SELECT ID FROM $wpdb->posts WHERE post_type = '$post_type' AND post_password = '' AND 	post_status = 'publish' ORDER BY RAND() LIMIT 1";
   }
   $random_id = $wpdb->get_var( $query );
   wp_redirect( get_permalink( $random_id ) );
   exit;
}

if ( isset( $_GET['random'] ) )
   add_action( 'template_redirect', 'yazi_yonlendir' );
if ( isset( $_GET['rastgele'] ) )
   add_action( 'template_redirect', 'yazi_yonlendir' );
?>