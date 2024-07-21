@extends('layouts.app')

@section('content')
<section class="relative w-full h-full py-16 min-h-screen">
    <div class="container mx-auto px-4 h-full">
        <div class="flex content-center items-center justify-center h-full">
            <div class="w-full lg:w-6/12 px-4">
                <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-200 border-0">
                    <div class="rounded-t mb-0 px-6 py-6">
                        <div class="text-center mb-3">
                            <h6 class="text-blueGray-500 text-sm font-bold">
                                {{ __('Vérifiez votre adresse e-mail') }}
                            </h6>
                        </div>
                        <hr class="mt-6 border-b-1 border-blueGray-300" />
                    </div>
                    <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                        @if(session('resent'))
                            <div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-green-500">
                                <span class="inline-block align-middle mr-8">
                                    {{ __('Un nouveau lien de vérification a été envoyé à votre adresse e-mail.') }}
                                </span>
                            </div>
                        @endif
                        {{ __('Avant de continuer, veuillez vérifier votre e-mail pour un lien de vérification.') }}
                        {{ __('Si vous n\'avez pas reçu l\'e-mail') }},
                        <form class="inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button class="inline-block p-0 m-0 text-lightBlue-500 hover:underline align-baseline">
                                {{ __('cliquez ici pour en demander un autre') }}
                            </button>.
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
