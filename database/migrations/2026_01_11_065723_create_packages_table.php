<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Basic, Gold, Platinum
            $table->string('type'); // basic, gold, platinum
            $table->decimal('price', 10, 2);
            $table->string('duration'); // e.g., "15 Days - Economy"
            $table->string('icon')->default('fas fa-kaaba');
            $table->boolean('is_popular')->default(false);
            $table->json('features'); // Array of features
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // Insert default packages
        DB::table('packages')->insert([
            [
                'name' => 'Basic Package',
                'type' => 'basic',
                'price' => 700,
                'duration' => '15 Days - Economy',
                'icon' => 'fas fa-kaaba',
                'is_popular' => false,
                'features' => json_encode([
                            ['text' => 'Visa Processing', 'included' => true],
                            ['text' => '3 Star Hotel', 'included' => true],
                            ['text' => 'Transport (Bus)', 'included' => true],
                            ['text' => 'Guide Support', 'included' => true],
                            ['text' => 'Ziyarat Tours', 'included' => false],
                            ['text' => 'Direct Flights', 'included' => false],
                        ]),
                'order' => 1,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Gold Package',
                'type' => 'gold',
                'price' => 1200,
                'duration' => '20 Days - Premium',
                'icon' => 'fas fa-mosque',
                'is_popular' => true,
                'features' => json_encode([
                            ['text' => 'Fast Visa Processing', 'included' => true],
                            ['text' => '4 Star Hotel (Near Haram)', 'included' => true],
                            ['text' => 'Private Transport', 'included' => true],
                            ['text' => 'Full Guide & Support', 'included' => true],
                            ['text' => 'Ziyarat Tours Included', 'included' => true],
                            ['text' => 'Business Class Flight', 'included' => false],
                        ]),
                'order' => 2,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Platinum Package',
                'type' => 'platinum',
                'price' => 2000,
                'duration' => '25 Days - Luxury',
                'icon' => 'fas fa-crown',
                'is_popular' => false,
                'features' => json_encode([
                            ['text' => 'VIP Visa Processing', 'included' => true],
                            ['text' => '5 Star Hotel (Facing Haram)', 'included' => true],
                            ['text' => 'Luxury Private Car', 'included' => true],
                            ['text' => '24/7 Personal Guide', 'included' => true],
                            ['text' => 'Extensive Ziyarat Tours', 'included' => true],
                            ['text' => 'Business Class Flights', 'included' => true],
                        ]),
                'order' => 3,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
