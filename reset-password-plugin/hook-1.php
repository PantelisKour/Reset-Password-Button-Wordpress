<?php
/**
 * Plugin Name: Hook, button for each user in the list
 * Description: A plugin which working as an extra button to reset for each user's password, on the administration dashboard
 * Version: 1.0
 * Author: Pantelis Kouridakis
 */

add_filter ('user_row_actions', 'my_custom_function', 10, 2) ;

function my_custom_function ($actions, $user)
{

    // $new_user_password123 = "12345";
    // $user->user_pass = $new_user_password123;

    // $href = '?reset_user_id='.($user->ID) ;
    
    $reset_key = get_password_reset_key($user);
    $url = home_url('wp-login.php') . "?action=rp&key=$reset_key&login=" . rawurlencode($user->user_login);
    $href = $url ;
    $username = $user->user_login;
    
    $actions['reset_password'] = "<a href='$href' onclick=\"return confirm('Are you sure you want to reset password of user {$username}')\">Reset password</a>" ; 
    // user_pass, user_email


/*--------------------------*/

    // if($_GET['reset_user_id'] == $user->ID){
    //     if(isset($_GET['reset_user_id'])){echo $_GET['reset_user_id'];} 
    // }
    
    
    return ($actions) ;
}