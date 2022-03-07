<?php

namespace App\Tests\ControllerTest;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;


class ApiTest extends WebTestCase
{

  
    public function testApiIndex(): void
    {
        $client = static::createClient();
        // Request a specific page
        $client->jsonRequest('GET', '/api/');
        $response = $client->getResponse();
        $this->assertResponseIsSuccessful();
        $this->assertJson($response->getContent());
        $responseData = json_decode($response->getContent(), true);
        $this->assertEquals(['message' => "Hello world"], $responseData);
    }
    
    public function testProducts()
    {
       $client = static::createClient();
       $client->jsonRequest('GET', '/api/products');
      $response = $client->getResponse();
        $this->assertResponseIsSuccessful();
        $this->assertJson($response->getContent());
        $responseData = json_decode($response->getContent(), true);
        $this->assertEquals(count($responseData), 20);
    
    }

    public function testProduct()
    {
        $client = static::createClient();
        $client->jsonRequest('GET', '/api/products/1');
        $response = $client->getResponse();
        $this->assertResponseIsSuccessful();
        $this->assertJson($response->getContent());
        $responseData = json_decode($response->getContent(), true);
        $this->assertEquals($responseData, [
            "id" => 1,
            "name" => "Rick Sanchez",
            "price" => "8",
            "quantity" => 20,
            "image" => "https://rickandmortyapi.com/api/character/avatar/1.jpeg"
          ] );
    }

    public function testAddProductToCart()
    {
        $client = static::createClient();
        $client->jsonRequest('POST', '/api/cart/1', 
        [
            "id" => 1,
            "name" => "Rick Sanchez",
            "price" => "8",
            "quantity" => 20,
            "image" => "https://rickandmortyapi.com/api/character/avatar/1.jpeg"
            
        ]);
        $response = $client->getResponse();
        $this->assertResponseIsSuccessful();
        $this->assertJson($response->getContent());
        $this->assertEquals(200, $response->getStatusCode());
        
    }

    public function testDeleteProductToCard()
    {
        $client = static::createClient();
        $client->jsonRequest('DELETE', '/api/cart/3');
        $response = $client->getResponse();
        $this->assertResponseIsSuccessful();
        $this->assertJson($response->getContent());
        $this->assertEquals(200, $response->getStatusCode());
        
    }

    public function testCart()
    {
        $client = static::createClient();
        $client->jsonRequest('GET', '/api/cart');
        $response = $client->getResponse();
        $this->assertResponseIsSuccessful();
        $this->assertJson($response->getContent());
        $responseData = json_decode($response->getContent(), true);
        $this->assertEquals($responseData, [
            "id" => 1,
            "products" => [
              0 =>  [
                "id" => 1,
                "name" => "Rick Sanchez",
                "price" => "8",
                "quantity" => 20,
                "image" => "https://rickandmortyapi.com/api/character/avatar/1.jpeg",
              ],
            ]
          ]);
    }
    
}