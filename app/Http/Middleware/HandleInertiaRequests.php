<?php
//app/Http/Middleware/HandleInertiaRequests.php
namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    protected $rootView = 'app';
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    public function share(Request $request): array
    {
        return [
            ...parent::share($request),
            'locale' => request()->route('locale') ?? app()->getLocale(),
            'name' => config('app.name'),
            'auth' => [
                'user' => $request->user(),
            ],
        ];
    }
}
