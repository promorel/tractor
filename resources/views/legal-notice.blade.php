@extends('layout.template')

@section('contenu')

    <!-- Breadcrumb Section Start -->
    <div class="section">
        <!-- Breadcrumb Area Start -->
        <div class="breadcrumb-area bg-light">
            <div class="container-fluid">
                <div class="breadcrumb-content text-center">
                    <h1 class="title">Mentions Légales</h1>
                    <ul>
                        <li>
                            <a href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="active">Mentions Légales</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Area End -->
    </div>
    <!-- Breadcrumb Section End -->


<div class="container my-5">
    <div class="row">
        <div class="col-lg-10 mx-auto">
            
            <div class="card mb-4">
                <div class="card-body">
                    <h3>Propriété du site</h3>
                    <p>Ce site Internet et tous les éléments textuels, graphiques et sonores qui le constituent sont la propriété de la Compagnie des Outils sauf mentions explicites.</p>
                    <p>L'ensemble de ce site relève des législations française et internationale sur le droit d'auteur et la propriété intellectuelle. Tous les droits de reproduction sont réservés, y compris pour les documents iconographiques et photographiques.</p>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-body">
                    <h3>Entité juridique</h3>
                    <p><strong>Compagnie des Outils</strong><br>
                    SARL unipersonnelle au capital de 10 000 €<br>
                    SIRET : 484 153 440 00033</p>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-body">
                    <h3>Siège social</h3>
                    <p>Compagnie des Outils<br>
                    11, rue d'Arves<br>
                    74970 MARIGNIER<br>
                    France</p>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-body">
                    <h3>Contact</h3>
                    <p><strong>Téléphone :</strong> +33 (0)4 50 07 05 88</p>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-body">
                    <h3>Informations légales détaillées</h3>
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td><strong>Raison sociale</strong></td>
                                <td>SARL La Compagnie Des Outils</td>
                            </tr>
                            <tr>
                                <td><strong>Statut juridique et capital social</strong></td>
                                <td>Capital social de 10 000 €</td>
                            </tr>
                            <tr>
                                <td><strong>Responsable</strong></td>
                                <td>Frédéric CHANDELIER</td>
                            </tr>
                            <tr>
                                <td><strong>Siège social</strong></td>
                                <td>11, rue de l'Arve ZA chez Millet<br>74970 Marignier<br>France</td>
                            </tr>
                            <tr>
                                <td><strong>Téléphone</strong></td>
                                <td>04 50 07 05 88</td>
                            </tr>
                            <tr>
                                <td><strong>Fax</strong></td>
                                <td>04 50 07 05 89</td>
                            </tr>
                            <tr>
                                <td><strong>E-mail</strong></td>
                                <td>jean.yves.chaleurbois@gmail.com</td>
                            </tr>
                            <tr>
                                <td><strong>Site web</strong></td>
                                <td>www.chaleurbois.com</td>
                            </tr>
                            <tr>
                                <td><strong>TVA intra-communautaire</strong></td>
                                <td>FR83 484 15 440</td>
                            </tr>
                            <tr>
                                <td><strong>SIRET</strong></td>
                                <td>484 153 440 00033</td>
                            </tr>
                            <tr>
                                <td><strong>Code APE/NAF</strong></td>
                                <td>524P</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-body">
                    <h3>Préambule</h3>
                    <p>Le site est la propriété de la SARL La Compagnie Des Outils en sa totalité, ainsi que l'ensemble des droits y afférents. Toute reproduction, intégrale ou partielle, est systématiquement soumise à l'autorisation des propriétaires. Toutefois, les liaisons du type hypertextes vers le site sont autorisées sans demandes spécifiques.</p>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-body">
                    <h3>Agence web & Création du site Internet</h3>
                    <p><strong>Agence MDN Annecy</strong> – Maisondunet.com<br>
                    SARL WEB 74<br>
                    3, esplanade Augustin Aussedat<br>
                    74960 ANNECY</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
