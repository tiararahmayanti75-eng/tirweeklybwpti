<?php

namespace Database\Factories;

use App\Models\Berita;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Berita>
 */
class BeritaFactory extends Factory
{
    protected $model = Berita::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $fakerID = \Faker\Factory::create('id_ID');
        $fakerEN = \Faker\Factory::create('en_US');

        $title = $fakerID->sentence(mt_rand(5, 12));

        return [
            'judul' => $title,
            'slug' => Str::slug($title),
            'penulis' => $fakerID->name(),
            // Menggunakan paragraphs (pakai 's') agar menjadi array paragraf yang bisa digabung
            'konten' => collect($fakerEN->paragraphs(mt_rand(3, 6)))->join("\n\n"),
        ];
    }
}