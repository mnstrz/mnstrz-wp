<?php

\mnstrz\app\Routes::web('mnstrz-test',[\mnstrz\controllers\TestHomepage::class,'index']);
\mnstrz\app\Routes::admin('mnstrz-settings',[\mnstrz\controllers\TestHomepage::class,'settings'])
	->add_menu_page(
		'Monsterz Settings',
		'Monsterz Settings'
	);
\mnstrz\app\Routes::admin('mnstrz-settings-sub-menu-1',[\mnstrz\controllers\TestHomepage::class,'settings'])
	->add_submenu_page(
		'mnstrz-settings',
		'Monsterz Settings Sub Menu 1',
		'Sub Menu 1'
	);
\mnstrz\app\Routes::admin('mnstrz-settings-sub-menu-2',[\mnstrz\controllers\TestHomepage::class,'settings'])
	->add_submenu_page(
		'mnstrz-settings',
		'Monsterz Settings Sub Menu 2',
		'Sub Menu 2'
	);