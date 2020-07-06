//Custom Post
<?php
add_action( 'init', 'my_theme_custom_post' );
function my_theme_custom_post() {
    register_post_type( 'cpt',
        array(
            'labels' => array(
                'name' => __( 'CPTs' ),
                'singular_name' => __( 'CPT' )
            ),
            'supports' => array('title', 'editor', 'custom-fields', 'thumbnail', 'page-attributes'),
            'public' => true
        )
    );
}
?>

//Custopm Post Loop

<?php
global $post;
$args = array( 'posts_per_page' => -1, 'post_type'=> 'posttype', 'orderby' => 'menu_order', 'order' => 'ASC' );
$myposts = get_posts( $args );
foreach( $myposts as $post ) : setup_postdata($post); ?>
 
<?php 
   $job_link= get_post_meta($post->ID, 'job_instructions', true); 
?>
 
    <h2><?php the_title(); ?></h2>
    <?php the_content(); ?>
    <p><?php echo $job_link; ?></p>
<?php endforeach; wp_reset_query(); ?>
