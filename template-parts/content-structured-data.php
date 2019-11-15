<?php
/**
 * Structured data in JSON+LD format for use in header.php
 *
 * 
 *
 * @package starchas3r_
 * @since starchas3r_ 1.0
 */
function modify_array_indexed( $array_in ){
	$array_out = array();
	for( $i = 0; $i < count( $array_in ); $i++ ){
		array_push( $array_out, array( 'schema_value' => $array_in[ $i ], 'is_recursive' => false ) );
	}
	if ( count( $array_out ) > 0 ){
		return $array_out;
	} else {
		return false;
	}
}

$site_sameas_array_raw = retrieve_social_links( 'jsonld' );
$site_sameas_array = modify_array_indexed( $site_sameas_array_raw );


function set_schema_value_indexed( $key_value, $is_recursive ){
	if ( ( strlen( $key_value ) > 0 ) && $is_recursive ){
		return $key_value;
	} elseif ( ( strlen( $key_value ) > 0 ) ){
		return "\"" . str_replace( '"', '\\"' , str_replace( '\\', '\\\\', $key_value ) ) . "\"";
	} else {
		return false;
	}
}


function set_schema_array_indexed( $array_in ){
	$temp_array = array();
	$output = '';
	for( $i = 0; $i < count( $array_in ); $i++ ){
		$current_schema_entry = $array_in[ $i ];
		$current_schema_value = $current_schema_entry[ 'schema_value' ];
		$current_recursive_bool = $current_schema_entry[ 'is_recursive' ];
		if( strlen( $current_schema_value ) > 0 ){
			array_push( $temp_array, set_schema_value_indexed( $current_schema_value, $current_recursive_bool ) );
		}
	}
	$output_count = count( $temp_array );
	if ( $output_count > 0 ){
		$output .= "[";
		for( $i = 0; $i < $output_count; $i++ ){
			if ( $i == $output_count - 1 ){
				$output .= $temp_array[ $i ] . "]";
			} else {
				$output .= $temp_array[ $i ] . ",";
			}
		}
		return $output;
	} else {
		return false;
	}
}

function set_schema_value_associative( $key_name, $key_value, $is_recursive ){
	if ( ( strlen( $key_value ) > 0 ) && $is_recursive ){
		return "\"" . $key_name . "\": " . $key_value;
	}
	elseif ( ( strlen( $key_value ) > 0 ) ){
		return "\"" . $key_name . "\": \"" . str_replace( '"', '\\"' , str_replace( '\\', '\\\\', $key_value ) ) . "\"";
	} else {
		return false;
	}
}

function set_schema_array_associative( $array_in ){
	$array_in_keys = array_keys( $array_in );
	$temp_array = array();
	$output = '';
	foreach( $array_in_keys as $array_elem ){
		$current_schema_entry = $array_in[ $array_elem ];
		if( strlen( $current_schema_entry[ 'schema_value' ] ) > 0 ){
			array_push( $temp_array, set_schema_value_associative( $array_elem, $current_schema_entry[ 'schema_value' ], $current_schema_entry[ 'is_recursive' ], $new_indent ) );
		}
	}
	$output_count = count( $temp_array );
	if ( $output_count > 0 ){
		$output .= "{";
		for( $i = 0; $i < $output_count; $i++ ){
			if ( $i == $output_count - 1 ){
				$output .= $temp_array[ $i ] . "}";
			} elseif ( strlen( $temp_array[ $i ] ) > 0 ) {
				$output .= $temp_array[ $i ] . ",";
			}
		}
		return $output;
	} else {
		return false;
	}
}

function display_schema( $array_in_raw ){
	$display_array_output = set_schema_array_associative( $array_in_raw );
	if ( $display_array_output ){
		return "<script type=\"application/ld+json\">" . $display_array_output . "</script>";
	} else {
		return "";
	}
}

$website_schema_raw_homepage = array(
	'@context'			=>			array(
		'schema_value'		=>		'https://schema.org',
		'is_recursive'		=>		false
	),
	'@type'				=>			array(
		'schema_value'		=>		'WebSite',
		'is_recursive'		=>		false
	),
	'name'				=>			array(
		'schema_value'		=>		get_bloginfo( 'name' ),
		'is_recursive'		=>		false
	),
	'url'				=>			array(
		'schema_value'		=>		esc_url( get_bloginfo( 'wpurl' ) ),
		'is_recursive'		=>		false
	),
	'sameAs'				=>		array(
		'schema_value'		=>		set_schema_array_indexed( $site_sameas_array ),
		'is_recursive'		=>		true
	)

);

