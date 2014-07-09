<?php

$timebeforerevote = 1;

add_action('wp_ajax_noPriv_themeloy_post_rating', 'themeloy_post_rating');
add_action('wp_ajax_themeloy_post_rating', 'themeloy_post_rating');

add_action( 'wp_enqueue_scripts', 'themeloy_rating_enqueue_script' );

function themeloy_rating_enqueue_script() {	
	wp_enqueue_script('post_rating', get_template_directory_uri().'/js/post_rating.js', array('jquery'), '1', true );
	wp_localize_script('post_rating', 'ajax_var', array(
	'url' => admin_url('admin-ajax.php'),
	'nonce' => wp_create_nonce('ajax-nonce')
));



}



function themeloy_post_rating()
{
	$nonce = $_POST['nonce'];
 
    if ( ! wp_verify_nonce( $nonce, 'ajax-nonce' ) )
        die ( '');
		
	if(isset($_POST['post_id']))
	{
		$ip = $_SERVER['REMOTE_ADDR'];
		$post_id = absint($_POST['post_id']);
		$user_review = absint($_POST['user_review']);
		
		$meta_IP = get_post_meta($post_id, "voted_IP");

		$voted_IP = (isset($meta_IP[0]))?  $meta_IP[0]: '';
		if(!is_array($voted_IP)) { $voted_IP = array(); }
		
		
		$meta_count = get_post_meta($post_id, "votes_count", true );
		
		
		if(!themeloy_hasvoted($post_id))
		{
			
			$voted_IP[$ip] = time(); 
			update_post_meta($post_id, "voted_IP", $voted_IP);
			update_post_meta($post_id, "votes_count", ++$meta_count);
			$old_review = get_post_meta($post_id, "user_review", true);
			if(isset($old_review)) {
				$user_review  += $old_review;
			}
			update_post_meta($post_id,"user_review", $user_review);			
			
			
			$user_review = get_post_meta($post_id,'user_review', true );
			$total_value = $user_review / $meta_count;

			echo number_format($total_value, 2);
		} else { echo 0; }		
			
	}
	
	exit;
}

function themeloy_get_user_review($post_id)
{
	 $user_review = absint(get_post_meta($post_id,'user_review', true ));
	 $user_vote = absint(get_post_meta($post_id, "votes_count", true ));
	 if($user_vote == 0) { $total_score = 0; }else 
	 { $total_score = $user_review / $user_vote; }
	 return number_format($total_score, 2);
}

function themeloy_hasvoted($post_id)
{
	global $timebeforerevote;

	$meta_IP = get_post_meta($post_id, "voted_IP");
	$voted_IP = (isset($meta_IP[0]))?  $meta_IP[0]: '';
	if(!is_array($voted_IP)) { $voted_IP = array(); }
	
	$ip = $_SERVER['REMOTE_ADDR'];
	
	if(in_array($ip, array_keys($voted_IP)))
	{
		$time = $voted_IP[$ip];
		$now = time();
		
		if(round(($now - $time) / 60) > $timebeforerevote) {
			return true;
		}
			
		return true;
	}
	
	return false;
}

function themeloy_vote_response($post_id)
{
	$vote_count = get_post_meta($post_id, "votes_count", true);
	$output = '';
	if(themeloy_hasvoted($post_id)) {
			$output = 1;
	} else {
			$output = 0;
	}
	
	return $output;
}