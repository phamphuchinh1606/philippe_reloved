<?php

namespace App\Common;

class Constant{
    public static $DELETE_FLG_ON = 1;
    public static $DELETE_FLG_OFF = 0;

    public static $PUBLIC_FLG_ON = 1;
    public static $PUBLIC_FLG_ON_NAME = "Public";
    public static $PUBLIC_FLG_OFF = 0;
    public static $PUBLIC_FLG_OFF_NAME = "UnPublic";

    //path image
    public static $PATH__IMAGE = "images/upload";
    //path default image
    public static $PATH__DEFAULT__IMAGE = "images/no_image_available.jpg";
    //path default avatar
    public static $PATH__DEFAULT__AVATAR = "images/no_image_available.jpg";

    public static $API_NAME_TWITTER = 'twitter';
    public static $API_NAME_FACEBOOK = 'facebook';
    public static $API_NAME_INSTAGRAM = 'instagram';

    public static $PATH_FOLDER_UPLOAD_USER = "users";
    public static $PATH_FOLDER_UPLOAD_ITEM_PHOTO = "item_photo";
    public static $PATH_URL_UPLOAD_IMAGE = "storage/";
//    public static $PATH_URL_UPLOAD_IMAGE = "storage/app/public/";

}
