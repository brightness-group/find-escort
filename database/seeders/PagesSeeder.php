<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Page;
class PagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pages = array(
            [
                'title' => 'About Us',
                'slug' => 'about-us',
                'active' => 1,
                'content' => '<div class="about-containt"><b class="heading-text mb-3">Escort Girls at the center of attention!</b>
                                <p>Prostitution is a noble art. One of the oldest job on the planet. But it comes with its load of risks and critics... Our overall objective will be to defend this profession, protect the Escort Girls and instils confidence and trust in the website users and the Escort Girls.</p>

                                <p>The whole idea behind our website is to help you find her... &quot;Find Her&quot;... <b>&quot;FindHer&quot; was born!</b></p>

                                <p>One would prefer eyes, legs, hips, feet, breasts or buts. We prefer smiles and lips. Our <b>logo</b> will be <b>beautiful, pulpy and sexy burgundy lips!</b></p>
                                </div>

                                <div class="about-containt"><b class="heading-text">A &#39;creme-de-la-creme&#39; directory, based on the most classy, elegant interface in the market. An interface with a women touch! Yes, the whole website design is made by women</b>

                                <p>On one hand, Escort Girls deserve nothing but the best! A beautiful, classy, elegant and totally secured interface. They also should be able to monitor their business (visits, traffic, revenue, likes, reviews, etc.) from their personal interface.</p>

                                <p>On the other hand, the time of respectful, polite and classy gentlemen is precious. Their experience on the platform must be effective, user-friendly and flawless.</p>

                                <p>They must be able to access certified Escort Girls. They are men of taste, we must ensure that they find someone who fits their requirements. Let&#39;s have as much filters as possible and help them filter their searches down. We will also automate their search, based on their criteria and tastes; so when they come back on, FindHer automatically proposes Escort Girls profiles they like.</p>
                                </div>

                                <div class="about-containt"><b class="heading-text">Online is great, in person is even better!</b>

                                <p>One can be shy, afraid of other people looks. Or simply not sure she is an Escort or not! We will remove these blockers with our feature &quot;Real Girlfriend Experience&quot;</p>
                                </div>

                                <div class="about-containt"><b class="heading-text">We are all on the same boat!</b>

                                <p>Let&#39;s enable collective continuous improvement by allowing Users and Escort Girls to make suggestions, using our Idea Box (lien vers Idea Box). We will implement new ideas on a regular basis.</p>
                                </div>

                                <div class="about-containt"><b class="heading-text">Wishing you some qualitative time, enjoy!</b></div>',
            ],
            [
                'title' => 'FAQ',
                'slug' => 'faq',
                'active' => 1,
                'content' => '<div class="faq-containt">
                                <h2 class="title-text">FindHer ?</h2>

                                <p>FindHer has been created in 2021.</p>

                                <p>The whole idea behind our website is to help you find her... &quot;Find Her&quot;... &quot;FindHer&quot; was born!</p>

                                <p>One would prefer eyes, legs, hips, feet, breasts or buts. We prefer smiles and lips. Our logo will be beautiful, pulpy and sexy burgundy lips!</p>

                                <p>Our platform is a new experience in terms of services and design for new and regular users (escort and clients), we are improving our users experiences every day</p>

                                <p>We have also introduced a new service: the &ldquo;Real Girl Friend Experience&rdquo;. A client can propose on his/her profile one date in a public place, restaurant, bar or nightclub to spend time with one escort or many escorts, the escorts who are interested by the Real Girl Friend Experience can contact the clients directly, discuss the terms and conditions and enjoy the party.</p>
                                </div>

                                <div class="faq-containt">
                                <h2 class="title-text">Why register on FindHer ?</h2>

                                <p class="sub-title-text">As Escort:</p>

                                <ul class="list-style">
                                    <li>you have access to clients ready to spend money; our high class interface attracts spender.</li>
                                    <li>you will be able to manage your profile autonomously and you will be able to suspend your profile to save time when you don&rsquo;t work.</li>
                                    <li>you can ask the certification of your profile by our team and quickly grow your revenue.</li>
                                    <li>you will have access to new services as the Real Girl Friend Experience, why not enjoying a party with clients in a nice restaurant, bar or night club and then to decide how to end the party?</li>
                                    <li>you can monitor your stats and follow the number of clients interested by your ad and your ranking</li>
                                </ul>

                                <p class="sub-title-text">As Client:</p>

                                <ul class="list-style">
                                    <li>you can create your list of favourites services and girls, to be alerted when a new one is coming in town</li>
                                    <li>you can enjoy the Real Girl Friend Experience by proposing Escort Girls to join you in a party, for dinner or for a pleasant coffee.</li>
                                    <li>you can leave comments on their profiles, they will enjoy it and they will certainly welcome you next time</li>
                                </ul>
                                </div>

                                <div class="faq-containt">
                                <h2 class="title-text">How my escort ad is working?</h2>

                                <p>To register and publish your profile on Findher, you must be 18 years old or more and you must have a Swiss mobile phone number.</p>

                                <p>During you registration, you will fill your description, select all your proposed services (we have a very exhaustive list) and upload your photos, selfies and video.</p>

                                <p>To publish your ad you can select 1 of our 3 plans:</p>

                                <ul class="list-style">
                                    <li>Small Lips : your ad online for 1 week</li>
                                    <li>Big Lips : your ad online for 4 weeks, with the possibility to pause it when you&rsquo;re not working</li>
                                    <li>Juicy Lips : your ad online for 12 weeks, with the possibility to pause it when you&rsquo;re not working</li>
                                </ul>

                                <p>Then you can boost your ad to get more views:</p>

                                <ul class="list-style">
                                    <li>Lip Gloss: your ad brought on the top of the list every 30 minutes, for 1 week</li>
                                    <li>Lip Stick: your ad brought on the top of the list every 30 minutes, for 4 weeks</li>
                                    <li>Botox Injection: your brought on the top of the list every 30 minutes, for 12 weeks</li>
                                </ul>

                                <p>You can also display your Ad on the website banner; at regional or national level:</p>

                                <ul class="list-style">
                                    <li>Regional Smile for 1 week, 4 weeks or 12 weeks</li>
                                    <li>National Smile for 1 week, 4 weeks or 12 weeks</li>
                                </ul>

                                <p>When you are traveling you can pause your Big Lips or Juicy Lips plans and your days counter will not be debited. If you know your return date, you can let your clients know so they can get ready for your return.</p>

                                <p>You have access to a dashboard to monitor the performance of your Ad.</p>
                                </div>

                                <div class="faq-containt">
                                <h2 class="title-text">How do I pay my ad ?</h2>

                                <ul class="list-style">
                                    <li>Secure online payment par credit/debit card</li>
                                    <li>Payment at the post office in Switzerland</li>
                                    <li>Cash payment to one of our sales representatives</li>
                                </ul>
                                </div>

                                <div class="faq-containt">
                                <h2 class="title-text">Why and How to certify my profile ?</h2>

                                <ul class="list-style">
                                    <li>Certified Escorts are generating 10 times more revenue</li>
                                    <li>Certification directly on line by sending your ID (file will be deleted of our database after validation and will not be published anywhere on the web), or physically with one of our sales representatives.</li>
                                </ul>
                                </div>

                                <div class="faq-containt">
                                <h2 class="title-text">What about the security of my information ?</h2>

                                <ul class="list-style">
                                    <li>We are following the rules of the General Data Protection Regulation.</li>
                                    <li>You can choose to block your profile from IP based in certain countries, for exemple you can choose that someone connecting with one IP in Russia will not be able to see your profile.</li>
                                    <li>You can ask us to delete permanently your profile from our database.</li>
                                    <li>You have basically the right to create, modify, suspend or delete at any point of time your profile</li>
                                </ul>
                                </div>

                                <div class="faq-containt">
                                <h2 class="title-text">Is FindHer legal ?</h2>

                                <p>Yes, the service in Switzerland is authorised since 1992.</p>
                                </div>

                                <div class="faq-containt">
                                <h2 class="title-text">Need Help ?</h2>

                                <ul class="list-style">
                                    <li>About your ad, you can go on contact us page.</li>
                                    <li>For any health questions or legal nature, we suggest you refer to specialists, we recommend the association Aspasie based in Geneva. You can also directly contact Cantonale Police to register yourself as &ldquo;Travailleur/Travailleuse Du Sexe (TDS)&rdquo;.</li>
                                </ul>
                                </div>',
            ],
            [
                'title' => 'CGU',
                'slug' => 'cgu',
                'active' => 1,
                'content' => '<div class="about-containt">
                                <p class="mb-2">Derni&egrave;re modification de ce document : Octobre 2020</p>
                                <b class="heading-text">Conditions G&eacute;n&eacute;rales d&#39;Utilisation (CGU)</b>

                                <p>Le site findher.ch fournit des services en ligne r&eacute;serv&eacute;s aux personnes majeures uniquement. Toute personne se connectant &agrave; finfher.ch est consid&eacute;r&eacute;e comme utilisateur, quelque soit son usage. L&rsquo;utilisation du site findher.ch implique la lecture int&eacute;grale et l&rsquo;acception sans r&eacute;serve des pr&eacute;sentes CGU. Le non-respect des CGU relev&eacute; par findher.ch peut entrainer la suspension des comptes d&rsquo;utilisateurs concern&eacute;s sans pr&eacute;avis, remboursement ni indemnit&eacute;, tous droits &eacute;tant r&eacute;serv&eacute;s pour le surplus.</p>

                                <p>findher.ch se r&eacute;serve le droit de modifier &agrave; tout moment et sans pr&eacute;avis les pr&eacute;sentes CGU.</p>
                                </div>

                                <div class="about-containt"><b class="heading-text">Utilisation</b>

                                <p>Tout utilisateur du site doit &ecirc;tre majeur selon la d&eacute;finition applicable dans son pays. Il accepte pleinement que findher.ch peut avoir un contenu sexuel et &eacute;rotique qui peut lui appara&icirc;tre choquant. L&rsquo;utilisation du site rev&ecirc;t un caract&egrave;re purement priv&eacute; et personnel et ne doit pas avoir pour vocation de nuire &agrave; autrui.</p>

                                <p>Tout utilisateur s&rsquo;engage &agrave; ne pas d&eacute;voiler l&rsquo;existence de findher.ch &agrave; des personnes mineures. Tout utilisateur mettant en ligne des contenus doit s&rsquo;assurer que ceux-ci respectent le droit suisse et les droits des tiers. Est strictement interdite la mise en ligne de contenus illicites ou susceptibles de nuire &agrave; la r&eacute;putation d&rsquo;une personne.</p>

                                <p>Le non-respect de ces dispositions entrainera imm&eacute;diatement la suspension des comptes d&rsquo;utilisateurs concern&eacute;s sans pr&eacute;avis, remboursement ni indemnit&eacute;, tous droits &eacute;tant r&eacute;serv&eacute;s pour le surplus.</p>

                                <p>En tout &eacute;tat de cause, tout utilisateur assume l&rsquo;enti&egrave;re responsabilit&eacute;, notamment civile et p&eacute;nale, li&eacute;e aux contenus mis en ligne, &agrave; l&rsquo;enti&egrave;re d&eacute;charge de findher.ch.</p>
                                </div>

                                <div class="about-containt"><b class="heading-text">Exploitant</b>

                                <p>Email : serviceclients@findher.ch</p>

                                <p>T&eacute;l&eacute;phone : +41 7X XXX XX XX</p>

                                <p>Toute r&eacute;f&eacute;rence &agrave; findher.ch dans les pr&eacute;sentes CGU renvoie &agrave; la soci&eacute;t&eacute; qui exploite le site.</p>
                                </div>

                                <div class="about-containt"><b class="heading-text">Propri&eacute;t&eacute; intellectuelle</b>

                                <p>Toute reproduction, adaptation, traduction, diffusion, vente, revente, t&eacute;l&eacute;chargement, exploitation de tout ou partie de ce site sur quelque support que ce soit sont strictement interdits et susceptibles d&rsquo;engager la responsabilit&eacute; civile et/ou p&eacute;nale des responsables.</p>

                                <p>Les utilisateurs du site ne peuvent mettre en ligne que des contenus dont ils d&eacute;tiennent les droits. Les reproductions et/ou l&rsquo;utilisation de contenus portant atteinte &agrave; des droits intellectuels sont strictement interdits et susceptibles d&rsquo;engager la responsabilit&eacute; civile et/ou p&eacute;nale des responsables. Le non-respect de ces dispositions entrainera imm&eacute;diatement la suspension des comptes d&rsquo;utilisateurs concern&eacute;s sans pr&eacute;avis, remboursement ni indemnit&eacute;, tous droits &eacute;tant r&eacute;serv&eacute;s pour le surplus.</p>
                                </div>

                                <div class="about-containt"><b class="heading-text">Responsabilit&eacute;</b>

                                <p>Les annonces diffus&eacute;es sont &eacute;dit&eacute;es et mises en ligne sous l&rsquo;unique responsabilit&eacute; de leur auteur, &agrave; l&rsquo;enti&egrave;re d&eacute;charge de findher.ch La fourniture de services en ligne de findher.ch ne cr&eacute;e d&rsquo;autre lien juridique entre findher.ch et les utilisateurs du site &agrave; l&rsquo;exception des rapports contractuels avec les annonceurs. En particulier, findher.ch ne saurait &ecirc;tre assimil&eacute; &agrave; un interm&eacute;diaire, associ&eacute; de fait, g&eacute;rant de fait, ou employeur des utilisateurs.</p>

                                <p>findher.ch ne saurait &ecirc;tre tenu pour responsable &agrave; quelque titre que ce soit des contenus mis en ligne et des services propos&eacute;s. findher.ch ne contr&ocirc;le pas et d&eacute;cline toute responsabilit&eacute; quant &agrave; l&rsquo;authenticit&eacute;, l&rsquo;exactitude, la suret&eacute;, la v&eacute;racit&eacute;, la qualit&eacute;, la l&eacute;galit&eacute; des contenus mis en ligne et des services propos&eacute;s. La mention &laquo; certified &raquo; sur les photos et les profils atteste uniquement que la personne photographi&eacute;e est bien l&rsquo;auteur de l&rsquo;annonce selon les v&eacute;rifications que findher.ch est parvenue &agrave; faire.</p>

                                <p>findher.ch n&rsquo;intervient pas dans les relations entre les utilisateurs et ne saurait en aucun cas voir sa responsabilit&eacute; engag&eacute;e dans ce cadre. findher.ch exclut toute responsabilit&eacute; pour tout pr&eacute;judice caus&eacute; directement et/ou indirectement de quelque fa&ccedil;on que ce soit du fait du contenu et de l&rsquo;utilisation du site.</p>

                                <p>Le site peut comporter des liens vers des sites de tiers. findher.ch n&rsquo;exerce aucun contr&ocirc;le sur ces sites et d&eacute;cline toute responsabilit&eacute; quant &agrave; l&rsquo;acc&egrave;s, l&rsquo;utilisation, le contenu et services de ces sites.</p>

                                <p>Tout utilisateur du site se porte fort des dommages qui pourraient &ecirc;tre caus&eacute;s &agrave; findher.ch du fait de la violation des pr&eacute;sentes CGU, des cons&eacute;quences et des r&eacute;clamations ou actions dont elle pourrait faire l&rsquo;objet &agrave; raison du contenu des annonces et des services propos&eacute;s.</p>
                                </div>

                                <div class="about-containt"><b class="heading-text">Protection des donn&eacute;es</b>

                                <p>findher.ch utilise des cookies, qui sont des fichiers texte plac&eacute;s sur votre ordinateur, pour permettre une &eacute;valuation de votre utilisation du site ainsi que pour Google Analytics, un service d&rsquo;analyse Internet propos&eacute; par Google Inc., qui analyse les flux li&eacute;s &agrave; l&rsquo;utilisation du site findher.ch. En utilisant ce site internet, vous consentez express&eacute;ment &agrave; l&#39;utilisation de ces cookies.</p>

                                <p>Vous pouvez d&eacute;sactiver leur utilisation en s&eacute;lectionnant les param&egrave;tres appropri&eacute;s de votre navigateur. Cependant, une telle d&eacute;sactivation pourrait emp&ecirc;cher l&#39;utilisation compl&egrave;te de certaines fonctionnalit&eacute;s de ce site. Vous pouvez en outre refuser tout futur traitement de donn&eacute;es vous concernant par Google Analytics en t&eacute;l&eacute;chargeant et installant une fonction additionnelle (https://tools.google.com/dlpage/gaoptout?hl=fr) pour votre navigateur.</p>
                                </div>

                                <div class="about-containt"><b class="heading-text">Exclusion de garantie</b>

                                <p>findher.ch ne fournit &agrave; l&rsquo;utilisateur aucune garantie d&rsquo;aucune sorte, expresse ou implicite. findher.ch ne fournit notamment pas de garantie quant &agrave; la conformit&eacute; du service ou du r&eacute;sultat de recherche aux attentes de l&rsquo;utilisateur findher.ch ne garantit pas non plus que le service sera ininterrompu, opportun, sur ou d&eacute;pourvu de toute erreur ni que tout service et informations obtenus par l&rsquo;utilisateur par l&rsquo;interm&eacute;diaire du service sera conforme &agrave; ses attentes.</p>

                                <p>findher.ch d&eacute;cline toute responsabilit&eacute; quant aux &eacute;ventuelles contestations, actions ou recours de tiers se pr&eacute;valant de droits notamment sur ledit contenu et son utilisation.</p>
                                </div>

                                <div class="about-containt"><b class="heading-text">Modification du service</b>

                                <p>findher.ch se r&eacute;serve le droit de modifier et d&rsquo;interrompre temporairement ou de mani&egrave;re permanente, &agrave; tout moment, tout ou partie du service sans avertissement pr&eacute;alablement. findher.ch d&eacute;cline toute responsabilit&eacute; en la mati&egrave;re.</p>
                                </div>

                                <div class="about-containt"><b class="heading-text">Divers</b>

                                <p>Les pr&eacute;sentes CGU du service constituent la totalit&eacute; de l&#39;accord pass&eacute; entre findher.ch et l&#39;utilisateur du service pour ce qui concerne l&#39;utilisation du service, et se substituent &agrave; tout accord &eacute;ventuellement intervenu ant&eacute;rieurement.</p>

                                <p>Le droit suisse est exclusivement applicable et les tribunaux ordinaires de Gen&egrave;ve sont exclusivement comp&eacute;tents pour tout litige, en prorogation de tout autre droit ou for.</p>
                                </div>',
            ]
        );
        
       foreach ($pages as $page) {
            Page::updateOrCreate(['slug' => $page['slug']], $page);
        } 
    }
}
