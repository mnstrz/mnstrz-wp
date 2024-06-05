<?php

\mnstrz\app\Routes::web('mnstrz-test',[\mnstrz\controllers\TestHomepage::class,'index']);
\mnstrz\app\Routes::admin('mnstrz-settings',[\mnstrz\controllers\TestHomepage::class,'settings'])->addMenu('Monsterz Settings','General');