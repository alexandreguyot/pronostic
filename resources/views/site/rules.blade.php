@extends('layouts.site')
@section('content')
    <div class="flex w-full bg-gradient-title py-4">
        <div class="w-1/4"></div>
        <h2 class="w-2/4 font-bold text-2xl">Réglements</h2>
        <div class="w-1/4">
            <form id="" action="{{ route('logout') }}" method="POST">
                {{ csrf_field() }}
                <i class="fa-solid fa-right-from-bracket"></i>
            </form>
        </div>
    </div>

    <div class="container mx-auto p-6">
        <div class="shadow-md rounded-lg border border-gray-200 p-6 mb-6">
            <h2 class="text-2xl font-semibold mb-4">Points de Base</h2>
            <p>
                Pour chaque pronostic, si vous trouvez le bon vainqueur du match, vous recevez <strong>2 points</strong>.
                Si le pronostic est incorrect, vous ne recevez aucun point.
            </p>
        </div>

        <div class="shadow-md rounded-lg border border-gray-200 p-6 mb-6">
            <h2 class="text-2xl font-semibold mb-4">Points Bonus</h2>

            <div class="mb-4">
                <h3 class="text-lg font-semibold mb-2">Basketball</h3>
                <ul class="list-disc ml-6">
                    <li>
                        <strong>Score pour chaque équipe (-5/+5)</strong> : <strong>1 point supplémentaire</strong>
                    </li>
                    <li>
                        <strong>Score pour chaque équipe (-2/+2)</strong> : <strong>2 points supplémentaires</strong>
                    </li>
                    <li>
                        <strong>Score exact</strong> : <strong>4 points supplémentaires</strong>
                    </li>
                </ul>
            </div>

            <div>
                <h3 class="text-lg font-semibold mb-2">Handball</h3>
                <ul class="list-disc ml-6">
                    <li>
                        <strong>Score pour chaque équipe (-3/+3)</strong> : <strong>1 point supplémentaire</strong>
                    </li>
                    <li>
                        <strong>Score pour chaque équipe (-1/+1)</strong> : <strong>2 points supplémentaires</strong>
                    </li>
                    <li>
                        <strong>Score exact</strong> : <strong>4 points supplémentaires</strong>
                    </li>
                </ul>
            </div>
        </div>

        <div class="shadow-md rounded-lg border border-gray-200 p-6">
            <h2 class="text-2xl font-semibold mb-4">Exemples de Calcul de Points</h2>

            <div class="mb-4">
                <h3 class="text-lg font-semibold mb-2">Basketball</h3>
                <p>
                    Si vous pronostiquez un score de 85-80 pour une équipe de basketball et que le score final est 87-79, vous recevez :
                </p>
                <ul class="list-disc ml-6">
                    <li>
                        <strong>Score pour chaque équipe (-5/+5)</strong> : 1 point supplémentaire.
                    </li>
                    <li>
                        <strong>Score pour chaque équipe (-2/+2)</strong> : 2 points supplémentaires.
                    </li>
                    <li>
                        <strong>Score exact</strong> : Si le score exact avait été pronostiqué, 4 points supplémentaires.
                    </li>
                </ul>
            </div>

            <div>
                <h3 class="text-lg font-semibold mb-2">Handball</h3>
                <p>
                    Si vous pronostiquez un score de 30-25 pour un match de handball et que le score final est 32-26, vous recevez :
                </p>
                <ul class="list-disc ml-6">
                    <li>
                        <strong>Score pour chaque équipe (-3/+3)</strong> : 1 point supplémentaire.
                    </li>
                    <li>
                        <strong>Score pour chaque équipe (-1/+1)</strong> : 2 points supplémentaires.
                    </li>
                    <li>
                        <strong>Score exact</strong> : Si le score exact avait été pronostiqué, 4 points supplémentaires.
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection