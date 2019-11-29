<?php

namespace TTSoft\Products\Http\ViewComposers;

use Illuminate\View\View;
/**
 * Class SidebarComposer
 *
 * @package \App\ViewComposers
 */
use TTSoft\Products\Entities\Attribute;

class AttributeComposer
{
    public function compose(View $view){
        $attributes = $this->registerAttributes();
        $view->with([
            'attributes' => $attributes
        ]);
    }

    public function registerAttributes(){
        return Attribute::where(['parent_id' => 0,'status' => 1])->get();
    }
}
