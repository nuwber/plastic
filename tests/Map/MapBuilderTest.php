<?php

namespace Nuwber\Plastic\Tests\Map;


use Mockery;
use Nuwber\Plastic\Tests\TestCase;

class MapBuilderTest extends TestCase
{
    /**
     * @test
     */
    public function it_creates_a_map_from_blueprint()
    {
        $connection = Mockery::mock('Nuwber\Plastic\Connection')->makePartial();

        $connection->shouldReceive('mapStatement')->once();

        $builder = new \Nuwber\Plastic\Map\Builder($connection);

        $builder->create('posts', function ($blueprint) {
            $blueprint->ip('ip');
        });
    }
}
