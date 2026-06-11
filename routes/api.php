<?php

use Bildvitta\IssJuridico\Http\Controllers\Documents\CancelController;
use Bildvitta\IssJuridico\Http\Controllers\Documents\ChangeSignerController;
use Bildvitta\IssJuridico\Http\Controllers\Documents\DownloadController;
use Bildvitta\IssJuridico\Http\Controllers\Documents\EditSignerController;
use Bildvitta\IssJuridico\Http\Controllers\Documents\FileController;
use Bildvitta\IssJuridico\Http\Controllers\Documents\FileDocumentController;
use Bildvitta\IssJuridico\Http\Controllers\Documents\HistoricController;
use Bildvitta\IssJuridico\Http\Controllers\Documents\HistoricDocumentController;
use Bildvitta\IssJuridico\Http\Controllers\Documents\IndexController;
use Bildvitta\IssJuridico\Http\Controllers\Documents\ResendSignerController;
use Bildvitta\IssJuridico\Http\Controllers\Documents\SelectController;
use Bildvitta\IssJuridico\Http\Controllers\Documents\SendController;
use Bildvitta\IssJuridico\Http\Controllers\Documents\VerifySignatureController;
use Bildvitta\IssJuridico\Http\Controllers\Documents\WebhookController;
use Illuminate\Support\Facades\Route;

Route::middleware('hub.auth')->group(function () {
    Route::prefix('api/legal-documents/')->as('issjuridico.legal-documents.')->group(function () {
        Route::get('/')->name('index')->uses(IndexController::class);
        Route::post('/send')->name('send')->uses(SendController::class);
        Route::get('/file')->name('file')->uses(FileController::class);
        Route::get('/historic')->name('historic')->uses(HistoricController::class);
        Route::get('/select')->name('select')->uses(SelectController::class);
        Route::get('/{document}/historic')->name('historic-document')->uses(HistoricDocumentController::class);
        Route::get('/{document}/file')->name('file-document')->uses(FileDocumentController::class);
        Route::get('/{document}/download')->name('download')->uses(DownloadController::class);
        Route::get('/{document}/verify-signatures')->name('verify-signatures')->uses(VerifySignatureController::class);
        Route::put('/{document}/cancel')->name('cancel')->uses(CancelController::class);
        Route::get('/{document}/resend-signer/{signerDocument}')->name('resend-signer')->uses(ResendSignerController::class);
        Route::get('/{document}/change-signer/{signerDocument}/edit')->name('edit-signer')->uses(EditSignerController::class);
        Route::put('/{document}/change-signer/{signerDocument}')->name('change-signer')->uses(ChangeSignerController::class);
        Route::post('/webhook')->name('webhook')->uses(WebhookController::class);
    });
});

Route::middleware('hub.programmatic')->group(function () {
    Route::prefix('api/legal-documents/')->as('issjuridico.programmatic.legal-documents.')->group(function () {
        Route::post('/webhook')->name('webhook')->uses(WebhookController::class);
    });
});
