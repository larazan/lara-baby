@extends('frontend.layout')

@section('content')


<main class="flex bg-white min-h-screen pt-0 md:pt-[0px] max-w-[85rem] px-4 md:py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <div class="container mx-auto px-5 my-8">
        <div class="bg-gradient-to-br from-teal-500 to-cyan-600 flex items-center justify-center min-h-screen p-4">

            <!-- Main container for the calculator, powered by Alpine.js -->
            <div x-data="ovulationCalculator()" class="bg-white p-8 md:p-10 rounded-xl shadow-2xl max-w-md w-full text-center border-b-4 border-cyan-700">
                <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-6">Ovulation Calculator</h1>
                <p class="text-gray-600 mb-8 text-sm md:text-base">
                    Estimate your ovulation date and fertile window based on your Last Menstrual Period (LMP) and average cycle length.
                </p>

                <!-- Input fields -->
                <div class="space-y-5 mb-8">
                    <!-- Last Menstrual Period (LMP) Start Date -->
                    <div>
                        <label for="lmpDate" class="block text-left text-gray-700 font-medium mb-1">Last Menstrual Period (LMP) Start Date:</label>
                        <input type="date" id="lmpDate" x-model="lmpDate"
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-150 ease-in-out">
                    </div>

                    <!-- Average Cycle Length -->
                    <div>
                        <label for="cycleLength" class="block text-left text-gray-700 font-medium mb-1">Average Cycle Length (days):</label>
                        <input type="number" id="cycleLength" x-model.number="cycleLength" min="20" max="45"
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-150 ease-in-out"
                            placeholder="e.g., 28">
                    </div>
                </div>

                <!-- Error Message Display -->
                <template x-if="errorMessage">
                    <p x-text="errorMessage" class="text-red-600 bg-red-100 p-3 rounded-lg mb-6 border border-red-300"></p>
                </template>

                <!-- Calculate Button -->
                <button @click="calculateOvulation()"
                    class="w-full bg-cyan-600 hover:bg-cyan-700 text-white font-semibold py-3 px-6 rounded-full shadow-lg transform transition duration-200 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2 mb-6">
                    Calculate Ovulation
                </button>

                <!-- Result Display -->
                <div x-show="ovulationDate || fertileWindowStart" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                    class="bg-teal-50 p-6 rounded-lg border-l-4 border-teal-500 shadow-md text-left">
                    <p class="text-gray-700 text-lg font-medium mb-2">Your Estimated Ovulation Details:</p>
                    <p class="text-teal-800 text-xl font-bold mb-1">
                        Ovulation Date: <span x-text="ovulationDate"></span>
                    </p>
                    <p class="text-teal-800 text-xl font-bold mb-3">
                        Fertile Window: <span x-text="fertileWindowStart"></span> - <span x-text="fertileWindowEnd"></span>
                    </p>
                    <p class="text-gray-500 text-sm mt-3">
                        This is an estimate based on averages. Individual cycles can vary.
                        <strong class="text-red-500">For accurate family planning, consult a healthcare professional.</strong>
                    </p>
                </div>
            </div>


        </div>
    </div>
</main>

@endsection

<script>
    /**
     * Alpine.js data and methods for the Ovulation Calculator.
     * This calculator uses standard averages for cycle phases.
     */
    function ovulationCalculator() {
        return {
            lmpDate: '', // Last Menstrual Period start date (YYYY-MM-DD)
            cycleLength: null, // Average cycle length in days
            ovulationDate: '', // Estimated ovulation date (formatted string)
            fertileWindowStart: '', // Start of fertile window (formatted string)
            fertileWindowEnd: '', // End of fertile window (formatted string)
            errorMessage: '', // Validation error message

            /**
             * Calculates the estimated ovulation date and fertile window.
             */
            calculateOvulation() {
                this.ovulationDate = ''; // Clear previous results
                this.fertileWindowStart = '';
                this.fertileWindowEnd = '';
                this.errorMessage = ''; // Clear previous errors

                // 1. Input Validation
                if (!this.lmpDate) {
                    this.errorMessage = 'Please enter your Last Menstrual Period (LMP) start date.';
                    return;
                }
                if (this.cycleLength === null || this.cycleLength === '' || isNaN(this.cycleLength) || this.cycleLength < 20 || this.cycleLength > 45) {
                    this.errorMessage = 'Please enter a valid average cycle length (20-45 days).';
                    return;
                }

                const lmp = new Date(this.lmpDate);
                if (isNaN(lmp.getTime())) {
                    this.errorMessage = 'Invalid LMP date. Please use a valid date format.';
                    return;
                }

                // 2. Calculation Logic
                // Ovulation typically occurs about 14 days before the next period starts.
                // So, if cycle length is 28 days, ovulation is around day 14 (28 - 14).
                // If cycle length is 30 days, ovulation is around day 16 (30 - 14).
                const ovulationDayFromLMP = this.cycleLength - 14;

                // Calculate ovulation date
                const ovulationDateObj = new Date(lmp);
                ovulationDateObj.setDate(ovulationDateObj.getDate() + ovulationDayFromLMP);

                // Calculate fertile window (typically 5 days before ovulation + ovulation day + 1 day after)
                // Sperm can live up to 5 days, egg lives 12-24 hours.
                const fertileWindowStartObj = new Date(ovulationDateObj);
                fertileWindowStartObj.setDate(fertileWindowStartObj.getDate() - 5); // 5 days before ovulation

                const fertileWindowEndObj = new Date(ovulationDateObj);
                fertileWindowEndObj.setDate(fertileWindowEndObj.getDate() + 1); // 1 day after ovulation

                // 3. Format Results for Display
                const options = {
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                };
                this.ovulationDate = ovulationDateObj.toLocaleDateString('en-US', options);
                this.fertileWindowStart = fertileWindowStartObj.toLocaleDateString('en-US', options);
                this.fertileWindowEnd = fertileWindowEndObj.toLocaleDateString('en-US', options);
            }
        }
    }
</script>