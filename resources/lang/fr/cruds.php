<?php

return [
    'userManagement' => [
        'title'          => 'Rôles et autorisations',
        'title_singular' => 'Rôles et autorisations',
    ],
    'permission' => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'Rôles',
        'title_singular' => 'Rôle',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'Utilisateurs',
        'title_singular' => 'Utilisateur',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Nom',
            'name_helper'              => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Password',
            'password_helper'          => ' ',
            'roles'                    => 'Roles',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'locale'                   => 'Locale',
            'locale_helper'            => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
            'firstname'                => 'Prénom',
            'firstname_helper'         => ' ',
        ],
    ],
    'pronostic' => [
        'title'          => 'Pronostic',
        'title_singular' => 'Pronostic',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => ' ',
            'score_home'            => 'Score Home',
            'score_home_helper'     => 'Veuillez entrer un score entier',
            'score_exterior'        => 'Score Exterieur',
            'score_exterior_helper' => 'Veuillez entrer un score entier',
            'created_at'            => 'Created at',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => ' ',
            'points'                => 'Points',
            'points_helper'         => ' ',
            'game'                  => 'Match',
            'game_helper'           => ' ',
        ],
    ],
    'parametre' => [
        'title'          => 'Paramètres',
        'title_singular' => 'Paramètre',
    ],
    'team' => [
        'title'          => 'Equipes',
        'title_singular' => 'Equipe',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Nom de l\'équipe',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'sport'             => 'Sport',
            'sport_helper'      => ' ',
            'group'             => 'Groupe',
            'group_helper'      => ' ',
        ],
    ],
    'classement' => [
        'title'          => 'Classement',
        'title_singular' => 'Classement',
    ],
    'championship' => [
        'title'          => 'Championnats',
        'title_singular' => 'Championnat',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Titre',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'user'              => 'User',
            'user_helper'       => ' ',
        ],
    ],
    'competition' => [
        'title'          => 'Compétitions',
        'title_singular' => 'Compétition',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Titre',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'sport'             => 'Sport',
            'sport_helper'      => ' ',
        ],
    ],
    'game' => [
        'title'          => 'Matchs',
        'title_singular' => 'Match',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => ' ',
            'competition'           => 'Compétition',
            'competition_helper'    => ' ',
            'tour'                  => 'Journée',
            'tour_helper'           => ' ',
            'date_time'             => 'Date et horaire',
            'date_time_helper'      => ' ',
            'home_team'             => 'Equipe à domicile',
            'home_team_helper'      => ' ',
            'home_score'            => 'Score équipe domicile',
            'home_score_helper'     => ' ',
            'exterior_team'         => 'Equipe à l\'extérieur',
            'exterior_team_helper'  => ' ',
            'exterior_score'        => 'Score équipe extérieur',
            'exterior_score_helper' => ' ',
            'created_at'            => 'Created at',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => ' ',
        ],
    ],
];
