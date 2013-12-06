<?php

namespace SclZfPages\Options;

use Zend\Stdlib\AbstractOptions;

class Options extends AbstractOptions
{
    /**
     * The available formatters.
     *
     * @var array
     */
    protected $formatters;

    /**
     * The default formatter.
     *
     * @var string
     */
    protected $defaultFormatters;

    /**
     * Gets the value for formatters.
     *
     * @return array
     */
    public function getFormatters()
    {
        return $this->formatters;
    }

    /**
     * Sets the value for formatters.
     *
     * @param  array $formatters
     * @return self
     */
    public function setFormatters(array $formatters)
    {
        $this->formatters = $formatters;
        return $this;
    }

    /**
     * Gets the value for defaultFormatter.
     *
     * @return string
     */
    public function getDefaultFormatter()
    {
        return $this->defaultFormatter;
    }

    /**
     * Sets the value for defaultFormatter.
     *
     * @param  string $defaultFormatter
     * @return self
     */
    public function setDefaultFormatter($defaultFormatter)
    {
        $this->defaultFormatter = (string) $defaultFormatter;
        return $this;
    }
}
