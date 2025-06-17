

    <div
        x-data="{
            searchText: '',
            searchResults: [],
            showDropdown: false,
            selectedIndex: -1, // For keyboard navigation
            async fetchResults() {
                if (this.searchText.length > 2) { // Only search if more than 2 characters
                    try {
                        const response = await fetch(`/api/search?query=${this.searchText}`);
                        this.searchResults = await response.json();
                        this.showDropdown = true;
                        this.selectedIndex = -1; // Reset selection
                    } catch (error) {
                        console.error('Error fetching search results:', error);
                    }
                } else {
                    this.searchResults = [];
                    this.showDropdown = false;
                }
            },
            selectResult(result) {
                this.searchText = result.name; // Or result.slug, depending on what you want to display
                this.showDropdown = false;
                // You might want to do something else with the selected result,
                // like navigating to a page or filling other form fields.
                console.log('Selected:', result);
            },
            handleKeydown(event) {
                if (this.showDropdown) {
                    if (event.key === 'ArrowDown') {
                        event.preventDefault();
                        this.selectedIndex = Math.min(this.selectedIndex + 1, this.searchResults.length - 1);
                        this.scrollToSelected();
                    } else if (event.key === 'ArrowUp') {
                        event.preventDefault();
                        this.selectedIndex = Math.max(this.selectedIndex - 1, 0);
                        this.scrollToSelected();
                    } else if (event.key === 'Enter') {
                        event.preventDefault();
                        if (this.selectedIndex !== -1) {
                            this.selectResult(this.searchResults[this.selectedIndex]);
                        }
                    } else if (event.key === 'Escape') {
                        this.showDropdown = false;
                    }
                }
            },
            scrollToSelected() {
                this.$nextTick(() => {
                    const selectedElement = this.$refs.resultsList.children[this.selectedIndex];
                    if (selectedElement) {
                        selectedElement.scrollIntoView({ block: 'nearest' });
                    }
                });
            }
        }"
        @click.outside="showDropdown = false"
        class="relative w-96"
    >
        <input
            type="text"
            x-model.debounce.300ms="searchText"
            @input="fetchResults()"
            @keydown="handleKeydown($event)"
            @focus="showDropdown = searchResults.length > 0 || searchText.length > 0"
            placeholder="Search..."
            class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
        >

        <div
            x-show="showDropdown && searchResults.length > 0"
            x-cloak
            class="absolute z-10 w-full bg-white border border-gray-300 rounded-md shadow-lg mt-1 max-h-60 overflow-y-auto"
        >
            <ul x-ref="resultsList">
                <template x-for="(result, index) in searchResults" :key="result.id">
                    <li
                        @click="selectResult(result)"
                        :class="{
                            'p-3 cursor-pointer hover:bg-blue-100': true,
                            'bg-blue-100': index === selectedIndex
                        }"
                        x-text="result.name + ' (' + result.slug + ')'"
                    ></li>
                </template>
            </ul>
        </div>

        <div
            x-show="showDropdown && searchText.length > 2 && searchResults.length === 0"
            x-cloak
            class="absolute z-10 w-full bg-white border border-gray-300 rounded-md shadow-lg mt-1 p-3 text-gray-500"
        >
            No results found.
        </div>
    </div>

 
