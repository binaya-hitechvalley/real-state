<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Blog;
use App\Models\Testimonial;
use App\Models\Faq;
use App\Models\SiteStat;

class HomeContentSeeder extends Seeder
{
    public function run(): void
    {
        // --- Blogs ---
        $blogs = [
            [
                'title' => 'Why Kathmandu Valley is a Secure Investment',
                'slug' => 'why-kathmandu-valley-secure-investment',
                'excerpt' => 'Exploring the factors driving property values in the capital and long-term hold strategies.',
                'content' => 'The Kathmandu Valley has consistently shown appreciation in property values over the past decade. Multiple infrastructure projects, expanding road networks, and growing urbanization make it one of the safest real estate investments in Nepal.',
                'category' => 'Invest',
                'image_url' => 'https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
                'published_at' => '2026-03-15',
                'sort_order' => 1,
            ],
            [
                'title' => 'Aana Vs. Square Feet: A Complete Guide',
                'slug' => 'aana-vs-square-feet-guide',
                'excerpt' => 'A comprehensive guide for non-resident Nepalis explaining local measurement units.',
                'content' => 'Understanding Nepali land measurement units is crucial for any investor. 1 Ropani = 5,476 sq ft, 1 Aana = 342.25 sq ft, 1 Paisa = 85.56 sq ft, 1 Dam = 21.39 sq ft. This guide breaks down all conversions you need.',
                'category' => 'Legal',
                'image_url' => 'https://images.unsplash.com/photo-1554469384-e58fac16e23a?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
                'published_at' => '2026-03-02',
                'sort_order' => 2,
            ],
            [
                'title' => '5 Essential Suburb Plotted Land Checks',
                'slug' => '5-suburb-plotted-land-checks',
                'excerpt' => 'Learn how to verify road access, drainage, and utilities before signing the deed.',
                'content' => 'Before purchasing plotted land in the suburbs, ensure you check: 1) Road access width, 2) Drainage systems, 3) Electricity and water supply, 4) Soil quality for construction, 5) Future development plans in the area.',
                'category' => 'Tips',
                'image_url' => 'https://images.unsplash.com/photo-1516156008625-3a9d045f6211?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
                'published_at' => '2026-02-28',
                'sort_order' => 3,
            ],
            [
                'title' => 'Rise of Co-Working Spaces in Nepal',
                'slug' => 'rise-of-co-working-spaces',
                'excerpt' => 'How the post-pandemic landscape is shaping commercial real estate demands in Nepal.',
                'content' => 'The demand for co-working spaces has surged in Nepal, particularly in Kathmandu. This shift is creating new opportunities for commercial real estate investors looking to capitalize on the flexible workspace trend.',
                'category' => 'Commercial',
                'image_url' => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
                'published_at' => '2026-02-12',
                'sort_order' => 4,
            ],
            [
                'title' => 'Modernizing Neo-Classic Homes',
                'slug' => 'modernizing-neo-classic-homes',
                'excerpt' => 'Tips on renovating older Kathmandu homes while preserving their classic architectural charm.',
                'content' => 'Blending modern amenities with traditional Newari architecture is both an art and a science. Learn how homeowners are retrofitting classic Kathmandu homes with contemporary interiors while maintaining their heritage facades.',
                'category' => 'Design',
                'image_url' => 'https://images.unsplash.com/photo-1570129477492-45c003edd2be?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
                'published_at' => '2026-01-05',
                'sort_order' => 5,
            ],
        ];

        foreach ($blogs as $blog) {
            Blog::updateOrCreate(['slug' => $blog['slug']], $blog);
        }

        // --- Testimonials ---
        $testimonials = [
            [
                'client_name' => 'Rajesh Shrestha',
                'client_designation' => 'Corporate Director',
                'client_photo_url' => 'https://randomuser.me/api/portraits/men/32.jpg',
                'content' => 'The level of professionalism is unmatched. They found us commercial land in Kathmandu perfectly suited for our warehouse expansion. The transparency in dealing was refreshing.',
                'rating' => 5.0,
                'sort_order' => 1,
            ],
            [
                'client_name' => 'Sita Sharma',
                'client_designation' => 'NRN Investor',
                'client_photo_url' => 'https://randomuser.me/api/portraits/women/44.jpg',
                'content' => 'As an NRN, I was worried about investing in property back home. They made the process transparent and easy, with regular updates and all documents verified properly.',
                'rating' => 5.0,
                'sort_order' => 2,
            ],
            [
                'client_name' => 'Prakash K.C.',
                'client_designation' => 'Home Owner',
                'client_photo_url' => 'https://randomuser.me/api/portraits/men/86.jpg',
                'content' => 'The team understood exactly what I was looking for and showed me multiple options within my budget. I found my dream home within 2 weeks of working with them!',
                'rating' => 4.5,
                'sort_order' => 3,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::updateOrCreate(
                ['client_name' => $testimonial['client_name']],
                $testimonial
            );
        }

        // --- FAQs ---
        $faqs = [
            [
                'question' => 'How do I verify the legal documents of a property?',
                'answer' => 'Our team conducts a thorough 5-point verification check for every property we list. This includes checking the Lalpurja (Land Ownership Certificate), Blueprint, trace map, tax clearance, and citizenship of the owner. We also facilitate meetings with legal experts to give you complete peace of mind.',
                'sort_order' => 1,
            ],
            [
                'question' => 'What are your commission rates?',
                'answer' => "For our owned projects, there is absolutely zero commission or middleman fee. You buy direct from the developer. For brokered listings, our standard agency fee is transparently communicated upfront before any transaction begins, strictly abiding by Nepal's real estate associations' guidelines.",
                'sort_order' => 2,
            ],
            [
                'question' => 'Can Non-Resident Nepalese (NRNs) buy property here?',
                'answer' => 'Yes, NRNs can easily invest in real estate in Nepal. The new NRN act allows NRN cardholders to purchase limited residential land or apartments. Our legal team will guide you step-by-step through the updated banking, repatriation, and registration processes specialized for expatriates.',
                'sort_order' => 3,
            ],
            [
                'question' => 'Do you help with home loans and financing?',
                'answer' => "Absolutely! We have partnered with Nepal's leading Class-A commercial banks. Once you finalize a property, we assist in fast-tracking your home loan appraisal and approval process, often securing preferred interest rates for our clients due to our strong banking relationships.",
                'sort_order' => 4,
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::updateOrCreate(['question' => $faq['question']], $faq);
        }

        // --- Site Stats ---
        $stats = [
            ['label' => 'Houses For Sale', 'value' => '5,635', 'icon' => 'fas fa-home', 'sort_order' => 1],
            ['label' => 'Open Houses', 'value' => '324', 'icon' => 'fas fa-door-open', 'sort_order' => 2],
            ['label' => 'Houses Recently Sold', 'value' => '105', 'icon' => 'fas fa-check-circle', 'sort_order' => 3],
            ['label' => 'Price Reduced', 'value' => '301', 'icon' => 'fas fa-tag', 'sort_order' => 4],
        ];

        foreach ($stats as $stat) {
            SiteStat::updateOrCreate(['label' => $stat['label']], $stat);
        }
    }
}
