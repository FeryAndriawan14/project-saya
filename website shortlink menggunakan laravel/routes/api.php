Route::get('/api/url-visits', function () {
$urlVisits = Url::select('short_url', 'visits')
->where('status', 'online')
->orderBy('visits', 'desc')
->limit(10)
->get();

return response()->json([
'urls' => $urlVisits->pluck('short_url'),
'visits' => $urlVisits->pluck('visits'),
]);
})->name('api.url-visits');