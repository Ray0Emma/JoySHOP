<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\CategoryContract;
use App\Contracts\ProductContract;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller {

    /**
     * @var CategoryContract
     */
    protected $categoryRepository;

    /**
     * CategoryController constructor.
     * @param CategoryContract $categoryRepository
     */
    public function __construct(CategoryContract $categoryRepository , ProductContract $productContract) {
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productContract;
    }

    public function index() {
        $categories = $this->categoryRepository->homeCategory();
        $products = $this->productRepository->homeProduct();
        return view('site.pages.homepage', compact('categories','products'));
    }

}
