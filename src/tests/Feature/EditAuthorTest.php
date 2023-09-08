<?php

namespace Tests\Feature;

use App\Book;
use Tests\TestCase;

class EditAuthorTest extends TestCase
{
    public function test_author_page_can_be_rendered()
    {
        $book = factory(Book::class)->make();
        $response = $this->get('/books/author/' . $book->author);

        $response->assertStatus(200);
    }

    public function test_author_edit_page_can_be_rendered()
    {
        $book = factory(Book::class)->make();
        $response = $this->get('/books/author/' . $book->author . '/edit');

        $response->assertStatus(200);
    }

    public function test_author_can_be_edited()
    {
        $this->withoutMiddleware();

        $book = factory(Book::class)->make();
        Book::create([
            'title' => $book->title,
            'author' => $book->author,
        ]);

        $response = $this->post('/author', [
            'name' => 'Edited Name',
            'author' => $book->author,
        ]);

        $response->assertRedirect('/');

        $this->assertDatabaseHas('books', [
            'title' => $book->title,
        ]);

        $this->assertDatabaseMissing('books', [
            'author' => $book->author,
        ]);

        $this->assertDatabaseHas('books', [
            'author' => 'Edited Name',
        ]);
    }
}