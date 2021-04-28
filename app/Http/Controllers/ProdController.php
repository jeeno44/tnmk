<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prod;

class ProdController extends Controller
{
    /* Метод поиска продуктов и связанных с ними категорий */
    public function findprods (Request $request)
    {
        $find = Prod::where('fields->'."ГОСТ",'like','%'.$request->search.'%')->get();

        $cats = [];

        if (count($find) > 0){
            foreach ($find as $item) {
                $cats[] = $item->category_id;
            }
            return $cats;
        }
        else{
            return "empty";
        }
    }
}
