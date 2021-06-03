<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Contracts\BrandContract;
use App\Http\Controllers\BaseController;


class BrandController extends BaseController
{
   /**
     * @var BrandContract
     */
    protected $brandRepository;

    /**
     * CategoryController constructor.
     * @param BrandContract $brandRepository
     */
    public function __construct(BrandContract $brandRepository)
    {
        $this->brandRepository = $brandRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $brands = $this->brandRepository->listBrands();

        $this->setPageTitle('Marques', 'Liste de toutes les marques');
        return view('admin.brands.index', compact('brands'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $this->setPageTitle('Marques', 'Créer une Marque');
        return view('admin.brands.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'      =>  'required|max:191',
            'image'     =>  'mimes:jpg,jpeg,png|max:1000'
        ]);

        $params = $request->except('_token');

        $brand = $this->brandRepository->createBrand($params);

        if (!$brand) {
            return $this->responseRedirectBack("Une erreur s'est produite lors de la création de la marque.", 'error', true, true);
        }
        return $this->responseRedirect('admin.brands.index', 'Marque ajoutée avec succès' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $brand = $this->brandRepository->findBrandById($id);

        $this->setPageTitle('Marques', 'Modifier la Marque : '.$brand->name);
        return view('admin.brands.edit', compact('brand'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'name'      =>  'required|max:191',
            'image'     =>  'mimes:jpg,jpeg,png|max:1000'
        ]);

        $params = $request->except('_token');

        $brand = $this->brandRepository->updateBrand($params);

        if (!$brand) {
            return $this->responseRedirectBack("Une erreur s'est produite lors de la mise à jour de la marque.", 'error', true, true);
        }
        return $this->responseRedirectBack('la marque a été mise à jour avec succès' ,'success',false, false);
    }
    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $brand = $this->brandRepository->deleteBrand($id);

        if (!$brand) {
            return $this->responseRedirectBack("Une erreur s'est produite lors de la suppression de la marque.", 'error', true, true);
        }
        return $this->responseRedirect('admin.brands.index', 'Marque supprimée avec succès' ,'success',false, false);
    }
}
