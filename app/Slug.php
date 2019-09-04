<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slug extends Model
{

    /**
     * @param $title
     * @param int $id
     * @return string
     * @throws \Exception
     */
    public function createSlug($title, $id = 0)
    {

        // $slug = preg_replace("/-$/", "", preg_replace('/[^a-z0-9]+/i', "-", strtolower($title)));

        // $query = "SELECT COUNT(*) AS NumHits FROM $table_name WHERE  $field_name  LIKE '$slug%'";
        // $result = mysqli_query($db_connect, $query) or die(mysqli_error($db_connect));
        // $row = $result->fetch_assoc();
        // $numHits = $row['NumHits'];

        // return ($numHits > 0) ? ($slug . '-' . $numHits) : $slug;
        // Normalize the title 
        $slug = preg_replace('/\s+/', '-', $title);
        // Get any that could possibly be related.
        // This cuts the queries down by doing it once.
        $allSlugs = $this->getRelatedSlugs($slug, $id);
        // If we haven't used it before then we are all good.
        // dd($allSlugs);
        if (!$allSlugs->contains('slug', $slug)) {
            return $slug;
        }
        // Just append numbers like a savage until we find not used.
        for ($i = 1; $i <= 10; $i++) {
            $newSlug = $slug . '-' . $i;
            if (!$allSlugs->contains('slug', $newSlug)) {
                return $newSlug;
            }
        }
        throw new \Exception('Can not create a unique slug');
    }
    protected function getRelatedSlugs($slug, $id = 0)
    {
        return Product::select('slug')->where('slug', 'like', $slug . '%')
            ->where('id', '<>', $id)
            ->get();
    }
}
