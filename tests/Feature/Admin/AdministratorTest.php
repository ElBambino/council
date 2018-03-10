<?php

namespace Tests\Feature\Admin;

use App\User;
use Tests\TestCase;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdministratorTest extends TestCase
{
    use RefreshDatabase;

    public function setUp()
    {
        parent::setUp();

        $this->withExceptionHandling();
    }

    /** @test */
    public function an_administrator_can_access_the_administration_section()
    {
        $this->signInAdmin()
            ->get(route('admin.dashboard.index'))
            ->assertStatus(Response::HTTP_OK);
    }

    /** @test */
    public function a_non_administrator_cannot_access_the_administration_section()
    {
        $regularUser = factory(User::class)->create();

        $this->actingAs($regularUser)
             ->get(route('admin.dashboard.index'))
             ->assertStatus(Response::HTTP_FORBIDDEN);
    }
}
