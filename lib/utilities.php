<?php
function get_ID_by_slug($page_slug) {
	$page = get_page_by_path($page_slug);
	if ($page) {
		return $page->ID;
	} else {
		return null;
	}
}

function youtube_to_embed ($url) {
	$string     = $url;
	$search     = '/youtube\.com\/watch\?v=([\s\S]+)/smi';
	$replace    = "youtube.com/embed/$1";    
	$url = preg_replace($search,$replace,$string);
	return $url;
}
?>