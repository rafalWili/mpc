<?php
require_once __DIR__ . '/inc/libs/class-tgm-plugin-activation.php';
require_once __DIR__ . '/inc/class-plugin-dependencies.php';
require_once __DIR__ . '/inc/class-post-type.php';
require_once __DIR__ . '/inc/class-taxonomies.php';
require_once __DIR__ . '/inc/class-acf-fields.php';
require_once __DIR__ . '/inc/class-admin-notices.php';
require_once __DIR__ . '/inc/class-theme-assets.php';
require_once __DIR__ . '/inc/class-theme-init.php';

// run the theme initialization
new ThemeInit();