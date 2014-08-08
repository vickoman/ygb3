<?php
/**
 * Buddypress Activity Privacy actions
 *
 * @package BP-Activity-Privacy
 */
 
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * Add visibility level to user activity meta
 * @param  [type] $content     [description]
 * @param  [type] $user_id     [description]
 * @param  [type] $activity_id [description]
 * @return [type]              [description]
 */
function bp_add_visibility_to_activity( $content, $user_id, $activity_id ) {
    $visibility = 'public';
    
    /*
    if ( !empty( $_POST['cookie'] ) )
        $_BP_COOKIE = wp_parse_args( str_replace( '; ', '&', urldecode( $_POST['cookie'] ) ) );
    else
        $_BP_COOKIE = &$_COOKIE;
    
    $visibility = $_BP_COOKIE['bp-visibility'];
    */

    $levels = bp_get_profile_activity_privacy_levels();
    $levels += bp_get_groups_activity_privacy_levels();

    if( isset( $_POST['visibility'] ) && in_array( esc_attr( $_POST['visibility'] ), $levels ) )
        $visibility = esc_attr($_POST['visibility']);

    bp_activity_update_meta( $activity_id, 'activity-privacy', $visibility );
}
add_action( 'bp_activity_posted_update', 'bp_add_visibility_to_activity', 10, 3 );

/**
 * Add visibility level to group activity meta
 * @param  [type] $content     [description]
 * @param  [type] $user_id     [description]
 * @param  [type] $group_id    [description]
 * @param  [type] $activity_id [description]
 * @return [type]              [description]
 */
function bp_add_visibility_to_group_activity( $content, $user_id, $group_id, $activity_id ) {
    $visibility = 'public';

    $levels = bp_get_groups_activity_privacy_levels();
    if( isset( $_POST['visibility'] ) && in_array( esc_attr( $_POST['visibility'] ), $levels ) )
        $visibility = esc_attr($_POST['visibility']);

    bp_activity_update_meta( $activity_id, 'activity-privacy', $visibility );
}
add_action( 'bp_groups_posted_update', 'bp_add_visibility_to_group_activity', 10, 4 );

/**
 * Return Html Select box for activity privacy UI
 * @return [type] [description]
 */
function bp_add_activitiy_visibility_selectbox() {
	echo '<span name="activity-visibility" id="activity-visibility">';
	/*_e( 'Privacy: ', 'bp-activity-privacy' );*/
	if ( bp_is_group_home() )
		bp_groups_activity_visibility();
	else 
		bp_profile_activity_visibility();
	echo '</span>';
}
add_action('bp_activity_post_form_options','bp_add_activitiy_visibility_selectbox');


function bp_update_activitiy_visibility_selectbox() {
    if( bp_activity_user_can_delete() ) {
        global $bp;
        $visibility = bp_activity_get_meta( bp_get_activity_id(), 'activity-privacy' );

        global $bp_activity_privacy;
        $group_id = bp_get_activity_item_id();
        
        //if is not a group activity or a new blog post
        if( !isset( $group_id ) || $group_id == 0 ||  'new_blog_post' == bp_get_activity_type() )
            $visibility_levels = bp_get_profile_activity_visibility_levels();   
        else
            $visibility_levels = bp_get_groups_activity_visibility_levels();
        
        //sort visibility_levels by position 
        uasort ($visibility_levels, 'bp_activity_privacy_cmp_position');

        $html = '<select class="bp-ap-selectbox">';
        foreach ($visibility_levels as $visibility_level) {
            if( $visibility_level["disabled"] )
                continue;
            $html .= '<option class="fa fa-' . $visibility_level["id"] . '" ' . ( $visibility_level['id'] == $visibility ? " selected='selected'" : '' ) . ' value="' . $visibility_level["id"] . '">&nbsp;' . $visibility_level["label"] . '</option>';
        }
        $html .= '</select>';

        $html = apply_filters( 'bp_get_update_activitiy_visibility_selectbox', $html );
        echo $html;
    }


}
//add_action('bp_activity_time_since', 'bp_update_activitiy_visibility_selectbox',10 ,1);
add_action('bp_activity_entry_meta', 'bp_update_activitiy_visibility_selectbox',10);

function bp_add_custom_style_selectbox(){
    ?>
    <script type="text/javascript">
    if ( typeof jq == "undefined" )
        var jq = jQuery;  
    jq(document).ready( function() {
        if (  jq.isFunction(jq.fn.customStyle)  ) { 
            //fix width problem
            //http://stackoverflow.com/questions/6132141/jquery-why-does-width-sometimes-return-0-after-inserting-elements-with-html
            setTimeout(function(){
                jq('select.bp-ap-selectbox').customStyle('2');
            },0);
            
        }

    });
    </script>

    <?php
}
add_action('bp_after_activity_loop', 'bp_add_custom_style_selectbox');