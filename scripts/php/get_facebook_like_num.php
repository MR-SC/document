<?php
function get_fb_likes($url)
{
	$query = "select total_count,like_count,comment_count,share_count,click_count from link_stat where url='{$url}'";
	$call = "https://api.facebook.com/method/fql.query?query=" . rawurlencode($query) . "&format=json";

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $call);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$output = curl_exec($ch);
	curl_close($ch);
	return json_decode($output);
}

$fb_likes = reset( get_fb_likes("http://www.cnn.com") );
echo $fb_likes->total_count;
echo $fb_likes->like_count;
echo $fb_likes->comment_count;
echo $fb_likes->share_count;
echo $fb_likes->click_count;
?>
