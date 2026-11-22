<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $books = [
            ['title' => 'The Silent Library', 'author' => 'Anna Reyes', 'genre' => 'Fiction', 'price' => 12.50],
            ['title' => 'Midnight Stories', 'author' => 'James Carter', 'genre' => 'Fiction', 'price' => 14.00],
            ['title' => 'The Lost Letters', 'author' => 'Maria Santos', 'genre' => 'Fiction', 'price' => 10.99],
            ['title' => 'A Journey Home', 'author' => 'Daniel Cruz', 'genre' => 'Fiction', 'price' => 15.00],
            ['title' => 'Shadows of Tomorrow', 'author' => 'Liam Brooks', 'genre' => 'Dystopian', 'price' => 13.25],
            ['title' => 'The Last City', 'author' => 'Sophia Miller', 'genre' => 'Dystopian', 'price' => 16.50],
            ['title' => 'Broken World', 'author' => 'Ethan Davis', 'genre' => 'Dystopian', 'price' => 11.75],
            ['title' => 'Beyond the Walls', 'author' => 'Olivia Wilson', 'genre' => 'Dystopian', 'price' => 18.00],
            ['title' => 'Galaxy Explorer', 'author' => 'Noah Garcia', 'genre' => 'Sci-Fi', 'price' => 20.00],
            ['title' => 'Journey to Mars', 'author' => 'Ava Johnson', 'genre' => 'Sci-Fi', 'price' => 17.50],
            ['title' => 'The Cosmic Mystery', 'author' => 'Lucas Smith', 'genre' => 'Sci-Fi', 'price' => 19.99],
            ['title' => 'Beyond the Stars', 'author' => 'Isabella Brown', 'genre' => 'Sci-Fi', 'price' => 14.25],
            ['title' => 'Dragon Kingdom', 'author' => 'Mason Taylor', 'genre' => 'Fantasy', 'price' => 22.00],
            ['title' => 'The Magic Stone', 'author' => 'Charlotte Moore', 'genre' => 'Fantasy', 'price' => 12.00],
            ['title' => 'Kingdom of Dreams', 'author' => 'Benjamin Anderson', 'genre' => 'Fantasy', 'price' => 16.75],
            ['title' => 'The Enchanted Forest', 'author' => 'Amelia Thomas', 'genre' => 'Fantasy', 'price' => 18.50],
            ['title' => 'Hidden Truth', 'author' => 'Henry Martin', 'genre' => 'Fiction', 'price' => 9.99],
            ['title' => 'Summer at the Lake', 'author' => 'Grace Lee', 'genre' => 'Fiction', 'price' => 13.50],
            ['title' => 'Future Earth', 'author' => 'Jack White', 'genre' => 'Sci-Fi', 'price' => 21.00],
            ['title' => 'Robot Revolution', 'author' => 'Ella Thompson', 'genre' => 'Sci-Fi', 'price' => 15.75],
            ['title' => 'Frozen Empire', 'author' => 'William Harris', 'genre' => 'Dystopian', 'price' => 20.50],
            ['title' => 'New World Rising', 'author' => 'Lily Clark', 'genre' => 'Dystopian', 'price' => 17.00],
            ['title' => 'The Wizard Academy', 'author' => 'Alexander Lewis', 'genre' => 'Fantasy', 'price' => 19.25],
            ['title' => 'Mystery of the Moon', 'author' => 'Emily Walker', 'genre' => 'Fantasy', 'price' => 14.50],
        ];

        foreach ($books as $index => $book) {
            $genre = Genre::firstOrCreate([
                'name' => $book['genre'],
            ]);

            Book::updateOrCreate(
                ['code' => $index + 101],
                [
                    'title' => $book['title'],
                    'author' => $book['author'],
                    'genre' => $book['genre'],
                    'genre_id' => $genre->id,
                    'price' => $book['price'],
                ]
            );
        }
    }
}
