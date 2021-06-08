<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Contracts\AttributeContract;
use App\Http\Controllers\BaseController;


class AttributeController extends BaseController
{
    /**
     * @var AttributeContract
     */
    protected $attributeRepository;

    /**
     * AttributeController constructor.
     * @param AttributeContract $attributeRepository
     */
    public function __construct(AttributeContract $attributeRepository)
    {
        $this->attributeRepository = $attributeRepository;
    }

    /**
     * will load all the attributes.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $attributes = $this->attributeRepository->listAttributes();

        // setting the page titile and subtitle
        $this->setPageTitle('Attributs', 'Liste de tous les attributs');

        //
        return view('admin.attributes.index', compact('attributes'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $this->setPageTitle('Attributs', 'Créer un attribut');
        return view('admin.attributes.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'code'          =>  'required',
            'name'          =>  'required',
            'frontend_type' =>  'required'
        ]);

        $params = $request->except('_token');

        $attribute = $this->attributeRepository->createAttribute($params);

        if (!$attribute) {
            return $this->responseRedirectBack("Erreur s'est produite lors de la création de l'attribut.", 'error', true, true);
        }
        return $this->responseRedirect('admin.attributes.index', "Attribut ajouté avec succès" ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $attribute = $this->attributeRepository->findAttributeById($id);

        $this->setPageTitle('Attributs', 'Modifier L\'attribut : '.$attribute->name);
        return view('admin.attributes.edit', compact('attribute'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'code'          =>  'required',
            'name'          =>  'required',
            'frontend_type' =>  'required'
        ]);

        $params = $request->except('_token');

        $attribute = $this->attributeRepository->updateAttribute($params);

        if (!$attribute) {
            return $this->responseRedirectBack("Une erreur s'est produite lors de la mise à jour de l'attribut.", 'error', true, true);
        }
        return $this->responseRedirectBack("Attribut mis à jour avec succès" ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $attribute = $this->attributeRepository->deleteAttribute($id);

        if (!$attribute) {
            return $this->responseRedirectBack("erreur s'est produite lors de la suppression de l'attribut.", 'error', true, true);
        }
        return $this->responseRedirect('admin.attributes.index', "Attribut supprimé avec succès" ,'success',false, false);
    }

}
