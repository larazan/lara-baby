@extends('frontend.layout')

@section('content')

<main class="flex bg-white min-h-screen pt-0 md:pt-[0px] max-w-[85rem] px-4 md:py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <div class="container mx-auto px-5 my-8">
        <div class="bg-gradient-to-br from-teal-500 to-cyan-600 flex items-center justify-center min-h-screen p-4">


            <!-- Main container for the calculator, powered by Alpine.js -->
            <div x-data="pregnancyWeightGainCalculator()" class="bg-white p-8 md:p-10 rounded-xl shadow-2xl max-w-md w-full text-center border-b-4 border-emerald-700">
                <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-6">Pregnancy Weight Gain Calculator</h1>
                <p class="text-gray-600 mb-8 text-sm md:text-base">
                    Estimate your recommended weight gain range during pregnancy based on pre-pregnancy BMI.
                    <strong class="text-red-500">This is an estimate and not medical advice.</strong>
                </p>

                <!-- Input fields -->
                <div class="space-y-5 mb-8">
                    <!-- Pre-pregnancy Weight (kg) -->
                    <div>
                        <label for="prePregnancyWeight" class="block text-left text-gray-700 font-medium mb-1">Pre-pregnancy Weight (kg):</label>
                        <input type="number" id="prePregnancyWeight" x-model.number="prePregnancyWeight" step="0.1" min="20"
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-transparent transition duration-150 ease-in-out"
                            placeholder="e.g., 60">
                    </div>

                    <!-- Height (cm) -->
                    <div>
                        <label for="heightCm" class="block text-left text-gray-700 font-medium mb-1">Height (cm):</label>
                        <input type="number" id="heightCm" x-model.number="heightCm" step="0.1" min="100"
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-transparent transition duration-150 ease-in-out"
                            placeholder="e.g., 165">
                    </div>

                    <!-- Current Week of Pregnancy -->
                    <div>
                        <label for="currentWeek" class="block text-left text-gray-700 font-medium mb-1">Current Week of Pregnancy (1-40):</label>
                        <input type="number" id="currentWeek" x-model.number="currentWeek" min="1" max="40"
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-transparent transition duration-150 ease-in-out"
                            placeholder="e.g., 20">
                    </div>

                    <!-- Pregnancy Type (Single/Twins) -->
                    <div>
                        <label for="pregnancyType" class="block text-left text-gray-700 font-medium mb-1">Pregnancy Type:</label>
                        <select id="pregnancyType" x-model="pregnancyType"
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-transparent transition duration-150 ease-in-out">
                            <option value="single">Single Pregnancy</option>
                            <option value="twins">Twin Pregnancy</option>
                        </select>
                    </div>
                </div>

                <!-- Error Message Display -->
                <template x-if="errorMessage">
                    <p x-text="errorMessage" class="text-red-600 bg-red-100 p-3 rounded-lg mb-6 border border-red-300"></p>
                </template>

                <!-- Calculate Button -->
                <button @click="calculateWeightGain()"
                    class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-semibold py-3 px-6 rounded-full shadow-lg transform transition duration-200 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 mb-6">
                    Calculate Recommended Gain
                </button>

                <!-- Result Display -->
                <div x-show="recommendedGainMin !== null" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                    class="bg-teal-50 p-6 rounded-lg border-l-4 border-teal-500 shadow-md text-left">
                    <p class="text-gray-700 text-lg font-medium mb-2">Your Pre-pregnancy BMI: <span class="font-bold" x-text="bmi.toFixed(1)"></span></p>
                    <p class="text-gray-700 text-lg font-medium mb-2">BMI Category: <span class="font-bold" x-text="bmiCategory"></span></p>
                    <p class="text-emerald-800 text-xl font-bold mb-1">
                        Recommended Total Weight Gain: <span x-text="`${recommendedTotalGainMin} - ${recommendedTotalGainMax} kg`"></span>
                    </p>
                    <p class="text-emerald-800 text-xl font-bold mb-3">
                        Recommended Gain by Week <span x-text="currentWeek"></span>: <span x-text="`${recommendedGainMin.toFixed(1)} - ${recommendedGainMax.toFixed(1)} kg`"></span>
                    </p>
                    <p class="text-gray-500 text-sm mt-3">
                        These guidelines are general. Your individual needs may vary.
                        <strong class="text-red-500">Always consult your healthcare provider for personalized advice.</strong>
                    </p>
                </div>
            </div>



        </div>
    </div>
