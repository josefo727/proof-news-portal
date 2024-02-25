<?php

namespace Tests\Unit;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HasUniqueSlugTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_generates_a_unique_slug_for_a_new_category()
    {
        $category = new Category(['name' => 'Test Category']);
        $category->save();

        $this->assertEquals('test-category', $category->slug);
    }

    /** @test */
    public function it_generates_a_unique_slug_for_duplicate_category_names()
    {
        $firstCategory = new Category(['name' => 'Test Category']);
        $firstCategory->save();

        $secondCategory = new Category(['name' => 'Test Category']);
        $secondCategory->save();

        // Verify that the second slug has a numeric suffix
        $this->assertEquals('test-category-1', $secondCategory->slug);
    }
}
