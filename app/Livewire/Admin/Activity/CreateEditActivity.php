<?php

namespace App\Livewire\Admin\Activity;

use App\Models\Activity;
use Livewire\Component;
use Livewire\WithFileUploads; // Trait for handling file uploads in Livewire
use Illuminate\Support\Facades\Storage; // Facade for file storage operations
use Illuminate\Validation\Rule;

class CreateEditActivity extends Component
{
    use WithFileUploads;

    // Public property to hold the Activity model instance (null for creation, object for editing)
    public ?Activity $activity = null;

    // Properties for the main Activity fields
    public $name;
    public $description;
    public $materials = ['']; // Array to hold dynamic ingredient input fields

    // Array to hold instruction steps. Each element is an array representing an instruction.
    public $instructions = [];

    // Temporary storage for newly uploaded images.
    // Keys will correspond to the instruction index (e.g., newInstructionImages[0] for first step).
    public $newInstructionImages = [];

    // Stores original image paths for existing instructions when editing,
    // useful for determining if an image was removed or replaced.
    public $existingInstructionImages = [];

    /**
     * Define validation rules for the form fields.
     *
     * @return array
     */
    protected function rules()
    {
        return [
            // Activity name is required, string, max 255 chars, and unique (ignoring current activity on edit)
            'name' => ['required', 'string', 'max:255', Rule::unique('activitys')->ignore($this->activity)],
            'description' => 'nullable|string', // Description is optional
            // Each ingredient is optional, string, max 255 chars
            'materials.*' => 'nullable|string|max:255',
            'instructions' => 'required|array|min:1', // At least one instruction step is required
            'instructions.*.description' => 'required|string', // Each instruction step must have a description
            // Each newly uploaded image must be an image type and max 1MB
            'newInstructionImages.*' => 'nullable|image|max:1024',
        ];
    }

    /**
     * Custom validation messages.
     *
     * @var array
     */
    protected $messages = [
        'name.unique' => 'A recipe with this name already exists.',
        'instructions.required' => 'At least one instruction step is required.',
        'instructions.*.description.required' => 'Instruction description cannot be empty.',
        'newInstructionImages.*.image' => 'The uploaded file for an instruction must be an image.',
        'newInstructionImages.*.max' => 'The image size for an instruction must not exceed 1MB.',
    ];

    /**
     * Mount lifecycle hook: Called when the component is initialized.
     * Populates form fields if editing an existing activity.
     *
     * @param int|null $activityId The ID of the activity to edit, if any.
     */
    public function mount($activityId = null)
    {
        if ($activityId) {
            // If editing, load the activity and its instructions
            $this->activity = Activity::with('instructions')->findOrFail($activityId);
            $this->name = $this->activity->name;
            $this->description = $this->activity->description;
            // Ensure materials is an array, default to [''] if null from DB
            $this->materials = $this->activity->materials ?: [''];

            // Populate instructions for the form fields
            foreach ($this->activity->instructions as $index => $instruction) {
                $this->instructions[$index] = [
                    'id' => $instruction->id, // Store instruction ID for updates
                    'step_number' => $instruction->step_number,
                    'description' => $instruction->description,
                    'image_path' => $instruction->image_path, // Existing image path
                    'temp_image' => null, // Placeholder for new upload (Livewire will bind to this)
                ];
                // Store existing image path separately for reference during validation/saving
                $this->existingInstructionImages[$index] = $instruction->image_path;
            }
            // If an existing activity has no instructions, add one empty field
            if (empty($this->instructions)) {
                $this->addInstruction();
            }
        } else {
            // For a new activity, start with one empty instruction field
            $this->addInstruction();
        }
    }

    /**
     * Add a new empty ingredient input field.
     */
    public function addIngredient()
    {
        $this->materials[] = '';
    }

    /**
     * Remove an ingredient input field at a given index.
     *
     * @param int $index The index of the ingredient to remove.
     */
    public function removeIngredient($index)
    {
        unset($this->materials[$index]);
        $this->materials = array_values($this->materials); // Re-index the array to prevent issues with Livewire
    }

    /**
     * Add a new empty instruction step input field.
     */
    public function addInstruction()
    {
        $this->instructions[] = [
            'step_number' => count($this->instructions) + 1, // Assign next sequential step number
            'description' => '',
            'image_path' => null,
            'temp_image' => null, // Placeholder for newly uploaded file
        ];
    }

    /**
     * Remove an instruction step input field at a given index.
     *
     * @param int $index The index of the instruction to remove.
     */
    public function removeInstruction($index)
    {
        // Delete the associated temporary uploaded file if it exists
        if (isset($this->newInstructionImages[$index]) && $this->newInstructionImages[$index]) {
            // Livewire automatically handles temporary file cleanup on component unmount,
            // but explicit removal here for clarity if step is removed before saving.
            // However, temp files are usually managed by Livewire, no manual delete needed here for temp files.
            unset($this->newInstructionImages[$index]);
            $this->newInstructionImages = array_values($this->newInstructionImages);
        }

        // Unset the instruction from the array
        unset($this->instructions[$index]);
        $this->instructions = array_values($this->instructions); // Re-index the array

        // Re-calculate and update step numbers for remaining instructions
        foreach ($this->instructions as $i => $instruction) {
            $this->instructions[$i]['step_number'] = $i + 1;
        }

        // Also remove the corresponding entry from existingInstructionImages if it exists
        if (isset($this->existingInstructionImages[$index])) {
            unset($this->existingInstructionImages[$index]);
            $this->existingInstructionImages = array_values($this->existingInstructionImages);
        }
    }

