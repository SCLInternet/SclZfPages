<?php

namespace SclZfPages\Formatter;

use SclZfPages\Entity\PageInterface;

/**
 * Interface for a system which formats content.
 *
 * @author Tom Oram <tom@scl.co.uk>
 */
interface FormatterInterface
{
    /**
     * Formats the provided content.
     *
     * @param  string $content The content to be formatted.
     * @return string The formatted content.
     */
    public function format($content);
}
