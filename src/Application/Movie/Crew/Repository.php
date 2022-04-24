<?php declare(strict_types=1);

namespace Movary\Application\Movie\Crew;

use Doctrine\DBAL\Connection;

class Repository
{
    public function __construct(private readonly Connection $dbConnection)
    {
    }

    public function create(int $movieId, int $personId, string $job, string $department, int $position) : void
    {
        $this->dbConnection->insert(
            'movie_crew',
            [
                'movie_id' => $movieId,
                'person_id' => $personId,
                'job' => $job,
                'department' => $department,
                'position' => $position,
            ]
        );
    }

    public function deleteByMovieId(int $movieId) : void
    {
        $this->dbConnection->delete('movie_crew', ['movie_id' => $movieId]);
    }
}
