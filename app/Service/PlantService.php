<?php


namespace App\Service;


use App\Models\Plant;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PlantService
{
    public function store($data)
    {
        try {
            Db::beginTransaction();
            if($data['preview_image']){
                $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            }
            if($data['detail_image']){
                $data['detail_image'] = Storage::disk('public')->put('/images', $data['detail_image']);
            }

            $content = $data['content'];
            $dom = new \DomDocument();
            $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            $imageFile = $dom->getElementsByTagName('img');
            if($imageFile){
                foreach ($imageFile as $item => $image) {

                    $data2 = $image->getAttribute('src');
                    list($type, $data2) = explode(';', $data2);
                    list(, $data2)      = explode(',', $data2);
                    $imgeData = base64_decode($data2);
                    $image_name = "/storage/images/" . time() . $item . '.png';
                    $path = public_path() . $image_name;
                    file_put_contents($path, $imgeData);

                    $image->removeAttribute('src');
                    $image->setAttribute('src', $image_name);
                }
            }

            $content = $dom->saveHTML();
            $data['content'] = $content;

            $plant = Plant::firstOrCreate($data);
            Db::commit();
        } catch (\Exception $exception) {
            Db::rollBack();
            abort(404);
        }
    }

    public function update($data, $plant)
    {
        try {
            Db::beginTransaction();
            if (isset($data['preview_image'])) {
                $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            }
            if (isset($data['detail_image'])) {
                $data['detail_image'] = Storage::disk('public')->put('/images', $data['detail_image']);
            }


            $content = $data['content'];
            $dom = new \DomDocument();
            $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            $imageFile = $dom->getElementsByTagName('img');

            foreach ($imageFile as $item => $image) {

                $data2 = $image->getAttribute('src');
                list($type, $data2) = explode(';', $data2);
                list(, $data2)      = explode(',', $data2);
                $imgeData = base64_decode($data2);
                $image_name = "/storage/images/" . time() . $item . '.png';
                $path = public_path() . $image_name;
                file_put_contents($path, $imgeData);

                $image->removeAttribute('src');
                $image->setAttribute('src', $image_name);
            }

            $content = $dom->saveHTML();
            $data['content'] = $content;

            $plant->update($data);
            Db::commit();
        } catch (\Exception $exception) {
            Db::rollBack();
            abort(500);
        }

        return $plant;
    }
}
