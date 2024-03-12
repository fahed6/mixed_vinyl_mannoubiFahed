<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Psr\Log\LoggerInterface;

class SongController extends AbstractController
{
    #[Route('/api/songs/{id<\d+>}', methods: ['GET'], name: 'api_songs_get_one')]
    public function getSong(int $id, LoggerInterface $logger): Response
    {
        $songs = [
            1 => [
                'id' => 1,
                'name' => 'Bohemian Rhapsody',
                'url' => 'https://www.soundhelix.com/examples/mp3/SoundHelix-Song-1.mp3',
            ],
            2 => [
                'id' => 2,
                'name' => 'Hotel California',
                'url' => 'https://www.soundhelix.com/examples/mp3/SoundHelix-Song-2.mp3',
            ],
            3 => [
                'id' => 3,
                'name' => 'Imagine',
                'url' => 'https://www.soundhelix.com/examples/mp3/SoundHelix-Song-3.mp3',
            ],
            4 => [
                'id' => 4,
                'name' => 'Set The World On Fire',
                'url' => 'https://www.soundhelix.com/examples/mp3/SoundHelix-Song-4.mp3',
            ],
            5 => [
                'id' => 5,
                'name' => 'Your',
                'url' => 'https://www.soundhelix.com/examples/mp3/SoundHelix-Song-5.mp3',
            ],
            6 => [
                'id' => 6,
                'name' => 'Parfum',
                'url' => 'https://www.soundhelix.com/examples/mp3/SoundHelix-Song-6.mp3',
            ],
        ];

        if (array_key_exists($id, $songs)) {
            $song = $songs[$id];
            $logger->info('Returning API response for song {song}', [
                'song' => $id,
            ]);

            return $this->json($song);
        } 
    }
}