<?php

if (! function_exists('breadcrumbs')) {
    function breadcrumbs(array $breadcrumbs)
    {
        return view('helpers.breadcrumbs', ['breadcrumbs' => $breadcrumbs]);
    }
}