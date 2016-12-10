<?php
namespace App\Http\Requests;
use App\Http\Requests\Request;
class LoginRequest extends Request
{
 /**
 * Determine if the user is authorized to make this request.
 *
 * @return bool
 */
 public function authorize()
 {
 return true;
 }
/**
 * Get the validation rules that apply to the request.
 *
 * @return array
 */
 public function rules()
 {
   return [
    'username' => 'required', 
    'password' => 'required|min:6'
   ];
 }

 public function messages()
 {
   return [
    'username.required' => 'username tidak boleh kosong', 
    'password.required' => 'password tidak boleh kosong',
    'password.min' => 'password minimal 6 karakter'
   ];
 }
}