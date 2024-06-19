@extends('layouts.site')
@section('content')
    <div class="flex justify-center w-full bg-gradient-title py-4">
        <h2 class="font-bold text-xl">Mes Pronos</h2>
    </div>

    <div class="flex flex-col justify-center w-full">
        <div class="flex justify-center w-full bg-gradient-date text-white py-2 text-sm">
            Vendredi 14 juin
        </div>
        <div class="flex py-2">
            <div class="flex flex-col items-center justify-center w-1/3">
                <span class="icons fi fi-de fis"></span>
                <p>Allemagne</p>
            </div>
            <div class="flex items-center justify-center w-1/3">
                <div class="flex flex-col items-center">
                    <div class="mb-2">
                        J1 - 17:00
                    </div>
                    <div class="flex space-x-4 w-full">
                        <input type="text" maxlength="3" class="block py-3 text-sm font-extrabold text-center text-gray-900 bg-white border border-gray-300 rounded-lg w-9 h-9 focus:ring-primary-500 focus:border-primary-500" required />
                        <input type="text" maxlength="3" class="block py-3 text-sm font-extrabold text-center text-gray-900 bg-white border border-gray-300 rounded-lg w-9 h-9 focus:ring-primary-500 focus:border-primary-500" required />
                    </div>
                </div>
            </div>
            <div class="flex flex-col items-center justify-center w-1/3">
                <span class="icons fi fi-gb-sct fis"></span>
                <p>Ecosse</p>
            </div>
        </div>
    </div>
@endsection
