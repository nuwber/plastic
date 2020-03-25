<?php

namespace Nuwber\Plastic\Tests\Mappings;

use Mockery;
use Nuwber\Plastic\Tests\TestCase;

class MappingCreatorTest extends TestCase
{
    /**
     * @test
     */
    public function it_create_a_mapping_file()
    {
        $creator = $this->getCreator();

        $creator->getFilesystem()->shouldReceive('get')->once()->with($creator->getStubPath().'/default.stub')->andReturn('DummyClass DummyModel');
        $creator->getFilesystem()->shouldReceive('put')->once()->with('foo/app_user.php', 'AppUser App\User');

        $creator->create('App\User', 'foo');
    }

    protected function getCreator()
    {
        $files = Mockery::mock('Illuminate\Filesystem\Filesystem');

        return new \Nuwber\Plastic\Mappings\Creator($files);
    }
}
