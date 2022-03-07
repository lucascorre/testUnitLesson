<?php

namespace  App\Tests\ServiceTest;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\MockResponse;
use Symfony\Component\HttpFoundation\Response;


class RickAndMortyApiServiceTest extends MockHttpClient
{

    private string $urlApi = 'https://rickandmortyapi.com/api/character';

    public function __construct()
    {
        $callback = \Closure::fromCallable([$this, 'handleRequests']);

        parent::__construct($callback, $this->urlApi);
    }

    private function handleRequests(string $method, string $url): MockResponse
    {
        if ($method === 'GET' && str_starts_with($url, $this->urlApi.'/v1')) {
            return $this->getRickAndMortyApiMock();
        }

        throw new \UnexpectedValueException("Mock not implemented: $method/$url");
    }

    /**
     * "/v1" endpoint.
     */
    private function getRickAndMortyApiMock(): MockResponse
    {
        $mock = [
            'name' => 'Morty Smith',
            'image' => 'https://rickandmortyapi.com/api/character/avatar/2.jpeg',
        ];

        return new MockResponse(
            json_encode($mock, JSON_THROW_ON_ERROR),
            ['http_code' => Response::HTTP_OK]
        );
    }
    
}


?>