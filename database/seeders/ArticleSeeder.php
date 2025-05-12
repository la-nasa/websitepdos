<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $articles = [
            [
                'titre'   => 'Pourquoi choisir Laravel pour votre projet Web ?',
                'contenu' => "
**Laravel** est aujourd’hui l’un des frameworks PHP les plus **populaires**.
Il apporte :

- **Une structure MVC** claire favorisant la maintenabilité
- **Un ORM Eloquent** puissant pour gérer vos bases de données
- **Un écosystème riche** (Forge, Vapor, Nova…)
- **Un système de queues et d’événements** pour décharger vos traitements lourds

> “Laravel nous a permis de gagner 30 % de temps de développement sur nos applications.”

Découvrez comment People Dev utilise Laravel pour livrer des applications robustes et scalables.",
                'image'   => 'https://images.unsplash.com/photo-1581091012184-82727750e9a4?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80'
            ],
            [
                'titre'   => 'Les meilleures pratiques UI/UX en 2025',
                'contenu' => "
Le design d’interface et l’expérience utilisateur (UI/UX) évoluent sans cesse. Voici nos recommandations 2025 :

1. **Dark Mode**
   - Réduit la fatigue oculaire
   - Consommation d’énergie optimisée sur OLED

2. **Micro‐interactions**
   - Feedback instantané (boutons, chargements)
   - Animation subtile pour guider l’utilisateur

3. **Design accessible**
   - Contraste supérieur à 4.5:1
   - Navigation clavier, lecteurs d’écran

4. **Mobile‐First**
   - Priorité aux performances sur smartphone
   - Layouts adaptatifs et simplifiés

People Dev intègre ces pratiques dans chacune de ses maquettes, garantissant **accessibilité**, **esthétique** et **performance**.",
                'image'   => 'https://images.unsplash.com/photo-1559027615-4f0ef1b1b09f?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80'
            ],
            [
                'titre'   => 'SEO Technique : les points clés à ne pas manquer',
                'contenu' => "
Le SEO ne se limite pas aux mots‐clés ! Pour un classement optimal, vérifiez :

- **Temps de chargement** (< 2s)
- **Sitemap XML** à jour
- **Utilisation de balises `<h1>…<h6>`** hiérarchisées
- **URLs canoniques** pour éviter le contenu dupliqué
- **Schema.org** pour les rich snippets

> “Après audit technique, nos clients constatent en moyenne +50 % de trafic organique.”

Nos audits SEO détaillés sont accompagnés de rapports et de plans d’action concrets.",
                'image'   => 'https://images.unsplash.com/photo-1505751172876-fa1923c5c528?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80'
            ],
            [
                'titre'   => 'Inbound Marketing : convertir vos leads en clients',
                'contenu' => "
L’**Inbound Marketing** attire naturellement vos prospects grâce à :

- **Contenu de valeur** (articles, ebooks)
- **Nurturing via email**
- **Webinaires** et événements en ligne
- **Automation** pour personnaliser l’expérience

**Étude de cas** : +200 % de leads qualifiés en 6 mois pour un client SaaS grâce à notre stratégie.",
                'image'   => 'https://images.unsplash.com/photo-1533630401814-8d85f2385b10?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80'
            ],
            [
                'titre'   => 'Community Management : bâtir une marque forte sur les réseaux',
                'contenu' => "
Une communauté engagée est un atout majeur :

1. **Calendrier éditorial** structuré
2. **Visuels cohérents** (charte graphique respectée)
3. **Interactions** rapides (réponses, sondages)
4. **Analyse des KPIs** (engagement, reach)

Nous gérons vos pages Facebook, LinkedIn, Instagram et Twitter avec des **campagnes ciblées** et des **reportings réguliers**.",
                'image'   => 'https://images.unsplash.com/photo-1504384308090-c894fdcc538d?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80'
            ],
        ];

        foreach ($articles as $item) {
            Article::create([
                'titre'   => $item['titre'],
                'contenu' => $item['contenu'],
                'slug'    => Str::slug($item['titre']),
                'image'   => $item['image'],
            ]);
        }
    }
}
