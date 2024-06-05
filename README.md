## Mnztrz WP

This is wordpress plugin structure to easy build wordpress plugin

- Routing
- Controllers
- View
- Database

## How to use

1. Clone this repository into `wp-content/plugins` 
2. Rename folder name `mnstrz-wp` to whatever you want
3. Rename file `mnstrz-wp.php` to same with your folder
4. Change the namespace `mnstrz\\` with your plugin namespace on `mnstrz-wp.php` (please dont use `-`)
5. Replace all `mnstrz` string to your plugin name
    - `classes\Controller`
    - `classess\Db`
    - `classess\Main`
    - `classess\Routes`
    - `database\Database`
    - `routes\web.php`
6. I have make an example controller on `controllers\TestHomepage` so just make the same one if you are need
7. I also make an example route on `routes\web.php` so just make same script