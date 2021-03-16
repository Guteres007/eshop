<?php

namespace App\Helpers\Slug;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class SlugHelper
{
    public static function createSlug($title, $tableName)
    {

        //TODO: zbytečně se ptám v každém cyklu, mohu to tady jednou vytáhnout a procyklova a najít, při větším poštu
        //otazů se stane, že se to bude 50x dotazovat do databáze
        $slug = Str::slug($title);

        $allSlugs = DB::table($tableName)->select('slug')->where('slug', 'like', '%' . $slug . '%')->get();

        if (!$allSlugs->contains('slug', $slug)) {
            return $slug;
        }

        for ($i = 1; $i <= $i; $i++) {
            $newSlug = $slug . '-' . $i;
            $allSlugs = DB::table($tableName)->select('slug')->where('slug', 'like', '%' . $newSlug . '%')->get();

            if (!$allSlugs->contains('slug', $newSlug)) {
                return $newSlug;
            }
        }
    }
}
