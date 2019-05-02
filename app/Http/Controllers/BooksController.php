<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Books;
class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $bookss = Books::latest()->paginate(5);
      return view('books.index', compact('bookss'))
          ->with('i', (request()->input('page',1)-1)*5);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
        'judul' => 'required',
        'penerbit' => 'required',
        'tahun_terbit' => 'required',
        'pengarang' => 'required'
      ]);
      Books::create($request->all());
      return redirect() -> route('books.index')
                        -> with('success','New BookList Succesfully Created');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $books = Books::find($id);
      return view ('books.detail', compact('books'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $books = Books::find($id);
      return view ('books.edit', compact('books'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $request->validate([
        'judul' => 'required',
        'penerbit' => 'required',
        'tahun_terbit' => 'required',
        'pengarang' => 'required'
      ]);
      $books = Books::find($id);
      $books->judul = $request->get('judul');
      $books->penerbit = $request->get('penerbit');
      $books->tahun_terbit = $request->get('tahun_terbit');
      $books->pengarang = $request->get('pengarang');
      return redirect() -> route('books.index')
                        -> with('success','New BookList Succesfully Updated');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $books = Books::find($id);
      $books->delete();
      return redirect() -> route('books.index')
                        -> with('success','BookList Succesfully Deleted');
    }
}
