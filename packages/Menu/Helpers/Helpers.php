<?php

use TTSoft\Menu\Entities\Menu;
use TTSoft\Post\Entities\Category;
use TTSoft\Page\Entities\Page;
use TTSoft\Post\Entities\Post;
use TTSoft\Courses\Entities\Courses;
function menu_list($lang , $category_id, $parent = 0){ ?>
    <?php $data = Menu::where(['parent_id' => $parent ,'category' => $category_id,'lang' => $lang])->orderBy('position','ASC')->get(); ?>
    <?php if(count($data) > 0): ?>
    <ol class="dd-list">
        <?php foreach($data as $menu): ?>
            <li class="dd-item" data-id="<?php echo $menu->getId(); ?>">
              <div class="dd-handle"> <?php echo $menu->title; ?>
                <div class="pull-right action-buttons"> 
                    <a href="<?php echo route('admin.menu.edit',$menu->getId()); ?>" class="blue"> <i class="ace-icon fa fa-pencil bigger-130"></i> </a> 
                    <a onclick="return onDelete()" href="<?php echo route('admin.menu.delete',$menu->getId()); ?>" class="red remove"> <i class="ace-icon fa fa-trash-o bigger-130"></i> </a> 
                </div>
              </div>
              <?php menu_list($lang , $category_id, $menu->id); ?>
            </li>
        <?php endforeach; ?>
    </ol>
    <?php endif; ?>
<?php }


function extract_value($array = array(),$parent=0,$i=1){
    foreach($array as $k => $v) {
        $id = $array[$k]['id'];
        $sql = "UPDATE menus SET position = '".$i."', parent_id = '".$parent."' WHERE id = '$id'";
        $result = DB::update($sql);
        if(isset($array[$k]['children'])){
            $children = $array[$k]['children'];
            foreach($children as $key => $obj){
                $child = $children[$key]['id'];
                $i++;
                $sql2 = "UPDATE menus SET position = '$i', parent_id = '$id' WHERE id = '$child'";
                $result2 = DB::update($sql2);
                if(isset($children[$key]['children'])) extract_value($children[$key]['children'],$child,++$i);
            }
        }
        $i++;
    }
}
function menu_category($lang,$parent = 0,$text = ''){ ?>
    <?php $data = Category::getContentAll($lang)->where(['parent_id' => $parent])->get(); ?>
    <?php foreach($data as $category): ?>
        <li>
            <?php echo $text; ?><input type="checkbox" name="category[]" class="check" value="<?php echo $category->getId(); ?>">
            <span><?php echo $category->title; ?></span>
            <?php menu_category($lang,$category->getId(),$text.'&nbsp; &nbsp; &nbsp;'); ?>
        </li>
    <?php endforeach; ?>
<?php }

function menu_courses(){ ?>
    <?php $data = Courses::all(); ?>
    <?php foreach($data as $category): ?>
        <li>
            <input type="checkbox" name="courses[]" class="check"  value="<?php echo $category->getId(); ?>">
            <span><?php echo $category->getTitle(); ?></span>
        </li>
    <?php endforeach; ?>
<?php }
/* trang */
function menu_page($lang){ ?>
    <?php $data = Page::getContentAll($lang)->get(); ?>
    <?php foreach($data as $category): ?>
        <li>
            <input type="checkbox" name="page[]" value="<?php echo $category->getId(); ?>" class="check" >
            <span><?php echo $category->title; ?></span>
        </li>
    <?php endforeach; ?>
<?php }
/* bài viêt */
 function menu_post($lang){ ?>
    <?php $data = Post::getContentAll($lang)->orderBy('id','DESC')->get(); ?>
    <?php foreach($data as $category): ?>
        <li>
            <input type="checkbox" name="post[]" value="<?php echo $category->getId(); ?>" class="check" >
            <span><?php echo $category->getTitle(); ?></span>
        </li>
    <?php endforeach; ?>
<?php }

function menu_value(){
   if (!Session::has('key_value')){
        $val = 1;
   }else{
        $val = Session::get('key_value');
   }
   return $val;
}