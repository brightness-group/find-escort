<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Illuminate\Support\Facades\Log;
use App\Models\Blog;
class SiteMapUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sitemap Update';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $sitemap = Sitemap::create()
        ->add(Url::create('/'))
        ->add(Url::create('/contact-us'))
        ->add(Url::create('/idea-box'))
        ->add(Url::create('/discover'))
        ->add(Url::create('/girls-access'))
        ->add(Url::create('/escorts/register/information'))
        ->add(Url::create('/girls'))
        ->add(Url::create('/trans'))
        ->add(Url::create('/real-girlfriend'))
        ->add(Url::create('/blogs'))
        //->add(Url::create('/escorts/register/advertising'))
        //->add(Url::create('/escorts/register/pictures'))
        //->add(Url::create('/escorts/register/subscription'))
        //->add(Url::create('/escorts/register/subscription/addons'))
        //->add(Url::create('/escorts/register/subscription/reviews'))
        ->add(Url::create('/escorts/profile'))
        ->add(Url::create('/customers/profile'))
        ->add(Url::create('/login'));

        Blog::all()->each(function (Blog $blogItem) use ($sitemap) {
            $sitemap->add(Url::create("/blogs/{$blogItem->slug}"));
        });

        User::where('role', 'escort')->planActive()->each(function (User $userItem) use ($sitemap) {
            $sitemap->add(Url::create("/escort/{$userItem->username}"));
        });

        $sitemap->writeToFile(public_path('sitemap.xml'));

        Log::debug('Sitemap Generated.');

        return 0;
    }
}