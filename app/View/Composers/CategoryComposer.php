<?php

namespace App\View\Composers;

use App\Models\Category;
use Illuminate\View\View;

class CategoryComposer
{

    public function compose(View $view)
    {
       $t = $view->with('categories', Category::with('sub_categories_even','sub_categories_odd')->where('isActive','1')->orderByDesc('updated_at')->get());

//dd($t->categories);
    }


}
