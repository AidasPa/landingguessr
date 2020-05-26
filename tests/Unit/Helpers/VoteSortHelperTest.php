<?php

namespace Tests\Unit\Helpers;

use App\Board;
use App\Helpers\VoteSortHelper;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Ramsey\Collection\Collection;
use Tests\TestCase;

class VoteSortHelperTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * @return void
     * @group vote
     * @group helper
     */
    public function testGetTestClassInstance(): void
    {
        factory(User::class)->create();
        factory(Board::class)->create();

        $votes = factory(\App\Vote::class)->create();
        $class = $this->getTestClassInstance($votes->toArray());

        $this->assertInstanceOf(VoteSortHelper::class, $class);
    }

    public function testSortVotesByLandingRate(): void
    {

    }

    /**
     * @param array $votes
     * @param int $landingRate
     * @return VoteSortHelper
     */
    private function getTestClassInstance(array $votes, int $landingRate): VoteSortHelper
    {
        return new VoteSortHelper($votes, $landingRate);
    }
}
