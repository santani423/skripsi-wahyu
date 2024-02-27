<?php

namespace App\View\Components\Layout;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Master extends Component
{
    /**
     * Create a new component instance.
     */
    public $body, $css, $jd, $title, $breadcrumbRight;
    public function __construct(
        $body = '',
        $css = '',
        $jd = '',
        $title = '',
        $breadcrumbRight = '',
    ) {
        $this->body = $body;
        $this->css = $css;
        $this->jd = $jd;
        $this->title = $title;
        $this->breadcrumbRight = $breadcrumbRight;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layout.master');
    }
}
