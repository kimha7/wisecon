<?php

namespace App\Models\Loans;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
  //
  public function client(){
    return $this->belongsTo('App\Models\Clients\Client');
  }

  public function group(){
    return $this->hasOneThrough('App\Models\Clients\Group', 'App\Models\Clients\Client');
  }



  //
  public function installments(){
    return $this->hasMany('App\Models\Loans\Installment');
  }

  //
  public function loan_type(){
    return $this->belongsTo('App\Models\LoanType');
  }
}
