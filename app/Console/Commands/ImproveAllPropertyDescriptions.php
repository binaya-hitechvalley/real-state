<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Property;

class ImproveAllPropertyDescriptions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:improve-all-descriptions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Improve all property descriptions with dynamic real estate content';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Improving all property descriptions...');
        
        $properties = Property::all();
        $updatedCount = 0;
        
        foreach ($properties as $property) {
            $originalDescription = $property->description;
            
            // Check if description needs improvement (too short, poor quality, or placeholder)
            if ($this->needsImprovement($property->description)) {
                $newDescription = $this->generateDynamicDescription($property);
                
                $property->description = $newDescription;
                $property->save();
                
                $this->line("Updated: Property ID {$property->id} - {$property->title}");
                $updatedCount++;
            } else {
                $this->line("Skipped: Property ID {$property->id} - {$property->title} (already good)");
            }
        }
        
        $this->info("Completed! Updated {$updatedCount} property descriptions.");
        
        return 0;
    }
    
    /**
     * Check if description needs improvement
     */
    private function needsImprovement($description)
    {
        if (empty($description)) return true;
        
        $cleanDescription = strip_tags($description);
        
        // Too short
        if (strlen($cleanDescription) < 50) return true;
        
        // Contains placeholder content
        $placeholderPatterns = [
            'AI BAS', 'Transform the way you do business', 'Australian', 'tax-ready',
            'Click to add more images', 'drag and drop', 'ui-sans-serif', 'jkjjk',
            'text-align: center', 'dfgdfgjkj', 'Voluptas officiis do'
        ];
        
        foreach ($placeholderPatterns as $pattern) {
            if (strpos($description, $pattern) !== false) return true;
        }
        
        return false;
    }
    
    /**
     * Generate dynamic real estate description
     */
    private function generateDynamicDescription($property)
    {
        $location = $property->municipality->name ?? 'a prime location';
        $district = $property->municipality && $property->municipality->district ? 
                   ', ' . $property->municipality->district->name : '';
        $businessType = $property->businessType->name ?? 'For Sale';
        $propertyType = $property->propertyType->name ?? 'Property';
        $price = $property->price ? number_format($property->price) : 'competitive price';
        $area = $property->land_area_size ? $property->land_area_size . ' ' . ($property->land_area_unit ?? 'sqft') : 'spacious';
        
        $templates = [
            "Discover this stunning {$propertyType} located in the heart of {$location}{$district}. This exceptional property offers a perfect blend of modern design and functional living spaces. With {$area} of well-designed space, this property features spacious rooms with ample natural light and ventilation. The property is strategically located with easy access to schools, shopping centers, and transportation hubs. {$businessType} at an attractive price of Rs. {$price}. This is an ideal opportunity for families or professionals seeking comfort and convenience in a desirable neighborhood. Contact us today to schedule a viewing and experience this wonderful property firsthand.",
            
            "This beautiful {$propertyType} situated in {$location}{$district} presents an excellent opportunity for discerning buyers. The property boasts contemporary architecture and high-quality construction, offering a perfect combination of style and functionality. The interior spaces are thoughtfully designed to maximize comfort and usability, with modern fixtures and finishes throughout. Natural light floods through strategically placed windows, creating a warm and inviting atmosphere throughout the day. The surrounding area offers excellent amenities including schools, healthcare facilities, and recreational options. {$businessType} at Rs. {$price}. Don't miss this chance to own a property in this sought-after location.",
            
            "Experience luxury living in this exquisite {$propertyType} located in the prestigious area of {$location}{$district}. This property features elegant design elements, premium finishes, and a layout that's both functional and aesthetically pleasing. The {$area} living space provides ample room for your family to grow and thrive, with well-defined areas for relaxation, entertainment, and daily activities. The property has been meticulously maintained and is ready for immediate occupancy. The neighborhood offers a peaceful environment while maintaining close proximity to urban conveniences. {$businessType} at Rs. {$price}. Schedule your private viewing today!",
            
            "Located in the desirable neighborhood of {$location}{$district}, this {$propertyType} offers the perfect combination of location, quality, and value. The property features modern construction with attention to detail in every aspect. The spacious layout provides versatile living spaces that can adapt to your family's changing needs. Large windows and open spaces create an airy, welcoming atmosphere throughout the home. The property is conveniently located near major transportation routes, making commuting easy and efficient. With excellent schools, shopping centers, and healthcare facilities nearby, this location offers everything you need for a comfortable lifestyle. {$businessType} at Rs. {$price}. This exceptional property won't stay on the market for long!",
            
            "This outstanding {$propertyType} in {$location}{$district} represents an excellent investment opportunity in a growing area. The property features a thoughtful design that maximizes both comfort and functionality. The {$area} layout includes well-proportioned rooms that offer flexibility for various living arrangements. Modern amenities and high-quality finishes are evident throughout, creating a sophisticated living environment. The property is situated in a family-friendly neighborhood with parks, schools, and community facilities nearby. Easy access to major highways and public transportation makes this location ideal for commuters. {$businessType} at Rs. {$price}. Contact us now to secure this wonderful property!"
        ];
        
        return $templates[array_rand($templates)];
    }
}
