<?php

Route::group(['prefix'=>'superadmin', 'middleware'=>['isSuperadmin','auth','PreventBackHistory']], function(){
    Route::get('dashboard',[App\Http\Controllers\Superadmin\SuperAdminController::class,'index'])->name('superadmin.dashboard');
    


    // manage banner route here 
    Route::resource('/banner', App\Http\Controllers\Superadmin\BannerController::class);
    Route::post('/banner_status', [App\Http\Controllers\Superadmin\BannerController::class, 'BannerStatus'])->name('banner.status');

    // manage category route here 
    Route::resource('/category', App\Http\Controllers\Superadmin\CategoryController::class);
    Route::post('/category_status', [App\Http\Controllers\Superadmin\CategoryController::class, 'CategoryStatus'])->name('category.status');

    // manage product route here 
    Route::resource('/product', App\Http\Controllers\Superadmin\ProductController::class);
    Route::post('/product_status', [App\Http\Controllers\Superadmin\ProductController::class, 'ProductStatus'])->name('product.status');
    Route::post('/new_status', [App\Http\Controllers\Superadmin\ProductController::class, 'NewStatus'])->name('new.status');
    Route::post('/featured_status', [App\Http\Controllers\Superadmin\ProductController::class, 'FeaturedStatus'])->name('featured.status');


    //bid
    
    Route::get('/allbid', [App\Http\Controllers\BidingController::class, 'allbid'])->name('allbid');

    Route::get('/delevered/{id}', [App\Http\Controllers\BidingController::class, 'Delevered'])->name('bid.delevered');

    Route::get('/delete_bid/{id}', [App\Http\Controllers\BidingController::class, 'DeleteBid'])->name('bid.delete');

    Route::get('/view_bid/{id}', [App\Http\Controllers\BidingController::class, 'ViewBid'])->name('bid.view');
    



     // manage seeting route here 
     Route::resource('/setting', App\Http\Controllers\Superadmin\SetingController::class);

      // shipping manage sh route here 
      Route::resource('/shipping', App\Http\Controllers\Superadmin\shippingController::class);

     // manage user  route here 
     Route::resource('/user_account', App\Http\Controllers\Superadmin\UserAccountController::class);
     Route::post('/user_account_status', [App\Http\Controllers\Superadmin\UserAccountController::class, 'UserAcountStatus'])->name('user_account.status');
     Route::post('/user_vendor_status', [App\Http\Controllers\Superadmin\UserAccountController::class, 'UserVendorStatus'])->name('user_vendor.status');

     // manage project manager route here 
     Route::resource('/project_manager_account', App\Http\Controllers\Superadmin\ProjectManagerAccountController::class);
     Route::post('/project_manager_account_status', [App\Http\Controllers\Superadmin\ProjectManagerAccountController::class, 'ProjectManagerAcountStatus'])->name('project_manager_account.status');
     Route::post('/project_manager_vendor_status', [App\Http\Controllers\Superadmin\ProjectManagerAccountController::class, 'ProjectManagerVendorStatus'])->name('project_manager_vendor.status');

      // manage company route here 
      Route::resource('/company_account', App\Http\Controllers\Superadmin\CompanyAccountController::class);
      Route::post('/company_account_status', [App\Http\Controllers\Superadmin\CompanyAccountController::class, 'CompanyAcountStatus'])->name('company_account.status');
      Route::post('/company_vendor_status', [App\Http\Controllers\Superadmin\CompanyAccountController::class, 'CompanyVendorStatus'])->name('company_vendor.status');

     Route::resource('/problem', App\Http\Controllers\Superadmin\ProblemController::class);
     Route::resource('/faq', App\Http\Controllers\Superadmin\FAQController::class);



});