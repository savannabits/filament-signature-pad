<?php

namespace Savannabits\SignaturePad\Forms\Concerns;

use Closure;

trait HasSignaturePadAttributes
{
    protected float|Closure|null $strokeMaxWidth = 2.5;
    protected float|Closure|null $strokeMinWidth = 1.0;
    protected float|Closure|null $strokeDotSize = 2.0;
    protected float|Closure|null $strokeMinDistance = 2.0;
    protected string|Closure|null $penColor = 'rgb(0,0,0)';
    protected string|Closure|null $backgroundColor = 'rgba(0,0,0,0)';

    /**
     * @param Closure|float $strokeMaxWidth
     * @return static
     */
    public function strokeMaxWidth(float|Closure $strokeMaxWidth): static
    {
        $this->strokeMaxWidth = $strokeMaxWidth;
        return $this;
    }

    /**
     * @param Closure|float $strokeMinWidth
     * @return static
     */
    public function strokeMinWidth(float|Closure $strokeMinWidth): static
    {
        $this->strokeMinWidth = $strokeMinWidth;
        return $this;
    }

    /**
     * @param Closure|float $strokeDotSize
     * @return static
     */
    public function strokeDotSize(float|Closure $strokeDotSize): static
    {
        $this->strokeDotSize = $strokeDotSize;
        return $this;
    }

    /**
     * @param Closure|float $strokeMinDistance
     * @return static
     */
    public function strokeMinDistance(float|Closure $strokeMinDistance): static
    {
        $this->strokeMinDistance = $strokeMinDistance;
        return $this;
    }

    /**
     * @param Closure|string $penColor
     * @return static
     */
    public function penColor(string|Closure $penColor): static
    {
        $this->penColor = $penColor;
        return $this;
    }

    /**
     * @param Closure|string $backgroundColor
     * @return static
     */
    public function backgroundColor(string|Closure $backgroundColor): static
    {
        $this->backgroundColor = $backgroundColor;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getStrokeMaxWidth(): ?float
    {
        return $this->evaluate($this->strokeMaxWidth);
    }

    /**
     * @return float|null
     */
    public function getStrokeMinWidth(): ?float
    {
        return $this->evaluate($this->strokeMinWidth);
    }

    /**
     * @return float|null
     */
    public function getStrokeDotSize(): ?float
    {
        return $this->evaluate($this->strokeDotSize);
    }

    /**
     * @return float|null
     */
    public function getStrokeMinDistance(): ?float
    {
        return $this->evaluate($this->strokeMinDistance);
    }

    /**
     * @return string|null
     */
    public function getPenColor(): string|null
    {
        return $this->evaluate($this->penColor);
    }

    /**
     * @return string|null
     */
    public function getBackgroundColor(): ?string
    {
        return $this->evaluate($this->backgroundColor);
    }
}