</main>

@endsection


<script>
    /**
     * Alpine.js data and methods for the Pregnancy Weight Gain Calculator.
     * This calculator uses simplified guidelines based on pre-pregnancy BMI.
     * It does NOT replace professional medical advice.
     */
    function pregnancyWeightGainCalculator() {
        return {
            prePregnancyWeight: null, // Pre-pregnancy weight in kg
            heightCm: null, // Height in cm
            currentWeek: null, // Current week of pregnancy (1-40)
            pregnancyType: 'single', // 'single' or 'twins'

            bmi: 0, // Calculated BMI
            bmiCategory: '', // BMI category (Underweight, Normal, Overweight, Obese)

            recommendedTotalGainMin: null, // Min total recommended gain for pregnancy
            recommendedTotalGainMax: null, // Max total recommended gain for pregnancy
            recommendedGainMin: null, // Min recommended gain by current week
            recommendedGainMax: null, // Max recommended gain by current week
            errorMessage: '', // Validation error message

            /**
             * Calculates BMI and determines the recommended weight gain range.
             */
            calculateWeightGain() {
                this.resetResults(); // Clear previous results

                // 1. Input Validation
                if (this.prePregnancyWeight === null || this.prePregnancyWeight === '' || isNaN(this.prePregnancyWeight) || this.prePregnancyWeight <= 0) {
                    this.errorMessage = 'Please enter a valid pre-pregnancy weight.';
                    return;
                }
                if (this.heightCm === null || this.heightCm === '' || isNaN(this.heightCm) || this.heightCm <= 0) {
                    this.errorMessage = 'Please enter a valid height.';
                    return;
                }
                if (this.currentWeek === null || this.currentWeek === '' || isNaN(this.currentWeek) || this.currentWeek < 1 || this.currentWeek > 40) {
                    this.errorMessage = 'Please enter a valid current week of pregnancy (1-40).';
                    return;
                }

                // 2. Calculate BMI
                const heightM = this.heightCm / 100; // Convert cm to meters
                this.bmi = this.prePregnancyWeight / (heightM * heightM);

                // 3. Determine BMI Category and Total Recommended Gain
                // Guidelines based on IOM/ACOG for singletons and twins
                // Source: https://www.acog.org/clinical/clinical-guidance/committee-opinions/articles/weight-gain-during-pregnancy
                const gainGuidelines = {
                    single: {
                        underweight: {
                            category: 'Underweight (<18.5 BMI)',
                            min: 12.5,
                            max: 18
                        },
                        normal: {
                            category: 'Normal Weight (18.5-24.9 BMI)',
                            min: 11.5,
                            max: 16
                        },
                        overweight: {
                            category: 'Overweight (25.0-29.9 BMI)',
                            min: 7,
                            max: 11.5
                        },
                        obese: {
                            category: 'Obese (>=30.0 BMI)',
                            min: 5,
                            max: 9
                        }
                    },
                    twins: {
                        underweight: {
                            category: 'Underweight (<18.5 BMI)',
                            min: 14,
                            max: 24
                        }, // No specific IOM for underweight twins, using a general higher range
                        normal: {
                            category: 'Normal Weight (18.5-24.9 BMI)',
                            min: 17,
                            max: 25
                        },
                        overweight: {
                            category: 'Overweight (25.0-29.9 BMI)',
                            min: 14,
                            max: 23
                        },
                        obese: {
                            category: 'Obese (>=30.0 BMI)',
                            min: 11,
                            max: 19
                        }
                    }
                };

                let guidelines;
                if (this.bmi < 18.5) {
                    this.bmiCategory = gainGuidelines[this.pregnancyType].underweight.category;
                    guidelines = gainGuidelines[this.pregnancyType].underweight;
                } else if (this.bmi >= 18.5 && this.bmi < 25) {
                    this.bmiCategory = gainGuidelines[this.pregnancyType].normal.category;
                    guidelines = gainGuidelines[this.pregnancyType].normal;
                } else if (this.bmi >= 25 && this.bmi < 30) {
                    this.bmiCategory = gainGuidelines[this.pregnancyType].overweight.category;
                    guidelines = gainGuidelines[this.pregnancyType].overweight;
                } else { // BMI >= 30
                    this.bmiCategory = gainGuidelines[this.pregnancyType].obese.category;
                    guidelines = gainGuidelines[this.pregnancyType].obese;
                }

                this.recommendedTotalGainMin = guidelines.min;
                this.recommendedTotalGainMax = guidelines.max;

                // 4. Calculate Recommended Gain by Current Week
                // A simplified linear progression for demonstration.
                // In reality, weight gain is not linear, especially in the first trimester.
                // First trimester (weeks 1-12): typically 1-2 kg total for singletons
                // Second and Third trimesters (weeks 13-40): ~0.45-0.5 kg/week for normal BMI singletons

                let weeklyGainRateMin = 0;
                let weeklyGainRateMax = 0;

                if (this.pregnancyType === 'single') {
                    if (this.bmi < 18.5) { // Underweight
                        weeklyGainRateMin = 0.45;
                        weeklyGainRateMax = 0.6;
                    } else if (this.bmi >= 18.5 && this.bmi < 25) { // Normal
                        weeklyGainRateMin = 0.35;
                        weeklyGainRateMax = 0.5;
                    } else if (this.bmi >= 25 && this.bmi < 30) { // Overweight
                        weeklyGainRateMin = 0.23;
                        weeklyGainRateMax = 0.33;
                    } else { // Obese
                        weeklyGainRateMin = 0.17;
                        weeklyGainRateMax = 0.27;
                    }
                } else { // Twins
                    if (this.bmi < 18.5) { // Underweight (using normal twin rates as a proxy for simplicity)
                        weeklyGainRateMin = 0.68;
                        weeklyGainRateMax = 1.0;
                    } else if (this.bmi >= 18.5 && this.bmi < 25) { // Normal
                        weeklyGainRateMin = 0.68;
                        weeklyGainRateMax = 1.0;
                    } else if (this.bmi >= 25 && this.bmi < 30) { // Overweight
                        weeklyGainRateMin = 0.59;
                        weeklyGainRateMax = 0.91;
                    } else { // Obese
                        weeklyGainRateMin = 0.45;
                        weeklyGainRateMax = 0.68;
                    }
                }

                // For simplicity, assume minimal gain in first trimester and then linear.
                // A more accurate calculator would use specific trimester-based rates.
                // We'll just apply the weekly rate from week 1.
                this.recommendedGainMin = weeklyGainRateMin * this.currentWeek;
                this.recommendedGainMax = weeklyGainRateMax * this.currentWeek;

                // Ensure the weekly gain doesn't exceed the total recommended gain
                this.recommendedGainMin = Math.min(this.recommendedGainMin, this.recommendedTotalGainMin);
                this.recommendedGainMax = Math.min(this.recommendedGainMax, this.recommendedTotalGainMax);
            },

            /**
             * Resets all calculated results and error messages.
             */
            resetResults() {
                this.bmi = 0;
                this.bmiCategory = '';
                this.recommendedTotalGainMin = null;
                this.recommendedTotalGainMax = null;
                this.recommendedGainMin = null;
                this.recommendedGainMax = null;
                this.errorMessage = '';
            }
        }
    }
</script>