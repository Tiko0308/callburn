<?php namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;
use Auth;

class UsersUpdateRequest extends Request {

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
            'first_name' => 'required',
            'last_name' => 'required',
            'password' =>'required'
                 
        ];
    }

    /**
     * Make changes before sending the data
     *
     * @return array
    */
    public function inputs()
    {
        $inputs = $this->all();
        $inputs['password'] = bcrypt($inputs['password']);
        return $inputs;
    }
}