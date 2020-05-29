<?php

// controller injection
use App\Http\Controllers\Notifier\DecedentController;

// routes definition
Route::group([ 'middleware' => ['web','notifier']], function (){
    Route::get('/completed-estate-account', [DecedentController::class,'completedEstateAccount'])->name('completed-estate-account');
    Route::get('/completed-estate-account/{id}', [DecedentController::class,'viewCompletedEstateAccount'])->name('view-completed-estate-account');
    Route::get('/uncompleted-estate-account', [DecedentController::class,'index'])->name('uncompleted-estate-account');
    Route::get('/support', [DecedentController::class,'index'])->name('support');
    Route::get('/profile', [DecedentController::class,'profile'])->name('profile');
    Route::post('/profile-update', [DecedentController::class,'updateProfile'])->name('profile-update');
    Route::post('/password-update', [DecedentController::class,'updatePassword'])->name('password-update');
    Route::get('/decedent-request/step-one', [DecedentController::class,'stepOne'])->name('step.one');
    Route::group([ 'middleware' => 'decedent.request:TWO'], function (){
        Route::get('/decedent-request/step-two',[DecedentController::class,'stepTwo'])->name('step.two');
    });
    Route::group([ 'middleware' => 'decedent.request:THREE'], function () {
        Route::get('/decedent-request/step-three', [DecedentController::class, 'stepThree'])->name('step.three');
    });
    Route::group([ 'middleware' => 'decedent.request:FOUR'], function () {
        Route::get('/decedent-request/step-four', [DecedentController::class, 'stepFour'])->name('step.four');
    });
    Route::get('/decedent-request/complete', [DecedentController::class, 'decedentRequestComplete'])->name('decedent.request.complete');

    Route::post('/decedent-request/step-one', [DecedentController::class,'storeStepOne'])->name('decedent.request.stepone');
    Route::post('/decedent-request/step-two', [DecedentController::class,'storeStepTwo'])->name('decedent.request.steptwo');
    Route::post('/decedent-request/step-three', [DecedentController::class,'storeStepThree'])->name('decedent.request.stepthree');
    Route::post('/file-upload', [DecedentController::class, 'fileUpload'])->name('file.upload');
    Route::post('/decedent-request/store', [DecedentController::class, 'storeDecedentRequest'])->name('decedent.request.store');
});

Route::post('/decedent-request/draft', [DecedentController::class, 'storeDraft'])->name('decedent.request.draft');




?>
