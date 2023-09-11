<?php

namespace App\Module2;

use App\Modules\Entity\Module;

class Module2Service {
    private Module $module;

    public function __construct(Module $module)
    {
        $this->module = $module;
    }
}
