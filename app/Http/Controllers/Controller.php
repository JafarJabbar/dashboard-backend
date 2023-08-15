<?php

namespace App\Http\Controllers;

use App\Models\Content\InfoBlocks;
use App\Models\Website\Languages;
use App\Models\Website\Settings;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    private mixed $languages;
    private mixed $settings;
    private mixed $informers;

    public function __construct()
    {


        $this->languages = Cache::remember('',3600*24*1000,function (){
            return Languages::where([['enable', 1], ['lang_code', 'ru']])->get();
        });

        $this->settings=Cache::remember('site_settings',3600*24*1000,function (){
            return Settings::all();
        });

        $this->informers=Cache::remember('info_blocks',3600*1000*24,function (){
            return InfoBlocks::select('title','svg_icon', 'id')->get();
        });
        $sidebarMenu=[
            'site_content'=>[
                'dashboard'=>[
                    'title'=>'sidebar.dashboard',
                    'icon'=>'home',
                    'permission'=>'admin.dashboard',
                    'route'=>'admin.dashboard',
                    'children'=>[]
                ],
                'news'=>[
                    'title'=>'sidebar.news',
                    'icon'=>'book-open',
                    'permission'=>'admin.news.list',
                    'route'=>'admin.content.list',
                    'params'=>['type'=>'news'],
                    'children'=>[]
                ],
                'slider'=>[
                    'title'=>'sidebar.slider',
                    'icon'=>'image',
                    'permission'=>'admin.slider.list',
                    'route'=>'admin.content.list',
                    'params'=>['type'=>'slider'],
                    'children'=>[]
                ],
                'faq'=>[
                    'title'=>'sidebar.faq',
                    'icon'=>'help-circle',
                    'permission'=>'admin.faq.list',
                    'route'=>'admin.faq.list',
                    'children'=>[]
                ],
                'notifications'=>[
                    'title'=>'sidebar.notifications',
                    'icon'=>'bell',
                    'permission'=>'admin.notifications.list',
                    'route'=>'admin.notifications.list',
                    'children'=>[]
                ],
                'campaigns'=>[
                    'title'=>'sidebar.campaigns',
                    'icon'=>'percent',
                    'permission'=>'admin.campaigns.list',
                    'route'=>'admin.campaigns.list',
                    'children'=>[]
                ],
                'pages'=>[
                    'title'=>'sidebar.pages',
                    'icon'=>'file',
                    'permission'=>'admin.pages.list',
                    'children'=>[
                        [
                            'title'=>'sidebar.pages',
                            'permission'=>'admin.pages.list',
                            'route'=>'admin.content.list',
                            'params'=>['type'=>'pages'],
                        ],
                        [
                            'title'=>'sidebar.page_blocks',
                            'permission'=>'admin.page_blocks.list',
                            'route'=>'admin.content.list',
                            'params'=>['type'=>'page_blocks'],
                        ],
                    ]
                ],
                'informers'=>[
                    'title'=>'sidebar.informers',
                    'icon'=>'info',
                    'permission'=>'admin.informers.list',
                    'route'=>'admin.informers.list',
                    'params'=>[],
                    'children'=>[]
                ],
                'stores'=>[
                    'title'=>'sidebar.stores',
                    'icon'=>'map-pin',
                    'permission'=>'admin.stores.list',
                    'route'=>'admin.stores.list',
                    'params'=>[],
                    'children'=>[]
                ],
                'subscribers'=>[
                    'title'=>'sidebar.subscribers',
                    'icon'=>'mail',
                    'permission'=>'admin.subscribers.list',
                    'route'=>'admin.subscribers.list',
                    'params'=>[],
                    'children'=>[]
                ],

                'products'=>[
                    'title'=>'sidebar.products',
                    'icon'=>'shopping-bag',
                    'permission'=>'admin.products.list',
                    'children'=>[
                        'products'=>[
                            'title'=>'sidebar.products',
                            'permission'=>'admin.products.list',
                            'route'=>'admin.products.list',
                        ],
                        'authors'=>[
                            'title'=>'sidebar.authors',
                            'permission'=>'admin.authors.list',
                            'route'=>'admin.authors.list',
                        ],
                        'product_config'=>[
                            'title'=>'sidebar.product_config',
                            'permission'=>'admin.product_config.list',
                            'route'=>'admin.product_config.list',
                        ],
                        'product_attributes'=>[
                            'title'=>'sidebar.product_attributes',
                            'permission'=>'admin.product_attributes.list',
                            'route'=>'admin.product_attributes.list',
                        ],

                        'product_categories'=>[
                            'title'=>'sidebar.product_categories',
                            'permission'=>'admin.product_categories.list',
                            'route'=>'admin.product_categories.list',
                        ],
                        'brands'=>[
                            'title'=>'sidebar.brands',
                            'permission'=>'admin.brands.list',
                            'route'=>'admin.brands.list',
                        ],
                    ]
                ],
                'orders'=>[
                    'title'=>'sidebar.orders',
                    'icon'=>'clipboard',
                    'permission'=>'admin.orders.list',
                    'route'=>'admin.orders.list',
                    'params'=>[],
                    'children'=>[]
                ],
            ],
            'site_parameters'=>[
                'menus'=>[
                    'title'=>'sidebar.menu',
                    'icon'=>'menu',
                    'permission'=>'admin.menu.list',
                    'children'=>[
                        'menu_elements'=>[
                            'title'=>'sidebar.menu_elements',
                            'permission'=>'admin.menu.list',
                            'route'=>'admin.menu.list',
                            'children'=>[]
                        ],
                        'menu_types'=>[
                            'title'=>'sidebar.menu_types',
                            'permission'=>'admin.menu_types.list',
                            'route'=>'admin.menu_types.list',
                            'children'=>[]
                        ],
                    ]
                ],
                'localization'=>[
                    'title'=>'sidebar.localization',
                    'icon'=>'globe',
                    'permission'=>'admin.languages.list',
                    'children'=>[
                        'languages'=>[
                            'title'=>'sidebar.languages',
                            'permission'=>'admin.languages.list',
                            'route'=>'admin.languages.list',
                            'children'=>[]
                        ],
                        'translates'=>[
                            'title'=>'sidebar.translates',
                            'permission'=>'admin.translates.list',
                            'route'=>'admin.translates.list',
                            'children'=>[]
                        ],
                    ]
                ],
                'site_settings'=>[
                    'title'=>'sidebar.site_settings',
                    'icon'=>'settings',
                    'route'=>'admin.settings.show',
                    'permission'=>'admin.site_settings.show',
                    'children'=>[]
                ],
                'media'=>[
                    'title'=>'sidebar.media',
                    'icon'=>'camera',
                    'route'=>'admin.media.list',
                    'permission'=>'admin.media.list',
                    'children'=>[]
                ],
            ],
            'site_administration'=>[
                'users'=>[
                    'title'=>'sidebar.users',
                    'icon'=>'users',
                    'permission'=>'admin.users.list',
                    'children'=>[
                        'admin_users'=>[
                            'title'=>'sidebar.admin_users',
                            'permission'=>'admin.users.list',
                            'route'=>'admin.users.list',
                            'children'=>[]
                        ],
                        'site_users'=>[
                            'title'=>'sidebar.site_users',
                            'permission'=>'admin.site_users.list',
                            'route'=>'admin.site_users.list',
                            'children'=>[]
                        ],
                    ]
                ],
                'roles'=>[
                    'title'=>'sidebar.roles',
                    'icon'=>'user-check',
                    'permission'=>'admin.roles.list',
                    'route'=>'admin.roles.list',
                    'children'=>[]
                ],
            ]
        ];


        View::share(['languages' => $this->languages,'settings' => $this->settings,'sidebarMenu'=>$sidebarMenu,'informers'=>$this->informers]);

    }
}
