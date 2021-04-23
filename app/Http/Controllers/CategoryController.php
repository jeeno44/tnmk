<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        return view('category.index');
    }
    public function settingIndex() {
        return view('category.setting');
    }
    public function settingSave(Request $request) {
        $sort = $request->input('sort');//Получаем отсортированный список id
    }
}
