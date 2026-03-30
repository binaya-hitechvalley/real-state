<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Property;

class FixPropertyDescriptions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:fix-property-descriptions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fix property descriptions that contain placeholder content';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Fixing property descriptions...');
        
        // Find properties with placeholder content
        $properties = Property::where(function($query) {
            $query->where('description', 'like', '%AI BAS%')
                  ->orWhere('description', 'like', '%Transform the way you do business%')
                  ->orWhere('description', 'like', '%Australian sole operators%')
                  ->orWhere('description', 'like', '%tax-ready%')
                  ->orWhere('description', 'like', '%Click to add more images%')
                  ->orWhere('description', 'like', '%drag and drop%')
                  ->orWhere('description', 'like', '%font-family: ui-sans-serif%')
                  ->orWhere('description', 'like', '%jkjjk%')
                  ->orWhere('description', 'like', '%text-align: center%');
        })->get();
        
        $fixedCount = 0;
        
        foreach ($properties as $property) {
            $originalDescription = $property->description;
            
            // Generate a proper real estate description
            $newDescription = $this->generateRealEstateDescription($property);
            
            $property->description = $newDescription;
            $property->save();
            
            $this->line("Fixed: Property ID {$property->id} - {$property->title}");
            $fixedCount++;
        }
        
        $this->info("Completed! Fixed {$fixedCount} property descriptions.");
        
        return 0;
    }
    
    /**
     * Generate a proper real estate description based on property details
     */
    private function generateRealEstateDescription($property)
    {
        $location = $property->municipality->name ?? 'a prime location';
        $businessType = $property->businessType->name ?? 'For Sale';
        $price = $property->price ? number_format($property->price) : 'competitive price';
        
        $descriptions = [
            "This beautiful property is located in {$location} with excellent accessibility and modern amenities. The property offers spacious living areas with natural lighting and ventilation. Perfect for families looking for a comfortable and convenient lifestyle. {$businessType} at Rs. {$price}. Contact us for more details or to schedule a visit.",
            
            "Discover this exceptional property situated in the heart of {$location}. This property features modern architecture and high-quality construction, offering a perfect blend of comfort and luxury. The spacious layout provides ample room for your family to grow and thrive. {$businessType} at an attractive price of Rs. {$price}. Don't miss this opportunity!",
            
            "Located in the desirable area of {$location}, this property presents an excellent opportunity for discerning buyers. The property boasts well-designed interiors, modern fixtures, and a layout that maximizes space utilization. Natural light floods through the windows, creating a warm and inviting atmosphere. {$businessType} at Rs. {$price}. Schedule your viewing today!",
            
            "This stunning property in {$location} offers the perfect combination of location, quality, and value. The property has been meticulously maintained and features thoughtfully designed spaces that cater to modern living. Whether you're looking for a family home or an investment property, this is an excellent choice. {$businessType} at Rs. {$price}. Contact us now!",
            
            "Experience luxury living in this beautiful property located in {$location}. This property features elegant design elements, premium finishes, and a layout that's both functional and aesthetically pleasing. The surrounding neighborhood offers excellent schools, shopping, and transportation options. {$businessType} at Rs. {$price}. This property won't last long!"
        ];
        
        return $descriptions[array_rand($descriptions)];
    }
}
