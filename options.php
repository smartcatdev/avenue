<?php

/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */
function optionsframework_option_name() {

    // This gets the theme name from the stylesheet
    $themename = wp_get_theme();
    $themename = preg_replace("/\W/", "_", strtolower($themename));

    $optionsframework_settings = get_option('optionsframework');
    $optionsframework_settings['id'] = $themename;
    update_option('optionsframework', $optionsframework_settings);
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'options_framework_theme'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */
function optionsframework_options() {

    // Test data
    $test_array = array(
        'one' => __('One', 'options_framework_theme'),
        'two' => __('Two', 'options_framework_theme'),
        'three' => __('Three', 'options_framework_theme'),
        'four' => __('Four', 'options_framework_theme'),
        'five' => __('Five', 'options_framework_theme')
    );
    $icon_array = array(
        'fa fa-automobile' => __('automobile', 'options_framework_theme'),'fa fa-bank' => __('bank', 'options_framework_theme'),'fa fa-behance' => __('behance', 'options_framework_theme'),'fa fa-behance-square' => __('behance-square', 'options_framework_theme'),'fa fa-bomb' => __('bomb', 'options_framework_theme'),'fa fa-building' => __('building', 'options_framework_theme'),'fa fa-cab' => __('cab', 'options_framework_theme'),'fa fa-car' => __('car', 'options_framework_theme'),'fa fa-child' => __('child', 'options_framework_theme'),'fa fa-circle-o-notch' => __('circle-o-notch', 'options_framework_theme'),'fa fa-circle-thin' => __('circle-thin', 'options_framework_theme'),'fa fa-codepen' => __('codepen', 'options_framework_theme'),'fa fa-cube' => __('cube', 'options_framework_theme'),'fa fa-cubes' => __('cubes', 'options_framework_theme'),'fa fa-database' => __('database', 'options_framework_theme'),'fa fa-delicious' => __('delicious', 'options_framework_theme'),'fa fa-deviantart' => __('deviantart', 'options_framework_theme'),'fa fa-digg' => __('digg', 'options_framework_theme'),'fa fa-drupal' => __('drupal', 'options_framework_theme'),'fa fa-empire' => __('empire', 'options_framework_theme'),'fa fa-envelope-square' => __('envelope-square', 'options_framework_theme'),'fa fa-fax' => __('fax', 'options_framework_theme'),'fa fa-file-archive-o' => __('file-archive-o', 'options_framework_theme'),'fa fa-file-audio-o' => __('file-audio-o', 'options_framework_theme'),'fa fa-file-code-o' => __('file-code-o', 'options_framework_theme'),'fa fa-file-excel-o' => __('file-excel-o', 'options_framework_theme'),'fa fa-file-image-o' => __('file-image-o', 'options_framework_theme'),'fa fa-file-movie-o' => __('file-movie-o', 'options_framework_theme'),'fa fa-file-pdf-o' => __('file-pdf-o', 'options_framework_theme'),'fa fa-file-photo-o' => __('file-photo-o', 'options_framework_theme'),'fa fa-file-picture-o' => __('file-picture-o', 'options_framework_theme'),'fa fa-file-powerpoint-o' => __('file-powerpoint-o', 'options_framework_theme'),'fa fa-file-sound-o' => __('file-sound-o', 'options_framework_theme'),'fa fa-file-video-o' => __('file-video-o', 'options_framework_theme'),'fa fa-file-word-o' => __('file-word-o', 'options_framework_theme'),'fa fa-file-zip-o' => __('file-zip-o', 'options_framework_theme'),'fa fa-ge' => __('ge', 'options_framework_theme'),'fa fa-git' => __('git', 'options_framework_theme'),'fa fa-git-square' => __('git-square', 'options_framework_theme'),'fa fa-google' => __('google', 'options_framework_theme'),'fa fa-graduation-cap' => __('graduation-cap', 'options_framework_theme'),'fa fa-hacker-news' => __('hacker-news', 'options_framework_theme'),'fa fa-header' => __('header', 'options_framework_theme'),'fa fa-history' => __('history', 'options_framework_theme'),'fa fa-institution' => __('institution', 'options_framework_theme'),'fa fa-joomla' => __('joomla', 'options_framework_theme'),'fa fa-jsfiddle' => __('jsfiddle', 'options_framework_theme'),'fa fa-language' => __('language', 'options_framework_theme'),'fa fa-life-bouy' => __('life-bouy', 'options_framework_theme'),'fa fa-life-ring' => __('life-ring', 'options_framework_theme'),'fa fa-life-saver' => __('life-saver', 'options_framework_theme'),'fa fa-mortar-board' => __('mortar-board', 'options_framework_theme'),'fa fa-openid' => __('openid', 'options_framework_theme'),'fa fa-paper-plane' => __('paper-plane', 'options_framework_theme'),'fa fa-paper-plane-o' => __('paper-plane-o', 'options_framework_theme'),'fa fa-paragraph' => __('paragraph', 'options_framework_theme'),'fa fa-paw' => __('paw', 'options_framework_theme'),'fa fa-pied-piper' => __('pied-piper', 'options_framework_theme'),'fa fa-pied-piper-alt' => __('pied-piper-alt', 'options_framework_theme'),'fa fa-pied-piper-square' => __('pied-piper-square', 'options_framework_theme'),'fa fa-qq' => __('qq', 'options_framework_theme'),'fa fa-ra' => __('ra', 'options_framework_theme'),'fa fa-rebel' => __('rebel', 'options_framework_theme'),'fa fa-recycle' => __('recycle', 'options_framework_theme'),'fa fa-reddit' => __('reddit', 'options_framework_theme'),'fa fa-reddit-square' => __('reddit-square', 'options_framework_theme'),'fa fa-send' => __('send', 'options_framework_theme'),'fa fa-send-o' => __('send-o', 'options_framework_theme'),'fa fa-share-alt' => __('share-alt', 'options_framework_theme'),'fa fa-share-alt-square' => __('share-alt-square', 'options_framework_theme'),'fa fa-slack' => __('slack', 'options_framework_theme'),'fa fa-sliders' => __('sliders', 'options_framework_theme'),'fa fa-soundcloud' => __('soundcloud', 'options_framework_theme'),'fa fa-space-shuttle' => __('space-shuttle', 'options_framework_theme'),'fa fa-spoon' => __('spoon', 'options_framework_theme'),'fa fa-spotify' => __('spotify', 'options_framework_theme'),'fa fa-steam' => __('steam', 'options_framework_theme'),'fa fa-steam-square' => __('steam-square', 'options_framework_theme'),'fa fa-stumbleupon' => __('stumbleupon', 'options_framework_theme'),'fa fa-stumbleupon-circle' => __('stumbleupon-circle', 'options_framework_theme'),'fa fa-support' => __('support', 'options_framework_theme'),'fa fa-taxi' => __('taxi', 'options_framework_theme'),'fa fa-tencent-weibo' => __('tencent-weibo', 'options_framework_theme'),'fa fa-tree' => __('tree', 'options_framework_theme'),'fa fa-university' => __('university', 'options_framework_theme'),'fa fa-vine' => __('vine', 'options_framework_theme'),'fa fa-wechat' => __('wechat', 'options_framework_theme'),'fa fa-weixin' => __('weixin', 'options_framework_theme'),'fa fa-wordpress' => __('wordpress', 'options_framework_theme'),'fa fa-yahoo' => __('yahoo', 'options_framework_theme'),'fa fa-adjust' => __('adjust', 'options_framework_theme'),'fa fa-anchor' => __('anchor', 'options_framework_theme'),'fa fa-archive' => __('archive', 'options_framework_theme'),'fa fa-arrows' => __('arrows', 'options_framework_theme'),'fa fa-arrows-h' => __('arrows-h', 'options_framework_theme'),'fa fa-arrows-v' => __('arrows-v', 'options_framework_theme'),'fa fa-asterisk' => __('asterisk', 'options_framework_theme'),'fa fa-automobile' => __('automobile', 'options_framework_theme'),'fa fa-ban' => __('ban', 'options_framework_theme'),'fa fa-bank' => __('bank', 'options_framework_theme'),'fa fa-bar-chart-o' => __('bar-chart-o', 'options_framework_theme'),'fa fa-barcode' => __('barcode', 'options_framework_theme'),'fa fa-bars' => __('bars', 'options_framework_theme'),'fa fa-beer' => __('beer', 'options_framework_theme'),'fa fa-bell' => __('bell', 'options_framework_theme'),'fa fa-bell-o' => __('bell-o', 'options_framework_theme'),'fa fa-bolt' => __('bolt', 'options_framework_theme'),'fa fa-bomb' => __('bomb', 'options_framework_theme'),'fa fa-book' => __('book', 'options_framework_theme'),'fa fa-bookmark' => __('bookmark', 'options_framework_theme'),'fa fa-bookmark-o' => __('bookmark-o', 'options_framework_theme'),'fa fa-briefcase' => __('briefcase', 'options_framework_theme'),'fa fa-bug' => __('bug', 'options_framework_theme'),'fa fa-building' => __('building', 'options_framework_theme'),'fa fa-building-o' => __('building-o', 'options_framework_theme'),'fa fa-bullhorn' => __('bullhorn', 'options_framework_theme'),'fa fa-bullseye' => __('bullseye', 'options_framework_theme'),'fa fa-cab' => __('cab', 'options_framework_theme'),'fa fa-calendar' => __('calendar', 'options_framework_theme'),'fa fa-calendar-o' => __('calendar-o', 'options_framework_theme'),'fa fa-camera' => __('camera', 'options_framework_theme'),'fa fa-camera-retro' => __('camera-retro', 'options_framework_theme'),'fa fa-car' => __('car', 'options_framework_theme'),'fa fa-caret-square-o-down' => __('caret-square-o-down', 'options_framework_theme'),'fa fa-caret-square-o-left' => __('caret-square-o-left', 'options_framework_theme'),'fa fa-caret-square-o-right' => __('caret-square-o-right', 'options_framework_theme'),'fa fa-caret-square-o-up' => __('caret-square-o-up', 'options_framework_theme'),'fa fa-certificate' => __('certificate', 'options_framework_theme'),'fa fa-check' => __('check', 'options_framework_theme'),'fa fa-check-circle' => __('check-circle', 'options_framework_theme'),'fa fa-check-circle-o' => __('check-circle-o', 'options_framework_theme'),'fa fa-check-square' => __('check-square', 'options_framework_theme'),'fa fa-check-square-o' => __('check-square-o', 'options_framework_theme'),'fa fa-child' => __('child', 'options_framework_theme'),'fa fa-circle' => __('circle', 'options_framework_theme'),'fa fa-circle-o' => __('circle-o', 'options_framework_theme'),'fa fa-circle-o-notch' => __('circle-o-notch', 'options_framework_theme'),'fa fa-circle-thin' => __('circle-thin', 'options_framework_theme'),'fa fa-clock-o' => __('clock-o', 'options_framework_theme'),'fa fa-cloud' => __('cloud', 'options_framework_theme'),'fa fa-cloud-download' => __('cloud-download', 'options_framework_theme'),'fa fa-cloud-upload' => __('cloud-upload', 'options_framework_theme'),'fa fa-code' => __('code', 'options_framework_theme'),'fa fa-code-fork' => __('code-fork', 'options_framework_theme'),'fa fa-coffee' => __('coffee', 'options_framework_theme'),'fa fa-cog' => __('cog', 'options_framework_theme'),'fa fa-cogs' => __('cogs', 'options_framework_theme'),'fa fa-comment' => __('comment', 'options_framework_theme'),'fa fa-comment-o' => __('comment-o', 'options_framework_theme'),'fa fa-comments' => __('comments', 'options_framework_theme'),'fa fa-comments-o' => __('comments-o', 'options_framework_theme'),'fa fa-compass' => __('compass', 'options_framework_theme'),'fa fa-credit-card' => __('credit-card', 'options_framework_theme'),'fa fa-crop' => __('crop', 'options_framework_theme'),'fa fa-crosshairs' => __('crosshairs', 'options_framework_theme'),'fa fa-cube' => __('cube', 'options_framework_theme'),'fa fa-cubes' => __('cubes', 'options_framework_theme'),'fa fa-cutlery' => __('cutlery', 'options_framework_theme'),'fa fa-dashboard' => __('dashboard', 'options_framework_theme'),'fa fa-database' => __('database', 'options_framework_theme'),'fa fa-desktop' => __('desktop', 'options_framework_theme'),'fa fa-dot-circle-o' => __('dot-circle-o', 'options_framework_theme'),'fa fa-download' => __('download', 'options_framework_theme'),'fa fa-edit' => __('edit', 'options_framework_theme'),'fa fa-ellipsis-h' => __('ellipsis-h', 'options_framework_theme'),'fa fa-ellipsis-v' => __('ellipsis-v', 'options_framework_theme'),'fa fa-envelope' => __('envelope', 'options_framework_theme'),'fa fa-envelope-o' => __('envelope-o', 'options_framework_theme'),'fa fa-envelope-square' => __('envelope-square', 'options_framework_theme'),'fa fa-eraser' => __('eraser', 'options_framework_theme'),'fa fa-exchange' => __('exchange', 'options_framework_theme'),'fa fa-exclamation' => __('exclamation', 'options_framework_theme'),'fa fa-exclamation-circle' => __('exclamation-circle', 'options_framework_theme'),'fa fa-exclamation-triangle' => __('exclamation-triangle', 'options_framework_theme'),'fa fa-external-link' => __('external-link', 'options_framework_theme'),'fa fa-external-link-square' => __('external-link-square', 'options_framework_theme'),'fa fa-eye' => __('eye', 'options_framework_theme'),'fa fa-eye-slash' => __('eye-slash', 'options_framework_theme'),'fa fa-fax' => __('fax', 'options_framework_theme'),'fa fa-female' => __('female', 'options_framework_theme'),'fa fa-fighter-jet' => __('fighter-jet', 'options_framework_theme'),'fa fa-file-archive-o' => __('file-archive-o', 'options_framework_theme'),'fa fa-file-audio-o' => __('file-audio-o', 'options_framework_theme'),'fa fa-file-code-o' => __('file-code-o', 'options_framework_theme'),'fa fa-file-excel-o' => __('file-excel-o', 'options_framework_theme'),'fa fa-file-image-o' => __('file-image-o', 'options_framework_theme'),'fa fa-file-movie-o' => __('file-movie-o', 'options_framework_theme'),'fa fa-file-pdf-o' => __('file-pdf-o', 'options_framework_theme'),'fa fa-file-photo-o' => __('file-photo-o', 'options_framework_theme'),'fa fa-file-picture-o' => __('file-picture-o', 'options_framework_theme'),'fa fa-file-powerpoint-o' => __('file-powerpoint-o', 'options_framework_theme'),'fa fa-file-sound-o' => __('file-sound-o', 'options_framework_theme'),'fa fa-file-video-o' => __('file-video-o', 'options_framework_theme'),'fa fa-file-word-o' => __('file-word-o', 'options_framework_theme'),'fa fa-file-zip-o' => __('file-zip-o', 'options_framework_theme'),'fa fa-film' => __('film', 'options_framework_theme'),'fa fa-filter' => __('filter', 'options_framework_theme'),'fa fa-fire' => __('fire', 'options_framework_theme'),'fa fa-fire-extinguisher' => __('fire-extinguisher', 'options_framework_theme'),'fa fa-flag' => __('flag', 'options_framework_theme'),'fa fa-flag-checkered' => __('flag-checkered', 'options_framework_theme'),'fa fa-flag-o' => __('flag-o', 'options_framework_theme'),'fa fa-flash' => __('flash', 'options_framework_theme'),'fa fa-flask' => __('flask', 'options_framework_theme'),'fa fa-folder' => __('folder', 'options_framework_theme'),'fa fa-folder-o' => __('folder-o', 'options_framework_theme'),'fa fa-folder-open' => __('folder-open', 'options_framework_theme'),'fa fa-folder-open-o' => __('folder-open-o', 'options_framework_theme'),'fa fa-frown-o' => __('frown-o', 'options_framework_theme'),'fa fa-gamepad' => __('gamepad', 'options_framework_theme'),'fa fa-gavel' => __('gavel', 'options_framework_theme'),'fa fa-gear' => __('gear', 'options_framework_theme'),'fa fa-gears' => __('gears', 'options_framework_theme'),'fa fa-gift' => __('gift', 'options_framework_theme'),'fa fa-glass' => __('glass', 'options_framework_theme'),'fa fa-globe' => __('globe', 'options_framework_theme'),'fa fa-graduation-cap' => __('graduation-cap', 'options_framework_theme'),'fa fa-group' => __('group', 'options_framework_theme'),'fa fa-hdd-o' => __('hdd-o', 'options_framework_theme'),'fa fa-headphones' => __('headphones', 'options_framework_theme'),'fa fa-heart' => __('heart', 'options_framework_theme'),'fa fa-heart-o' => __('heart-o', 'options_framework_theme'),'fa fa-history' => __('history', 'options_framework_theme'),'fa fa-home' => __('home', 'options_framework_theme'),'fa fa-image' => __('image', 'options_framework_theme'),'fa fa-inbox' => __('inbox', 'options_framework_theme'),'fa fa-info' => __('info', 'options_framework_theme'),'fa fa-info-circle' => __('info-circle', 'options_framework_theme'),'fa fa-institution' => __('institution', 'options_framework_theme'),'fa fa-key' => __('key', 'options_framework_theme'),'fa fa-keyboard-o' => __('keyboard-o', 'options_framework_theme'),'fa fa-language' => __('language', 'options_framework_theme'),'fa fa-laptop' => __('laptop', 'options_framework_theme'),'fa fa-leaf' => __('leaf', 'options_framework_theme'),'fa fa-legal' => __('legal', 'options_framework_theme'),'fa fa-lemon-o' => __('lemon-o', 'options_framework_theme'),'fa fa-level-down' => __('level-down', 'options_framework_theme'),'fa fa-level-up' => __('level-up', 'options_framework_theme'),'fa fa-life-bouy' => __('life-bouy', 'options_framework_theme'),'fa fa-life-ring' => __('life-ring', 'options_framework_theme'),'fa fa-life-saver' => __('life-saver', 'options_framework_theme'),'fa fa-lightbulb-o' => __('lightbulb-o', 'options_framework_theme'),'fa fa-location-arrow' => __('location-arrow', 'options_framework_theme'),'fa fa-lock' => __('lock', 'options_framework_theme'),'fa fa-magic' => __('magic', 'options_framework_theme'),'fa fa-magnet' => __('magnet', 'options_framework_theme'),'fa fa-mail-forward' => __('mail-forward', 'options_framework_theme'),'fa fa-mail-reply' => __('mail-reply', 'options_framework_theme'),'fa fa-mail-reply-all' => __('mail-reply-all', 'options_framework_theme'),'fa fa-male' => __('male', 'options_framework_theme'),'fa fa-map-marker' => __('map-marker', 'options_framework_theme'),'fa fa-meh-o' => __('meh-o', 'options_framework_theme'),'fa fa-microphone' => __('microphone', 'options_framework_theme'),'fa fa-microphone-slash' => __('microphone-slash', 'options_framework_theme'),'fa fa-minus' => __('minus', 'options_framework_theme'),'fa fa-minus-circle' => __('minus-circle', 'options_framework_theme'),'fa fa-minus-square' => __('minus-square', 'options_framework_theme'),'fa fa-minus-square-o' => __('minus-square-o', 'options_framework_theme'),'fa fa-mobile' => __('mobile', 'options_framework_theme'),'fa fa-mobile-phone' => __('mobile-phone', 'options_framework_theme'),'fa fa-money' => __('money', 'options_framework_theme'),'fa fa-moon-o' => __('moon-o', 'options_framework_theme'),'fa fa-mortar-board' => __('mortar-board', 'options_framework_theme'),'fa fa-music' => __('music', 'options_framework_theme'),'fa fa-navicon' => __('navicon', 'options_framework_theme'),'fa fa-paper-plane' => __('paper-plane', 'options_framework_theme'),'fa fa-paper-plane-o' => __('paper-plane-o', 'options_framework_theme'),'fa fa-paw' => __('paw', 'options_framework_theme'),'fa fa-pencil' => __('pencil', 'options_framework_theme'),'fa fa-pencil-square' => __('pencil-square', 'options_framework_theme'),'fa fa-pencil-square-o' => __('pencil-square-o', 'options_framework_theme'),'fa fa-phone' => __('phone', 'options_framework_theme'),'fa fa-phone-square' => __('phone-square', 'options_framework_theme'),'fa fa-photo' => __('photo', 'options_framework_theme'),'fa fa-picture-o' => __('picture-o', 'options_framework_theme'),'fa fa-plane' => __('plane', 'options_framework_theme'),'fa fa-plus' => __('plus', 'options_framework_theme'),'fa fa-plus-circle' => __('plus-circle', 'options_framework_theme'),'fa fa-plus-square' => __('plus-square', 'options_framework_theme'),'fa fa-plus-square-o' => __('plus-square-o', 'options_framework_theme'),'fa fa-power-off' => __('power-off', 'options_framework_theme'),'fa fa-print' => __('print', 'options_framework_theme'),'fa fa-puzzle-piece' => __('puzzle-piece', 'options_framework_theme'),'fa fa-qrcode' => __('qrcode', 'options_framework_theme'),'fa fa-question' => __('question', 'options_framework_theme'),'fa fa-question-circle' => __('question-circle', 'options_framework_theme'),'fa fa-quote-left' => __('quote-left', 'options_framework_theme'),'fa fa-quote-right' => __('quote-right', 'options_framework_theme'),'fa fa-random' => __('random', 'options_framework_theme'),'fa fa-recycle' => __('recycle', 'options_framework_theme'),'fa fa-refresh' => __('refresh', 'options_framework_theme'),'fa fa-reorder' => __('reorder', 'options_framework_theme'),'fa fa-reply' => __('reply', 'options_framework_theme'),'fa fa-reply-all' => __('reply-all', 'options_framework_theme'),'fa fa-retweet' => __('retweet', 'options_framework_theme'),'fa fa-road' => __('road', 'options_framework_theme'),'fa fa-rocket' => __('rocket', 'options_framework_theme'),'fa fa-rss' => __('rss', 'options_framework_theme'),'fa fa-rss-square' => __('rss-square', 'options_framework_theme'),'fa fa-search' => __('search', 'options_framework_theme'),'fa fa-search-minus' => __('search-minus', 'options_framework_theme'),'fa fa-search-plus' => __('search-plus', 'options_framework_theme'),'fa fa-send' => __('send', 'options_framework_theme'),'fa fa-send-o' => __('send-o', 'options_framework_theme'),'fa fa-share' => __('share', 'options_framework_theme'),'fa fa-share-alt' => __('share-alt', 'options_framework_theme'),'fa fa-share-alt-square' => __('share-alt-square', 'options_framework_theme'),'fa fa-share-square' => __('share-square', 'options_framework_theme'),'fa fa-share-square-o' => __('share-square-o', 'options_framework_theme'),'fa fa-shield' => __('shield', 'options_framework_theme'),'fa fa-shopping-cart' => __('shopping-cart', 'options_framework_theme'),'fa fa-sign-in' => __('sign-in', 'options_framework_theme'),'fa fa-sign-out' => __('sign-out', 'options_framework_theme'),'fa fa-signal' => __('signal', 'options_framework_theme'),'fa fa-sitemap' => __('sitemap', 'options_framework_theme'),'fa fa-sliders' => __('sliders', 'options_framework_theme'),'fa fa-smile-o' => __('smile-o', 'options_framework_theme'),'fa fa-sort' => __('sort', 'options_framework_theme'),'fa fa-sort-alpha-asc' => __('sort-alpha-asc', 'options_framework_theme'),'fa fa-sort-alpha-desc' => __('sort-alpha-desc', 'options_framework_theme'),'fa fa-sort-amount-asc' => __('sort-amount-asc', 'options_framework_theme'),'fa fa-sort-amount-desc' => __('sort-amount-desc', 'options_framework_theme'),'fa fa-sort-asc' => __('sort-asc', 'options_framework_theme'),'fa fa-sort-desc' => __('sort-desc', 'options_framework_theme'),'fa fa-sort-down' => __('sort-down', 'options_framework_theme'),'fa fa-sort-numeric-asc' => __('sort-numeric-asc', 'options_framework_theme'),'fa fa-sort-numeric-desc' => __('sort-numeric-desc', 'options_framework_theme'),'fa fa-sort-up' => __('sort-up', 'options_framework_theme'),'fa fa-space-shuttle' => __('space-shuttle', 'options_framework_theme'),'fa fa-spinner' => __('spinner', 'options_framework_theme'),'fa fa-spoon' => __('spoon', 'options_framework_theme'),'fa fa-square' => __('square', 'options_framework_theme'),'fa fa-square-o' => __('square-o', 'options_framework_theme'),'fa fa-star' => __('star', 'options_framework_theme'),'fa fa-star-half' => __('star-half', 'options_framework_theme'),'fa fa-star-half-empty' => __('star-half-empty', 'options_framework_theme'),'fa fa-star-half-full' => __('star-half-full', 'options_framework_theme'),'fa fa-star-half-o' => __('star-half-o', 'options_framework_theme'),'fa fa-star-o' => __('star-o', 'options_framework_theme'),'fa fa-suitcase' => __('suitcase', 'options_framework_theme'),'fa fa-sun-o' => __('sun-o', 'options_framework_theme'),'fa fa-support' => __('support', 'options_framework_theme'),'fa fa-tablet' => __('tablet', 'options_framework_theme'),'fa fa-tachometer' => __('tachometer', 'options_framework_theme'),'fa fa-tag' => __('tag', 'options_framework_theme'),'fa fa-tags' => __('tags', 'options_framework_theme'),'fa fa-tasks' => __('tasks', 'options_framework_theme'),'fa fa-taxi' => __('taxi', 'options_framework_theme'),'fa fa-terminal' => __('terminal', 'options_framework_theme'),'fa fa-thumb-tack' => __('thumb-tack', 'options_framework_theme'),'fa fa-thumbs-down' => __('thumbs-down', 'options_framework_theme'),'fa fa-thumbs-o-down' => __('thumbs-o-down', 'options_framework_theme'),'fa fa-thumbs-o-up' => __('thumbs-o-up', 'options_framework_theme'),'fa fa-thumbs-up' => __('thumbs-up', 'options_framework_theme'),'fa fa-ticket' => __('ticket', 'options_framework_theme'),'fa fa-times' => __('times', 'options_framework_theme'),'fa fa-times-circle' => __('times-circle', 'options_framework_theme'),'fa fa-times-circle-o' => __('times-circle-o', 'options_framework_theme'),'fa fa-tint' => __('tint', 'options_framework_theme'),'fa fa-toggle-down' => __('toggle-down', 'options_framework_theme'),'fa fa-toggle-left' => __('toggle-left', 'options_framework_theme'),'fa fa-toggle-right' => __('toggle-right', 'options_framework_theme'),'fa fa-toggle-up' => __('toggle-up', 'options_framework_theme'),'fa fa-trash-o' => __('trash-o', 'options_framework_theme'),'fa fa-tree' => __('tree', 'options_framework_theme'),'fa fa-trophy' => __('trophy', 'options_framework_theme'),'fa fa-truck' => __('truck', 'options_framework_theme'),'fa fa-umbrella' => __('umbrella', 'options_framework_theme'),'fa fa-university' => __('university', 'options_framework_theme'),'fa fa-unlock' => __('unlock', 'options_framework_theme'),'fa fa-unlock-alt' => __('unlock-alt', 'options_framework_theme'),'fa fa-unsorted' => __('unsorted', 'options_framework_theme'),'fa fa-upload' => __('upload', 'options_framework_theme'),'fa fa-user' => __('user', 'options_framework_theme'),'fa fa-users' => __('users', 'options_framework_theme'),'fa fa-video-camera' => __('video-camera', 'options_framework_theme'),'fa fa-volume-down' => __('volume-down', 'options_framework_theme'),'fa fa-volume-off' => __('volume-off', 'options_framework_theme'),'fa fa-volume-up' => __('volume-up', 'options_framework_theme'),'fa fa-warning' => __('warning', 'options_framework_theme'),'fa fa-wheelchair' => __('wheelchair', 'options_framework_theme'),'fa fa-wrench' => __('wrench', 'options_framework_theme'),'fa fa-file' => __('file', 'options_framework_theme'),'fa fa-file-archive-o' => __('file-archive-o', 'options_framework_theme'),'fa fa-file-audio-o' => __('file-audio-o', 'options_framework_theme'),'fa fa-file-code-o' => __('file-code-o', 'options_framework_theme'),'fa fa-file-excel-o' => __('file-excel-o', 'options_framework_theme'),'fa fa-file-image-o' => __('file-image-o', 'options_framework_theme'),'fa fa-file-movie-o' => __('file-movie-o', 'options_framework_theme'),'fa fa-file-o' => __('file-o', 'options_framework_theme'),'fa fa-file-pdf-o' => __('file-pdf-o', 'options_framework_theme'),'fa fa-file-photo-o' => __('file-photo-o', 'options_framework_theme'),'fa fa-file-picture-o' => __('file-picture-o', 'options_framework_theme'),'fa fa-file-powerpoint-o' => __('file-powerpoint-o', 'options_framework_theme'),'fa fa-file-sound-o' => __('file-sound-o', 'options_framework_theme'),'fa fa-file-text' => __('file-text', 'options_framework_theme'),'fa fa-file-text-o' => __('file-text-o', 'options_framework_theme'),'fa fa-file-video-o' => __('file-video-o', 'options_framework_theme'),'fa fa-file-word-o' => __('file-word-o', 'options_framework_theme'),'fa fa-file-zip-o' => __('file-zip-o', 'options_framework_theme'),'fa fa-info-circle fa-lg fa-li' => __('info-circle fa-lg fa-li', 'options_framework_theme'),'fa fa-circle-o-notch' => __('circle-o-notch', 'options_framework_theme'),'fa fa-cog' => __('cog', 'options_framework_theme'),'fa fa-gear' => __('gear', 'options_framework_theme'),'fa fa-refresh' => __('refresh', 'options_framework_theme'),'fa fa-spinner' => __('spinner', 'options_framework_theme'),'fa fa-check-square' => __('check-square', 'options_framework_theme'),'fa fa-check-square-o' => __('check-square-o', 'options_framework_theme'),'fa fa-circle' => __('circle', 'options_framework_theme'),'fa fa-circle-o' => __('circle-o', 'options_framework_theme'),'fa fa-dot-circle-o' => __('dot-circle-o', 'options_framework_theme'),'fa fa-minus-square' => __('minus-square', 'options_framework_theme'),'fa fa-minus-square-o' => __('minus-square-o', 'options_framework_theme'),'fa fa-plus-square' => __('plus-square', 'options_framework_theme'),'fa fa-plus-square-o' => __('plus-square-o', 'options_framework_theme'),'fa fa-square' => __('square', 'options_framework_theme'),'fa fa-square-o' => __('square-o', 'options_framework_theme'),'fa fa-bitcoin' => __('bitcoin', 'options_framework_theme'),'fa fa-btc' => __('btc', 'options_framework_theme'),'fa fa-cny' => __('cny', 'options_framework_theme'),'fa fa-dollar' => __('dollar', 'options_framework_theme'),'fa fa-eur' => __('eur', 'options_framework_theme'),'fa fa-euro' => __('euro', 'options_framework_theme'),'fa fa-gbp' => __('gbp', 'options_framework_theme'),'fa fa-inr' => __('inr', 'options_framework_theme'),'fa fa-jpy' => __('jpy', 'options_framework_theme'),'fa fa-krw' => __('krw', 'options_framework_theme'),'fa fa-money' => __('money', 'options_framework_theme'),'fa fa-rmb' => __('rmb', 'options_framework_theme'),'fa fa-rouble' => __('rouble', 'options_framework_theme'),'fa fa-rub' => __('rub', 'options_framework_theme'),'fa fa-ruble' => __('ruble', 'options_framework_theme'),'fa fa-rupee' => __('rupee', 'options_framework_theme'),'fa fa-try' => __('try', 'options_framework_theme'),'fa fa-turkish-lira' => __('turkish-lira', 'options_framework_theme'),'fa fa-usd' => __('usd', 'options_framework_theme'),'fa fa-won' => __('won', 'options_framework_theme'),'fa fa-yen' => __('yen', 'options_framework_theme'),'fa fa-align-center' => __('align-center', 'options_framework_theme'),'fa fa-align-justify' => __('align-justify', 'options_framework_theme'),'fa fa-align-left' => __('align-left', 'options_framework_theme'),'fa fa-align-right' => __('align-right', 'options_framework_theme'),'fa fa-bold' => __('bold', 'options_framework_theme'),'fa fa-chain' => __('chain', 'options_framework_theme'),'fa fa-chain-broken' => __('chain-broken', 'options_framework_theme'),'fa fa-clipboard' => __('clipboard', 'options_framework_theme'),'fa fa-columns' => __('columns', 'options_framework_theme'),'fa fa-copy' => __('copy', 'options_framework_theme'),'fa fa-cut' => __('cut', 'options_framework_theme'),'fa fa-dedent' => __('dedent', 'options_framework_theme'),'fa fa-eraser' => __('eraser', 'options_framework_theme'),'fa fa-file' => __('file', 'options_framework_theme'),'fa fa-file-o' => __('file-o', 'options_framework_theme'),'fa fa-file-text' => __('file-text', 'options_framework_theme'),'fa fa-file-text-o' => __('file-text-o', 'options_framework_theme'),'fa fa-files-o' => __('files-o', 'options_framework_theme'),'fa fa-floppy-o' => __('floppy-o', 'options_framework_theme'),'fa fa-font' => __('font', 'options_framework_theme'),'fa fa-header' => __('header', 'options_framework_theme'),'fa fa-indent' => __('indent', 'options_framework_theme'),'fa fa-italic' => __('italic', 'options_framework_theme'),'fa fa-link' => __('link', 'options_framework_theme'),'fa fa-list' => __('list', 'options_framework_theme'),'fa fa-list-alt' => __('list-alt', 'options_framework_theme'),'fa fa-list-ol' => __('list-ol', 'options_framework_theme'),'fa fa-list-ul' => __('list-ul', 'options_framework_theme'),'fa fa-outdent' => __('outdent', 'options_framework_theme'),'fa fa-paperclip' => __('paperclip', 'options_framework_theme'),'fa fa-paragraph' => __('paragraph', 'options_framework_theme'),'fa fa-paste' => __('paste', 'options_framework_theme'),'fa fa-repeat' => __('repeat', 'options_framework_theme'),'fa fa-rotate-left' => __('rotate-left', 'options_framework_theme'),'fa fa-rotate-right' => __('rotate-right', 'options_framework_theme'),'fa fa-save' => __('save', 'options_framework_theme'),'fa fa-scissors' => __('scissors', 'options_framework_theme'),'fa fa-strikethrough' => __('strikethrough', 'options_framework_theme'),'fa fa-subscript' => __('subscript', 'options_framework_theme'),'fa fa-superscript' => __('superscript', 'options_framework_theme'),'fa fa-table' => __('table', 'options_framework_theme'),'fa fa-text-height' => __('text-height', 'options_framework_theme'),'fa fa-text-width' => __('text-width', 'options_framework_theme'),'fa fa-th' => __('th', 'options_framework_theme'),'fa fa-th-large' => __('th-large', 'options_framework_theme'),'fa fa-th-list' => __('th-list', 'options_framework_theme'),'fa fa-underline' => __('underline', 'options_framework_theme'),'fa fa-undo' => __('undo', 'options_framework_theme'),'fa fa-unlink' => __('unlink', 'options_framework_theme'),'fa fa-angle-double-down' => __('angle-double-down', 'options_framework_theme'),'fa fa-angle-double-left' => __('angle-double-left', 'options_framework_theme'),'fa fa-angle-double-right' => __('angle-double-right', 'options_framework_theme'),'fa fa-angle-double-up' => __('angle-double-up', 'options_framework_theme'),'fa fa-angle-down' => __('angle-down', 'options_framework_theme'),'fa fa-angle-left' => __('angle-left', 'options_framework_theme'),'fa fa-angle-right' => __('angle-right', 'options_framework_theme'),'fa fa-angle-up' => __('angle-up', 'options_framework_theme'),'fa fa-arrow-circle-down' => __('arrow-circle-down', 'options_framework_theme'),'fa fa-arrow-circle-left' => __('arrow-circle-left', 'options_framework_theme'),'fa fa-arrow-circle-o-down' => __('arrow-circle-o-down', 'options_framework_theme'),'fa fa-arrow-circle-o-left' => __('arrow-circle-o-left', 'options_framework_theme'),'fa fa-arrow-circle-o-right' => __('arrow-circle-o-right', 'options_framework_theme'),'fa fa-arrow-circle-o-up' => __('arrow-circle-o-up', 'options_framework_theme'),'fa fa-arrow-circle-right' => __('arrow-circle-right', 'options_framework_theme'),'fa fa-arrow-circle-up' => __('arrow-circle-up', 'options_framework_theme'),'fa fa-arrow-down' => __('arrow-down', 'options_framework_theme'),'fa fa-arrow-left' => __('arrow-left', 'options_framework_theme'),'fa fa-arrow-right' => __('arrow-right', 'options_framework_theme'),'fa fa-arrow-up' => __('arrow-up', 'options_framework_theme'),'fa fa-arrows' => __('arrows', 'options_framework_theme'),'fa fa-arrows-alt' => __('arrows-alt', 'options_framework_theme'),'fa fa-arrows-h' => __('arrows-h', 'options_framework_theme'),'fa fa-arrows-v' => __('arrows-v', 'options_framework_theme'),'fa fa-caret-down' => __('caret-down', 'options_framework_theme'),'fa fa-caret-left' => __('caret-left', 'options_framework_theme'),'fa fa-caret-right' => __('caret-right', 'options_framework_theme'),'fa fa-caret-square-o-down' => __('caret-square-o-down', 'options_framework_theme'),'fa fa-caret-square-o-left' => __('caret-square-o-left', 'options_framework_theme'),'fa fa-caret-square-o-right' => __('caret-square-o-right', 'options_framework_theme'),'fa fa-caret-square-o-up' => __('caret-square-o-up', 'options_framework_theme'),'fa fa-caret-up' => __('caret-up', 'options_framework_theme'),'fa fa-chevron-circle-down' => __('chevron-circle-down', 'options_framework_theme'),'fa fa-chevron-circle-left' => __('chevron-circle-left', 'options_framework_theme'),'fa fa-chevron-circle-right' => __('chevron-circle-right', 'options_framework_theme'),'fa fa-chevron-circle-up' => __('chevron-circle-up', 'options_framework_theme'),'fa fa-chevron-down' => __('chevron-down', 'options_framework_theme'),'fa fa-chevron-left' => __('chevron-left', 'options_framework_theme'),'fa fa-chevron-right' => __('chevron-right', 'options_framework_theme'),'fa fa-chevron-up' => __('chevron-up', 'options_framework_theme'),'fa fa-hand-o-down' => __('hand-o-down', 'options_framework_theme'),'fa fa-hand-o-left' => __('hand-o-left', 'options_framework_theme'),'fa fa-hand-o-right' => __('hand-o-right', 'options_framework_theme'),'fa fa-hand-o-up' => __('hand-o-up', 'options_framework_theme'),'fa fa-long-arrow-down' => __('long-arrow-down', 'options_framework_theme'),'fa fa-long-arrow-left' => __('long-arrow-left', 'options_framework_theme'),'fa fa-long-arrow-right' => __('long-arrow-right', 'options_framework_theme'),'fa fa-long-arrow-up' => __('long-arrow-up', 'options_framework_theme'),'fa fa-toggle-down' => __('toggle-down', 'options_framework_theme'),'fa fa-toggle-left' => __('toggle-left', 'options_framework_theme'),'fa fa-toggle-right' => __('toggle-right', 'options_framework_theme'),'fa fa-toggle-up' => __('toggle-up', 'options_framework_theme'),'fa fa-arrows-alt' => __('arrows-alt', 'options_framework_theme'),'fa fa-backward' => __('backward', 'options_framework_theme'),'fa fa-compress' => __('compress', 'options_framework_theme'),'fa fa-eject' => __('eject', 'options_framework_theme'),'fa fa-expand' => __('expand', 'options_framework_theme'),'fa fa-fast-backward' => __('fast-backward', 'options_framework_theme'),'fa fa-fast-forward' => __('fast-forward', 'options_framework_theme'),'fa fa-forward' => __('forward', 'options_framework_theme'),'fa fa-pause' => __('pause', 'options_framework_theme'),'fa fa-play' => __('play', 'options_framework_theme'),'fa fa-play-circle' => __('play-circle', 'options_framework_theme'),'fa fa-play-circle-o' => __('play-circle-o', 'options_framework_theme'),'fa fa-step-backward' => __('step-backward', 'options_framework_theme'),'fa fa-step-forward' => __('step-forward', 'options_framework_theme'),'fa fa-stop' => __('stop', 'options_framework_theme'),'fa fa-youtube-play' => __('youtube-play', 'options_framework_theme'),'fa fa-warning' => __('warning', 'options_framework_theme'),'fa fa-adn' => __('adn', 'options_framework_theme'),'fa fa-android' => __('android', 'options_framework_theme'),'fa fa-apple' => __('apple', 'options_framework_theme'),'fa fa-behance' => __('behance', 'options_framework_theme'),'fa fa-behance-square' => __('behance-square', 'options_framework_theme'),'fa fa-bitbucket' => __('bitbucket', 'options_framework_theme'),'fa fa-bitbucket-square' => __('bitbucket-square', 'options_framework_theme'),'fa fa-bitcoin' => __('bitcoin', 'options_framework_theme'),'fa fa-btc' => __('btc', 'options_framework_theme'),'fa fa-codepen' => __('codepen', 'options_framework_theme'),'fa fa-css3' => __('css3', 'options_framework_theme'),'fa fa-delicious' => __('delicious', 'options_framework_theme'),'fa fa-deviantart' => __('deviantart', 'options_framework_theme'),'fa fa-digg' => __('digg', 'options_framework_theme'),'fa fa-dribbble' => __('dribbble', 'options_framework_theme'),'fa fa-dropbox' => __('dropbox', 'options_framework_theme'),'fa fa-drupal' => __('drupal', 'options_framework_theme'),'fa fa-empire' => __('empire', 'options_framework_theme'),'fa fa-facebook' => __('facebook', 'options_framework_theme'),'fa fa-facebook-square' => __('facebook-square', 'options_framework_theme'),'fa fa-flickr' => __('flickr', 'options_framework_theme'),'fa fa-foursquare' => __('foursquare', 'options_framework_theme'),'fa fa-ge' => __('ge', 'options_framework_theme'),'fa fa-git' => __('git', 'options_framework_theme'),'fa fa-git-square' => __('git-square', 'options_framework_theme'),'fa fa-github' => __('github', 'options_framework_theme'),'fa fa-github-alt' => __('github-alt', 'options_framework_theme'),'fa fa-github-square' => __('github-square', 'options_framework_theme'),'fa fa-gittip' => __('gittip', 'options_framework_theme'),'fa fa-google' => __('google', 'options_framework_theme'),'fa fa-google-plus' => __('google-plus', 'options_framework_theme'),'fa fa-google-plus-square' => __('google-plus-square', 'options_framework_theme'),'fa fa-hacker-news' => __('hacker-news', 'options_framework_theme'),'fa fa-html5' => __('html5', 'options_framework_theme'),'fa fa-instagram' => __('instagram', 'options_framework_theme'),'fa fa-joomla' => __('joomla', 'options_framework_theme'),'fa fa-jsfiddle' => __('jsfiddle', 'options_framework_theme'),'fa fa-linkedin' => __('linkedin', 'options_framework_theme'),'fa fa-linkedin-square' => __('linkedin-square', 'options_framework_theme'),'fa fa-linux' => __('linux', 'options_framework_theme'),'fa fa-maxcdn' => __('maxcdn', 'options_framework_theme'),'fa fa-openid' => __('openid', 'options_framework_theme'),'fa fa-pagelines' => __('pagelines', 'options_framework_theme'),'fa fa-pied-piper' => __('pied-piper', 'options_framework_theme'),'fa fa-pied-piper-alt' => __('pied-piper-alt', 'options_framework_theme'),'fa fa-pied-piper-square' => __('pied-piper-square', 'options_framework_theme'),'fa fa-pinterest' => __('pinterest', 'options_framework_theme'),'fa fa-pinterest-square' => __('pinterest-square', 'options_framework_theme'),'fa fa-qq' => __('qq', 'options_framework_theme'),'fa fa-ra' => __('ra', 'options_framework_theme'),'fa fa-rebel' => __('rebel', 'options_framework_theme'),'fa fa-reddit' => __('reddit', 'options_framework_theme'),'fa fa-reddit-square' => __('reddit-square', 'options_framework_theme'),'fa fa-renren' => __('renren', 'options_framework_theme'),'fa fa-share-alt' => __('share-alt', 'options_framework_theme'),'fa fa-share-alt-square' => __('share-alt-square', 'options_framework_theme'),'fa fa-skype' => __('skype', 'options_framework_theme'),'fa fa-slack' => __('slack', 'options_framework_theme'),'fa fa-soundcloud' => __('soundcloud', 'options_framework_theme'),'fa fa-spotify' => __('spotify', 'options_framework_theme'),'fa fa-stack-exchange' => __('stack-exchange', 'options_framework_theme'),'fa fa-stack-overflow' => __('stack-overflow', 'options_framework_theme'),'fa fa-steam' => __('steam', 'options_framework_theme'),'fa fa-steam-square' => __('steam-square', 'options_framework_theme'),'fa fa-stumbleupon' => __('stumbleupon', 'options_framework_theme'),'fa fa-stumbleupon-circle' => __('stumbleupon-circle', 'options_framework_theme'),'fa fa-tencent-weibo' => __('tencent-weibo', 'options_framework_theme'),'fa fa-trello' => __('trello', 'options_framework_theme'),'fa fa-tumblr' => __('tumblr', 'options_framework_theme'),'fa fa-tumblr-square' => __('tumblr-square', 'options_framework_theme'),'fa fa-twitter' => __('twitter', 'options_framework_theme'),'fa fa-twitter-square' => __('twitter-square', 'options_framework_theme'),'fa fa-vimeo-square' => __('vimeo-square', 'options_framework_theme'),'fa fa-vine' => __('vine', 'options_framework_theme'),'fa fa-vk' => __('vk', 'options_framework_theme'),'fa fa-wechat' => __('wechat', 'options_framework_theme'),'fa fa-weibo' => __('weibo', 'options_framework_theme'),'fa fa-weixin' => __('weixin', 'options_framework_theme'),'fa fa-windows' => __('windows', 'options_framework_theme'),'fa fa-wordpress' => __('wordpress', 'options_framework_theme'),'fa fa-xing' => __('xing', 'options_framework_theme'),'fa fa-xing-square' => __('xing-square', 'options_framework_theme'),'fa fa-yahoo' => __('yahoo', 'options_framework_theme'),'fa fa-youtube' => __('youtube', 'options_framework_theme'),'fa fa-youtube-play' => __('youtube-play', 'options_framework_theme'),'fa fa-youtube-square' => __('youtube-square', 'options_framework_theme'),'fa fa-ambulance' => __('ambulance', 'options_framework_theme'),'fa fa-h-square' => __('h-square', 'options_framework_theme'),'fa fa-hospital-o' => __('hospital-o', 'options_framework_theme'),'fa fa-medkit' => __('medkit', 'options_framework_theme'),'fa fa-plus-square' => __('plus-square', 'options_framework_theme'),'fa fa-stethoscope' => __('stethoscope', 'options_framework_theme'),'fa fa-user-md' => __('user-md', 'options_framework_theme'),'fa fa-wheelchair' => __('wheelchair', 'options_framework_theme')       
    );
    $bool_array = array(
        'yes' => __('Yes', 'options_framework_theme'),
        'no' => __('No', 'options_framework_theme')
    );

    // Multicheck Array
    $multicheck_array = array(
        'one' => __('French Toast', 'options_framework_theme'),
        'two' => __('Pancake', 'options_framework_theme'),
        'three' => __('Omelette', 'options_framework_theme'),
        'four' => __('Crepe', 'options_framework_theme'),
        'five' => __('Waffle', 'options_framework_theme')
    );

    // Multicheck Defaults
    $multicheck_defaults = array(
        'one' => '1',
        'five' => '1'
    );

    // Background Defaults
    $background_defaults = array(
        'color' => '',
        'image' => '',
        'repeat' => 'repeat',
        'position' => 'top center',
        'attachment' => 'scroll');

    // Typography Defaults
    $typography_defaults = array(
        'size' => '15px',
        'face' => 'georgia',
        'style' => 'bold',
        'color' => '#bada55');

    // Typography Options
    $typography_options = array(
        'sizes' => array('6', '12', '14', '16', '20'),
        'faces' => array('Helvetica Neue' => 'Helvetica Neue', 'Arial' => 'Arial'),
        'styles' => array('normal' => 'Normal', 'bold' => 'Bold'),
        'color' => false
    );

    // Pull all the categories into an array
    $options_categories = array();
    $options_categories_obj = get_categories();
    foreach ($options_categories_obj as $category) {
        $options_categories[$category->cat_ID] = $category->cat_name;
    }

    // Pull all tags into an array
    $options_tags = array();
    $options_tags_obj = get_tags();
    foreach ($options_tags_obj as $tag) {
        $options_tags[$tag->term_id] = $tag->name;
    }


    // Pull all the pages into an array
    $options_pages = array();
    $options_pages_obj = get_pages('sort_column=post_parent,menu_order');
    $options_pages[''] = 'Select a page:';
    foreach ($options_pages_obj as $page) {
        $options_pages[$page->ID] = $page->post_title;
    }

    // If using image radio buttons, define a directory path
    $imagepath = get_template_directory_uri() . '/images/';

    $options = array();

    // ------------------------------------------------------------------ Basic Settings
    $options[] = array(
        'name' => __('Basic Settings', 'options_framework_theme'),
        'type' => 'heading');

    $options[] = array(
        'name' => __('Logo', 'options_framework_theme'),
        'desc' => __('Your website Logo.', 'options_framework_theme'),
        'id' => 'sc_logo_image',
        'type' => 'upload');

    $options[] = array(
        'name' => __('Header Bar', 'options_framework_theme'),
        'desc' => __('Toggle the headerbar on or off', 'options_framework_theme'),
        'id' => 'sc_headerbar_bool',
        'std' => 'yes',
        'type' => 'radio',
        'options' => $bool_array);

    $options[] = array(
        'name' => __('Facebook URL', 'options_framework_theme'),
        'desc' => __('Enter the URL for your Facebook Page', 'options_framework_theme'),
        'id' => 'sc_facebook_url',
        'std' => '',
        'type' => 'text');

    $options[] = array(
        'name' => __('Twitter URL', 'options_framework_theme'),
        'desc' => __('Enter the URL for your Facebook Page', 'options_framework_theme'),
        'id' => 'sc_twitter_url',
        'std' => '',
        'type' => 'text');

    $options[] = array(
        'name' => __('LinkedIn URL', 'options_framework_theme'),
        'desc' => __('Enter the URL for your LinkedIn Page', 'options_framework_theme'),
        'id' => 'sc_linkedin_url',
        'std' => '',
        'type' => 'text');

    $options[] = array(
        'name' => __('Google Plus URL', 'options_framework_theme'),
        'desc' => __('Enter the URL for your Google Plus Page', 'options_framework_theme'),
        'id' => 'sc_gplus_url',
        'std' => '',
        'type' => 'text');

    $options[] = array(
        'name' => __('Phone Number', 'options_framework_theme'),
        'desc' => __('A text input field.', 'options_framework_theme'),
        'id' => 'sc_phone_url',
        'std' => '',
        'type' => 'text');

    $options[] = array(
        'name' => __('Address', 'options_framework_theme'),
        'desc' => __('A text input field.', 'options_framework_theme'),
        'id' => 'sc_address_url',
        'std' => '',
        'type' => 'text');

    $options[] = array(
        'name' => __('Footer Text', 'options_framework_theme'),
        'desc' => __('Enter text for the footer', 'options_framework_theme'),
        'id' => 'sc_footer_text',
        'std' => '&#169; 2014 Your company name',
        'type' => 'textarea');


    // ---------------------------------------------------------------------- Slider
    $path = get_template_directory_uri() . '/images/demo-orange.png';    
    $options[] = array(
        'name' => __('Slider', 'options_framework_theme'),
        'type' => 'heading');
    $options[] = array(
        'name' => __('Slider', 'options_framework_theme'),
        'desc' => __('Toggle the Slider on or off', 'options_framework_theme'),
        'id' => 'sc_slider_bool',
        'std' => 'yes',
        'type' => 'radio',
        'options' => $bool_array);
    $options[] = array(
        'name' => __('Slide #1', 'options_framework_theme'),
        'desc' => __('First Slide', 'options_framework_theme'),
        'id' => 'sc_slide1_image',
        'std' => $path,
        'type' => 'upload');
    $options[] = array(
        'name' => __('Slide #1 Text', 'options_framework_theme'),
        'desc' => __('First Slide Text', 'options_framework_theme'),
        'id' => 'sc_slide1_text',
        'std' => 'Slide 1',
        'type' => 'text');
    
    $options[] = array(
        'name' => __('Slide #2', 'options_framework_theme'),
        'desc' => __('Second Slide', 'options_framework_theme'),
        'id' => 'sc_slide2_image',
        'std' => $path,
        'type' => 'upload');
    $options[] = array(
        'name' => __('Slide #2 Text', 'options_framework_theme'),
        'desc' => __('Second Slide Text', 'options_framework_theme'),
        'id' => 'sc_slide2_text',
        'std' => 'Slide 2',
        'type' => 'text');

    $options[] = array(
        'name' => __('Slide #3', 'options_framework_theme'),
        'desc' => __('Third Slide', 'options_framework_theme'),
        'id' => 'sc_slide3_image',
        'std' => $path,
        'type' => 'upload');
    $options[] = array(
        'name' => __('Slide #3 Text', 'options_framework_theme'),
        'desc' => __('Third Slide Text', 'options_framework_theme'),
        'id' => 'sc_slide3_text',
        'std' => 'Slide 3',
        'type' => 'text');
    //--------------------------------------------------------------------------- Homepage
    $options[] = array(
        'name' => __('Homepage', 'options_framework_theme'),
        'type' => 'heading');
    
    $options[] = array(
        'name' => __('Show 3 CTA Boxes', 'options_framework_theme'),
        'desc' => __('Toggle the CTAs on or off', 'options_framework_theme'),
        'id' => 'sc_cta_bool',
        'std' => 'yes',
        'type' => 'radio',
        'options' => $bool_array);    
    
    
    // box 1
    $options[] = array(
        'name' => __('Box #1 Title', 'options_framework_theme'),
        'desc' => __('First box title', 'options_framework_theme'),
        'id' => 'sc_cta1_title',
        'std' => 'Box 1 Title',
        'type' => 'text');
    
    $options[] = array(
        'name' => __('Box #1 Icon', 'options_framework_theme'),
        'desc' => __('Icon for the first box', 'options_framework_theme'),
        'id' => 'sc_cta1_icon',
        'std' => 'fa fa-desktop',
        'type' => 'select',
        'class' => 'mini', //mini, tiny, small
        'options' => $icon_array);
    
    $options[] = array(
        'name' => __('Box #1 Text', 'options_framework_theme'),
        'desc' => __('Textarea for Box #1', 'options_framework_theme'),
        'id' => 'sc_cta1_text',
        'std' => 'Box 1 Text. Input anything you want here',
        'type' => 'textarea');
    
    $options[] = array(
        'name' => __('Box #1 Link', 'options_framework_theme'),
        'desc' => __('URL box button links to', 'options_framework_theme'),
        'id' => 'sc_cta1_url',
        'std' => '',
        'type' => 'text');    
    // box 2
    $options[] = array(
        'name' => __('Box #2 Title', 'options_framework_theme'),
        'desc' => __('First box title', 'options_framework_theme'),
        'id' => 'sc_cta2_title',
        'std' => 'Box #2 Title',
        'type' => 'text');
    
    $options[] = array(
        'name' => __('Box #2 Icon', 'options_framework_theme'),
        'desc' => __('Icon for the second box', 'options_framework_theme'),
        'id' => 'sc_cta2_icon',
        'std' => 'fa fa-tachometer',
        'type' => 'select',
        'class' => 'mini', //mini, tiny, small
        'options' => $icon_array);
    
    $options[] = array(
        'name' => __('Box #2 Text', 'options_framework_theme'),
        'desc' => __('Textarea for Box #2', 'options_framework_theme'),
        'id' => 'sc_cta2_text',
        'std' => 'Box #2 text',
        'type' => 'textarea');
    
    $options[] = array(
        'name' => __('Box #2 Link', 'options_framework_theme'),
        'desc' => __('URL box button links to', 'options_framework_theme'),
        'id' => 'sc_cta2_url',
        'std' => '',
        'type' => 'text');
    
    //box3
        $options[] = array(
        'name' => __('Box #3 Title', 'options_framework_theme'),
        'desc' => __('Third box title', 'options_framework_theme'),
        'id' => 'sc_cta3_title',
        'std' => 'Box #3 Title',
        'type' => 'text');
    
    $options[] = array(
        'name' => __('Box #3 Icon', 'options_framework_theme'),
        'desc' => __('Icon for the third box', 'options_framework_theme'),
        'id' => 'sc_cta3_icon',
        'std' => 'fa fa-rocket',
        'type' => 'select',
        'class' => 'mini', //mini, tiny, small
        'options' => $icon_array);
    
    $options[] = array(
        'name' => __('Box #3 Text', 'options_framework_theme'),
        'desc' => __('Textarea for Box #3', 'options_framework_theme'),
        'id' => 'sc_cta3_text',
        'std' => 'Box #3 Text',
        'type' => 'textarea');
    
    $options[] = array(
        'name' => __('Box #3 Link', 'options_framework_theme'),
        'desc' => __('URL box button links to', 'options_framework_theme'),
        'id' => 'sc_cta3_url',
        'std' => '',
        'type' => 'text');
    

    $options[] = array(
        'name' => __('Show Banner', 'options_framework_theme'),
        'desc' => __('Toggle the banner on or off', 'options_framework_theme'),
        'id' => 'sc_banner_bool',
        'std' => 'yes',
        'type' => 'radio',
        'options' => $bool_array); 
    
    $options[] = array(
        'name' => __('Banner Call Out', 'options_framework_theme'),
        'desc' => __('Call Out Text', 'options_framework_theme'),
        'id' => 'sc_banner_text',
        'std' => 'Banner Call Out Text',
        'type' => 'text');    
    
    $options[] = array(
        'name' => __('Banner Link', 'options_framework_theme'),
        'desc' => __('URL to link to', 'options_framework_theme'),
        'id' => 'sc_banner_url',
        'std' => '',
        'type' => 'text');    
    
    //--------------------
    
    

//    $options[] = array(
//        'name' => __('Text Editor', 'options_framework_theme'),
//        'type' => 'heading');
//    $options[] = array(
//        'name' => __('Input Text Mini', 'options_framework_theme'),
//        'desc' => __('A mini text input field.', 'options_framework_theme'),
//        'id' => 'example_text_mini',
//        'std' => 'Default',
//        'class' => 'mini',
//        'type' => 'text');
//
//    $options[] = array(
//        'name' => __('Input Text', 'options_framework_theme'),
//        'desc' => __('A text input field.', 'options_framework_theme'),
//        'id' => 'example_text',
//        'std' => 'Default Value',
//        'type' => 'text');
//
//    $options[] = array(
//        'name' => __('Textarea', 'options_framework_theme'),
//        'desc' => __('Textarea description.', 'options_framework_theme'),
//        'id' => 'example_textarea',
//        'std' => 'Default Text',
//        'type' => 'textarea');
//
//    $options[] = array(
//        'name' => __('Input Select Small', 'options_framework_theme'),
//        'desc' => __('Small Select Box.', 'options_framework_theme'),
//        'id' => 'example_select',
//        'std' => 'three',
//        'type' => 'select',
//        'class' => 'mini', //mini, tiny, small
//        'options' => $test_array);
//
//    $options[] = array(
//        'name' => __('Input Select Wide', 'options_framework_theme'),
//        'desc' => __('A wider select box.', 'options_framework_theme'),
//        'id' => 'example_select_wide',
//        'std' => 'two',
//        'type' => 'select',
//        'options' => $test_array);
//
//    if ($options_categories) {
//        $options[] = array(
//            'name' => __('Select a Category', 'options_framework_theme'),
//            'desc' => __('Passed an array of categories with cat_ID and cat_name', 'options_framework_theme'),
//            'id' => 'example_select_categories',
//            'type' => 'select',
//            'options' => $options_categories);
//    }
//
//    if ($options_tags) {
//        $options[] = array(
//            'name' => __('Select a Tag', 'options_check'),
//            'desc' => __('Passed an array of tags with term_id and term_name', 'options_check'),
//            'id' => 'example_select_tags',
//            'type' => 'select',
//            'options' => $options_tags);
//    }
//
//    $options[] = array(
//        'name' => __('Select a Page', 'options_framework_theme'),
//        'desc' => __('Passed an pages with ID and post_title', 'options_framework_theme'),
//        'id' => 'example_select_pages',
//        'type' => 'select',
//        'options' => $options_pages);
//
//    $options[] = array(
//        'name' => __('Input Radio (one)', 'options_framework_theme'),
//        'desc' => __('Radio select with default options "one".', 'options_framework_theme'),
//        'id' => 'example_radio',
//        'std' => 'one',
//        'type' => 'radio',
//        'options' => $test_array);
//
//    $options[] = array(
//        'name' => __('Example Info', 'options_framework_theme'),
//        'desc' => __('This is just some example information you can put in the panel.', 'options_framework_theme'),
//        'type' => 'info');
//
//    $options[] = array(
//        'name' => __('Input Checkbox', 'options_framework_theme'),
//        'desc' => __('Example checkbox, defaults to true.', 'options_framework_theme'),
//        'id' => 'example_checkbox',
//        'std' => '1',
//        'type' => 'checkbox');
//    
//
//    $options[] = array(
//        'name' => __('Check to Show a Hidden Text Input', 'options_framework_theme'),
//        'desc' => __('Click here and see what happens.', 'options_framework_theme'),
//        'id' => 'example_showhidden',
//        'type' => 'checkbox');
//
//    $options[] = array(
//        'name' => __('Hidden Text Input', 'options_framework_theme'),
//        'desc' => __('This option is hidden unless activated by a checkbox click.', 'options_framework_theme'),
//        'id' => 'example_text_hidden',
//        'std' => 'Hello',
//        'class' => 'hidden',
//        'type' => 'text');
//
//    $options[] = array(
//        'name' => __('Uploader Test', 'options_framework_theme'),
//        'desc' => __('This creates a full size uploader that previews the image.', 'options_framework_theme'),
//        'id' => 'example_uploader',
//        'type' => 'upload');
//
//    $options[] = array(
//        'name' => "Example Image Selector",
//        'desc' => "Images for layout.",
//        'id' => "example_images",
//        'std' => "2c-l-fixed",
//        'type' => "images",
//        'options' => array(
//            '1col-fixed' => $imagepath . '1col.png',
//            '2c-l-fixed' => $imagepath . '2cl.png',
//            '2c-r-fixed' => $imagepath . '2cr.png')
//    );
//
//    $options[] = array(
//        'name' => __('Example Background', 'options_framework_theme'),
//        'desc' => __('Change the background CSS.', 'options_framework_theme'),
//        'id' => 'example_background',
//        'std' => $background_defaults,
//        'type' => 'background');
//
//    $options[] = array(
//        'name' => __('Multicheck', 'options_framework_theme'),
//        'desc' => __('Multicheck description.', 'options_framework_theme'),
//        'id' => 'example_multicheck',
//        'std' => $multicheck_defaults, // These items get checked by default
//        'type' => 'multicheck',
//        'options' => $multicheck_array);
//
//    $options[] = array(
//        'name' => __('Colorpicker', 'options_framework_theme'),
//        'desc' => __('No color selected by default.', 'options_framework_theme'),
//        'id' => 'example_colorpicker',
//        'std' => '',
//        'type' => 'color');
//
//    $options[] = array('name' => __('Typography', 'options_framework_theme'),
//        'desc' => __('Example typography.', 'options_framework_theme'),
//        'id' => "example_typography",
//        'std' => $typography_defaults,
//        'type' => 'typography');
//
//    $options[] = array(
//        'name' => __('Custom Typography', 'options_framework_theme'),
//        'desc' => __('Custom typography options.', 'options_framework_theme'),
//        'id' => "custom_typography",
//        'std' => $typography_defaults,
//        'type' => 'typography',
//        'options' => $typography_options);


    /**
     * For $settings options see:
     * http://codex.wordpress.org/Function_Reference/wp_editor
     *
     * 'media_buttons' are not supported as there is no post to attach items to
     * 'textarea_name' is set by the 'id' you choose
     */
    /*
    $wp_editor_settings = array(
        'wpautop' => true, // Default
        'textarea_rows' => 5,
        'tinymce' => array('plugins' => 'wordpress')
    );

    $options[] = array(
        'name' => __('Default Text Editor', 'options_framework_theme'),
        'desc' => sprintf(__('You can also pass settings to the editor.  Read more about wp_editor in <a href="%1$s" target="_blank">the WordPress codex</a>', 'options_framework_theme'), 'http://codex.wordpress.org/Function_Reference/wp_editor'),
        'id' => 'example_editor',
        'type' => 'editor',
        'settings' => $wp_editor_settings);
     * 
     */

    return $options;
}