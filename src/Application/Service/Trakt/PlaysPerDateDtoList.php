<?php declare(strict_types=1);

namespace Movary\Application\Service\Trakt;

use Movary\AbstractList;
use Movary\ValueObject\Date;

/**
 * @method array<string, int> getIterator()
 * @psalm-suppress ImplementedReturnTypeMismatch
 */
class PlaysPerDateDtoList extends AbstractList
{
    public static function create() : self
    {
        return new self();
    }

    public function addDate(Date $watchDate, int $plays) : void
    {
        $this->data[(string)$watchDate] = $plays;
    }

    public function containsDate(Date $watchDate) : bool
    {
        return isset($this->data[(string)$watchDate]) === true;
    }

    public function getPlaysForDate(Date $watchDate) : int
    {
        if ($this->containsDate($watchDate) === false) {
            throw new \RuntimeException('Cannot get plays for missing date: ' . $watchDate);
        }

        return $this->data[(string)$watchDate];
    }

    public function incrementPlaysForDate(Date $watchDate) : void
    {
        if ($this->containsDate($watchDate) === false) {
            $this->data[(string)$watchDate] = 1;

            return;
        }

        $this->data[(string)$watchDate]++;
    }

    public function removeDate(Date $watchDate) : void
    {
        unset($this->data[(string)$watchDate]);
    }
}
