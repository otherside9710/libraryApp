<?php

namespace App\Http\Controllers;

use App\BookMax;
use App\Loans;
use App\Book;
use App\Student;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;


class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $reservadas = Loans::all();
        $reservadasTotal = Loans::all()->count();
        $totalStudent = Student::all()->count();
        $peliculasTotal = Book::all()->count();
        $bookMax = BookMax::all();
        $cont = null;

        if (Auth::user()->rol == 'admin'){
            $reservadas = Loans::all();
        }

        $array = [];
        $reservadasCollection = null;

        foreach ($reservadas as $reservada) {
            $id_libro = $reservada->id_libro;
            $id_student = $reservada->id_estudiante;
            $book = Book::where('id', $id_libro)->first();
            $student = Student::where('id', $id_student)->first();

            array_push($array, (object)array(
                'id' => $book->id,
                'id_reserva' => $reservada->id,
                'nombre' => $book->nombre,
                'director' => $book->director,
                'editorial' => $book->editorial,
                'genero' => $book->genero,
                'student' => $student->name . ' ' . $student->lastName
            ));
        }

        $reservadasCollection = new Collection($array);

        return view('home', [
            'reservadas' => $reservadasCollection,
            'reservadasTotal' => $reservadasTotal,
            'totalStudent' => $totalStudent,
            'peliculasTotal' => $peliculasTotal,
            'valorTotal' => $cont,
            'bookMax' => $bookMax,
        ]);
    }
}
