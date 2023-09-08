<?php

namespace Tests\Feature;
use App\Book;
use Tests\TestCase;

class AddAndDeleteBookTest extends TestCase
{
    public function test_add_screen_can_be_rendered()
    {
        $response = $this->get('/books/add');

        $response->assertStatus(200);
    }

    public function test_new_books_can_be_added() {
        $this->withoutMiddleware();

        $book = factory(Book::class)->make();

        $response = $this->post('/books', [
            'title' => $book->title,
            'author' => $book->author,
        ]);
 
        $response->assertRedirect('/');

        $this->assertDatabaseHas('books', [
            'title' => $book->title,
        ]);
    }
    
    public function test_book_can_be_deleted() {
        $book = factory(Book::class)->make();

        Book::create([
            'id' => 999,
            'title' => $book->title,
            'author' => $book->author,
        ]);

        $response = $this->get('/books/delete/999');
 
        $response->assertRedirect('/');

        $this->assertDatabaseMissing('books', [
            'id' => '999',
        ]);
    }
}
