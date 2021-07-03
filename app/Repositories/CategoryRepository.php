<?php
namespace App\Repositories;

use App\Models\Category;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use App\Contracts\CategoryContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

/**
 * Class CategoryRepository
 *
 * @package \App\Repositories
 */
class CategoryRepository extends BaseRepository implements CategoryContract
{
    //so we can upload the files using our trait.
    use UploadAble;

    /**
     * CategoryRepository constructor.
     * @param Category $model
     */
    public function __construct(Category $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     * ---------------------------
     * The listCategories() method will return the all categories from database.
     * we are not using Category::all() to get all categories,
     * instead we are using the all() method which we are inheriting
     * from our BaseRepository class.
     * ---------------------------
     */
    public function listCategories(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findCategoryById(int $id)
    {
        try {
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }
    }

    /**
     * @param array $params
     * @return Category|mixed
     */
    public function createCategory(array $params)
    {
        try {
            //converting our $params array to collection
            $collection = collect($params);

            $image = null;
            //checking if an image has been loaded or not and the image uploaded is an instance of UploadedFile class.
            if ($collection->has('image') && ($params['image'] instanceof  UploadedFile)) {
                //uploading our image
                $image = $this->uploadOne($params['image'], 'categories');
            }

            //checking for featured and menu attribute and reassigning the boolean values based on their presence.
            $featured = $collection->has('featured') ? 1 : 0;
            $menu = $collection->has('menu') ? 1 : 0;

            //merging all values in the collection and creating a new Category.
            $merge = $collection->merge(compact('menu', 'image', 'featured'));

            $category = new Category($merge->all());

            $category->save();

            return $category;

        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

     /**
     * @param array $params
     * @return mixed
     * -----------------
     * we are almost doing the same as we did in the createCategory()
     * method, except we are not creating the new category
     * we are updating an existing one.
     * -----------------
     */
    public function updateCategory(array $params)
    {
        $category = $this->findCategoryById($params['id']);

        $collection = collect($params)->except('_token');
        $image = $category->image;
        if ($collection->has('image') && ($params['image'] instanceof  UploadedFile)) {

            if ($category->image != null) {
                $this->deleteOne($category->image);
            }

            $image = $this->uploadOne($params['image'], 'categories');
        }

        $featured = $collection->has('featured') ? 1 : 0;
        $menu = $collection->has('menu') ? 1 : 0;

        $merge = $collection->merge(compact('menu', 'image', 'featured'));

        $category->update($merge->all());

        return $category;
    }

    /**
     * @param $id
     * @return bool|mixed
     * ------------------------
     * getting the category by id
     * then checking if there is an image for this category,
     * if yes delete it. Deleting the target category.
     * -------------------------
     */
    public function deleteCategory($id)
    {
        $category = $this->findCategoryById($id);

        if ($category->image != null) {
            $this->deleteOne($category->image);
        }

        $category->delete();

        return $category;
    }
    /**
     * @return mixed
     */
    public function treeList()
    {
        return Category::orderByRaw('-name ASC')
            ->get()
            ->nest()
            ->setIndent('|–– ')
            ->listsFlattened('name');
    }

    public function findBySlug($slug)
    {
        return Category::with('products')
            ->where('slug', $slug)
            //->where('menu', 1)
            ->first();
    }

    public function homeCategory() {
        return Category::where('menu', 1)->paginate(3);
    }
}
