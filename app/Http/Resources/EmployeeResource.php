<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{

    protected $token;

    public function __construct($resource, $token)
    {
        parent::__construct($resource);
        $this->token = $token;
    }
    
    public function toArray(Request $request): array
    {
        return[

            'id' => $this->employee->id ,
            'user_id' => $this->id, 
            'full_name'=>$this->full_name,
            'email'=>$this->email,
'address' =>$this-> address,
           'Mobile_number' =>$this-> Mobile_number,
'birth_date' => $this->birth_date,
  'role' => 'employee',
    'token' => $this->token,
     '_administrative_department_id'=>$this->_administrative_department_id,
'employe_type' => $this->employee->employe_type,
'_administrative_department_id' => $this->employee->_administrative_department_id 
];
    }
}