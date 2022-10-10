<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductImage>
 */
class ProductImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'image' => $this->fakeImage(storage_path('app/public/uploads/product')),
            'description' => $this->faker->paragraphs(4, true)
        ];
    }

    public function fakeImage(
        $dir = null,
        $width = 640,
        $height = 480,
        $word = null
    ) {
        $dir = null === $dir ? storage_path('app/tmp') : $dir;
        // Validate directory path
        if (!is_dir($dir) || !is_writable($dir)) {
            return false;
        }
        // Generate a random filename. Use the server address so that a file
        // generated at the same time on a different server won't have a collision.
        $name = md5(uniqid(empty($_SERVER['SERVER_ADDR']) ? '' : $_SERVER['SERVER_ADDR'], true));
        $filename = sprintf('%s.%s', $name, 'png');
        $filepath = $dir . DIRECTORY_SEPARATOR . $filename;

        $url =  sprintf(
            '%s/%dx%d/%s',
            'https://fakeimg.pl',
            $width,
            $height,
            null === $word > 0 ? '?text=' . $word : ''
        );

        // save file
        if (function_exists('curl_exec')) {
            // use cURL
            $fp = fopen($filepath, 'w');
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_FILE, $fp);
            $success = curl_exec($ch) && curl_getinfo($ch, CURLINFO_HTTP_CODE) === 200;
            fclose($fp);
            curl_close($ch);

            if (!$success) {
                unlink($filepath);

                // could not contact the distant URL or HTTP error - fail silently.
                return false;
            }
        } else {
            return false;
        }

        return $filename;
    }
}
