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
            $diff = abs($this->landingRate - $vote['guess']);
            $vote['diff'] = $diff;
            $vote['dot'] = self::getDotFromDiff($diff);
            array_push($voteBag, $vote);
        }

        usort($voteBag, function ($a, $b) {
            return $a['diff'] <=> $b['diff'];
        });
        return $voteBag;
    }

    /**
     * @param int $diff
     * @return string
     */
    private static function getDotFromDiff(int $diff): string
    {
        if ($diff === 0) {
            return 'black';
        } else if ($diff === 20) {
            return '';
        } else {
            return 'grey';
        }

    }
}
