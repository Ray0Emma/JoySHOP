<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\CategoryContract;
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
    public function __construct(CategoryContract $categoryRepository) {
        $this->categoryRepository = $categoryRepository;
    }

    public function index() {
        $categories = $this->categoryRepository->homeCategory();
        return view('site.pages.homepage', compact('categories'));
    }

    public function correo() {
        $correos = 'jonathanquishpecatagna@gmail.com';
        $datos['pass'] = 'prueba';
        Mail::send('email.email', $datos, function ($message) use ($correos) {
            $message->from('info@qckservice.com', 'Notificación QuickService');
            $message->to($correos)->subject('Notificación QuickService - Perfil Proveedor');
        });
    }

}
