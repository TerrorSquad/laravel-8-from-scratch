<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{
    /**
     * @param $title
     * @param $body
     * @param $date
     * @param $excerpt
     * @param $slug
     */
    public function __construct(public $title, public $body, public $date, public $excerpt, public $slug) {}

    public static function find($slug)
    {
        // of all the blog posts find the one with the slug that matches the one that was requested
        $posts = static::all();

        return $posts->firstWhere('slug', $slug);
    }

    public static function all()
    {
        return collect(File::files(resource_path("posts")))
            ->map(fn($file) => YamlFrontMatter::parseFile((string) $file))
            ->map(fn($document) => new Post(
                $document->title,
                $document->body(),
                $document->date,
                $document->excerpt,
                $document->slug
            ));
    }

}
