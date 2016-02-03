<?php

namespace App\Http\Controllers;

use App\Models\Training;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\View\View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @var array
     */
    private $_viewData = [];

    /**
     * Controller constructor.
     */
    public function __construct()
    {
        $this->createMenu();
    }

    /**
     * Get the evaluated view contents for the given view.
     *
     * @param string $view
     * @param array $data
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

    /**
     *
     */
    private function createMenu()
    {
        $schulungen = $this->getSchulungen();

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
            ]
        ];

        $menu = array_merge($menu, $schulungen);
        $menu = array_merge($menu, [
            [
                'type' => 'category',
                'label' => 'Auswertung'
            ],
            [
                'type' => 'link',
                'url' => url('/charts'),
                'label' => 'Auswertung',
                'active' => false
            ],
            [
                'type' => 'category',
                'label' => 'Einstellungen'
            ],
            [
                'type' => 'link',
                'url' => url('logout'),
                'label' => 'Abmelden',
                'active' => false
            ]
        ]);

        $this->assign('menu', $menu);
    }

    /**
     * @return array
     */
    private function getSchulungen()
    {
        $schulungen = Training::all();
        $menuItems = [];

        foreach ($schulungen as $schulung) {
            $menuItems[] = [
                'type' => 'link',
                'url' => route('trainings.show', ['id' => $schulung->id, 'slug' => $schulung->slug]),
                'label' => $schulung->name,
                'active' => false
            ];
        }

        return $menuItems;
    }
}
