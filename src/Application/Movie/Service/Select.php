<?php declare(strict_types=1);

namespace Movary\Application\Movie\Service;

use Movary\Api\Trakt\ValueObject\Movie\TraktId;
use Movary\Application\Movie\Entity;
use Movary\Application\Movie\EntityList;
use Movary\Application\Movie\Repository;

class Select
{
    private Repository $repository;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }

    public function fetchAll() : EntityList
    {
        return $this->repository->fetchAll();
    }

    public function findByTraktId(TraktId $traktId) : ?Entity
    {
        return $this->repository->findByTraktId($traktId);
    }
}
