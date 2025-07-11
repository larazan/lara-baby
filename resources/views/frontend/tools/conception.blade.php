@extends('frontend.layout')

@section('content')

<main class="flex bg-white min-h-screen pt-0 md:pt-[0px] max-w-[85rem] px-4 md:py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <div class="container mx-auto px-5 my-8">
        <div class="bg-gradient-to-br from-teal-500 to-cyan-600 flex items-center justify-center min-h-screen p-4">

            <!-- Main container for the calculator, powered by Alpine.js -->
            <div x-data="conceptionCalculator()" class="bg-white p-8 md:p-10 rounded-xl shadow-2xl max-w-md w-full text-center border-b-4 border-indigo-800">
                <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-6">Conception Date Calculator</h1>
                <p class="text-gray-600 mb-8 text-sm md:text-base">
                    Estimate the date of conception based on your Last Menstrual Period (LMP) or Estimated Due Date (EDD).
                </p>

                <!-- Input method selection -->
                <div class="flex justify-center space-x-4 mb-8">
                    <button @click="inputMethod = 'lmp'; resetFields();"
                        :class="{'bg-indigo-600 text-white shadow-md': inputMethod === 'lmp', 'bg-gray-200 text-gray-700 hover:bg-gray-300': inputMethod !== 'lmp'}"
                        class="py-2 px-5 rounded-full font-semibold transition duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Use LMP
                    </button>
                    <button @click="inputMethod = 'edd'; resetFields();"
                        :class="{'bg-indigo-600 text-white shadow-md': inputMethod === 'edd', 'bg-gray-200 text-gray-700 hover:bg-gray-300': inputMethod !== 'edd'}"
                        class="py-2 px-5 rounded-full font-semibold transition duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Use EDD
                    </button>
                </div>

                <!-- Input fields based on selected method -->
                <div class="space-y-5 mb-8">
                    <template x-if="inputMethod === 'lmp'">
                        <div>
                            <label for="lmpDate" class="block text-left text-gray-700 font-medium mb-1">Last Menstrual Period (LMP) Start Date:</label>
                            <input type="date" id="lmpDate" x-model="lmpDate"
                                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-150 ease-in-out">
                        </div>
                    </template>

                    <template x-if="inputMethod === 'edd'">
                        <div>
                            <label for="eddDate" class="block text-left text-gray-700 font-medium mb-1">Estimated Due Date (EDD):</label>
                            <input type="date" id="eddDate" x-model="eddDate"
                                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-150 ease-in-out">
                        </div>
                    </template>
                </div>

                <!-- Error Message Display -->
                <template x-if="errorMessage">
                    <p x-text="errorMessage" class="text-red-600 bg-red-100 p-3 rounded-lg mb-6 border border-red-300"></p>
                </template>

                <!-- Calculate Button -->
                <button @click="calculateConceptionDate()"
                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 px-6 rounded-full shadow-lg transform transition duration-200 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 mb-6">
                    Calculate Conception Date
                </button>

                <!-- Result Display -->
                <div x-show="conceptionDate" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                    class="bg-purple-50 p-6 rounded-lg border-l-4 border-purple-500 shadow-md">
                    <p class="text-gray-700 text-lg font-medium mb-2">Estimated Conception Date:</p>
                    <p x-text="conceptionDate" class="text-purple-800 text-3xl md:text-4xl font-bold"></p>
                    <p class="text-gray-500 text-sm mt-3">
                        This is an estimate. Actual conception can vary.
                        <strong class="text-red-500">Consult a healthcare professional for precise dating.</strong>
                    </p>
                </div>
            </div>



        </div>
    </div>
</main>

@endsection

<script>
    /**
     * Alpine.js data and methods for the Conception Date Calculator.
     * This calculator uses standard averages (280 days for full term, 14 days from LMP to ovulation).
     */
    function conceptionCalculator() {
        return {
            inputMethod: 'lmp', // 'lmp' or 'edd'
            lmpDate: '', // Last Menstrual Period date (YYYY-MM-DD)
            eddDate: '', // Estimated Due Date (YYYY-MM-DD)
            conceptionDate: '', // Calculated conception date (formatted string)
            errorMessage: '', // Validation error message

            /**
             * Resets input fields and results when switching input methods.
             */
            resetFields() {
                this.lmpDate = '';
                this.eddDate = '';
                this.conceptionDate = '';
                this.errorMessage = '';
            },

            /**
             * Calculates the estimated conception date based on the selected input method.
             */
            calculateConceptionDate() {
                this.conceptionDate = ''; // Clear previous result
                this.errorMessage = ''; // Clear previous error

                let dateInput;
                let calculatedDate;

                if (this.inputMethod === 'lmp') {
                    dateInput = this.lmpDate;
                    if (!dateInput) {
                        this.errorMessage = 'Please enter your Last Menstrual Period (LMP) start date.';
                        return;
                    }
                    const lmp = new Date(dateInput);
                    if (isNaN(lmp.getTime())) {
                        this.errorMessage = 'Invalid LMP date. Please use a valid date format.';
                        return;
                    }

                    // Conception is typically about 14 days after LMP for a 28-day cycle.
                    // We subtract 266 days (280 - 14) from the EDD, or add 14 days to LMP.
                    // For simplicity and consistency with EDD calculation, let's derive from EDD logic:
                    // EDD = LMP + 280 days
                    // Conception = EDD - 266 days (or LMP + 14 days)
                    // Let's use LMP + 14 days directly for LMP method.
                    calculatedDate = new Date(lmp);
                    calculatedDate.setDate(calculatedDate.getDate() + 14); // Add 14 days to LMP
                } else { // inputMethod === 'edd'
                    dateInput = this.eddDate;
                    if (!dateInput) {
                        this.errorMessage = 'Please enter your Estimated Due Date (EDD).';
                        return;
                    }
                    const edd = new Date(dateInput);
                    if (isNaN(edd.getTime())) {
                        this.errorMessage = 'Invalid EDD. Please use a valid date format.';
                        return;
                    }

                    // Full term pregnancy is typically 280 days (40 weeks) from LMP.
                    // Conception is approximately 266 days (38 weeks) before the EDD.
                    calculatedDate = new Date(edd);
                    calculatedDate.setDate(calculatedDate.getDate() - 266); // Subtract 266 days from EDD
                }

                // Format the calculated date for display
                this.conceptionDate = calculatedDate.toLocaleDateString('en-US', {
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                });
            }
        }
    }
</script>