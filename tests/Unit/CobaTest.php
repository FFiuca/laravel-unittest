<?php

namespace Tests\Unit;

use Tests\TestCase; // it's important, use this to run with current env insted use default
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class CobaTest extends TestCase
{
    use RefreshDatabase;
    use DatabaseMigrations;
    // use DatabaseTransactions;

    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $this->assertTrue(true);
    }

    function test_user_contains():void{
        User::factory(11)->create();
        $a = User::all();

        Log::info($a->count());
        $this->assertEquals(11, $a->count());
    }

    function test_user_has_permission():void
    {
        $role = Role::create(['name'=> 'writer']);
        $pms = Permission::create(['name' => 'edit article']);

        $u = User::factory(1)->create();
        $u = $u[0];

        $u->givePermissionTo('edit article');

        $this->assertTrue($u->hasPermissionTo('edit article'));
    }
    
    function test_http1() :void
    {
        $req = $this->get('/test/testResponse');
        
        $req->assertStatus(200);
    }

    function test_http2() :void
    {
        $req = $this->get('/test/testResponse2');
        
        $req->assertStatus(200)->assertJson([
            'data' => [
                'id' => 1
            ]
        ]);
    }


}
