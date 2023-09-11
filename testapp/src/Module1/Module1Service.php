<?php

namespace App\Module1;

use App\Modules\Entity\Module;

class Module1Service {
    private Module $module;

    public function __construct(Module $module)
    {
        $this->module = $module;
    }
}
