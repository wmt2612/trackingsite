<?php 

use App\Models\Setting;

/**
 * @param array 
 * @return null 
 * 
 * @param string
 * @return string
 */
if(! function_exists('setting')) {
    function setting($keys)
    {     
        if(is_array($keys)) {
            foreach($keys as $key => $value) {
                Setting::create([
                    'key' => $key,
                    'value' => $value,
                ]);
            }
        }  
        if(is_string($keys)) {
            $setting = Setting::where('key', $keys)->first();
            if($setting !== null) {
                return $setting->value;
            }
        } 
        return '';
    }
}
