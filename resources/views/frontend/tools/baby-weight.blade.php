@extends('frontend.layout')

@section('content')

<main class="flex bg-white min-h-screen pt-0 md:pt-[0px] max-w-[85rem] px-4 md:py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <div class="container mx-auto px-5 my-8">
        <div class="bg-gradient-to-br from-teal-500 to-cyan-600 flex items-center justify-center min-h-screen p-4">

            <!-- Main container for the calculator, powered by Alpine.js -->
            <div x-data="babyGrowthCalculator()" class="bg-white p-8 md:p-10 rounded-xl shadow-2xl max-w-md w-full text-center border-b-4 border-indigo-700">
                <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-6">Baby Growth Calculator</h1>
                <p class="text-gray-600 mb-8 text-sm md:text-base">
                    Enter your baby's details to get a simplified growth assessment.
                    <strong class="text-red-500">This is for demonstration only and not medical advice.</strong>
                </p>

                <!-- Input fields -->
                <div class="space-y-5 mb-8">
                    <!-- Age in Months -->
                    <div>
                        <label for="ageMonths" class="block text-left text-gray-700 font-medium mb-1">Age (in Months):</label>
                        <input type="number" id="ageMonths" x-model.number="ageMonths" min="0" max="36"
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-150 ease-in-out"
                            placeholder="e.g., 6">
                    </div>

                    <!-- Gender -->
                    <div>
                        <label for="gender" class="block text-left text-gray-700 font-medium mb-1">Gender:</label>
                        <select id="gender" x-model="gender"
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-150 ease-in-out">
                            <option value="">Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>

                    <!-- Weight in Kilograms -->
                    <div>
                        <label for="weightKg" class="block text-left text-gray-700 font-medium mb-1">Weight (kg):</label>
                        <input type="number" id="weightKg" x-model.number="weightKg" step="0.1" min="0"
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-150 ease-in-out"
                            placeholder="e.g., 7.5">
                    </div>

                    <!-- Height in Centimeters -->
                    <div>
                        <label for="heightCm" class="block text-left text-gray-700 font-medium mb-1">Height (cm):</label>
                        <input type="number" id="heightCm" x-model.number="heightCm" step="0.1" min="0"
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-150 ease-in-out"
                            placeholder="e.g., 65">
                    </div>
                </div>

                <!-- Error Message Display -->
                <template x-if="errorMessage">
                    <p x-text="errorMessage" class="text-red-600 bg-red-100 p-3 rounded-lg mb-6 border border-red-300"></p>
                </template>

                <!-- Calculate Button -->
                <button @click="calculateGrowth()"
                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 px-6 rounded-full shadow-lg transform transition duration-200 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 mb-6">
                    Calculate Growth
                </button>

                <!-- Result Display -->
                <div x-show="resultMessage" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                    class="bg-indigo-50 p-6 rounded-lg border-l-4 border-indigo-500 shadow-md">
                    <p class="text-gray-700 text-lg font-medium mb-2">Assessment:</p>
                    <p x-text="resultMessage" class="text-indigo-800 text-xl font-bold"></p>
                </div>
            </div>



        </div>
    </div>
</main>

@endsection

