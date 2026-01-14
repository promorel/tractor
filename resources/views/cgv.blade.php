@extends('layout.template')

@section('contenu')



    <!-- Breadcrumb Section Start -->
    <div class="section">
        <!-- Breadcrumb Area Start -->
        <div class="breadcrumb-area bg-light">
            <div class="container-fluid">
                <div class="breadcrumb-content text-center">
                    <h1 class="title">Conditions Générales de Vente</h1>
                    <ul>
                        <li>
                            <a href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="active">Conditions Générales de Vente</li>
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
                <div class="card-header bg-warning text-white">
                    <h4 class="mb-0">1. Acceptation des conditions</h4>
                </div>
                <div class="card-body">
                    <p>Le client reconnaît avoir pris connaissance, au moment de la passation de commande, des conditions particulières de vente énoncées ci-dessous et déclare expressément les accepter sans réserve.</p>
                    <p>Les présentes conditions générales de vente régissent les relations contractuelles entre la SARL La Compagnie Des Outils et son client, les deux parties les acceptant sans réserve. Ces conditions générales de vente prévaudront sur toutes autres conditions figurant dans tout autre document, sauf dérogation préalable, expresse et écrite.</p>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header bg-warning text-white">
                    <h4 class="mb-0">2. Produits</h4>
                </div>
                <div class="card-body">
                    <p>Les photographies illustrant les produits n'entrent pas dans le champ contractuel. La majorité des produits proposés à ses clients par la SARL La Compagnie Des Outils sont disponibles dans notre entrepôt ou sur commande chez nos fournisseurs.</p>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header bg-warning text-white">
                    <h4 class="mb-0">3. Commande</h4>
                </div>
                <div class="card-body">
                    <p>Les systèmes d'enregistrement automatique sont considérés comme valant preuve, de la nature, du contenu et de la date de la commande. La SARL La Compagnie Des Outils confirme l'acceptation de sa commande au client à l'adresse mail que celui-ci aura communiqué. La vente ne sera conclue qu'à compter de la confirmation de la commande.</p>
                    <p>La SARL La Compagnie Des Outils se réserve le droit d'annuler toute commande d'un client avec lequel existerait un litige relatif au paiement d'une commande antérieure. Les informations énoncées par l'acheteur, lors de la prise de commande engagent celui-ci : en cas d'erreur dans le libellé des coordonnées du destinataire, le vendeur ne saurait être tenu responsable de l'impossibilité dans laquelle il pourrait être de livrer le produit.</p>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header bg-warning text-white">
                    <h4 class="mb-0">4. Livraison</h4>
                </div>
                <div class="card-body">
                    <p>Après confirmation de commande, la SARL La Compagnie Des Outils s'engage à livrer à son transporteur toutes les références commandées par l'acheteur dans le délai mentionné lors de la commande.</p>
                    <p><strong>France métropolitaine :</strong> Délai de livraison de 3 à 5 jours ouvrés.</p>
                    <p>Pour les livraisons hors de la France métropolitaine, le client s'engage à régler toutes les taxes dues à l'importation de produits, droits de douane, taxe sur la valeur ajoutée, et toutes autres taxes dues en vertu des lois du pays de réception de la commande.</p>
                    <p class="alert alert-warning"><strong>Important :</strong> En cas de défauts apparents, vous disposez d'un délai de 48 heures pour faire d'éventuelles réserves auprès du transporteur en cas de manquant ou de dégradation.</p>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header bg-warning text-white">
                    <h4 class="mb-0">5. Droit de rétractation</h4>
                </div>
                <div class="card-body">
                    <p><strong>Vous avez le droit de vous rétracter du présent contrat sans donner de motif dans un délai de quatorze jours.</strong></p>
                    <p>Le délai de rétractation expire quatorze jours après le jour où vous-même, ou un tiers autre que le transporteur et désigné par vous, prend physiquement possession du bien.</p>
                    
                    <h5 class="mt-4">Pour exercer le droit de rétractation :</h5>
                    <p>Vous devez notifier votre décision de rétractation au moyen d'une déclaration dénuée d'ambiguïté (lettre, télécopie ou courrier électronique) à :</p>
                    <div class="bg-light p-3 rounded">
                        <p class="mb-0">SARL La Compagnie Des Outils<br>
                        11 rue de l'Arve ZA chez Millet<br>
                        74970 Marignier – FRANCE</p>
                    </div>
                    
                    <h5 class="mt-4">Effets de la rétractation :</h5>
                    <p>En cas de rétractation, nous vous rembourserons tous les paiements reçus, y compris les frais de livraison, sans retard excessif et au plus tard quatorze jours à compter du jour où nous sommes informés de votre décision.</p>
                    <p class="alert alert-info">Vous devrez renvoyer le bien intact, à l'état neuf, dans son emballage d'origine, accompagné de l'ensemble des accessoires et notices.</p>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header bg-warning text-white">
                    <h4 class="mb-0">6. Prix</h4>
                </div>
                <div class="card-body">
                    <p>Le prix est exprimé en <strong>euros</strong>.</p>
                    <p>Le prix indiqué sur les fiches produit ne comprend pas le transport.</p>
                    <p>Le prix indiqué dans la confirmation de commande est le prix définitif, exprimé toutes taxes comprises (TTC) et incluant la TVA pour la France et les pays de la CEE. Ce prix comprend le prix des produits, les frais de manutention, d'emballage et de conservation des produits et transport.</p>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header bg-warning text-white">
                    <h4 class="mb-0">7. Paiement</h4>
                </div>
                <div class="card-body">
                    <p>Le prix des produits est payable au comptant le jour de la commande effective.</p>
                    
                    <h5 class="mt-3">Modes de paiement acceptés :</h5>
                    <ul>
                        <li><strong>Chèque</strong> libellé à l'ordre de la Compagnie des Outils</li>
                        <li><strong>Paiement en 3 fois sans frais</strong> par chèque à partir de 300€ d'achat</li>
                        <li><strong>Carte bancaire CB</strong> via serveur sécurisé BANQUE POPULAIRE DES ALPES</li>
                        <li><strong>PayPal</strong> (vos comptes PayPal et Chaleurbois.com doivent être associés à la même adresse e-mail)</li>
                        <li><strong>Virement bancaire</strong></li>
                    </ul>

                    <h5 class="mt-4">Paiement en 3x ou 4x par CB avec Oney Bank</h5>
                    <p>Notre partenaire Oney Bank propose un financement de 100€ à 3000€ en 3 ou 4 fois.</p>
                    
                    <div class="bg-light p-3 rounded mb-3">
                        <p class="mb-2"><strong>Paiement en 3 fois :</strong></p>
                        <p class="mb-0">Exemple : Pour un achat de 150€, apport de 52,18€ puis 2 mensualités de 50€. Crédit d'une durée de 2 mois au TAEG fixe de 19,31%. Coût du financement : 2,18€ (maximum 15€).</p>
                    </div>

                    <div class="bg-light p-3 rounded">
                        <p class="mb-2"><strong>Paiement en 4 fois :</strong></p>
                        <p class="mb-0">Exemple : Pour un achat de 400€, apport de 108,80€ puis 3 mensualités de 100€. Crédit sur 3 mois au TAEG fixe de 19,61%. Coût du financement : 8,80€ (maximum 30€).</p>
                    </div>

                    <p class="mt-3 small">Oney Bank – SA au capital de 51 286 585€ – Siège social : 34 avenue de Flandre 59170 CROIX – RCS Lille Métropole 546 380 197 – n° Orias : 07 023 261</p>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header bg-warning text-white">
                    <h4 class="mb-0">8. Litiges</h4>
                </div>
                <div class="card-body">
                    <p>Le présent contrat est soumis au <strong>droit français</strong>.</p>
                    <p>En cas de difficultés dans l'application du présent contrat, l'acheteur a la possibilité, avant toute action en justice, de rechercher une solution amiable notamment avec l'aide d'une association professionnelle, d'une association de consommateurs ou de tout autre conseil de son choix.</p>
                    <p>Les réclamations ou contestations seront toujours reçues avec bienveillance. En cas de litige, le client s'adressera par priorité à l'entreprise pour obtenir une solution amiable.</p>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header bg-warning text-white">
                    <h4 class="mb-0">9. Garantie</h4>
                </div>
                <div class="card-body">
                    <p>Le vendeur reste tenu de la garantie légale prévue par les articles L.211-4 et suivants du code de la consommation et par la garantie des vices rédhibitoires prévues aux articles 1641 à 1648 du code civil.</p>
                    
                    <h5 class="mt-3">Articles du Code de la Consommation :</h5>
                    <div class="alert alert-secondary">
                        <p><strong>Art. L.211-4 :</strong> Le vendeur est tenu de livrer un bien conforme au contrat et répond des défauts de conformité existant lors de la délivrance.</p>
                        <p><strong>Art. L.211-12 :</strong> L'action résultant du défaut de conformité se prescrit par deux ans à compter de la délivrance du bien.</p>
                    </div>

                    <h5 class="mt-3">Articles du Code Civil :</h5>
                    <div class="alert alert-secondary">
                        <p><strong>Art. 1641 :</strong> Le vendeur est tenu de la garantie à raison des défauts cachés de la chose vendue qui la rendent impropre à l'usage auquel on la destine.</p>
                        <p><strong>Art. 1648 :</strong> L'action résultant des vices rédhibitoires doit être intentée par l'acquéreur dans un délai de deux ans à compter de la découverte du vice.</p>
                    </div>

                    <p class="mt-3"><strong>Service clients :</strong> 5 jours sur 7 (lundi au vendredi) au +33 (0)4 50 07 05 88 ou par mail à info@chaleurbois.com</p>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header bg-warning text-white">
                    <h4 class="mb-0">10. Informations légales et protection des données</h4>
                </div>
                <div class="card-body">
                    <p>Le renseignement des informations nominatives collectées aux fins de la vente à distance est obligatoire, ces informations étant indispensables pour le traitement et l'acheminement des commandes, l'établissement des factures et contrats de garantie.</p>
                    <p>Conformément à la loi « Informatique et Libertés », le traitement des informations nominatives relatives aux clients a fait l'objet d'une déclaration auprès de la Commission Nationale de l'Informatique et des Libertés (CNIL).</p>
                    <p><strong>Vos droits :</strong> Vous disposez (article 34 de la loi du 6 janvier 1978) d'un droit d'accès, de modification, de rectification et de suppression des données qui vous concernent.</p>
                    <p class="alert alert-info">La SARL La Compagnie Des Outils s'engage à ne pas communiquer, gratuitement ou avec contrepartie, les coordonnées de ses clients à un tiers.</p>
                </div>
            </div>

            <div class="card mb-4 border-warning">
                <div class="card-header bg-warning">
                    <h4 class="mb-0">Formulaire de rétractation</h4>
                </div>
                <div class="card-body">
                    <p><strong>Veuillez compléter et renvoyer le présent formulaire uniquement si vous souhaitez vous rétracter du contrat.</strong></p>
                    <p>À l'attention de la SARL La Compagnie Des Outils, 11 rue de l'Arve, F-74970 Marignier</p>
                    <div class="bg-light p-4 rounded">
                        <p>Je/nous (*) vous notifie/notifions (*) par la présente ma/notre (*) rétractation du contrat portant sur la vente du bien (*) / pour la prestation de services (*) ci-dessous :</p>
                        <p>Commandé le (*)/reçu le (*) : _______________________</p>
                        <p>Nom du (des) consommateur(s) : _______________________</p>
                        <p>Signature du (des) consommateur(s) (uniquement en cas de notification du présent formulaire sur papier) :</p>
                        <p>Date : _______________________</p>
                        <p class="small mt-3">(*) Rayez la mention inutile.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
