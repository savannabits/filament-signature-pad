<?php

namespace Coolsam\SignaturePad\Forms\Concerns;

use Closure;

trait HasSignaturePadAttributes
{
    protected float | Closure | null $strokeMaxWidth = 2.5;

    protected float | Closure | null $strokeMinWidth = 1.0;

    protected float | Closure | null $strokeDotSize = 2.0;

    protected float | Closure | null $strokeMinDistance = 2.0;

    protected string | Closure | null $penColor = 'rgb(0,0,0)';

    protected string | Closure | null $backgroundColor = 'rgba(0,0,0,0)';

    protected bool $hideDownloadButtons = false;

    /**
     * @param  bool  $hide = true
     */
    public function hideDownloadButtons(bool $hide = true): static
    {
        $this->hideDownloadButtons = $hide;

        return $this;
    }

    public function strokeMaxWidth(float | Closure $strokeMaxWidth): static
    {
        $this->strokeMaxWidth = $strokeMaxWidth;

        return $this;
    }

    public function strokeMinWidth(float | Closure $strokeMinWidth): static
    {
        $this->strokeMinWidth = $strokeMinWidth;

        return $this;
    }

    public function strokeDotSize(float | Closure $strokeDotSize): static
    {
        $this->strokeDotSize = $strokeDotSize;

        return $this;
    }

    public function strokeMinDistance(float | Closure $strokeMinDistance): static
    {
        $this->strokeMinDistance = $strokeMinDistance;

        return $this;
    }

    public function penColor(string | Closure $penColor): static
    {
        $this->penColor = $penColor;

        return $this;
    }

    public function backgroundColor(string | Closure $backgroundColor): static
    {
        $this->backgroundColor = $backgroundColor;

        return $this;
    }

    public function getStrokeMaxWidth(): ?float
    {
        return $this->evaluate($this->strokeMaxWidth);
    }

    public function getStrokeMinWidth(): ?float
    {
        return $this->evaluate($this->strokeMinWidth);
    }

    public function getStrokeDotSize(): ?float
    {
        return $this->evaluate($this->strokeDotSize);
    }

    public function getStrokeMinDistance(): ?float
    {
        return $this->evaluate($this->strokeMinDistance);
    }

    public function getPenColor(): ?string
    {
        return $this->evaluate($this->penColor);
    }

    public function getBackgroundColor(): ?string
    {
        return $this->evaluate($this->backgroundColor);
    }

    public function isDisabledDownload(): bool
    {
        return $this->hideDownloadButtons;
    }
}
