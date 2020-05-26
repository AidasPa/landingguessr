<?php

namespace Tests\Unit\Helpers;

use App\Helpers\VoteSortHelper;
use PHPUnit\Framework\TestCase;

class VoteSortHelperTest extends TestCase
{
    private function getTestClassInstance(array $votes): VoteSortHelper
    {
        return new VoteSortHelper($votes);
    }
}
