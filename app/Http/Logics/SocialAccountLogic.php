<?php
namespace App\Http\Logics;

use App\Common\Constant;
use App\Models\SocialAccount;

class SocialAccountLogic extends BaseLogic
{

    public function find($id){
        return SocialAccount::find($id);
    }

    public function findSocialAccount($provider, $providerUserId){
        $account = SocialAccount::whereProvider($provider)
            ->whereProviderUserId($providerUserId)
            ->first();
        return $account;
    }

    public function save(SocialAccount $item){
        if(isset($item)){
            $item->save();
            return $item;
        }
        return null;
    }
}
