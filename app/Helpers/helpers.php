<?php

use Illuminate\Support\Str;

define("PAGELIST", "list");
define("PAGECREATEFORM", "create");
define("PAGEEDITFORM", "edit");

function getRolesName()
{
    $rolesName = "";
    $i = 0;
    foreach(auth()->user()->roles as $role)
    {
        $rolesName .= $role->nom_role;
        if($i < sizeof(auth()->user()->roles) - 1){
            $rolesName .= ",";
        }
        $i++;
    }
    return $rolesName;
}


 function setMenuClass($route, $class)
{
    $routeActuel = request()->route()->getName();

    if(contains($routeActuel, $route)) {
        return $class;
    }

    return "";
}


function contains($container, $content){
    return Str::contains($container, $content);
}

function setMenuActive($route){
    $routeActuel = request()->route()->getName();
    if($routeActuel === $route){
        return "active";
    }
    return "";
}
