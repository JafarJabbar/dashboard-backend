<?php

use function Livewire\Volt\{state};
use App\Models\Content\Category;

state(title: '', categories: fn() => Category::all());

$addCategory = function () {
    Category::create(['title' => $this->title]);

    $this->title = '';
    $this->categories = Category::all();
}; ?>
@extends('layouts.app')
@section('content')
    @volt
    <div>
        <h1>Add Category </h1>
        <form wire:submit="addCategory">
            <input type="text" wire:model="title">
            <button type="submit">Add</button>
        </form>

        <h1>Categorys</h1>
        <ul>
            @foreach ($categories as $category)
                <li>{{ $category->title }}</li>
            @endforeach
        </ul>
    </div>
    @endvolt
@endsection
