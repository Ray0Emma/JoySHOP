<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\BrandContract;
use App\Contracts\CategoryContract;
use App\Contracts\ProductContract;
use App\Http\Controllers\BaseController;
use App\Http\Requests\StoreProductFormRequest;
use Illuminate\Http\Request;

class ProductController extends BaseController
{
    /**
     *  in this controller, we will need to inject
     *  the ProductContract as we did in any other controllers.
     *  There are some more changes which we need
     *  to add to this controller, for example when
     *  we will add a new product, we need to assign brand
     *  and categories for that product, that’s why we will
     *  inject the BrandContract and CategoryContract as well.
     */
    protected $brandRepository;

    protected $categoryRepository;

    protected $productRepository;

    public function __construct(
        BrandContract $brandRepository,
        CategoryContract $categoryRepository,
        ProductContract $productRepository
    )
    {
        $this->brandRepository = $brandRepository;
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $products = $this->productRepository->listProducts();

        $this->setPageTitle('Produits', 'Liste de Produits');
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $brands = $this->brandRepository->listBrands('name', 'asc');
        $categories = $this->categoryRepository->listCategories('name', 'asc');

        $this->setPageTitle('Produits', 'Créer un produit');
        return view('admin.products.create', compact('categories', 'brands'));
    }

    public function store(StoreProductFormRequest $request)
    {
        $params = $request->except('_token');

        $product = $this->productRepository->createProduct($params);

        if (!$product) {
            return $this->responseRedirectBack("Erreur s'est produite lors de la mise à jour du produit.", 'error', true, true);
        }
        return $this->responseRedirect('admin.products.index', 'Produit mis à jour avec succès' ,'success',false, false);
    }
    public function edit($id)
    {
        $product = $this->productRepository->findProductById($id);
        $brands = $this->brandRepository->listBrands('name', 'asc');
        $categories = $this->categoryRepository->listCategories('name', 'asc');

        $this->setPageTitle('Produits', 'Modifier le Produit');
        return view('admin.products.edit', compact('categories', 'brands', 'product'));
    }
    public function update(StoreProductFormRequest $request)
    {
        $params = $request->except('_token');

        $product = $this->productRepository->updateProduct($params);

        if (!$product) {
            return $this->responseRedirectBack("Erreur s'est produite lors de la mise à jour du produit.", 'error', true, true);
        }
        return $this->responseRedirect('admin.products.index', 'Produit mis à jour avec succès' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $product = $this->productRepository->deleteProduct($id);

        if (!$product) {
            return $this->responseRedirectBack("Erreur s'est produite lors de la suppression du produit.", 'error', true, true);
        }
        return $this->responseRedirect('admin.products.index', 'Produit supprimé avec succès' ,'success',false, false);
    }

}
