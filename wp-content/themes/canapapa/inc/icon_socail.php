
<?php
/**
 * Created by PhpStorm.
 * User: nguyentrunghieu
 * Date: 3/14/2018
 * Time: 12:07 AM
 */

function icon_socail( $wp_customize ) {
    $wp_customize->add_section (
        'section_a',
        array(
            'title' => 'Tùy biến ICON Mạng xã hội',
            'description' => 'Tùy chỉnh các ICON, liên kết mạng xã hội',
            'priority' => 25 ));


    $wp_customize->add_setting ('Facebook', array('default' => '') );
    $wp_customize->add_control ('control_Facebook', array(
        'label' => 'Liên kết facebook',
        'section' => 'section_a',
        'type' => 'text',
        'settings' => 'Facebook'));
    $wp_customize->add_setting ('Twitter', array('default' => '') );
    $wp_customize->add_control ('control_Twitter', array(
        'label' => 'Liên kết twitter',
        'section' => 'section_a',
        'type' => 'text',
        'settings' => 'Twitter'));
    $wp_customize->add_setting ('Linkedin', array('default' => '') );
    $wp_customize->add_control ('control_Linkedin', array(
        'label' => 'Liên kết linkedin',
        'section' => 'section_a',
        'type' => 'text',
        'settings' => 'Linkedin'));
    $wp_customize->add_setting ('Google', array('default' => '') );
    $wp_customize->add_control ('control_Google', array(
        'label' => 'Liên kết google+',
        'section' => 'section_a',
        'type' => 'text',
        'settings' => 'Google'));
    $wp_customize->add_setting ('Pinterest', array('default' => '') );
    $wp_customize->add_control ('control_Pinterest', array(
        'label' => 'Liên kết Pinterest',
        'section' => 'section_a',
        'type' => 'text',
        'settings' => 'Pinterest'));
}
add_action( 'customize_register', 'icon_socail' );