<?php
/**
 * @author Pande
 */
namespace App\Helpers;

use Session;

/**
 *  Class Alert
 */
class Alert
{
    public static function make($type,$msg)
    {
        Session::flash('type',$type);
        Session::flash('msg',$msg);
    }

    public static function has()
    {
        return (Session::has('type') && Session::has('msg'));
    }

    public static function type()
    {
        return Session::get('type');
    }

    public static function msg()
    {
        return Session::get('msg');
    }

    public static function showBox(){
        if(self::has()){
            return "
            <div class='row'>
                <div class='col-md-12'>
                    <div class='alert alert-".self::type()."'>".self::msg()."</div>
                </div>
            </div>
            ";
        }
    }
}
