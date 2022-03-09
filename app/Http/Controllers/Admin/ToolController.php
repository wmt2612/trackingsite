<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ToolController extends Controller
{
     /**
     * Tools 
     */

    public function toolSha1(Request $request)
    {
       $numbersOfEncrypt = $request->input('numbers_encrypt') ?? 1;
       $valueEncrypt = $request->input('text_encrypt');
       if($request->has('text_encrypt')) {
            for($i = 0; $i < $numbersOfEncrypt; $i++) {
                $valueEncrypt = sha1($valueEncrypt);
            }
       }
        return view('admin.tools.sha1', compact('valueEncrypt'));
    }

    public function toolBase64(Request $request)
    {
        $type = $request->input('type');
       $numbersOfEncrypt = $request->input('numbers_encrypt') ?? 1;
       $valueEncrypt = $request->input('text_encrypt');
       if($request->has('text_encrypt')) {
           switch($type) {
              case 'encrypt':
                for($i = 0; $i < $numbersOfEncrypt; $i++) {
                    $valueEncrypt = base64_encode($valueEncrypt);
                }
                break;
              case 'decrypt':
                for($i = 0; $i < $numbersOfEncrypt; $i++) {
                    $valueEncrypt = base64_decode($valueEncrypt);
                }
                break;
           }
           
       }
        return view('admin.tools.base64', compact('valueEncrypt'));
    }
    /**
     * End tools
     */
}