    /**
     * Livewire lifecycle hook: Called when a property is updated.
     * Used here for real-time validation for file uploads.
     *
     * @param string $propertyName The name of the property that was updated.
     */
    public function updated($propertyName)
    {
        // If the updated property is an image for an instruction, validate it.
        if (str_starts_with($propertyName, 'newInstructionImages.')) {
            $this->validateOnly($propertyName, [
                $propertyName => 'nullable|image|max:1024',
            ]);
        } else {
             // For other properties, validate normally
             $this->validateOnly($propertyName);
        }
    }

    /**
     * Save the activity and its instructions to the database.
     */
    public function save()
    {
        $this->validate(); // Run all validations

        // Filter out any empty ingredient fields before saving
        $validatedIngredients = array_filter($this->materials);

        // Prepare data for the Activity model
        $activityData = [
            'name' => $this->name,
            'description' => $this->description,
            'materials' => $validatedIngredients,
        ];

        if ($this->activity) {
            // ---- Update Existing Activity ----
            $this->activity->update($activityData);
            $activity = $this->activity;

            // Get IDs of current instructions in the database for this activity
            $existingInstructionIds = $activity->instructions->pluck('id')->toArray();
            $submittedInstructionIds = []; // To track instructions that are still in the form

            foreach ($this->instructions as $index => $instructionData) {
                $instructionId = $instructionData['id'] ?? null;
                // Add to submitted IDs only if it's an existing instruction
                if ($instructionId) {
                    $submittedInstructionIds[] = $instructionId;
                }

                $currentImagePath = $instructionData['image_path'] ?? null; // Path currently set in the form data

                // Check if a new image was uploaded for this step
                if (isset($this->newInstructionImages[$index]) && $this->newInstructionImages[$index] instanceof \Livewire\Features\SupportFileUploads\TemporaryUploadedFile) {
                    // Delete old image if it existed and a new one is uploaded
                    if ($currentImagePath && Storage::disk('public')->exists($currentImagePath)) {
                        Storage::disk('public')->delete($currentImagePath);
                    }
                    // Store the new image and get its path
                    $imagePath = $this->newInstructionImages[$index]->store('activity_instruction_images', 'public');
                } else if ($currentImagePath === null && isset($this->existingInstructionImages[$index]) && $this->existingInstructionImages[$index] !== null) {
                    // Check if an existing image was explicitly removed (e.g., via a "Remove Image" button that sets image_path to null)
                    // and there's no new upload.
                    if (Storage::disk('public')->exists($this->existingInstructionImages[$index])) {
                        Storage::disk('public')->delete($this->existingInstructionImages[$index]);
                    }
                    $imagePath = null; // Set image path to null in DB
                } else {
                    // No new image uploaded, and not explicitly removed, retain the current image path
                    $imagePath = $currentImagePath;
                }

                // Prepare instruction attributes for saving/updating
                $instructionAttributes = [
                    'step_number' => $index + 1, // Ensure step numbers are sequential based on current order
                    'description' => $instructionData['description'],
                    'image_path' => $imagePath,
                ];

                if ($instructionId) {
                    // Update existing instruction
                    $activity->instructions()->where('id', $instructionId)->update($instructionAttributes);
                } else {
                    // Create new instruction for this activity
                    $activity->instructions()->create($instructionAttributes);
                }
            }

            // Delete instructions that were removed from the form (i.e., existing but not in submitted IDs)
            $instructionsToDelete = array_diff($existingInstructionIds, array_filter($submittedInstructionIds));
            foreach($instructionsToDelete as $idToDelete) {
                // The Instruction model's `deleting` event will handle image cleanup.
                $activity->instructions()->where('id', $idToDelete)->delete();
            }

            session()->flash('message', 'Recipe updated successfully!');

        } else {
            // ---- Create New Activity ----
            $activity = Activity::create($activityData);

            foreach ($this->instructions as $index => $instructionData) {
                $imagePath = null;
                // Check if an image was uploaded for this new instruction
                if (isset($this->newInstructionImages[$index]) && $this->newInstructionImages[$index] instanceof \Livewire\Features\SupportFileUploads\TemporaryUploadedFile) {
                    $imagePath = $this->newInstructionImages[$index]->store('activity_instruction_images', 'public');
                }
                // Create the instruction associated with the new activity
                $activity->instructions()->create([
                    'step_number' => $index + 1,
                    'description' => $instructionData['description'],
                    'image_path' => $imagePath,
                ]);
            }
            session()->flash('message', 'Recipe created successfully!');
        }

        // Redirect to the activitys list page after saving
        return redirect()->route('activitys.index');
    }

    public function render()
    {
        return view('livewire.admin.activity.create-edit-activity');
    }
}
