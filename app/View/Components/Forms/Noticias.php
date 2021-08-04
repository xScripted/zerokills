<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class Noticias extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $typeId;
    public $dbData;
    public $method;
    public $submitBtn;

    public function __construct($typeId, $dbData, $method, $submitBtn) {
    
        $this->typeId = $typeId;
        $this->dbData = $dbData;
        $this->method = $method;
        $this->submitBtn = $submitBtn;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */



    public function render()
    {
        return view('components.forms.noticias');
    }
}
