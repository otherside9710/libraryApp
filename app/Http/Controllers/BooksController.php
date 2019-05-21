<?php

namespace App\Http\Controllers;

use App\Student;
use App\Loans;
use App\Book;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BooksController extends Controller
{
    public function index()
    {
        $flag = false;
        $books = Book::all();
        if (Input::get('search')) {
            $input = Input::get('search');
            $flag = true;
            $books = Book::where('nombre', 'LIKE', '%' . $input . '%')->get();
        }
        return view('libros.index', ['books' => $books, 'flag' => $flag]);
    }

    public function existencia()
    {
        $flag = false;
        $books = Book::all();
        if (Input::get('search')) {
            $input = Input::get('search');
            $flag = true;
            $books = Book::where('nombre', 'LIKE', '%' . $input . '%')->get();
        }
        return view('libros.existencia', ['books' => $books, 'flag' => $flag]);
    }

    public function reservarIndex($id)
    {
        $libro = Book::where('id', $id)->first();
        return view('libros.reservar', ['libro' => $libro]);
    }

    public function reservar(Request $request)
    {
        $books = Book::where('id', $request->id)->first();

        if (isset($books->id)) {
            $book = Book::where('id', $books->id)->first();
            if ($book->cantidad == 0) {
                Session::put('error', 'El Libro ' . $book->nombre . ' ya no tiene ejemplares para reservar.');
                return redirect()->route('existencia');
            }
            $book->cantidad = (int)$book->cantidad - 1;
            $book->update();

            $student = new Student();
            $student->nocarnet = $request->nocarnet;
            $student->name = $request->name;
            $student->lastName = $request->lastName;
            $student->direction = $request->direction;
            $student->phone = $request->phone;
            $student->email = $request->email;
            $student->gender = $request->gender;
            $student->hooby = $request->hooby;
            $student->department = $request->department;
            $student->city = $request->city;
            $student->save();

            $loan = new Loans();
            $loan->id_estudiante = $student->id;
            $loan->id_libro = $books->id;
            $loan->date_of_loan = Carbon::now();
            $loan->save();

            Session::put('success', 'El Libro ' . $book->nombre . ' fue Recervado Correctamente! ' . 'No Radicado #' . $loan->id);
            return redirect()->route('existencia');
        }
    }

    public function agregarIndex()
    {
        return view('libros.add');
    }

    public function addBook(Request $request)
    {
        $file = $request->file;
        if ($file->getClientOriginalExtension() == "jpg" || $file->getClientOriginalExtension() == "png" || $file->getClientOriginalExtension() == "jpeg") {
            $destinationPath = public_path() . '/caratulas';
            $fileData = 'caratulas/' . $file->getclientoriginalname();

            $book = new Book();
            $book->nombre = $request->nombre;
            $book->descripcion = $request->descripcion;
            $book->director = $request->director;
            $book->genero = $request->genero;
            $book->editorial = $request->editorial;
            $book->cantidad = $request->cantidad;
            $book->url_caratula = $fileData;

            try {
                $book->save();
                $file->move($destinationPath, $file->getclientoriginalname());
                Session::put('success', 'Se ha guardado el libro correctamente!');
                return redirect()->route('existencia');
            } catch (\Exception $e) {
                Session::put('error', 'Se Produjo un error al subir el libro.');
                return redirect()->route('agregarIndex');
            }
        } else {
            Session::put('error', 'Archivo No Valido, Debe tener la extension .JPG, .JPEG O .PNG ');
            return redirect()->route('agregarIndex');
        }
    }

    public function updateIndex($id)
    {
        $book = Book::where('id', $id)->first();
        return view('libros.editar', ['book' => $book]);
    }

    public function update(Request $request)
    {
        try {
            $book = Book::where('id', $request->id)->first();
            $book->nombre = $request->name;
            $book->descripcion = $request->desc;
            $book->update();
            Session::put('success', 'Se ha actualizado el libro correctamente!');
            return redirect()->route('existencia');
        } catch (\Exception $e) {
            Session::put('error', 'Se Produjo un error al actualizar el libro.');
            return redirect()->route('existencia');
        }

    }

    public function delete()
    {
    }
}
