<?php

declare(strict_types=1);

/**
 * Class enum
 */
class Enum
{

    const MODE_STRICT = 'strict';
    const MODE_LOOSE = 'loose';

    private $mode;
    private $default;
    private $accepts;
    private $value = '';

    /**
     * enum constructor.
     * @param array $accepts
     * @param string $default
     * @param string $mode
     * @throws Exception
     */
    public function __construct(
        array $accepts,
        string $default = '',
        string $mode = self::MODE_STRICT
    )
    {
        $this->accepts = $accepts;
        $this->default = $default;
        $this->mode = $default ? self::MODE_LOOSE : $mode;
        $this->checkMode();
    }

    /**
     * @param string $value
     * @throws Exception
     */
    public function set(string $value)
    {
        $this->value = $value;
        $this->checkValue();
    }

    public function get(): string
    {
        return $this->value;
    }

    function __toString(): string
    {
        return in_array($this->value, $this->accepts, true)
            ? $this->value
            : $this->default;
    }

    /**
     * @throws Exception
     */
    private function checkMode(): void
    {
        if ($this->mode !== self::MODE_STRICT && $this->mode !== self::MODE_LOOSE) {
            throw new Exception('Mode `' . $this->mode . '` not accepted, only accepting: [Enum::MODE_LOOSE, Enum::MODE_STRICT].');
        }
    }

    /**
     * @throws Exception
     */
    private function checkValue(): void
    {
        if ($this->mode === self::MODE_STRICT && false === in_array($this->value, $this->accepts, true)) {
            throw new Exception('Value `' . $this->value . '` not accepted, only accepting: [' . implode(', ', $this->accepts) . ']');
        }
    }
}