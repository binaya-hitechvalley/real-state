<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Property;
use Illuminate\Support\Str;

class FixPropertySlugs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:fix-property-slugs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fix all existing property slugs to use hyphens instead of spaces';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Fixing property slugs...');
        
        $properties = Property::all();
        $fixedCount = 0;
        
        foreach ($properties as $property) {
            $originalSlug = $property->slug;
            $newSlug = Str::slug($property->title);
            
            if ($originalSlug !== $newSlug) {
                $property->slug = $newSlug;
                $property->save();
                
                $this->line("Fixed: '{$originalSlug}' → '{$newSlug}'");
                $fixedCount++;
            }
        }
        
        $this->info("Completed! Fixed {$fixedCount} property slugs.");
        
        return 0;
    }
}
