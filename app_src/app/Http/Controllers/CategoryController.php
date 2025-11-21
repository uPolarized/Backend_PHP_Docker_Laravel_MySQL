<?php
namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
class CategoryController extends Controller
{
    public function index() {
        $categories=Category::orderBy('id','desc')->paginate(10);
        return view('categories.index',compact('categories'));
    }
    public function create() {
        return view('categories.create');
    }
    public function store(Request $r) {
        $data=$r->validate([
            'nome'=>'required|string|max:255',
            'descricao'=>'nullable|string',
        ]);
        Category::create($data);
        return redirect()->route('categories.index')->with('success','Categoria criada.');
    }
    public function edit(Category $category) {
        return view('categories.edit',compact('category'));
    }
    public function update(Request $r,Category $category) {
        $data=$r->validate([
            'nome'=>'required|string|max:255',
            'descricao'=>'nullable|string',
        ]);
        $category->update($data);
        return redirect()->route('categories.index')->with('success','Categoria atualizada.');
    }
    public function destroy(Category $category) {
        $category->delete();
        return redirect()->route('categories.index')->with('success','Categoria excluída.');
    }
}
