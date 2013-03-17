<?php

namespace SclZfPages\Formatter;

/**
 * Interface for factories for producting FormatterInterface objects.
 *
 * @author Tom Oram <tom@scl.co.uk>
 */
interface FormatterFactoryInterface
{
    /**
     * Returns a list of formatters.
     *
     * @return array
     */
    public function listFormatters();

    /**
     * Returns an instance of the given formatter.
     *
     * @param  string $name
     * @return FormatterInterface
     */
    public function get($name);

    /**
     * Returns the default formatter.
     *
     * @return FormatterInterface
     */
    public function getDefaultFormatter();
}
