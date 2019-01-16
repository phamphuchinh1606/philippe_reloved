<?php
namespace App\Http\Services;

use Illuminate\Http\Request;
use App\Common\Constant;
use App\Common\AppCommon;
use DB;
use App\Models\Tag;

class TagService extends BaseService
{
    public function getList(){
        return $this->tagLogic->getAll();
    }

    public function find($tagId){
        return $this->tagLogic->find($tagId);
    }

    private function getTagInfo(Request $request, $tag = null){
        if(!isset($tag)){
            $tag = new Tag();
        }
        if(isset($request->tag_name)){
            $tag->tag_name = $request->tag_name;
        }
        return $tag;
    }

    public function create(Request $request){
        $tag = $this->getTagInfo($request);
        if(isset($tag->tag_name)){
            try{
                DB::beginTransaction();
                $tag = $this->tagLogic->save($tag);
                DB::commit();

            }catch (\Exception $ex){
                DB::rollBack();
            }
        }
        return $tag;
    }

    public function update($tagId, $request){
        $tagDB = $this->tagLogic->find($tagId);
        if(isset($tagDB)){
            $tag = $this->getTagInfo($request,$tagDB);
            $this->tagLogic->save($tag);
        }
    }

    public function delete($tagId){
        $tag = $this->tagLogic->find($tagId);
        if(isset($tag)){
            $tag->delete_flg = Constant::$DELETE_FLG_ON;
            $this->tagLogic->save($tag);
        }
    }
}
