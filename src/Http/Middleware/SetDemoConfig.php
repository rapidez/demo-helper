<?php

namespace Rapidez\DemoHelper\Http\Middleware;

use Closure;
use Illuminate\Support\Arr;

class SetDemoConfig
{
    public function handle($request, Closure $next)
    {
        $sessionConfig = $request->session()->get('config', []);

        if ($request->has('checkout')) {
            if ($request->get('checkout') === 'onestep') {
                Arr::set($sessionConfig, 'rapidez.frontend.checkout_steps.default', ['onestep']);
            } else {
                Arr::forget($sessionConfig, 'rapidez.frontend.checkout_steps.default');
            }
            $request->session()->put('config', $sessionConfig);
        }

        $config = config();

        foreach($sessionConfig as $key => $values) {
            $config->set($key, array_merge_recursive(
                $values ?? [], $config->get($key, [])
            ));
        }

        return $next($request);
    }
}