$oldest_post_args = array(
	'numberposts'	=>	1,
	'orderby'		=>	'date',
	'order'			=>	'ASC',
	'post_type'		=>	'post',
	'post_status'	=>	'publish'
);
$oldest_post_array = get_posts( $oldest_post_args );
$oldest_post_id = $oldest_post_array[0]->ID;
$oldest_user_array_raw = get_users( array( 'fields' => array( 'ID' ) ) );
$oldest_user_array = array();
for( $i = 0; $i < count( $oldest_user_array_raw ); $i++ ){
	array_push( $oldest_user_array, $oldest_user_array_raw[ $i ]->ID );
}

$blog_schema_raw_homepage = array(
	'@context'			=>			array(
		'schema_value'		=>		'https://schema.org',
		'is_recursive'		=>		false
	),
	'@type'				=>			array(
		'schema_value'		=>		'Blog',
		'is_recursive'		=>		false
	),
	'name'				=>			array(
		'schema_value'		=>		get_bloginfo( 'name' ),
		'is_recursive'		=>		false
	),
	'url'				=>			array(
		'schema_value'		=>		esc_url( get_bloginfo( 'wpurl' ) ),
		'is_recursive'		=>		false
	),
	'sameAs'			=>		array(
		'schema_value'		=>		set_schema_array_indexed( $site_sameas_array ),
		'is_recursive'		=>		true
	),
	'mainEntityOfPage'	=>		array(
		'schema_value'		=>		set_schema_array_associative( $website_schema_raw_homepage ),
		'is_recursive'		=>		true
	),
	'dateCreated'		=>		array(
		'schema_value'		=>		date( "Y-m-d", strtotime( get_the_author_meta( 'user_registered', min( $oldest_user_array ) ) ) ),
		'is_recursive'		=>		false
	),
	'dateModified'		=>			array(
		'schema_value'		=>		get_post_time( 'Y-m-d', true ),
		'is_recursive'		=>		false
	),
	'datePublished'		=>			array(
		'schema_value'		=>		get_the_date( 'Y-m-d', $oldest_post_id ),
		'is_recursive'		=>		false
	)

);

function get_publisher_logo_schema(){
	return array(
		'@context'			=>		array(
			'schema_value'		=>		'https://schema.org',
			'is_recursive'		=>		false
		),
		'@type'				=>		array(
			'schema_value'		=>		'ImageObject',
			'is_recursive'		=>		false
		),
		'url'				=>		array(
			'schema_value'		=>		esc_url( get_theme_mod( 'general_schema_organization_logo' ) ),
			'is_recursive'		=>		false
		)
	);	
} 

function get_publisher_schema(){
	return array(
		'@context'			=>		array(
			'schema_value'		=>		'https://schema.org',
			'is_recursive'		=>		false
		),
		'@type'				=>		array(
			'schema_value'		=>		'Organization',
			'is_recursive'		=>		false
		),
		'name'				=>		array(
			'schema_value'		=>		sanitize_text_field ( get_theme_mod( 'general_schema_organization' ) ),
			'is_recursive'		=>		false
		),
		'logo'				=>		array(
			'schema_value'		=>		set_schema_array_associative( get_publisher_logo_schema() ),
			'is_recursive'		=>		true
		)
	);	
} 

function get_author_schema( $article_post_id ){
	$author_id = get_post_field( 'post_author', $article_post_id );
	return array(
		'@context'			=>		array(
			'schema_value'		=>		'https://schema.org',
			'is_recursive'		=>		false
		),
		'@type'				=>		array(
			'schema_value'		=>		'Person',
			'is_recursive'		=>		false
		),
		'name'				=>		array(
			'schema_value'		=>		get_the_author_meta( 'display_name', $author_id ),
			'is_recursive'		=>		false
		),
		'email'				=>		array(
			'schema_value'		=>		get_the_author_meta( 'user_email', $author_id ),
			'is_recursive'		=>		false
		),
		'description'		=>		array(
			'schema_value'		=>		get_the_author_meta( 'description', $author_id ),
			'is_recursive'		=>		false
		)
	);
}

function get_website_schema_article( $article_post_id ){
	return array(
		'@context'			=>			array(
			'schema_value'		=>		'https://schema.org',
			'is_recursive'		=>		false
		),
		'@type'				=>			array(
			'schema_value'		=>		'WebSite',
			'is_recursive'		=>		false
		),
		'name'				=>			array(
			'schema_value'		=>		get_the_title( $article_post_id ),
			'is_recursive'		=>		false
		),
		'url'				=>			array(
			'schema_value'		=>		esc_url( get_permalink( $article_post_id ) ),
			'is_recursive'		=>		false
		)

	);
}

