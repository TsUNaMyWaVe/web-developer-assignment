<?php

namespace App\Http\Controllers;

use App\Book;
use League\Csv\Writer;
use SplTempFileObject;
use Illuminate\Http\Request;
use League\Csv\XMLConverter;

class BookController extends Controller
{
    // Show all books
    public function index()
    {
        return view('books.index', [
            'books' => Book::sortable()->filter(request(['search']))->paginate(10)
        ]);
    }

    // Show all books by author
    public function indexAuthor($author)
    {
        return view('books.index', [
            'books' => Book::sortable()->filter(['author' => $author])->paginate(10),
            'author' => $author
        ]);
    }

    // Show add form
    public function add()
    {
        return view('books.add');
    }

    // Show edit author form
    public function editAuthor($author)
    {
        return view('books.edit-author', ['author' => $author]);
    }

    // Store book data
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'author' => 'required'
        ]);

        Book::create($formFields);

        return redirect('/')->with('message', 'Book has been added to the database successfully');
    }

    // Store new author data
    public function storeAuthor(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'author' => 'required'
        ]);

        $data = $request->all();

        Book::where('author', $data['author'])
            ->update(['author' => $data['name']]);

        return redirect('/')->with('message', 'Author has been edited successfully');
    }

    // Delete book data
    public function delete($id)
    {
        Book::destroy($id);

        return redirect('/')->with('message', 'Book has been deleted from the database successfully');
    }

    // Export data
    public function export(Request $request)
    {
        $format = $request['format'];
        $data = $request['data'];
        if ($data == 'full') {
            $data = ['title', 'author'];
        } else {
            $data = array($data);
        }

        if ($format == 'csv') {
            $this->exportCsv($data);
        } else {
            $this->exportXml($data);
        }
    }

    private function exportCsv($data)
    {
        $books = Book::all($data)->toArray();

        $csv = Writer::createFromFileObject(new SplTempFileObject());

        $csv->insertOne($data);
        $csv->insertAll($books);
        $csv->output('output.csv');


        return $csv;
    }

    private function exportXml($data)
    {

        $books = Book::all($data)->toArray();

        $converter = (new XMLConverter())
            ->rootElement('Database')
            ->recordElement('record', 'offset')
            ->fieldElement('field', 'name')
        ;

        $dom = $converter->convert($books);
        $dom->formatOutput = true;
        $dom->encoding = 'iso-8859-15';

        echo '<pre>', PHP_EOL;
        echo htmlentities($dom->saveXML());
    }
}