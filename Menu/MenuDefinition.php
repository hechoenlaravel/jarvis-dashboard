<?php

namespace Modules\Dashboard\Menu;

/**
 * Class MenuDefinition
 * @package Modules\Users\Menu
 */
class MenuDefinition
{

    /**
     * @var \Illuminate\Support\Collection
     */
    public $items;

    /**
     * MenuDefinition constructor.
     */
    public function __construct()
    {
        $this->items = collect();
        $this->items->push($this->getDemoMenu());
    }

    /**
     * @return string
     */
    public function getName()
    {
        return "Dashboard";
    }

    /**
     * @return string
     */
    public function isDropdown()
    {
        return false;
    }

    /**
     * @return string
     */
    public function getInstance()
    {
        return 'sidebar';
    }

    /**
     * @return array
     */
    public function getDemoMenu()
    {
        return [
            'url' => 'dashboard/demo',
            'type' => 'url',
            'name' => 'Dashboard demo',
            'active-state' => function() {
                $request = app('Illuminate\Http\Request');
                return $request->is('dashboard/demo*');
            },
            'ability' => function() {
                return false;
            }
        ];
    }

}