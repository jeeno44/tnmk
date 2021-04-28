<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        return view('category.index');
    }

    public function settingIndex() {
        return view('category.settings');
    }

    public function getCategories() {
        /* Получаем все категории и сортируем их по колонке queue(очередь) */
        /* Выбираем не все поля, а только - 'id','parent_id','title','level','queue' */
        /* Для последующей манипуляции */
        $categories = Category::with("children")->orderBy("queue")->get(['id','parent_id','title','level','queue'])->toArray();

        /* Функция построения дерева из результатов выборки из БД */
        function buildTree(array $elements, $parentId = 0) {
            $branch = array();

            foreach ($elements as $element) {
                if ($element['parent_id'] == $parentId) {
                    $children = buildTree($elements, $element['id']);
                    if ($children) {
                        $element['children'] = $children;
                    }
                    $branch[] = $element;
                }
            }

            return $branch;
        }

        /* Вызов функции */
        $recCats = buildTree($categories);

        /* Возвращаем результат */
        return $recCats;
    }
    /* Метод сохранения сортированных категорий  */
    public function setnewcats (Request $request)
    {
        $categorie = Category::find($request->id);
        $categorie->queue = $request->queue;
        $categorie->save();

        return "OK";
    }
}
