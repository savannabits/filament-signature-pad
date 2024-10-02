<?php

namespace Coolsam\SignaturePad\Forms\Concerns;

use Closure;

trait CanDisplayTemplate
{
    protected bool | Closure | null $displayTemplate = true;

    /**
     * @return CanDisplayTemplate
     */
    public function displayTemplate(bool $displayTemplate = true): static
    {
        $this->displayTemplate = $displayTemplate;

        return $this;
    }

    public function getDisplayTemplate(): ?float
    {
        return $this->evaluate($this->displayTemplate);
    }
}