function get_article_schema( $article_post_id, $is_display_body ){
	$articleIntroBgRaw = wp_get_attachment_image_src( get_post_thumbnail_id( $article_post_id ), 'full' );
	$articleIntroBg = $articleIntroBgRaw[0];
	$tags_list = '';
	$tags_array = get_the_tags( $article_post_id );
	$type_name = ( is_page() ) ? 'WebPage' : 'BlogPosting';
	$copy_field = ( is_page() ) ? 'text' : 'articleBody';
	$article_content_stripped = preg_replace("/(\n)(\n+)/", " ", strip_tags( do_shortcode( get_the_content( '', false, $article_post_id ) ) ) );
	$word_count = str_word_count( $article_content_stripped );
	for( $i = 0; $i < count($tags_array); $i++ ){
		if (i == count($tags_array) - 1){
			$tags_list .= $tags_array[$i]->name;
		} else {
			$tags_list .= $tags_array[$i]->name . ' ';
		}
	}

	$output = array(
		'@context'			=>		array(
			'schema_value'		=>		'https://schema.org',
			'is_recursive'		=>		false
									),
		'@type'				=>		array(
			'schema_value'		=>		$type_name,
			'is_recursive'		=>		false
									),
		'headline'			=>		array(
			'schema_value'		=>		get_the_title( $article_post_id ),
			'is_recursive'		=>		false
									),
		'image'				=>		array(
			'schema_value'		=>		$articleIntroBg,
			'is_recursive'		=>		false
									),
		'genre'				=>		array(
			'schema_value'		=>		get_the_category( $article_post_id )[ 0 ]->name,
			'is_recursive'		=>		false
									),	
		'keywords'			=>		array(
			'schema_value'		=>		$tags_list,
			'is_recursive'		=>		false
									),
		'url'				=>		array(
			'schema_value'		=>		esc_url( get_permalink( $article_post_id ) ),
			'is_recursive'		=>		false
									),
		'datePublished'		=>		array(
			'schema_value'		=>		get_the_date( 'Y-m-d', $article_post_id ),
			'is_recursive'		=>		false
									),
		'dateCreated'		=>		array(
			'schema_value'		=>		get_the_date( 'Y-m-d', $article_post_id ),
			'is_recursive'		=>		false
									),
		'dateModified'		=>		array(
			'schema_value'		=>		get_the_modified_date( 'Y-m-d', $article_post_id ),
			'is_recursive'		=>		false
									),
		'description'		=>		array(
			'schema_value'		=>		get_the_excerpt( $article_post_id ),
			'is_recursive'		=>		false
									),
		'author'			=>		array(
			'schema_value'		=>		set_schema_array_associative( get_author_schema( $article_post_id ) ),
			'is_recursive'		=>		true
									),
		'publisher'			=>		array(
			'schema_value'		=>		set_schema_array_associative( get_publisher_schema() ),
			'is_recursive'		=>		true
									),
		'mainEntityOfPage'		=>		array(
			'schema_value'		=>		set_schema_array_associative( get_website_schema_article( $article_post_id ) ),
			'is_recursive'		=>		true
		)
	);

	if ( $is_display_body ){
		$output[ $copy_field ] = array( 'schema_value' => $article_content_stripped, 'is_recursive' => false );
	}

	if ( ! ( is_page() ) ){
		$output[ 'wordcount' ] = array( 'schema_value' => $word_count, 'is_recursive' => false );
	}

	return $output;
}

if ( is_single() || is_page() ) :
	$current_post_num = get_the_ID();
	echo display_schema( get_article_schema( $current_post_num, true ) );
elseif ( is_home() || is_front_page() ):
	$schemaQuery = new WP_Query( 'posts_per_page=10' );
	$array_blog_posts = array();
	if ( $schemaQuery->have_posts() ){
		while ( $schemaQuery->have_posts() ) :
			$schemaQuery->the_post();
			$current_id = get_the_ID();
			array_push( $array_blog_posts, array( 'schema_value' => set_schema_array_associative( get_article_schema( $current_id, false ) ), 'is_recursive' => true ) );
		endwhile;
	}
	if ( count( $array_blog_posts ) > 0 ){
		$blog_schema_raw_homepage[ 'blogPost' ] = array( 'schema_value' => set_schema_array_indexed( $array_blog_posts ), 'is_recursive' => true );
	}
	echo display_schema( $blog_schema_raw_homepage );
endif;
?>
