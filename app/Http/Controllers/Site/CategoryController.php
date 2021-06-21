<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\CategoryContract;

class CategoryController extends Controller
{
    protected $categoryRepository;

    public function __construct(CategoryContract $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function show($slug)
    {
        $category = $this->categoryRepository->findBySlug($slug);
        //new
        $filtro = array();
        foreach ($category->products as $product) {
            $name = strtolower($product->name);
            $porciones = explode(" ", $name);
            $filtro[] = $porciones[0];
        }
        $filtro = array_unique($filtro);
        /*echo json_encode($filtro);
        die();*/
        return view('site.pages.category', compact('category','filtro'));
    }
}
