<?php

namespace App\Models;

class VacancyLevel
{
    private $remainingCount;

    public function __construct(int $remainingCount)
    {
        $this->remainingCount = $remainingCount;
    }

    public function mark(): string
    {
        $marks = ['empty' => '×', 'few' => '△', 'enough' => '◎'];
        $slug = $this->slug();
        assert(isset($marks[$slug]), new \DomainException('invalid slug value.'));

        return $marks[$slug];
    }

    public function slug(): string
    {
        if ($this->remainingCount === 0) {
            return 'empty';
        }elseif ($this->remainingCount < 5) {
            return 'few';
        }else{
            return 'enough';
        }
    }

    public function __toString()
    {
        return $this->mark();
    }
}

