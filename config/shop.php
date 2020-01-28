<?php

return [

	'routes' => [
		// 'login' => ['middleware' => ['web']],
		// 'admin' => ['prefix' => 'admin', 'middleware' => ['web']],
		// 'jqadm' => ['prefix' => 'admin/{site}/jqadm', 'middleware' => ['web', 'auth']],
		// 'extadm' => ['prefix' => 'admin/{site}/extadm', 'middleware' => ['web', 'auth']],
		// 'jsonadm' => ['prefix' => 'admin/{site}/jsonadm', 'middleware' => ['web', 'auth']],
		// 'jsonapi' => ['prefix' => 'jsonapi', 'middleware' => ['web', 'api']],
		// 'account' => ['middleware' => ['web', 'auth']],
		// 'default' => ['middleware' => ['web']],
		// 'update' => [],
	],

	'page' => [
		// 'account-index' => [ 'account/profile','account/subscription','account/history','account/favorite','account/watch','basket/mini','catalog/session' ],
		// 'basket-index' => [ 'basket/standard','basket/related' ],
		// 'catalog-count' => [ 'catalog/count' ],
		// 'catalog-detail' => [ 'basket/mini','catalog/stage','catalog/detail','catalog/session' ],
		// Hint: catalog/filter is also available as single 'catalog/tree', 'catalog/search', 'catalog/attribute' (https://aimeos.org/docs/Laravel/Adapt_pages)
		// 'catalog-list' => [ 'basket/mini','catalog/filter','catalog/stage','catalog/lists' ],
		// 'catalog-stock' => [ 'catalog/stock' ],
		// 'catalog-suggest' => [ 'catalog/suggest' ],
		// 'checkout-confirm' => [ 'checkout/confirm' ],
		// 'checkout-index' => [ 'checkout/standard' ],
		// 'checkout-update' => [ 'checkout/update' ],
	],


	'resource' => [
		'db' => [
			'adapter' => env('DB_CONNECTION', 'mysql'),
			'host' => env('DB_HOST', 'localhost'),
			'port' => env('DB_PORT', ''),
			'socket' => env('DB_SOCKET', ''),
			'database' => env('DB_DATABASE', 'laravel'),
			'username' => env('DB_USERNAME', 'root'),
			'password' => env('DB_PASSWORD', ''),
			'stmt' => ["SET SESSION sort_buffer_size=2097144; SET NAMES 'utf8'; SET SESSION sql_mode='ANSI'"],
			'limit' => 3, // maximum number of concurrent database connections
		],
	],


	'admin' => [],

	'client' => [
		'html' => [
			'basket' => [
				'cache' => [
					 'enable' => false, // Disable basket content caching
				],
			],
			'common' => [
				'content' => [
					 'baseurl' => config( 'app.url' ) . '/',
				],
				'template' => [
					 'baseurl' => public_path( 'packages/aimeos/shop/themes/elegance' ),
				],
			],
            'catalog' => [
              'filter' => [
                  'default' => [
                      'button' => 1
                      ]
              ,]
            ],
		],
	],

	'controller' => [

        'jobs' => array(
            'product' => array(
                'import' => array(
                    'csv' => array(
                        'location' => '/Applications/MAMP/htdocs/motomotion/csvimport/'
                    ),
                    'container' => [
                        'type' => 'Directory',
                        'content' => 'CSV',
                    ],
                    'mapping' => array(
                        'item' =>
                            array(
                                'item' => array(
                                    0 => 'product.code', // e.g. unique EAN code
                                    1 => 'product.label', // UTF-8 encoded text, also used as product name
                                    2 => 'product.type', // type of the product, e.g. "default" or "selection"
                                    3 => 'product.status', // enabled (1) or disabled (0)
                                ),
                                'text' => array(
                                    4 => 'text.type', // e.g. "short" for short description
                                    5 => 'text.content', // UTF-8 encoded text
                                    //6 => 'text.languageid', // UTF-8 encoded text
                                    6 => 'text.type', // e.g. "long" for long description
                                    7 => 'text.content', // UTF-8 encoded text
                                    //s9 => 'text.languageid', // UTF-8 encoded text
                                ),
                                'media' => array(
                                    8 => 'media.url',
                                ),
                                'price' => array(
                                    9 => 'price.currencyid', // three letter ISO currency code
                                    10 => 'price.quantity', // the quantity the price (for block pricing)
                                    11 => 'price.value', // price with decimals separated by a dot
                                    12 => 'price.taxrate', // tax rate with decimals separated by a dot
                                ),
                                'attribute' => array(
                                    13 => 'attribute.code', // code of an attribute, will be created if not exists
                                    14 => 'attribute.type', // e.g. "size", "length", "width", "color", etc.
                                    16 => 'product.lists.type', // e.g. "suggestion" for suggested product
                                ),
                                /*
                                'product' => array(
                                    15 => 'product.code', // e.g. EAN code of another product
                                    16 => 'product.lists.type', // e.g. "suggestion" for suggested product
                                ),
                                'property' => array(
                                    17 => 'product.property.value', // arbitrary value for the corresponding type
                                    18 => 'product.property.type', // e.g. "package-weight"
                                ),
                                'catalog' => array(
                                    19 => 'catalog.code', // e.g. Unique category code
                                    20 => 'catalog.lists.type', // e.g. "promotion" for top seller products
                                ),
                                /*
                                'stock' => array(
                                    21 => 'stock.stocklevel',
                                    22 => 'stock.type',
                                    23 => 'stock.typeid',
                                    24 => 'stock.dateback',
                                ),
                                */
                            )
                    )
                ),
                'export' => array(
                    'location' => '/Applications/MAMP/htdocs/motomotion/csvimport/',
                    'sitemap' => array(
                        'location' => '/Applications/MAMP/htdocs/motomotion/csvimport/'
                    ),
                )
            )
        )

	],

	'i18n' => [
	],

	'madmin' => [
		'cache' => [
			'manager' => [
				// 'name' => 'None', // Disable caching
			],
		],
		'log' => [
			'manager' => [
				'standard' => [
					// 'loglevel' => 7, // Enable debug logging into madmin_log table
				],
			],
		],
	],

	'mshop' => [
	],


	'command' => [
	],

	'frontend' => [
	],

	'backend' => [
	],

];
