<?php

namespace Anditsung\Master;

use Anditsung\Master\Nova\Color;
use Anditsung\Master\Nova\UnitType;
use Laravel\Nova\Nova;
use Laravel\Nova\Tool;

class Master extends Tool
{
    /**
     * Perform any tasks that need to happen when the tool is booted.
     *
     * @return void
     */
    public function boot()
    {
        Nova::script('master', __DIR__.'/../dist/js/tool.js');
        Nova::style('master', __DIR__.'/../dist/css/tool.css');

        Nova::resources([
            UnitType::class,
            Color::class,
        ]);
    }

    /**
     * Build the view that renders the navigation links for the tool.
     *
     * @return \Illuminate\View\View
     */
    public function renderNavigation()
    {
        return view('master::navigation');
    }
}
