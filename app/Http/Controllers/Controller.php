<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @var array
     */
    private $_viewData = [];

    public function __construct()
    {
        $menu = [
            [
                'type' => 'category',
                'label' => 'Module'
            ],
            [
                'type' => 'link',
                'url' => url('/'),
                'label' => 'Dashboard',
                'active' => false
            ],
            [
                'type' => 'link',
                'url' => url('/subscriber'),
                'label' => 'Teilnehmer',
                'active' => false
            ],


            [
                'type' => 'category',
                'label' => 'Schulungen'
            ],
            [
                'type' => 'link',
                'url' => url('/traning/developer'),
                'label' => 'Developer',
                'active' => false
            ],
            [
                'type' => 'link',
                'url' => url('/traning/developer-advanced'),
                'label' => 'Developer Plus',
                'active' => false
            ],
            [
                'type' => 'link',
                'url' => url('/traning/template'),
                'label' => 'Template',
                'active' => false
            ],
            [
                'type' => 'link',
                'url' => url('/traning/template-advanced'),
                'label' => 'Template Plus',
                'active' => false
            ],


            [
                'type' => 'category',
                'label' => 'Auswertung'
            ],
            [
                'type' => 'link',
                'url' => url('/charts'),
                'label' => 'Auswertung',
                'active' => false
            ]
        ];

        $this->assign('menu', $menu);
    }

    /**
     * Get the evaluated view contents for the given view.
     *
     * @param  string $view
     * @param  array  $data
     * @return View
     */
    public function render($view, array $data = [])
    {
        return view($view, array_merge($this->_viewData, $data));
    }

    /**
     * @param string $key
     * @param mixed $value
     */
    public function assign($key, $value)
    {
        $this->_viewData[$key] = $value;
    }
}
