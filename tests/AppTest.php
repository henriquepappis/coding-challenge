<?php

class AppTest extends TestCase
{
    /**
     * Teste de aplicação sem o token
     *
     * @return void
     */
    public function testAppWithoutToken()
    {
        $this->get('/');

        $this->assertEquals('Acesso não autorizado.', $this->response->getContent());
    }

    /**
     * Teste de aplicação com o token
     *
     * @return void
     */
    public function testApp()
    {
        $this->client = App\Models\Client::factory()->create([
            'api_token' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJub25lIn0.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkhlbnJpcXVlIFBhcHBpcyIsImFkbWluIjp0cnVlLCJpYXQiOjE2MzQzNjY1MTgsImV4cCI6MTYzNDM3MDExOH0',
        ]);

        $this->actingAs($this->client)->get('/');

        $this->assertEquals($this->app->version(), $this->response->getContent());
    }

    /**
     * Teste da rota ranking
     *
     * @return void
     */
    public function testRankingWithoutMovementId()
    {
        $this->client = App\Models\Client::factory()->create([
            'api_token' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJub25lIn0.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkhlbnJpcXVlIFBhcHBpcyIsImFkbWluIjp0cnVlLCJpYXQiOjE2MzQzNjY1MTgsImV4cCI6MTYzNDM3MDExOH0',
        ]);

        $this->actingAs($this->client)->get('/ranking');

        $this->assertResponseStatus(400);
    }

    public function testRankingUnknowMovementId()
    {
        $this->client = App\Models\Client::factory()->create([
            'api_token' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJub25lIn0.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkhlbnJpcXVlIFBhcHBpcyIsImFkbWluIjp0cnVlLCJpYXQiOjE2MzQzNjY1MTgsImV4cCI6MTYzNDM3MDExOH0',
        ]);

        $this->actingAs($this->client)->get('/ranking?movement_id=4');

        $this->assertResponseStatus(200);
    }
}
