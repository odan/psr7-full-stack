<?php

namespace App\Data;

/**
 * Data Transfer Object Interface.
 */
interface DataTransferObjectInterface
{
    /**
     * Convert to array.
     *
     * @return mixed[] Data
     */
    public function toArray(): array;
}