<?php

// namespace App\Scopes;

// use Illuminate\Database\Eloquent\Builder;
// use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Scope;

// class RTScope implements Scope
// {
//     public function apply(Builder $builder, Model $model)
//     {
//         // Dapatkan ID pengguna yang sedang login
//         $usersid = auth()->id();

//         // Dapatkan ID RT dari user yang sedang login
//         $domisilis_id = auth()->user()->domisilis_id;

//         // Lakukan filtering data warga berdasarkan RT yang login
//         $builder->where('domisilis', $domisilis_id);
//     }
// }