<?php
Route::group(['prefix'=>'company', 'middleware'=>['isCompany','auth','PreventBackHistory']], function(){
    Route::get('dashboard',[App\Http\Controllers\Company\CompanyController::class,'index'])->name('company.dashboard');
   
    
    

});