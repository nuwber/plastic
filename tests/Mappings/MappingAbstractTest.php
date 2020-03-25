<?php

namespace Nuwber\Plastic\Tests\Mappings;

use Nuwber\Plastic\Tests\TestCase;

class MappingAbstractTest extends TestCase
{
    /**
     * @test
     */
    public function it_throws_a_missing_argument_exception_if_missing_model()
    {
        $this->expectException(\Nuwber\Plastic\Exception\MissingArgumentException::class);
        new MappingWithoutModel();
    }

    /**
     * @test
     */
    public function it_throws_an_invalid_exception_if_the_model_is_not_searchable()
    {
        $this->expectException(\Nuwber\Plastic\Exception\InvalidArgumentException::class);
        new MappingWithNotSearchableModel();
    }

    /**
     * @test
     */
    public function it_gets_the_type_of_a_searchable_model()
    {
        $mapping = new MappingWithSearchableModel();
        $this->assertEquals('searchable_models', $mapping->getModelType());
    }
}

class MappingWithSearchableModel extends \Nuwber\Plastic\Mappings\Mapping
{
    public $model = SearchableModel::class;
}

class MappingWithNotSearchableModel extends \Nuwber\Plastic\Mappings\Mapping
{
    public $model = NotSearchableModel::class;
}

class MappingWithoutModel extends \Nuwber\Plastic\Mappings\Mapping
{
}

class SearchableModel extends \Illuminate\Database\Eloquent\Model
{
    use \Nuwber\Plastic\Searchable;
}

class NotSearchableModel extends \Illuminate\Database\Eloquent\Model
{
}
