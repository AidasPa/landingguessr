<?php


namespace App\Helpers;


class VoteSortHelper
{
    private $votes;
    private $landingRate;

    public function __construct(array $votes, int $landingRate)
    {
        $this->votes = $votes;
        $this->landingRate = $landingRate;
    }

    /**
     * @return array
     */
    public function sortVotes(): array
    {
        return $this->sortAndModifyItems();
    }

    /**
     * @return array
     */
    private function sortAndModifyItems(): array
    {
        $voteBag = [];
        foreach ($this->votes as $vote) {
            $vote['diff'] = abs($this->landingRate - $vote['guess']);
            array_push($voteBag, $vote);
        }

        usort($voteBag, function($a, $b) {
            return $a['diff'] <=> $b['diff'];
        });
        return $voteBag;
    }
}
