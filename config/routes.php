<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Core\Plugin;
use Cake\Routing\Router;

/**
 * The default class to use for all routes
 *
 * The following route classes are supplied with CakePHP and are appropriate
 * to set as the default:
 *
 * - Route
 * - InflectedRoute
 * - DashedRoute
 *
 * If no call is made to `Router::defaultRouteClass`, the class used is
 * `Route` (`Cake\Routing\Route\Route`)
 *
 * Note that `Route` does not do any inflections on URLs which will result in
 * inconsistently cased URLs when used with `:plugin`, `:controller` and
 * `:action` markers.
 *
 */
Router::defaultRouteClass('Route');

Router::scope('/', function ($routes) {
    /**
     * Here, we are connecting '/' (base path) to a controller called 'Pages',
     * its action called 'display', and we pass a param to select the view file
     * to use (in this case, src/Template/Pages/home.ctp)...
     */
    $routes->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);

    /**
     * ...and connect the rest of 'Pages' controller's URLs.
     */
    $routes->connect('/p/*', ['controller' => 'Pages', 'action' => 'view']);
	$routes->connect('/search/*', ['controller' => 'Pages', 'action' => 'search']);
	$routes->connect('/unit/*', ['controller' => 'Unitbylocations', 'action' => 'view']);
	$routes->connect('/admin', ['controller' => 'Users', 'action' => 'login']);
	$routes->connect('/location/*', ['controller' => 'Locations', 'action' => 'view']);
	$routes->connect('/sublocation/*', ['controller' => 'PropertypeSublocations', 'action' => 'view']);
	$routes->connect('/property/*', ['controller' => 'PropertypeLocations', 'action' => 'index']);
	$routes->connect('/builder', ['controller' => 'Builders', 'action' => 'index']);
	$routes->connect('/builder/*', ['controller' => 'Builders', 'action' => 'view']);
	$routes->connect('/project', ['controller' => 'Properties', 'action' => 'index']);
	$routes->connect('/project/*', ['controller' => 'Properties', 'action' => 'view']);
	$routes->connect('/post', ['controller' => 'Blogs', 'action' => 'index']);
	$routes->connect('/post/:url', ['controller' => 'Blogs', 'action' => 'view']);
	$routes->connect('/post/:category/:url', ['controller' => 'Blogs', 'action' => 'category']);
	$routes->connect('/contact-us', ['controller' => 'Pages','action' => 'contactus']);
	$routes->connect('/about-us', ['controller' => 'Pages','action' => 'aboutus']);
	$routes->connect('/disclaimer', ['controller' => 'Pages','action' => 'disclaimer']);
	$routes->connect('/sitemaps', ['controller' => 'Pages','action' => 'sitemap']);
	$routes->connect('/nri-real-estate-investment', ['controller' => 'Pages','action' => 'nri']);
	$routes->connect('/thank-you', ['controller' => 'Pages','action' => 'thankYou']);
	
	
	

    /**
     * Connect catchall routes for all controllers.
     *
     * Using the argument `InflectedRoute`, the `fallbacks` method is a shortcut for
     *    `$routes->connect('/:controller', ['action' => 'index'], ['routeClass' => 'InflectedRoute']);`
     *    `$routes->connect('/:controller/:action/*', [], ['routeClass' => 'InflectedRoute']);`
     *
     * Any route class can be used with this method, such as:
     * - DashedRoute
     * - InflectedRoute
     * - Route
     * - Or your own route class
     *
     * You can remove these routes once you've connected the
     * routes you want in your application.
     */
    $routes->fallbacks('InflectedRoute');
});

Router::prefix('admin', function ($routes) {
    // All routes here will be prefixed with `/admin`
    // And have the prefix => admin route element added.
    $routes->fallbacks('InflectedRoute');
	
});


/**
 * Load all plugin routes.  See the Plugin documentation on
 * how to customize the loading of plugin routes.
 */
Plugin::routes();
