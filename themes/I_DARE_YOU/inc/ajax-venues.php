<?php
// 로그인 상태 시 ajax action - wp_ajax_{action}
add_action('wp_ajax_get_venues', 'get_venues_callback');
// 로그아웃 상태 시 ajax action - wp_ajax_nopriv_{action}
add_action('wp_ajax_nopriv_get_venues', 'get_venues_callback');

if(!function_exists('get_venues_callback')){
	function get_venues_callback(){
		get_posts_venues_data($_POST['id']);
		die();
	}
}

if(!function_exists('get_posts_venues_data')){
	function get_posts_venues_data($venue_id){
		$venue = get_post($venue_id);
		$venue_status = $venue->post_status;
		$venue_link = get_permalink($venue_id);
		$venue_posts = get_field('post', $venue_id);
		$venue_title = get_field('title', $venue_id);
		$venue_maps = get_field('map', $venue_id);
		$venue_map_lat = $venue_maps['lat'];
		$venue_map_lng = $venue_maps['lng'];
		$_venue_map = array(
			'name'  => $venue_title,
			'lat'   => $venue_map_lat,
			'lng'   => $venue_map_lng
		);
		$venue_data = array(
			'id'    => $venue_id,
			'status'    => $venue_status,
			'title' => $venue_title,
			'maps'  => $_venue_map
		);
		$data = array(
			'data'  => $venue_data
		);
		header("Content-type: application/json");
		echo json_encode($data);
	}
}
?>