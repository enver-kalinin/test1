<?php

namespace App\Modules;

use App\Modules\Entity\Module;

class ModuleManager {
    private Module $module;

    public function setModule(Module $module): static
    {
        $this->module = $module;

        return $this;
    }

    /**
     * @throws \LogicException
    */
    public function getModule(): Module
    {
        if (null === $this->module) {
            throw new \LogicException('Module was not set');
        }

        return $this->module;
    }
}
