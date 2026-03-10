@extends('frontend.layouts.master')

@section('title', 'Book a Site Visit | Sapphire Investment')

@push('styles')
<!-- Flatpickr for Date Selection -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<style>
    .step-indicator { width: 2.5rem; height: 2.5rem; display: flex; align-items: center; justify-content: center; border-radius: 9999px; font-weight: 800; }
    .step-active { background-color: #0ea5e9; color: white; border: 2px solid #0ea5e9; box-shadow: 0 4px 14px 0 rgba(14, 165, 233, 0.39); }
    .step-pending { background-color: #f8fafc; color: #94a3b8; border: 2px solid #e2e8f0; }
    .step-completed { background-color: #10b981; color: white; border: 2px solid #10b981; }
    
    .form-input { width: 100%; border-radius: 0.75rem; border: 1px solid #e2e8f0; padding: 1rem 1.25rem; background-color: #f8fafc; transition: all 0.2s ease; outline: none; font-weight: 500;}
    .form-input:focus { border-color: #3b82f6; background-color: white; box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1); }
    
    .flatpickr-calendar { border-radius: 1rem !important; border: 1px solid #e2e8f0 !important; box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1) !important; padding: 10px !important;}
    .flatpickr-day.selected { background: #3b82f6 !important; border-color: #3b82f6 !important; border-radius: 0.5rem !important;}
</style>
@endpush

@section('content')

<section class="min-h-screen pt-32 pb-24 bg-slate-50 relative overflow-hidden flex items-center justify-center">
    <!-- Decorative blobs -->
    <div class="absolute top-20 left-10 w-64 h-64 bg-primary/5 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-10 right-10 w-80 h-80 bg-accent/5 rounded-full blur-3xl pointer-events-none"></div>

    <div class="container mx-auto px-4 relative z-10 max-w-4xl">
        <div class="text-center mb-10">
            <h1 class="text-4xl md:text-5xl font-black text-slate-900 tracking-tight mb-4">
                Book a <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-accent">Site Visit</span>
            </h1>
            <p class="text-slate-500 font-medium text-lg">Schedule a personalized tour of your preferred properties.</p>
        </div>

        <div class="bg-white rounded-[2.5rem] shadow-xl shadow-blue-900/5 overflow-hidden border border-slate-100 flex flex-col md:flex-row">
            
            <!-- Left Sidebar: Steps -->
            <div class="w-full md:w-1/3 bg-slate-900 p-8 md:p-12 text-white relative overflow-hidden">
                <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-primary/20 via-slate-900 to-slate-900 pointer-events-none"></div>
                <div class="relative z-10">
                    <h3 class="text-xl font-bold mb-8 tracking-wide">Booking Process</h3>
                    
                    <div class="space-y-8 relative before:absolute before:inset-0 before:ml-5 before:-translate-x-px md:before:mx-auto md:before:translate-x-0 mx-auto before:h-full before:w-0.5 before:bg-gradient-to-b before:from-white/20 before:to-transparent before:left-0 md:before:left-5 before:top-4">
                        
                        <!-- Step 1 -->
                        <div class="relative flex items-center justify-start gap-4 z-10">
                            <div class="step-indicator step-active"><i class="fas fa-home"></i></div>
                            <div>
                                <h4 class="font-bold text-white text-sm">Property Details</h4>
                                <p class="text-slate-400 text-xs">Select your interest</p>
                            </div>
                        </div>

                        <!-- Step 2 -->
                        <div class="relative flex items-center justify-start gap-4 z-10 opacity-50">
                            <div class="step-indicator step-pending">2</div>
                            <div>
                                <h4 class="font-bold text-white text-sm">Date & Time</h4>
                                <p class="text-slate-400 text-xs">Choose availability</p>
                            </div>
                        </div>

                        <!-- Step 3 -->
                        <div class="relative flex items-center justify-start gap-4 z-10 opacity-50">
                            <div class="step-indicator step-pending">3</div>
                            <div>
                                <h4 class="font-bold text-white text-sm">Your Information</h4>
                                <p class="text-slate-400 text-xs">Contact details</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Right Content: Forms -->
            <div class="w-full md:w-2/3 p-8 md:p-12">
                <!-- Using a standard HTML form that posts to the success page for demonstration -->
                <form action="/bookings/success" method="GET" class="space-y-8">
                    
                    <!-- Property Selection (Step 1 mapped) -->
                    <div>
                        <h3 class="text-xl font-black text-slate-900 mb-6">Which property are you interested in?</h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Pre-selected option for example -->
                            <label class="relative cursor-pointer group">
                                <input type="radio" name="property" value="bhaisepati_bungalow" class="peer sr-only" checked>
                                <div class="p-4 border-2 border-slate-200 rounded-2xl peer-checked:border-primary peer-checked:bg-blue-50 transition-all group-hover:border-primary/50">
                                    <div class="w-12 h-12 rounded-full bg-white flex items-center justify-center text-primary mb-3 shadow-sm border border-slate-100"><i class="fas fa-home"></i></div>
                                    <h4 class="font-bold text-slate-900 text-sm mb-1">Modern Classic Bungalow</h4>
                                    <p class="text-xs text-slate-500 font-medium">Bhaisepati, Lalitpur</p>
                                </div>
                                <div class="absolute top-4 right-4 w-5 h-5 rounded-full border-2 border-slate-300 peer-checked:border-primary flex items-center justify-center">
                                    <div class="w-2.5 h-2.5 rounded-full bg-primary scale-0 peer-checked:scale-100 transition-transform"></div>
                                </div>
                            </label>

                            <!-- Generic Option -->
                            <label class="relative cursor-pointer group">
                                <input type="radio" name="property" value="general_inquiry" class="peer sr-only">
                                <div class="p-4 border-2 border-slate-200 rounded-2xl peer-checked:border-primary peer-checked:bg-blue-50 transition-all group-hover:border-primary/50 h-full">
                                    <div class="w-12 h-12 rounded-full bg-white flex items-center justify-center text-slate-500 mb-3 shadow-sm border border-slate-100"><i class="fas fa-search"></i></div>
                                    <h4 class="font-bold text-slate-900 text-sm mb-1">General Inquiry</h4>
                                    <p class="text-xs text-slate-500 font-medium">I want to view multiple options</p>
                                </div>
                                <div class="absolute top-4 right-4 w-5 h-5 rounded-full border-2 border-slate-300 peer-checked:border-primary flex items-center justify-center">
                                    <div class="w-2.5 h-2.5 rounded-full bg-primary scale-0 peer-checked:scale-100 transition-transform"></div>
                                </div>
                            </label>
                        </div>
                    </div>

                    <hr class="border-slate-100">

                    <!-- Date & Time (Step 2 mapped) -->
                    <div>
                        <h3 class="text-xl font-black text-slate-900 mb-6">When would you like to visit?</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Preferred Date</label>
                                <div class="relative">
                                    <i class="far fa-calendar-alt absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                                    <input type="text" id="visit_date" name="visit_date" placeholder="Select a Date" class="form-input pl-11" required>
                                </div>
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Preferred Time</label>
                                <div class="relative">
                                    <i class="far fa-clock absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                                    <select name="visit_time" class="form-input pl-11 appearance-none cursor-pointer" required>
                                        <option value="" disabled selected>Select Time Slot</option>
                                        <option value="morning">Morning (10:00 AM - 12:00 PM)</option>
                                        <option value="afternoon">Afternoon (1:00 PM - 3:00 PM)</option>
                                        <option value="evening">Late Afternoon (3:00 PM - 5:00 PM)</option>
                                    </select>
                                    <i class="fas fa-chevron-down absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 text-xs pointer-events-none"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="border-slate-100">

                    <!-- Contact Details (Step 3 mapped) -->
                    <div>
                        <h3 class="text-xl font-black text-slate-900 mb-6">Your Contact Information</h3>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Full Name</label>
                                <input type="text" name="name" placeholder="John Doe" class="form-input" required>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Email Address</label>
                                    <input type="email" name="email" placeholder="john@example.com" class="form-input">
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Phone Number</label>
                                    <input type="tel" name="phone" placeholder="+977 98XXXXXXXX" class="form-input" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Submit -->
                    <div class="pt-4">
                        <button type="submit" class="w-full py-4 bg-gradient-to-r from-primary to-accent text-white font-bold rounded-xl shadow-lg shadow-blue-500/30 hover:shadow-blue-500/50 hover:-translate-y-1 transition-all flex justify-center items-center gap-2 text-lg">
                            Confirm Booking <i class="fas fa-arrow-right text-sm"></i>
                        </button>
                        <p class="text-center text-xs text-slate-400 mt-4 font-medium"><i class="fas fa-lock mr-1"></i> Your information is secure and encrypted.</p>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<!-- Flatpickr JS -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        flatpickr("#visit_date", {
            minDate: "today",
            disable: [
                function(date) {
                    // Disable Saturdays (6) in JS Dates for Nepal context
                    return (date.getDay() === 6);
                }
            ],
            dateFormat: "Y-m-d",
        });
    });
</script>
@endpush
