<?php

namespace App\Common;

use Storage;
use Illuminate\Http\UploadedFile;
use Carbon\Carbon;

class AppCommon{

    public static function showTextDot($value, $lengthText){
        return str_limit($value,$lengthText,'....');
    }

    public static function getIsPublic($value){
        $isPublic = Constant::$PUBLIC_FLG_ON;
        if($value == "Off" || $value == null){
            $isPublic = Constant::$PUBLIC_FLG_OFF;
        }
        return $isPublic;
    }

    public static function copyImage($pathFileSrc , $pathFileDec){
        if(Storage::exists($pathFileSrc)){
            Storage::copy($pathFileSrc,$pathFileDec);
        }
    }

    public static function moveImage(UploadedFile $file, $pathFolder){
        if(isset($file)){
            $filename = time().'_'.$file->getClientOriginalName();
            $fileNameUpload = Storage::putFileAs($pathFolder, $file, $filename);
            return $fileNameUpload;
        }
        return "";
    }

    public static function moveImageBuilding(UploadedFile $file, $productId){
        return AppCommon::moveImage($file, Constant::$PATH_FOLDER_UPLOAD_BUILDING.'/'.$productId);
    }

    public static function deleteImage($imageName){
        if(Storage::exists($imageName)){
            Storage::delete($imageName);
        }
    }

    public static function formatMoney($value){
        return number_format($value);
    }

    public static function formatDouble($value){
        try{
            if($value == (int)$value){
                return number_format($value);
            }
        }catch (\Exception $ex){}

        return number_format($value,2);
    }

    public static function showValueOld($oldName, $value){
        $exit = false;
        eval('$exit= isset($'.$oldName.');');
        if($exit){
            $valueOld = "";
            eval('$valueOld = old($'.$oldName.')');
            return $valueOld;
        }
        return $value;
    }

    public static function nullToEmpty($value){
        if(!isset($value)) return '';
        return $value;
    }
}
