<?php
Route::group(['prefix'=>'projectmanager', 'middleware'=>['isProjectManager','auth','PreventBackHistory']], function(){
    Route::get('dashboard',[App\Http\Controllers\ProjectManager\ProjecManagerController::class,'index'])->name('projectmanager.dashboard');
   
    

});