<script>
    /**
     * Alpine.js data and methods for the Baby Growth Calculator.
     * This uses simplified logic for demonstration purposes.
     * Actual growth assessment requires professional medical charts.
     */
    function babyGrowthCalculator() {
        return {
            ageMonths: null, // Baby's age in months
            gender: '', // Baby's gender ('male' or 'female')
            weightKg: null, // Baby's weight in kilograms
            heightCm: null, // Baby's height in centimeters
            resultMessage: '', // Message displaying the growth assessment
            errorMessage: '', // Message displaying validation errors

            /**
             * Calculates the baby's growth assessment based on simplified criteria.
             */
            calculateGrowth() {
                this.resultMessage = ''; // Clear previous results
                this.errorMessage = ''; // Clear previous errors

                // 1. Input Validation
                if (this.ageMonths === null || this.ageMonths === '' || this.ageMonths < 0 || this.ageMonths > 36 || isNaN(this.ageMonths)) {
                    this.errorMessage = 'Please enter a valid age in months (0-36).';
                    return;
                }
                if (this.gender === '') {
                    this.errorMessage = 'Please select a gender.';
                    return;
                }
                if (this.weightKg === null || this.weightKg === '' || this.weightKg <= 0 || isNaN(this.weightKg)) {
                    this.errorMessage = 'Please enter a valid weight in kilograms (must be positive).';
                    return;
                }
                if (this.heightCm === null || this.heightCm === '' || this.heightCm <= 0 || isNaN(this.heightCm)) {
                    this.errorMessage = 'Please enter a valid height in centimeters (must be positive).';
                    return;
                }

                // 2. Simplified Growth Data (for demonstration)
                // These are very rough averages and NOT clinical data.
                // Real growth charts use percentiles and are much more detailed.
                const growthData = {
                    male: {
                        '0-3': {
                            weight: {
                                min: 3.5,
                                max: 7.0
                            },
                            height: {
                                min: 50,
                                max: 63
                            }
                        },
                        '4-6': {
                            weight: {
                                min: 6.0,
                                max: 9.0
                            },
                            height: {
                                min: 60,
                                max: 70
                            }
                        },
                        '7-12': {
                            weight: {
                                min: 8.0,
                                max: 11.0
                            },
                            height: {
                                min: 67,
                                max: 78
                            }
                        },
                        '13-24': {
                            weight: {
                                min: 9.5,
                                max: 13.5
                            },
                            height: {
                                min: 75,
                                max: 90
                            }
                        },
                        '25-36': {
                            weight: {
                                min: 11.0,
                                max: 16.0
                            },
                            height: {
                                min: 85,
                                max: 100
                            }
                        }
                    },
                    female: {
                        '0-3': {
                            weight: {
                                min: 3.0,
                                max: 6.5
                            },
                            height: {
                                min: 49,
                                max: 61
                            }
                        },
                        '4-6': {
                            weight: {
                                min: 5.5,
                                max: 8.5
                            },
                            height: {
                                min: 58,
                                max: 68
                            }
                        },
                        '7-12': {
                            weight: {
                                min: 7.5,
                                max: 10.5
                            },
                            height: {
                                min: 65,
                                max: 76
                            }
                        },
                        '13-24': {
                            weight: {
                                min: 9.0,
                                max: 13.0
                            },
                            height: {
                                min: 73,
                                max: 88
                            }
                        },
                        '25-36': {
                            weight: {
                                min: 10.5,
                                max: 15.5
                            },
                            height: {
                                min: 83,
                                max: 98
                            }
                        }
                    }
                };

                let ageGroupKey = '';
                if (this.ageMonths >= 0 && this.ageMonths <= 3) {
                    ageGroupKey = '0-3';
                } else if (this.ageMonths >= 4 && this.ageMonths <= 6) {
                    ageGroupKey = '4-6';
                } else if (this.ageMonths >= 7 && this.ageMonths <= 12) {
                    ageGroupKey = '7-12';
                } else if (this.ageMonths >= 13 && this.ageMonths <= 24) {
                    ageGroupKey = '13-24';
                } else if (this.ageMonths >= 25 && this.ageMonths <= 36) {
                    ageGroupKey = '25-36';
                } else {
                    this.errorMessage = 'Age outside the supported range (0-36 months) for this simplified calculator.';
                    return;
                }

                const relevantData = growthData[this.gender][ageGroupKey];

                let weightStatus = '';
                if (this.weightKg < relevantData.weight.min) {
                    weightStatus = 'below average weight';
                } else if (this.weightKg > relevantData.weight.max) {
                    weightStatus = 'above average weight';
                } else {
                    weightStatus = 'within average weight range';
                }

                let heightStatus = '';
                if (this.heightCm < relevantData.height.min) {
                    heightStatus = 'below average height';
                } else if (this.heightCm > relevantData.height.max) {
                    heightStatus = 'above average height';
                } else {
                    heightStatus = 'within average height range';
                }

                // 3. Construct Result Message
                this.resultMessage = `Your baby's weight is ${weightStatus} and height is ${heightStatus} for their age and gender.`;

                // Add a disclaimer
                this.resultMessage += ' (Based on simplified data - consult a healthcare professional for accurate assessment.)';
            }
        }
    }
</script>