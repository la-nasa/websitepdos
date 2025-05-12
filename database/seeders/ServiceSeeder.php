<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'titre'       => 'Développement d’applications mobiles et Web',
                'description' => 'Création d’applications performantes et sur-mesure.',
                'icone'       => 'fa-solid fa-mobile-screen-button',
            ],
            [
                'titre'       => 'Design graphique',
                'description' => 'Identité visuelle, UI/UX, supports print & digital.',
                'icone'       => 'fa-solid fa-palette',
            ],
            [
                'titre'       => 'Référencement SEO & CEO',
                'description' => 'Optimisation on-site et off-site pour votre visibilité.',
                'icone'       => 'fa-solid fa-chart-line',
            ],
            [
                'titre'       => 'Marketing digital',
                'description' => 'Campagnes SEA, inbound marketing, content strategy.',
                'icone'       => 'fa-solid fa-bullhorn',
            ],
            [
                'titre'       => 'Gestion des réseaux sociaux',
                'description' => 'Community management et animation de vos comptes.',
                'icone'       => 'fa-solid fa-hashtag',
            ],
        ];

        foreach ($services as $s) {
            Service::create($s);
        }
    }
}
