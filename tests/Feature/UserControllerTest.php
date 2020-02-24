<?php

namespace Tests\Feature;

use Illuminate\Pagination\LengthAwarePaginator;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    /** @test */
    public function it_should_search_for_a_user()
    {
        $this->get('/?search=Sigrid')
            ->assertSeeInOrder([
                'Sigrid McCullough', 'nikki.ledner@example.com',
                'Sigrid Pollich', 'wiegand.nikko@example.net',
            ])
            ->assertViewHas([
                'users' => function (LengthAwarePaginator $users) {
                    $this->assertCount(2, $users);

                    return true;
                },
            ]);
    }
}

